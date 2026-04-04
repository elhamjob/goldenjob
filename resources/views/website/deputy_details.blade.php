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
              <h2 class="title"><?php 
                if(Lang::locale()=='fa'){
                  echo $deputy->name_fa;
                }else{
                  echo $deputy->name_en;
                }
                ?>  </h2>
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
  <!-- about-us-section -->
  <section class="prt-row about01-about-section clearfix">
    <div class="container">
      <div class="row g-0">
       
        <div class="col-lg-12 align-self-center">
          <div class="pl-50 res-1199-pr-15 res-1199-pl-30 res-991-pl-15 res-991-mt-30">
            <!-- section title -->
            <div class="section-title mb-15">
              <div class="title-header">
                <h2 class="title"><?php 
                if(Lang::locale()=='fa'){
                  echo $deputy->name_fa;
                }else{
                  echo $deputy->name_en;
                }
                ?> </h2>
              </div>
              <div class="title-desc">
                <p> 
                <?php 
                if(Lang::locale()=='fa'){
                  echo $deputy->description_fa;
                }else{
                  echo $deputy->description_en;
                }
                ?> 
              </p>
              </div>
            </div><!-- section title end -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- about-us-section-end -->
</div><!-- site-main end-->


@stop
