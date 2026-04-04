@extends('website.layout.front_en')
@section('content')
 <?php
    $info = DB::table('general_info')->first(); //Basic Info About University
    ?>


  <!-- Breadcumb Sections -->
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
    <section class="breadcumb-section wow fadeInUp mt40">
      <div class="cta-commmon-v1 cta-banner bgc-thm2 mx-auto maxw1700 pt120 pb120 bdrs16 position-relative overflow-hidden d-flex align-items-center mx20-lg">
        <img class="left-top-img wow zoomIn" src="images/vector-img/left-top.png" alt="">
        <img class="right-bottom-img wow zoomIn" src="images/vector-img/right-bottom.png" alt="">
        <div class="container">
          <div class="row">
            <div class="col-xl-5">
              <div class="position-relative wow fadeInUp" data-wow-delay="300ms">
                <h2 class="text-white"><?php echo trans('messages.contactus');?></h2>
                <p class="text mb0 text-white">We'd love to talk about how we can help you.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Our Contact Info -->
    <section class="pt-0">
      <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="300ms">
          <div class="col-lg-6">
            <div class="position-relative mt40">
              <div class="main-title">
                <h4 class="form-title mb25">Keep In Touch With Us.</h4>
                <h2 class="title">Have be any question? <br>feel free to <span>Contact</span></h2>
              </div>
              <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                <div class="icon flex-shrink-0"><span class="flaticon-tracking"></span></div>
                <div class="details">
                  <h5 class="title">Address</h5>
                  <p class="mb-0 text"><?php echo $info->address_en?></p>
                </div>
              </div>
              <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                <div class="icon flex-shrink-0"><span class="flaticon-call"></span></div>
                <div class="details">
                  <h5 class="title">Phone</h5>
                  <p class="mb-0 text"> <a href="tel:<?php echo $info->phone?>"><?php echo $info->phone?></a></p>
                </div>
              </div>
              <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                <div class="icon flex-shrink-0"><span class="flaticon-mail"></span></div>
                <div class="details">
                  <h5 class="title">Email</h5>
                  <p class="mb-0 text"><?php echo $info->email?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="contact-page-form default-box-shadow1 bdrs8 bdr1 p50 mb30-md bgc-white">
              <h4 class="form-title mb25">Tell us about yourself</h4>
              <p class="text mb30">Whether you have questions or you would just like to say hello, contact us.</p>
                  {{ Html::ul($errors->all(), array('class'=>'alert alert-danger text-danger','style'=>'padding:5px;')) }}
                                 @if(Session::has('message'))
                                            <div class="alert alert-success">
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
              {{ Form::open(array('url'=>'/post_contact','class'=>'form-style1 clearfix')) }}

                <div class="row">
                  <div class="col-md-6">
                    <div class="mb20">
                      <label class="heading-color ff-heading fw500 mb10" for="">Name</label>
                       <input name="username" class="form-control" type="text"  placeholder="<?php echo trans('messages.entername');?>"required="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb20">
                      <label class="heading-color ff-heading fw500 mb10" for="">Email</label>
                      <input name="email" class="form-control required email" type="email" placeholder="<?php echo trans('messages.enteremail');?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb20">
                      <label class="heading-color ff-heading fw500 mb10" for=""><?php echo trans('messages.entersubject');?></label>
                       <input name="subject" class="form-control required" type="text" placeholder="<?php echo trans('messages.entersubject');?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb20">
                      <label class="heading-color ff-heading fw500 mb10" for=""><?php echo trans('messages.enterphone');?></label>
                     <input name="phone" class="form-control" type="text" placeholder="<?php echo trans('messages.enterphone');?>">
                    </div>
                  </div>

                  
                  <div class="col-md-12">
                    <div class="mb20">
                      <label class="heading-color ff-heading fw500 mb10" for="">Messages</label>
                       <textarea name="message" class="form-control required" rows="5" placeholder="<?php echo trans('messages.entermessage');?>"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="">
                      <button type="submit" class="ud-btn btn-thm" >Send Messages<i class="fal fa-arrow-right-long"></i></button>
                    </div>
                  </div>
                </div>
              {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
    </section> 


               
@stop