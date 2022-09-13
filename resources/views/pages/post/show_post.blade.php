@extends('layout')
@section('content')
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
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">{{$meta_title}}</h2>                
    <div class="product-image-wrapper" style="border:none;">
        @foreach($post as $key => $val_post)
            <div class="single-products" style="margin:10px 0;padding:2px;">
                <div class="text-center">
                    <img style="float: left; padding: 5px;" width="150px" height="150px" src="{{URL::to('public/uploads/post/'.$val_post->post_images)}}" alt="{{$val_post->post_slug}}" />
                    <h4 style="color: #000;padding:5px; text-align: left;">{{$val_post->post_title}}</h4>
                    <div style="padding:5px; text-align:left;">
                        {!!$val_post->post_desc!!}
                    </div>
                </div>
                <div class="text-right">
                    <a href="{{url('/details-post/'.$val_post->post_slug)}}" class="btn btn-default btn-sm">Xem bài viết</a>
                </div>
            </div>
            <div class="clearfix"></div>
        @endforeach
    </div>
</div>
</div>
<ul class="pagination pagination-sm m-t-none m-b-none">
    {!!$post->links('pagination::bootstrap-4')!!};
</ul>      
        {{-- <!--/recommended_items--> --}}
@endsection