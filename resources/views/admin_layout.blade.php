<!DOCTYPE html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}" >
<meta name="csrf-token" content="{{csrf_token()}}">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet"/>
<link href="{{asset('backend/css/jquery.dataTables.min.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('backend/css/morris.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{asset('backend/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/css/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/css/bootstrap-tagsinput.css')}}" type="text/css"/>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
{{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"> --}}
<!-- calendar -->
<link rel="stylesheet" href="{{asset('backend/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->


</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a target="_blank" href="{{url('/')}}" class="logo">
        ADMIN 
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{('backend/images/2.png')}}">
                <span class="username">
                	<?php
					$name = Auth::user()->admin_name;
					if($name){
						echo $name;
					}
					?>

                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{URL::to('/logout-auth')}}"><i class="fa fa-key"></i>????ng xu???t</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>T???ng quan</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Banner</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-slider')}}">Th??m slider</a></li>
                        <li><a href="{{URL::to('/manage-slider')}}">Li???t k?? slider</a></li>              
                    </ul>
                 </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>????n h??ng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manage-order')}}">Qu???n l?? ????n h??ng</a></li>                     
                    </ul>
                 </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh m???c s???n ph???m</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Th??m danh m???c s???n ph???m</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Li???t k?? danh m???c s???n ph???m</a></li>
                      
                    </ul>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Th????ng hi???u s???n ph???m</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product')}}">Th??m hi???u s???n ph???m</a></li>
						<li><a href="{{URL::to('/all-brand-product')}}">Li???t k?? th????ng hi???u s???n ph???m</a></li>
                      
                    </ul>
                </li>
                  <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>S???n ph???m</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">Th??m s???n ph???m</a></li>
						<li><a href="{{URL::to('/all-product')}}">Li???t k?? s???n ph???m</a></li>
                      
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>M?? gi???m gi??</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/insert-coupon')}}">Qu???n l?? m?? gi???m gi??</a></li>
                        <li><a href="{{URL::to('/list-coupon')}}">Li???t k?? m?? gi???m gi??</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>V???n chuy???n</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/delivery')}}">Qu???n l?? v???n chuy???n</a></li>    
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>B??i vi???t</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-category-post')}}">Th??m danh m???c b??i vi???t</a></li>
                        <li><a href="{{URL::to('/all-category-post')}}">Li???t k?? danh m???c b??i vi???t</a></li>
                        <li><a href="{{URL::to('/add-post')}}">Th??m b??i vi???t</a></li>
                        <li><a href="{{URL::to('/all-post')}}">Li???t k?? b??i vi???t</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Video</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/video')}}">Th??m video</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>B??nh lu???n</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/list-comment')}}">Li???t k?? b??nh lu???n</a></li>
                    </ul>
                </li>
                @impersonate
                <li class="sub-menu">
                    <a href="{{URL::to('/impersonate-destroy')}}">
                        <i class="fa fa-book"></i> D???ng chuy???n quy???n</a></span>
                    </a>
                </li>
                @endimpersonate
                @hasRole(['admin','author'])
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
                         <li><a href="{{URL::to('/add-users')}}">Th??m user</a></li>
                        <li><a href="{{URL::to('/users')}}">Li???t k?? user</a></li>
                      
                    </ul>
                </li>
                @endhasRole
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
        @yield('admin_content')
    </section>
 {{-- <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>Trang qu???n tr??? Admin</p>
			</div>
		  </div>
  <!-- / footer --> --}}
</section>
<!--main content end-->
</section>
<script src="{{asset('backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('backend/js/raphael-min.js')}}"></script>
<script src="{{asset('backend/js/morris.js')}}"></script>
<script src="{{asset('backend/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('backend/js/jquery-ui.min.js')}}"></script>
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> --}}


<script src="{{asset('backend/js/bootstrap.js')}}"></script>
<script src="{{asset('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('backend/js/scripts.js')}}"></script>
<script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('backend/js/jquery.form-validator.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/js/simple.money.format.js')}}"></script>

