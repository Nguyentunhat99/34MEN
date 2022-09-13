<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---------Seo--------->
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$url_canonical}}" />
    <meta name="author" content="">
    <link  rel="icon" type="image/x-icon" href="data:image/jpeg;base64,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" />
    
    {{-- <meta property="og:image" content="{{$image_og}}" />   --}}
      <meta property="og:site_name" content="http://localhost:8000/" />
      <meta property="og:description" content="{{$meta_desc}}" />
      <meta property="og:title" content="{{$meta_title}}" />
      <meta property="og:url" content="{{$url_canonical}}" />
      <meta property="og:type" content="website" />
    <!--//-------Seo--------->
    <title>{{$meta_title}}</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/lightslider.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/lightgallery.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettify.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.min.css')}}">
    

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{('frontend/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
{{-- style của mục lục bài viết --}}
<style type="text/css">
    .post ul li{
        padding: 2px;
        font-size: 16px;
    }
    .post ul li a{
        color: #000;
    }
    .post ul li a:hover{
        color: #FE980F;
    }
    .post ul li {
        list-style-type: decimal-leading-zero;
    }
    .list h1 {
        font-size: 20px;
        color: brown;
    }
</style>
<body>

    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> 0399025796</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> nguyentunhat99@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/Home')}}"><img src="{{('frontend/images/34MEN.png')}}" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>
                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                               
                                <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                                <?php
                                   $customer_id = Session::get('customer_id');
                                   $shipping_id = Session::get('shipping_id');
                                   if($customer_id!=NULL && $shipping_id==NULL){ 
                                 ?>
                                  <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                
                                <?php
                                 }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                 ?>
                                 <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                 <?php 
                                }else{
                                ?>
                                 <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php
                                 }
                                ?>
                                <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id!=NULL){ 
                              ?>
                                <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                <?php
                         }else{
                             ?>                             
                                <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                              <?php 
                          }
                              ?>
                             <?php
                             $customer_id = Session::get('customer_id');
                             if($customer_id!=NULL){ 
                           ?>
                             <li><a href="{{URL::to('/history-order')}}"><i class="fa fa-bell"></i>Lịch sử mua hàng</a></li>
                             <?php
                      }
                           ?>

                                <?php
                                   $customer_id = Session::get('customer_id');
                                   $customer_name = Session::get('customer_name');
                                   if($customer_id!=NULL){ 
                                 ?>
                                  <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất {{$customer_name}}</a></li>
                                
                                <?php
                            }else{
                                 ?>
                                 <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                 <?php 
                             }
                                 ?>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/Home')}}" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($category as $key => $cate)
                                            @if($cate->category_parent == 0)
                                                <li><a style="display: block" href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                                @foreach($category as $key => $cate_sub)
                                                    @if($cate_sub->category_parent == $cate->category_id)
                                                        <ul class="cate-sub">
                                                            <li><a style="display: block" href="{{URL::to('/danh-muc-san-pham/'.$cate_sub->category_id)}}">{{$cate_sub->category_name}}</a></li>
                                                        </ul>
                                                        @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                         @foreach($category_post as $key => $cate_post)
                                        <li><a href="{{URL::to('/show-post/'.$cate_post->cate_post_slug)}}">{{$cate_post->cate_post_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li> 
                                <li><a href="{{URL::to('/video-shop')}}">Video</a></li>
                                <li><a href="{{URL::to('/contact')}}">Liên hệ</a></li>
                                <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id!=NULL){ 
                              ?>
                                <li><a href="{{URL::to('/checkout')}}">Giỏ hàng</a></li>
                                <?php
                         }else{
                             ?>                             
                                <li><a href="{{URL::to('/login-checkout')}}">Giỏ hàng</a></li>
                              <?php 
                          }
                              ?>
                              

                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <form action="{{URL::to('/tim-kiem')}}" autocomplete="off" method="POST">
                            {{csrf_field()}}
                        <div class="search_box">
                            <input type="text" style="width:70%" name="keywords_submit" id="keywords"placeholder="Tìm kiếm..."/>
                            <button type="submit" style="margin-top:0;color:#666;width:50px;" name="search_items" class="btn btn-primary btn-sm">
                                <i class="fa fa-search"></i>
                            </button>
                            <div id="search-ajax"></div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

    @yield('slider')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                          @foreach($category as $key => $cate)
                           
                            <div class="panel panel-default">
                                @if($cate->category_parent == 0)
                                <div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#{{$cate->category_id}}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											{{$cate->category_name}}
										</a>
									</h4>
								</div>
								<div id="{{$cate->category_id}}" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
                                            @foreach($category as $key =>$cate_sub)
                                            @if($cate_sub->category_parent == $cate->category_id)
                                                <li>
                                                    <a style="display:block;"  href="{{URL::to('danh-muc-san-pham/'.$cate_sub ->category_id)}}">{{$cate_sub->category_name}}</a>
                                                </li>
                                                @endif
                                                @endforeach
										</ul>
									</div>
								</div>  
                                @endif                    
                            </div>
                        @endforeach
                        </div><!--/category-products-->
                        <div class="brands_products">
                            <h2>Sản phẩm đã xem</h2>
                            <div class="brands_name">
                                <div id="row_viewed" class="row"></div>
                            </div>
                        </div>
                        <div class="brands_products">
                            <h2>Sản phẩm yêu thích</h2>
                            <div class="brands_name">
                                <div id="row_wishlist" class="row"></div>
                            </div>
                        </div>
{{--                     
                        <div class="brands_products"><!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($brand as $key => $brand)
                                    <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                         --}}
                     
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">

                   @yield('content')
                    
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>34MEN</span>-STORE</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{('frontend/images/iframe1.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                         <img src="{{('frontend/images/iframe2.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                         <img src="{{('frontend/images/iframe3.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                         <img src="{{('frontend/images/iframe4.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="{{('frontend/images/map.png')}}" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Mens</a></li>
                                <li><a href="#">Womens</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->


  
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('frontend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('frontend/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('frontend/js/lightslider.js')}}"></script>
    <script src="{{asset('frontend/js/prettify.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend/js/simple.money.format.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    

    
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0" nonce="ai7AEN19"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#imageGallery").lightSlider({
                gallery: true,
                item:1,
                loop: true,
                thumbItem:3,
                slideMargin: 0,
                enableDrag:false,
                currentPagerPosition: 'left',
                onSliderLoad: function (el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide'
                    });
                }
            });
        });
        </script>
    <script>
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                if (parseInt(cart_product_qty)>parseInt(cart_product_quantity)) {
                    alert('Hãy đặt nhỏ hơn'+cart_product_quantity);
                }else{
                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,
                            cart_product_name:cart_product_name,
                            cart_product_image:cart_product_image,
                            cart_product_price:cart_product_price,
                            cart_product_qty:cart_product_qty,
                            cart_product_quantity:cart_product_quantity,
                            _token:_token},
    
                            success:function(data){
                                // alert(data);
                                swal({
                                        title: "Đã thêm sản phẩm vào giỏ hàng",
                                        text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                        showCancelButton: true,
                                        cancelButtonText: "Xem tiếp",
                                        confirmButtonClass: "btn-success",
                                        confirmButtonText: "Đi đến giỏ hàng",
                                        closeOnConfirm: false
                                    },
                                    function() {
                                        window.location.href = "{{url('/cart-ajax')}}";
                                    });
                                }
                            });

                }
            });
        });
    </script>
    
