@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')

	<section class="business-section-two">
		<div class="icon-layer" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-2.png)"></div>
		<div class="icon-layer-two" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-2.png)"></div>
		<div class="icon-layer-three" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-3.png)"></div>
		<div class="auto-container">
			<div class="sec-title text-center">
				<h2><span>Our</span>blogs!!</h2>
			</div>
			<div class="inner-container">
				<div class="color-layer"></div>
				<div class="color-layer-two"></div>
				<div class="icon-layer-four" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-11.png)"></div>
				<div class="row clearfix">
			
					@if(count($blog)!=0)
					@foreach($blog as $key=>$value)
					<div class="news-block-two">
						<div class="inner-box">
							<div class="row clearfix">
								<!-- Content Column -->
								<div class="content-column col-lg-6 col-md-12 col-sm-12">
									<div class="content">
										<div class="title">{{$value->cat}}</div>
										<div class="">{{date('d M Y', strtotime($value->created_at))}}</div>
										<h3><a href="{{route('blog_detail',['id'=>$value->id])}}">{{$value->name}}</a></h3>
										<div class="text">{!!substr($value->description, 0,100)!!}</div>
										<a href="{{route('blog_detail',['id'=>$value->id])}}" class="view-case">Read More <span class="arrow flaticon-right-arrow-1"></span></a>
									</div>
								</div>
								<!-- Image Column -->
								<div class="image-column col-lg-6 col-md-12 col-sm-12">
									<div class="image">
										<a href="{{route('blog_detail',['id'=>$value->id])}}"><img src="{{$value->image}}" alt="" /></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					@endif
										
				</div>
				
			</div>
		</div>
	</section>



@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
@endsection