<script type="text/javascript">
 
    function ChangeToSlug()
        {
            var slug;
         
            //L???y text t??? th??? input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //?????i k?? t??? c?? d???u th??nh kh??ng d???u
                slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
                slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
                slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
                slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
                slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
                slug = slug.replace(/??|???|???|???|???/gi, 'y');
                slug = slug.replace(/??/gi, 'd');
                //X??a c??c k?? t??? ?????t bi???t
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
                slug = slug.replace(/ /gi, "-");
                //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
                //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox c?? id ???slug???
            document.getElementById('convert_slug').value = slug;
        }
</script>
<script type="text/javascript">
    $('.update_quantity_order').click(function(){
        var order_product_id = $(this).data('product_id');
        var order_qty = $('.order_qty_'+order_product_id).val();
        var order_code = $('.order_code').val();
        var _token = $('input[name="_token"]').val();
        // alert(order_product_id);
        // alert(order_qty);
        // alert(order_code);
        $.ajax({
            url : '{{url('/update-qty')}}',

            method: 'POST',

            data:{_token:_token, order_product_id:order_product_id ,order_qty:order_qty ,order_code:order_code},
                // dataType:"JSON",
            success:function(data){

            alert('C???p nh???t s??? l?????ng th??nh c??ng');
             
            location.reload();                
              
            }
        });

    });
</script>
<script type="text/javascript">
    $('.order_details').change(function(){
        var order_status = $(this).val();
        var order_id = $(this).children(":selected").attr("id");
        var _token = $('input[name="_token"]').val();

        //lay ra so luong
        quantity = [];
        $("input[name='product_sales_quantity']").each(function(){
            quantity.push($(this).val());
        });
        //lay ra product id
        order_product_id = [];
        $("input[name='order_product_id']").each(function(){
            order_product_id.push($(this).val());
        });
        j = 0;
        for(i=0;i<order_product_id.length;i++){
            //so luong khach dat
            var order_qty = $('.order_qty_' + order_product_id[i]).val();
            // so luong ton kho
            var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();

            if(parseInt(order_qty)>parseInt(order_qty_storage)){
                j = j + 1;
                if(j==1){
                    alert('S??? l?????ng b??n trong kho kh??ng ?????');
                }
                $('.color_qty_'+order_product_id[i]).css('background','#FF0000');
            }
        }
        if(j==0){
          
                $.ajax({
                        url : '{{url('/update-order-qty')}}',
                            method: 'POST',
                            data:{_token:_token, order_status:order_status ,order_id:order_id ,quantity:quantity, order_product_id:order_product_id},
                            success:function(data){
                                alert('Thay ?????i t??nh tr???ng ????n h??ng th??nh c??ng');
                                location.reload();
                            }
                });
            
        }

    });
</script>
<script type="text/javascript">
    $(document).ready(function(){

        fetch_delivery();

        function fetch_delivery(){
            var _token = $('input[name="_token"]').val();
             $.ajax({
                url : '{{url('/select-feeship')}}',
                method: 'POST',
                data:{_token:_token},
                success:function(data){
                   $('#load_delivery').html(data);
                }
            });
        }
        $(document).on('blur','.fee_feeship_edit',function(){

            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
             var _token = $('input[name="_token"]').val();
            // alert(feeship_id);
            // alert(fee_value);
            $.ajax({
                url : '{{url('/update-delivery')}}',
                method: 'POST',
                data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                success:function(data){
                   fetch_delivery();
                }
            });

        });
    $('.add_delivery').click(function(){
        var city = $('.city').val();
        var province = $('.province').val();
        var wards = $('.wards').val();
        var fee_ship = $('.fee_ship').val();
        var _token = $('input[name="_token"]').val();
        // alert(city);
        // alert(province);
        // alert(wards);
        // alert(fee_ship);
        $.ajax({
            url : '{{url('/insert-delivery')}}',
            method: 'POST',
            data:{city:city, province:province, _token:_token, wards:wards, fee_ship:fee_ship},
            success:function(data){
                fetch_delivery();
            }
         }); 
    });
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            // alert(ma_id);
            // alert(_token);

            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : "{{url('/select-delivery')}}",
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        }); 
    })


