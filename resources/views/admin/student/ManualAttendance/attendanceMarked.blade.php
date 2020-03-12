
@extends('_layouts.admin.default')
@section('title', 'Class wise attendance')
@section('content')
<style type="text/css">
	.btn-circle.btn-sm {

		border-radius: 10;
	}
</style>
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Attendance of {{date("Y-m-d", strtotime($attendance_date))}} @isset($students[0]->branch->branch_name) {{$students[0]->branch->branch_name}} @endisset </h4>
					@component('_components.alerts-default')
					@endcomponent
					<div class="row">
						<div class="col-12">
							<div class="table-responsive">
								<table id="default-datatable" class="table">
									<thead>
										
										<tr>
											<th>Std Id </th>
											<th>Std Name</th>

											<th>Present </th>
											<th>Absent </th>
											<th>Leave </th>
											<th>Holiday </th>
											

										</tr>
									</thead>
									<body >
										<form method="POST" action="{{route('attendanceMarked')}}">
											@csrf

											<input type="hidden" name="attendance_date" value="{{$attendance_date}}">
											<input type="hidden" name="branch_id" value="@isset($students[0]->branch_id) {{$students[0]->branch_id}} @endisset">
											<input type="hidden" name="class_id" value="@isset($students[0]->course_id) {{$students[0]->course_id}} @endisset">
											<input type="hidden" name="section_id" value="@isset($students[0]->course_id) {{$students[0]->course_id}} @endisset">
											@foreach($students as $std)

											<?php
												$branch_id=isset($students[0]->branch_id)?$students[0]->branch_id:null;
												$class_id=isset($students[0]->course_id)?$students[0]->course_id:null;
												$attendance_date=$attendance_date;
												$record=std_attendance($branch_id,$class_id,$std->id,$attendance_date);
												
											?>
											<tr>
												<td>{{$std->id}}</td>
												<input type="hidden" name="std_ids[]" value="{{$std->id}}">
												<td>{{$std->s_name}}</td>
												<td><input name="attendance[]" style=" width: 30px; height: 30px;" @if(!($record)) checked @endif  @if(isset($record) && $record->present) checked @endif data-ids="{{$std->id}}" type="checkbox" class="checkboxes custom-check std{{$std->id}}" 
													value="1"   />   
												</td>
												<td><input name="attendance[]" style=" width: 30px; height: 30px;" @if(isset($record) && $record->absent) checked @endif data-ids="{{$std->id}}" type="checkbox" class="checkboxes custom-check std{{$std->id}}" 
													value="2"   />  
												</td>
												<td><input name="attendance[]" style=" width: 30px; height: 30px;" @if(isset($record) && $record->leave_id) checked @endif data-ids="{{$std->id}}" type="checkbox" class="checkboxes custom-check std{{$std->id}}" 
													value="3"   />  
												</td>
												<td><input name="attendance[]" style=" width: 30px; height: 30px;" @if(isset($record) && $record->holiday_id) checked @endif data-ids="{{$std->id}}" type="checkbox" class="checkboxes custom-check std{{$std->id}}" 
													value="4"   />  
												</td>

											</tr>
											@endforeach

										</body>
									</table>

								</div>



							</div>
						</div>
						<div class="form-group row">

							<div class="card" style="width:100%">
								<div class="card-block">
									<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
										<button class="btn btn-primary ks-rounded" onclick="submitForm(this);"> Submit </button>
									</div>

								</div>
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>





@endsection
@push('post-styles')

@endpush
@push('post-scripts')

<script>
	function submitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form    
        btn.form.submit();
    }

    $('.custom-check').on('click',function(){
    	var ids=parseInt($(this).attr('data-ids'));

    	if($(this).prop("checked") == false){
    		$(this).prop('checked', false);
    	}
    	else{
    		$('.std'+ids).prop('checked', false);
    		$(this).prop('checked', true);
    	}
    });
</script>
@endpush