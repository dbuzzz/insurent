@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')
<!-- Contact Page Section -->
    <section class="contact-page-section">
		<div class="container-fluid bg-change pt-5">
			<div class="inner-container">
				<div class="row clearfix align-items-center">
					
					<!-- Info Block -->
					<div class="info-block col-lg-4 col-md-12 col-sm-12">
						<div class="inner-column">
							<ul class="list">
								<li>
								    <div class="d-flex align-items-baseline">
    									<span class="icon mr-2"><img src="{{asset('')}}frontend_assets/images/icons/call.png" alt="" /></span>
    									<strong>Call us</strong>
								    </div>
									<a href="tel:(480) 555-0103">(480) 555-0103</a>
								</li>
								<li class="text-white">
								    <div class="d-flex align-items-baseline">
    									<span class="icon mr-2"><img src="{{asset('')}}frontend_assets/images/icons/location.png" alt="" /></span>
									    <strong>Location</strong>
								    </div>
									Canberra, Australia
								</li>
								<li>
								    <div class="d-flex align-items-baseline">
    									<span class="icon mr-2"><img src="{{asset('')}}frontend_assets/images/icons/mail.png" alt="" /></span>
									    <strong>Mail us</strong>
								    </div>
									<a href="mailto:First.name@example.com">First.name@example.com</a>
								</li>
							</ul>
						</div>
					</div>
					
					<!-- Form Block -->
					<div class="form-block col-lg-8 col-md-12 col-sm-12" style=" margin-top: 4rem; ">
						<div class="inner-column">
							<!-- Title Box -->
							<div class="title-box">
								<h3>Forget Password</h3>
							</div>
							
							<!-- Contact Form -->
							<div class="contact-form">
								<form  id="forget_pass">
									@csrf
									<div class="row clearfix">
										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<input type="email" name="email" placeholder="Enter Your Registered Email" required>
										</div>
										
										<div class="form-group col-lg-12 col-md-12 col-sm-12 mb-0">
											<button class="theme-btn submit-btn" type="submit" name="submit-form">Send Otp</button>
										</div>
									</div>
								</form>
							</div>
							
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