</script>
<script type="text/javascript">
    $(document).ready(function(){
        load_gallery();
        function load_gallery(){
            var pro_id = $('.pro_id').val();
            var _token = $('input[name="_token"]').val();
            // alert(pro_id);
            $.ajax({
                url : '{{url('/select-gallery')}}',
                method: 'POST',
                data:{pro_id:pro_id,_token:_token},
                success:function(data){
                   $('#gallery_load').html(data);     
                }
            });
        }
        $('#file').change(function(){
            var error = '';
            var file = $('#file')[0].files;
            if (file.length > 5) {
                error +='<p>Ch??? chon ???????c t???i ??a 5 ???nh</p>';
            }
            else if(file.length == ''){
                error +='<p>Ch??a ch???n ???nh n??o</p>';
            }
            else if(file.size > 2000000){
                error +='<p>K??ch th?????c qu?? 2MB</p>';
            }

            if(error ==''){

            }else{
                $('#file').val('');
                $('#error_gallery').html('<span class="text-danger">'+error+'</spam>');
                    return false;
            }
        });
        $(document).on('blur','.edit_gal_name',function(){
            var gal_id = $(this).data('gal_id');
            var gal_text = $(this).text();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : '{{url('/update-gallery-name')}}',
                method: 'POST',
                data:{gal_id:gal_id,gal_text:gal_text,_token:_token},
                success:function(data){
                   load_gallery();
                    $('#error_gallery').html('<span class="text-danger">C???p nh???t t??n h??nh ???nh th??nh c??ng</spam>');
                }
            });
        });
        $(document).on('click','.delete-gallery',function(){
            var gal_id = $(this).data('gal_id');
            var _token = $('input[name="_token"]').val();
            if (confirm('B???n c?? mu???n x??a ???nh n??y kh??ng')) {
                $.ajax({
                    url : '{{url('/delete-gallery')}}',
                    method: 'POST',
                    data:{gal_id:gal_id,_token:_token},
                    success:function(data){
                       load_gallery();
                        $('#error_gallery').html('<span class="text-danger">X??a h??nh ???nh th??nh c??ng</spam>');
                    }
                });
            }
        });

        $(document).on('change','.file_image',function(){
            var gal_id = $(this).data('gal_id');
            var image = document.getElementById('file-'+gal_id).files[0];
            var form_data = new FormData();
            form_data.append("file",document.getElementById('file-'+gal_id).files[0]);
            form_data.append("gal_id",gal_id);
                $.ajax({
                    url : '{{url('/update-gallery')}}',
                    method: 'POST',
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:form_data,
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                       load_gallery();
                        $('#error_gallery').html('<span class="text-danger">C???p nh???t h??nh ???nh th??nh c??ng</spam>');
                    }
                });
            // }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        load_video();
        function load_video(){
            var pro_id = $('.pro_id').val();
            var _token = $('input[name="_token"]').val();
            // alert(pro_id);
            $.ajax({
                url : '{{url('/select-video')}}',
                method: 'POST',
                headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },               
                success:function(data){
                   $('#video_load').html(data);     
                }
            });
        }
        $(document).on('click','.btn-add-video',function(){
            var video_title = $(".video_title").val(); 
            var video_slug = $(".video_slug").val(); 
            var video_link = $(".video_link").val(); 
            var video_desc= $(".video_desc").val(); 
            var form_data = new FormData();
            form_data.append("file",document.getElementById('file_img_video').files[0]);
            form_data.append("video_title",video_title);
            form_data.append("video_slug",video_slug);
            form_data.append("video_desc",video_desc);
            form_data.append("video_link",video_link);
            $.ajax({
                url : '{{url('/insert-video')}}',
                method: 'POST',      
                headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                data:form_data,  
                contentType:false,
                cache:false,
                processData:false,      
                success:function(data){
                   load_video();  
                   $('#notify').html('<span class="text text-success">Th??m video th??nh c??ng</span>'); 
                }
            });
        });
        $(document).on('blur','.video_edit',function(){
            var video_type = $(this).data('video_type');
            var video_id = $(this).data('video_id');
            if(video_type == 'video_title'){
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }else if(video_type == 'video_desc') {
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }else if(video_type == 'video_link') {
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }else{
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }
            $.ajax({
                url : '{{url('/update-video')}}',
                method: 'POST',
                headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
               
                data:{video_edit:video_edit,video_id:video_id,video_check:video_check},
                success:function(data){
                   load_gallery();
                    $('#notify').html('<span class="text-success">C???p nh???t video th??nh c??ng</spam>');
                }
            });
        });
        $(document).on('click','.btn-delete-video',function(){
            var video_id = $(this).data('video_id');
            if (confirm('B???n c?? mu???n x??a video n??y kh??ng')) {
                $.ajax({
                    url : '{{url('/delete-video')}}',
                    method: 'POST',
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{video_id:video_id},
                    success:function(data){
                       load_video();
                        $('#notify').html('<span class="text-danger">X??a video th??nh c??ng</spam>');
                    }
                });
            }
        });

        $(document).on('change','.file_img_video',function(){
            var video_id = $(this).data('video_id');
            var image = document.getElementById('file-video-'+video_id).files[0];
            var form_data = new FormData();
            form_data.append("file",document.getElementById('file-video-'+video_id).files[0]);
            form_data.append("video_id",video_id);
                $.ajax({
                    url : '{{url('/update-video-image')}}',
                    method: 'POST',
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:form_data,
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        load_video();
                        $('#notify').html('<span class="text-danger">C???p nh???t h??nh ???nh video th??nh c??ng</spam>');
                    }
                });
        });
    });
