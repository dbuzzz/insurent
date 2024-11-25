@extends('admin.layout')
@section('content')


<div class="content-wrapper">
      
    <!-- Main content -->
    <section class="content">
        
        <div class="row">
            
            <div class="col-xl-3 col-md-6 col-12">
                <div class="flexbox flex-justified text-center bg-info mb-30 pull-up">
                  <div class="no-shrink py-30">
                    <span class="mdi mdi-ticket-confirmation font-size-50"></span>
                  </div>

                  <div class="py-30 bg-white text-dark">
                    <div class="font-size-30 countnm">2064</div>
                    <span>Users</span>
                  </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xl-3 col-md-6 col-12">
                <div class="flexbox flex-justified text-center bg-warning mb-30 pull-up">
                  <div class="no-shrink py-30">
                    <span class="mdi mdi-message-reply-text font-size-50"></span>
                  </div>

                  <div class="py-30 bg-white text-dark">
                    <div class="font-size-30 countnm">1738</div>
                    <span>Agents</span>
                  </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xl-3 col-md-6 col-12">
                <div class="flexbox flex-justified text-center bg-success mb-30 pull-up">
                  <div class="no-shrink py-30">
                    <span class="mdi mdi-thumb-up-outline font-size-50"></span>
                  </div>

                  <div class="py-30 bg-white text-dark">
                    <div class="font-size-30 countnm">1100</div>
                    <span>Policy</span>
                  </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xl-3 col-md-6 col-12">
                <div class="flexbox flex-justified text-center bg-danger mb-30 pull-up">
                  <div class="no-shrink py-30">
                    <span class="mdi mdi-ticket font-size-50"></span>
                  </div>

                  <div class="py-30 bg-white text-dark">
                    <div class="font-size-30 countnm">964</div>
                    <span>Earning</span>
                  </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xl-12">
                <div class="box pull-up">
                    <div class="box-header">
                        <h4 class="box-title">Overview</h4>
                    </div>
                    <div class="box-body">
                        <canvas id="home-chart"></canvas>
                    </div>
                </div>
            </div>
         
                    
        </div>
                  
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('extern-js')
<script src="{{asset('')}}admin/assets/vendor_components/chart.js-master/Chart.min.js"></script>
@endsection