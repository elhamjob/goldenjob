@extends('portal.layout.main')
@section('content')
<section class="content-header">
	<h1>
		Semesters Payments 
		<small>Allamah E-Learning System</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Payments Info</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<?php
		$db_ext = DB::connection('mysql1');
		 $usersdetail = $db_ext->table('student')->where('id','=',Auth::user()->st_id)->first();
		$student = $db_ext->table('student')->where('id','=',Auth::user()->st_id)->first();
				  $check_user = DB::table('users')->find(Auth::user()->id);
				  $fdep = $db_ext->table('program')->where("id","=",$student->department)->first();
		$exambatchs=$db_ext->table('exambatch')->where('st_id','=',$student->id)->orderby("id","asc")->get();
          ?>
		<div class="col-sm-12">
			<div class="box box-info">
				<div class="box-body">
			<div class="tabbable partition-light">
				<ul id="myTab6" class="hidden-print nav nav-tabs">
					@foreach($exambatchs as $exambatchd)
					@if($exambatchd->check==1)
					<li class="active">
						@else
						<li>
							@endif
							<?php $semester = $db_ext->table('semesters')->where("id","=",$exambatchd->semid)->first();?> 
							<a href="#{{$exambatchd->id}}" data-toggle="tab">
								Semester-{{$semester->semester}}
							</a>
						</li>
						@endforeach
					</ul>
				<div class="tab-content">
					@foreach($exambatchs as $exambatch)
					@if($exambatch->check==1)
					<div class="tab-pane fade in active" id="{{$exambatch->id}}">
					@else
						<div class="tab-pane fade in" id="{{$exambatch->id}}">
					@endif
						<button class="btn btn-primary hidden-print pull-right" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
						<br/>
						<br/>
						
							   <table class=" table table-bordered nowrap" id="sample-table-1">
							    <tr>
							      <td  class="text-right">پوهنځی</td>
							      <td  class="text-right">سمستر</td>
							      <td  class="text-right"> آی دی نمبر </td>
							      <td  class="text-right"> نام </td>
							    </tr>
							    <tr>
							     <?php $semester=$db_ext->table('semesters')->where('id','=',$exambatch->semid)->first(); ?>
							     <td  class="text-right">{{ $fdep->depname_fa }}</td>
							     <td  class="text-right">
							      @if(isset( $semester->semester ))
							      {{$semester->semester}} 
							      @endif 
							    </td>
							    <td  class="text-right"> {{ $student->st_id }} </td>
							    <td  class="text-right"> {{ $student->st_name_fa }} </td>
							  </tr>
							</table>
							<br>
							
							<div class="table-responsive">
								<table class="table table-bordered text-center " id="sample-table-1">
									<tr>
										<td>S.No</td>
										<td>Slip ID</td>
										<td>Semester </td>
										<td>Fess Type</td>
										<td>Paid </td>
										<td class="hidden-print">Action </td>
									</tr>
									<?php 
									 $semester = $db_ext->table('semesters')->where("id","=",$exambatch->semid)->first();
									 $fess = $db_ext->table('student_fees')->where("student_id","=",$exambatch->st_id)
							              ->where("semester_id","=",$semester->semester)
							               ->get();
							               $i = 1; $tdiscount = 0; $tpaid = 0;  ?>
									  @foreach($fess as $fees)             
											<tr>
												<td>{{$i}}</td>
												<td>{{$fees->id}}</td>
												<td>
													<?php $semester = $db_ext->table('semesters')->where("semester","=",$fees->semester_id)->first();?>
													 Semester-{{$semester->semester}}
												</td>
												<td>
													@if($fees->type == 0)
													<span class="badge badge-warning">Semester Fee</span>
													@elseif($fees->type == 2)
													<span class="badge badge-warning">Examination Fee</span>
													@elseif($fees->type == 1)
													<span class="badge badge-warning">Admission Fee</span>
													@elseif($fees->type == 3)
													<span class="badge badge-warning">Chance Fee</span>
													@elseif($fees->type == 4)
													<span class="badge badge-warning">Book Fee</span>
													@else
													<span class="badge badge-warning">Coat Fee</span>
												    @endif
											    </td>
													<?php $discount = $db_ext->table('discount')->where("st_id","=",$student->id)
													   ->where("semester","=",$fees->semester_id)->first();?>
													<?php $tdiscount= @$discount->amount;?>
													
												
												<td>
													@if($fees->type == 0)
													<?php $tpaid+= $fees->payed_amount_af;?>
													@endif
													{{$fees->payed_amount_af}} </td>
												<td class="hidden-print">
													{{Form::open(array( 'url' => '/portal_print_fees'))}}
													<input type="hidden" name="id" value="{{$fees->id}}">
													<button type="submit" class="btn btn-success btd-sm">
														<i class="fa fa-print"></i>
													</button>
													{{Form::close()}}
												</td>
											</tr>
											<?php $i++?>
									  @endforeach	
									  <tr>
									  	<td colspan="2">Total Semester Fees: {{$fdep->abudget}} </td>
									  	<td colspan="1">Total Discount: {{$tdiscount}}</td>
									  	<td colspan="2">Total paid: {{$tpaid}}</td>
									  	<td colspan="2">Balance: {{($fdep->abudget)-($tdiscount+$tpaid)}}</td>
									  </tr>	
								</table>
							</div>
						</div>
					@endforeach
				</div>
			 </div>
		   </div>
	   </div>
<!-- end: PAGE -->
</div>
</div>
</div>	
</div>
<!-- end: MAIN CONTAINER -->

@stop