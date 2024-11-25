
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
        Leads
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">leads</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
      <div class="row">
        @if(Auth::user()->user_type == 1)
        <div class="col-lg-12 col-12">
          <div class="box box-solid bg-gray">
            <div class="box-header with-border">
                <h4 class="box-title">Assign</h4>
                <ul class="box-controls pull-right">
                  <li><a class="box-btn-slide" href="#"></a></li>   
                  <li><a class="box-btn-fullscreen" href="#"></a></li>
                </ul>
              </div>
            <div class="box-body">
             <form id="save_form">
                <input type="hidden" name="id" id="id">
                <div class="row">
                    <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Mobile</label>
                          <input type="text"
                                 class="form-control"
                                 name="mobile" 
                                 id="mobile" 
                                 placeholder="Enter mobile ..">
                      </div>

                      <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email"
                                 class="form-control"
                                 name="email" 
                                 id="email" 
                                 placeholder="Enter email ..">
                      </div>

                    

                    <div class="form-group col-lg-4">
                        <label for="agent">Agents</label>
                        <select id="agent"
                                data-toggle="select"
                                class="form-control" name="agent">
                                @if($agents)
                                @foreach($agents as $key=>$value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                                @endif
                            
                        </select>
                    </div>


                </div>
               
                <button type="submit"
                        class="btn btn-primary" id="submit">Assign</button>
            </form>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        @endif

        <div class="col-12">
          <div class="box box-solid bg-gray">
            <div class="box-header with-border">
              <h4 class="box-title">Listing</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table class="table mb-0" id="cat_datatable">
                      @if(Auth::user()->user_type == 1)
                    <div class="form-group col-lg-4">
                        <select onchange="filter()" id="filter_agent"
                                
                                class="form-control" name="filter_agent">
                                <option value="">Select Agent</option>
                                @if($agents)
                                @foreach($agents as $key=>$value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                                @endif
                            
                        </select>
                    </div>
                    @endif
                      <thead>
                        <tr>
                            <th>#</th>
                            <th >Email</th>
                            <th >Phone</th>
                            <th >Document</th>
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

<script src="{{url('admin_assets/custom_js/leads.js')}}"></script>

@endsection