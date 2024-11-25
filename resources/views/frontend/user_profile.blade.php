@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')
<section class="team-section">
		<div class="circle-layer"></div>
		<div class="circle-layer-two"></div>
		<div class="icon-layer-one" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-2.png)"></div>
		<div class="icon-layer-two" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-3.png)"></div>
		<div class="auto-container">
			
			<div class="row clearfix">
				<!-- Team Block -->
				<div class="team-block col-xl-3 col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="case-detail.html"><img src="{{asset('')}}frontend_assets/images/resource/team-1.jpg" alt="" /></a>
						</div>
						<div class="lower-content">
							<h4><a href="case-detail.html">{{Auth::user()->name}}</a></h4>
							<div class="designation">{{Auth::user()->email}}</div>
						</div>
					</div>
				</div>
				<div class="form-column col-lg-8 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="icon-layer-one" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-14.png)"></div>
							<h3>My Account</h3>
							
							<!-- Login Form -->
							<div class="styled-form">
								<form id="update_profile">
									@csrf
								<div class="row">
									<div class="form-group col-lg-12">
										<input type="text" name="name" value="{{Auth::user()->name}}" placeholder="Name" required>
									</div>
									
									<div class="form-group col-lg-12">
										<input type="text" name="email" value="{{Auth::user()->email}}" placeholder="Email Address" required>
									</div>

									<div class="form-group col-lg-12">
										<input type="number" name="mobile" value="{{Auth::user()->mobile}}" placeholder="Mobile" required>
									</div>
									
									<div class="form-group col-lg-12">
										<span data-ic="pass1" class="icon fa fa-fw fa-eye-slash" ></span>
										<input type="password" name="password" value="" id="pass1" placeholder="Password" required>
									</div>

									<div class="form-group col-lg-12">
										<span data-ic="pass2" class="icon fa fa-fw fa-eye-slash" ></span>
										<input type="password" name="confirm_password" id="pass2" value="" placeholder="confirm_password" required>
									</div>

									<div class="form-group col-lg-4">
										<span>Aadhar Front</span>
										<input type="file" value="" id="aadhar_front" name="aadhar_front" required>
									</div>

									<div class="form-group col-lg-4">
										<span>Aadhar Back</span>
										<input type="file" id="aadhar_back" name="aadhar_back" value="" placeholder="confirm_password" required>
									</div>

									<div class="form-group col-lg-4">
										<span>PAN</span>
										<input type="file" id="pan" name="pan" value="" placeholder="confirm_password" required>
									</div>

									<div class="form-group col-lg-4">
										<img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image">
									</div>
									<div class="form-group col-lg-4">
										<img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image1">
									</div>
									<div class="form-group col-lg-4">
										<img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image2">
									</div>

									
									
									<div class="form-group">
										<button type="submit" class="theme-btn login-btn"><span class="txt">Update</span></button>
									</div>

								</div>
									
								</form>
							</div>
						</div>
						
						<!-- CopyRight -->
						
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