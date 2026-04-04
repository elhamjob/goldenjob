@extends('website.layout.front_en')
@section('content')
 <!-- page-title -->
<div class="prt-titlebar-wrapper prt-bg about-img">
  <div class="prt-titlebar-wrapper-bg-layer prt-bg-layer"></div>
  <div class="prt-titlebar-wrapper-inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <div class="prt-page-title-row-heading">
            <div class="page-title-heading">
              <h2 class="title">{{trans('messages.inside-GOLDEN Jobs')}} </h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>                    
</div>
<?php $info = App\info::find(1);?>
        <!--site-main start-->
        <div class="site-main">

          <!--sidebar-->
            <div class="sidebar prt-sidebar-right clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row g-0">
                      <div class="col-lg-10 content-area">
                            <div class="prt-service-single-content-area">
                              <div class="prt-service-description">

                                <div class="mt-0">
                                  <div class="service-title mb-30">
                                        <div class="service-header">
                                            <h3><?php echo trans('messages.page_title');?> </h3>
                                        </div>
                                        <div class="service-desc">
                                            <p><?php if(Lang::locale()=='fa'){echo substr($info->about_en,0,350);}else { echo substr($info->about_fa,0,350);} ?>...</p>
                                        </div>
                                    </div>
                                    <div class="row slick_slider" data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":false, "infinite":true, "responsive": [{"breakpoint":1024,"settings":{"slidesToShow": 2}} , {"breakpoint":991,"settings":{"slidesToShow": 2}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>


                                @foreach($gallery as $photo)
                                  <div class="col-lg-6">
                                      <!-- featured-imagebox-post -->
                                      <div class="featured-imagebox featured-imagebox-services style1">
                                          <!-- featured-thumbnail -->
                                          <div class="featured-thumbnail">
                                              <img class="img-fluid" src="{{ asset('images/gallery/'.$photo->file_name) }}" alt="blog_img">
                                          </div><!-- featured-thumbnail end-->
                                          <div class="featured-details-wrap">
                                              <div class="featured-content">
                                                  <div class="featured-title">
                                                      <h3><a href="http://localhost/GOLDEN Jobs/public/pages/about/About%20Us" tabindex="0">Gallery</a></h3>
                                                  </div>
                                              </div>
                                              <div class="featured-explore-more">
                                                  <a href="http://localhost/GOLDEN Jobs/public/pages/about/About%20Us">Read More</a>
                                              </div> 
                                          </div>
                                          <div class="services-details-wrap">
                                              <div class="services-details-box">
                                                  <div class="services-content">
                                                      <div class="services-title">
                                                          <h3><a href="http://localhost/GOLDEN Jobs/public/pages/about/About%20Us" tabindex="0">Read More</a></h3>
                                                      </div>
                                                      <div class="services-desc">
                                                          <p><?php if(Lang::locale()=='fa'){echo substr($info->about_en,0,350);}else { echo substr($info->about_fa,0,350);} ?>...</p>
                                                      </div>
                                                  </div>
                                                  <div class="services-explore-more">
                                                      <a href="http://localhost/GOLDEN Jobs/public/pages/about/About%20Us">Read More</a>
                                                  </div> 
                                              </div>
                                          </div>
                                      </div><!-- featured-imagebox-post end -->
                                  </div>
                                  @endforeach
                                
                                </div>

                             

                               
                                  
                            </div>
                          </div>                            
                      </div>
                                           
                    </div><!-- row end -->
                </div>
            </div>
            <!--sidebar end-->

        </div><!--site-main end-->
@stop