<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}">


    <title>{{@$title}}</title>
  
    <!-- Bootstrap 4.1-->
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
 
   
    @yield("extern-css")
    <script>
        const siteUrl = '{{url("")}}';
    </script> 
    <style type="text/css">
        li{
            list-style: none;
        }
    </style>

</head>

<body class="hold-transition skin-purple-light sidebar-mini sidebar-collapse">
    <div class="overlay"></div>
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header bg-success">
    <!-- Logo -->
    <a href="../index.html" class="logo">
      <!-- mini logo -->
      <b class="logo-mini">
          <span class="light-logo"><img src="{{asset('uploads/default/logo.png')}}"></span>
     </b>
      <!-- logo-->
      <span class="logo-lg">
        {{-- <img src="{{asset('uploads/default/logo.png')}}"> --}}
        INSURENT
      </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        
      <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>

          </a>  
        
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
       
          <!-- full Screen -->

          <li class="dropdown user user-menu">
            <div class="mt-4">
              <label class="switch switch-border switch-danger">
                <input type="checkbox" id="sta" onchange="tgle()">
                <span class="switch-indicator"></span>
                <span class="switch-description"></span>
              </label>
              <span id="time"></span>
            </div>
            
          </li> 

          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-bell"></i>
            </a>
            <ul class="dropdown-menu scale-up">
              <li class="header">You have 1 Notification</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu inner-content-div" style="overflow: hidden; width: auto; height: 200px;">
                  <li><!-- start message -->
                    <a href="#">
                     {{--  <div class="pull-left">
                        <img src="../../images/user2-160x160.jpg" class="rounded-circle" alt="User Image">
                      </div> --}}
                      <div class="mail-contnet">
                         <h4>
                          Notification
                          <small><i class="fa fa-clock-o"></i> 15 mins</small>
                         </h4>
                         <span>this is the notificcation</span>
                      </div>
                    </a>
                  </li>
                  <!-- end message -->
                  
                </ul>
            </div>
              </li>
            </ul>
          </li>
        
          <!-- User Account-->

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              {{-- <img src="../../images/user5-128x128.jpg" class="user-image rounded-circle b-2" alt="User Image"> --}}
                <span class="font-size-14">{{Auth::user()->name}}<i class="fa fa-user" aria-hidden="true"></i></span>
            </a>
            <ul class="dropdown-menu scale-up">
              <!-- Menu Body -->
              <li class="user-body bt-0">
                <div class="row no-gutters">
                  <div class="col-12 text-left">
                    <a href="#"><i class="ion ion-person"></i> My Profile</a>
                  </div>
               
                <div role="separator" class="divider col-12"></div>
                  
                <div role="separator" class="divider col-12"></div>
                  <div class="col-12 text-left">
                    <a href="{{url('/logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                  </div>                
                </div>
                <!-- /.row -->
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header nav-small-cap">Menu</li>
        {{-- <li class="treeview">
          <a href="#">
            <i class="fa-sharp fa-solid fa-list"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../index.html"><i class="fa fa-circle-thin"></i>Dashboard 1</a></li>
            <li><a href="../index2.html"><i class="fa fa-circle-thin"></i>Dashboard 2</a></li>
            <li><a href="../index3.html"><i class="fa fa-circle-thin"></i>Dashboard 3</a></li>
            <li><a href="../index4.html"><i class="fa fa-circle-thin"></i>Dashboard 4</a></li>
          </ul>
        </li> --}}

        <li>
          <a href="{{url('/dashboard')}}">
            <i class="fa-sharp fa-solid fa-database"></i> <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="{{url('/leads')}}">
            <i class="fa-sharp fa-solid fa fa-exchange"></i><span>Leads</span>
          </a>
        </li>

        <li>
          <a href="{{url('/message')}}">
            <i class="fa-sharp fa-solid fa-message"></i><span>Message</span>
          </a>
        </li>

        <li>
          <a href="{{url('/user-management')}}">
            <i class="fa-sharp fa-solid fa-circle-user"></i><span>User-Management</span>
          </a>
        </li>
        @if(Auth::user()->id == 1)

        <li>
          <a href="{{url('/taxation')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>Tax</span>
          </a>
        </li>

        <li>
          <a href="{{url('/department')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>Department</span>
          </a>
        </li>

        <li>
          <a href="{{url('/blog-category')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>Blog Category</span>
          </a>
        </li>

        <li>
          <a href="{{url('/blog-management')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>Blog Management</span>
          </a>
        </li>

        <li>
          <a href="{{url('/contactpage')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>Contact</span>
          </a>
        </li>

        <li>
          <a href="{{url('/testimonial')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>Testimonial</span>
          </a>
        </li>

        <li>
          <a href="{{url('/coupon-management')}}">
            <i class="fa-sharp fa-solid fa-tag"></i> <span>Coupon</span>
          </a>
        </li>

        

        <li>
          <a href="{{url('/vendor-management')}}">
            <i class="fa-sharp fa-solid fa-user"></i><span>Agent-Management</span>
          </a>
        </li>

        <li>
          <a href="{{url('/notification')}}">
            <i class="fa-sharp fa-solid fa-list"></i> <span>Notification</span>
          </a>
        </li>

        <li>
          <a href="{{url('/price')}}">
            <i class="fa-sharp fa-solid fa-wrench"></i><span>Price</span>
          </a>
        </li>

        

        <li>
          <a href="{{url('/community')}}">
            <i class="fa-sharp fa-solid fa-wrench"></i><span>Community</span>
          </a>
        </li>

        <li>
          <a href="{{url('/pointer')}}">
            <i class="fa-sharp fa-solid fa-wrench"></i><span>Pointer</span>
          </a>
        </li>

        

        
        @endif
        
      </ul>
    </section>
  </aside>
  @yield('content')


<footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
        </ul>
    </div>
      &copy; 2022 Dbuzzz All Rights Reserved.
  </footer>
</div>


<script src="{{asset('')}}admin_assets/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
    
    <!-- fullscreen -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/screenfull/screenfull.js"></script>
    
    <!-- popper -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/popper/dist/popper.min.js"></script>
    
    <!-- Bootstrap 4.1-->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- SlimScroll -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    
    <!-- FastClick -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/fastclick/lib/fastclick.js"></script>
    
    <!-- fullscreen -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/screenfull/screenfull.js"></script>
    
    <!-- SoftPro admin App -->
    <script src="{{asset('')}}admin_assets/js/template.js"></script>
    
    <script src="{{asset('')}}admin_assets/js/pages/fullscreen.js"></script>

    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{url('plugins/select2/js/select2.min.js')}}"></script>
    @yield('extern-js')

    <script type="text/javascript">
        $(document).ready(function() {
    
            attendace_check();
            });
        function attendace_check(){
        $.ajax({
            url:siteUrl+'/attendace_check',
            type:'get',
            success:function(response)
            {
               if(response==2){
                    $('#sta').attr('Checked',false); 
                }else{
                    $('#sta').attr('Checked',true); 
                    $('#sta').attr('Disabled',true); 
                    $('#time').html(response); 
                    console.log(response);
                }
            }
        });
    }

    function tgle(){
        $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
        $.ajax({    
         url:'/mark_attendance',      
         type:'post',      
         data:{'user_id': {{Auth::user()->id}},'attendance':1},      
         dataType:'json',     
         success:function(response){
         console.log(response['message']); 
            if(response['status'] == 'success'){
               toastr["success"](response['message']);
            }else{
               toastr["error"](response['message']); 
            }            
         },
      });
    }
    </script>

    </body>

</html>