<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Mail;
use App\Models\CategoryPostModel;
use App\Models\CategoryProductModel;
use App\Models\Slider;
use App\Models\Product;
session_start();

class HomeController extends Controller
{
    public function index(Request $request){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo 
        //seo 
        $meta_desc = "Chuyên bán những thời trang nam"; 
        $meta_keywords = "thoi trang nam, quan ao nam, phu kien nam";
        $meta_title = "34MEN-STORE Chuyên thời trang nam";
        $url_canonical = $request->url();
        // //--seo
        
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_parent','desc')->OrderBy('category_order','ASC')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        $category_post = CategoryPostModel::where('cate_post_status','0')->orderby('cate_post_id','desc')->get(); 

        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->limit(4)->paginate(6); 
        $cate_pro_tabs = CategoryProductModel::where('category_parent',0)->orderBy('category_id','DESC')->get();

        return view('pages.home')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('category_post',$category_post)
        ->with('all_product',$all_product)
        ->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)
        ->with('slider',$slider)
        ->with('cate_pro_tabs',$cate_pro_tabs);
        // return view('pages.home')->with(compact('cate_product','brand_product','all_product')); //2
    }
    public function search(Request $request){

        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

    //     //seo 
        $meta_desc = "Tìm kiếm sản phẩm"; 
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm";
        $url_canonical = $request->url();
    //     //--seo

        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get(); 
        $category_post = CategoryPostModel::where('cate_post_status','0')->orderby('cate_post_id','desc')->get(); 


        return view('pages.sanpham.search')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('search_product',$search_product)
        ->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)
        ->with('category_post',$category_post)
        ->with('slider',$slider);
    }
    public function autocomplete_ajax(Request $request){
        $data = $request->all();
        if($data['query']){
            $product = Product::where('product_status',0)->where('product_name','LIKE','%'.$data['query'].'%')->get();
            $output = '
            <ul class="dropdown-menu" style="display:block; position:relative;">';
            foreach($product as $key =>$val){
                $output .='
                <li class="li_search_ajax"><a href="#">'.$val->product_name.'</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
