@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')
@php
if (isset($_GET['coupon'])) {
	$coupon = $_GET['coupon'];
}else{
	$coupon = '';
}
@endphp



	<!-- Start Breadcrumb Area -->
	<section class="breadcrumb-area pt-100 pb-100" style="background-image:url('{{@$genral_pages->banner}}');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb-content">
						<h2>Checkout</h2>
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><i class="fas fa-angle-double-right"></i></li>
							<li>Checkout</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Breadcrumb Area -->

	<!-- Start Shop Page -->
	<section class="section-padding-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-30">
					<div class="checkout-form-main">
						<h2>Billing details</h2>
						<form method="post" action="{{url('/payment')}}">
							@csrf
							<input type="hidden" name="coupon" value="{{$coupon}}">
							<input type="hidden" name="tax" value="{{$tax}}">
							<input type="hidden" name="discount" value="{{$coupon_discount_amount}}">
							<input type="hidden" name="total" value="{{$total}}">
							<div class="row">
								
								<div class="col-12">
									<div class="input-field">
										<label>Name *</label>
										<input type="text" name="name" id="name" >
									</div>
								</div>

								<div class="col-6">
									<div class="input-field">
										<label>E-mail *</label>
										<input type="email" name="email" id="email" >
									</div>
								</div>

								<div class="col-6">
									<div class="input-field">
										<label>Mobile *</label>
										<input type="text" name="mobile" id="mobile">
									</div>
								</div>

								<div class="col-6">
									<div class="input-field">
										<label>Country *</label>
										<input type="text" name="country" >
									</div>
								</div>

								<div class="col-6">
									<div class="input-field">
										<label>State *</label>
										<input type="text" name="state" id="state" >
									</div>
								</div>

								<div class="col-6">
									<div class="input-field">
										<label>City *</label>
										<input type="text" name="city" id="city" >
									</div>
								</div>
								
								<div class="col-6">
									<div class="input-field">
										<label>Pincode * </label>
										<input type="text" name="pincode" id="pincode" >
									</div>
								</div>

								<div class="col-12">
									<div class="input-field">
										<label>Address * </label>
										<textarea onkeyup="validatecheck()" name="address" id="address"></textarea>
									</div>
								</div>
								
							</div>
						
					</div>
				</div>
				<div class="col-lg-4 mb-30">
					<div class="checkout-summery mb-30">
						<h2>Checkout summary</h2>
						<ul>
							<li>Subtotal <span>{{@$price}}</span></li>
							<li>Shipping <span>{{@$shipping}}</span></li>
							<li>Tax <span>{{@$tax}}</span></li>
							<li>Discount <span>{{@$coupon_discount_amount}}</span></li>
							<li><b>Payable Total</b><span><b>{{@$total}}</b></span></li>
						</ul>
						<button type="submit" id="btn" disabled class="button-1 mt-10">Place Order</button>
					</div>
					{{-- <div class="checkout-summery">
						<h2>Payment method</h2>
						<div class="form-check">
                        	<label class="inline">
                        		<input class="form-check-input" type="checkbox">
                        		<span class="input"></span>Direct bank transfer 
                        	</label>
                        </div>
                        <div class="form-check">
                        	<label class="inline">
                        		<input class="form-check-input" type="checkbox">
                        		<span class="input"></span>Cash on delivery 
                        	</label>
                        </div>
                        <div class="form-check">
                        	<label class="inline">
                        		<input class="form-check-input" type="checkbox">
                        		<span class="input"></span>Check payments 
                        	</label>
                        </div>
                        <div class="form-check">
                        	<label class="inline">
                        		<input class="form-check-input" type="checkbox">
                        		<span class="input"></span>PayPal 
                        	</label>
						</div>
						
					</div> --}}
				</div>
				</form>
			</div>
		</div>
	</section>
	<!-- End Shop Page -->



	<!-- Start Subscribe Form -->
	<section class="subscribe-form pt-70 pb-20">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="subscribe-left mb-50">
						<div class="img">
							<img src="{{asset('')}}frontend_assets/img/subscribe.png" alt="img">
						</div>
						<div class="content">
							<h2>Newsletter</h2>
							<p>Subsribe here for get every single updates</p>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="subscribe-form">
						<form id="newslatter">
							<input type="email" name="email" placeholder="Enter Your Email Address">
							<button type="submit">subscribe now</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Subscribe Form -->


	<!-- End Subscribe Form -->


@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
@endsection