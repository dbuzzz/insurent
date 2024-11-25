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
						<h2>Product</h2>
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><i class="fas fa-angle-double-right"></i></li>
							<li>Product</li>
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
				<!-- Widgets -->
				{{-- <div class="col-lg-4 order-lg-first order-last" style="background-color:white;">
					<!-- Single -->
					<div class="widgets-single mb-30">
						<h2>Search Objects</h2>
						<div class="wi-search-form">
							<form action="#">
								<input type="text" name="search" placeholder="Enter Keyword">
								<button type="submit"><i class="bi bi-search"></i></button>
							</form>
						</div>
					</div>
					
		            <div class="list-single">
						<div class="woo-product-shorting">
							<select id="cat">
		                    <option value="">Category</option>
		                    @if(!empty($home_category))
		                    @foreach($home_category as $key=>$value)
		                    <option value="{{$value->id}}">{{$value->name}}</option>
		                    @endforeach
		                    @endif
		                </select>
						</div>
					</div>
					
				</div> --}}
				<div class="col-lg-12">
					<!-- ltn__shop-options -->
					<div class="row mb-30">
						<div class="col-12">
							<div class="ltn__shop-options">
								<div class="list-single">
									<div class="ltn__grid-list-tab-menu ">
	                                	<ul class="nav nav-tabs" id="myTab" role="tablist">
										  	<li class="nav-item" role="presentation">
										    	<button class="nav-link active" id="gridView-tab" data-bs-toggle="tab" data-bs-target="#gridView" role="tab" aria-controls="gridView" aria-selected="true"><i class="fas fa-th"></i></button>
										  	</li>
										  	<li class="nav-item" role="presentation">
										    	<button class="nav-link" id="listView-tab" data-bs-toggle="tab" data-bs-target="#listView" role="tab" aria-controls="listView" aria-selected="false"><i class="fas fa-list-ul"></i></button>
										  	</li>
										</ul>
	                            	</div>
								</div>
								<div class="list-single">
									<div class="showing-product-number text-right">
	                                    <span>Showing {{count($product_list)}} of {{$count}} results</span>
	                                </div>
								</div>
								<div class="list-single">
									<div class="woo-product-shorting">
										<select name="srot">
											<option value="0">Default Sorting</option>
											{{-- <option value="1">Sort by popularity</option> --}}
											<option value="2">Sort by new arrivals</option>
											<option value="3">Sort by price: low to high</option>
											<option value="4">Sort by price: high to low</option>
										</select>
									</div>
								</div>

								<div class="list-single">
									<button class="btn btn-primary">Filter</button>
								</div>

							</div>
						</div>
					</div>
					<!-- Products -->
					<div class="row">
						<div class="tab-content" id="myTabContent">
							<!-- Shop GridView -->
						  	<div class="tab-pane fade show active shop-gridview" id="gridView" role="tabpanel" aria-labelledby="gridView-tab">
						  		<div class="row">
						  			<!-- Single -->
						  			@if(!empty($product_list))
						  			@foreach($product_list as $key=>$value)
						  			<div class="col-lg-4 col-sm-6 mb-30">
						  				<div class="product-item">
											<!-- Thumbnail -->
											<div class="product-thumbnail">
												<a href="product-details.html">
													<img src="{{$value->image}}" alt="product">
												</a>
												@if(Auth::user())
								<a class="wishlist" href="javascript:void(0)" onclick="add_wishlist({{$value->id}})"><i class="far fa-heart"></i></a>
								@endif
												<div class="product-overly-btn">
													<ul>
														<li><a href="javascript:void(0)" onclick="add_cart({{$value->id}})"><i class="fas fa-shopping-cart"></i><span>Add to Cart</span></a></li>
														<!-- <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i class="far fa-eye"></i><span>Quick view</span></a></li> -->
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
						  			</div>
						  			@endforeach
						  			@endif
						  			
						  		</div>
						  	</div>
						  	<!-- Shop ListView -->
						  	<div class="tab-pane fade shop-listview" id="listView" role="tabpanel" aria-labelledby="listView-tab">
						  		<div class="row">
						  			<!-- Single -->
						  			@if(!empty($product_list))
						  			@foreach($product_list as $key=>$value)
						  			<div class="col-lg-12">
						  				<div class="product-list-item mb-30">
						  					<div class="row">
						  						<div class="col-sm-4 d-flex">
						  							<div class="thumbnail">
						  								<a href="product-details.html">
						  									<img src="{{$value->image}}" alt="img">
						  								</a>
						  							</div>
						  						</div>
						  						<div class="col-sm-8 align-self-center">
						  							<div class="content">
						  								<h2 class="title">
						  									<a href="product-details.html">{{$value->name}}</a>
						  								</h2>
						  						
														<div class="pricing">
															<span><i class="far fa-inr"></i>{{$value->price}} <del><i class="far fa-inr"></i>{{$value->mrp}}</del></span>
														</div>
														<p>{!!$value->description!!}</p>
														<div class="product-hover-action">
		                                                    <ul>
		                                                       
		                                                        <li>
		                                                            <a href="javascript:void(0)" onclick="add_cart({{$value->id}})" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
		                                                        </li>
		                                                        <li>
		                                                            @if(Auth::user())
								<a class="wishlist" href="javascript:void(0)" onclick="add_wishlist({{$value->id}})"><i class="far fa-heart"></i></a>
								@endif
		                                                        </li>
		                                                    </ul>
		                                                </div>
						  							</div>
						  						</div>
						  					</div>
						  				</div>
						  			</div>
						  			@endforeach
						  			@endif
						  			
						  		</div>
						  	</div>
						</div>
					</div>
					<!-- Pagination -->
					@php
					if (isset($_GET['page'])) {
						$page = $_GET['page'];
					}else{
						$page = 1;
					}
					@endphp
					<div class="row mt-15 mb-30">
						<div class="col-12 text-center">
							<div class="fr-pagination">
								<ul class="pagination">
										
										@for($j = 1 ; $j <= ceil($count/10) ; $j++ )
										<li class="page-item {{($page==$j)?'active':''}}"><a class="page-link" href="{{route('product_list',['page' => $j,'sort' => @$sort])}}">{{$j}}</a></li>
										@endfor
										
									</ul>

									{{-- <ul>
									</a></li>
									<li><a href="#">1</a></li>
									<li><span>2</span></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#"><i class="fas fa-angle-right"></i></a></li>
								</ul> --}}
							</div>
						</div>
					</div>
				</div>
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