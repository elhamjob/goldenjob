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
						<a href="#">General Info</a>
					</li>
				</ul>
				
			</div>
			<h3 class="page-title">
			General Info <small>email,phone, address, about and social links</small>
			</h3>
			 {{ Html::ul($errors->all(), array('class'=>'alert alert-danger text-danger','style'=>'padding:5px;')) }}
			 @if(Session::has('message'))
						<div class="alert alert-success">
							{{ Session::get('message') }}
						</div>
					@endif
			<!-- END PAGE HEADER-->
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-info-circle"></i> General Info</span>
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
										{{ Form::open(array('url'=>'/admin/post_info',"class"=>"pro-ajax")) }}
											<div class="form-body">
												<h3 class="form-section">Contacts</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Contact E-Mail<span class="required">*</span></label>
															<input type="text" name="email" value="{{ $info->email }}" class="form-control" placeholder="name@domain.com">
															<span class="help-block">
															This email will be shown at contact page, header and footer </span>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Phone<span class="required">*</span></label>
															<input type="text" name="phone" value="{{ $info->phone }}" class="form-control" placeholder="+93 (0) 7********">
															<span class="help-block">
															Provide phone number here </span>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Facebook</label>
															<input type="text" name="facebook" value="{{ $info->facebook }}" class="form-control" placeholder="http://fb.com/***">
															<span class="help-block">
															Provide Facebook page link here </span>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Youtube</label>
															<input type="text" name="youtube" value="{{ $info->youtube }}" class="form-control" placeholder="http://youtube.com/***">
															<span class="help-block">
															Provide Youtube channel link here </span>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Skype</label>
															<input type="text" name="skype" value="{{ $info->skype }}" class="form-control" placeholder="GOLDEN Jobs...">
															<span class="help-block">
															Provide Skype Name  here </span>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Twiter</label>
															<input type="text" name="twiter" value="{{ $info->twiter }}" class="form-control" placeholder="GOLDEN Jobs...">
															<span class="help-block">
															Provide Twiter Name  here </span>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<!--/row-->
												<h3 class="form-section">Address</h3>
												<div class="row">
													<div class="col-md-6 ">
														<div class="form-group">
															<label>Address (English)<span class="required">*</span></label>
															    <input type="text" class="form-control" value="{{ $info->address_en }}"  name='address_english'>
														</div>
													</div>
													<div class="col-md-6 ">
														<div class="form-group">
															<label>Address (Farsi)<span class="required">*</span></label>
																<div >
																    <input type="text" class="form-control" value="{{ $info->address_fa }}" name='address_farsi'>
															    </div>
														</div>
													</div>
												</div>
													<!--/span-->
												<h3 class="form-section">Footer About</h3>
												<div class="row">
													<div class="col-md-6 ">
														<div class="form-group">
															<label>About (English)</label>
																    <textarea  rows="8" id="editor1" class="form-control" cols="8" name='about_english'>{{ $info->about_en }}</textarea>
														</div>
													</div>
													<div class="col-md-6 ">
														<div class="form-group">
															<label>About (Farsi)</label>
																    <textarea  class="form-control" id="editor" rows="6" cols="8"  name='about_farsi'>{{ $info->about_fa }}</textarea>
														</div>
													</div>
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