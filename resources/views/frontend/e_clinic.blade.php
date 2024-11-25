@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')

	<section class="heros-sldier-area">
		<div class="hero-slider-full owl-carousel">
			<!-- Single -->
			@if(!empty($home_page))
			@foreach($home_page as $key=>$value)
			<div class="hero-slider-item" style="background-image: url('{{$value->banner}}');">
				<div class="container">
					<div class="row">
						<div class="col-lg-7 align-self-center">
							<div class="hero-slider-content">
								<h4>{{$value->sub_heading}}</h4>
								<h2>{{$value->heading}}</h2>
								{{-- <div class="hero-btn">
									<a class="button-1" href="{{route('product_list')}}">Shop Now</a>
									<a class="button-3" href="{{route('product_list',['cat_id'=>$value->cat_id])}}">Category</a>
								</div> --}}
							</div>
						</div>
						<div class="col-lg-5">
							<div class="hero-slider-rimg">
								@if($value->image1)
								<img src="{{@$value->image1}}" alt="img">
								@endif
								@if($value->image2)
								<img class="image-2" src="{{$value->image2}}" alt="img">
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
	</section>

	<!-- Larg banner -->
	{{-- <div class="pt-70 pb-20">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 mb-30 d-flex">
					<div class="lg-banner-item">
						<a href="{{url('/doctor_list')}}">
							<img src="assets/img/b1.png" alt="banner">
						</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="row">
						<div class="col-lg-12 mb-30">
							<div class="lg-banner-item">
								<a href="{{url('/doctor_list')}}">
									<img src="assets/img/b2.png" alt="banner">
								</a>
							</div>
						</div>
						<div class="col-lg-12 mb-30">
							<div class="lg-banner-item">
								<a href="{{url('/doctor_list')}}">
									<img src="assets/img/b3.png" alt="banner">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
	<!-- Larg banner -->
	
	<!-- Start Shop Category -->
	@if(!empty($home_category) and count($home_category) !=0)
	<section class="shop-category pt-20 pb-20">
		<div class="container">
			<!-- Section Headding -->
			<div class="row">
				<div class="col-lg-12">
					<div class="section-headding text-center  mb-50">
						<h2><span>Doctors by category</span></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- Single -->
				@foreach($home_category as $key=>$value)
				<div class="col-lg-3 col-6 mb-30">
					<div class="s2-cate-item">
						<div class="thumbn">
							<a href="{{route('doctor_list',['cat_id'=>$value->id])}}">
								<img src="{{$value->image}}" alt="img">
							</a>
						</div>
						<div class="con">
							<h4><a href="{{route('doctor_list',['cat_id'=>$value->id])}}">{{$value->name}}</a></h4>
						</div>
					</div>
				</div>
				@endforeach
			
			</div>
		</div>
	</section>
	@endif

	
@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
@endsection