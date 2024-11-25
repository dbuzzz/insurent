@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')

	<div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!-- Content Side -->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                	<div class="blog-list">
					
						<!-- News Detail -->
						<div class="news-detail">
							<div class="inner-box">
								<div class="image">
									<img src="{{@$blog->image}}" style="height:30rem" alt="" />
								</div>
								<div class="lower-content">
									<div class="category">{{@$blog->cat}}</div>
									<h3>{{@$blog->name}}</h3>
									<ul class="post-meta">
										
										<li><span class="icon flaticon-timetable"></span>{{date('d M Y', strtotime(@$blog->created_at))}}</li>
									</ul>
									{!!@$blog->description!!}
									
									<!-- Post Share Options-->
									<div class="post-share-options">
										<div class="clearfix">
											
											<div>
												<ul class="social-box">
													@foreach($share as $key=>$value)
													<li class="{{$key}}"><span><a href="{{$value}}" target="_blank"><i class="fa fa-{{$key}}"></i></a></span></li>
													@endforeach
													
												</ul>
											</div>
										</div>
									</div>
									
								</div>
							</div>
							
							
						</div>
						
					</div>
				</div>
					
				
					
			</div>
			
			<!-- Related Posts -->
			<div class="related-posts">
				<div class="three-item-carousel owl-carousel owl-theme">
					
					<!-- News Block Four -->
					
					@if(!empty($blogs))
					@foreach($blogs as $key => $value)
					<div class="news-block-four">
						<div class="inner-box">
							<div class="image">
								<a href="{{route('blog_detail',['id'=>$value->id])}}"><img src="{{$value->image}}" alt="" /></a>
							</div>
							<div class="lower-content">
								<h5><a href="{{route('blog_detail',['id'=>$value->id])}}">{{$value->name}}</a></h5>
								<div class="text">{!!substr($value->description, 0,100)!!}</div>
							</div>
						</div>
					</div>
					@endforeach
					@endif
					
				</div>
			</div>
			
		</div>
	</div>



@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
@endsection