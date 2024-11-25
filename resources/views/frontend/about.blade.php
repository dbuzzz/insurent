@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')
<!-- Success Section -->
    <section class="success-section">
		<div class="bottom-color-layer"></div>
		<div class="icon-layer-one" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-3.png)"></div>
		<div class="icon-layer-two" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-4.png)"></div>
		<div class="icon-layer-three" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-5.png)"></div>
		<div class="auto-container">
			<div class="row clearfix align-items-center">
			
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<h2>Finding the best insurance plan</h2>
						<div class="text">
							<p>We’re building a brand new Insurance platform that ensures financial protection from risks and improves outcomes</p>
						</div>
						<a href="{{url('/')}}#claim" class="theme-btn btn-style-three"><span class="txt">Claim your Free Consultation</span></a>
					</div>
				</div>
				
				<!-- Image Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="image">
							<img src="{{asset('')}}frontend_assets/images/resource/success.png" alt="" />
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- End Success Section -->
	
	<!-- Protect Section -->
	<section class="protect-section ">
		<div class="auto-container">
			<div class="row clearfix align-items-center">
				
				<!-- Image Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12 mb-0">
					<div class="inner-column">
						<div class="image">
							<img src="{{asset('')}}frontend_assets/images/resource/protect.jpg" alt="" />
							<a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image video-box"><span class="fa fa-play"><i class="ripple"></i></span></a>
						</div>
					</div>
				</div>
			
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title Two -->
						<div class="sec-title-two mb-4">
							<h2>About us</h2>
							<div class="text">Insurent is India’s first integrated care provider. We help companies get amazing health benefits for their teams and deliver the care with our own in-house team of 30 experienced doctors.</div>
						</div>
						<a href="{{url('/contact-us')}}" class="theme-btn btn-style-three"><span class="txt">Contact us</span></a>
						<!-- End Sec Title Two -->
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Protect Section -->
	
	<!-- Protect Section -->
	<section class="feedback-box sec-title centered">
		<h2 class="mt-0 mb-5">Founders</h2>
		<div class="auto-container">
			<div class="row clearfix mb-5">
				
				<!-- Image Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12 mb-5">
					<div class="inner-column">
						<div class="image">
							<img src="{{asset('')}}frontend_assets/images/resource/founder2.png" alt="" />
							<div class="fright mx-auto">
							    <div class="title">Full Name</div>
							    <div class="text mt-0" style="opacity:0.5;">Founder</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12 text-left mb-0">
					<div class="inner-column">
						<!-- Sec Title Two -->
						<div class="sec-title-two mb-4">
							<div class="text">Vitae neque, tortor, orci in tincidunt dui tincidunt sed eget. Enim commodo, varius magna lectus dignissim malesuada bibendum. Tellus proin duis gravida in cursus quam sit felis, odio. Etiam ornare et id id congue est, aenean amet. Felis feugiat aliquet quam montes, facilisi ipsum id eu. Hendrerit risus sit lobortis tellus enim egestas id ac.</div>
                            <div class="text">In gravida posuere etiam scelerisque. Pellentesque tincidunt nunc urna viverra purus sed. Id ut mattis molestie quis mattis donec lorem sagittis magna. Velit, lacinia nulla mauris magna enim mauris. Vestibulum risus ut eget elementum. Congue mi dictum magna eu lacus, nulla feugiat. Dictumst adipiscing nunc, vestibulum purus. Sed dolor gravida purus est, iaculis sed orci, id.</div>
						</div>
						<!-- End Sec Title Two -->
					</div>
				</div>
				
			</div>
			<div class="row clearfix mt-3">
			
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12 text-left mb-5">
					<div class="inner-column">
						<!-- Sec Title Two -->
						<div class="sec-title-two mb-4">
							<div class="text">Vitae neque, tortor, orci in tincidunt dui tincidunt sed eget. Enim commodo, varius magna lectus dignissim malesuada bibendum. Tellus proin duis gravida in cursus quam sit felis, odio. Etiam ornare et id id congue est, aenean amet. Felis feugiat aliquet quam montes, facilisi ipsum id eu. Hendrerit risus sit lobortis tellus enim egestas id ac.</div>
                            <div class="text">In gravida posuere etiam scelerisque. Pellentesque tincidunt nunc urna viverra purus sed. Id ut mattis molestie quis mattis donec lorem sagittis magna. Velit, lacinia nulla mauris magna enim mauris. Vestibulum risus ut eget elementum. Congue mi dictum magna eu lacus, nulla feugiat. Dictumst adipiscing nunc, vestibulum purus. Sed dolor gravida purus est, iaculis sed orci, id.</div>
						</div>
						<!-- End Sec Title Two -->
					</div>
				</div>
				<!-- Image Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12 mb-0">
					<div class="inner-column">
						<div class="image">
							<img src="{{asset('')}}frontend_assets/images/resource/founder1.png" alt="" />
							<div class="fleft mx-auto">
							    <div class="title">Full Name</div>
							    <div class="text mt-0" style="opacity:0.5;">Co-founder & CEO</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Protect Section -->
	
	<!-- Team Section -->
    <section class="team-section pt-5">
		<div class="circle-layer"></div>
		<div class="circle-layer-two"></div>
		<div class="icon-layer-one" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-2.png)"></div>
		<div class="icon-layer-two" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-3.png)"></div>
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>Teams</h2>
			</div>
			<div class="row clearfix">
				<!-- Team Block -->
				<div class="team-block col-xl-3 col-lg-4 col-md-4 col-sm-6">
					<div class="inner-box">
						<div class="image p-5 bg-white d-flex justify-content-center" >
							<img src="{{asset('')}}frontend_assets/images/resource/team-1.jpg" style="border-radius:50%; height:180px; width:180px;" alt="" />
						</div>
						<div class="lower-content bg-white text-center pt-0">
							<h4><a href="#">Piency Foui</a></h4>
							<div class="designation">Social Media Intern</div>
						</div>
					</div>
				</div>
				<div class="team-block col-xl-3 col-lg-4 col-md-4 col-sm-6">
					<div class="inner-box">
						<div class="image p-5 bg-white d-flex justify-content-center" >
							<img src="{{asset('')}}frontend_assets/images/resource/team-1.jpg" style="border-radius:50%; height:180px; width:180px;" alt="" />
						</div>
						<div class="lower-content bg-white text-center pt-0">
							<h4><a href="#">Piency Foui</a></h4>
							<div class="designation">Social Media Intern</div>
						</div>
					</div>
				</div>
				<div class="team-block col-xl-3 col-lg-4 col-md-4 col-sm-6">
					<div class="inner-box">
						<div class="image p-5 bg-white d-flex justify-content-center" >
							<img src="{{asset('')}}frontend_assets/images/resource/team-1.jpg" style="border-radius:50%; height:180px; width:180px;" alt="" />
						</div>
						<div class="lower-content bg-white text-center pt-0">
							<h4><a href="#">Piency Foui</a></h4>
							<div class="designation">Social Media Intern</div>
						</div>
					</div>
				</div>
				<div class="team-block col-xl-3 col-lg-4 col-md-4 col-sm-6">
					<div class="inner-box">
						<div class="image p-5 bg-white d-flex justify-content-center" >
							<img src="{{asset('')}}frontend_assets/images/resource/team-1.jpg" style="border-radius:50%; height:180px; width:180px;" alt="" />
						</div>
						<div class="lower-content bg-white text-center pt-0">
							<h4><a href="#">Piency Foui</a></h4>
							<div class="designation">Social Media Intern</div>
						</div>
					</div>
				</div>
				<div class="team-block col-xl-3 col-lg-4 col-md-4 col-sm-6">
					<div class="inner-box">
						<div class="image p-5 bg-white d-flex justify-content-center" >
							<img src="{{asset('')}}frontend_assets/images/resource/team-1.jpg" style="border-radius:50%; height:180px; width:180px;" alt="" />
						</div>
						<div class="lower-content bg-white text-center pt-0">
							<h4><a href="#">Piency Foui</a></h4>
							<div class="designation">Social Media Intern</div>
						</div>
					</div>
				</div>
				<div class="team-block col-xl-3 col-lg-4 col-md-4 col-sm-6">
					<div class="inner-box">
						<div class="image p-5 bg-white d-flex justify-content-center" >
							<img src="{{asset('')}}frontend_assets/images/resource/team-1.jpg" style="border-radius:50%; height:180px; width:180px;" alt="" />
						</div>
						<div class="lower-content bg-white text-center pt-0">
							<h4><a href="#">Piency Foui</a></h4>
							<div class="designation">Social Media Intern</div>
						</div>
					</div>
				</div>
				<div class="team-block col-xl-3 col-lg-4 col-md-4 col-sm-6">
					<div class="inner-box">
						<div class="image p-5 bg-white d-flex justify-content-center" >
							<img src="{{asset('')}}frontend_assets/images/resource/team-1.jpg" style="border-radius:50%; height:180px; width:180px;" alt="" />
						</div>
						<div class="lower-content bg-white text-center pt-0">
							<h4><a href="#">Piency Foui</a></h4>
							<div class="designation">Social Media Intern</div>
						</div>
					</div>
				</div>
				<div class="team-block col-xl-3 col-lg-4 col-md-4 col-sm-6">
					<div class="inner-box">
						<div class="image p-5 bg-white d-flex justify-content-center" >
							<img src="{{asset('')}}frontend_assets/images/resource/team-1.jpg" style="border-radius:50%; height:180px; width:180px;" alt="" />
						</div>
						<div class="lower-content bg-white text-center pt-0">
							<h4><a href="#">Piency Foui</a></h4>
							<div class="designation">Social Media Intern</div>
						</div>
					</div>
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