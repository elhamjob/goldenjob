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
						<a href="#">Users Management</a>
					</li>
				</ul>
				
			</div>
			<h3 class="page-title">
			Users Management <small>insert, delete and update users</small>
			</h3>
			<!-- END PAGE HEADER-->
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-pencil"></i> Add a New User 
							</div>
							<div class="tools hidden-xs">
								<a href="javascript:;" class="expand">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body display-hide form">
							{{Form::open(array('files' => true, 'url' => '/admin/post_user','id'=>'submit_form','class'=>'pro-ajax use-ajax  form-horizontal','data-pro-alert'=>"login-user-alert"))}}
{{ csrf_field() }}							
							{{-- Form validation or other error messages in alert box--}}
							@if (count(@$errors) > 0)
							    <div class="flash-alert dark alert alert-danger {{ $id or null }}">
							        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							        @foreach($errors->all() as $error)
							            {!! $error !!} <br>
							        @endforeach
							    </div>
							@endif

							{{-- Session alerts - Bootstrap alert div's --}}
							@if (session()->has('flash_message'))
							    <div class="flash-alert alert alert-{{ session('flash_message.type') }}">
							        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							        {!! session('flash_message.message')  !!}
							    </div>
							@endif
							    <div id="YOUR-ALERT-ELEMENT-ID-HERE"></div>
									<div style="padding:20px;">
										
										<div class="form-group">
													<label class="control-label col-md-3">E-Mail <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="email" name="email" class="form-control" placeholder="name@domain.com" />
														<span class="help-block">
														Provide email </span>
													</div>
										</div>
										
										<div class="form-group">
													<label class="control-label col-md-3">Password <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="password" name="password" class="form-control" placeholder="********" />
														<span class="help-block">
														Provide password </span>
													</div>
										</div>
										
										
										<div class="form-group">
													<label class="control-label col-md-3">Confirm Password <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="password" name="password_confirmation" class="form-control" placeholder="********" />
														<span class="help-block">
														Confirm password </span>
													</div>
										</div>
										
										<div class="form-group">
											<div class="col-md-6 center">
											<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save User</button>
											</div>	
										</div>
										
									</div>
									
							{{ Form::close() }}
						</div>
					</div>
			<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-image"></i>Current Users
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
								<th>
									 ID
								</th>
								<th>
									 E-Mail
								</th>
								<th>
									 Created At
								</th>
								<th>
									 Updated At
								</th>
								<th>
									Actions 
								</th>
							</tr>
							</thead>
							<tbody>
							@foreach($users as $user)
							<tr>
								<td>
									{{ $user->id }}
								</td>
								<td>
									{{ $user->email }}
								</td>
								<td>
									{{ $user->created_at }}
								</td>
								<td>
									{{ $user->updated_at }}
								</td>
								<td class="text-center">
									<div class="text-center center">
										@if($user->main == 1)
										<a href="" class="btn btn-sm blue"><i class="fa fa-info"></i> Un-Deletable</button></a>
										@else
										<a href="{{ URL::route('delete_user', $user->id) }}" class="btn btn-sm red"><i class="fa fa-trash-o"></i></button></a>
										@endif
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