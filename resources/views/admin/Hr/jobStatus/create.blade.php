@extends('_layouts.admin.default')
@section('title', 'Application Status')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Application Status Mangement</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('application-status.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						@csrf
						<div class="row" style="margin: 10px 0px;">
							<div class="col-md-12">
								<label class="control-label"> Name</label>
								<input name="name" value="{{ old('name') }}" type="text" placeholder="First Name" class="form-control">
								@if ($errors->has('name'))
								<div class="alert alert-danger" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
										<span class="sr-only">Close</span>
									</button>
									<strong>Warning!</strong> {{$errors->first('name')}}
								</div>
								@endif
							</div>
						</div>
						<div class="row" style="margin: 10px 0px;">
							<div class="col-md-6">
								<label class="control-label">Status</label>
								<div style="padding-top: 20px">
									<label style="display:inline; padding-right: 35px">
										<input name="status" id="facility_used_for_active"  class="icheck facility_status" type="radio" value="1"  checked> Active </label>
										<label style="display:inline;">
											<input name="status" id="facility_used_for_inactive" class="icheck facility_status" type="radio" value="0"  >  Inactive </label>
										</div>
									</div>

									<div class="col-md-6">
										<label class="control-label">Description</label>
										<textarea type="text" name="description" value="{{ old('description') }}" placeholder="Description" class="form-control"></textarea> 
										<div class="modal-footer">
										</div>
									</div>
								</div>
								<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
								value="Dismiss">
								<input type="submit" class="btn btn-outline-success btn-lg" id="addDataBtn"
								value="Submit">
							</div>
						</div>
					</div>
				</div>
				@endsection

				@push('post-styles')

				@endpush

				@push('post-scripts')

				@endpush