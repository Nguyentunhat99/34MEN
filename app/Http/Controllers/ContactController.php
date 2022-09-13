<?php


namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\Contact;
use App\Models\CategoryPostModel;
use App\Models\Slider;
use File;
use Illuminate\Support\Facades\Redirect;

session_start();

class ContactController extends Controller
{
    public function contact(Request $request){
         //slide
         $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
         //seo 
         //seo 
         $meta_desc = "Liên hệ"; 
         $meta_keywords = "Liên hệ";
         $meta_title = "Liên hệ với chúng tôi";
         $url_canonical = $request->url();
         // //--seo
         
         $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
         $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
         $category_post = CategoryPostModel::where('cate_post_status','0')->orderby('cate_post_id','desc')->get(); 
        
         return view('pages.contact.contact')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)
        ->with('slider',$slider);
    }
}
