@extends('_layouts.admin.default')
@section('title', 'Attendance Report')
@section('content')

<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Attendance Report</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('attendance-report.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						{{ csrf_field() }}


						<div class="form-group row">
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">Select Branch </label>
							<input type="hidden" name="branch" class="branch">
							<div class="col-sm-4">
								<select  class=" branch_id" id="branch_id" onchange="getClass(this)"   name="branch_id"  placeholder="branch_id" style="height: 40px; width: 100%;">

									<option selected="selected" disabled="disabled">Seclect Branch</option>
									@if(!empty($branches))
									@foreach($branches as $branch)
									<option value={{$branch['id']}} @if($branch['id']==old('branch_id')){{'checked'}} @endif>{{$branch['branch_name']}}</option>
									@endforeach
									@endif
								</select>
								@if ($errors->has('branch_id'))
								<label id="branch_id-error" class="error" for="branch_id">
									{{$errors->first('branch_id')}}
								</label>
								@endif
							</div>

							<label for="input-group-icon-email" class="col-sm-2 form-control-label">First Due Date </label>
							<div class="col-sm-4">
								<input type="text" class="form-control fee_due_date1" value="{{date('d-m-Y')}}" name="fee_due_date1" id="fee_due_date1" autocomplete="off"  placeholder="fee_due_date1" readonly>


								@if ($errors->has('fee_due_date1'))
								<label id="fee_due_date1-error" class="error" for="fee_due_date1">
									{{$errors->first('fee_due_date1')}}
								</label>
								@endif
							</div>
						

						</div>
						<div class="form-group row">
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">List of Absent </label>
							<div class="col-sm-4">
								<select  class="last_absent_day" id="last_absent_day"  name="last_absent_day"  placeholder="last_absent_day" style="height: 40px; width: 100%;">

									<option selected="selected" disabled="disabled">Seclect Days</option>

									<option value="3">Last 3 day</option>
									<option value="7">last 7 day</option>
									<option value="30">Last 30 day</option>
									
								</select>
								@if ($errors->has('last_absent_day'))
								<label id="last_absent_day-error" class="error" for="last_absent_day">
									{{$errors->first('last_absent_day')}}
								</label>
								@endif
							</div>

							

						</div>
						<div class="form-group row">

							<div class="card" style="width:100%">
								<div class="card-block">
									<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
										<button class="btn btn-primary ks-rounded"> Submit </button>
									</div>

								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endsection

	@push('post-styles')



	@endpush
	@push('post-scripts')

	<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-font.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker.css')}}" />

	<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-ios.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-android.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-windows.css')}}" /> 

	<!-- <script type="text/javascript" src="{{asset('js/datepickerScroll/vendors/jquery-1.11.1.min.js')}}"></script> -->
	<script type="text/javascript" src="{{asset('js/datepickerScroll/src/anypicker.js')}}"></script>

	<script type="text/javascript">




		$(".fee_due_date1").AnyPicker({
			mode: "datetime",
			dateTimeFormat: " dd-MMM-yyyy",
		});
		$(".fee_due_date2").AnyPicker({
			mode: "datetime",
			dateTimeFormat: " dd-MMM-yyyy",
		});


	</script>


	@endpush