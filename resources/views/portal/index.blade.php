
@extends('portal.layout.main')
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
       
          <div class="row">
            <div class="col-md-12">
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="d-flex justify-content-between bdrb1 pb15 mb20">
                  <h5 class="title">My Jobs</h5>
                </div>
                <div class="dashboard-img-service">
              
                  <table class="table-style3 table at-savesearch">
                    <thead class="t-head">
                      <script async custom-element="amp-auto-ads"
        src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
</script>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Views</th>
                        <th scope="col">Created & Expired</th>
                        <th scope="col">Status</th>
                        <th scope="col">Salary</th>
                      </tr>
                    </thead>
                    <tbody class="t-body">
                    <amp-auto-ads type="adsense"
        data-ad-client="ca-pub-1354845579740725">
</amp-auto-ads>
                      @foreach($jobs as $job)
                      <tr>
                        <th scope="row">
                          <div class="freelancer-style1 p-0 mb-0 box-shadow-none">
                            <div class="d-lg-flex align-items-lg-center">
                              <div class="thumb w60 position-relative rounded-circle mb15-md">
                                <img src="{{asset('images/'.$info->logo)}}" alt="Header Logo" style="height: 70px !important; width: 70px" class="rounded-circle mx-auto">
                                <span class="online-badge2"></span>
                              </div>
                              <div class="details ml15 ml0-md mb15-md">
                                <h5 class="title mb-2">{{$job->title}}</h5>
                                <h6 class="mb-0 text-thm">{{$job->vacancy}}</h6>
                              </div>
                            </div>
                          </div>
                        </th>
                        <td class="vam"><span class="fz15 fw400">3 Views</span></td>
                        <td class="vam"><span>{{$job->start_date}}</span><br><span class="fz14 fw400">{{$job->end_date}}</span></td>
                        <td class="vam"><?php $today = date("Y-m-d");?> @if($job->end_date >= $today and $job->start_date <= $today) 
                          <span class="pending-style style6">Active</span> @else <span class="pending-style style6">Expired</span> @endif</td>
                        <td>
                          <span class="pending-style style6">{{$job->salary}}</span>
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="d-flex justify-content-between bdrb1 pb15 mb30">
                  <h5 class="title">My RFPs</h5>
                </div>
                <div class="dashboard-img-service">
                   <table class="table-style3 table at-savesearch">
                    <thead class="t-head">
                      
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Views</th>
                        <th scope="col">Created & Expired</th>
                        <th scope="col">Status</th>
                        <th scope="col">Salary</th>
                      </tr>
                    </thead>
                    <tbody class="t-body">
                      @foreach($rfps as $rfp)
                      <tr>
                        <th scope="row">
                          <div class="freelancer-style1 p-0 mb-0 box-shadow-none">
                            <div class="d-lg-flex align-items-lg-center">
                              <div class="thumb w60 position-relative rounded-circle mb15-md">
                                <img src="{{asset('images/'.$info->logo)}}" alt="Header Logo" style="height: 70px !important; width: 70px"  class="rounded-circle mx-auto">
                                <span class="online-badge2"></span>
                              </div>
                              <div class="details ml15 ml0-md mb15-md">
                                <h5 class="title mb-2">{{$rfp->title}}</h5>
                                <h6 class="mb-0 text-thm"><?php echo substr($rfp->description,0,20)?></h6>
                              </div>
                            </div>
                          </div>
                        </th>
                        <td class="vam"><span class="fz15 fw400">3 Views</span></td>
                        <td class="vam"><span>{{$rfp->start_date}}</span><br><span class="fz14 fw400">{{$rfp->end_date}}</span></td>
                        <td class="vam"><?php $today = date("Y-m-d");?> @if($rfp->end_date >= $today and $rfp->start_date <= $today) 
                          <span class="pending-style style6">Active</span> @else <span class="pending-style style6">Expired</span> @endif</td>
                        <td>
                          <a href="{{asset('projectsfiles/rpfs/'.$rfp->file_download)}}"><i class="fa fa-download"></i> Download </a>
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                
                </div>
              </div>
            </div>


               <div class="col-md-12">
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="d-flex justify-content-between bdrb1 pb15 mb30">
                  <h5 class="title">My RFQs</h5>
                </div>
                <div class="dashboard-img-service">
                   <table class="table-style3 table at-savesearch">
                    <thead class="t-head">
                      
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Views</th>
                        <th scope="col">Created & Expired</th>
                        <th scope="col">Status</th>
                        <th scope="col">Salary</th>
                      </tr>
                    </thead>
                    <tbody class="t-body">
                      @foreach($rfqs as $rfp)
                      <tr>
                        <th scope="row">
                          <div class="freelancer-style1 p-0 mb-0 box-shadow-none">
                            <div class="d-lg-flex align-items-lg-center">
                              <div class="thumb w60 position-relative rounded-circle mb15-md">
                                <img src="{{asset('images/'.$info->logo)}}" alt="Header Logo" style="height: 70px !important; width: 70px" class="rounded-circle mx-auto">
                                <span class="online-badge2"></span>
                              </div>
                              <div class="details ml15 ml0-md mb15-md">
                                <h5 class="title mb-2">{{$rfp->title}}</h5>
                                <h6 class="mb-0 text-thm"><?php echo substr($rfp->description,0,20)?></h6>
                              </div>
                            </div>
                          </div>
                        </th>
                        <td class="vam"><span class="fz15 fw400">3 Views</span></td>
                        <td class="vam"><span>{{$rfp->start_date}}</span><br><span class="fz14 fw400">{{$rfp->end_date}}</span></td>
                        <td class="vam"><?php $today = date("Y-m-d");?> @if($rfp->end_date >= $today and $rfp->start_date <= $today) 
                          <span class="pending-style style6">Active</span> @else <span class="pending-style style6">Expired</span> @endif</td>
                        <td>
                          <a href="{{asset('projectsfiles/rfqs/'.$rfp->file_download)}}"><i class="fa fa-download"></i> Download </a>
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                
                </div>
              </div>
            </div>
           
          </div>
               
@stop