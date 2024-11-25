<!DOCTYPE html>
<html>

<!-- Mirrored from themazine.com/html/Esonit/Esonit/{{url('/')}} by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Dec 2022 14:12:50 GMT -->
<head>
<meta charset="utf-8">
<meta name="_token" content="{{ csrf_token() }}">
<title>{{@$title}}</title>
<!-- Stylesheets -->
<link href="{{asset('')}}frontend_assets/css/bootstrap.css" rel="stylesheet">
<link href="{{asset('')}}frontend_assets/css/style.css" rel="stylesheet">
<link href="{{asset('')}}frontend_assets/css/responsive.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&amp;family=Montserrat:wght@100;200;300;400;500;600;700;800;900&amp;family=Noto+Sans+TC:wght@400;500;700;900&amp;display=swap" rel="stylesheet">

<link rel="shortcut icon" href="{{asset('')}}frontend_assets/images/favicon.png" type="image/x-icon">
<link rel="icon" href="{{asset('')}}frontend_assets/images/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="{{url('css/custom.css')}}">
     <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
@yield("extern-css")

<script>
        const siteUrl = '{{url("")}}';
    </script> 

</head>

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
 	<!-- Main Header-->
    <header class="main-header">
    	
		<!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container d-flex align-items-center clearfix">
            	
				<div class="pull-left logo-box">
					<div class="logo">
					    <a href="{{url('/')}}"><img src="{{asset('')}}frontend_assets/images/logo.png" alt="logo" title="Logo"></a>
					</div>
				</div>
				
				<div class="nav-outer clearfix">
					<!--Mobile Navigation Toggler-->
					<div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
					<!-- Main Menu -->
					<nav class="main-menu navbar-expand-md">
						<div class="navbar-header">
							<!-- Toggle Button -->    	
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						
						<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
							<ul class="navigation clearfix">
								<li class="current"><a href="{{url('/')}}">Home</a></li>
								<li class="current"><a href="{{url('/about-us')}}">About Us</a></li>
								<li><a href="{{url('/blog')}}">Blogs</a></li>
								<li><a href="{{url('/contact-us')}}">Contact</a></li>

							</ul>
						</div>
					</nav>
					
					<!-- Main Menu End-->
					<div class="outer-box clearfix px-3">
						<!-- Btn Box -->
						@if(Auth::user())
						<div class="btn-box">
							<a href="{{url('/Community')}}" class="btn-style-one theme-btn"><span class="txt">Community</span></a>
						</div>
						<div class="btn-box">
							<a href="{{url('/user-profile')}}" class="btn-style-one theme-btn"><span class="txt"><i class="fa fa-user"></i></span></a>
						</div>
						@else
						<div class="btn-box">
							<a href="{{url('/user-login')}}" class="btn-style-one theme-btn"><span class="txt"><i class="flaticon-padlock"></i>Log In</span></a>
						</div>
						@endif
						
					</div>
				</div>
				
            </div>
        </div>
        <!--End Header Upper-->
        
		<!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container d-flex align-items-center clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="{{url('/')}}" title=""><img src="{{asset('')}}frontend_assets/images/logo.png" alt="" title=""></a>
                </div>
                <!--Right Col-->
                <div class="pull-right" style="width:100%">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
					<!-- Main Menu End-->
					
					<!-- Main Menu End-->
					<div class="outer-box clearfix float-right">
						
						<!-- Btn Box -->
						@if(Auth::user())
						<div class="btn-box">
							<a href="{{url('/Community')}}" class="btn-style-one theme-btn"><span class="txt">Community</span></a>
						</div>
						<div class="btn-box">
							<a href="{{url('/user-profile')}}" class="btn-style-one theme-btn"><span class="txt"><i class="fa fa-user"></i></span></a>
						</div>
						@else
						<div class="btn-box">
							<a href="{{url('/user-login')}}" class="btn-style-one theme-btn"><span class="txt"><i class="flaticon-padlock"></i>Log In</span></a>
						</div>
						@endif
						
					</div>
					
                </div>
            </div>
        </div>
		<!-- End Sticky Menu -->
    
		<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{url('/')}}"><img src="{{asset('')}}frontend_assets/images/logo.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div><!-- End Mobile Menu -->
	
    </header>
    <!-- End Main Header -->

	@yield('content')

		<style type="text/css">
		.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:74px;
	right:14px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
	</style>

	<a href="{{url('/send_whatsapp')}}" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

	<footer class="main-footer">
		<div class="color-layer"></div>
		<div class="pattern-layer-one" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-6.png)"></div>
		<div class="pattern-layer-two" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-1.png)"></div>
		<div class="pattern-layer-three" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-7.png)"></div>
		<div class="pattern-layer-four" style="background-image: url({{asset('')}}frontend_assets/images/icons/icon-8.png)"></div>
    	<div class="auto-container">
        	<!--Widgets Section-->
            <div class="widgets-section">
            	<div class="row clearfix">
                	
					<!-- Footer Column -->
					<div class="footer-column col-lg-3 col-md-6 col-sm-12">
						<div class="footer-widget logo-widget">
							<div class="logo">
								<a href="{{url('/')}}"><img src="{{asset('')}}frontend_assets/images/logo.png" alt="" /></a>
							</div>
						</div>
						<div class="footer-widget address-widget">
							<ul class="address-list">
								<li>We in Insurent,Provide the Solutions to your Problem, Our Expert Agents Suggest you the Best Advices…</li>
							</ul>
							<!-- Social Box -->
							<ul class="social-box">
								<li><a style="color: black;" href="#" class="fa fa-facebook-f"></a></li>
								<li><a style="color: black;" href="#" class="fa fa-instagram"></a></li>
								<li><a style="color: black;" href="#" class="fa fa-twitter"></a></li>
							</ul>
						</div>
					</div>
					
					
					<!-- Footer Column -->
					<div class="footer-column p-3 col-lg-3 col-md-6 col-sm-12">
						<div class="footer-widget list-widget">
							<h4>About</h4>
							<ul class="list">
								<ul class="list">
								<li><a href="#">About us </a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Terms and Conditions</a></li>
								<li><a href="#">Contact us</a></li>
							</ul>
							</ul>
						</div>
					</div>
					
					<!-- Footer Column -->
					<div class="footer-column p-3 col-lg-3 col-md-6 col-sm-12">
						<div class="footer-widget list-widget">
							<h4>Support</h4>
							<ul class="list">
								<li><a href="#">Contact us </a></li>
								<li><a href="#">Login</a></li>
								<li><a href="#">help@insurent.com</a></li>
								<li><a href="#">Join Community</a></li>
							</ul>
						</div>
					</div>
					
					<!-- Footer Column -->
					<div class="footer-column p-3 col-lg-3 col-md-6 col-sm-12">
						<div class="footer-widget list-widget">
							<h4>FAQ</h4>
							<ul class="list">
								<li><a href="index.html">Home</a></li>
								<li><a href="#">Health Insurance</a></li>
								<li><a href="#">Motar Insurance</a></li>
								<li><a href="#">Life Insurance</a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<div class="row clearfix">
					
					<!-- Copyright Column -->
					<div class="copyright-column col-12 text-center">
						<div class="copyright">© 2022-2023, All Rights Reserved</div>
					</div>
					
				</div>
			</div>
			
		</div>
	</footer>

	
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

<script src="{{asset('')}}frontend_assets/js/jquery.js"></script>
<script src="{{asset('')}}frontend_assets/js/popper.min.js"></script>
<script src="{{asset('')}}frontend_assets/js/bootstrap.min.js"></script>
<script src="{{asset('')}}frontend_assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{asset('')}}frontend_assets/js/jquery.fancybox.js"></script>
<script src="{{asset('')}}frontend_assets/js/appear.js"></script>
<script src="{{asset('')}}frontend_assets/js/parallax.min.js"></script>
<script src="{{asset('')}}frontend_assets/js/tilt.jquery.min.js"></script>
<script src="{{asset('')}}frontend_assets/js/jquery.paroller.min.js"></script>
<script src="{{asset('')}}frontend_assets/js/owl.js"></script>
<script src="{{asset('')}}frontend_assets/js/wow.js"></script>
<script src="{{asset('')}}frontend_assets/js/nav-tool.js"></script>
<script src="{{asset('')}}frontend_assets/js/jquery-ui.js"></script>
<script src="{{asset('')}}frontend_assets/js/script.js"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
@yield("extern-js")

</body>

</html>