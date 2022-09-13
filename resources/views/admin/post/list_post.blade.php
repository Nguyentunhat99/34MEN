@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bài viết
    </div>
    {{-- <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div> --}}
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>
            <th style="width:20px;">#</th>
            <th>Tên bài viết</th>
            <th>Slug</th>
            <th>Hình ảnh bài viết</th>
            <th>Mô tả bài viết</th>
            <th>Nội dung bài viết</th>
            <th>Từ khóa mô tả</th>
            <th>Từ khóa bài viết</th>
            <th>Tác giả</th>
            <th>Ngày tạo</th>
            <th>Thuộc danh mục</th>
            <th>Hiển thị</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @php 
          $i = 0;
          @endphp
            
          @foreach($all_post as $key => $post)
          @php 
            $i++;
            @endphp
          <tr>
            <td>{{$i}}</td>
            <td>{{ $post->post_title }}</td>
            <td>{{ $post->post_slug }}</td>
            <td><img src="{{asset('public/uploads/post/'.$post->post_images) }}" alt="" width="100"></td>
            <td>{{ $post->post_desc }}</td>
            <td>{{ $post->post_content }}</td>
            <td>{{ $post->post_meta_desc }}</td>
            <td>{{ $post->post_meta_keywords }}</td>
            <td>{{ $post->post_cre }}</td>
            <td>{{ $post->post_time }}</td>
            <td>
                @foreach($category_post as $key => $cate)
                @if($cate->cate_post_id==$post->cate_post_id)
                {{$cate->cate_post_name}}
                @endif
                @endforeach

            <td><span class="text-ellipsis">
              <?php
               if($post->post_status==0){
                ?>
                <a href="{{URL::to('/unactive-post/'.$post->post_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-post/'.$post->post_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
               }
              ?>
            </span></td>
           
            <td>
              <a href="{{URL::to('/edit-post/'.$post->post_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-post/'.$post->post_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection