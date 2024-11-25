@extends('admin.layout')
@section('extern-css')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Game&Staking',     33.3],
          ['Game&Staking',    33.3],
          ['Game&Staking',    33.3],
          
        ]);

        var options = {
        fill: '#fff',
        colors: ['#35b14e','#fcc9b9','#fcc9b9'],
      width: 300,
      height: 300,
      is3D: true,
       // legend: {
       //       textStyle: { color: 'white' }
       //  },

       legend: {position: 'none'},  
       backgroundColor: {
        fill: '#000',
        fillOpacity: 0
      },
      // chartArea:{left:6,top:6,width:"800px",height:"800px"}

    }


        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);

     }

     $(window).resize(function(){
  drawChart();
});
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Game&Staking',     33.3],
          ['Game&Staking',     33.3],
          ['Game&Staking',    33.3],
          
        ]);

        var options = {
        fill: '#fff',
        colors: ['#000','#35b14e','#fcc9b9'],
      width: 300,
      height: 300,
      is3D: true,
       // legend: {
       //       textStyle: { color: 'white' }
       //  },

       legend: {position: 'none'},  
       backgroundColor: {
        fill: '#000',
        fillOpacity: 0
      },
      // chartArea:{left:6,top:6,width:"800px",height:"800px"}

    }



        var chart2 = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
        chart2.draw(data, options);

     }

     $(window).resize(function(){
  drawChart();
});
    </script>
    <style type="text/css">
      strong{
         font-size: 15px; font-weight: 600;
      }
    </style>
@endsection
@section('content')

<div class="content-wrapper">
    

    <!-- Main content -->
   {{--  <section class="content">
        
      <div class="row">

       

        <div class="col-12">
          <div class="box box-solid bg-gray">
            
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
                         
                           <div class="col-lg-12 col-12">
                              <div class="box">
                               
                                <div class="box-body text-center">
                                  <div id="piechart_3d" height="150"></div>
                                </div>
                                @if($pointer)
                                @foreach($pointer as $key=>$value)
                                <div class="box-body p-0">
                                  <div class="media-list media-list-hover">
                                    <a class="media media-single" href="#">
                                     
                                      <div class="media-body pl-15 bl-5 rounded border-primary">
                                        <p>{{$value->name}}</p>
                                      </div>
                                    </a>
                                      
                                  </div>
                                </div>
                                @endforeach
                                @endif

                                
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->            
                            </div>  

                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>

                    <div class="col-lg-6 col-12">
                      <div class="box box-solid bg-gray">
                        <div class="box-header with-border">
                          <h4 class="box-title">insurent Report</h4>
                        </div>
                        <div class="box-body">
                         
                           <div class="col-lg-12 col-12">
                              <div class="box">
                               
                                <div class="box-body text-center">
                                  <div id="piechart_3d2" height="150"></div>
                                </div>
                                @if($pointer)
                                @foreach($pointer as $key=>$value)
                                <div class="box-body p-0">
                                  <div class="media-list media-list-hover">
                                    <a class="media media-single" href="#">
                                     
                                      <div class="media-body pl-15 bl-5 rounded border-success">
                                        <p>{{$value->name}}</p>
                                      </div>
                                    </a>
                                      
                                  </div>
                                </div>
                                @endforeach
                                @endif
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->            
                            </div>  

                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                    
                </div>
                <a href="{{url('/graph')}}" class="btn btn-primary">Genrate Report</a>
            </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
            
      </div>
     
      <!-- /.row -->
    </section> --}}

    <section class="invoice printableArea">
      
    <!-- title row -->
    <div class="row">
    <div class="col-12">
      <div class="bb-1 clearFix">
      <div class="text-right pb-15">
        <a href="javascript:window.print()" id="print2" class="btn btn-warning" type="button"> <span><i class="fa fa-print"></i> Print</span> </a>
      </div>  
      </div>
    </div>
    <div class="col-12">
      <div class="page-header">
      <img src="{{asset('')}}frontend_assets/images/logo.png" alt="" title="">
      <h2 class="d-inline"><span class="font-size-30">Report</span></h2>
      <div class="pull-right text-right">
        {{-- <img src="{{asset('')}}frontend_assets/images/logo.png" alt="" title=""> --}}
      </div>  
      </div>
    </div>
    <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
    <div class="col-md-6 invoice-col">
      <strong>From</strong> 
      <address>
      <strong class="text-blue font-size-24">Insurent</strong><br>
      <strong class="d-inline">124 Lorem Ipsum, Suite 478,  Dummuy, USA 123456</strong><br>
      <strong>Phone: (00) 123-456-7890 &nbsp;&nbsp;&nbsp;&nbsp; Email: info@example.com</strong>  
      </address>
    </div>
    <!-- /.col -->
    <div class="col-md-6 invoice-col text-right">
      <strong>To</strong>
      <address>
      <strong class="text-blue font-size-24">Doe Shina</strong><br>
      <strong>124 Lorem Ipsum, Suite 478, Dummuy, USA 123456</strong><br>
      <strong>Phone: (00) 789-456-1230 &nbsp;&nbsp;&nbsp;&nbsp; Email: conatct@example.com</strong>
      </address>
    </div>
    <!-- /.col -->
 {{--    <div class="col-sm-12 invoice-col mb-15">
      <div class="invoice-details row no-margin">
        <div class="col-md-6 col-lg-3"><b>Invoice </b>#0154879</div>
        <div class="col-md-6 col-lg-3"><b>Order ID:</b> FC12548</div>
        <div class="col-md-6 col-lg-3"><b>Payment Due:</b> 14/08/2018</div>
        <div class="col-md-6 col-lg-3"><b>Account:</b> 00215487541296</div>
      </div>
    </div> --}}
    <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="box box-solid bg-gray">
          {{-- <div class="box-header with-border">
            <h4 class="box-title">insurent Report</h4>
          </div> --}}
          <div class="box-body">
           
             <div class="col-lg-12 col-12">
                <div class="box">
                 <h4 class="box-title">User Report</h4>
                  <div class="box-body text-center">
                    <div id="piechart_3d2" height="150"></div>
                  </div>
                  @if($pointer)
                  @foreach($pointer as $key=>$value)
                  <div class="box-body p-0">
                    <div class="media-list media-list-hover">
                      <a class="media media-single" href="#">
                       
                        <div class="media-body pl-15 bl-5 rounded border-success">
                          <p>{{$value->name}}</p>
                        </div>
                      </a>
                        
                    </div>
                  </div>
                  @endforeach
                  @endif
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->            
              </div>  

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>


      <div class="col-lg-6 col-12">
        <div class="box box-solid bg-gray">
          {{-- <div class="box-header with-border">
            <h4 class="box-title">insurent Report</h4>
          </div> --}}
          <div class="box-body">
           
             <div class="col-lg-12 col-12">
                <div class="box">
                 <h4 class="box-title">insurent Report</h4>
                  <div class="box-body text-center">
                    <div id="piechart_3d" height="150"></div>
                  </div>
                  @if($pointer)
                  @foreach($pointer as $key=>$value)
                  <div class="box-body p-0">
                    <div class="media-list media-list-hover">
                      <a class="media media-single" href="#">
                       
                        <div class="media-body pl-15 bl-5 rounded border-success">
                          <p>{{$value->name}}</p>
                        </div>
                      </a>
                        
                    </div>
                  </div>
                  @endforeach
                  @endif

                  <!-- /.box-body -->
                </div>
                <!-- /.box -->            
              </div> 
               

          </div>


          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>

      <div class="col-lg-6 col-12">
      </div>

      <div class="col-lg-6 col-12">
        <div class="col-md-12 col-lg-12">
        <h2>Benifits For Choosing Insurent</h2>
      </div>
      

          <div class="col-md-12 col-lg-12">
            <div class="box box-body text-center pull-up box-inverse box-success"> 
              <h6 class="text-fade">FreeCheckup</h6>
            </div>
          </div><div class="col-md-12 col-lg-12">
            <div class="box box-body text-center pull-up box-inverse box-success"> 
              <h6 class="text-fade">InsuranceRedeem</h6>
            </div>
          </div><div class="col-md-12 col-lg-12">
            <div class="box box-body text-center pull-up box-inverse box-success"> 
              <h6 class="text-fade">FreeCourses</h6>
            </div>
          </div><div class="col-md-12 col-lg-12">
            <div class="box box-body text-center pull-up box-inverse box-success"> 
              <h6 class="text-fade">Fooding</h6>
            </div>
          </div>
      </div>
    <div class="col-12 table-responsive">
      <table class="table table-bordered">
      <tbody>
      <tr>
        {{-- <th>#</th> --}}
        <th>Question</th>
        <th>Answer</th>
      </tr>
      @foreach(json_decode($lead->json,true) as $key=>$value)
        @if($key == 'token' or $key == '_token')
        @else
            {{-- @if(is_array($value))
            <div class="d-flex align-items-center mb-1">
                <strong class="text-15pt">{{$key}}</strong>&nbsp;&nbsp;&nbsp;
                <p class="mt-3">@php implode($value,','); @endphp</p>
            </div>
            @else --}}
            

            <tr>
              <td>{{$key}}</td>
              <td class="text-right">@php print_r($value); @endphp</td>
            </tr>
        @endif
          
        @endforeach
      
     
      </tbody>
      </table>
    </div>

    
      
    <!-- /.col -->
    </div>

    <!-- /.row -->

    <!-- this row will not appear when printing -->
   {{--  <div class="row no-print">
    <div class="col-12">
      <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
      </button>
    </div>
    </div> --}}

  </section>
    <!-- /.content -->
  </div>
  
@endsection
@section('extern-js')

@endsection