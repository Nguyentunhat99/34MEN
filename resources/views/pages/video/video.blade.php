@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
       <style>
		.single-products.single-products-video{
			height: 450px;
		}
	   </style>
                        <h2 class="title text-center">Video</h2>
                        @foreach($all_video as $key => $video)
                        <div class="col-sm-4">
							<div class="product-image-wrapper">
								<form action="">
									@csrf
									<div class="single-products single-products-video ">
										<div class="productinfo text-center">
											<form action="">
												@csrf
												<a href="">
													<img src="{{asset('public/uploads/videos/'.$video->video_image)}}" alt="{{$video->video_title}}" />
													<h2>{{$video->video_title}}</h2>
													<p>{{$video->video_desc}}</p>
												</a>
												<button type="button" data-toggle="modal" data-target="#modal_video"  class="btn btn-default watch-video" id="{{$video->video_id}}" >Xem video</button>
											</form>
										</div>
									</div>
								</form>
							</div>
						</div>
                        @endforeach
</div>                   
        <!--/recommended_items-->
		<ul class="pagination pagiination-sm m-t-none m-b-none">
			{!!$all_video->links()!!}
		</ul>

  <!-- Modal -->
  <div class="modal fade" id="modal_video" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="video_title"></h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div id="video_desc"></div>
			<div id="video_link"></div>
		  </div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
		  {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
		</div>
	  </div>
	</div>
  </div>
@endsection