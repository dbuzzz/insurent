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
        Agent-Management
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Agent-Management</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
      <div class="row">

        <div class="col-lg-12 col-12">
          <div class="box box-solid bg-gray">
            <div class="box-header with-border">
                <h4 class="box-title">Add</h4>
                <ul class="box-controls pull-right">
                  <li><a class="box-btn-slide" href="#"></a></li>   
                  <li><a class="box-btn-fullscreen" href="#"></a></li>
                </ul>
              </div>
            <div class="box-body">
             <form id="save_form">
                <input type="hidden" name="id" id="id">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text"
                               class="form-control"
                               name="name" 
                               id="name" 
                               placeholder="Enter Name ..">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">E-Mail</label>
                        <input type="email"
                               class="form-control"
                               name="email" 
                               id="email" 
                               placeholder="Enter email ..">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="exampleInputEmail1">Mobile</label>
                        <input type="number"
                               class="form-control"
                               name="mobile" 
                               id="mobile" 
                               placeholder="Enter Mobile ..">
                    </div>

                    <div class="form-group col-lg-4">
                    <label for="role">Role</label>
                    <select id="role"
                           
                            class="form-control" name="role">
                        <option value="">Select option</option>
                        @if(!empty($role))
                        @foreach($role as $key=>$value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group col-lg-4">
                    <label for="role">Department</label>
                    <select id="department"
                           
                            class="form-control" name="department[]" multiple>
                        <option value="">Select option</option>
                        @if(!empty($department))
                        @foreach($department as $key=>$value)
                        <option value="{{$value->name}}">{{$value->name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password"
                           class="form-control"
                           name="password" 
                           id="password" 
                           placeholder="Enter Password ..">
                </div>

                <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="password"
                           class="form-control"
                           name="confirm_password" 
                           id="confirm_password" 
                           placeholder="Confirm Password ..">
                </div>

                   
                    <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Profile</label>
                        <input type="file"
                               class="form-control"
                               name="image"
                               id="file" 
                               accept=".jpg,.png,.jpeg">
                    </div>

                    <div class="form-group col-lg-6">
                        <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image">
                    </div>

                
            </div>
               
                <button type="submit"
                        class="btn btn-primary" id="submit">Submit</button>
            </form>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-12">
          <div class="box box-solid bg-gray">
            <div class="box-header with-border">
              <h4 class="box-title">Listing</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table class="table mb-0" id="cat_datatable">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th >Name</th>
                            <th >Employee Code</th>
                            <th >Department</th>
                            <th >Profile</th>
                            <th >Email</th>
                            <th >Mobile</th>
                            <th >Status</th>
                            <th >Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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

<script src="{{url('admin_assets/custom_js/vendor.js')}}"></script>

@endsection