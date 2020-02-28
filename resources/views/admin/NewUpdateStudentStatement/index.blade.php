@extends('_layouts.admin.default')
@section('title', 'Update Student Account Statement')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<h4 class="card-title">Update Student Account Statement</h4>
			<div class="card-box">
				<div class="card-block">

					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('update-student-statement.store') }}" enctype = "multipart/form-data" id="upload_new_form">

						{{csrf_field()}}

						<div class="form-group row">
							<label for="std_id" class="col-sm-2 form-control-label">Branch</label>
							<div class="col-sm-4">
								<select class="form-control-1 branch_id" name="branch_id" onchange="getClass(this)"   id="branch_id"  style="height: 40px; width: 100%;">
									<option selected="selected" value="">All Branches</option>
									@if(!empty($branches))
									@foreach($branches as $branch)
									<option value={{$branch['id']}}>{{$branch['branch_name']}}</option>
									@endforeach
									@endif
								</select>
								@if ($errors->has('std_id'))
								<label id="std_id-error" class="error" for="std_id">
									{{$errors->first('std_id')}}
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