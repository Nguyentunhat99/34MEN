@extends('layout')
@section('slider')
@include('pages.include.slide');
@endsection
@section('content')
				<style>
					h5.modal-title.product_quickview_title{
						text-align: center;
						font-size: 25px;
						color: brown;
					}
					p.quickview{
						font-size: 14px;
						color: brown;
					}
					span#product_quickview_title{
						width: 100%;
					}
			
						@media screen and (min-width: 768px) {
							.modal-dialog {
								width: 1000px;
							}
							.modal-sm {
								width: 350px;
							}
						}
						@media screen and (min-width: 992px) {
							.modal-lg {
								width: 1200px;
							}
						}
					ul.nav.nav-pills.nav-justified li {
						text-align: center;
						font-size: 13px;
					}
					.button_wishlist {
						border: none;
						background: #fff;
						color: #83AFA8;
					}

					ul.nav.nav-pills.nav-justified i {
						color: #83AFA8;
					}
					.button_wishlist span:hover{
						color: #FE980F;
					}
					.button_wishlist:focus {
						border: none;
						outline: none;
					}

				</style>
<div class="features_items"><!--features_items-->
	<div class="category-tab">
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				@php
					$i = 0;	
				@endphp
					{{-- <li class="tabs_product" data-id="{{$cat_tabs->category_id}}" id="{{$i=1?'tabs_id':''}}" class="{{$i==1 ? 'active':''}} tab_pro"> --}}
	
				@foreach($cate_pro_tabs as $key => $cat_tab)
					@php
						$i++;
					@endphp
				<li class="tabs_pro {{$i==1?'active':''}}" data-id="{{$cat_tab->category_id}}" >
					<a href="#{{$cat_tab->product_id}}" data-toggle="tab">
						{{$cat_tab->category_name}}
					</a>
				</li>
				@endforeach
			</ul>
		</div>	
		<div id="tabs-product"></div>
	</div>
       
                        <h2 class="title text-center">Sản phẩm mới nhất</h2>
                        
                        @foreach($all_product as $key => $product)
                        <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<form action=""> 
											@csrf
                                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                            <input id="wishlist_productname{{$product->product_id}}" type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                                            <input  type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                            <input id="wishlist_productprice{{$product->product_id}}" type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

											<a id="wishlist_producturl{{$product->product_id}}" href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
												<img id="wishlist_productimage{{$product->product_id}}" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
												<h2>{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</h2>
												<p>{{$product->product_name}}</p>
											</a>
											<button type="button" data-toggle="modal" data-target="#quickview" class="btn btn-default quickview" data-id_product="{{$product->product_id}}" name="quickview">Xem nhanh</button><br>
											<?php
												$customer_id = Session::get('customer_id');
												if($customer_id!=NULL){ 
											?>
												<button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart" style="margin-top:10px">Thêm vào giỏ</button>
												<?php
									  		}else{
												  ?>                             
											   <a type="button" style="margin-top:10px;" class="btn btn-default" href="{{URL::to('/login-checkout')}}">Thêm vào giỏ</a>
										   	<?php 
									   		}
										   	?>
										</form>
									</div>
								</div>
								<div class="choose" style="margin-top: 15px">
									<ul class="nav nav-pills nav-justified">
										<li>
											<i class="fa fa-plus-square"></i>
											<button class="button_wishlist" id="{{$product->product_id}}" onclick="add_wishlist(this.id);">
												<span>Yêu thích</span>
											</button>	
										</li>
										<li><a style="cursor: pointer" onclick="add_compare({{$product->product_id}})"><i class="fa fa-plus-square"></i>So sánh</a></li>
									</ul>
								</div>
							</div>
						</div>
                        @endforeach
</div>                   

        <!--/recommended_items-->

		<!-- Modal -->
		<div class="container-fluid">
			<div id="compare" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<div id="notify"></div>
							<h4 class="modal-title">
								<div class="title-compare">Chỉ cho phép so sánh tối đa 4 sản phẩm'</div>
							</h4>
						</div>
						<div class="modal-body">
							<table class="table table-hover" id="row_compare">
								<thead>
									<tr>
										<th>Tên</th>
										<th>Gía</th>
										<th>Hình ảnh</th>
										<th>Thuộc tính</th>
										<th>Thông tin kỹ thuật</th>
										<th>Nội dung</th>
										<th>Quản lý</th>
										<th>Xóa</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
<div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title product_quickview_title" id="">
			<span id="product_quickview_title"></span>
		  </h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <div class="row">
			<div class="col-md-5">
				<span id="product_quickview_image"></span>
				<span id="product_quickview_gallery"></span>
			</div>
			<form action="">
				@csrf
				<div id="product_quickview_value"></div>
				<div class="col-md-7">
					<h2 class="quickview"><span id="product_quickview_title"></span></h2>
				<p>Mã ID: <span id="product_quickview_id"></span></p>
				<span>
					<h2 style="color: #FE980F">Gía sản phẩm: <span id="product_quickview_price"></span></h2><br>
					<label for="Số lượng"></label>
				</span><br>
				<p class="quickview" style="font-size: 30px; color:brown;font-weight:bold;">Mô tả sản phẩm</p>
				<fieldset>
					<span style="width:100%" id="product_quickview_desc"></span>
					<span style="width:100%" id="product_quickview_content"></span>
				</fieldset>
				<div id="product_quickview_button"></div>
				<div id="beforeSend_quickview"></div>
			</div>
		</form>
		</div>
	</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
		  <button type="button" class="btn btn-primary redirect-cart">Tới giỏ hàng</button>
		</div>
	  </div>
	</div>
  </div>
		<ul class="pagination pagiination-sm m-t-none m-b-none">
			{!!$all_product->links('pagination::bootstrap-4')!!}
		</ul>
@endsection