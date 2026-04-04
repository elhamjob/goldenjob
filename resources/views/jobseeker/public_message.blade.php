@extends('jobseeker.layout.main')
@section('content')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
					<table class="table table-hover">
						<?php
						$db_ext = DB::connection('mysql1');
						$pmessage = $db_ext->table('public_message')
						->orderby("id","desc")
						->where("type",'=',0)
						->where('uni',"=",1)->take(3)->get()?>
						@if($pmessage->count()<=0)
						<div class="col-md-12 center text-center">
							<h1 class="text-azure"><i class="fa fa-smile-o fa-3x"></i></h1>
							<h1>Have a Nice Day!</h1>
						</div>
						@endif
						@foreach($pmessage as $pm)
						<tr>
							<td>{{ $pm->title }}</td>
							<td>Public Message</td>
							<td>{{ $pm->note }}</td>
							<td>
								<?php $users = $db_ext->table('usersdetail')->where('uid','=',$pm->created_by)->first(); ?>
								<span class="author-note text-right"><b>By:</b> 
									@if($users)
									{{ $users->fullname }}
									@endif
								</span>
								<time class="timestamp text-right" title="{{ $pm->created_at }}">
									{{ $pm->created_at }}
								</time>
							</td>
							<td>
								@if($pm->created_by == Auth::user()->id)
								<a href="{{ action('StudentController@delete_message',$pm->id) }}" class="delete-note"><i class="fa fa-times"></i> Delete</a>
								@endif
							</td>
						</tr>
						@endforeach
						<?php
						$exambatch = $db_ext->table('exambatch')
						->where("st_id","=",auth::user()->st_id)
						->orderby("id","desc")
						->first();
						$student = $db_ext->table('student')
						->where("id","=",auth::user()->st_id)
						->first();
						$pmessage = $db_ext->table('public_message')
						->where("section",'=',$exambatch->depid)
						->where("session",'=',$student->session)
						->orderby("id","desc")
						->where("type","=",1)->take(3)->get();?>
						@foreach($pmessage as $pm)
						<tr>
							<td>{{ $pm->title }}</td>
							<td><span class="pull-right badge badge-warning">Message for Class of
								<?php $batch = $db_ext->table('batch')->where("id","=",$pm->class)->first();
								$fdep = $db_ext->table('program')->where("id","=",$pm->department)->first();?>
								@if($batch)
								{{$batch->batch_name}}
								@endif
								@if($fdep)
								{{$fdep->depname}}
								@endif
							</span></td>
							<td>{{ $pm->note }}<</td>
							<td>
								<?php $users = $db_ext->table('usersdetail')->where('uid','=',$pm->created_by)->first(); ?>
								<span class="author-note text-right"><b>By:</b>   @if($users)
									{{ $users->fullname }}
									@endif
								</span>
								<time class="timestamp text-right" title="{{ $pm->created_at }}">
									{{ $pm->created_at }}
								</time>
							</td>
							<td>	@if($pm->created_by == Auth::user()->id)
								<a href="{{ action('StudentController@delete_message',$pm->id) }}" class="delete-note"><i class="fa fa-times"></i> Delete</a>
								@endif
							</td>
						</tr>
						@endforeach
						<?php
						$pmessages = $db_ext->table('public_message')
						->where("st_id","=",Auth::user()->st_id)
						->take(3)->get();
						?>
						@foreach($pmessages as $pm)
						<tr>
							<td>{{ $pm->title }}</td>
							<td>Message for You</td>
							<td>{{ $pm->note }}</td>
							<td>
								<?php $users = $db_ext->table('usersdetail')->where('uid','=',$pm->created_by)->first(); ?>
								<span class="author-note text-right"><b>By:</b>    @if($users)
									{{ $users->fullname }}
								@endif</span>
								<time class="timestamp text-right" title="{{ $pm->created_at }}">
									{{ $pm->created_at }}
								</time>
							</td>
							<td>
								@if($pm->created_by == Auth::user()->id)
								<a href="{{ action('StudentController@delete_message',$pm->id) }}" class="delete-note"><i class="fa fa-times"></i> Delete</a>
								@endif
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
@stop