
<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php $info = App\info::find(1);
 ?>
<style type="text/css">
  .w-5
  {
    width: 20px !important;
  }
  .h-5
  {
    height: 20px !important
  }
</style>
<script>
    // google.com, pub-1354845579740725, DIRECT, f08c47fec0942fa0
</script>
  @if(Request::is('jobdetails/*'))
  <?php $program = App\model\jobs::where("id","=",request()->segment(count(request()->segments())))->first();?>
  @if($program)
  <meta property="og:url"           content="https://GOLDENjobs.org/jobdetails/{{$program->id}}" />
  <meta property="og:type"          content="https://GOLDENjobs.org" />
  <meta property="og:title"         content="{{$program->title}}" />
  <meta property="og:description"   content="<?php echo substr($program->title,0,200);?>" />
  @endif
 @endif
<head>
<meta name="google-adsense-account" content="ca-pub-1354845579740725">
  <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <meta name="description" content="<?php echo trans('messages.page_title');?>" />
  <meta name="keywords" content="<?php echo trans('messages.page_title');?>" />
  <meta name="author" content="<?php echo trans('messages.page_title');?> Developer Tawhid Amini" />
  <!-- Page Title -->
  <title><?php echo trans('messages.page_title');?></title>
  <!-- Favicon and Touch Icons -->
  <link href="{{asset('images/'.($info->logo ?? 'favicon.ico'))}}" rel="shortcut icon" type="image/png">
  <!-- css file -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/ace-responsive-menu.css')}}">
  <link rel="stylesheet" href="{{asset('css/menu.css')}}">
  <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
  <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('css/slider.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/ud-custom-spacing.css')}}">
  <!-- Responsive stylesheet -->
  <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
  <script src="{{asset('js/jquery-3.6.4.min.js')}}"></script>
</head>
<body>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1354845579740725"
     crossorigin="anonymous"></script>
