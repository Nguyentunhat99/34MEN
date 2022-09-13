@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
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
            <th style="width:20px;">
              #
            </th>
            <th>Tên sản phẩm</th>
            <th>Thư viện ảnh</th>
            <th>Số lượng</th>
            <th>Giá bán</th>
            <th>Giá gốc</th>
            <th>Hình sản phẩm</th>
            <th>Tags sản phẩm</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            
            <th>Hiển thị</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php 
          $i = 0;
          @endphp
          @foreach($all_product as $key => $pro)
          @php 
            $i++;
            @endphp
          <tr>
            <td>{{$i}}</td>
            <td>{{ $pro->product_name }}</td>
            <td><a href="{{URL('/add-gallery/'.$pro->product_id)}}">Thêm thư viện ảnh</a></td>
            <td>{{ $pro->product_quantity }}</td>
            <td>{{ number_format($pro->product_price,0,',','.') }}</td>
            <td>{{ number_format($pro->product_cost,0,',','.') }}</td>
            <td><img src="public/uploads/product/{{ $pro->product_image }}" height="100" width="100"></td>
            <td>{{ $pro->product_tags }}</td>
            <td>{{ $pro->category_name }}</td>
            <td>{{ $pro->brand_name }}</td>

            <td><span class="text-ellipsis">
              <?php
               if($pro->product_status==0){
                ?>
                <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
               }
              ?>
            </span></td>
           
            <td>
              <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
  </div>
  <!-----import data---->
  <form action="{{url('import-csv-product')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
  <input type="file" name="file" accept=".xlsx"><br>

 <input type="submit" value="Import file Excel" name="import_csv" class="btn btn-warning">
</form>

<!-----export data---->
 <form action="{{url('export-csv-product')}}" method="POST">
    @csrf
 <input type="submit" value="Export file Excel" name="export_csv" class="btn btn-success">
</form>
</div>
@endsection