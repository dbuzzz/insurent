
@extends('admin.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins\datatables\dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins\datatables\responsive.bootstrap4.min.css') }}">

@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Message
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Message</a></li>
      </ol>
    </section>

    <!-- Main content -->
   <section class="content">

      <div class="row">
        <div class="col-lg-9 col-md-8">
            <div class="box">
              <div id="message_container">
              <div class="box-header with-border">
                <h4 class="box-title">Chat <strong>Message</strong></h4>
                
              </div>
              <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div id="chat-app" class="direct-chat-messages chat-app">
                    Select User To Start Chat
               

                  </div>
                  <!--/.direct-chat-messages-->               
              </div>
               

                <!-- /.box-footer-->
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="box">
                <div class="box-header with-border p-0 pt-10">
                    <div class="form-element lookup">
                        <input class="form-control p-20 w-p100" type="text" placeholder="Search Contact">
                    </div>
                </div>
                <div class="box-body p-0">
                  <div id="chat-contact" class="media-list media-list-hover media-list-divided ">

                     @if(!empty($users))
                      @foreach($users as $key=>$value)
                      {{-- @dd($value->image) --}}
                          <li class="nav-item p-2" id="chat{{$value->id}}" onclick="show_chats({{$value->id}})" style=" cursor: pointer; ">
                            <div class="media media-single">
                              @if(!empty($value->image)   )
                              <img style=" height: 35px; width: 35px; border-radius: 50%; " src="{{$value->image}}" alt="Message User Image"> 
                              @else
                              <a href="#" class="avatar avatar-lg">
                              <img src="{{url('uploads/default/default-image.jpg')}}" alt="...">
                            </a>
                              @endif
                            <div class="media-body">
                              <h6><a href="#">{{$value->name}}</a></h6>
                              @if($value->msg_count)
                              <span class="badge badge-pill badge-primary">{{$value->msg_count}}</span>
                              @endif
                              <span class="mx-5 text-dark" id="last_message{{$value->id}}">{{$value->message}}</span>
                              <span class=" float-right text-dark" id="date{{$value->id}}"></span>
                              
                            </div>
                          </div>
                          <br>
                          
                      </li>
                      @endforeach
                      @endif
                   
                  </div>
                </div>
            </div>
        </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{url('admin_assets/custom_js/message.js')}}"></script>

@endsection