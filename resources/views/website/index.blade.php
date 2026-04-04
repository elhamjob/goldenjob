


@extends('layouts.front_en')
@section('content')


 <!-- Theme Banner ________________________________ -->
            <div id="banner" style="margin-top:80px !important  ">
              
               
                <div class="rev_slider_wrapper" >
                    <!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
                        <div id="main-banner-slider" class="rev_slider" data-version="5.0.7" >
                            <ul>

                                <!-- SLIDE1  -->
                                <?php $slider1 = slider::orderby("id","desc")->first();?>
                                @if($slider1)
                                <li data-index="rs-280" data-transition="zoomin" data-slotamount="default"  data-easein="Power4.easein" data-easeout="Power4.easein" data-masterspeed="2000"  data-rotate="0"  data-saveperformance="off"  data-title="{{$slider1->img_title_en}}" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img  src="{{asset('front/images/main-slider/'.$slider1->photo)}}"  alt="image"  class="rev-slidebg"  data-bgparallax="3" data-bgposition="center center" data-duration="20000" data-ease="Linear.easeNone" data-kenburns="on" data-no-retina="" data-offsetend="0 0" data-offsetstart="0 0" data-rotateend="0" data-rotatestart="0" data-scaleend="102" data-scalestart="100">
                                    <!-- LAYERS -->
