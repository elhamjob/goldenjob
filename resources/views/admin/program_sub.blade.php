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
						<a href="#">Job Categories</a>
					</li>
				</ul>
				
			</div>
			<h3 class="page-title">
			Job Categories Management <small>manage Job Categories</small>
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
								<i class="fa fa-image"></i>Add Job Categories
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body flip-scroll" style="padding-bottom:50px;">
							{{ Form::open(array('url'=>'/admin/post_program_sub')) }}
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" placeholder="Job Categories in English" class="form-control" name="name_en" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" placeholder="Job Categories in Dari" class="form-control" name="name_fa" />
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Save Job Categories</button>
								</div>
							</div>
							{{ Form::close() }}
						</div>
			</div>
			
			<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-image"></i>Current Job Categories
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
									 Job Categories(EN)
								</th>
								<th>
									 Job Categories(FA)
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
									 {{ $pro->name_en }}
								</td>
								<td>
									<span class="right text-right pull-right">
									 {{ $pro->name_fa }}
									</span>
								</td>
								<td class="text-center">
									<div class="text-center center">
										 <a data-toggle="modal" data-target="#{{$pro->id}}" class="btn btn-sm green"><i class="fa fa-pencil"></i></button></a>
									   <a href="{{{ URL::route('delete_program_sub', $pro->id) }}}" class="btn btn-sm red"><i class="fa fa-trash-o"></i></button></a>

									</div>
								</td>
							</tr>
							<div class="modal fade" id="{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							       {{ Form::open(array('url'=>'/admin/edit_program_sub')) }}
							      <div class="modal-body">
							       <div class="row">
							       	<input type="hidden" name="id" value="{{$pro->id}}">
											<div class="col-md-4">
												<div class="form-group">
													<input type="text"
													value="{{$pro->name_en}}" class="form-control" name="name_en" />
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<input type="text" value="{{$pro->name_fa}}" class="form-control" name="name_fa" />
												</div>
											</div>
										</div>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        <button type="submit" class="btn btn-primary">Save changes</button>
							      </div>
							      {{Form::close()}}
							    </div>
							  </div>
							</div>
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