@extends('layout')
@section('slider')
@include('pages.include.slide');
@endsection
@section('content')
<style>
	.style-range p{
		float: left;
		width: 30%;
	}
	.clearfix{
		clear: left
	}
</style>
<div class="features_items"><!--features_items-->
    <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Flocalhost%3A8000%2FHome&layout=button_count&size=small&width=86&height=20&appId" width="86" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        @foreach($category_name as $key => $name)                     
                            <h2 class="title text-center">{{$name->category_name}}</h2>    
						@endforeach
						<div class="row" style="margin-bottom: 10px">
							<div class="col-md-4">
								<label for="amount">Sắp xếp theo</label>
									<form action="">
										@csrf
										<select name="sort" id="sort" class="form-control">
											<option value="{{Request::url()}}?sort_by=none">--Lọc--</option>
											<option value="{{Request::url()}}?sort_by=ascending">--Giá tăng dần--</option>
											<option value="{{Request::url()}}?sort_by=decrease">--Giá giảm dần--</option>
											<option value="{{Request::url()}}?sort_by=char_az">--Lọc theo tên từ A đến Z-</option>
											<option value="{{Request::url()}}?sort_by=char_za">--Lọc theo tên từ Z đến A--</option>
										</select>
									</form>
							</div>
							<div class="col-md-4">
								<label for="amount">Lọc theo giá</label>
								<form action="">
									<div class="style-range">
										<div id="slider-range"></div>
										<p>
											<input type="text" id="amount_start" readonly style="border:0; color:#f6931f; font-weight:bold;">
										</p>
										<p>
											<input type="text" id="amount_end" readonly style="border:0; color:#f6931f; font-weight:bold;">
										</p>
									</div>
									<input type="hidden" name="start_price" id="start_price">
									<input type="hidden" name="end_price" id="end_price">
									<div class="clearfix">
										<input type="submit" name="filter_price" value="Lọc" class="btn btn-default">
									</div>
								</form>
							</div>
						</div>
                        @foreach($category_by_id as $key => $product)
                        <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<form action="">
											@csrf
                                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                            {{-- <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}"> --}}
                                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

											<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
												<img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
												<h2>{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</h2>
												<p>{{$product->product_name}}</p>
												{{-- <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a> --}}
											</a>
											<button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">Thêm vào giỏ</button>
										</form>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
									</ul>
								</div>
							</div>
						</div>
                        @endforeach
                    </div><!--features_items-->
        <!--/recommended_items-->
@endsection