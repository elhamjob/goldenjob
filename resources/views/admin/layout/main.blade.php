<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<?php $info = App\info::find(1);?>
<meta charset="utf-8"/>
<title>GOLDEN Jobs  | Admin</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="GOLDEN Jobs" name="description"/>
<meta content="Dawood Nazari" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="{{ asset('admin/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/assets/global/css/components.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/assets/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/assets/admin/layout/css/themes/darkblue.css') }}" rel="stylesheet" type="text/css" id="style_color"/>

<link rel="shortcut icon" href="{{asset('images/'.$info->logo)}}"/>

<script src="{{ asset('admin/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>


  
        
</head>
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-sidebar-fixed page-container-bg-solid">
<!-- BEGIN HEADER -->
<div class="page-header -i navbar navbar-fixed-top" style="background-color:#3598dc">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<img src="{{asset('images/'.$info->logo)}}" style="height:35px;" alt="logo" class="logo-default img img-responsive"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="{{ asset('admin/assets/admin/layout/img/avatar.png') }}"/>
					<span class="username username-hide-on-mobile">
					Administrator </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-dark">
						<li>
							<a href="{{{ URL::route('admin_profile') }}}">
							<i class="icon-user"></i> Profile </a>
						</li>
                        <li>
							<a href="{{{ URL::route('logout') }}}">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="start active open">
					<a href="{{{ URL::route('admin_index') }}}">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					<span class="selected"></span>
					</a>
				</li>
				<li>
					<a href="">
					<i class="icon-screen-desktop"></i>
					<span class="title">Manage Main Index</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{{ URL::route('general_info') }}}">
							<i class="icon-note"></i>
							General Info</a>
						</li>
                        <li>
							<a href="{{{ URL::route('slider') }}}">
							<i class="icon-frame"></i>
							Slider Management</a>
						</li>
						
					</ul>
				</li>
				
				
				
				
               

				
				
                <li>
					<a href="">
					<i class="icon-layers"></i>
					<span class="title">Pages</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						 <?php $menus  = DB::table("main_nav")->where("menu","!=","Publications")->where('sub',0)->get(); //Menu title ?>   
                         @foreach($menus as $menu)  
						<li>
							<a href="{{{ URL::route('admin_pages_menu',$menu->id) }}}">
							<i class="icon-note"></i>
							{{$menu->menu}}   <span class="arrow "></span> </a>
						</li>
						@endforeach
						<li>
							<a href="{{{ URL::route('add_pages') }}}">
							<i class="icon-plus"></i>
							Add Page</a>
						</li>
						 <li>
							<a href="{{{ URL::route('menu_main') }}}">
							<i class="icon-plus"></i>
							Main Menu</a>
						</li> 
						
					</ul>
				</li>
				 <li>
					<a href="">
					<i class="icon-list"></i>
					<span class="title">Posts</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<?php $ulli = DB::table("main_nav")->where("sub","!=",14)->where("sub",">",1)->get(); ?>
						@foreach($ulli as $li)
						<li>
							<a href="{{{ URL::route('admin_activities_li',$li->id) }}}">
							<i class="icon-note"></i>
							{{$li->menu}}</a>
						</li>
						@endforeach
						<li>
							<a href="{{{ URL::route('add_activity') }}}">
							<i class="icon-plus"></i>
							Add New Post </a>
						</li>

						

					</ul>
				</li>
				 <li>
					<a href="">
					<i class="icon-list"></i>
					<span class="title">Scholarships</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						
						<li>
							<a href="{{{ URL::route('adminscholarships') }}}">
							<i class="icon-note"></i>
							Scholarships</a>
						</li>
						

						

					</ul>
				</li>
				 <li>
					<a href="">
					<i class="icon-list"></i>
					<span class="title">Publications</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<?php $ulli = DB::table("main_nav")->where("sub","=",14)->get(); ?>
						@foreach($ulli as $li)
						<li>
							<a href="{{{ URL::route('publicationsmanage',$li->id) }}}">
							<i class="icon-note"></i>
							{{$li->menu}}</a>
						</li>
						@endforeach
						
						

						

					</ul>
				</li>

				
              <li>
					<a href="">
					<i class="icon-grid"></i>
					<span class="title">Jobs Category</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						 <li>
							<a href="{{{ URL::route('program_sub') }}}">
							<i class="icon-plus"></i>
							Jobs Category</a>
						</li> 
					</ul>
				</li>
				
				
				<li>
					<a href="">
					<i class="icon-envelope"></i>
					<span class="title">Contacts</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
						<a href="{{{ URL::route('admin_contacts') }}}">
						<i class="icon-envelope"></i>
						<span class="title">Messages</span>
						</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="">
					<i class="icon-envelope"></i>
					<span class="title">Front Images</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
						<a href="{{{ URL::route('gallery_list') }}}">
						<i class="icon-envelope"></i>
						<span class="title">Front Images</span>
						</a>
						</li>
						
					</ul>
				</li>
				
				<li>
					<a href="">
					<i class="icon-envelope"></i>
					<span class="title">Users and Credits</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
						<a href="{{{ URL::route('admin_users') }}}">
						<i class="icon-envelope"></i>
						<span class="title">Users</span>
						</a>
						</li>
						<li>
						<a href="{{{ URL::route('admin_users_credits') }}}">
						<i class="icon-envelope"></i>
						<span class="title">Users Credits</span>
						</a>
						</li>
						
					</ul>
				</li>
				
				
				<li>
					<a href="{{{ URL::route('logout') }}}">
					<i class="icon-lock"></i>
					<span class="title">Logout</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
    @yield('content')

    
    <!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2017 &copy;  GOLDEN Jobs by <a href="http://GOLDEN Jobs.edu.af">GOLDEN Jobs</a>.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>

<script src="{{ asset('admin/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('admin/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/global/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('admin/assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/admin/layout/scripts/quick-sidebar.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/admin/layout/scripts/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/admin/pages/scripts/form-wizard.js') }}"></script>


 
<style type="text/css">
 .fr-wrapper a{
 	display: none!important;
 }
</style>
  
<script src="{{ asset('admin/assets/admin/pages/scripts/index.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   Demo.init(); // init demo features
   Index.init();
//   Index.initDashboardDaterange();
   FormWizard.init();
    // $(document).ready(function() {
             $(function() {
        $("#input1, #span1").persianDatepicker();       
    });
        //   });
});
</script>
</body>

</html>