{{-- 
<script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
<script>paypal.Buttons().render('body');</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2339123679735877&autoLogAppEvents=1"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){

                var id = $(this).data('id_product');
                // alert(id);
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                    alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
                }else{

                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                        success:function(){

                            swal({
                                    title: "Đã thêm sản phẩm vào giỏ hàng",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến giỏ hàng",
                                    closeOnConfirm: false
                                },
                                function() {
                                    window.location.href = "{{url('/checkout')}}";
                                });

                        }

                    });
                }

                
            });
        });
     </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
        });
          
     </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if(matp == '' && maqh =='' && xaid ==''){
                    alert('Làm ơn chọn để tính phí vận chuyển');
                }else{
                    $.ajax({
                        url : '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                        location.reload(); 
                    }
                    });
                } 
        });
    });
    </script>
    <script type="text/javascript">
    
              $(document).ready(function(){
                $('.send_order').click(function(){
                    swal({
                      title: "Xác nhận đơn hàng",
                      text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonClass: "btn-danger",
                      confirmButtonText: "Cảm ơn, Mua hàng",
    
                        cancelButtonText: "Đóng,chưa mua",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm){
                         if (isConfirm) {
                            var shipping_email = $('.shipping_email').val();
                            var shipping_name = $('.shipping_name').val();
                            var shipping_address = $('.shipping_address').val();
                            var shipping_phone = $('.shipping_phone').val();
                            var shipping_notes = $('.shipping_notes').val();
                            var shipping_method = $('.payment_select').val();
                            var order_fee = $('.order_fee').val();
                            var order_coupon = $('.order_coupon').val();
                            var _token = $('input[name="_token"]').val();
    
                            $.ajax({
                                url: '{{url('/confirm-order')}}',
                                method: 'POST',
                                data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                                success:function(){
                                    // alert("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                                   swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                                }
                            });
    
                            window.setTimeout(function(){ 
                                location.reload();
            // window.location.href="{{url('/history-order')}}";
                                
                            } , 3000);
    
                          } 
                          else {
                            swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");
                          }
                  
                    });
    
                   
                });
            });
        
    </script>
    
<script type="text/javascript">
    $(document).on('click','.watch-video',function(){
        var video_id = $(this).attr('id');
        var _token = $('input[name="_token"]').val();
            $.ajax({
                    url : '{{url('/watch-video')}}',
                    method: 'POST',
                    dataType:'JSON',
                    data:{video_id:video_id,_token:_token},
                    success:function(data){
                        $('#video_title').html(data.video_title);
                        $('#video_link').html(data.video_link);
                        $('#video_desc').html(data.video_desc);
                    }
                });
    });

</script>
<script type="text/javascript">
    $('#keywords').keyup(function(){
        var query = $(this).val();
        if(query != ''){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                    url : '{{url('/autocomplete-ajax')}}',
                    method: 'POST',
                    data:{query:query,_token:_token},
                    success:function(data){
                        $('#search-ajax').fadeIn();
                        $('#search-ajax').html(data);
                    }
                });
            }else{
                $('#search-ajax').fadeOut();
            }
    });
    $(document).on('click','.li_search_ajax',function(){
        $('#keywords').val($(this).text());
        $('#search-ajax').fadeOut();
    });

