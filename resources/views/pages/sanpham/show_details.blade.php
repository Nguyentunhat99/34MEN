@extends('layout')
@section('content')
<style>
	.lSSlideOuter .lSPager.lSGallery img {
    display: block;
    height: 100px;
    max-width: 100%;
}
.row.style_comment{
	border: 1px solid #ddd;
	border-radius: 10px;
	background: #F0F0E9;
}
</style>
@foreach($product_details as $key => $value)
<input type="hidden" id="product_viewed_id" value="{{$value->product_id}}" >
<input type="hidden" id="viewed_productname{{$value->product_id}}" value="{{$value->product_name}}" >
<input type="hidden" id="viewed_producturl{{$value->product_id}}" value="{{url('/chi-tiet-san-pham/'.$value->product_id)}}" >
<input type="hidden" id="viewed_productimage{{$value->product_id}}" value="{{asset('public/uploads/product/'.$value->product_image)}}" >
<input type="hidden" id="viewed_productprice{{$value->product_id}}" value="{{number_format($value->product_price,0,',','.')}} VNĐ" >

<div class="product-details"><!--product-details-->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb" style="background: none">
		  <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
		  <li class="breadcrumb-item"><a href="{{url('/danh-muc-san-pham/'.$cate_id)}}">{{$product_cate}}</a></li>
		  <li class="breadcrumb-item active" aria-current="page">{{$meta_title}}</li>
		</ol>
	</nav>
	<div class="col-sm-5">
		<ul class="imageGallery" id="imageGallery">
			@foreach($gallery as $key => $gal)
			<li data-thumb="{{asset('public/uploads//gallery/'.$gal->gallery_image)}}" data-src="{{asset('public/uploads//gallery/'.$gal->gallery_image)}}"> 
				<img width="100%" alt="{{$gal->gallery_image}}" src="{{asset('public/uploads//gallery/'.$gal->gallery_image)}}">	 
			</li>	
			@endforeach				
		</ul>
		
	</div>
	<div class="col-sm-7">
		<div class="product-information"><!--/product-information-->
			<img src="images/product-details/new.jpg" class="newarrival" alt="" />
			<h2>{{$value->product_name}}</h2>
			<img src="images/product-details/rating.png" alt="" />
			<form action="" method="POST">
				@csrf
				<input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">

						<input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">

						<input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">

						<input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">

						<input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
				<span>{{number_format($value->product_price,0,',','.').'VNĐ'}}</span><br>
				<label>Số lượng:</label>
				<input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}"  value="1" />
				<input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
			<input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
			</form>

			<p><b>Tình trạng:</b> Còn hàng</p>
			<p><b>Điều kiện:</b> Mới 100%</p>
			{{-- <p><b>Số lượng kho còn:</b> {{$value->product_quantity}}</p> --}}
			<p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
			<p><b>Danh mục:</b> {{$value->category_name}}</p>
			<style>
				a.tags_style {
					margin: 3px 2px;
					border: 1px solid;
					height: auto;
					background: #428bca;
					color: #fff;
					padding: 0px;
				}
				a.tags_style:hover {
					background: black;
				}
			</style>
			<fieldset>
				<legend>Tags</legend>
				<p><i class="fa fa-tag"></i></p>
					@php
						$tags = $value->product_tags;
						$tags = explode(",",$tags);
					@endphp
					@foreach($tags as $tag)
						<a href="{{url('/tag/'.Str::slug($tag))}}" class="tags_style">{{$tag}}</a>
					@endforeach
			</fieldset>
			<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
		<iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Flocalhost%3A8000&width=450&layout=standard&action=like&size=small&share=true&height=35&appId" width="450" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
	</div>
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li ><a href="#details" data-toggle="tab">Mô tả</a></li>
			<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
		
			<li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade " id="details" >
			<p>{!!$value->product_desc!!}</p>
			
		</div>
		
		<div class="tab-pane fade" id="companyprofile" >
			<p>{!!$value->product_content!!}</p>
		</div>
		
		<div class="tab-pane fade active in" id="reviews" >
			<div class="col-sm-12">
				<ul>
					<li><a href=""><i class="fa fa-user"></i>Admin</a></li>
					<li><a href=""><i class="fa fa-clock"></i>14:46 PM</a></li>
					<li><a href=""><i class="fa fa-calendar-o"></i>16.92020</a></li>
				</ul>
				<form action="">
					@csrf
					<input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value->product_id}}">
					<div id="comment_show"></div>
				</form>
				<p><b>Viết đánh giá của bạn</b></p>
				<b>Đánh giá sao</b><img src="" alt="">
{{-- Rating here --}}
				<ul class="list-inline-rating" title="Average Rating"> 
					@for($count=1; $count<=5;$count++)
						@php
							if($count<=$rating){
								$color = 'color:#ffcc00;';
							}else{
								$color = 'color:#ccc;';
							}
						@endphp
						<li title="star_rating" 
						id="{{$value->product_id}}-{{$count}}" 
						data-index="{{$count}}"
						data-product_id="{{$value->product_id}}" 
						data-rating="{{$rating}}"
						class="rating"
						style="cursor:pointer; {{$color}} font-size:30px;">&#9733;</li>
					@endfor
				</ul>

				<?php
                    $customer_name = Session::get('customer_name');
                    $customer_id = Session::get('customer_id');
					if($customer_id == NULL){ 
                ?>
				<form action="#">
					<span>
						<input style="width:100%; margin-left:0;" type="text" class="comment_name" placeholder="Bạn chưa đăng nhập hãy nhập tên gì đó" >
					</span>
					<textarea name="comment" class="comment_content" placeholder="Nội dung bình luận" ></textarea>
					<div id="notify_comment"></div>
					<button type="button" class="btn btn-default pull-right send-comment">Gửi bình luận</button>
				</form>
				<?php
                    }else{
                ?>
				<form action="#">
					<span>
						<input type="hidden" style="width:100%; margin-left:0;" value="{{$customer_name}}" type="text" class="comment_name" placeholder="Tên bình luận" >
					</span>
					<textarea name="comment" class="comment_content" placeholder="Nội dung bình luận" ></textarea>
					<div id="notify_comment"></div>
					<button type="button" class="btn btn-default pull-right send-comment">Gửi bình luận</button>
				</form>
				<?php 
					}
				?>
			</div>
		</div>		
	</div>
