
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
        Coupon
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Coupon</a></li>
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
                    <div class="form-group col-lg-4">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text"
                               class="form-control"
                               name="name" 
                               id="name" 
                               placeholder="Enter Coupon Name ..">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="exampleInputEmail1">Coupon-Code</label>
                        <input type="text"
                               class="form-control"
                               name="code" 
                               id="code" 
                               placeholder="Enter Coupon code ..">
                    </div>

                    
                    <div class="form-group col-lg-4">
                        <label for="type">Type</label>
                        <select id="type"
                                
                                class="form-control" name="type">
                            <option value="">Select option</option>
                            <option value="1">Discount By Percentage</option>
                            <option value="2">Discount By Amount</option>
                            
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="usage">Per User Usage</label>
                        <select id="usage"
                                data-toggle="select"
                                class="form-control" name="usage">
                            <option value="">Unlimited</option>
                            <option value="1">Limited</option>
                            
                        </select>
                    </div>

                <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Value</label>
                    <input type="text"
                           class="form-control"
                           name="value" 
                           id="value" 
                           placeholder="Enter Value ..">
                </div>

                <div class="form-group col-lg-3">
                    <label for="flatpickrSample02">Validity From</label>

                           <input type="date" class="form-control pull-right" name="validity_from" id="validity_from">
                </div>

                <div class="form-group col-lg-3">
                    <label for="flatpickrSample02">Validity To</label>

                           <input type="date" class="form-control pull-right" name="validity_to" id="validity_to">
                </div>

                <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Minimum Order Amount</label>
                    <input type="text"
                           class="form-control"
                           name="order_amount" 
                           id="order_amount" 
                           placeholder="Enter order_amount ..">
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
                            <th >Code</th>
                            <th >Info</th>
                            <th >Validity</th>
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

<script src="{{url('admin_assets/custom_js/coupon.js')}}"></script>

@endsection