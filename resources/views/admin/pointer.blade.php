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
        Pointer
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pointer</a></li>
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
                <input type="hidden" name="id" id="id" value="{{@$product->id}}">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text"
                               class="form-control"
                               name="name" 
                               id="name" 
                               placeholder="Enter title .."
                               >
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Color</label>
                        <input type="color"
                               class="form-control"
                               name="color" 
                               id="color" 
                               placeholder="Enter title .."
                               >
                    </div>

                </div>
               
                <button type="submit"
                        class="btn btn-primary mt-4" id="submit">Submit</button>
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
                          <th>
                                Sn
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Color
                            </th>

                            <th>
                                Status
                            </th>
                            <th align="right">
                                Action
                            </th>
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
<script src="{{url('plugins\datatables\dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins\datatables\dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins\datatables\responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins\datatables\dataTables.hideEmptyColumns.min.js')}}"></script>
<script src="{{url('plugins\datatables\buttons.colVis.min.js')}}"></script>
<script src="{{url('admin_assets/custom_js/pointers.js')}}"></script>

@endsection