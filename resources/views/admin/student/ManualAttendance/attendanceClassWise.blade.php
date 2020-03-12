
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
					<h4 class="card-title">Attendance of {{date("Y-m-d", strtotime($attendance_date))}} @isset($classes[0]->branch->branch_name) {{$classes[0]->branch->branch_name}} @endisset </h4>
					@component('_components.alerts-default')
					@endcomponent
					<div class="row">
						@foreach($classes as $class)
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="dash-widget dash-widget5">
								<?php
									$total_stds=count(class_students($class->branch_id,$class->course_id));

									$presents=class_attendance_by_date($class->branch_id,$class->course_id,$attendance_date);

									?>


								<form method="POST" action="{{route('AddAttendance')}}">
									@csrf

									<input type="hidden" name="class_id" value="@isset($class->course_id) {{$class->course_id}} @endisset">
									<input type="hidden" name="branch_id" value="@isset($class->branch_id) {{$class->branch_id}} @endisset">
									<input type="hidden" name="attendance_date" value="@isset($attendance_date) {{$attendance_date}} @endisset">
									
								<button type="submit" class="btn  @if($presents > 0) btn-success  @else btn-danger @endif btn-circle btn-sm"> @if($presents > 0) Edit Attendance  @else Add Attendance @endif </button>

								<!-- <span class="dash-widget-icon bg-primary"><i class="fa fa-plus" aria-hidden="true"></i></span> -->
								</form>
								<div class="dash-widget-info">
									<h3>@isset($class->course->course_name) {{$class->course->course_name}} @endisset</h3>

									
									@if($presents > 0) 
									<span>Present {{$presents}}</span>
									<span>Absent {{$total_stds-$presents}}</span>
									@else
									<span>Attendance Not Mark</span>
									@endif
								</div>
							</div>
						</div>
						@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>
</div>





@endsection
@push('post-styles')

@endpush
@push('post-scripts')


@endpush