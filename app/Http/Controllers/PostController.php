<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Slider;
use App\Models\Post;
use App\Models\CategoryPostModel;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Auth;
session_start();

class PostController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_post(){
        $this->AuthLogin();
        $cate_post = CategoryPostModel::orderBy('cate_post_id','DESC')->get();   
        return view('admin.post.add_post')->with(compact('cate_post'));    	

    }
    public function all_post(){
        $this->AuthLogin();
        $category_post = CategoryPostModel::orderBy('cate_post_id','DESC')->get();  
    	$all_post = Post::with('cate_post')->orderBy('post_id','DESC')->get();
    	return view('admin.post.list_post')->with(compact('all_post','category_post'));

    }
    public function save_post(Request $request){
         $this->AuthLogin();

        $data = $request->all();
        $post = new Post();
        $post->post_title = $data['post_title']; 
        $post->post_slug = $data['post_slug']; 
        $post->post_content = $data['post_content']; 
        $post->post_desc = $data['post_desc']; 
        $post->post_meta_desc = $data['post_meta_desc']; 
        $post->post_meta_keywords = $data['post_meta_keywords']; 
        $post->post_status = $data['post_status'];  
        $post->post_desc = $data['post_desc'];
        $post->post_time = $data['post_time'];
        $post->post_cre = $data['post_cre'];
        $post->cate_post_id = $data['cate_post_id']; 	
        $get_image = $request->file('post_images');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post',$new_image);
            $post->post_images = $new_image;
            $post->save();
            Session::put('message','Thêm bài viết thành công');
            return redirect('/all-post');
        }else{
            Session::put('message','Hãy thêm hình ảnh');
            return redirect()->back();
        }
    }
    public function unactive_post($post_id){
        $this->AuthLogin();
        Post::where('post_id',$post_id)->update(['post_status'=>1]);
        Session::put('message','Không kích hoạt bài viết thành công');
        return Redirect::to('all-post');
    }

    public function active_post($post_id){
        $this->AuthLogin();
        Post::where('post_id',$post_id)->update(['post_status'=>0]);
        Session::put('message','Kích hoạt bài viết thành công');
        return Redirect::to('all-post');
    }
    public function edit_post($post_id){
        $this->AuthLogin();
        $cate_post = CategoryPostModel::orderby('cate_post_id','desc')->get(); 
        $post = Post::find($post_id);
    	return view('admin.post.edit_post')->with(compact('post','cate_post'));

    }
    public function update_post(Request $request,$post_id){
        $this->AuthLogin();
        $data = $request->all();
        $post = Post::find($post_id);
        $post->post_title = $data['post_title']; 
        $post->post_slug = $data['post_slug']; 
        $post->post_content = $data['post_content']; 
        $post->post_desc = $data['post_desc']; 
        $post->post_meta_desc = $data['post_meta_desc']; 
        $post->post_meta_keywords = $data['post_meta_keywords']; 
        $post->post_status = $data['post_status'];  
        $post->post_desc = $data['post_desc'];
        $post->post_time = $data['post_time'];
        $post->post_cre = $data['post_cre'];
        $post->cate_post_id = $data['cate_post_id']; 	
        $get_image = $request->file('post_images');
      
        if($get_image){
            $post_image_old= $post->post_images;
            $path='public/uploads/post/'.$post->post_images;
            unlink($path);

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post',$new_image);
            $post->post_images = $new_image;           
        }
        $post->save();
            Session::put('message','Cập nhật bài viết thành công');
            return redirect('/all-post');
    }
    
    public function delete_post($post_id){
        $this->AuthLogin();

        $post = Post::find($post_id);
        $post_images = $post->post_images;
        if ($post_images) {
            $path='public/uploads/post/'.$post->post_images;
            unlink($path);
        }
        $post->delete();

        Session::put('message','Xóa bài viết thành công');
        return Redirect::to('all-post');
    }
    // End Function Admin Page
    public function show_post(Request $request ,$cate_post_slug){
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        
        $category_post = CategoryPostModel::orderBy('cate_post_id','desc')->get(); 
        
        $catepost = CategoryPostModel::where('cate_post_slug',$cate_post_slug)->take(1)->get();
        foreach($catepost as $key => $cate){
                //seo 
                $meta_desc = $cate->cate_post_desc; 
                $meta_keywords = $cate->cate_post_slug;
                $meta_title = $cate->cate_post_name;
                $cate_post_id = $cate->cate_post_id;
                $url_canonical = $request->url();
                //--seo
                }
        $post = Post::with('cate_post')->where('post_status',0)->where('cate_post_id',$cate_post_id)->paginate(5);
        return view('pages.post.show_post')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider)
            ->with('post',$post)
            ->with('category_post',$category_post);
        }             
    public function details_post(Request $request ,$post_slug){
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        
        $category_post = CategoryPostModel::orderBy('cate_post_id','desc')->get(); 
        
        $post = Post::with('cate_post')->where('post_status',0)->where('post_slug',$post_slug)->take(1)->get();
        foreach($post as $key => $val_post){
            //seo 
            $meta_desc = $val_post->post_meta_desc; 
            $meta_keywords = $val_post->post_meta_keywords;
            $meta_title = $val_post->post_title;
            $cate_post_id = $val_post->cate_post_id;
            $url_canonical = $request->url();
            $post_id = $val_post->post_id;
            //--seo
        }
        $view_post = Post::where('post_id',$post_id)->first();
        $view_post->post_views = $view_post->post_views + 1;
        $view_post->save();
        
        $related = Post::with('cate_post')->where('post_status',0)->where('cate_post_id',$cate_post_id)
        ->whereNotIn('post_slug',[$post_slug])->take(5)->get();
        return view('pages.post.details_post')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider)
            ->with('post',$post)
            ->with('category_post',$category_post)
            ->with('related',$related);

    }
    
}