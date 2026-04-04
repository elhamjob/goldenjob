@extends('website.layout.front_en')
@section('content')
 <?php
    $info = DB::table('general_info')->first(); //Basic Info About University
    ?>

    <!-- page-title -->

<!-- page-title end -->

        <!--site-main start-->
        <div class="site-main">
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

            <!-- contact-form-section -->
            <section class="prt-row padding_bottom_zero-section contact-us-contact-form-section clearfix">
                <div class="container">
                    <div class="row g-0">
                      
                        <div class="col-lg-6">
                            <div class="bg-base-grey spacing-25">
                                <!-- section title -->
                          
                                   {{ Html::ul($errors->all(), array('class'=>'alert alert-danger text-danger','style'=>'padding:5px;')) }}
                                 @if(Session::has('message'))
                                            <div class="alert alert-success">
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                {{ Form::open(array('url'=>'/loginfunction')) }}
                                {{ csrf_field() }}
            <div class="col-xl-12 mx-auto">
              <div class="log-reg-form search-modal form-style1 bgc-white p50 p30-sm default-box-shadow1 bdrs12">
                <div class="mb30">
                  <h4>We're glad to see you again!</h4>
                  <p class="text">Don't have an account? <a href="{{{ URL::route('signup') }}}" class="text-thm">Sign Up!</a></p>
                </div>
                <div class="mb20">
                  <label class="form-label fw600 dark-color">Email Address</label>
                  <input type="email" name="email" class="form-control" placeholder="example@gmmail.com">
                </div>
                <div class="mb15">
                  <label class="form-label fw600 dark-color">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="*******">
                </div>
                <div class="checkbox-style1 d-block d-sm-flex align-items-center justify-content-between mb20">
                  <label class="custom_checkbox fz14 ff-heading">Remember me
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                  </label>
                  <a class="fz14 ff-heading" href="#">Lost your password?</a>
                </div>
                <div class="d-grid mb20">
                  <button class="ud-btn btn-thm" type="submit"><?php echo trans('messages.Sign in');?> <i class="fal fa-arrow-right-long"></i></button>
                </div>
               
              </div>
            </div>
            {{ Form::close() }}
                            </div>
                        </div>                        
                    </div>
                </div>
            </section>
            <!-- contact-form-section-end -->

           


        </div><!-- site-main end-->
               
@stop