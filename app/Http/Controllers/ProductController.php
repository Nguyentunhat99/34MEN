<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Slider;
use App\Http\Requests;
use App\Models\CategoryPostModel;
use App\Models\CategoryProductModel;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Comment;
use App\Models\Rating;
use File;
use Illuminate\Support\Facades\Redirect;
use App\Exports\ExportProduct;
use App\Imports\ImportProduct;
use Auth;
use Excel;
session_start();
class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get(); 
       

        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product',$brand_product);
    	

    }
    public function all_product(){
        $this->AuthLogin();
    	$all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
    	$manager_product  = view('admin.all_product')->with('all_product',$all_product);
    	return view('admin_layout')->with('admin.all_product', $manager_product);

    }
    public function save_product(Request $request){
         $this->AuthLogin();
    	$data = array();
        $product_quantity = filter_var($request->product_quantity, FILTER_SANITIZE_NUMBER_INT);
        $product_sold = filter_var($request->product_sold, FILTER_SANITIZE_NUMBER_INT);
        $product_price = filter_var($request->product_price, FILTER_SANITIZE_NUMBER_INT);
        $product_cost = filter_var($request->product_cost, FILTER_SANITIZE_NUMBER_INT);

    	$data['product_name'] = $request->product_name;
    	$data['product_tags'] = $request->product_tags;
        $data['product_quantity'] = $product_quantity;
        $data['product_sold'] = $product_sold;
    	$data['product_price'] = $product_price;
    	$data['product_cost'] = $product_cost;
    	$data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $data['product_image'] = $request->product_status;
        $data['meta_keywords'] = $request->product_keywords;
        $get_image = $request->file('product_image');

        $path = 'public/uploads/product/';
        $path_gallery = 'public/uploads/gallery/';
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            File::copy($path.$new_image,$path_gallery.$new_image);
            $data['product_image'] = $new_image;
        }
        $pro_id = DB::table('tbl_product')->insertGetId($data);
        $gallery = new Gallery();
        $gallery->gallery_image = $new_image;
        $gallery->gallery_name = $new_image;
        $gallery->product_id = $pro_id;
        $gallery->save();
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('add-product');
     
    }
    public function unactive_product($product_id){
         $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');

    }
    public function active_product($product_id){
         $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function edit_product($product_id){
         $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get(); 

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();

        $manager_product  = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);

        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
    public function update_product(Request $request,$product_id){
         $this->AuthLogin();
        $product_quantity = filter_var($request->product_quantity, FILTER_SANITIZE_NUMBER_INT);
        $product_price = filter_var($request->product_price, FILTER_SANITIZE_NUMBER_INT);
        $product_cost = filter_var($request->product_cost, FILTER_SANITIZE_NUMBER_INT);
        $data = array();
        $data['product_name'] = $request->product_name;
    	$data['product_tags'] = $request->product_tags;
        $data['product_quantity'] = $product_quantity;
        $data['product_price'] = $product_price;
    	$data['product_cost'] = $product_cost;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        
        if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/uploads/product',$new_image);
                    $data['product_image'] = $new_image;
                    DB::table('tbl_product')->where('product_id',$product_id)->update($data);
                    Session::put('message','Cập nhật sản phẩm thành công');
                    return Redirect::to('all-product');
        }
            
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        $product = Product::find($product_id);
        $product_image = $product->product_image;
        if ($product_image) {
            $path='public/uploads/product/'.$product->product_image;
            unlink($path);
        }
        $product->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }
    //End Admin Page
    public function details_product($product_id , Request $request){

         //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        $category_post = CategoryPostModel::orderBy('cate_post_id','desc')->get(); 

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
            $product_id = $value->product_id;
            $product_cate = $value->category_name;
            $cate_id = $value->category_id;
                //seo 
                $meta_desc = $value->product_desc;
                $meta_keywords = $value->meta_keywords;
                $meta_title = $value->product_name;
                $url_canonical = $request->url();
                //--seo
            }
            $gallery = Gallery::where('product_id',$product_id)->get();
        // update lượt xem sp
        $product = Product::where('product_id',$product_id)->first();
        $product->product_views = $product->product_views + 1;
        $product->save();
            // sản phẩm liên quan
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->orderby(DB::raw('RAND()'))->paginate(3);
        
        $rating = Rating::where('product_id',$product_id)->avg('rating' );
        $rating = round($rating);

        return view('pages.sanpham.show_details')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('product_details',$details_product)
        ->with('relate',$related_product)
        ->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)
        ->with('slider',$slider)
        ->with('category_post',$category_post)
        ->with('gallery',$gallery)
        ->with('product_cate',$product_cate)
        ->with('rating',$rating)
        ->with('cate_id',$cate_id);
    }
    public function export_csv_product(){
        return Excel::download(new ExportProduct , '34MENproduct.xlsx');
    }
    public function import_csv_product(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ImportProduct, $path);
        return back();
    }
    public function tag(Request $request, $product_tag){
         //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        $category_post = CategoryPostModel::orderBy('cate_post_id','desc')->get(); 
        $tag = str_replace("-"," ",$product_tag);
        $pro_tag = Product::where('product_status',0)->where('product_name','LIKE','%'.$tag.'%')->orWhere('product_tags','LIKE','%'.$tag.'%')->get();
       
        $meta_desc = 'Tags tìm kiếm'.$product_tag;
        $meta_keywords = 'Tags tìm kiếm'.$product_tag;
        $meta_title = 'Tags tìm kiếm'.$product_tag;
        $url_canonical = $request->url();
                 
         
         return view('pages.sanpham.tag')
         ->with('category',$cate_product)
         ->with('brand',$brand_product)
         ->with('meta_desc',$meta_desc)
         ->with('meta_keywords',$meta_keywords)
         ->with('meta_title',$meta_title)
         ->with('url_canonical',$url_canonical)
         ->with('slider',$slider)
         ->with('category_post',$category_post)
         ->with('product_tag',$product_tag)
         ->with('pro_tag',$pro_tag);
    }
    public function quickview(Request $request){
        $product_id =  $request->product_id;
        $product = Product::find($product_id);
        $gallery = Gallery::where('product_id',$product_id)->get();
        $output['product_gallery'] = '';
        foreach($gallery as $key => $gal){
            $output['product_gallery'].= '<p><img width="100%" src="public/uploads/gallery/'.$gal->gallery_image.'"></p>';
        }
        $output['product_name'] = $product->product_name;
        $output['product_id'] = $product->product_id;
        $output['product_desc'] = $product->product_desc;
        $output['product_content'] = $product->product_content;
        $output['product_price'] = number_format($product->product_price,0,',','.').'VND';
        $output['product_image'] = '<p><img width="100%" src="public/uploads/product/'.$product->product_image.'"></p>';
        $output['product_button'] = '
        <button type="button" id="buy_quickview" class="btn btn-primary btn-sm add-to-cart-quickview" data-id_product="'.$product->product_id.'" name="add-to-cart">Mua ngay</button>
        ';
        $output['product_quickview_value'] =  '
        <input type="hidden" value="'.$product->product_id.'" class="cart_product_id_'.$product->product_id.'">
        <input type="hidden" value="'.$product->product_name.'" class="cart_product_name_'.$product->product_id.'">
        <input type="hidden" value="'.$product->product_quantity.'" class="cart_product_quantity_'.$product->product_id.'">
        <input type="hidden" value="'.$product->product_image.'" class="cart_product_image_'.$product->product_id.'">
        <input type="hidden" value="'.$product->product_price.'" class="cart_product_price_'.$product->product_id.'">
        <input type="hidden" value="1" class="cart_product_qty_'.$product->product_id.'">
        ';
        echo json_encode($output);
    }   
    public function insert_rating(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $rating = new Rating();
        $rating->product_id = $data['product_id'];
        $rating->rating = $data['index'];
        $rating->save();
        echo 'done';
    }
   
}
