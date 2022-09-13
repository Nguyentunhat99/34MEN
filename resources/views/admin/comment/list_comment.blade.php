@extends('admin_layout')
@section('admin_content')
<style>
  .reply-cmt{
    list-style-type: decimal;
    color: blue;
    margin: 5px 40px;
  }
</style>
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách bình luận
    </div>
    <div id="notify_comment"></div>
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
            <th>Duyệt</th>
            <th>Tên người gửi</th>
            <th>Bình luận</th>
            <th>Thời gian gửi</th>
            <th>Sản phẩm</th>
            <th>Quản lý</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php 
          $i = 0;
          @endphp
          @foreach($comment as $key => $cmt)
          @php 
            $i++;
            @endphp
          <tr>
            <td>{{$i}}</td>
            <td>
            @if(  $cmt->comment_status == 1)
                <input type="button" data-comment_status="0" data-comment_id="{{$cmt->comment_id}}" id="{{$cmt->comment_product_id}}" 
                class="btn btn-primary btn-xs comment_browser_btn" value="Duyệt">
            @else
                <input type="button" data-comment_status="1" data-comment_id="{{$cmt->comment_id}}" id="{{$cmt->comment_product_id}}" 
                class="btn btn-danger btn-xs comment_browser_btn" value="Không duyệt">
            @endif

            </td>
            <td>{{ $cmt->comment_name }}</td>        

            <td>{{ $cmt->comment }} <br>
              <ul>
                @foreach($comment as $key => $cmt_reply)
                  @if($cmt_reply->comment_parent_comment == $cmt->comment_id)
                    <Trả lời:li class="reply-cmt">{{$cmt_reply->comment}}</Trả>
                  @endif
                @endforeach
              </ul>
                @if($cmt->comment_status == 0)
                <br><textarea class="form-control reply-comment_{{$cmt->comment_id}}">34MEN-STORE Xin chân thành cảm ơn quý khách đã mua hàng. Sự hài lòng của quý khách chính là động lực cho chúng tôi !!!</textarea>
                <br><button class="btn btn-default btn-xs btn-reply-comment" data-product_id="{{$cmt->comment_product_id}}" 
                data-comment_id="{{$cmt->comment_id}}">Trả lời bình luận</button>
                @endif
                
            </td>            
            <td>{{ $cmt->comment_date }}</td>            
            <td><a href="{{url('/chi-tiet-san-pham/'.$cmt->product->product_id)}}" target="_blank">{{ $cmt->product->product_name }}</a></td>                        
            <td>
              <a href="{{URL::to('/edit-product/'.$cmt->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa bình luận này không ?')" href="{{URL::to('/delete-product/'.$cmt->product_id)}}" class="active styling-edit" ui-toggle-class="">
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