</script>
<script type="text/javascript">
    $('.quickview').click(function(){
        var product_id = $(this).data('id_product');
        var _token = $('input[name="_token"]').val();
            $.ajax({
                    url : '{{url('/quickview')}}',
                    method: 'POST',
                    dataType:'JSON',
                    data:{product_id:product_id,_token:_token},
                    success:function(data){
                        $('#product_quickview_title').html(data.product_name);
                        $('#product_quickview_id').html(data.product_id);
                        $('#product_quickview_price').html(data.product_price);
                        $('#product_quickview_image').html(data.product_image);
                        $('#product_quickview_gallery').html(data.product_gallery);
                        $('#product_quickview_desc').html(data.product_desc);
                        $('#product_quickview_content').html(data.product_content);
                        $('#product_quickview_button').html(data.product_button)
                        $('#product_quickview_value').html(data.product_quickview_value);
                    }
                });    
    });

</script>
<script>
    // add to cart quickview
    $(document).ready(function(){
        $(document).on('click','.add-to-cart-quickview',function(){
            var id = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_quantity = $('.cart_product_quantity_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();
            if (parseInt(cart_product_qty)>parseInt(cart_product_quantity)) {
                    alert('Hãy đặt nhỏ hơn'+cart_product_quantity);
            }else{
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,
                        cart_product_name:cart_product_name,
                        cart_product_image:cart_product_image,
                        cart_product_price:cart_product_price,
                        cart_product_qty:cart_product_qty,
                        _token:_token},
                    beforeSend: function(){
                        $('#beforeSend_quickview').html('<p class="text text-primary">Đang thêm sản phẩm vào giỏ hàng...</p>');
                    },
                    success:function(data){
                        $('#beforeSend_quickview').html('<p class="text text-success">Sản phẩm đã thêm vào giỏ hàng</p>');
                    }
                });
            }
        });

        $(document).on('click','.redirect-cart',function(){
            window.location.href="{{url('/checkout')}}";
        });
    });
        
