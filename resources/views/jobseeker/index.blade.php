@extends('jobseeker.layout.main')
@section('content')
 <?php
    $info = DB::table('general_info')->first(); 
    $jobsc = DB::table('jobs')->where('created_by',Auth::user()->id)->count(); 
     $rfpsc = DB::table('rfps')->where('created_by',Auth::user()->id)->count(); 

     $rfqsc = DB::table('rfqs')->where('created_by',Auth::user()->id)->count(); 
     $jobcreditsc = DB::table('credits')->where('user_id',Auth::user()->id)->sum('amount'); 

      $rfps = DB::table('rfps')->where('created_by',Auth::user()->id)->get(); 
      $rfqs = DB::table('rfqs')->where('created_by',Auth::user()->id)->get(); 

    ?>

 <div class="row pb40">
         
            <div class="col-lg-12">
              <div class="dashboard_title_area">
                <h2>Dashboard</h2>
                <p class="text">Main Dashboard</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-xxl-3">
              <div class="d-flex align-items-center justify-content-between statistics_funfact">
                <div class="details">
                  <div class="fz15">My Jobs</div>
                  <div class="title">{{$jobsc}}</div>
                </div>
                <div class="icon text-center"><i class="flaticon-contract"></i></div>
              </div>
            </div>
            <div class="col-sm-6 col-xxl-3">
              <div class="d-flex align-items-center justify-content-between statistics_funfact">
                <div class="details">
                  <div class="fz15">RFPs</div>
                  <div class="title">{{$rfpsc}}</div>
                </div>
                <div class="icon text-center"><i class="flaticon-success"></i></div>
              </div>
            </div>
            <div class="col-sm-6 col-xxl-3">
              <div class="d-flex align-items-center justify-content-between statistics_funfact">
                <div class="details">
                  <div class="fz15">RFQs</div>
                  <div class="title">{{$rfqsc}}</div>
                </div>
                <div class="icon text-center"><i class="flaticon-review"></i></div>
              </div>
            </div>
            <div class="col-sm-6 col-xxl-3">
              <div class="d-flex align-items-center justify-content-between statistics_funfact">
                <div class="details">
                  <div class="fz15">Total Credits</div>
                  <div class="title">{{$jobcreditsc}}</div>
                </div>
                <div class="icon text-center"><i class="flaticon-review-1"></i></div>
              </div>
            </div>
          </div>
       
         
               
@stop