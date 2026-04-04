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
						<a href="#">Gallery Management</a>
					</li>
				</ul>
				
			</div>
			<h3 class="page-title">
			Gallery Management <small>insert, delete and update gallery</small>
			</h3>
			 {{ Html::ul($errors->all(), array('class'=>'alert alert-danger text-danger','style'=>'padding:5px;')) }}
			    @if(Session::has('message'))
					<div class="alert alert-success">
						{{ Session::get('message') }}
					</div>
				@elseif(Session::has('error'))
				    <div class="alert alert-danger">
						{{ Session::get('error') }}
					</div>
				@endif
			<!-- END PAGE HEADER-->
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-pencil"></i> Add a New gallery
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
							{{Form::open(array('files' => true, 'url' => '/admin/gallery/new','id'=>'submit_form','class'=>'form-horizontal'))}}
									
									<div style="padding:20px;">
									    <div class="form-group">
													<label class="control-label col-md-3">Select Photos <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="file" name="images[]" multiple class="form-control"  />
													</div>
													<div class="col-lg-12 col-lg-offset-3" style="padding-top:5px;">
													    <span style="font-size:12px;">You can select multiple photos</span>
													</div>
										</div>
										<div class="form-group">
											<div class="col-md-6 col-md-offset-3 center">
											<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save Gallery</button>
											</div>	
										</div>
										
									</div>
									
							{{ Form::close() }}
						</div>
					</div>
			
			        <div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-image"></i>Current Gallery
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body flip-scroll row" style="margin:0;padding:0;">
						    <?php
						        if(count($gallery) > 0){
						    ?>
						    @foreach($gallery as $photo)
						    <div class="gallery-item col-lg-3">
						        <div class="photo-container">
							        <img src="{{ asset('images/gallery/'.$photo->file_name) }}" style="width: 400px; height: 300px">
							        <a 
            							href="#" 
            							class="btn btn-danger btn-xs delete_lnk remove-photo"
            							data-toggle="modal" 
            							data-target="#deletdialog"
            							data-pid="{{$photo->id}}"
            							data-backdrop="static" 
            							data-keyboard="false"
            							style="border-radius:5px !important"
            							title="Delete"
            							id="btn_sm">
            							<i class="fa fa-trash"></i>
            						</a>
							    </div>
						    </div>
						    @endforeach
						    <?php }else{?>
						        <p id="gallery-noitem">There is not any photo in gallery</p>
						    <?php } ?>
						</div>
					</div>
			    </div>
			    <div class="clearfix">
			    </div>
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->
<!-- Delete Feature Modal -->
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

<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}

		$(document).on('click','.delete_lnk', function(){
			var id= $(this).data('pid');
			var href = "{{asset('/admin/gallery/remove').'/'}}"+id;
			$("div#deletdialog a").attr("href",href);
		})
</script>
@stop