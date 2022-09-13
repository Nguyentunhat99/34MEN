<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Slider;
use App\Http\Requests;
use App\Models\CategoryPostModel;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Comment;
use File;
use Illuminate\Support\Facades\Redirect;

session_start();
class CommentController extends Controller
{
    public function load_comment(Request $request){
        $product_id =  $request->product_id;
        $comment = Comment::where('comment_product_id',$product_id)->where('comment_parent_comment','=',0)->where('comment_status',0)->get();
        $comment_rep = Comment::with('product')->where('comment_parent_comment','>',0)->get();
        $output = '';
        foreach($comment as $key => $cmt){
            $output .= '
            <div class="row style_comment">
            <div class="col-md-2">
            <img src="'.url('frontend/images/avatar.png').'" width="80%" class="img img-responsive img-thumbnail" alt="">
            </div>
            <div class="col-md-10">
                <p style="color: green;">@'.$cmt->comment_name.'</p>
                <p style="color: #000">@'.$cmt->comment_date.'</p>
                <p>'.$cmt->comment.'</p>
            </div>
            <p></p>
            </div>';
        
            foreach($comment_rep as $key => $rep_cmt){
            if($rep_cmt->comment_parent_comment==$cmt->comment_id){
            $output .= '
            <div class="row style_comment" style="margin:5px 0 5px 50px; background-color: lightgreen;">
            <div class="col-md-2">
            <img src="'.url('frontend/images/34.png').'" width="60%" class="img img-responsive img-thumbnail" alt="">
            </div>
            <div class="col-md-10">
            <p style="color: blue;">@34MEN-STORE</p>
            <p style="color: #000">@'.$rep_cmt->comment_date.'</p>
            <p>'.$rep_cmt->comment.'</p>
            </div>
            </div>
            <p></p>
            '; 
            }}

        }
        echo $output;

    }
    public function send_comment(Request $request){
        $comment_product_id =  $request->comment_product_id;
        $comment_name =  $request->comment_name;
        $comment_content =  $request->comment_content;
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name; 
        $comment->comment_product_id = $comment_product_id; 
        $comment->comment_status = 1; 
        $comment->comment_parent_comment = 0; 
        $comment->save();
    }
    public function list_comment(){
        $comment = Comment::with('product')->where('comment_parent_comment','=',0)->orderBy('comment_id','DESC')->get();
        return view('admin.comment.list_comment')->with(compact('comment'));
    }
    public function allow_comment(Request $request){
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }
    public function reply_comment(Request $request){
        $data = $request->all();
        $comment = new Comment;
        $comment->comment = $data['comment'];
        $comment->comment_product_id = $data['comment_product_id'];
        $comment->comment_parent_comment = $data['comment_id'];
        $comment->comment_status = 0;
        $comment->comment_name = '34MEN-STORE';
        $comment->save();
    }
}
