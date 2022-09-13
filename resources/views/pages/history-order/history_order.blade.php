@extends('layout')
@section('content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Lịch sử mua hàng
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
     <?php
     $customer_id = Session::get('customer_id');
     if($customer_id!=NULL){ 
   ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Thứ tự</th>
            <th>Mã đơn hàng</th>
            <th>Ngày tháng đặt hàng</th>
            <th>Tình trạng đơn hàng</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php 
          $i = 0;
          @endphp
          @foreach($getorder as $key => $ord)
            @php 
            $i++;
            @endphp
          <tr>
            <td><i>{{$i}}</i></label></td>
            <td>{{ $ord->order_code }}</td>
            <td>{{ $ord->created_at }}</td>
            <td>@if($ord->order_status==1)
              Đơn hàng mới
              @elseif($ord->order_status==2)
                  <span class="text text-success">Đã xử lý - đã giao hàng</span>
              @else 
                  <span class="text text-danger">Đơn hàng đã bị hủy</span> 
              @endif
      </td>
           
           
            <td>
              <p>
                <a href="{{URL::to('/view-history-order/'.$ord->order_code)}}" class="btn btn-success active styling-edit" ui-toggle-class="">
                                Chi tiết</a>
              </p>

              <!-- Trigger the modal with a button -->
              @if($ord->order_status==3)
              @else
              <p><button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#cancel-order">Hủy đơn hàng</button></p>
              @endif
                <!-- Modal -->
                <div id="cancel-order" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <form action="">
                      @csrf
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Lý do hủy đơn của bạn ???</h4>
                        </div>
                        <div class="modal-body">
                          <p><textarea name="" id="" class="reason-order" cols="" rows="5" placeholder="Lý do...(Bắt buộc)" required></textarea></p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" onclick="cancel_order(this.id)" id="{{ $ord->order_code }}" class="btn btn-success">Gửi</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$getorder->links('pagination::bootstrap-4')!!}
          </ul>
        </div>
      </div>
    </footer>
    <?php
}else{
    ?>  
    <p>Đăng nhập để xem đơn hàng</p><a href="{{URL::to('/login-checkout')}}">Đăng nhập</a>
   <?php 
}
    ?>
   
  </div>
</div>
@endsection