</script>
<script type="text/javascript">
    $('.comment_browser_btn').click(function (){
        var comment_status = $(this).data('comment_status');
        var comment_id = $(this).data('comment_id');
        var comment_product_id = $(this).attr('id');
        if (comment_status == 0) {
            var alert = 'B???n ???? duy???t b??nh lu???n';
        }else{
            var alert = 'Kh??ng duy???t b??nh lu???n';
        }
        $.ajax({
            url : '{{url('/allow-comment')}}',
            method: 'POST',
            data: {comment_status:comment_status,comment_id:comment_id,comment_product_id:comment_product_id},
            headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
            $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>')
            location.reload();
            }
        });
    });
    $('.btn-reply-comment').click(function(){
        var comment_id = $(this).data('comment_id');
        var comment = $('.reply-comment_'+comment_id).val();
        var comment_product_id = $(this).data('product_id');
        // alert(comment);
        // alert(comment_id);
        // alert(comment_product_id);
        $.ajax({
            url : '{{url('/reply-comment')}}',
            method: 'POST',
            data: {comment:comment,comment_id:comment_id,comment_product_id:comment_product_id},
            headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
            $('.reply-comment_'+comment_id).val('');
            $('#notify_comment').html('<span class="text text-alert">Tr??? l???i b??nh lu???n th??nh c??ng</span>')
            location.reload();
                
        }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#category-order").sortable({
            placeholder: 'ui-state-highlight',
            update : function(event,ui) {
                var page_id_array = new Array();
                var _token = $('input[name="_token"]').val();
                $('#category-order tr').each(function(){
                    page_id_array.push($(this).attr('id'));
                });
                $.ajax({
                    url : '{{url('/arrange-category')}}',
                    method: "POST",
                    data:{page_id_array:page_id_array,_token:_token},
                    success:function(data){
                        alert(data)
                    }
                })
            }
         
        });
    });

    
</script>
  
<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
</script>
<script type="text/javascript">
        $.validate({
            
        });
