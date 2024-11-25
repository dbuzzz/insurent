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
					<div class="image-column col-lg-4 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="image titlt" data-tilt data-tilt-max="2">
								<img src="{{asset('')}}frontend_assets/images/resource/login.jpg" alt="" />
							</div>
						</div>
					</div>
					
					<!-- Form Column -->
					<div class="form-column col-lg-8 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="icon-layer-one" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-14.png)"></div>
							<h3>My Account</h3>
							<div class="account">Already have an Account ? <a href="{{url('/user-login')}}">Login</a></div>
							<!-- Login Form -->
							<div class="styled-form">
								<form id="signup_form">
									@csrf
									
									<div class="form-group">
										<input type="text" name="name" value="" placeholder="Name" required>
									</div>
									
									<div class="form-group">
										<input type="text" name="email" value="" placeholder="Email Address" required>
									</div>

									<div class="form-group">
										<input type="number" name="mobile" value="" placeholder="Mobile" required>
									</div>
									
									<div class="form-group">
										<span data-ic="pass1" class="icon fa fa-fw fa-eye-slash" ></span>
										<input type="password" name="password" value="" id="pass1" placeholder="Password" required>
									</div>

									<div class="form-group">
										<span data-ic="pass2" class="icon fa fa-fw fa-eye-slash" ></span>
										<input type="password" name="confirm_password" id="pass2" value="" placeholder="confirm_password" required>
									</div>

									
									
									<div class="form-group">
										<button type="submit" class="theme-btn login-btn"><span class="txt">Sign up</span></button>
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