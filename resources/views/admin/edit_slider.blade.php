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
						<a href="#">Edit Slider</a>
					</li>
				</ul>
				
			</div>
			<h3 class="page-title">
			Edit Slider <small>Edit a your  Slider</small>
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
								<i class="fa fa-pencil"></i> Edit Slider - <span class="step-title">
								Step 1 of 3 </span>
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
							{{Form::open(array('files' => true, 'url' => '/admin/post_slider_update','id'=>'submit_form','class'=>'form-horizontal'))}}
							
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
												<i class="fa fa-check"></i> Photo & Link </span>
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
												<h3 class="block">Provide  slider titles in English</h3>
												
												
												<div class="form-group">
													<label class="control-label col-md-3">Slider Main   Title (EN) <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="text" maxlength="40"
														value="{{$slider->heading_en}}" class="form-control" name="title_en"/>
														<span class="help-block">
														Provide  Main title in English (limit 40) </span>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-md-3"> Main Text (EN) <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="text" value="{{$slider->text_en}}" maxlength="300" class="form-control" name="text_english">

														<span class="help-block">
														Provide  Main Text in english (limit 300) </span>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Provide slider titles in Farsi</h3>
												
												
												<div class="form-group">
													<label class="control-label col-md-3">Main    Title (FA) <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="hidden" name="id" value="{{$slider->id}}">
														<input type="text" value="{{$slider->heading_fa}}" maxlength="40" class="form-control" name="title_fa"/>
														<span class="help-block">
														Provide Main   Texdt in Farsi (limit 40) </span>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-md-3">Main   Text (FA) <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="text" value="{{$slider->text_fa}}" maxlength="300" class="form-control"  name="text_farsi">
														<span class="help-block">
														Provide Main Text in Farsi (limit 300) </span>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab3">
												<h3 class="block">Provide Photo & Link</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Link <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="text" value="{{$slider->link}}"  class="form-control" name="link"/>
														<span class="help-block">
														e.g. http://GOLDEN Jobs .edu.af </span>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-md-3">Photo <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="file" class="form-control" name="photo" />
														<span class="help-block">
														   <p> Current Photo: <?php if($slider->photo != null){?>
														        <img src="{{ asset('images/main-slider/'.$slider->photo) }}" style="width:215px; border-radius:5px;">
														   <?php }?></p>
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
@stop