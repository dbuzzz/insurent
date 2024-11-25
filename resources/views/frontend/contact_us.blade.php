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
								<h3>Contact Now</h3>
								<div class="text">After a swift onboarding, connect with dedicated advisors who will help from start to finish</div>
							</div>
							
							<!-- Contact Form -->
							<div class="contact-form">
								<form  id="save_form">
									@csrf
									<div class="row clearfix">
										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<input type="text" name="name" placeholder="Name" required>
										</div>
										
										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<input type="email" name="email" placeholder="Email" required>
										</div>
										
										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<input type="text" name="phone" placeholder="Phone" required>
										</div>
										
										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<textarea name="message" placeholder="message"></textarea>
										</div>
									
										<div class="form-group col-lg-12 col-md-12 col-sm-12 mb-0">
											<button class="theme-btn submit-btn" type="submit" name="submit-form">Send Message</button>
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
	<!-- End Contact Page Section -->
	
	<!--Blogs-->
	<section class="business-section-two">
		<div class="icon-layer" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-2.png)"></div>
		<div class="icon-layer-two" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-2.png)"></div>
		<div class="icon-layer-three" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-3.png)"></div>
		<div class="auto-container">
			<div class="sec-title text-center">
				<h2><span>Discover</span> our blogs!!</h2>
			</div>
			<div class="inner-container">
				<div class="color-layer"></div>
				<div class="color-layer-two"></div>
				<div class="icon-layer-four" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-11.png)"></div>
				<div class="row clearfix">
			
					<!-- Business Block -->
					<div class="blog col-lg-12 col-md-12 col-sm-12 mb-5">
						<div class="inner-box">
							<div class="content d-flex align-items-center">
								<div class="icon w-100">
									<img src="{{asset('')}}frontend_assets/images/blog.png" alt="blog" class="w-100" />
								</div>
								<div class="author-img">
								    <img src="./{{asset('')}}frontend_assets/images/author_img.png" alt="author's img" class="img-fluid"> 
								</div>
								<div class="blog-content">
    								<div class="code">5 min read</div>
    								<h3><a href="#">De Finibus Bonorum et Maloru ducimus qui blandis pra..</a></h3>
    								<div class="text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, quia non numquam...</div>
    								<div class="d-flex align-items-center justify-content-between blog-details">
    								    <div class="author-name">
    								        <span>Posted by </span>Justin Benito
    								    </div>
    								    <div class="date">
    								        <span>Posted on Sep 4, 2022</span>
    								    </div>
    								</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Business Block -->
					<div class="blog col-lg-12 col-md-12 col-sm-12 mb-5">
						<div class="inner-box">
							<div class="content d-flex align-items-center">
								<div class="icon w-100">
									<img src="{{asset('')}}frontend_assets/images/blog.png" alt="blog" class="w-100"/>
								</div>
								<div class="author-img">
								    <img src="./{{asset('')}}frontend_assets/images/author_img.png" alt="author's img" class="img-fluid"> 
								</div>
								<div class="blog-content">
    								<div class="code">5 min read</div>
    								<h3><a href="#">De Finibus Bonorum et Maloru ducimus qui blandis pra..</a></h3>
    								<div class="text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, quia non numquam...</div>
    								<div class="d-flex align-items-center justify-content-between blog-details">
    								    <div class="author-name">
    								        Posted by <span>Justin Benito </span>
    								    </div>
    								    <div class="date">
    								        <span>Posted on Sep 4, 2022</span>
    								    </div>
    								</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
	</section>
	
	<!--FAQ Section-->
	<section class="banner-section pt-5 pb-5">
	    <div class="auto-container">
			<div class="sec-title text-center">
				<h2><span>Frequently </span> asked questions?</h2>
			</div>
	        	<div class="accordion" id="accordionExample">
                  <div class="card">
                    <div class="card-header p-0" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left text-wrap" style="white-space: inherit;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          De Finibus Bonorum et Maloru ducimus qui blandis?
                        </button>
                      </h2>
                    </div>
                
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                	  Quisque rutrum. Aenean imperdi. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget.
                      </div>
                    </div>
                  </div>
                  <P></P>
                  <div class="card">
                    <div class="card-header p-0" id="headingTwo">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" style="white-space: inherit;" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          De Finibus Bonorum et Maloru ducimus qui blandis?
                        </button>
                      </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body">
                	  Quisque rutrum. Aenean imperdi. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget.
                    </div>
                  </div>
                  </div>
                  <p></p>
                  <div class="card">
                    <div class="card-header p-0" id="headingThree">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" style="white-space: inherit;" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          De Finibus Bonorum et Maloru ducimus qui blandis?
                        </button>
                      </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                      <div class="card-body">
                	  Quisque rutrum. Aenean imperdi. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget.
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