</script>
<script>
    $(document).ready(function(){
        load_comment();
        function load_comment(){
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : '{{url('/load-comment')}}',
                    method: 'POST',
                    data:{product_id:product_id,_token:_token},
                    success:function(data){
                        $('#comment_show').html(data);
                    }
            });
        }
        $('.send-comment').click(function(){
            var comment_product_id = $('.comment_product_id').val();
            var comment_name =  $('.comment_name').val();
            var comment_content =  $('.comment_content').val();
            var _token = $('input[name="_token"]').val();
         
            $.ajax({
                url : '{{url('/send-comment')}}',
                    method: 'POST',
                    data:{comment_product_id:comment_product_id,comment_name:comment_name,comment_content:comment_content,_token:_token},
                    success:function(data){
                        $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công và chờ người kiểm duyệt</span>');
                        load_comment();
                        $('#notify_comment').fadeOut(9000);
                        $('.comment_name').val('');
                        $('.comment_content').val('');
                    }
            });
        });
    });
</script>
<script>
    function remove_background(product_id){
        for(var count = 1;count <= 5;count++){
            $("#"+product_id+'-'+count).css('color','#ccc');
        }
    }
    // Hover chuột đánh giá sao
    $(document).on('mouseenter','.rating',function(){
        var index = $(this).data("index");
        var product_id = $(this).data("product_id");
        // alert(index);
        // alert(product_id);
        remove_background(product_id);
        for(var count=1;count<=index;count++){
            $('#'+product_id+'-'+count).css('color','#ffcc00');
        }
    });
    // nhả chuột ko đánh giá
    $(document).on('mouseleave','.rating',function(){
        var index = $(this).data("index");
        var product_id = $(this).data("product_id");
        var rating = $(this).data("rating");
        remove_background(product_id);
        for(var count=1;count<=rating;count++){
            $('#'+product_id+'-'+count).css('color','#ffcc00');
        }
    });
    // click sao đánh giá

    $(document).on('click','.rating',function(){
        var index = $(this).data("index");
        var product_id = $(this).data("product_id");
        var _token = $('input[name="_token"]').val();
        $.ajax({
                url : '{{url('/insert-rating')}}',
                    method: 'POST',
                    data:{index:index,product_id:product_id,_token:_token},
                    success:function(data){
                        if(data == 'done'){
                            alert("Bạn đã đánh giá "+index+" trên 5");
                            location.reload();
                        }else{
                            alert("Đăng nhập để đánh giá");
                        }
                    }
            });
    });

