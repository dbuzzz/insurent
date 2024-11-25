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
						<h2>Wishlist</h2>
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><i class="fas fa-angle-double-right"></i></li>
							<li>Wishlist</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Breadcrumb Area -->

	<div class="section-padding">
		<div class="container">
			<div class="row table-responsive">
				<table class="table shopping-cart-wishlist-tabel table-bordered align-middle">
					<thead>
                        <tr class="text-uppercase">
                            <th class="text-center">Image</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Add To Cart</th>
                            <th class="text-center">action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@if($wishlist)
                    	@foreach($wishlist as $key=>$value)
						<tr>
                            <td class="text-center product-thumbnail">
                                <a href="{{route('product_detail',['product'=>$value->id])}}"><img src="{{$value->image}}" alt="img"></a>
                            </td>
                            <td class="text-center product-name">
                            	<a href="{{route('product_detail',['product'=>$value->id])}}">{{$value->name}}</a>
                            </td>
                            
                            <td class="text-center">
                            	<a class="button-1"  href="javascript:void(0)" onclick="add_cart({{$value->id}})">Add to Cart</a>
                            </td>
                            <td class="product-remove text-center">
                                <a href="javascript:void(0)" onclick="remove_wishlist({{$value->id}})"><i class="fas fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif

						
					</tbody>
				</table>
			</div>
		</div>
	</div>



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