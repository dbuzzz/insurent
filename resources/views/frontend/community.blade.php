@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')
<section class="process-section style-three">
		<div class="circle-layer"></div>
		<div class="pattern-layer-one" style="background-image: url(images/background/pattern-1.png)"></div>
		<div class="icon-layer-one" style="background-image: url(images/icons/icon-2.png)"></div>
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>Community</h2>
			</div>
			<div class="row clearfix">
			
				<!-- Process Block -->
				@if($community)
				@foreach($community as $key=>$value)
				<a href="{{route('communityChat',['id'=>$value->id])}}">
				<div class="process-block col-xl-4 col-lg-6 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="icon">
							<img src="{{$value->image}}" alt="" />
						</div>
						<h3><a href="{{route('communityChat',['id'=>$value->id])}}">{{$value->name}}</a></h3>
						<div class="text">{!!$value->description!!}</div>
					</div>
				</div>
				</a>
				@endforeach
				@endif
			
				
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