</script>
<script>
    $(document).ready(function(){
        var cate_id = $('.tabs_pro').data('id');
        var _token = $('input[name="_token"]').val();
        $.ajax({
                url : '{{url('/product-tabs')}}',
                    method: 'POST',
                    data:{cate_id:cate_id,_token:_token},
                    success:function(data){
                        $("#tabs-product").html(data);
                    }
            });
            $(".tabs_pro").click(function () {
                var cate_id = $(this).data('id');
                var _token = $('input[name="_token"]').val();
            $.ajax({
                url : '{{url('/product-tabs')}}',
                    method: 'POST',
                    data:{cate_id:cate_id,_token:_token},
                    success:function(data){
                        $("#tabs-product").html(data);
                    }
            });
    });  
});
</script>
<script>
    function view() {
        if(localStorage.getItem('data')!=null){
            var data = JSON.parse(localStorage.getItem('data'));
            data.reverse();
            document.getElementById('row_wishlist').style.overflow = 'scroll';
            document.getElementById('row_wishlist').style.height = '200px';

            for(i=0;i<data.length;i++){
                var name = data[i].name;
                var price = data[i].price;
                var image = data[i].image;
                var url = data[i].url;
                $('#row_wishlist').append('<div class="row" style="margin: 10px 0"><div class="col-md-4"><img src="'+image+'" width="100%" alt=""></div><div class="col-md-8 info_wishlist"><p>'+name+'</p><p style="color: #FE980F">'+price+'</p><a href="'+url+'">Đặt hàng</a></div></div>');
            }
        }
    }
    view();

    function add_wishlist(clicked_id){
        var id = clicked_id;
        var name =  document.getElementById('wishlist_productname'+id).value;
        var price =  document.getElementById('wishlist_productprice'+id).value;
        var image =  document.getElementById('wishlist_productimage'+id).src;
        var url =  document.getElementById('wishlist_producturl'+id).href;
        var newItem = {
            'url':url,
            'id':id,
            'name':name,
            'price':price,
            'image':image
        }
        if (localStorage.getItem('data')==null) {
            localStorage.setItem('data','[]');
        }  
        var old_data = JSON.parse(localStorage.getItem('data'));
        var matches = $.grep(old_data,function(obj){
            return obj.id == id;
        })
        if (matches.length) {
            alert('Sản phẩm này đã có trong mục sản phẩm yêu thích của bạn');
        }else{
            old_data.push(newItem);
            $('#row_wishlist').append('<div class="row" style="margin: 10px 0"><div class="col-md-4"><img src="'+newItem.image+'" width="100%" alt=""></div><div class="col-md-8 info_wishlist"><p>'+newItem.name+'</p><p style="color: #FE980F">'+newItem.price+'</p><a href="'+newItem.url+'">Đặt hàng</a></div></div>');
        }
        localStorage.setItem('data',JSON.stringify(old_data));
        }
</script>
<script>
    function viewed() {
        if(localStorage.getItem('viewed')!=null){
            var data = JSON.parse(localStorage.getItem('viewed'));
            data.reverse();
            document.getElementById('row_viewed').style.overflow = 'scroll';
            document.getElementById('row_viewed').style.height = '200px';

            for(i=0;i<data.length;i++){
                var name = data[i].name;
                var price = data[i].price;
                var image = data[i].image;
                var url = data[i].url;
                $('#row_viewed').append('<div class="row" style="margin: 10px 0"><div class="col-md-4"><img src="'+image+'" width="100%" alt=""></div><div class="col-md-8 info_wishlist"><p>'+name+'</p><p style="color: #FE980F">'+price+'</p><a href="'+url+'">Xem</a></div></div>');
            }
        }
    }
    viewed();
    product_viewed();
    function product_viewed(){
        var id_product = $('#product_viewed_id').val();
        if(id_product != undefined){
        var id = id_product;
        var name =  document.getElementById('viewed_productname'+id).value;
        var price =  document.getElementById('viewed_productprice'+id).value;
        var image =  document.getElementById('viewed_productimage'+id).value;
        var url =  document.getElementById('viewed_producturl'+id).value;
        var newItem = {
            'url':url,
            'id':id,
            'name':name,
            'price':price,
            'image':image
        }
        if (localStorage.getItem('viewed')==null) {
            localStorage.setItem('viewed','[]');
        }  
        var old_data = JSON.parse(localStorage.getItem('viewed'));
        var matches = $.grep(old_data,function(obj){
            return obj.id == id;
        })
        if (matches.length) {
        }else{
            old_data.push(newItem);
            $('#row_viewed').append('<div class="row" style="margin: 10px 0"><div class="col-md-4"><img src="'+newItem.image+'" width="100%" alt=""></div><div class="col-md-8 info_wishlist"><p>'+newItem.name+'</p><p style="color: #FE980F">'+newItem.price+'</p><a href="'+newItem.url+'">Xem</a></div></div>');
        }
        localStorage.setItem('viewed',JSON.stringify(old_data));
        }
        }
