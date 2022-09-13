@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật bài viết
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-post/'.$post->post_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bài viết</label>
                                    <input type="text" value="{{$post->post_title}}" class="form-control"  name="post_title" onkeyup="ChangeToSlug()" 
                                    data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự" value="{{old('post_title')}}" id="slug" placeholder="tên bài viết" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" value="{{$post->post_slug}}" class="form-control"  name="post_slug"  
                                    data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự" id="convert_slug" placeholder="slug" value="{{old('post_slug')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="post_desc" id="ckeditor1"
                                     value="{{old('post_desc')}}" placeholder="Mô tả bài viết">{{$post->post_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung bài viết</label>                    
                                    <textarea style="resize: none" value="{{$post->post_content}}" rows="8" class="form-control" name="post_content" 
                                    id="ckeditor2" placeholder="Mô tả bài viết" value="{{old('post_content')}}">{{$post->post_content}}"</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Từ khóa bài viết</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="post_meta_desc" 
                                    id="exampleInputPassword1" placeholder="Mô tả bài viết" value="{{old('post_meta_desc')}}">{{$post->post_meta_desc}}"</textarea>
                                </div><div class="form-group">
                                    <label for="exampleInputPassword1">Từ khóa nội dung</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="post_meta_keywords" 
                                    id="exampleInputPassword1" placeholder="Mô tả bài viết" value="{{old('post_meta_keywords')}}">{{$post->post_meta_keywords}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                    <input type="file" name="post_images" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/uploads/post/'.$post->post_images)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày tạo</label>
                                    <input type="date" value="{{$post->post_time}}" name="post_time" class="form-control" id="exampleInputEmail1" value="{{old('post_time')}}">
                                </div><div class="form-group">
                                    <label for="exampleInputEmail1">Tác giả</label>
                                    <input type="text" value="{{$post->post_cre}}" name="post_cre" class="form-control" id="exampleInputEmail1" value="{{old('post_cre')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thuộc danh mục</label>
                                    <select name="cate_post_id" class="form-control input-sm m-bot15">
                                        @foreach($cate_post as $key => $cate)
                                            @if($cate->cate_post_id==$post->cate_post_id)
                                            <option selected value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                                            @else
                                            <option value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                                            @endif
                                        @endforeach
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="post_status" class="form-control input-sm m-bot15">
                                           <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_post" class="btn btn-info">Thêm bài viết</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection