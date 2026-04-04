@extends('website.layout.front_en')
@section('content')

 <!-- Blog Section -->
    <section class="breadcumb-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="breadcumb-style1">
              <div class="breadcumb-list">
                <a href="javascript::void()"><?php echo trans('messages.home');?></a>
                <a href="javascript::void()">
                  <?php 
              if(Lang::locale()=='fa'){
                echo $type->menu_fa;
              }else{
                echo $type->menu;
              }
              ?> 
                </a>
                <a href="javascript::void()"><?php if(Lang::locale() == 'en'){
                       echo $type->menu;
                     }else{
                       echo $type->menu_fa;
                     }?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   

    <!-- Blog Section Area -->
    <section class="our-blog pt-0">
      <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="300ms">
          <div class="col-xl-12">
           
            <div class="navtab-style1">
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active fz15 text" id="nav-item1" role="tabpanel" aria-labelledby="nav-item1-tab">
                  <div class="row">
                      @foreach($activities as $activity)
                    <div class="col-sm-6 col-xl-3">
                      <div class="blog-style1">
                        <div class="blog-img"><img class="w-100" src="{{asset('images/blogs/'.$activity->photo)}}" alt=""></div>
                        <div class="blog-content">
                          <a class="date" href="#">{{ $activity->created_at}}</a>
                          <h4 class="title mt-1"><a href="{{{ URL::route('activity', $activity->id) }}}">
                                                        <?php if(Lang::locale()=='fa'){echo $activity->heading_fa;}else { echo $activity->heading_en;} ?>
                                                      </a></h4>
                          <p class="text mb-0"> <?php if(Lang::locale()=='fa')
                                                {
                                          
                                          echo Illuminate\Support\Str::words($activity->text_fa, 20, ' (...)');
                                        }else{
                                            echo Illuminate\Support\Str::words($activity->text_en, 20, ' (...)');
                                          }?></p>
                                          <a class="prt-btn btn-inline prt-btn-color-dark" href="{{{ URL::route('activity', $activity->id) }}}">View More</a>
                        </div>
                      </div>
                    </div>
                   @endforeach
                   
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
     
      </div>
    </section>



@stop

