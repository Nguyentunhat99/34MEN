<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Slider;
use App\Models\CategoryPostModel;
use Auth;

class CategoryPost extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
                return Redirect::to('admin')->send();
        }
    }
    public function add_category_post(){
        $this->AuthLogin();
    	return view('admin.category_post.add_category');
    }
    public function all_category_post(){
        $this->AuthLogin();
        $category_post = CategoryPostModel::orderBy('cate_post_id','DESC')->paginate(10);
    	return view('admin.category_post.list_category')->with(compact('category_post'));
    }
    public function save_category_post(Request $request){
        $data = $request->all();
        $category_post = new CategoryPostModel();
        $category_post->cate_post_name = $data['cate_post_name']; 
        $category_post->cate_post_slug = $data['cate_post_slug'];  
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
    	Session::put('message','Thêm danh mục bài viết thành công');
    	return redirect()->back();
    }
    public function unactive_cate_post($cate_post_id){
        $this->AuthLogin();
        CategoryPostModel::where('cate_post_id',$cate_post_id)->update(['cate_post_status'=>1]);
        Session::put('message','Không kích hoạt danh mục bài viết thành công');
        return Redirect::to('all-category-post');
    }

    public function active_cate_post($cate_post_id){
        $this->AuthLogin();
        CategoryPostModel::where('cate_post_id',$cate_post_id)->update(['cate_post_status'=>0]);
        Session::put('message','Kích hoạt danh mục bài viết thành công');
        return Redirect::to('all-category-post');
    }
    public function edit_cate_post($cate_post_id){
        $this->AuthLogin();
        $category_post = CategoryPostModel::find($cate_post_id);
          
    	return view('admin.category_post.edit_category')->with(compact('category_post'));

    }
    public function update_cate_post(Request $request,$cate_post_id){
        $this->AuthLogin();
        $data = $request->all();
        $category_post = CategoryPostModel::find($cate_post_id);
        $category_post = new CategoryPostModel();
        $category_post->cate_post_name = $data['cate_post_name']; 
        $category_post->cate_post_slug = $data['cate_post_slug'];  
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
    	Session::put('message','Cập nhật danh mục bài viết thành công');
    	return redirect('/all-category-post');
    }
    
    public function delete_cate_post($cate_post_id){
        $this->AuthLogin();
        CategoryPostModel::where('cate_post_id',$cate_post_id)->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return Redirect::to('all-category-post');
    }
    // End Function Admin Page
               
    
}