</div><!--/category-tab-->
@endforeach

<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">Sản phẩm liên quan</h2>
	
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
		@foreach($relate as $key => $lienquan)
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						 <div class="single-products">
							<div class="productinfo text-center product-related">
								<form action=""> 
									@csrf
									<input type="hidden" value="{{$lienquan->product_id}}" class="cart_product_id_{{$lienquan->product_id}}">
									<input type="hidden" value="{{$lienquan->product_name}}" class="cart_product_name_{{$lienquan->product_id}}">
									<input type="hidden" value="{{$lienquan->product_quantity}}" class="cart_product_quantity_{{$lienquan->product_id}}">
									<input type="hidden" value="{{$lienquan->product_image}}" class="cart_product_image_{{$lienquan->product_id}}">
									<input type="hidden" value="{{$lienquan->product_price}}" class="cart_product_price_{{$lienquan->product_id}}">
									<input type="hidden" value="1" class="cart_product_qty_{{$lienquan->product_id}}">

								<a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}">
									<img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
									<h2>{{number_format($lienquan->product_price,0,',','.').' '.'VNĐ'}}</h2>
									<p>{{$lienquan->product_name}}</p>
								</a>
								<button type="button" class="btn btn-default add-to-cart" data-id_product="{{$lienquan->product_id}}" name="add-to-cart" style="margin-top:10px">Thêm vào giỏ</button>						  
							</form>
						</div>
						</div>
					</div>
				</div>
		@endforeach		
			</div>
				
		</div>
				
	</div>
</div><!--/recommended_items-->

  <ul class="pagination pagination-sm m-t-none m-b-none">
   {!!$relate->links('pagination::bootstrap-4')!!}
  </ul>
@endsection