</script>
<script>
    $(function() {
        $('#datepicker').datepicker({
            prevText:'Th??ng tr?????c',
            nextText:'Th??ng sau',
            dateFormat:'yy-mm-dd',
            dayNamesMin:['Th??? 2','Th??? 3','Th??? 4','Th??? 5','Th??? 6','Th??? 7','Ch??? nh???t'],
            duration: 'slow'
        });
        $('#datepicker2').datepicker({
            prevText:'Th??ng tr?????c',
            nextText:'Th??ng sau',
            dateFormat:'yy-mm-dd',
            dayNamesMin:['Th??? 2','Th??? 3','Th??? 4','Th??? 5','Th??? 6','Th??? 7','Ch??? nh???t'],
            duration: 'slow'
        });
    })
</script>

<script>
$(document).ready(function() {
    chart30daysorder();
    var chart = new Morris.Bar({
        element: 'myfirstchart',
        lineColors:['#819C79','#fc8710','#FF6541','#A4ADD3','#766B56'],
        // pointFillColors: ['#ffffff'],
        // pointStrokeColors:['black'],
            // fillOpacity: 0.6,
            hideHover: 'auto',
            parseTime:false,
        xkey:'period',
        ykeys:['order','sales','profit','quantity'],
        behaveLikeLine: true,
        labels:['????n h??ng','Doanh s???','L???i nhu???n','S??? l?????ng']
    });
    function chart30daysorder(){
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url : '{{url('/days-order')}}',
            method: "POST",
            dataType:'JSON',
            data:{_token:_token},
                    success:function(data){
                        chart.setData(data);
                    }
                });
            }
            
    $('.dashboard-filter').change(function() {
        var dashboard_value = $(this).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
                url : '{{url('/dashboard-filter')}}',
                        method: "POST",
                        dataType:'JSON',
                        data:{dashboard_value:dashboard_value,_token:_token},
                        success:function(data){
                        chart.setData(data);
                    }
                });
    });

    $('#btn-dashboard-filter').click(function(){
        var _token = $('input[name="_token"]').val();
        var from_date = $('#datepicker').val();
        var to_date = $('#datepicker2').val();
        $.ajax({
            url : '{{url('/filter-by-date')}}',
            method: "POST",
            dataType:'JSON',
            data:{from_date:from_date,to_date:to_date,_token:_token},
            success:function(data){
                chart.setData(data);
            }
        });
    });
});
</script>
<script>
    $(document).ready(function(){
        var donut = Morris.Donut({
            element: 'donut',
            resize:'true',
            colors: ['#ce616a','#61a1ce','#ce8f61','#f5b942','#4842f5'],
            data: [   
                {label:'S???n ph???m',value: {{ $app_product }} },
                {label:'B??i vi???t',value: {{ $app_post }} },
                {label:'????n h??ng',value: {{ $app_order }} },
                {label:'Video',value: {{ $app_video }} },
                {label:'Kh??ch h??ng',value: {{ $app_customer }} }

            ]
        });
    });
</script>
<script>
    $('.product-format').simpleMoneyFormat();
</script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
        CKEDITOR.replace('ckeditor2');
        CKEDITOR.replace('ckeditor3');
        CKEDITOR.replace('ckeditor4');
        CKEDITOR.replace('ckeditor5');
        CKEDITOR.replace('ckeditor6');
        CKEDITOR.replace('ckeditor7');
        CKEDITOR.replace('ckeditor8');
        CKEDITOR.replace('ckeditor9');
        CKEDITOR.replace('ckeditor10');
        CKEDITOR.replace('ckeditor11');
        CKEDITOR.replace('ckeditor12');
        CKEDITOR.replace('ckeditor13');
        CKEDITOR.replace('ckeditor14');
        CKEDITOR.replace('ckeditor15');
        CKEDITOR.replace('ckeditor16');
        CKEDITOR.replace('id4');
</script>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('backend/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="{{asset('backend/js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
