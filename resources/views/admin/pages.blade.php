@extends('admin.layout.main')
@section('content')
    
    
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
        
			<!-- BEGIN PAGE HEADER-->
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{{ URL::route('admin_index') }}}">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Pages Management</a>
					</li>
				</ul>
				
			</div>
			<h3 class="page-title">
			Pages Management <small>manage pages</small>
			</h3>
			 {{ Html::ul($errors->all(), array('class'=>'alert alert-danger text-danger','style'=>'padding:5px;')) }}
			 @if(Session::has('message'))
						<div class="alert alert-success">
							{{ Session::get('message') }}
						</div>
					@endif
			<!-- END PAGE HEADER-->
						
			<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-image"></i>Current Pages
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
							<tr>
								<th width="20%">
									 Image
								</th>
								<th>
									 Heading(EN)
								</th>
								<th>
									 Heading(FA)
								</th>
								<th>
									 Text(EN)
								</th>
								<th>
									 Text(FA)
								</th>
								<th>
									 Link
								</th>
								<th>
									 Menu
								</th>
								<th>
									Actions 
								</th>
							</tr>
							</thead>
							<tbody>
							@foreach($pages as $page)
							<tr>
								<td>
									 <img class="img img-responsive" src="{{ asset('images/page/'.$page->photo) }}">
								</td>
								<td>
									 {{ $page->title_en }}
								</td>
								<td>
									<span class="right text-right pull-right">
									 {{ $page->title_fa }}
									</span>
								</td>
								
								<td>
									 {{ substr($page->text_en,0, 50) }}
								</td>
								<td>
									<span class="right text-right pull-right">
									 {{ substr($page->text_fa,0, 50) }}
									</span>	 
								</td>
								
								<?php $nav = DB::table('main_nav')->where('id','=',$page->mid)->first(); ?>
								<td>
									 <a href="{{{ URL::route('page', array($nav->url, $page->menu)) }}}">Click Here</a>
								</td>
								<td>
									{{ $nav->menu }}
								</td>
								<td class="text-center">
									<div class="text-center center">
									   <a href="{{{ URL::route('edit_pages', $page->id) }}}" class="btn btn-sm green"><i class="fa fa-pencil"></i></button></a><br/><br/>
									   <a href="{{{ URL::route('delete_pages', $page->id) }}}" class="btn btn-sm red"><i class="fa fa-trash-o"></i></button></a>
									</div>
								</td>
							</tr>
							@endforeach
							</tbody>
						</table>
						</div>
			</div>
			<div class="clearfix">
			</div>
				{{ $pages->links() }}
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->
@stop