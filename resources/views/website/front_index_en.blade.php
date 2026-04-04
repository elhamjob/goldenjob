

@extends('website.layout.front_en')
@section('content')
<style type="text/css">
  #text-white *
  {
    color: white !important
  }
</style>
<?php $info = App\info::find(1);?>
  <section class="hero-home10 p-0 overflow-hidden">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-lg-12">
            <div class="main-banner-wrapper home9-hero-content">
              <div class="navi_pagi_vertical_right dots_nav_light banner-style-one slider-1-grid owl-theme owl-carousel">
                        <?php $slides = DB::table('home_slider')->orderby("id","desc")->get();
                  $i =1;?>
                  @foreach($slides as $slide)
                <div class="slide slide-one" style="background-image: url({{asset('images/main-slider/'.$slide->photo)}});">
                    <div class="home1-banner-content at-home9" style="background: rgb(31 75 63 / 72%); border-radius: 8px">
                    <div class="container">
                      <div class="row">
                        <div class="col-xl-7">
                          <h3 class="banner-title"><?php if(Lang::locale()=='fa'){echo $slide->heading_fa;}else { echo $slide->heading_en;} ?>  </h3>
                          <p class="banner-text text-white ff-heading mb30"><?php if(Lang::locale()=='fa'){echo substr($slide->text_fa,0,2000);}else { echo substr($slide->text_en,0,2000);} ?></p>
                       
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
               
              </div>
              <!-- /.carousel-btn-block banner-carousel-btn --> 
            </div>
            <!-- /.main-banner-wrapper --> 
          </div>
        </div>
      </div>
    

<section class="pt30 pb90">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="list-sidebar-style1 " >
              {{ Form::open(array('url'=>'/filterjobs')) }}
              <table class="table table-bordered">
                <tr>
                  <td><input class="form-control" name="title" placeholder="{{trans('messages.Title')}}" /></td>
                </tr>
                <tr>
                  <td>
                     <select class="selectpicker" name="cat" id="location">
                               <option value=""></option>
                            <?php $categories = DB::table('program')->orderby("id","desc")->get();?>
                      @foreach($categories as $cat)
                             <option value="{{$cat->id}}"><?php if(Lang::locale()=='fa'){echo $cat->name_fa;}else { echo $cat->name_en;} ?></option>
                             @endforeach
                          </select>
                  </td>
                </tr>
                <tr>
                  <td>
                     <div class="switch-style1">
                     <div class="form-check form-switch mb20">
                            <input class="form-check-input" type="checkbox" value="Freelance" id="flexSwitchCheckDefault1">
                            <label class="form-check-label" for="flexSwitchCheckDefault1">Freelance</label>
                            <span class="right-tags"></span>
                          </div>
                        </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="switch-style1">
                          <div class="form-check form-switch mb20">
                            <input class="form-check-input" type="checkbox" value="Full Time" id="flexSwitchCheckDefault2" checked="checked">
                            <label class="form-check-label" for="flexSwitchCheckDefault2">Full Time</label>
                            <span class="right-tags"></span>
                          </div>
                        </div>
                  </td>
                </tr>
                <tr>
                  <td>
                     <div class="switch-style1">
                          <div class="form-check form-switch mb20">
                            <input class="form-check-input" type="checkbox" value="Part Time" id="flexSwitchCheckDefault3">
                            <label class="form-check-label" for="flexSwitchCheckDefault3">Part Time</label>
                            <span class="right-tags"></span>
                          </div>
                        </div>
                  </td>
                </tr>
                <tr>
                  <td>
                     <div class="switch-style1">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="Internship" id="flexSwitchCheckDefault4">
                            <label class="form-check-label" for="flexSwitchCheckDefault4">Internship</label>
                            <span class="right-tags"></span>
                          </div>
                        </div>
                      </td>
                </tr>

                <tr>
                  <td>
                     <select class="selectpicker" name="location" id="location">
                               <option value=""></option>
                           <?php   $states = DB::table('states')->where("country_id",1)->get();?>
                           @foreach($states as $state)
                             <option value="{{$state->id}}">{{$state->name}}</option>
                             @endforeach
                          </select>
                      </td>
                </tr>
                <tr>
                  <td>
                     <button type="submit" class="  ud-btn btn-thm">  Search</button>
                      </td>
                </tr>
              </table>
              
               
              {{Form::close()}}
            </div>
          </div>
          <div class="col-lg-9">
            <div class="row align-items-center mb20">
              <div class="col-md-6">
                <div class="text-center text-md-start">
                  <p class="text mb-0 mb10-sm"><span class="fw500"></span> Sea  available Jobs ({{$jobs->count()}} )</p>
                </div>
              </div>
             
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1354845579740725"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-1354845579740725"
     data-ad-slot="3504857353"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

@if(isset($user))
    {{ $user->id }}
@else
    مهمان
@endif
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
          @if($rfp)
              <div class="col-sm-6 col-xl-12">
                <div class="job-list-style1 bdr1 d-xl-flex align-items-start">
                  <div class="icon d-flex align-items-center mb20">
                    @if(isset($user))
                    <img src="{{asset('images/users/'.$user->image)}}" alt="logo" style="height: 70px !important" class="rounded-circle mx-auto">
                    @endif
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
           @endif
             @endforeach
            </div>
            <div class="row">
              {{$jobs->links()}}
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Our Blog -->
    <section class="pb90 pb20-md">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="00ms">
            <div class="main-title">
              <h2 class="title"><?php echo trans('messages.Publications');?></h2>
            </div>
          </div>
        </div>
        <div class="row wow fadeInUp" data-wow-delay="300ms">
              <?php $activities  = DB::table("activities")->orderby("id","desc")->take(8)->get();?>
            @foreach($activities as $act)
          <div class="col-sm-6 col-xl-3">
            <div class="blog-style1">
              <div class="blog-img"><img class="w-100" src="{{asset('images/blogs/'.$act->photo)}}" alt=""></div>
              <div class="blog-content">
                <a class="date" href="#">{{substr($act->created_at,0,10)}}</a>
                <h4 class="title mt-1"> <a href="{{{ URL::route('activity', $act->id) }}}">
                                                    <?php if(Lang::locale() =='en'){
                                                        echo $act->heading_en;
                                                    }else{
                                                        echo $act->heading_en;
                                                    }
                                                    ?>
                                                </a></h4>
                <p class="text mb-0"> <?php if(Lang::locale()=='en')
                                                {
                                          
                                          echo Illuminate\Support\Str::words($act->text_fa, 20, ' (...)');
                                        }else{
                                            echo Illuminate\Support\Str::words($act->text_en, 20, ' (...)');
                                          }?></p>

                                           <a class="ud-btn btn-thm" href="{{{ URL::route('activity', $act->id) }}}"><?php echo trans('messages.readmore');?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>

              </div>
            </div>
          </div>
        
        @endforeach
        </div>
      </div>
    </section>

@stop