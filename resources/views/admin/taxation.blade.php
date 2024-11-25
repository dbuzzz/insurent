
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
        Taxation
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Taxation</a></li>
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
                          <label for="exampleInputEmail1">Taxation Name</label>
                          <input type="text"
                                 class="form-control"
                                 name="name" 
                                 id="name" 
                                 placeholder="Enter Name ..">
                      </div>

                      <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Value (IN %)</label>
                          <input type="number"
                                 class="form-control"
                                 name="value" 
                                 id="value" 
                                 placeholder="Enter Value ..">
                      </div>

                      <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Refrence Name</label>
                          <input type="number"
                                 class="form-control"
                                 name="value" 
                                 id="value" 
                                 placeholder="Enter Value ..">
                      </div>

                      <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Vehicle Number</label>
                          <input type="number"
                                 class="form-control"
                                 name="value" 
                                 id="value" 
                                 placeholder="Enter Value ..">
                      </div>

                      <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Variant</label>
                          <input type="number"
                                 class="form-control"
                                 name="value" 
                                 id="value" 
                                 placeholder="Enter Value ..">
                      </div>

                      <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Make</label>
                          <input type="number"
                                 class="form-control"
                                 name="make" 
                                 id="make" 
                                 placeholder="Enter make ..">
                      </div>

                      <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Model No.</label>
                          <input type="number"
                                 class="form-control"
                                 name="model" 
                                 id="model" 
                                 placeholder="Enter model ..">
                      </div>

                      <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Policy No.</label>
                          <input type="number"
                                 class="form-control"
                                 name="policy" 
                                 id="policy" 
                                 placeholder="Enter policy ..">
                      </div>

                      <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Payment</label>
                          <input type="number"
                                 class="form-control"
                                 name="payment" 
                                 id="payment" 
                                 placeholder="Enter payment ..">
                      </div>

                      <div class="form-group col-lg-12">
                      </div>

                      <div class="form-group col-lg-4">
                          <h2>Premium</h2>
                      </div>

                      <div class="form-group col-lg-4">
                        <label for="exampleInputEmail1">Value</label>
                          <input type="number"
                                 class="form-control"
                                 name="premium" 
                                 id="premium" 
                                 placeholder="Enter premium ..">
                      </div>
                      <div class="form-group col-lg-4">
                      </div>


                      <div class="form-group col-lg-4">
                          <input type="checkbox" id="md_checkbox_23" class="filled-in chk-col-deep-purple" checked="">
                      <label for="md_checkbox_23">Od Premium</label>
                      </div>

                      <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Value</label>
                          <input type="text"
                                 class="form-control"
                                 name="od_premium" 
                                 id="od_premium" 
                                 placeholder="Enter od_premium .."
                                 onkeyup="premium_calc(this)">
                      </div>

                      <div class="form-group col-lg-4 pt-4" id="od_premium_val">
                          
                      </div>

                      <div class="form-group col-lg-4">
                          <input type="checkbox" id="md_checkbox_24" class="filled-in chk-col-deep-purple" checked="">
                      <label for="md_checkbox_24">Net Prmium</label>
                      </div>

                      <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Value</label>
                          <input type="text"
                                 class="form-control"
                                 name="net_premium" 
                                 id="net_premium" 
                                 placeholder="Enter net_premium .."
                                 onkeyup="premium_calc(this)">
                      </div>

                      <div class="form-group col-lg-4 pt-4" id="net_premium_val">
                          
                      </div>

                      <div class="form-group col-lg-4">
                          <input type="checkbox" id="md_checkbox_225" class="filled-in chk-col-deep-purple" checked="">
                      <label for="md_checkbox_225">Gross Prmium</label>
                      </div>

                      <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Value</label>
                          <input type="text"
                                 class="form-control"
                                 name="gross_premium" 
                                 id="gross_premium" 
                                 placeholder="Enter gross_premium .."
                                 onkeyup="premium_calc(this)">
                      </div>

                      <div class="form-group col-lg-4 pt-4" id="gross_premium_val">
                          
                      </div>

                      <div class="form-group col-lg-6">
                          <label for="exampleInputEmail1">Start Date</label>
                          <input type="date"
                                 class="form-control"
                                 name="start_date" 
                                 id="start_date" 
                                 placeholder="Enter start_date ..">
                      </div>
                      <div class="form-group col-lg-6">
                          <label for="exampleInputEmail1">End Date</label>
                          <input type="date"
                                 class="form-control"
                                 name="end_date" 
                                 id="end_date" 
                                 placeholder="Enter end_date ..">
                      </div>
                      <div class="form-group col-lg-6">
                          <label for="exampleInputEmail1">Company</label>
                          <input type="text"
                                 class="form-control"
                                 name="company" 
                                 id="company" 
                                 placeholder="Enter company ..">
                      </div>
                      <div class="form-group col-lg-6">
                          <label for="exampleInputEmail1">Portal</label>
                          <input type="text"
                                 class="form-control"
                                 name="portal" 
                                 id="portal" 
                                 placeholder="Enter portal ..">
                      </div>

                      <div class="form-group col-lg-4">
                          <h2>Payout</h2>
                      </div>
                      <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Value</label>
                          <input type="text"
                                 class="form-control"
                                 name="payout" 
                                 id="payout" 
                                 placeholder="Enter payout ..">
                      </div>
                      <div class="form-group col-lg-4">
                      </div>

                      <div class="form-group col-lg-4">
                          <input type="checkbox" id="md_checkbox_27" class="filled-in chk-col-deep-purple" checked="">
                      <label for="md_checkbox_27">Od Wise</label>
                      </div>

                      <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Value</label>
                          <input type="text"
                                 class="form-control"
                                 name="od_wise" 
                                 id="od_wise" 
                                 placeholder="Enter od_wise .." onkeyup="net_wise_calc(this)"
                                 value="">
                      </div>

                      <div class="form-group col-lg-4 pt-4" id="od_wise_val">
                          
                      </div>

                      <div class="form-group col-lg-4">
                          <input type="checkbox" id="md_checkbox_28" class="filled-in chk-col-deep-purple" checked="">
                      <label for="md_checkbox_28">Net Wise</label>
                      </div>

                      

                      <div class="form-group col-lg-4">
                          <label for="exampleInputEmail1">Value</label>
                          <input type="text"
                                 class="form-control"
                                 name="net_wise" 
                                 id="net_wise" 
                                 placeholder="Enter net_wise .." onkeyup="net_wise_calc(this)"
                                 value="">
                      </div>

                      <div class="form-group col-lg-4 pt-4" id="net_wise_val">
                          
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
                          <th>
                                Sn
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Value
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
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('admin_assets/custom_js/taxation.js')}}"></script>

@endsection