</script>
<script>
    function delete_compare(id){
        if (localStorage.getItem('compare')!=null) {
            var data = JSON.parse(localStorage.getItem('compare'));
            var index = data.findIndex(item => item.id === id);
            data.splice(index,1);
            localStorage.setItem('compare', JSON.stringify(data));
            document.getElementById("row_compare"+id).remove();
        }
    }
    viewed_compare();
    function viewed_compare(){
        if (localStorage.getItem('compare')!=null){
            var data = JSON.parse(localStorage.getItem('compare'));
            for(i=0;i<data.length;i++){
                var name = data[i].name;
                var price = data[i].price;
                var image = data[i].image;
                var url = data[i].url;
                var id = data[i].id;
                $('#row_compare').find('tbody').append(`
                <tr id="row_compare`+id+`">
                    <td>`+name+`</td>
                    <td>`+price+`</td>
                    <td><img src="`+image+`" alt="" width="200px"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="`+url+`">Xem sản phẩm</a></td>
                    <td onclick="delete_compare(`+id+`)">
                        <a href="" style="cursor:pointer ">Xóa so sánh</a>
                    </td>
                 </tr>`
        );
            }
        }
    }
function add_compare(product_id){
    var id = product_id;
    var name =  document.getElementById('wishlist_productname'+id).value;
    var price =  document.getElementById('wishlist_productprice'+id).value;
    var image =  document.getElementById('wishlist_productimage'+id).src;
    var url =  document.getElementById('wishlist_producturl'+id).href;
    var newItem = {
        'url':url,
        'id':id,
        'name':name,
        'price':price,
        'image':image
    }
    if (localStorage.getItem('compare')==null) {
        localStorage.setItem('compare','[]');
    }  
    var old_data = JSON.parse(localStorage.getItem('compare'));
    var matches = $.grep(old_data,function(obj){
        return obj.id == id;
    })
    if (matches.length) {
       
    }else{
        if(old_data.length<=3){
            old_data.push(newItem);
            $('#row_compare').find('tbody').append(`
                <tr id="row_compare`+id+`">
                    <td>`+newItem.name+`</td>
                    <td>`+newItem.price+`</td>
                    <td><img src="`+newItem.image+`" alt="" width="200px"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="`+url+`">Xem sản phẩm</a></td>
                    <td onclick="delete_compare(`+id+`)">
                        <a href="" style="cursor:pointer ">Xóa so sánh</a>
                    </td>
                 </tr>`
        );
        }
    }
    localStorage.setItem('compare',JSON.stringify(old_data));   
    $('#compare').modal();
}
</script>
<script>
    function cancel_order(id){
        var order_code = id;
        var reason_order = $('.reason-order').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
                url : '{{url('/cancel-order')}}',
                    method: 'POST',
                    data:{order_code:order_code,reason_order:reason_order,_token:_token},
                    success:function(data){
                        alert('Hủy đơn hàng thành công');
                        location.reload();
                    }
            });
    }
</script>
<script>
    $(document).ready(function(){
        $('#sort').on('change', function () {
            var url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });
    });
</script>
<script>
    $(document).ready(function(){
        $( "#slider-range" ).slider({
      orientation: "horizontal",
      range: true,
      min: {{$min_price_range}},
      max:{{$max_price_range}},
      values: [ {{$min_price}}, {{$max_price}} ],
      step:10000,
      slide: function( event, ui ) {
        $( "#amount_start" ).val(ui.values[ 0 ]).simpleMoneyFormat();
        $( "#amount_end" ).val(ui.values[ 1 ]).simpleMoneyFormat();

        $( "#start_price" ).val(ui.values[ 0 ]);
        $( "#end_price" ).val(ui.values[ 1 ]);
    }
});
    $( "#amount_start" ).val($( "#slider-range" ).slider( "values", 0 )).simpleMoneyFormat();
    $( "#amount_end" ).val($( "#slider-range" ).slider( "values", 1 )).simpleMoneyFormat();
    });
</script>
</body>
</html>
