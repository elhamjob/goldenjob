@extends('portal.layout.main')
@section('content')
<?php $info = App\info::find(1);
 $check_user = \DB::table('users')->find(Auth::user()->id);
  $jobcreditsc = DB::table('credits')->where('user_id',Auth::user()->id)->sum('amount'); 
 ?>
 <div class="row pb40">
  <div class="col-lg-12">
              <div class="dashboard_title_area">
                <h2>Manage RFQs</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="packages_table table-responsive">
                  <table class="table-style3 table at-savesearch">
                    <thead class="t-head">
                    	 <tr>
                        <th scope="" colspan="7">
                           @if($jobcreditsc >=1)
                         <a href="{{ URL::route('addrfqs') }}" class="ud-btn btn-thm"> New RFQs</a>
                          @else
                            <a href="{{ URL::route('addrfqs') }}" class="ud-btn btn-thm"> New RFQs</a>
                        <!--   <span class="text-danger">insufficient creadit balance to post new RFQs!</span><br>
                           <a href="javascript::void()" class="ud-btn btn-thm"> New RFQs</a> -->
                           @endif
                           </th>
                    </tr>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Views</th>
                        <th scope="col">Created & Expired</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody class="t-body">
                      @foreach($rfps as $job)
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
                          <div class="d-flex">
                            <a href="{{ URL::route('editrfqs',$job->id) }}" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="flaticon-pencil"></span></a>
                            <a href="{{ URL::route('deleterfqs',$job->id) }}" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-delete"></span></a>
                          </div>
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