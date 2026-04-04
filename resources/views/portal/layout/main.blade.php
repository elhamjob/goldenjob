<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php $info = App\info::find(1);
 $check_user = \DB::table('users')->find(Auth::user()->id);
 ?>
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <meta name="description" content="<?php echo trans('messages.page_title');?>" />
  <meta name="keywords" content="<?php echo trans('messages.page_title');?>" />
  <meta name="author" content="<?php echo trans('messages.page_title');?> Developer Dawood Nazari" />
  <!-- Page Title -->
  <title><?php echo trans('messages.page_title');?></title>
  <!-- Favicon and Touch Icons -->
  <link href="{{asset('images/'.$info->logo)}}" rel="shortcut icon" type="image/png">
<!-- css file -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/ace-responsive-menu.css')}}">
<link rel="stylesheet" href="{{asset('css/menu.css')}}">
<link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
<link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
<link rel="stylesheet" href="{{asset('css/animate.css')}}">
<link rel="stylesheet" href="{{asset('css/slider.css')}}">
<link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/ud-custom-spacing.css')}}">
<link rel="stylesheet" href="{{asset('css/dashbord_navitaion.css')}}">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="{{asset('css/responsive.css')}}">
<script src="{{asset('js/jquery-3.6.4.min.js')}}"></script> 
</head>
<body>
<div class="wrapper">
  <div class="preloader"></div>
  <!-- Main Header Nav -->
  <header class="header-nav nav-innerpage-style menu-home4 dashboard_header main-menu">
    <!-- Ace Responsive Menu -->
    <nav class="posr"> 
      <div class="container-fluid pr30 pr15-xs pl30 posr menu_bdrt1">
        <div class="row align-items-center justify-content-between">
          <div class="col-6 col-lg-auto">
            <div class="text-center text-lg-start d-flex align-items-center">
              <div class="dashboard_header_logo position-relative me-2 me-xl-5">
                 <a class="header-logo logo2" href="{{{ URL::route('index') }}}">
                    <img src="{{asset('images/'.$info->logo)}}" alt="Header Logo" style="height: 70px !important" class="img-responsive">
                  </a>
              </div>
              <div class="fz20 ml90">
                <a href="#" class="dashboard_sidebar_toggle_icon vam">
                  <img src="{{asset('images/dashboard-navicon.svg')}}" alt="">
                </a>
              </div>
              <a class="login-info d-block d-xl-none ml40 vam" data-bs-toggle="modal" href="#exampleModalToggle" role="button">
                <span class="flaticon-loupe"></span></a>
              <div class="ml40 d-none d-xl-block">
                
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-auto">
            <div class="text-center text-lg-end header_right_widgets">
              <ul class="dashboard_dd_menu_list d-flex align-items-center justify-content-center justify-content-sm-end mb-0 p-0">
            
              
              
                <li class="user_setting">
                  <div class="dropdown">
                    <a class="btn" href="javascript::void()" data-bs-toggle="dropdown">
                      @if($check_user)
                          <img  src="{{asset('images/users/'.$check_user->image)}}" class="img-responsive" style="width: 70px !important" />
                         @endif
                    </a>
                    <div class="dropdown-menu">
                      <div class="user_setting_content">
                        <a class="dropdown-item active" href="{{ URL::route('Student_portal') }}"><i class="flaticon-home mr10"></i>Dashboard</a>
                        <a class="dropdown-item" href="{{ URL::route('profile') }}"><i class="flaticon-photo mr10"></i>My Profile</a>
                        <a class="dropdown-item" href="{{ URL::route('logout') }}"><i class="flaticon-logout mr10"></i>Logout</a>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- Search Modal -->


  <!-- Mobile Nav  -->
  <div id="page" class="mobilie_header_nav stylehome1">
    <div class="mobile-menu">
      <div class="header bdrb1">
        <div class="menu_and_widgets">
          <div class="mobile_menu_bar d-flex justify-content-between align-items-center">
            <a class="mobile_logo" href="#"><img src="{{asset('images/header-logo3.svg')}}" alt=""></a>
            <div class="right-side text-end">
              <a class="" href="page-login.html">join</a>
              <a class="menubar ml30" href="#menu"><img src="{{asset('images/'.$info->logo)}}" alt="Header Logo" style="height: 70px !important" class="img-responsive"></a>
            </div>
          </div>
        </div>
        <div class="posr"><div class="mobile_menu_close_btn"><span class="far fa-times"></span></div></div>
      </div>
    </div>
    <!-- /.mobile-menu -->
    <nav id="menu" class="">
      <ul>
        <li><a href="{{ URL::route('Student_portal') }}">Dashboard</a></li>
        <li><a href="{{ URL::route('profile') }}">Profile</a></li>
        <li><a href="{{ URL::route('jobs') }}">My Jobs</a></li>
        <li><a href="{{ URL::route('rfps') }}">RFPs </a></li>
        <li><a href="{{ URL::route('rfps') }}">RFQs </a></li>
      
        <li><a href="{{ URL::route('logout') }}">Logout</a></li>
      </ul>
    </nav>
  </div>

  <div class="dashboard_content_wrapper">
    <div class="dashboard dashboard_wrapper pr30 pr0-xl">
      <div class="dashboard__sidebar d-none d-lg-block">
        <div class="dashboard_sidebar_list">
          <p class="fz15 fw400 ff-heading pl30">Start</p>
          <div class="sidebar_list_item">
            <a href="{{ URL::route('Student_portal') }}" class="items-center -is-active"><i class="flaticon-home mr15"></i>Dashboard</a>
          </div>
         
          <div class="sidebar_list_item ">
            <a href="{{ URL::route('jobs') }}" class="items-center"><i class="flaticon-briefcase mr15"></i> Jobs</a>
          </div>
          <div class="sidebar_list_item ">
            <a href="{{ URL::route('rfps') }}" class="items-center"><i class="flaticon-briefcase mr15"></i> RFPs</a>
          </div>
          <div class="sidebar_list_item ">
            <a href="{{ URL::route('rfqs') }}" class="items-center"><i class="flaticon-briefcase mr15"></i> RFQs</a>
          </div>
         
          <div class="sidebar_list_item ">
            <a href="{{ URL::route('adminforms') }}" class="items-center"><i class="flaticon-briefcase mr15"></i> Application Forms</a>
          </div>
         
          
          <div class="sidebar_list_item ">
            <a href="{{ URL::route('mycredits') }}" class="items-center"><i class="flaticon-content mr15"></i> My Credits</a>
          </div>
          <p class="fz15 fw400 ff-heading pl30 mt30">Account</p>
          <div class="sidebar_list_item ">
            <a href="{{ URL::route('profile') }}" class="items-center"><i class="flaticon-photo mr15"></i>My Profile</a>
          </div>
          <div class="sidebar_list_item ">
            <a href="{{ URL::route('logout') }}" class="items-center"><i class="flaticon-logout mr15"></i>Logout</a>
          </div>
        </div>
      </div>
      <div class="dashboard__main pl0-md">
        <div class="dashboard__content hover-bgc-color">
         @yield('content')
        </div>
        <footer class="dashboard_footer pt30 pb30">
          <div class="container">
            <div class="row align-items-center justify-content-center justify-content-md-between">
              <div class="col-auto">
                <div class="copyright-widget">
                 <a class="copyright-text mb-2 mb-md-0 text-white-light ff-heading"> ©  {{date("Y")}} <?php echo trans('messages.reserved_msg');?>. &nbsp; <?php echo trans('messages.designed_by');?> <?php echo trans('messages.page_title');?></a>
                </div>
              </div>
             
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <a class="scrollToHome" href="#"><i class="fas fa-angle-up"></i></a>
</div>
<!-- Wrapper End -->

<script src="{{asset('js/jquery-migrate-3.0.0.min.js')}}"></script> 
<script src="{{asset('js/popper.min.js')}}"></script> 
<script src="{{asset('js/bootstrap.min.js')}}"></script> 
<script src="{{asset('js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('js/jquery.mmenu.all.js')}}"></script> 
<script src="{{asset('js/ace-responsive-menu.js')}}"></script> 
<script src="{{asset('js/chart.min.js')}}"></script>
<script src="{{asset('js/chart-custome.js')}}"></script>
<script src="{{asset('js/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('js/dashboard-script.js')}}"></script>
<!-- Custom script for all pages --> 
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>