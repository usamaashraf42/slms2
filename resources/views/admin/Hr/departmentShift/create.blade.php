@extends('_layouts.admin.default')
@section('title', 'Shift')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Shift Mangement</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('department-shift.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						{{ csrf_field() }}

						<div class="row">
							
							<div class="col-md-12" style="margin-bottom: 20px;">
								
								<div class="row" style="margin: 10px 0px;">
									<div class="col-md-4">
										<label class="control-label">Shift Name</label>
										<input name="title" value="{{ old('title') }}" type="text" placeholder="Shift Name" class="form-control">
										@if ($errors->has('title'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('title')}}
										</div>
										@endif
									</div>
									<div class="col-md-4">
										<label class="control-label">Start Time</label>
										<input name="start_time" value="{{ old('start_time') }}" type="text" placeholder="Shift Name" class="form-control start_time">
										@if ($errors->has('start_time'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('start_time')}}
										</div>
										@endif
									</div>
									<div class="col-md-4">
										<label class="control-label">Start Relex Time</label>
										<input name="relaxation_start_time" value="{{ old('relaxation_start_time') }}" type="text" placeholder="Shift Name" class="form-control relaxation_start_time">
										@if ($errors->has('relaxation_start_time'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('relaxation_start_time')}}
										</div>
										@endif
									</div>
								</div>
								<div class="row" style="margin: 10px 0px;">
									
									<div class="col-md-4">
										<label class="control-label">End Time</label>
										<input name="end_time" value="{{ old('end_time') }}" type="text" class="form-control end_time">
										@if ($errors->has('end_time'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('end_time')}}
										</div>
										@endif
									</div>
									<div class="col-md-4">
										<label class="control-label">End Relex Time</label>
										<input name="relaxation_end_time" value="{{ old('relaxation_end_time') }}" type="text"  class="form-control relaxation_end_time">
										@if ($errors->has('relaxation_end_time'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('relaxation_end_time')}}
										</div>
										@endif
									</div>
								</div>


								

								<div class="row" style="margin: 10px 0px;">
									<div class="col-md-12 col-sm-12">
										<label class="control-label">Branch</label>
										<select id='permission-selected-options' multiple='multiple' name="branch_ids[]">

											@if(!empty($branches))
											@foreach($branches as $branch)
											<option value="{{$branch['id']}}" @if(isset(Auth::user()->branch_id) && Auth::user()->branch_id==$branch['id']) selected @endif>{{$branch['branch_name']}}</option>
											@endforeach
											@endif



										</select>

									</div>

								</div>
								<div class="row"  style="margin: 10px 0px;">
									<div class="col-md-12 col-sm-12">
										<label class="control-label">Department</label>
										<select id='dep-selected-options' multiple='multiple' name="dep_ids[]">

											@if(!empty($departments))
											@foreach($departments as $branch)
											<option value="{{$branch['id']}}" >{{$branch['dep_name']}}</option>
											@endforeach
											@endif



										</select>

									</div>
								</div>
							</div> 
						</div>

						<div class="row">
							<div class="col-md-8"></div>  <div class="col-md-3">
								<ul class="list-inline pull-right">
									<li><button type="submit" class="btn btn-primary " name="submit">Save</button></li>

								</ul>  
							</div>              
						</div>
					</div>
				</div>
			</div>
		</div>
		@endsection

		@push('post-styles')
		<link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
		@endpush

		@push('post-scripts')
		<link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
		<script src="{{asset('assets/multi-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/multi-select/jquery.multi-select.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/multi-select/select2.full.min.js')}}" type="text/javascript"></script>

		<link rel="stylesheet" href="{{asset('js/timeselect/jquery.timeselector.css')}}" />
  
    <script src="{{asset('js/timeselect/jquery.timeselector.js')}}"></script>



		
		<script type="text/javascript">
			$('.start_time').timeselector({});
			$('.relaxation_start_time').timeselector({});
			$('.end_time').timeselector({});
			$('.relaxation_end_time').timeselector({});

			


		</script>
		<script type="text/javascript">

			$('#pre-selected-options').multiSelect();
			$('#permission-selected-options').multiSelect();
			$('#dep-selected-options').multiSelect();
		</script>
		@endpush