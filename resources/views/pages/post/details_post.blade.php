@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center" style="margin: 0;position: inherit;">{{$meta_title}}</h2>                
    <div class="product-image-wrapper" style="border:none;">
        @foreach($post as $key => $val_post)
            <div class="single-products" style="margin:10px 0;padding:2px;">
                {!!$val_post->post_content!!}
            </div>
            <div class="clearfix"></div>
        @endforeach
    </div>
</div>

                    
        {{-- <!--/recommended_items--> --}}
        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center" style="margin: 0;position: inherit;">Bài viết liên quan</h2>    
        
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
            @foreach($related as $key => $relate)
                <a href="{{url('/details-post/'.$relate->post_slug)}}">
                    <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center product-related">
                                        <img style="padding: 5px" src="{{URL::to('public/uploads/post/'.$relate->post_images)}}" alt="{{$relate->post_slug}}" />
                                        <h2 style="margin: 5px;color:#000;font-size:15px;font-weight:400;position: inherit;text-align:left;">{{$relate->post_title}}</h2> 
                                        <p>{!!$relate->post_desc!!}</p>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                </a>    
                   
            @endforeach		

                
                </div>
                    
            </div>
                    
        </div>
    </div>          
</div>
@endsection