@extends('website.layout.front_en')
@section('content')

 <div class="prt-titlebar-wrapper prt-bg about-img">
  <div class="prt-titlebar-wrapper-bg-layer prt-bg-layer"></div>
  <div class="prt-titlebar-wrapper-inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <div class="prt-page-title-row-heading">
            <div class="page-title-heading">
              <h2 class="title"><?php if(Lang::locale() == 'en'){
                       echo $type->menu;
                     }else{
                       echo $type->menu_fa;
                     }?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>                    
</div>

        <!--site-main start-->
        <div class="site-main">

            <!--sidebar-->
            <div class="sidebar prt-sidebar-right prt-blog bg-base-grey clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row g-0">
                      <div class="col-lg-8 content-area prt-blog-classic">
                            <div class="prt-blog-classic-content">
                              <div class="row">
                              @foreach($activities as $activity)
                              <div class="col-lg-12">
                                  <div class="featured-imagebox featured-imagebox-blog style4">
                                      <div class="row g-0 row-equal-height">
                                          <div class="col-sm-4">                                    
                                              <div class="prt-bg prt-col-bgimage-yes col-bg-img-ten spacing-8">
                                                  <div class="prt-col-wrapper-bg-layer prt-bg-layer" style="background-image: url({{asset('images/blogs/'.$activity->photo)}});"></div>
                                                  <div class="layer-content">
                                                      <div class="prt-box-post-date">
                                                          <span>{{ $activity->date}}</span>
                                                          <label>{{ $activity->date}}</label>
                                                      </div>
                                                  </div>
                                              </div>                                       
                                          </div>
                                          <div class="col-sm-8">
                                              <div class="featured-content">
                                                  <div class="post-meta">
                                                      <a href="">
                                                          <span>Web Admin</span>
                                                      </a>
                                                     
                                                  </div>
                                                  <div class="featured-title">
                                                      <h3><a href="{{{ URL::route('activity', $activity->id) }}}">
                                                        <?php if(Lang::locale()=='fa'){echo $activity->heading_fa;}else { echo $activity->heading_en;} ?>
                                                      </a></h3>
                                                  </div>
                                                  <div class="prt-horizontal_sep"></div>
                                                  <div class="featured-desc">
                                                      <p> <?php if(Lang::locale()=='fa')
                                                {
                                          
                                          echo Illuminate\Support\Str::words($activity->text_fa, 20, ' (...)');
                                        }else{
                                            echo Illuminate\Support\Str::words($activity->text_en, 20, ' (...)');
                                          }?></p>
                                                  </div>
                                                  <div class="featured-bottom">
                                                      <a class="prt-btn btn-inline prt-btn-color-dark" href="{{{ URL::route('activity', $activity->id) }}}">View More</a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              @endforeach
                            
                              <div class="pagination-block">
                                       {{$activities->links()}}
                                    </div>
                          </div>
                            </div>
                      </div>
                                  
                    </div><!-- row end -->
                </div>
            </div>
            <!--sidebar end-->

        </div><!-- site-main end-->

  


@stop

