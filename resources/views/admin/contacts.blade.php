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
						<a href="#">Contacts Management</a>
					</li>
				</ul>
				
			</div>
			<h3 class="page-title">
			Contacts Management <small>view and delete messages</small>
			</h3>
			 {{ Html::ul($errors->all(), array('class'=>'alert alert-danger text-danger','style'=>'padding:5px;')) }}
			 @if(Session::has('message'))
						<div class="alert alert-success">
							{{ Session::get('message') }}
						</div>
					@endif
			<!-- END PAGE HEADER-->
			@foreach($contacts as $contact)
			<div class="col-md-4">
			<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-envelope"></i>{{ $contact->name }}
							</div>
							<div class="tools">
								<a href="{{ URL::route('delete_contacts', $contact->id) }}" style="color:#fff;">
								<i class="fa fa-trash-o"></i> Delete </a>
							</div>
						</div>
						<div class="portlet-body flip-scroll">
							<div class="scroller" style="height:200px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="green">
							<table class="table">
								<tr style="border-top:none">
									<td style="border-top:none"><b>Name:</b></td>
									<td style="border-top:none">{{ $contact->name }}</td>
								</tr>
								<tr>
									<td><b>Email:</b></td>
									<td>{{ $contact->email }}</td>
								</tr>
								<tr>
									<td><b>Phone:</b></td>
									<td>{{ $contact->phone }}</td>
								</tr>
								<tr>
									<td><b>Date & Time:</b></td>
									<td>{{ $contact->created_at }}</td>
								</tr>
							</table>
							<b>Subject: {{ $contact->subject }}</b>
							<p>{{ $contact->message }}</p>
							</div>
						</div>
			</div>
			</div>
			@endforeach
			
			<div class="clearfix">
			</div>
			{{ $contacts->links() }}
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->
@stop