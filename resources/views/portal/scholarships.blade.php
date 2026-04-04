@extends('admin.layout.main')
@section('content')
<?php $info = App\info::find(1);
 $check_user = \DB::table('users')->find(Auth::user()->id);
  $jobcreditsc = DB::table('credits')->where('user_id',Auth::user()->id)->sum('amount'); 
 ?>
   <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<style type="text/css">
  .ck-content ,.ck-editor__editable 
  {
    height: 330px !important
  }
</style>
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1354845579740725"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-de-1j+5w-lj+e7"
     data-ad-client="ca-pub-1354845579740725"
     data-ad-slot="4040424572"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
    
       {{ Html::ul($errors->all(), array('class'=>'alert alert-danger text-danger','style'=>'padding:5px;')) }}
       @if(Session::has('message'))
            <div class="alert alert-success">
              {{ Session::get('message') }}
            </div>
          @endif
      <!-- END PAGE HEADER-->
      <div class="portlet box blue" id="form_wizard_1">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-pencil"></i> Manage Scholarships 
              </div>
              <div class="tools hidden-xs">
                <a href="javascript:;" class="collapse">
                </a>
                <a href="javascript:;" class="reload">
                </a>
                <a href="javascript:;" class="remove">
                </a>
              </div>
            </div>
            <div class="portlet-body form">


            
          
         
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="packages_table table-responsive">
                  <table class="table-style3 table at-savesearch">
                    <thead class="t-head">
                    	 <tr>
                        <th scope="" colspan="7">
                         <a href="{{ URL::route('addscholarships') }}" class="ud-btn btn-thm"> New Scholarships</a>
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
                            <a href="{{ URL::route('editscholarships',$job->id) }}" class="btn btn-xs btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="{{ URL::route('deletescholarships',$job->id) }}" class="btn btn-xs btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
          </div>
          </div>

@stop