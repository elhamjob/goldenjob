@extends('website.layout.front_en')
@section('content')
 <?php
    $info = DB::table('general_info')->first(); //Basic Info About University
    ?>

<style type="text/css">
  td
  {
    padding: 1px !important
  }
</style>
    <section class="pt-5 pb90">
      <div class="container">
        <div class="row align-items-center wow fadeInUp">
          <div class="col-xl-3">
            <div class="main-title mb30-lg">
              <h2 class="title">Search Results</h2>
              <p class="paragraph"></p>
            </div>
          </div>
          <div class="col-xl-9">
            <div class="navpill-style2 at-home6 mb50-lg">
              <ul class="nav nav-pills mb20 justify-content-xl-end" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active fw500 dark-color" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Jobs</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link fw500 dark-color" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Scholarships</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link fw500 dark-color" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">RFPs</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link fw500 dark-color" id="pills-music-tab" data-bs-toggle="pill" data-bs-target="#pills-music" type="button" role="tab" aria-controls="pills-music" aria-selected="false">RFQs</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link fw500 dark-color" id="pills-video-tab" data-bs-toggle="pill" data-bs-target="#pills-video" type="button" role="tab" aria-controls="pills-video" aria-selected="false">Job Applications</button>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="navpill-style2">
              <div class="tab-content ha" id="pills-tabContent">
                <div class="tab-pane fade fz15 text show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <table class="table table-bordered">
                      <tr>
                     <td>S.No</td>
                      <td>Title</td>
                       <td>Description</td>
                       <td>Organization</td>
                       <td>Close Date </td>
                       <td>Download</td>
                    </tr>
                    <?php $i = 1;?>
                    @foreach($jobs as $rfp)
                    <?php $i++?>
                     <?php 
                               $user = \DB::table('users')->find($rfp->created_by);?>
                     <tr>
                     <td>{{$i}}</td>
                      <td ><a href="{{{ URL::route('jobdetails',$rfp->id) }}}"> {{$rfp->title}}</a></td>
                       <td><?php echo substr($rfp->description,0,100)?></td>
                       <th scope="row">
                                  <div class="freelancer-style1 p-0 mb-0 box-shadow-none">
                                    <div class="d-lg-flex align-items-lg-center">
                                      <div class="thumb w60 position-relative rounded-circle mb15-md">
                                        <img src="{{asset('images/users/'.$user->image)}}" alt="logo" style="height: 70px !important" class="rounded-circle mx-auto">
                                      </div>
                                      <div class="details ml15 ml0-md mb15-md">
                                        <h5 class="title mb-2">{{$user->name}} {{$user->last_name}}</h5>
                                      </div>
                                    </div>
                                  </div>
                                </th>
                       <td>{{$rfp->end_date}} </td>
                       <td><a href="{{asset('projectsfiles/rfqs/'.$rfp->file_download)}}"><i class="fa fa-download"></i> Download</td>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <div class="tab-pane fade fz15 text" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <table class="table table-bordered">
                    <tr>
                   <td>S.No</td>
                    <td>Title</td>
                     <td>Description</td>
                     <td>Organization</td>
                     <td>Close Date </td>
                     <td>Download</td>
                  </tr>
                  <?php $i = 1;?>
                  @foreach($scholarships as $rfp)
                  <?php $i++?>
                   <?php 
                             $user = \DB::table('users')->find($rfp->created_by);?>
                   <tr>
                   <td>{{$i}}</td>
                    <td>{{$rfp->title}}</td>
                     <td><?php echo substr($rfp->description,0,100)?></td>
                     <th scope="row">
                                <div class="freelancer-style1 p-0 mb-0 box-shadow-none">
                                  <div class="d-lg-flex align-items-lg-center">
                                    <div class="thumb w60 position-relative rounded-circle mb15-md">
                                      <img src="{{asset('images/users/'.$user->image)}}" alt="logo" style="height: 70px !important" class="rounded-circle mx-auto">
                                    </div>
                                    <div class="details ml15 ml0-md mb15-md">
                                      <h5 class="title mb-2">{{$user->name}} {{$user->last_name}}</h5>
                                    </div>
                                  </div>
                                </div>
                              </th>
                     <td>{{$rfp->end_date}} </td>
                     <td><a href="{{asset('projectsfiles/scholarships/'.$rfp->file_download)}}"><i class="fa fa-download"></i> Download</td>
                  </tr>
                  @endforeach
                </table>
                </div>
                <div class="tab-pane fade fz15 text" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                   <table class="table table-bordered">
                    <tr>
                   <td>S.No</td>
                    <td>Title</td>
                     <td>Description</td>
                     <td>Organization</td>
                     <td>Close Date </td>
                     <td>Download</td>
                  </tr>
                  <?php $i = 1;?>
                  @foreach($rfps as $rfp)
                  <?php $i++?>
                   <?php 
                             $user = \DB::table('users')->find($rfp->created_by);?>
                   <tr>
                   <td>{{$i}}</td>
                    <td><a href="{{{ URL::route('rfpdetails',$rfp->id) }}}"> {{$rfp->title}}</a></td>
                     <td><?php echo substr($rfp->description,0,100)?></td>
                     <th scope="row">
                                <div class="freelancer-style1 p-0 mb-0 box-shadow-none">
                                  <div class="d-lg-flex align-items-lg-center">
                                    <div class="thumb w60 position-relative rounded-circle mb15-md">
                                      <img src="{{asset('images/users/'.$user->image)}}" alt="logo" style="height: 70px !important" class="rounded-circle mx-auto">
                                    </div>
                                    <div class="details ml15 ml0-md mb15-md">
                                      <h5 class="title mb-2">{{$user->name}} {{$user->last_name}}</h5>
                                    </div>
                                  </div>
                                </div>
                              </th>
                     <td>{{$rfp->end_date}} </td>
                     <td><a href="{{asset('projectsfiles/rpfs/'.$rfp->file_download)}}"><i class="fa fa-download"></i> Download</a></td>
                  </tr>
                  @endforeach
                </table>
                </div>
                <div class="tab-pane fade fz15 text" id="pills-music" role="tabpanel" aria-labelledby="pills-music-tab">
                  <table class="table table-bordered">
                  
                    <tr>
                   <td>S.No</td>
                    <td>Title</td>
                     <td>Description</td>
                     <td>Organization</td>
                     <td>Close Date </td>
                     <td>Download</td>
                  </tr>
                  <?php $i = 1;?>
                  @foreach($rfqs as $rfp)
                  <?php $i++?>
                   <?php 
                             $user = \DB::table('users')->find($rfp->created_by);?>
                   <tr>
                   <td>{{$i}}</td>
                    <td><a href="{{{ URL::route('rfqdetails',$rfp->id) }}}"> {{$rfp->title}}</a></td>
                     <td><?php echo substr($rfp->description,0,100)?></td>
                     <th scope="row">
                                <div class="freelancer-style1 p-0 mb-0 box-shadow-none">
                                  <div class="d-lg-flex align-items-lg-center">
                                    <div class="thumb w60 position-relative rounded-circle mb15-md">
                                      <img src="{{asset('images/users/'.$user->image)}}" alt="logo" style="height: 70px !important" class="rounded-circle mx-auto">
                                    </div>
                                    <div class="details ml15 ml0-md mb15-md">
                                      <h5 class="title mb-2">{{$user->name}} {{$user->last_name}}</h5>
                                    </div>
                                  </div>
                                </div>
                              </th>
                     <td>{{$rfp->end_date}} </td>
                     <td><a href="{{asset('projectsfiles/rfqs/'.$rfp->file_download)}}"><i class="fa fa-download"></i> Download</a></td>
                  </tr>
                  @endforeach
                </table>
                </div>
                <div class="tab-pane fade fz15 text" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                   <table class="table table-bordered">
            
              <tr>
             <td>S.No</td>
              <td>Title</td>
               <td>Description</td>
               <td>Organization</td>
               <td>Close Date </td>
               <td>Download</td>
            </tr>
            <?php $i = 1;?>
            @foreach($applicationforms as $rfp)
            <?php $i++?>
             <?php 
                       $user = \DB::table('users')->find($rfp->created_by);?>
             <tr>
             <td>{{$i}}</td>
              <td>{{$rfp->title}}</td>
               <td><?php echo substr($rfp->description,0,100)?></td>
               <th scope="row">
                          <div class="freelancer-style1 p-0 mb-0 box-shadow-none">
                            <div class="d-lg-flex align-items-lg-center">
                              <div class="thumb w60 position-relative rounded-circle mb15-md">
                                <img src="{{asset('images/users/'.$user->image)}}" alt="logo" style="height: 70px !important" class="rounded-circle mx-auto">
                              </div>
                              <div class="details ml15 ml0-md mb15-md">
                                <h5 class="title mb-2">{{$user->name}} {{$user->last_name}}</h5>
                              </div>
                            </div>
                          </div>
                        </th>
               <td>{{$rfp->end_date}} </td>
               <td><a href="{{asset('projectsfiles/forms/'.$rfp->file_download)}}"><i class="fa fa-download"></i> Download</td>
            </tr>
            @endforeach
          </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



               
@stop