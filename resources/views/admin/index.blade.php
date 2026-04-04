@extends('admin.layout.main')
@section('content')
    <?php $info = App\info::find(1);?>
    
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
        
			<!-- BEGIN PAGE HEADER-->
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{{ URL::route('index') }}}">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Admin Dashboard</a>
					</li>
				</ul>
				
			</div>
			<h3 class="page-title">
			Welcome to <small>
							  GOLDEN Jobs  Website  Admin</small>
			</h3>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-desktop"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{ $pages }}
							</div>
							<div class="desc">
								 Custom Pages
							</div>
						</div>
						<a class="more" href="">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-sitemap"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{ $programs }}
							</div>
							<div class="desc">
								 Total Categories
							</div>
						</div>
						<a class="more" href="">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-tasks"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{ $acs }}
							</div>
							<div class="desc">
								 Activity Posts
							</div>
						</div>
						<a class="more" href="">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple-plum">
						<div class="visual">
							<i class="fa fa-envelope"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{ $contacts }}
							</div>
							<div class="desc">
								 Contacts
							</div>
						</div>
						<a class="more" href="">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet light text-center">
						<div class="portlet-body text-center">

                         <a href='https://www.free-counters.org/'>www.free-Counter.org</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=f386bdcf320e0732530941511bd810173bd426aa'></script>
<script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/1085309/t/6"></script>

https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1354845579740725							
                          
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
				
			</div>
			
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->

    
@stop