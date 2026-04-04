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
						<a href="#">Profile</a>
					</li>
				</ul>
				
			</div>
			<h3 class="page-title">
			Profile <small>edit your profile</small>
			</h3>
			 {{ Html::ul($errors->all(), array('class'=>'alert alert-danger text-danger','style'=>'padding:5px;')) }}
			 @if(Session::has('message'))
						<div class="alert alert-success">
							{{ Session::get('message') }}
						</div>
					@endif
			<!-- END PAGE HEADER-->
			<div class="portlet col-md-6 col-md-offset-3 box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-check"></i> Edit Profile</span>
							</div>
							<div class="tools hidden-xs">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
										<!-- BEGIN FORM-->
										{{ Form::open(array('url'=>'/admin/post_profile')) }}
											<div class="form-body">
												<h3 class="form-section">Profile</h3>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">E-Mail<span class="required">*</span></label>
															<input type="email" disabled="disabled" name="email" value="{{ $profile->email }}" class="form-control" placeholder="name@domain.com">
															
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">New Password<span class="required">*</span></label>
															<input type="password" name="password" class="form-control" placeholder="***********">
															
														</div>
													</div>
													
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">New Password Confirmation<span class="required">*</span></label>
															<input type="password" name="password_confirmation" class="form-control" placeholder="***********">
															
														</div>
													</div>
													<!--/span-->
													<!--/span-->
												</div>
												<!--/row-->
												
											</div>
											<div class="form-actions right">
												<button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
											</div>
										{{ Form::close() }}
										<!-- END FORM-->
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