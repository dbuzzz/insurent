@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')

	<section class="login-section">
		<div class="left-color-bar"></div>
		<div class="right-color-bar"></div>
		<div class="icon-layer-three" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-9.png)"></div>
		<div class="auto-container">
			<div class="inner-container">
				<div class="icon-layer-two" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-1.png)"></div>
				<div class="row clearfix">
				
					<!-- Image Column -->
					<div class="image-column col-xl-4 col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="image titlt" data-tilt data-tilt-max="2">
								<img src="{{asset('')}}frontend_assets/images/resource/login.jpg" alt="" />
							</div>
						</div>
					</div>
					
					<!-- Form Column -->
					<div class="form-column col-xl-8 col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="icon-layer-one" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-14.png)"></div>
							<h3>OTP Verification</h3>
							
							<!-- Login Form -->
							<div class="styled-form">
								
								<form id="otp_vrify">
									@csrf
									<input type="hidden" name="id" value="{{$id}}">
									
									<div class="form-group">
										<input type="text" name="otp" value="" placeholder="otp" required>
									</div>
									
									<div class="form-group">
										<button type="submit" class="theme-btn login-btn"><span class="txt">Verify</span></button>
									</div>
								</form>
							</div>
						</div>
						
						<!-- CopyRight -->
						
						
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
<script src="{{url('frontend_assets/custom_js/user_login.js')}}"></script>
@endsection