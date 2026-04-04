@extends('website.layout.front_en')
@section('content')
<?php $city = App\model\states::where('id',$rfps->city)->first();


 ?>
   <!-- Breadcumb Sections -->
    <section class="breadcumb-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-lg-10">
            <div class="breadcumb-style1 mb10-xs">
              <div class="breadcumb-list">
                <a href="#">Home</a>
                <a href="#">RFQ</a>
                <a href="#">{{$rfps->title}}</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-lg-2">
            <div class="d-flex align-items-center justify-content-sm-end">
              <div class="share-save-widget d-flex align-items-center">
                <span class="icon flaticon-share dark-color fz12 mr10"></span>
                <div class="h6 mb-0">Share</div>
              </div>
              <div class="share-save-widget d-flex align-items-center ml15">
                <span class="icon flaticon-like dark-color fz12 mr10"></span>
                <div class="h6 mb-0">Save</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcumb Sections -->
    <section class="breadcumb-section pt-0">
      <div class="cta-job-v1 freelancer-single-style mx-auto maxw1700 pt120 pt60-sm pb120 pb60-sm bdrs16 position-relative overflow-hidden d-flex align-items-center mx20-lg px30-lg">
        <img class="left-top-img wow zoomIn" src="images/vector-img/left-top.png" alt="">
        <img class="right-bottom-img wow zoomIn" src="images/vector-img/right-bottom.png" alt="">
        <div class="container">
          <div class="row wow fadeInUp">
            <div class="col-xl-8 mx-auto">
              <div class="position-relative">
                <div class="list-meta d-lg-flex align-items-end justify-content-between">
                  <div class="wrapper d-sm-flex align-items-center mb20-md">
                    <a class="position-relative freelancer-single-style" href="#">
                      <img class="wa" src="images/team/job-single.png" alt="">
                    </a>
                    <div class="ml20 ml0-xs mt15-sm">
                      <h4 class="title">{{$rfps->title}}</h4>
                    </div>
                  </div>
                  @if(Auth::check())
                  <?php $apply = App\model\apply::where('projectid',$rfps->id)
                  ->where('type',2)->where("created_by",Auth::user()->id)->first();?>
                  @if($apply)
                  <a  role="button" class="ud-btn btn-thm2">  applied <i class="fa fa-check"></i>
                    </a>
                    @else
                    <a data-bs-toggle="modal" href="#apply" role="button" class="ud-btn btn-thm2">Apply For Job
                    <i class="fal fa-arrow-right-long"></i></a>

                    @endif
                    @else
                    <a role="button" class="ud-btn btn-thm2">Login to Apply  Online
                    <i class="fal fa-arrow-right-long"></i></a>
                    @endif


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Service Details -->
    <section class="pt10 pb90 pb30-md">
      <div class="container">
        <div class="row wow fadeInUp">
          <div class="col-lg-8 mx-auto">
            <div class="row">
              <div class="col-sm-6 col-xl-3">
                <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                  <div class="icon flex-shrink-0"><span class="flaticon-calendar"></span></div>
                  <div class="details">
                    <h5 class="title">Date Posted</h5>
                    <p class="mb-0 text">{{$rfps->start_date}}</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                  <div class="icon flex-shrink-0"><span class="flaticon-place"></span></div>
                  <div class="details">
                    <h5 class="title">Location</h5>
                    <p class="mb-0 text">{{$city->name ?? ""}}</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                  <div class="icon flex-shrink-0"><span class="flaticon-fifteen"></span></div>
                  <div class="details">
                    <h5 class="title"> type</h5>
                    <p class="mb-0 text">RFQ</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                  <div class="icon flex-shrink-0"><span class="flaticon-pay-day"></span></div>
                  <div class="details">
                    <h5 class="title">Price</h5>
                    <p class="mb-0 text"></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="service-about">
              <h4 class="mb-4">Description</h4>
                <?php echo $rfps->description;?>
                <hr>
               <a href="{{asset('projectsfiles/rfqs/'.$rfps->file_download)}}"><i class="fa fa-download"></i> Download
            </div>
          </div>
        </div>
      </div>
    </section>
    @if(Auth::check())
  <div class="search-modal">
    <div class="modal fade" id="apply" aria-hidden="true" aria-labelledby="applymodal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="applymodal"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fal fa-xmark"></i></button>
          </div>
          <div class="modal-body">
            {{ Form::open(array('url'=>'/apply','files'=>true)) }}
            <div class="col-xl-12 mx-auto">
              <div class="log-reg-form search-modal form-style1 bgc-white p50 p30-sm default-box-shadow1 bdrs12">
                <div class="mb30">
                  <h4>We're glad to see you again!<br>
                  Please Upload your CV here.
                </h4>
                
                </div>
              
                  <input type="hidden" name="id" value="{{$rfps->id}}" class="form-control" placeholder="">
                  <input type="hidden" name="type" value="2" class="form-control" placeholder="">
                <div class="mb15">
                  <label class="form-label fw600 dark-color"><?php echo trans('messages.password');?></label>
                  <input type="file" name="file" class="form-control" placeholder="file">
                </div>
               
                <div class="d-grid mb20">
                  <button class="ud-btn btn-thm" type="submit">Apply <i class="fal fa-arrow-right-long"></i></button>
                </div>
               
              </div>
            </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
@stop