@extends('admin.layout.main')
@section('content')
    
      <style type="text/css">
	tr,td
	{
		padding: 1px !important
	}
	.ck .ck-content 
	{
		height: 200px !important
	}
</style>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
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
			Pages Management <small>insert, delete and update pages</small>
			</h3>
			 {{ Html::ul($errors->all(), array('class'=>'alert alert-danger text-danger','style'=>'padding:5px;')) }}
			 @if(Session::has('message'))
						<div class="alert alert-success">
							{{ Session::get('message') }}
						</div>
					@endif
			<!-- END PAGE HEADER-->
			<div class="portlet box blue" id="form_wizard_1">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-pencil"></i> Add a New Page - <span class="step-title">
								Step 1 of 3</span>
							</div>
							<div class="tools hidden-xs">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							{{Form::open(array('files' => true, 'url' => '/admin/post_page','id'=>'submit_form','class'=>'form-horizontal'))}}
							
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> English </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Farsi </span>
												</a>
											</li>
											
											<li>
												<a href="#tab3" data-toggle="tab" class="step">
												<span class="number">
												4 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Page Info </span>
												</a>
											</li>
										</ul>
										<div id="bar" class="progress progress-striped" role="progressbar">
											<div class="progress-bar progress-bar-success">
											</div>
										</div>
										<div class="tab-content">
											

											<div class="alert alert-danger display-none">
												<button class="close" data-dismiss="alert"></button>
												You have some form errors. Please check below.
											</div>
											<div class="alert alert-success display-none">
												<button class="close" data-dismiss="alert"></button>
												Your form validation is successful!
											</div>
											<div class="tab-pane active" id="tab1">
												<h3 class="block">Provide page content in English</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Page Title (EN) <span class="required">
													* </span>
													</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="title_english"/>
														<span class="help-block">
														Provide heading in English </span>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-md-3">Text (EN) <span class="required">
													* </span>
													</label>
													<div class="col-md-8">
														<div id="">
														    <textarea id='editor1' rows="8" class="form-control" name='text_english'></textarea>
														</div>
														<span class="help-block">
														Provide page text in english </span>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Provide page content in Farsi</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Page Title (FA) <span class="required">
													* </span>
													</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="title_farsi"/>
														<span class="help-block">
														Provide page title in Farsi </span>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-md-3">Text (FA) <span class="required">
													* </span>
													</label>
													<div class="col-md-8">
														<div id="" >
														    <textarea  id='editor'  rows="8" class="form-control"  name='text_farsi'></textarea >
														</div>
														<span class="help-block">
														Provide page text in Farsi </span>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab3">
												<h3 class="block">Provide Photo, menu link and nav catagory</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Menu <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<select class="form-control" name="menu">
															@foreach($nav as $nv)
																<option value="{{ $nv->id }}">{{ $nv->menu }}</option>
															@endforeach
														</select>
														<span class="help-block">
														This will be used as a link </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Page Link <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<div class="input-group">
														<span class="input-group-addon">
															http://GOLDEN Jobs.af/menu/
														</span>
														<input type="text" class="form-control" name="link"/>
														</div>
														<span class="help-block">
														e.g. /about_us </span>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-md-3">Photo <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="file" class="form-control" name="photo" />
														<span class="help-block">
														Upload high quality and wide screen photos </span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<a href="javascript:;" class="btn default button-previous">
												<i class="m-icon-swapleft"></i> Back </a>
												<a href="javascript:;" class="btn blue button-next">
												Continue <i class="m-icon-swapright m-icon-white"></i>
												</a>
												<input type="submit" class="btn green button-submit" value="Submit" /> 
											</div>
										</div>
									</div>
								</div>
							{{ Form::close() }}
						</div>
					</div>
	
			<div class="clearfix">
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->
<script>
        ClassicEditor
            .create( 
            	document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
            ClassicEditor
            .create( 
            	document.querySelector( '#editor1' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@stop