<!-- Coofee -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1354845579740725"
     data-ad-slot="5917108483"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</script>
  <div class="wrapper ovh">
    <!-- <div class="preloader"></div> -->
    <!-- Main Header Nav -->
    <header class="header-nav nav-innerpage-style stricky stricky-fixed main-menu bdrb1">
      <!-- Ace Responsive Menu -->
      <nav class="posr"> 
        <div class="container-fluid posr menu_bdrt1">
          <div class="row align-items-center justify-content-between">
            <div class="col-auto">
              <div class="d-flex align-items-center justify-content-between">
                <div class="logos mr20" style=" padding-right: 20px;">
                  <a class="header-logo logo2 " href="{{{ URL::route('index') }}}">
                    <img style="margin-top: 10px" src="{{asset('images/'.$info->logo)}}" alt="Header Logo">
                  </a>
                </div>
                <div class=" mr20" >
                  <p style="font-weight: bold; font-size: 13px; line-height: 30px; vertical-align: middle; margin-top: 40px">
                    <span style="font-size: 26px">{{$info->abr}}</span><br>
                    {{$info->title_en}}
                    {{$info->title_fa}}
                  </p>
                </div>
                <div class="ml40 d-none d-xl-block">
                <div class="search_area dashboard-style">
                   {{ Form::open(array('url'=>'/searchs')) }}
                  <input type="text" name="title" class="form-control border-0" placeholder="Search Your Keyword...">
                  <label><span class="flaticon-loupe"></span></label>
                  {{Form::close()}}
                </div>
              </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center" style="margin-top: -50px !important">
                 <li class="d-none d-sm-block">
                  <a class="text-center mr5 text-thm2 dropdown-toggle fz20" type="button" data-bs-toggle="dropdown" href="javascript::viod()">
                    <i class="fa fa-language"></i> <?php echo trans('messages.language');?> 
                  </a>
                  <div class="dropdown-menu">
                    <div class="dboard_notific_dd px30 pt20 pb15">
                      <div class="d-grid">
                        <a class="ud-btn btn-thm w-100" href="<?= asset('/changelanguage/en')?>">
                      <img src="{{asset('images/flag/us.png')}}"  style='width:22px ;height:22px'> English
                    </a>
                      </div>
                       <div class="d-grid">
                         <a class="ud-btn btn-thm w-100" href="<?= asset('/changelanguage/fa')?>">
                     <img src="{{asset('images/flag/af.png')}}"  style='width:22px ;height:22px'> دری
                   </a>
                      </div>
                       <div class="d-grid">
                         <a class="ud-btn btn-thm w-100" href="<?= asset('/changelanguage/pa')?>">
                    <img src="{{asset('images/flag/af.png')}}"  style='width:22px ;height:22px'> پشتو
                  </a>
                      </div>
                    </div>
                  </div>
                </li>
             @if(Auth::check())
             <?php $check_user = \DB::table('users')->find(Auth::user()->id);?>
              <a class="login-info mx15-lg mx30" href="{{{ URL::route('profile') }}}">
                <span class="d-none d-xl-inline-block">{{$check_user->name}} {{$check_user->last_name}} </span> 
              </a>
                <a class="login-info bdrl1 pl15-lg pl30"  href="{{ URL::route('logout') }}" role="button">
                <?php echo trans('messages.Sign out');?>
                </a>
                @else 
              <a class="login-info mx15-lg mx30" href="{{{ URL::route('signup') }}}">
                <span class="d-none d-xl-inline-block"><?php echo trans('messages.Sign up');?> </span> 
              </a>
              <a class="login-info bdrl1 pl15-lg pl30" data-bs-toggle="modal" href="#login" role="button">
                <?php echo trans('messages.Sign in');?></a>
                @endif
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <header class="header-nav nav-innerpage-style stricky main-menu bdrb1">
    <!-- Ace Responsive Menu -->
    @include('partials.nav-header')
  </header>
  <!-- Search Modal -->
  <div class="search-modal">
    <div class="modal fade" id="login" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fal fa-xmark"></i></button>
          </div>
          <div class="modal-body">
            {{ Form::open(array('url'=>'/loginfunction')) }}
            <div class="col-xl-12 mx-auto">
              <div class="log-reg-form search-modal form-style1 bgc-white p50 p30-sm default-box-shadow1 bdrs12">
                <div class="mb30">
                  <h4>We're glad to see you again!</h4>
                  <p class="text">Don't have an account? <a href="{{{ URL::route('signup') }}}" class="text-thm"><?php echo trans('messages.Sign up');?>!</a></p>
                </div>
                <div class="mb20">
                  <label class="form-label fw600 dark-color"><?php echo trans('messages.email');?></label>
                  <input type="email" name="email" class="form-control" placeholder="example@gmmail.com">
                </div>
                <div class="mb15">
                  <label class="form-label fw600 dark-color"><?php echo trans('messages.password');?></label>
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
  </div>
  <div class="hiddenbar-body-ovelay"></div>
  <!-- Mobile Nav  -->
  <div id="page" class="mobilie_header_nav stylehome1">
    <div class="mobile-menu">
      <div class="header bdrb1">
        <div class="menu_and_widgets">
          <div class="mobile_menu_bar d-flex justify-content-between align-items-center">
            <a class="mobile_logo" href="#"><img src="{{asset('images/'.$info->logo)}}" style="height: 40px !important" alt="Header Logo"></a>
            <div class="right-side text-end">
               @if(Auth::check())
             <?php $check_user = \DB::table('users')->find(Auth::user()->id);?>
             <a class="" href="{{{ URL::route('profile') }}}">{{$check_user->name}} {{$check_user->last_name}}</a>
                @else 
                <a class="" href="{{{ URL::route('signup') }}}"><?php echo trans('messages.Sign up');?></a>
                @endif
              <a class="menubar ml30" href="#menu"><img src="{{asset('images/mobile-dark-nav-icon.svg')}}" alt=""></a>
            </div>
          </div>
        </div>
        <div class="posr"><div class="mobile_menu_close_btn"><span class="far fa-times"></span></div></div>
      </div>
    </div>
    <!-- /.mobile-menu -->
    <nav id="menu" class="">
      <ul>
       @include('partials.nav-li')
       <!-- Only for Mobile View -->
     </ul>
   </nav>
 </div>
 <div class="body_content">
  <!-- Home Banner Style V1 -->
  @yield('content')
  <!-- Our Footer --> 
   <section class="footer-style1 at-home6 pt25 pb-0">
      <div class="container">
        <div class="row bb-white-light pb10 mb60">
          <div class="col-md-7">
            <div class="d-block text-center text-md-start justify-content-center justify-content-md-start d-md-flex align-items-center mb-3 mb-md-0">
              <a class="fz17 fw500 text-white mr15-md mr30" href="#">Terms of Service</a>
              <a class="fz17 fw500 text-white mr15-md mr30" href="#">Privacy Policy</a>
            </div>
          </div>
          <div class="col-md-5">
            <div class="social-widget text-center text-md-end">
              <div class="social-style1">
                <a class="text-white me-2 fw500 fz17" href="#"><?php echo trans('messages.followus');?></a>
                <a href="#"><i class="fab fa-facebook-f list-inline-item"></i></a>
                <a href="#"><i class="fab fa-twitter list-inline-item"></i></a>
                <a href="#"><i class="fab fa-instagram list-inline-item"></i></a>
                <a href="#"><i class="fab fa-linkedin-in list-inline-item"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-lg-3">
            <div class="link-style1 mb-4 mb-sm-5">
              <h5 class="text-white mb15"><?php echo trans('messages.about');?></h5>
              <div class="link-list">
                 <?php $pages  = DB::table("pages")->where("mid",1)->get(); //Menu title ?>   
                  <?php $menu  = DB::table("main_nav")->where("id",1)->first(); //Menu title ?>   
                @foreach($pages as $page)  
                 <a  href="{{{ URL::route('page',array($menu->url, $page->menu)) }}}">
                 <?php if(Lang::locale() == 'fa'){
                   echo $page->title_fa;
                 }else{
                   echo $page->title_en;
                 }?>
               </a>
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="link-style1 mb-4 mb-sm-5">
              <h5 class="text-white mb15"> <?php echo trans('messages.Job Categories');?></h5>
              <ul class="ps-0">
                <?php $Categories  = DB::table("program")->take(6)->get(); //Menu title ?>   
                @foreach($Categories as $Cat) 
                <li><a href="#">
                   <?php if(Lang::locale() == 'fa'){
                   echo $Cat->name_fa;
                 }else{
                   echo $Cat->name_en;
                 }?>
                </a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="link-style1 mb-4 mb-sm-5">
              <h5 class="text-white mb15"> <?php echo trans('messages.quick_contacts');?></h5>
              <ul class="ps-0">
                <li><a href="#">{{$info->address_en}}</a></li>
                <li><a href="#">{{$info->email}}</a></li>
                <li><a href="#">{{$info->phone}}</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="container white-bdrt1 py-4">
        <div class="row">
          <div class="col-md-6">
            <div class="text-center text-lg-start">
                <p class="copyright-text mb-0 text-white-light ff-heading"> ©  {{date("Y")}} <?php echo trans('messages.reserved_msg');?>. &nbsp; <?php echo trans('messages.designed_by');?>  <a style="color: white" href=""><?php echo trans('messages.page_title');?></a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
 <a class="scrollToHome" href="#"><i class="fas fa-angle-up"></i></a>
</div>
</div>
<!-- Wrapper End --> 
<script src="{{asset('js/jquery-migrate-3.0.0.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/jquery.mmenu.all.js')}}"></script>
<script src="{{asset('js/ace-responsive-menu.js')}}"></script>
<script src="{{asset('js/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/owl.js')}}"></script>
<script src="{{asset('js/jquery.counterup.js')}}"></script>
<!-- Custom script for all pages -->
<script src="{{asset('js/script.js')}}"></script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1354845579740725"
     crossorigin="anonymous"></script>
     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1354845579740725"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-e5-2f+3f-1r+81"
     data-ad-client="ca-pub-1354845579740725"
     data-ad-slot="8592131149"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1354845579740725"
     crossorigin="anonymous"></script>

</body>
</html>