<div class="tp-caption" 
                                        data-x="['left','left','left','left']" data-hoffset="['0','25','35','15']" 
                                        data-y="['middle','middle','middle','middle']" data-voffset="['-56','-56','-45','-150']" 
                                        data-width="none"
                                        data-height="none"
                                        data-whitespace="nowrap"
                                        data-transform_idle="o:1;"
                             
                                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                        data-mask_in="x:0px;y:[100%];" 
                                        data-mask_out="x:inherit;y:inherit;" 
                                        data-start="1000" 
                                        data-splitin="none" 
                                        data-splitout="none" 
                                        data-responsive_offset="on" 
                                        style="z-index: 6; white-space: nowrap;">
                                        <h5>{{$slider1->heading_en}}</h5>
                                    </div>

                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption" 
                                        data-x="['left','left','left','left']" data-hoffset="['0','25','35','15']" 
                                        data-y="['middle','middle','middle','middle']" data-voffset="['20','25','30','-85']"
                                        data-width="none"
                                        data-height="none"
                                        data-whitespace="nowrap"
                                        data-transform_idle="o:1;"
                             
                                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                        data-mask_in="x:0px;y:[100%];" 
                                        data-mask_out="x:inherit;y:inherit;" 
                                        data-start="2000" 
                                        data-splitin="none" 
                                        data-splitout="none" 
                                        data-responsive_offset="on" 
                                        style="z-index: 6; white-space: nowrap;">
                                        <h1 class="center-item"><br>{{$slider1->img_title_en}} <br><span class="p-color">{{$slider1->text_en}}</span> </h1>
                                    </div>

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
                                    <!-- LAYER NR. 1 -->
                                    
                                    <!-- LAYER NR. 3 -->
                                    <div class="tp-caption"
                                        data-x="['left','left','left','left']" data-hoffset="['0','25','35','15']" 
                                        data-y="['middle','middle','middle','middle']" data-voffset="['205','205','210','80']"
                                        data-transform_idle="o:1;"
                                        data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                                        data-transform_in="x:[-100%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;" 
                                        data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" 
                                        data-start="3000" 
                                        data-splitin="none" 
                                        data-splitout="none" 
                                        data-responsive_offset="on">
                                        <a href="" class="course-button">View courses</a>
                                    </div>
                                    
                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption"
                                        data-x="['left','left','left','left']" data-hoffset="['192','217','227','15']" 
                                        data-y="['middle','middle','middle','middle']" data-voffset="['205','205','210','155']"
                                        data-transform_idle="o:1;"
                                        data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                                        data-transform_in="x:[100%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;" 
                                        data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" 
                                        data-start="3000" 
                                        data-splitin="none" 
                                        data-splitout="none" 
                                        data-responsive_offset="on">
                                        <a href="{{ action('FrontController@admission')}}" class="buy-button p-color-bg">Apply NOW</a>
                                    </div>
                                
                                </li>
                                @endif


                                <!-- SLIDE2  -->
                                 <?php $slider2 = slider::orderby("id","desc")->skip(1)->take(1)->first();?>
                                 @if($slider2)
                                <li data-index="rs-18" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="{{asset('front/images/main-slider/'.$slider2->photo)}}"  data-rotate="0"  data-saveperformance="off"  data-title="{{$slider2->img_title_en}}" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img   src="{{asset('front/images/main-slider/'.$slider2->photo)}}"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="102" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->

                                    <!-- LAYER NR. 1 -->
                                    <div class="tp-caption" 
                                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                        data-y="['middle','middle','middle','middle']" data-voffset="['-56','-56','-36','-150']" 
                                        data-width="none"
                                        data-height="none"
                                        data-whitespace="nowrap"
                                        data-transform_idle="o:1;"
                             
                                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                        data-mask_in="x:0px;y:[100%];" 
                                        data-mask_out="x:inherit;y:inherit;" 
                                        data-start="1000" 
                                        data-splitin="none" 
                                        data-splitout="none" 
                                        data-responsive_offset="on" 
                                        style="z-index: 6; white-space: nowrap;">
                                        <h5>{{$slider2->heading_en}} </h5>
                                    </div>

                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption" 
                                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                        data-y="['middle','middle','middle','middle']" data-voffset="['20','20','45','-85']"
                                        data-width="none"
                                        data-height="none"
                                        data-whitespace="nowrap"
                                        data-transform_idle="o:1;"
                             
                                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                        data-mask_in="x:0px;y:[100%];" 
                                        data-mask_out="x:inherit;y:inherit;" 
                                        data-start="2000" 
                                        data-splitin="none" 
                                        data-splitout="none" 
                                        data-responsive_offset="on" 
                                        style="z-index: 6; white-space: nowrap;">
                                        <h1 class="center-item"> {{$slider2->img_title_en}} <br> <span class="p-color">
                                            {{$slider2->text_en}}
                                            </span> </h1>
                                    </div>


                                    <!-- LAYER NR. 3 -->
                                    <div class="tp-caption"
                                        data-x="['center','center','center','center']" data-hoffset="['-87','-87','-87','0']" 
                                        data-y="['middle','middle','middle','middle']" data-voffset="['205','205','210','80']"
                                        data-transform_idle="o:1;"
                                        data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                                        data-transform_in="x:[-100%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;" 
                                        data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" 
                                        data-start="3000" 
                                        data-splitin="none" 
                                        data-splitout="none" 
                                        data-responsive_offset="on">
                                        <a href="" class="course-button">View courses</a>
                                    </div>
                                    
                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption"
                                        data-x="['center','center','center','center']" data-hoffset="['105','105','105','0']" 
                                        data-y="['middle','middle','middle','middle']" data-voffset="['205','205','210','155']"
                                        data-transform_idle="o:1;"
                                        data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                                        data-transform_in="x:[100%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;" 
                                        data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" 
                                        data-start="3000" 
                                        data-splitin="none" 
                                        data-splitout="none" 
                                        data-responsive_offset="on">
                                         <a href="{{ action('FrontController@admission')}}" class="buy-button p-color-bg">Apply NOW</a>
                                    </div>
                                </li>
                                @endif

                            
                                <!-- SLIDE3  -->
                                <?php $slider3 = slider::orderby("id","desc")->skip(2)->take(1)->first();?>
                                @if($slider3)
                                <li data-index="rs-20" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="{{asset('front/images/main-slider/'.$slider3->photo)}}"  data-rotate="0"  data-saveperformance="off"  data-title="{{$slider3->img_title_en}}" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img style="height: 400px !important"  src="{{asset('front/images/main-slider/'.$slider3->photo)}}"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scalestart="103" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 -500" data-offsetend="0 500" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->

                                    <!-- LAYER NR. 1 -->
                                    <div class="tp-caption" 
                                        data-x="['left','left','left','left']" data-hoffset="['0','25','35','15']" 
                                        data-y="['middle','middle','middle','middle']" data-voffset="['-56','-56','-45','-150']" 
                                        data-width="none"
                                        data-height="none"
                                        data-whitespace="nowrap"
                                        data-transform_idle="o:1;"
                             
                                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                        data-mask_in="x:0px;y:[100%];" 
                                        data-mask_out="x:inherit;y:inherit;" 
                                        data-start="1000" 
                                        data-splitin="none" 
                                        data-splitout="none" 
                                        data-responsive_offset="on" 
                                        style="z-index: 6; white-space: nowrap;">
                                        <h5>{{$slider3->heading_en}} </h5>
                                    </div>

                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption" 
                                        data-x="['left','left','left','left']" data-hoffset="['0','25','35','15']" 
                                        data-y="['middle','middle','middle','middle']" data-voffset="['20','25','30','-85']"
                                        data-width="none"
                                        data-height="none"
                                        data-whitespace="nowrap"
                                        data-transform_idle="o:1;"
                             
                                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                        data-mask_in="x:0px;y:[100%];" 
                                        data-mask_out="x:inherit;y:inherit;" 
                                        data-start="2000" 
                                        data-splitin="none" 
                                        data-splitout="none" 
                                        data-responsive_offset="on" 
                                        style="z-index: 6; white-space: nowrap;">
                                        <h1 class="center-item">{{$slider3->img_title_en}} <br> <span class="p-color">
                                            {{$slider3->text_en}}
                                            </span> </h1>
                                    </div>


                                    <!-- LAYER NR. 3 -->
                                    <div class="tp-caption"
                                        data-x="['left','left','left','left']" data-hoffset="['0','25','35','15']" 
                                        data-y="['middle','middle','middle','middle']" data-voffset="['205','205','210','80']"
                                        data-transform_idle="o:1;"
                                        data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                                        data-transform_in="x:[-100%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;" 
                                        data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" 
                                        data-start="3000" 
                                        data-splitin="none" 
                                        data-splitout="none" 
                                        data-responsive_offset="on">
                                        <a href='' class="course-button">View courses</a>
                                    </div>
                                    
                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption"
                                        data-x="['left','left','left','left']" data-hoffset="['192','217','227','15']" 
                                        data-y="['middle','middle','middle','middle']" data-voffset="['205','205','210','155']"
                                        data-transform_idle="o:1;"
                                        data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                                        data-transform_in="x:[100%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;" 
                                        data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" 
                                        data-start="3000" 
                                        data-splitin="none" 
                                        data-splitout="none" 
                                        data-responsive_offset="on">
                                       <a href="{{ action('FrontController@admission')}}" class="buy-button p-color-bg">Apply NOW</a>
                                    </div>
                                </li>
                                @endif
                            </ul>   
                        </div>
                    </div><!-- END REVOLUTION SLIDER -->
            </div> <!--  /#banner -->

            <!-- Welcome Section ___________________________ -->
            <hr>
            <div class="welcome-section">
                <div class="container">
                    <div class="section-title wow fadeInUp">
                        <h2 class="p-color">Welcome to GOLDEN Jobs </h2>
                        <h5>awesome success with student</h5>
                        <?php $info = info::find(1)->first();?>
                        <p> {{$info->about_en}} </p>
                    </div> <!-- /.section-title -->
                </div> <!-- /.container -->
            </div> <!-- /.welcome-section -->



            <!-- Popular Course _________________________ -->
            <div class="popular-course wow fadeInUp theme-bg-color">
                <div class="container">
                    <h2>FEATURED PROGRAMS</h2>

                    <div class="row">
                        <div class="theme-slider course-item-wrapper">
                            <?php $programs = programs::all();?>
                            @foreach($programs as $pro)
                            <div class="item hvr-float-shadow">
                                <div class="img-holder"><img src="{{asset('front/images/programs/'.$pro->photo)}}" alt="Image"></div>
                                <div class="text">
                                    <h4><a href="{{ action('FrontController@program',$pro->id)}}">{{$pro->title_en}}</a></h4>
                                   
                                   <span style="text-align: justify;">  <?php echo  substr($pro->text_en,0,200);?> </span>

                                    <a href="{{ action('FrontController@program',$pro->id)}}"> Read More...</a>
                                    
                                </div> <!-- /.text -->
                            </div> <!-- /.item -->
                            @endforeach

                        </div> <!-- /.course-slider -->
                    </div>
                </div> <!-- /.container -->
            </div> <!-- /.popular-course -->
          
            <!-- Latest News ___________________________ -->
            <div class="latest-news wow fadeInUp theme-bg-color">
                <div class="container">
                    <div class="theme-title">
                        <h2>latest Activities</h2>
                        <p>Chech for news, Events and blogs. </p>
                    </div>
                    <div class="post-wrapper row">
                        <?php $activity = activities::orderby('id','desc')->take(6)->get();?>
                        @foreach($activity as $acti)
                        <div class="single-post wow fadeInUp col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                <div class="img-holder">
                                    <div class="date wow fadeInUp p-color-bg">12 <span>Sep</span></div>
                                    <img src="{{asset('front/images/blogs/'.$acti->photo)}}" alt="Image">
                                    <a href="{{ action('FrontController@activity', $acti->id) }}" class="tran4s"></a>
                                </div>
                                <div class="text-wrapper">
                                    <div class="text tran4s">
                                        <a href="{{ action('FrontController@activity', $acti->id) }}">{{$acti->heading_en}} </a>
                                        <p>{{substr($acti->text_en, 0, 105)}}  </p>
                                        <a href="{{ action('FrontController@activity', $acti->id) }}" style="font-size: 12px; color:blue;"  > Read More...</a>
                                    </div> <!-- /.text -->
                                </div> <!-- /.text-wrapper -->
                        </div> <!-- /.single-post -->
                        @endforeach
                    </div> <!-- /.post-wrapper -->
                </div> <!-- /.container -->
            </div> <!-- /.latest-news -->
@stop