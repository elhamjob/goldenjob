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
						<a href="#">credits Management</a>
					</li>
				</ul>
				
			</div>
			<h3 class="page-title">
			credits Management <small>insert, delete and update credits</small>
			</h3>
			<!-- END PAGE HEADER-->
			<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-pencil"></i> Add a New credit 
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
							{{Form::open(array('files' => true, 'url' => '/admin/post_user_credit','id'=>'submit_form','class'=>'pro-ajax use-ajax  form-horizontal','data-pro-alert'=>"login-user-alert"))}}
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
													<label class="control-label col-md-3">User <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<select name='user' class="form-control">
															<option value=""></option>
															@foreach($users as $user)
															<option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}</option>
															@endforeach
														</select>
														
													</div>
										</div>
										
										<div class="form-group">
													<label class="control-label col-md-3">Credits Amount <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="number" name="amount" class="form-control" placeholder="credits to be added " />
														
													</div>
										</div>
										<div class="form-group">
													<label class="control-label col-md-3">Credits date <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="date" name="date" class="form-control" placeholder="credits  added date " />
														
													</div>
										</div>
										
										
									
										<div class="form-group">
											<div class="col-md-6 center">
											<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save Credits</button>
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
									Full Name
								</th>
								<th>
									 E-Mail
								</th>
								<th>
									 Created At
								</th>
								<th>
									Amount
								</th>
								<th>
									Actions 
								</th>
							</tr>
							</thead>
							<tbody>
							@foreach($credits as $user)
							<?php $userdetails = \DB::table('users')->where('id',$user->user_id)->first();?>
							<tr>
								<td>
									{{ $user->id }}
								</td>
								<td>
									{{ $userdetails->name ?? "" }}  {{ $userdetails->last_name ?? "" }} 
								</td>
								<td>
									{{ $userdetails->email ?? "" }}
								</td>
								<td>
									{{ $user->date }}
								</td>
								<td>
									{{ $user->amount }} Credits
								</td>
								<td class="text-center">
									<div class="text-center center">
										<a href="{{ URL::route('delete_user_credit', $user->id) }}" class="btn btn-sm red"><i class="fa fa-trash-o"></i></button></a>
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