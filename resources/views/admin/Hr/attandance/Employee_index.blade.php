@extends('_layouts.admin.default')
@section('title', 'Attendance')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">Attendance Management</h4>
					


				</div>
				@component('_components.alerts-default')
				@endcomponent



				<div class="table-responsive">
					<table class="table table-striped custom-table table-nowrap mb-0">
						<thead>
							<tr>
								<th></th>
								<th></th>
								<th style="width: 180px;">Employee</th>

								@for($i=1; $i<=$month_days; $i++)
								<th>{{$i}}</th>
								@endfor
							</tr>
						</thead>
						<tbody>
							@php($class=0)
							@php($counter=0)
							@foreach($users as $user)

							@php($classId=$user->branch_id)
							@if($classId!=$class)
							<tr> 
								<td colspan="32" style="width: 180px;"><strong>@if(isset($user->branch->branch_name)){{$user->branch->branch_name}} @endif </strong></td> 
							</tr> 
							@endif


							<tr>
								<input type="hidden" name="ids[]" value="@if(isset($user->emp_id)){{$user->emp_id}} @endif">
								<td>{{++$counter}}</td>
								<td>
									<form method="POST" action="{{route('empoyee_attandance_mark')}}">
										@csrf
										<input type="hidden" name="emp_id" value="@if(isset($user->emp_id)){{$user->emp_id}} @endif">
										<input type="hidden" name="month" value="{{$month}}">
										<input type="hidden" name="year" value="{{$year}}">
										<button  class="btn btn-sm btn-primary">Add att</button>
									</form>
								</td>
								<td>
									<h2 class="table-avatar">
										<a class="avatar avatar-xs" href="javascript:;">
											<img alt="" src="@if($user->images){{asset('images/staff/'.$user->images)}} @else assets/img/user.jpg @endif"></a>
											<a href="profile.html">{{$user->name}}</a>
											<span>@if(isset($user->emp_id)){{$user->emp_id}} @endif</span>
										</h2>
									</td>
									@for($i=1; $i<=$month_days; $i++)

									<?php

									$date="$year".'-'."$month".'-'."$i";
									// dd($date);
									$att_date=$user->get_attandanceByMonth($date);
									?>
									
									<td>
										@if($att_date)
											@if(isset($att_date->attendance) && count($att_date->attendance))
												<?php
													$counterAttendance=count($att_date->attendance);
												?>
											
										<p>{{date("H:i", strtotime($att_date->attendance[0]->stamp)) }}</p>
										<p>{{date("H:i", strtotime($att_date->attendance[$counterAttendance-1]->stamp)) }}</p>
										@elseif(isset($att_date->holiday) && $att_date->holiday)
										<b>holiday: </b>{{$att_date->holiday->holiday_title}}
										@elseif($att_date->leave)
										<b>Leave: </b>{{$att_date->leave->leave_name}}
										@else
										<i style=" color:red" class="fa">&#xf00d;</i>
										@endif
		
 										@else

										<i style=" color:red" class="fa">&#xf00d;</i>
										@endif
									</td> 
									
									@endfor

									


								</tr>
								@php($class=$user->branch_id)
								@endforeach
							</tbody>
						</form>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>



@endsection

@push('post-styles')
<!-- <link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"> -->
<style>
	@import url(https://fonts.googleapis.com/css?family=Numans);
	body {
		font-family: 'Numans', sans-serif;
	}
	.holder {
		position:fixed;
		top:50%;
		left:50%;
		transform: translate(-50%,-50%);
	}
	.checkdiv {

		position: relative;
		padding: 4px 8px;
		border-radius:40px;
		margin-bottom:4px;
		min-height:30px;
		padding-left:40px;
		display: flex;
		align-items: center;
	}
	.checkdiv:last-child {
		margin-bottom:0px;
	}
	.checkdiv span {
		position: relative;
		vertical-align: middle;
		line-height: normal;
	}
	.le-checkbox {

		appearance: none;
		position: absolute;
		top:50%;
		left:5px;
		transform:translateY(-50%);
		background-color: #F44336;
		width:30px;
		height:30px;
		border-radius:40px;
		margin:0px;
		outline: none; 
		transition:background-color .5s;
	}
	.le-checkbox:before {
		content:'';
		position: absolute;
		top:50%;
		left:50%;
		transform:translate(-50%,-50%) rotate(45deg);
		background-color:#ff3131;
		width:20px;
		height:5px;
		border-radius:40px;
		transition:all .5s;
	}

	.le-checkbox:after {
		content:'';
		position: absolute;
		top:50%;
		left:50%;
		transform:translate(-50%,-50%) rotate(-45deg);
		background-color:#ff3131;
		width:20px;
		height:5px;
		border-radius:40px;
		transition:all .5s;
	}
	.le-checkbox:checked {
		background-color:#4CAF50;
	}
	.le-checkbox:checked:before {
		content: '';
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%) translate(-4px,3px) rotate(45deg);
		background-color: #009821;
		width: 9px;
		height: 5px;
		border-radius: 40px;
	}

	.le-checkbox:checked:after {
		content: '';
		position: absolute;
		top: 36%;
		left: 51%;
		transform: translate(-50%,-50%) translate(3px,2px) rotate(-45deg);
		background-color: #009821;
		width: 16px;
		height: -1px;
		border-radius: 20px;
	}
</style>
@endpush
@push('post-scripts')
<!-- <script src="{{asset('assets/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/buttons.colVis.min.js')}}"></script> -->

<script>
	// $(document).ready(function() {
 //     //Default data table
 //     $('#default-datatable').DataTable();


 //     var table = $('#example').DataTable( {
 //     	"order": [[ 0, "desc" ]],
 //     	lengthChange: false,
 //     	buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
 //     } );

 //     table.buttons().container()
 //     .appendTo( '#example_wrapper .col-md-6:eq(0)' );

 // } );
	$(document).ready(function(){
		$(".text-success").click(function () {    
			if($(this).hasClass("text-success"))
			{
				$(this).addClass("text-danger");
				$(this).removeClass(".text-success");
			}
			else{
				$(this).addClass("text-success");
				$(this).removeClass("text-danger");
			}
		});

	});

	function searchEmployee(obj){
		console.log('obj', obj);
	}

</script>


@endpush