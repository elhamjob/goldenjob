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
						<a href="#">Facts Management</a>
					</li>
				</ul>
				
			</div>
			<h3 class="page-title">
			Facts <small>facts at home page</small>
			</h3>
			 {{ Html::ul($errors->all(), array('class'=>'alert alert-danger text-danger','style'=>'padding:5px;')) }}
			 @if(Session::has('message'))
						<div class="alert alert-success">
							{{ Session::get('message') }}
						</div>
					@endif
			<!-- END PAGE HEADER-->
			<div class="portlet col-md-8 col-md-offset-2 box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-check"></i> Edit Facts</span>
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
										{{ Form::open(array('url'=>'/admin/post_facts')) }}
											<div class="form-body">
												<h3 class="form-section">Facts</h3>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Fact Title En<span class="required">*</span></label>
															<input type="text" name="fact_en" value="{{ $fact->fact_en }}" class="form-control" >
															
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Fact Title Fa<span class="required">*</span></label>
															<input type="text" name="fact_fa" value="{{ $fact->fact_fa }}" class="form-control" >
															
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Fact Number<span class="required">*</span></label>
															<input type="number" name="fact" value="{{ $fact->fact }}" class="form-control">
															
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Fact Title En<span class="required">*</span></label>
															<input type="text" name="facto_en" value="{{ $fact->facto_en }}" class="form-control" >
															
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Fact Title Fa<span class="required">*</span></label>
															<input type="text" name="facto_fa" value="{{ $fact->facto_fa }}" class="form-control" >
															
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Fact Number<span class="required">*</span></label>
															<input type="number" name="facto" value="{{ $fact->facto }}" class="form-control">
															
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Fact Title En<span class="required">*</span></label>
															<input type="text" name="factt_en" value="{{ $fact->factt_en }}" class="form-control" >
															
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Fact Title Fa<span class="required">*</span></label>
															<input type="text" name="factt_fa" value="{{ $fact->factt_fa }}" class="form-control" >
															
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Fact Number<span class="required">*</span></label>
															<input type="number" name="factt" value="{{ $fact->factt }}" class="form-control">
															
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Fact Title En<span class="required">*</span></label>
															<input type="text" name="factth_en" value="{{ $fact->factth_en }}" class="form-control" >
															
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Fact Title Fa<span class="required">*</span></label>
															<input type="text" name="factth_fa" value="{{ $fact->factth_fa }}" class="form-control" >
															
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Fact Number<span class="required">*</span></label>
															<input type="number" name="factth" value="{{ $fact->factth }}" class="form-control">
															
														</div>
													</div>
													<!--/span-->
												</div>
												
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