

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://softpro-admin-templates.websitedesignmarketingagency.com/images/favicon.ico">

    <title>Insurent</title>
  
    <!-- Bootstrap 4.1-->
    <link rel="stylesheet" href="{{asset('')}}admin_assets/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
    
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="{{asset('')}}admin_assets/css/bootstrap-extend.css">  
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('')}}admin_assets/css/master_style.css">

    <!-- SoftPro admin skins -->
    <link rel="stylesheet" href="{{asset('')}}admin_assets/css/skins/_all-skins.css">  

    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">


        <script type="text/javascript">
            siteUrl = '{{url("")}}';
        </script>

</head>
<body class="hold-transition bg-gray-light">
    
    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">
            
            <div class="col-lg-5 col-md-8 col-12">
                <div class="content-top-agile bg-success">
                    <h2>Insurent</h2>
                    <img style=" width: 193px; " src="{{asset('uploads/default/logo.png')}}">
                      {{-- <p class="gap-items-2 mb-20">
                          <a class="btn btn-social-icon btn-outline btn-white" href="#"><i class="fa fa-facebook"></i></a>
                          <a class="btn btn-social-icon btn-outline btn-white" href="#"><i class="fa fa-twitter"></i></a>
                          <a class="btn btn-social-icon btn-outline btn-white" href="#"><i class="fa fa-google-plus"></i></a>
                          <a class="btn btn-social-icon btn-outline btn-white" href="#"><i class="fa fa-instagram"></i></a>
                        </p> --}}
                </div>
                <div class="p-40 mt-10 bg-white content-bottom box-shadowed">
                    <form id="admin_login">
                        @csrf
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success border-success"><i class="ti-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success border-success"><i class="ti-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                        </div>
                          <div class="row">
                            
                            <!-- /.col -->
                            <div class="col-12 text-center">
                              <button type="submit" class="btn btn-success-outline btn-block mt-10 btn-rounded">SIGN IN</button>
                            </div>
                            <!-- /.col -->
                          </div>
                    </form> 
                    {{-- <div class="text-center mt-20">
                        <p class="mb-0">Don't have an account? <a href="auth-register.html" class="text-info ml-5">Sign Up</a></p>
                    </div> --}}
                </div>
            </div>
            
            
        </div>
    </div>


    <!-- jQuery 3 -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
    
    <!-- fullscreen -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/screenfull/screenfull.js"></script>
    
    <!-- popper -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/popper/dist/popper.min.js"></script>
    
    <!-- Bootstrap 4.1-->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('')}}admin_assets/custom_js/admin_login.js"></script>

</body>

</html>
