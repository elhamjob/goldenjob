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
  
 
<section class="pt30 pb90">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="list-sidebar-style1 d-none d-lg-block">
              {{ Form::open(array('url'=>'/filterjobs')) }}
              <div class="accordion" id="accordionExample">
                   <div class="card mb20 pb10 mt-0">
                  <div class="card-header active" id="heading0">
                    <h4>
                      <button class="btn btn-link ps-0 pt-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse0" aria-expanded="true" aria-controls="collapse0">{{trans('messages.Title')}}</button>
                    </h4>
                  </div>
                  <div id="collapse0" class="collapse show" aria-labelledby="heading0" data-parent="#accordionExample">
                    <div class="card-body card-body px-0 pt-0">
                       <input class="form-control" name="title" placeholder="{{trans('messages.Title')}}" />
                    </div>
                  </div>
                </div>

                <div class="card mb20 pb10 mt-0">
                  <div class="card-header active" id="heading0">
                    <h4>
                      <button class="btn btn-link ps-0 pt-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse0" aria-expanded="true" aria-controls="collapse0">{{trans('messages.Job Categories')}}</button>
                    </h4>
                  </div>
                  <div id="collapse0" class="collapse show" aria-labelledby="heading0" data-parent="#accordionExample">
                    <div class="card-body card-body px-0 pt-0">
                     
                       <select class="selectpicker" name="cat" id="location">
                               <option value=""></option>
                            <?php $categories = DB::table('program')->orderby("id","desc")->get();?>
                      @foreach($categories as $cat)
                             <option value="{{$cat->id}}"><?php if(Lang::locale()=='fa'){echo $cat->name_fa;}else { echo $cat->name_en;} ?></option>
                             @endforeach
                          </select>
                    </div>
                  </div>
                </div>
               
                <div class="card mb20 pb5">
                  <div class="card-header active" id="heading2">
                    <h4>
                      <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">{{trans('messages.Job Type')}}</button>
                    </h4>
                  </div>
                  <div id="collapse2" class="collapse show" aria-labelledby="heading2" data-parent="#accordionExample">
                    <div class="card-body card-body px-0 pt-0">
                      <div class="widget-wrapper pr20">
                        <div class="switch-style1">
                         
                          <div class="form-check form-switch mb20">
                            <input class="form-check-input" type="checkbox" value="Freelance" id="flexSwitchCheckDefault1">
                            <label class="form-check-label" for="flexSwitchCheckDefault1">Freelance</label>
                            <span class="right-tags"></span>
                          </div>
                        </div>
                        <div class="switch-style1">
                          <div class="form-check form-switch mb20">
                            <input class="form-check-input" type="checkbox" value="Full Time" id="flexSwitchCheckDefault2" checked="checked">
                            <label class="form-check-label" for="flexSwitchCheckDefault2">Full Time</label>
                            <span class="right-tags"></span>
                          </div>
                        </div>
                        <div class="switch-style1">
                          <div class="form-check form-switch mb20">
                            <input class="form-check-input" type="checkbox" value="Part Time" id="flexSwitchCheckDefault3">
                            <label class="form-check-label" for="flexSwitchCheckDefault3">Part Time</label>
                            <span class="right-tags"></span>
                          </div>
                        </div>
                      
                         <div class="switch-style1">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="Internship" id="flexSwitchCheckDefault4">
                            <label class="form-check-label" for="flexSwitchCheckDefault4">Internship</label>
                            <span class="right-tags"></span>
                          </div>
                        </div>
                      </div>
                      <a class="text-thm" href="#">Others</a>
                    </div>
                  </div>
                </div>
                <div class="card mb20 pb5">
                  <div class="card-header active" id="heading3">
                    <h4>
                      <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">{{trans('messages.Location')}}</button>
                    </h4>
                  </div>
                  <div id="collapse3" class="collapse show" aria-labelledby="heading3" data-parent="#accordionExample">
                    <div class="card-body card-body px-0 pt-0">
                      <select class="selectpicker" name="location" id="location">
                               <option value=""></option>
                           <?php   $states = DB::table('states')->where("country_id",1)->get();?>
                           @foreach($states as $state)
                             <option value="{{$state->id}}">{{$state->name}}</option>
                             @endforeach
                          </select>
                          <br>
                         <button type="submit" class="  ud-btn btn-thm">  Search</button>
                    </div>
                  </div>
                </div>
              </div>
              {{Form::close()}}
            </div>
          </div>
          <div class="col-lg-9">
            <div class="row align-items-center mb20">
              <div class="col-md-6">
                <div class="text-center text-md-start">
                  <p class="text mb-0 mb10-sm"><span class="fw500"></span> Sea  available Jobs</p>
                </div>
              </div>
             
            </div>
            <div class="row">
               <?php $i = 1;?>
            @foreach($jobs as $rfp)
            <?php $i++?>
             <?php 
                       $user = \DB::table('users')->find($rfp->created_by);?>
                       <?php $city = App\model\states::where('id',$rfp->city)->first();
$program = App\model\program::where('id',$rfp->category)->first();

 ?>

              <div class="col-sm-6 col-xl-12">
                <div class="job-list-style1 bdr1 d-xl-flex align-items-start">
                  <div class="icon d-flex align-items-center mb20">
                    <img src="{{asset('images/users/'.$user->image)}}" alt="logo" style="height: 70px !important" class="rounded-circle mx-auto">
                    <span class="fav-icon ">
                      <a href="{{{ URL::route('jobdetails',$rfp->id) }}}"> <i class="fa fa-eye"></i></a>
                    </span>
                  </div>
                  <div class="details ml20 ml0-xl">
                    <h5><a href="{{{ URL::route('jobdetails',$rfp->id) }}}"> {{$rfp->title}} ({{$rfp->vacancy}})</a></h5>
                    <h6 class="mb-3 text-thm"><?php echo substr($rfp->description,0,100)?></h6>
                    <p class="list-inline-item mb-0">{{$rfp->salary}}</p>
                    <p class="list-inline-item mb-0 bdrl1 pl15">{{$program->name_en ?? ""}}</p>
                    <p class="list-inline-item mb-0 bdrl1 pl15">{{$rfp->employment_type}}</p>
                    <p class="list-inline-item mb-0 bdrl1 pl15">{{$city->name ?? ""}}</p>
                  </div>
                </div>
              </div>
           
             @endforeach
            </div>
            <div class="row">
              {{$jobs->links()}}
            </div>
          </div>
        </div>
      </div>
    </section>


               
@stop