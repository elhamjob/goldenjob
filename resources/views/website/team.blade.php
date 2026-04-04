@extends('website.layout.front_en')
@section('content')
 <?php
    $info = DB::table('general_info')->first(); //Basic Info About University
    ?>

    <!-- page-title -->
<div class="prt-titlebar-wrapper prt-bg about-img">
  <div class="prt-titlebar-wrapper-bg-layer prt-bg-layer"></div>
  <div class="prt-titlebar-wrapper-inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <div class="prt-page-title-row-heading">
            <div class="page-title-heading">
              <h2 class="title"><?php echo trans('messages.our-team');?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>                    
</div>
<!-- page-title end -->
        <!--site-main start-->
        <div class="site-main">

            <!-- team-section -->
            <section class="prt-row home02-team-section clearfix">
                <div class="container">                    
                    <div class="row">
                       @foreach($team as $activity)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <!-- featured-imagebox-team -->
                            <div class="featured-imagebox featured-imagebox-team style1">
                                <div class="featured-imagebox-inner">
                                    <div class="featured-thumbnail">
                                        <img width="500" height="500" class="img-fluid" src="{{ asset('images/feature-images/'.$activity->image) }}" alt="image"> 
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3><a href="javascript::viod()"><?php 
                                            if(Lang::locale()=='fa'){
                                              echo $activity->title_fa;
                                            }else{
                                              echo $activity->title_en;
                                            }
                                            ?></a></h3>
                                             <span class="team-position">
                                               <?php 
                                                             if(Lang::locale()=='fa'){
                                                               echo substr($activity->description_fa,0,100);
                                                             }else{
                                                              echo substr($activity->description_en,0,100);
                                                            }
                                                            ?>
                                             </span>
                                        </div>                                                                           
                                        <div class="prt-media-link">
                                            <div class="prt-link-mail">
                                                <a href="javascript::viod()"><i class="icon-mail"></i></a>
                                            </div>
                                            <div class="media-block">
                                                <div class="media-btn">
                                                    <i class="icon-share"></i>
                                                </div>
                                                <ul class="social-icons list-inline d-flex">
                                                    <li class="social-facebook"><a href="javascript::viod()"><i class="icon-facebook"></i></a></li>
                                                    <li class="social-instagram"><a href="javascript::viod()"><i class="icon-instagram"></i></a></li>
                                                    <li class="social-pinterest"><a href="javascript::viod()"><i class="icon-pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- featured-imagebox-team end-->
                        </div>
                       @endforeach
                    </div>
                </div>
            </section>
            <!-- team-section-end -->

        </div><!-- site-main end-->

@stop