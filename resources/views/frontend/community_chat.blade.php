
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from softpro-admin-templates.websitedesignmarketingagency.com/main/pages/app-chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Oct 2022 15:32:06 GMT -->
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://softpro-admin-templates.websitedesignmarketingagency.com/images/favicon.ico">
    <meta name="_token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{asset('')}}admin_assets/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
    
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="{{asset('')}}admin_assets/css/bootstrap-extend.css">  
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('')}}admin_assets/css/master_style.css">

    <!-- SoftPro admin skins -->
    <link rel="stylesheet" href="{{asset('')}}admin_assets/css/skins/_all-skins.css"> 
 
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
     <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/select2/css/select2.css')}}">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">

     <style type="text/css">
     	.direct-chat-messages {
    -webkit-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
    padding: 10px;
    height: 60vh;
    overflow: auto;
}
     </style>

     <script>
        const siteUrl = '{{url("")}}';
    </script> 


</head>
<body class="hold-transition skin-purple-light sidebar-mini sidebar-collapse">
<div class="wrapper" style=" padding: 4rem; ">
 <div class="box card-inverse bg-img" style="background-image: url({{asset('')}}admin_assets/images/2.jpg); padding-top: 150px">
              <div class="flexbox align-items-center px-20" data-overlay="4">
                <div class="flexbox align-items-center mr-auto">
                  <a href="#">
                    <img class="avatar avatar-xl avatar-bordered" src="{{$community->image}}" alt="">
                  </a>
                  <div class="pl-10 d-none d-md-block">
                    <h5 class="mb-0"><a class="hover-primary text-white" href="{{url('/Community')}}">community > </a>{{$community->name}}</h5>
                  </div>
                </div>

                <ul class="flexbox flex-justified text-center py-20">
                  <li class="px-10">
                    <span class="opacity-60">Members</span><br>
                    <span class="font-size-20">9.6K</span>
                  </li>
                  <li class="px-10">
                    <span class="opacity-60">Messages</span><br>
                    <span class="font-size-20">9845</span>
                  </li>
                 
                </ul>
              </div>
            </div>

  <!-- Content Wrapper. Contains page content -->
  <div>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-lg-12 col-md-12">
			<div class="box" style="height: 80vh; padding:20px ;">
				<h4 class="box-title">{{$community->name}}</h4>
			 
			  <div class="box-body">
				  <!-- Conversations are loaded here -->
				  <div id="chat-app" class="direct-chat-messages chat-app">
			  	<div id="message_container"></div>

					<!-- /.direct-chat-msg -->

				  </div>
				  <!--/.direct-chat-messages-->				  
			  </div>
				<div class="box-footer">
            <form id="chat_form">
            	@csrf
              <div class="input-group">
                {{-- <input type="file" id="attach" multiple name="file[]" class="form-control"> --}}
              <input type="text" name="message" id="message" placeholder="Type Message ..." class="form-control">
              <input type="hidden" value="{{$community->id}}" id="community_id" name="id">
                    <div class="input-group-addon">
                      <div class="align-self-end gap-items">
                        {{-- <span class="publisher-btn file-group">
                          <i class="fa fa-paperclip file-browser"></i>
                          <input type="file">
                        </span> --}}
                        <a class="publisher-btn" href="#"><i class="fa fa-smile-o"></i></a>
                        {{-- <a onclick="submit()" class="publisher-btn" href="javascript:void[0]"><i class="fa fa-paper-plane"></i></a> --}}
                        <button class="publisher-btn" type="submit"><i class="fa fa-paper-plane"></i></button>
                      </div>
                    </div>
              </div>
            </form>
          </div>
				<!-- /.box-footer-->
			</div>
		</div>
	
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
</div>
<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="{{asset('')}}admin_assets/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
	
	<!-- fullscreen -->
	<script src="{{asset('')}}admin_assets/assets/vendor_components/screenfull/screenfull.js"></script>
	
	<!-- popper -->
	<script src="{{asset('')}}admin_assets/assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.1-->
	<script src="{{asset('')}}admin_assets/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
    <!-- Magnific popup JavaScript -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('')}}admin_assets/assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
	
	<!-- SlimScroll -->
	<script src="{{asset('')}}admin_assets/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	
	<!-- FastClick -->
	<script src="{{asset('')}}admin_assets/assets/vendor_components/fastclick/lib/fastclick.js"></script>
	
	<!-- SoftPro admin App -->
	<script src="../js/template.js"></script>
	
	
	
	<!-- demo only -->
	<script src="../js/pages/app-chat.js"></script>
	<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

	<script src="{{url('frontend_assets/custom_js/chat.js')}}"></script>
	
	
</body>

<!-- Mirrored from softpro-admin-templates.websitedesignmarketingagency.com/main/pages/app-chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Oct 2022 15:33:58 GMT -->
</html>
