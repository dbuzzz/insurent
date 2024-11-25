@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')



	<!-- Start Breadcrumb Area -->
	<section class="breadcrumb-area pt-100 pb-100" style="background-image:url('{{@$genral_pages->banner}}');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb-content">
						<h2>Product-Detail</h2>
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><i class="fas fa-angle-double-right"></i></li>
							<li>Product-Detail</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Breadcrumb Area -->

	<!-- Start Shop Page -->
	<section class="section-padding">
		<div class="container">
			<div class="row">
				@if(!empty($product))
				<div class="col-lg-6 mb-30">
					<div class="blog-details-thumb">
		      			<div class="modal_tab" style="box-shadow: 12px 19px 10px 0px #d9d9d9b3;border-radius: 30px;">  
	                        <div class="tab-content product-details-large">
	                            <div class="tab-pane fade show active" id="tabde1" role="tabpanel" >
	                                <div class="modal_tab_img">
	                                    <a href="#"><img src="{{$product->image}}" alt="img"></a>    
	                                </div>
	                            </div>
	                            @php
	                             	$img = explode(',', $product->path);
	                             	$i = 0;
	                             	$j = 0;
	                            @endphp
	                            @if(!empty($img))
	                            @foreach($img as $key1=>$value1)
	                            <div class="tab-pane fade" id="tabd{{$i}}" role="tabpanel">
	                                <div class="modal_tab_img">
	                                    <a href="#"><img src="{{$value1}}" alt="img"></a>    
	                                </div>
	                            </div>
	                            @php
	                             	$i++;
	                            @endphp
	                            @endforeach
	                            @endif
	                           
	                        </div>
	                        <div class="modal_tab_button">    
	                            <ul class="nav product_navactive owl-carousel" role="tablist">
	                                <li >
	                                    <a class="nav-link active" data-toggle="tab" href="#tabde1" role="tab" aria-controls="tabde1" aria-selected="false"><img src="{{$product->image}}" alt="img"></a>
	                                </li>

	                                @if(!empty($img))
		                            @foreach($img as $key1=>$value1)
		                            <li>
	                                     <a class="nav-link" data-toggle="tab" href="#tabd{{$j}}" role="tab" aria-controls="tabd{{$j}}" aria-selected="false"><img src="{{$value1}}" alt="img"></a>
	                                </li>
	                                @php
		                             	$j++;
		                            @endphp
		                            @endforeach
		                            @endif

	                            </ul>
	                        </div>    
	                    </div>
                    </div>
	      		</div>
	      		<div class="col-lg-6 mb-30">
	      			<div class="products-details-content">
		      			<div class="quickview-modal-content-full">
		      				<!-- Ratting -->
		      				{{-- <div class="ratting">
								<span><i class="fas fa-star"></i></span>
								<span><i class="fas fa-star"></i></span>
								<span><i class="fas fa-star"></i></span>
								<span><i class="fas fa-star"></i></span>
								<span><i class="fas fa-star"></i></span>
								<span><small>( 25 Reviews )</small></span>
							</div> --}}
							<!-- Title -->
							<h3>{{$product->name}}</h3>
							<p>{!!$product->description!!}</p>
							<!-- Price -->
							
							<!-- Category -->
							<div class="cate">
								<span><strong>Categories:</strong></span>
								<span><a href="#">{{$product->category}}</a></span>
							</div>

							<div class="cate">
								<span><strong>Sub-Category:</strong></span>
								<span><a href="#">{{$product->sub_category}}</a></span>
							</div>

							<div class="cate">
								<span><strong>Brand:</strong></span>
								<span><a href="#">{{$product->brand}}</a></span>
							</div>
							<div class="quick-view-sahre mt-50">
								<span><strong>Variant :</strong></span>
								@foreach($variant as $key=>$value)
								<span><a href="javascript:void[0]" id="variant{{$value->id}}" class="variant" onclick="variant_store({{$value->id}})">{{$value->variant}}</a></span>
								@endforeach
								
							</div>

							<div class="pricing">
								@foreach($variant as $key=>$value)
								<span id="variant_price{{$value->id}}" class="variant_price" style="display:{{!empty($key)?'none':''}}" >{{$value->price}}<del>{{$value->mrp}}</del></span>
								@endforeach
							</div>
							<!-- size -->
							
							<!-- Add To Cart -->
							<div class="quantity-add-cart">
								
								<div class="cart-btn">
									<a class="button-1" href="javascript:void(0)" onclick="add_cart({{$product->id}})"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
								</div>
							</div>
							
		      			</div>
	      			</div>
	      		</div>
	      		@endif
			</div>
			{{-- <div class="row mt-30">
				<div class="product-details-tab">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
					  	
					  	<li class="nav-item" role="presentation">
					    	<button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"  role="tab" aria-controls="review" aria-selected="false">Review</button>
					  	</li>
					</ul>
					<div class="tab-content" id="myTabContent">
					 
					  	<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					  		<div class="pd-tab-item">
					  			<h3 class="review-title">2 Reviews</h3>
					  			<ul>
					  				<!-- Single -->
					  				<li class="review-single">
					  					
					  					<div class="content">
						  					<div class="review-info">
							  					<h5>Alea Brooks</h5>
							  					<small> Jun 01, 2021 </small>
							  				</div>
						  					
											<div class="revie-con">
												<p>Lorem Ipsumin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate</p>
											</div>
										</div>
					  				</li>
					  				<!-- Single -->
					  				<li class="review-single">
					  					
					  					<div class="content">
						  					<div class="review-info">
							  					<h5>Alea Brooks</h5>
							  					<small> Jun 01, 2021 </small>
							  				</div>
						  					
											<div class="revie-con">
												<p>Lorem Ipsumin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate</p>
											</div>
										</div>
					  				</li>
					  			</ul>
					  			<div class="product-review-form">
						  			<h3>Add a review</h3>
						  			<div class="ratting mb-30">
										<span><i class="fas fa-star"></i></span>
										<span><i class="fas fa-star"></i></span>
										<span><i class="fas fa-star"></i></span>
										<span><i class="fas fa-star"></i></span>
										<span><i class="fas fa-star"></i></span>
									</div>
									<form action="#">
										<textarea name="review-message" class="form-control" placeholder="Your Review" spellcheck="false"></textarea>
										<input type="text" name="name" class="form-control" placeholder="Your Name">
										<input type="email" name="email" class="form-control" placeholder="Your Email">
										<button class="button-1" type="submit">Submit Review</button>
									</form>
						  		</div>
					  		</div>
					  	</div>
					</div>

				</div>
			</div> --}}
			<!-- Section Headding -->
			<div class="row mt-50">
				<div class="col-lg-12">
					<div class="section-headding text-center  mb-50">
						<h2><span>Related Products.</span></h2>
					</div>
				</div>
			</div>
			<!-- Related Products -->
			<div class="row">
				<div class="col-lg-12">
					<div class="related-product-slider owl-carousel">
						<!-- Single -->
						@foreach($related_product as $key=>$value)
						<div class="product-item">
							<div class="sale-badge"><span>Best Seller</span></div>
							<!-- Thumbnail -->
							<div class="product-thumbnail">
								<a href="{{route('product_detail',['product'=>$value->id])}}">
									<img src="{{$value->image}}" alt="product">
								</a>
								<a class="wishlist" href="javascript:void(0)" onclick="add_wishlist()"><i class="far fa-heart"></i></a>
								<div class="product-overly-btn">
									<ul>
										<li><a href="javascript:void(0)" onclick="add_cart({{$value->id}})"><i class="fas fa-shopping-cart"></i><span>Add to Cart</span></a></li>
										<li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i class="far fa-eye"></i><span>Quick view</span></a></li>
									</ul>
								</div>
							</div>
							<!-- Content -->
							<div class="product-content">
								{{-- <div class="ratting">
									<span><i class="fas fa-star"></i></span>
									<span><i class="fas fa-star"></i></span>
									<span><i class="fas fa-star"></i></span>
									<span><i class="fas fa-star"></i></span>
									<span><i class="fas fa-star"></i></span>
								</div> --}}
								<h4><a href="{{route('product_detail',['product'=>$value->id])}}">{{$value->name}}</a></h4>
								<div class="pricing">
									<span><i class="far fa-inr"></i>{{$value->price}} <del><i class="far fa-inr"></i>{{$value->mrp}}</del></span>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<!-- Related Products -->
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