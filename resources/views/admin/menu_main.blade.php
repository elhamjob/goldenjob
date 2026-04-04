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
						<a href="#">Main Menu</a>
					</li>
				</ul>
				
			</div>
			<h3 class="page-title">
			Page Menu Management <small>	Page Menu </small>
			</h3>
			 {{ Html::ul($errors->all(), array('class'=>'alert alert-danger text-danger','style'=>'padding:5px;')) }}
			 @if(Session::has('message'))
						<div class="alert alert-success">
							{{ Session::get('message') }}
						</div>
					@endif
			<!-- END PAGE HEADER-->
						
			<div class="portlet box green" >
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-image"></i>Add 	Page Menu 
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body flip-scroll" style="padding-bottom:50px;">
							{{ Form::open(array('url'=>'/admin/postmain_menu')) }}
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" placeholder="menu in English" class="form-control" name="name_en" />
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" placeholder="menu in Dari" class="form-control" name="name_fa" />
								</div>
							</div>
							<div class="col-md-3">
								<?php $program  = DB::table("main_nav")->get(); //Menu title ?>   
								<div class="form-group">
									<select placeholder="sub" class="form-control" name="sub">
										<option value="0"></option>
										@foreach($program as $pro)
										<option value="{{$pro->id}}">{{$pro->menu}}</option>
										@endforeach
									</select>
								</div>
							</div>
							

							<div class="col-md-2">
								<div class="form-group">
									<input type="text" placeholder="url" class="form-control" name="url" />
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Save </button>
								</div>
							</div>
							{{ Form::close() }}
						</div>
			</div>
			
			<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-image"></i>Current page menu
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
								<th>ID</th>
								<th>
									 name(EN)
								</th>
								<th>
									 name(FA)
								</th>
								<th>
									Actions 
								</th>
							</tr>
							</thead>
							<tbody>
								
							@foreach($program as $pro)
							<tr>
								<td>
									{{ $pro->id }}
								</td>
								<td>
									 {{ $pro->menu }}
								</td>
								<td>
									<span class="right text-right pull-right">
									 {{ $pro->menu_fa }}
									</span>
								</td>
								<td class="text-center">
									<div class="text-center center">
									   <a href="{{{ URL::route('delete_menu', $pro->id) }}}" class="btn btn-sm red"><i class="fa fa-trash-o"></i></button></a>

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
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->
@stop