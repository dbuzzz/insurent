@extends('admin.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins\datatables\dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins\datatables\responsive.bootstrap4.min.css') }}">

   <link rel="stylesheet" href="{{asset('')}}admin_assets/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">
   <style type="text/css">
       [type=checkbox]:checked, [type=checkbox]:not(:checked) {
     position: absolute; 
     left: 0px !important; 
     opacity: 1; 
}
   </style>
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        report
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">report</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
      <div class="row">

        <div class="col-lg-12 col-12">
          <div class="box box-solid bg-gray">
            <div class="box-header with-border">
                <h4 class="box-title">Detail</h4>
                <ul class="box-controls pull-right">
                  <li><a class="box-btn-slide" href="#"></a></li>   
                  <li><a class="box-btn-fullscreen" href="#"></a></li>
                </ul>
              </div>
            <div class="box-body">
                {{-- @dd($lead) --}}
                <strong>Email</strong>:-{{@$lead->email}}
                <strong>Phone</strong>:-{{@$lead->phone}}
            {{-- {{@$lead->json}} --}}
            @foreach(json_decode($lead->json,true) as $key=>$value)
            @if($key == 'token' or $key == '_token')
            @else
                {{-- @if(is_array($value))
                <div class="d-flex align-items-center mb-1">
                    <strong class="text-15pt">{{$key}}</strong>&nbsp;&nbsp;&nbsp;
                    <p class="mt-3">@php implode($value,','); @endphp</p>
                </div>
                @else --}}
                <div class="d-flex align-items-center mb-1">
                    <strong class="text-15pt">{{$key}}</strong>&nbsp;&nbsp;&nbsp;
                    <p class="mt-3">@php print_r($value); @endphp</p>
                </div>
                {{-- @endif --}}
            @endif
              
            @endforeach

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-12">
          <div class="box box-solid bg-gray">
            <div class="box-header with-border">
              <h4 class="box-title">Report Genration</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form>
        
                <div class="row">
                    <div class="col-lg-6 col-12">
                      <div class="box box-solid bg-gray">
                        <div class="box-header with-border">
                          <h4 class="box-title">User Report</h4>
                        </div>
                        <div class="box-body">
                         
                            @foreach($pointer as $key=>$value) 
                            <div class="form-group col-lg-3">
                                <label for="md_checkbox_{{$key}}">{{$value->name}}</label>
                                <input type="checkbox" name="{{$value->slug}}" id="md_checkbox_{{$key}}" class="filled-in chk-col-deep-purple">
                            </div>
                            @endforeach

                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>

                    <div class="col-lg-6 col-12">
                      <div class="box box-solid bg-gray">
                        <div class="box-header with-border">
                          <h4 class="box-title">Insurent Report</h4>
                        </div>
                        <div class="box-body">
                         
                            @foreach($pointer as $key=>$value) 
                            <div class="form-group col-lg-3">
                                <label for="md_checkbox_{{$key}}">{{$value->name}}</label>
                                <input type="checkbox" name="{{$value->slug}}" id="md_checkbox_{{$key}}" class="filled-in chk-col-deep-purple">
                            </div>
                            @endforeach

                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                    
                </div>
                <a href="{{route('report_graph',['id'=>@$lead->id])}}" class="btn btn-primary">Genrate Report</a>
            </form>
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
<script src="{{url('admin_assets/custom_js/notification.js')}}"></script>

<script src="{{asset('')}}admin_assets/assets/vendor_components/ckeditor/ckeditor.js"></script>
    <script src="{{asset('')}}admin_assets/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>

    <script src="{{asset('')}}admin_assets/js/pages/editor.js"></script>
@endsection