<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Slider;
use App\Exports\ExcelExports;
use App\Imports\ExcelImports;
use Excel;
use App\Models\CategoryProductModel;
use App\Models\CategoryPostModel;
use App\Models\Product;
use Auth;

session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
                return Redirect::to('admin')->send();
        }
    }
    public function add_category_product(){
        $this->AuthLogin();
        $category = CategoryProductModel::where('category_parent',0)->orderBy('category_id','DESC')->get();
    	return view('admin.add_category_product')->with('category', $category);
    }
    public function all_category_product(){
        $this->AuthLogin();
        $category_product = CategoryProductModel::where('category_parent',0)->OrderBy('category_id','DESC')->get();
    	$all_category_product = DB::table('tbl_category_product')->OrderBy('category_order','ASC')->OrderBy('category_parent','DESC')->paginate(10);
    	$manager_category_product  = view('admin.all_category_product')
        ->with('all_category_product',$all_category_product)
        ->with('category_product', $category_product);
    	return view('admin_layout')
        ->with('admin.all_category_product', $manager_category_product);
    }
    public function save_category_product(Request $request){
        $data = array();
      	$data['category_name'] = $request->category_product_name;   
        $data['category_desc'] = $request->category_product_desc;
      	$data['category_status'] = $request->category_product_status;
      	$data['category_parent'] = $request->category_product_parent;
      	$data['meta_keywords'] = $request->category_product_keywords;

       	DB::table('tbl_category_product')->insert($data);
    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return Redirect::to('all-category-product');
    }
    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    public function active_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        $category = CategoryProductModel::where('category_parent',0)->orderBy('category_id','DESC')->get();

        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
    
        $manager_category_product  = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product)->with('category', $category);
    
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product)
       ;
        ;
    }
    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['meta_keywords'] = $request->category_product_keywords;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    
    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    // End Function Admin Page
    public function show_category_home(Request $request ,$category_id){
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');
        $min_price_range = $min_price;
        $max_price_range = $max_price + 1000000;

        $cate_pro_id = CategoryProductModel::where("category_id",$category_id)->get();
        foreach($cate_pro_id as $key =>$cate){
            $category_id = $cate->category_id;
        }

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'decrease' ){
                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_price','DESC')->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'ascending' ){
                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_price','ASC')->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'char_za' ){
                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_name','DESC')->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'char_az' ){
                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_name','ASC')->paginate(6)->appends(request()->query());
            }
        }elseif(isset($_GET['start_price']) && $_GET['end_price']){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $category_by_id = Product::with('category')->whereBetween('product_price',[$min_price,$max_price])->orderBy('product_id','ASC')->paginate(6);


        }else{
            $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_id','DESC')->paginate(6)->appends(request()->query());
        }

    
        // $category_by_id = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_category_product.category_id',$category_id)->get();

        $category_post = CategoryPostModel::orderBy('cate_post_id','desc')->get(); 

        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
        foreach($category_name as $key => $val){
                //seo 
                $meta_desc = $val->category_desc; 
                $meta_keywords = $val->meta_keywords;
                $meta_title = $val->category_name;
                $url_canonical = $request->url();
                //--seo
                }
            return view('pages.category.show_category')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('category_by_id',$category_by_id)
            ->with('category_name',$category_name)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider)
            ->with('min_price',$min_price)
            ->with('max_price',$max_price)
            ->with('min_price_range',$min_price_range)            
            ->with('max_price_range',$max_price_range)
            ->with('category_post',$category_post);
            
        }
        public function export_csv(){
            return Excel::download(new ExcelExports , 'category_product.xlsx');
        }
        public function import_csv(Request $request){
            $path = $request->file('file')->getRealPath();
            Excel::import(new ExcelImports, $path);
            return back();
        }
        public function arrange_category(Request $request){
            $data = $request->all();
            $cate_id = $data['page_id_array'];
            foreach($cate_id as $key => $value){
                $category = CategoryProductModel::find($value);
                $category->category_order = $key;
                $category->save();
            }
        echo 'Updated';
        }
        public function product_tabs(Request $request){
            $data = $request->all();
            $output= '';
            $categorysub = CategoryProductModel::where('category_parent',$data['cate_id'])->get();
            $sub_array = array();
            foreach($categorysub as $key => $sub){
                $sub_array[] = $sub->category_id;
            }
            array_push($sub_array, $data['cate_id']);
            // print_r($sub_array);
            $product = Product::whereIn('category_id',$sub_array)->orderBy('product_id','DESC')->get();
            $product_count = $product->count();
            if($product_count>0){
            $output = '<div class="tab-content"';
            foreach($product as $key => $pro){
                $output.='
                <div class="tab-pane fade active in" id="tshirt">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="'.url('public/uploads/product/'.$pro->product_image).'" alt="'.$pro->product_name.'">
                                <h2>'.number_format($pro->product_price,0,',','.').'</h2>
                                <p>'.$pro->product_name.'</p>
                                <a href="'.url('/chi-tiet-san-pham/'.$pro->product_id).'" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>Chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                ';
            }

        }else{
            $output.='
            <div class="tab-pane fade active in" id="tshirt">
            <div class="col-sm-12">
                <p style="color:red;font-size:18px;text-align:center;">Chưa có sản phẩm thộc danh mục
                </div>
            </div>
            </div>

            ';
        }
        $output.='</div>';
        echo $output;
        }
        }
    


