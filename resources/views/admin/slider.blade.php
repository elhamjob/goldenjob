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
						<a href="#">Slider Management</a>
					</li>
				</ul>
				
			</div>
			<h3 class="page-title">
			Slider Management <small>insert, delete and update home slider</small>
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
								<i class="fa fa-pencil"></i> Add a New Slide - <span class="step-title">
								Step 1 of 4 </span>
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
							{{Form::open(array('files' => true, 'url' => '/admin/post_slider','id'=>'submit_form','class'=>'form-horizontal'))}}
							
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
													<label class="control-label col-md-3">Slider    Title (EN) <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="text" maxlength="40" class="form-control" name="title_en"/>
														<span class="help-block">
														Provide  Main title in English (limit 40) </span>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-md-3"> Main Text (EN) <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="text" maxlength="300" class="form-control" name="text_english">

														<span class="help-block">
														Provide  Text in english (limit 300) </span>
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
														<input type="text" maxlength="40" class="form-control" name="title_fa"/>
														<span class="help-block">
														Provide Main   Title in Farsi (limit 40) </span>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-md-3">Main  text (FA) <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="text" maxlength="300" class="form-control"  name="text_farsi">
														<span class="help-block">
														Provide main  text in Farsi (limit 300) </span>
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
														<input type="text" class="form-control" name="link"/>
														<span class="help-block">
														e.g. http://GOLDEN Jobs.edu.af </span>
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
			
			<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-image"></i>Current Slides
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
									 Heading(PA)
								</th>
								<th>
									 Text(EN)
								</th>
								<th>
									 Text(FA)
								</th>
								<th>
									 Text(PA)
								</th>
								<th>
									 Link
								</th>
								<th>
									Actions 
								</th>
							</tr>
							</thead>
							<tbody>
							@foreach($slider as $slide)
							<tr>
								<td>
									 <img class="img img-responsive" src="{{ asset('images/main-slider/'.$slide->photo) }}">
								</td>
								<td>
									 {{ $slide->heading_en }}
								</td>
								<td>
									<span class="right text-right pull-right">
									 {{ $slide->heading_fa }}
									</span>
								</td>
								<td>
									<span class="right text-right pull-right">
									{{ $slide->heading_pa }}
									</span>
								</td>
								<td>
									 {{ substr($slide->text_en,0, 50) }}
								</td>
								<td>
									<span class="right text-right pull-right">
									 {{ substr($slide->text_fa,0, 50) }}
									</span>	 
								</td>
								<td>
									 <span class="right text-right pull-right">
									 {{ substr($slide->text_pa,0, 50) }}
									 </span>
								</td>
								<td>
									 <a href="{{ $slide->link }}">{{ $slide->link }}</a>
								</td>
								<td class="text-center">
									<div class="text-center center">
										<a href="{{{ URL::route('edit_slider', $slide->id) }}}" class="btn btn-sm green"><i class="fa fa-pencil"></i></button></a>
                                        <a 
                        					href="#" 
                        					class="btn btn-danger delete_lnk btn-sm"
                        					data-toggle="modal" 
                        					data-target="#deletdialog"
                        					data-rid="{{$slide->id}}"
                        					data-backdrop="static" 
                        					data-keyboard="false">
                        					<i class="fa fa-trash"></i>
                        				</a>
									<a href="{{{ URL::route('delete_slider', $slide->id) }}}" class="btn btn-sm red"><i class="fa fa-trash-o"></i></button></a>
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
<div id="deletdialog" class="modal fade custom_modal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete</h4>
      </div>
      <div class="modal-body">
        <h1 class="con_msg">Do you want to delete?</h1>
      </div>
      <div class="modal-footer">
        <button 
        	type="button" 
        	class="btn btn-success" 
        	data-dismiss="modal">No</button>
        <a href="#" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>
<!-- END CONTAINER -->
<script type="text/javascript">
    	var APP_URL = {!! json_encode(url('/')) !!}
        $(document).ready(function(){
            $(".delete_lnk").click(function(){
				var id= $(this).data('rid');
				var href = "{{asset('/admin/delete_slider')}}/"+id;
				$("div#deletdialog a").attr("href",href);
		    });
        });
// 		
</script>
@stop