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
						<a href="#">Activity Management</a>
					</li>
				</ul>
				
			</div>
			<h3 class="page-title">
			Activity Management <small>manage activities</small>
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
								<i class="fa fa-image"></i>Current Activities
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content activities">
							<thead class="flip-content">
							<tr>
								<th style="width:150px;">
									 Image
								</th>
								<th style="width:150px;">
									 Heading(EN)
								</th>
								<th style="width:150px;">
									 Heading(FA)
								</th>
								<th style="width:250px;">
									 Text(EN)
								</th>
								<th style="width:250px;">
									 Text(FA)
								</th>
								<th>
									 Type
								</th>
								<th>
									Actions 
								</th>
							</tr>
							</thead>
							<tbody>
							@foreach($activities as $act)
							<tr>
								<td>
									 <img class="img img-responsive" src="{{ asset('images/blogs/'.$act->photo) }}" style="width:120px; margin:0 auto;">
								</td>
								<td>
									 {{ $act->heading_en }}
								</td>
								<td>
									<span class="right text-right pull-right">
									 {{ $act->heading_fa }}
									</span>
								</td>
								
								<td>
									 {{ substr(strip_tags($act->text_en),0, 50) }}
								</td>
								<td>
									<span class="right text-right pull-right">
									 {{ substr(strip_tags($act->text_fa),0, 50) }}
									</span>	 
								</td>
								
								<?php $actypes = DB::table('ac_types')->where('id','=',$act->type)->first(); ?>
								<td>
								    <?php if($act->type == 2){?>
								        <span class="badge badge-info">News</span>
									<?php }elseif($act->type == 1){ ?>
									    <span class="badge badge-primary">Blog</span>
									<?php }elseif($act->type == 3){?>
									    <span class="badge badge-success">Event</span>
									    <?php }?>
								</td>
								<td class="text-center">
									<div class="text-center center">
									   <a href="{{{ URL::route('edit_activity', $act->id) }}}" class="btn btn-sm green" id="btn_sm"><i class="fa fa-pencil"></i></button></a>
									   <a href="{{{ URL::route('delete_activity', $act->id) }}}" class="btn btn-sm red" id="btn_sm"><i class="fa fa-trash-o"></i></button></a>
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
			{{ $activities->links() }}
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->
@stop