@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')
<!-- Banner Section -->
    <section class="banner-section">
		<div class="pattern-layer-three" style="background-image: url({{asset('')}}frontend_assets/images/main-slider/pattern-2.png)"></div>
		<div class="icon-layer-one" style="background-image: url({{asset('')}}frontend_assets/images/main-slider/icon-1.png)"></div>
		<div class="icon-layer-two" style="background-image: url({{asset('')}}frontend_assets/images/main-slider/icon-2.png)"></div>
		<div class="icon-layer-three" style="background-image: url({{asset('')}}frontend_assets/images/main-slider/icon-3.png)"></div>
		<div class="color-layer"></div>
		<div class="auto-container">
            <div class="row clearfix align-items-center">
				
				<!-- Image Column -->
				<div class="image-column col-lg-3 d-none d-lg-block col-md-6 col-sm-12">
					<div class="inner-column">
						<div class="pattern-layer-one" style="background-image: url({{asset('')}}frontend_assets/images/main-slider/pattern-1.png)"></div>
						<div class="pattern-layer-two" style="background-image: url({{asset('')}}frontend_assets/images/main-slider/pattern-1.png)"></div>
						<div class="image" data-tilt data-tilt-max="4">
							<img src="{{asset('')}}frontend_assets/images/main-2.png" alt="" />
						</div>
					</div>
				</div>
				
				<!-- Content Column -->
				<div id="claim" class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column mb-4">
						<div class="text text-center">Customised Insurance Solutions</div>
						<h1 class="text-center mb-3">Insurent - Insuring Bright Future for YOU</h1>
						<div class="d-flex align-items-center justify-content-around mt-5 mx-auto reviews">
							<div class="avatars w-100">
							    <img src="{{asset('')}}frontend_assets/images/avatar.png" alt="avatae's img" class="img-fluid img-1">
							    <img src="{{asset('')}}frontend_assets/images/avatar.png" alt="avatae's img" class="img-fluid img-2">
							    <img src="{{asset('')}}frontend_assets/images/avatar.png" alt="avatae's img" class="img-fluid img-3">
							    <img src="{{asset('')}}frontend_assets/images/avatar.png" alt="avatae's img" class="img-fluid img-4">
							    <img src="{{asset('')}}frontend_assets/images/avatar.png" alt="avatae's img" class="img-fluid img-5">
							    <span class="d-flex align-items-center justify-content-center classic-point">+7.2K</span>
							</div>
							<div class="review text-dark w-100">
							    <p class="mb-0"><strong>Rated Best Over 16.2K Reviews</strong></p>
							    <p class="mb-0">across 5 Platforms</p>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Image Column -->
				<div class="image-column col-lg-3 d-none d-lg-block col-md-6 col-sm-12">
					<div class="inner-column">
						<div class="pattern-layer-one" style="background-image: url({{asset('')}}frontend_assets/images/main-slider/pattern-1.png)"></div>
						<div class="pattern-layer-two" style="background-image: url({{asset('')}}frontend_assets/images/main-slider/pattern-1.png)"></div>
						<div class="image" data-tilt data-tilt-max="4">
							<img src="{{asset('')}}frontend_assets/images/main.png" alt="" />
						</div>
					</div>
				</div>
				
			</div>
			<div class="row clearfix" >
			    <div class="col-lg-8 mx-auto">
			        <div class="consultation-form rounded">
			            <form class="row align-items-center" method="get" action="{{url('/form')}}">
			                <div class="col-lg-4">
    			                <div class="form-group">
                                    <select name="insurance" class="form-control">
                                        {{-- <option>Insurance Type</option>     --}}
                                        <option value="1"> Health Insurance</option>    
                                        <option value="2"> Life Insurance</option>    
                                        <option value="3"> Motor Insurance</option>    
                                    </select>
    			                </div>
    			                <div class="d-flex align-items-center mb-4">
    			                    <label class="mr-2">Existing Policy</label>
    			                    <div class="form-group mb-0 mr-2">
    			                        <input type="radio" id="yes" name="policy" class="form-radio" value="1" checked>
    			                        <label for="yes">yes</label>
    			                    </div>
    			                    <div class="form-group mb-0 mr-2">
    			                        <input type="radio" id="no" name="policy" class="form-radio" value="2">
    			                        <label for="no">no</label>
    			                    </div>
    			                </div>
			                </div>
			                <div class="col-lg-3">
    			                <div class="form-group">
                                    <input name="email" required type="email" class="form-control" placeholder="Email Address">
    			                </div>
    			                <div class="form-group">
                                    <input name="phone" required type="number" class="form-control" placeholder="Phone Number">
    			                </div>
			                </div>
			                <div class="col-lg-5">
			                    {{-- <a href="#" class="theme-btn btn-style-three">
        			                <span class="txt">Claim your Free Consultation</span>
			                    </a> --}}
			                    <button type="submit" class="theme-btn btn-style-three"><span class="txt">Claim your Free Consultation</span></button>
			                </div>
			            </form>
			        </div>
			    </div>
			</div>
		</div>
	</section>
	<!-- End Banner Section -->
	
	<!--Business Section-->

	<section class="banner-section pt-5 pb-0">
	    <div class="auto-container">
	        <div class="row clearfix">
	            <div class="col-12 text-dark">
	                <h2>Here’s how it <span>works</span> :</h2>
	                <div class="text">
	                    <p>
    	                    <strong>In 4 simple steps you can get the best insurance <br> according to your requirements</strong>
    	                </p>
	                </div>
	                <div class="btns-box">
	                    <a href="{{url('/')}}#claim" class="theme-btn btn-style-three"><span class="txt">Claim your Free Consultation &nbsp; <span class="flaticon-next"></span> </span></a>
	                </div>
	            </div>
	            <div class="col-12 work-flow">
	                <div class="works">
	                    <div class="paths d-none d-lg-block">
	                        <img src="{{asset('')}}frontend_assets/images/path.png" class="img-fluid" alt="img">
	                    </div>
	                    <div class="work-content d-flex justify-content-between">
	                        <div class="step first-step">
	                            <div class="title">1</div>
	                            <div class="text">
	                                <p>Fill the Details or Get in Touch with our Advisor</p>
	                            </div>
	                        </div>
	                        <div class="step second-step">
	                            <div class="title">2</div>
	                            <div class="text">
	                                <p>We Check your Existing or Fresh Insurance</p>
	                            </div>
	                        </div>
	                        <div class="step third-step">
	                            <div class="title">3</div>
	                            <div class="text">
	                                <p>We Suggest you the Best Policy that saves you and Your Money</p>
	                            </div>
	                        </div>
	                        <div class="step four-step">
	                            <div class="title">4</div>
	                            <div class="text">
	                                <p>Our Advisor Dedicated Track Things for You</p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	
	<!--End Business Section-->
	
	<!--Custom Section-->
	
	<!--End Custom Section-->

	<section class="business-section-three">
		<div class="auto-container">
		    
			<div class="row clearfix">
			    <div class="col-12">
                    <div class="inner-column sec-title text-center text-dark mb-0">
                        <h2>Why to <sapn>choose us</sapn> as an Insurance Consultant?</h2>
                    </div>
                </div>
                <div class="col-8 mx-auto text-center fw-bold mb-4">
                        <p class="text">
                            Our Expert Agents Suggest you the Best Advices that Saves your Money and Make you Ready In the 
                            Ever Changing Dynamic World
                        </p>
                </div>
            </div>
			<div class="row clearfix align-items-center">
			
				<!-- Image Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="image wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<img src="{{asset('')}}frontend_assets/images/g12.png" alt="" />
						</div>
					</div>
				</div>
				
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="icon-layer-one" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-21.png)"></div>
						<div class="icon-layer-two" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-3.png)"></div>
						<ul class="service-list">
							<li>Compare Your Existing Insurance</li>
							<li>Hassle Free Support</li>
							<li>Exclusive Policy Updates</li>
							<li>Access to Educational Content</li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
		
        <section class="chain-section">
    		<div class="auto-container">
    			<div class="row clearfix">
    			
    				<!-- Content Column -->
    				<div class="content-column col-lg-5 col-md-12 col-sm-12">
    					<div class="inner-column">
    						<h2>Services <span>we offer</span> at Insurent</h2>
    						<div class="text">
    							<p>At Insurent we Serve Clients from Various Diversified industries</p>
    							<hr>
    							<p>
    							    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
    							    labore et dolore magna aliqua.
    							</p>
    							<hr>
    							<p>
    							    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
    							    labore et dolore magna aliqua.
    							</p>
    						</div>
    					</div>
    				</div>
    				
    				<!-- Blocks Column -->
    				<div class="blocks-column col-lg-7 col-md-12 col-sm-12">
    					<div class="inner-column">
    						<div class="color-layer-1"></div>
    						<div class="color-layer-2"></div>
    						<div class="color-layer-3"></div>
    						<div class="color-layer-4"></div>
    						<div class="color-layer-5"></div>
    						<div class="blocks-outer">
    						
    							<div class="row align-items-center">
    							    <div class="col-md-6">
            							<div class="chain-block mb-2">
            								<div class="inner-box">
            									<div class="content">
            										<div class="icon mb-2">
            										    <img src="{{asset('')}}frontend_assets/images/insurance.png" alt="insurance" class="img-fluid"> 
            										</div>
            										<h4>Health Insurance</h4>
            										<div class="">
            										    Live a Healthy Life and Protect You and your Family with a Financial Safety during 
            										    Medical Emergency at Insurent we help you Make you aware, Compare and Suggest you’re 
            										    the Best Policy for your Customized Needs.
            										</div>
            									</div>
            								</div>
            							</div>
            							<div class="chain-block mb-2">
            								<div class="inner-box">
            									<div class="content">
            										<div class="icon mb-2">
            										    <img src="{{asset('')}}frontend_assets/images/scooter.png" alt="hearbit" class="img-fluid"> 
            										</div>
            										<h4>Motor Insurance</h4>
            										<div class="">
            										    We Know you Love your Car, truck,tracktor or two-wheeler, Each Vehicle 
            										    Should be Secured under Insurance Policy of its own. At Insurant we suggest 
            										    and Compare you the best possible Insurance to Give Full Protection against 
            										    and Physical damage or loss on Vehicle in Human made or man-made calamity.
            										</div>
            									</div>
            								</div>
            							</div>
    							    </div>    
    							    <div class="col-md-6">
            							<div class="chain-block mb-2">
            								<div class="inner-box">
            									<div class="content">
            										<div class="icon mb-2">
            										    <img src="{{asset('')}}frontend_assets/images/hearbit.png" alt="scooter" class="img-fluid"> 
            										</div>
            										<h4>Life Insurance</h4>
            										<div class="">
            										    Life is Very Uncertain and We Understand that you want Protection of your 
            										    Loved ones in your Absence that’s where we help you to Find the Best Life 
            										    Insurance Plans that Act as a Safety Guard and Make you & Your Loved one life 
            										    Happy.
            										</div>
            									</div>
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
	</section>
	
	<!-- Services Section -->
	<section class="testimonial-section-two pt-0">
		<div class="color-layer"></div>
		<div class="circle-layer" style="background-image: url({{asset('')}}frontend_assets/images/background/pattern-28.png)"></div>
		<div class="auto-container">
			<div class="row clearfix">
		        
		        <div class="col-12">
		            <div class="title text-dark text-center">
		                <h2>What Our Clients <span>Say About Us</span></h2>
		            </div>
		        </div>
			    
				<!-- Carousel Column -->
				<div class="carousel-column mx-auto col-lg-8 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="pattern-layer-one" style="background-image: url({{asset('')}}frontend_assets/images/background/pattern-27.png)"></div>
						<div class="testimonial-carousel-four owl-carousel owl-theme">
							
							<!-- Testimonial Block Two -->
							@if($testimonial)
							@foreach($testimonial as $key=>$value)
							<div class="testimonial-block-two">
								<div class="inner-box">
									<div class="author-image">
										<img src="{{$value->image}}" alt="" />
									</div>
									<div class="content">
										<h5>{{$value->name}}</h5>
										<h6>{{$value->designation}}</h6>
										<div class="text">
										    {{$value->message}} 
										</div>
									</div>
								</div>
							</div>
							@endforeach
							@endif
							
							
							
						</div>
					</div>
				</div>
				<div class="col-12 text-center">
				    <div class="btns-box">
	                    <a href="{{url('/user_testimonial')}}" class="theme-btn btn-style-three"><span class="txt">Post your Story &nbsp; <span class="flaticon-next"></span></span></a>
	                </div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Services Section -->
	
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
									<img src="{{asset('')}}frontend_assets/images/blog.png" alt="blog" class="w-100"/>
								</div>
								<div class="author-img">
								    <img src="{{asset('')}}frontend_assets/images/author_img.png" alt="author's img" class="img-fluid"> 
								</div>
								<div class="blog-content">
    								<div class="code">5 min read</div>
    								<h3><a href="#">Health Insurance for First-Time Buyers</a></h3>
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
									<img src="{{asset('')}}frontend_assets/images/blog.png" alt="blog"  class="w-100"/>
								</div>
								<div class="author-img">
								    <img src="{{asset('')}}frontend_assets/images/author_img.png" alt="author's img" class="img-fluid"> 
								</div>
								<div class="blog-content">
    								<div class="code">5 min read</div>
    								<h3><a href="#">Why Do You Need Life Insurance During a Recession?</a></h3>
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
                        <button class="btn btn-block text-left" type="button" style="white-space: inherit;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          What’s the difference between life insurance and term insurance?
                        </button>
                      </h2>
                    </div>
                
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                	  The primary difference between a term insurance and traditional life insurance plan is that a term insurance plan only provides death benefit in case of demise of the insured within the term period, whereas a life insurance policy offers both death and maturity benefit to the insured.
                      </div>
                    </div>
                  </div>
                  <P></P>
                  <div class="card">
                    <div class="card-header p-0" id="headingTwo">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" style="white-space: inherit;" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          What are underwriters in a life insurance policy?
                        </button>
                      </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body">
                	  Underwriters evaluate the risk involved in insurance. The process of risk evaluation starts before the issuance of insurance policy, and ends with settlement of the claim Only after the approval of underwriters can the policy be issued to the policyholder. Moreover, the company pays the claim benefit to the nominee only after clearance from the underwriter.
                    </div>
                  </div>
                  </div>
                  <p></p>
                  <div class="card">
                    <div class="card-header p-0" id="headingThree">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" style="white-space: inherit;" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Can the premium change during the tenure?
                        </button>
                      </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                      <div class="card-body">
                	  No it doesn’t. The premium is determined taking into consideration numerous factors discussed above and once set, the premiums do not change over the entire tenure of the plan.
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