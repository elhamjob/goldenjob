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

            <a href="javascript::void()"> <?php 
            if(Lang::locale()=='en'){
              echo $activity->heading_fa;
            }else{
              echo $activity->heading_en;
            }
            ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Blog Section Area -->
<section class="our-blog pt40">
  <div class="mx-auto maxw1600 mt60 wow fadeInUp" data-wow-delay="300ms">
    <div class="row">
      <div class="col-lg-1 "></div>
      <div class="col-lg-10 ">
        <div class="large-thumb"><img class="w-100 bdrs16" src="{{asset('images/blogs/'.$activity->photo)}}" alt=""></div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="roww wow fadeInUp" data-wow-delay="500ms">
      <div class="col-xl-8 offset-xl-2">
        <div class="ui-content mt45 mb60">
          <h5 class="mb20"><?php 
          if(Lang::locale()=='en'){
            echo $activity->heading_fa;
          }else{
            echo $activity->heading_en;
          }
          ?></h5>
          <p class="mb25 ff-heading text"><?php 
          if(Lang::locale()=='en'){
            echo $activity->text_fa;
          }else{
            echo $activity->text_en;
          }
          ?></p>
        </div>
      </div>
    </div>
  </div>
</section>
@stop