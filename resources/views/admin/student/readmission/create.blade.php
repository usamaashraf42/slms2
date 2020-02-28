@extends('_layouts.admin.default')
@section('title', 'Student Readdmission')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
						<h4 class="card-title">Student Readdmission</h4>
			<div class="card-box">
				<div class="card-block">

					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('re-admission.store') }}" enctype = "multipart/form-data" id="upload_new_form">

						{{csrf_field()}}

						<div class="form-group row">
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">Ly No</label>
							<div class="col-sm-4">
								<input type="text" name="ly_no" class="form-control" >

								@if ($errors->has('ly_no'))
								<label id="ly_no-error" class="error" for="ly_no">
									{{$errors->first('ly_no')}}
								</label>
								@endif
							</div>


						</div>



						<div class="form-group row">

							<div class="card" style="width:100%">
								<div class="card-block">
									<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
										<button class="btn btn-primary ks-rounded"> Submit </button>
										<button class="btn btn-success ks-rounded">Cancel</button>
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


	@endpush