@extends('_layouts.admin.default')
@section('title', 'Student Unfreeze')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<h4 class="card-title">Student Unfreeze</h4>
			<div class="card-box">
				<div class="card-block">

					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('student-unfreeze.store') }}" enctype = "multipart/form-data" id="upload_new_form">

						{{csrf_field()}}

						<div class="form-group row">
							
							<div class="col-sm-6">
								<label for="input-group-icon-email" class=" form-control-label">Std_id</label>
								<select type="text" class="category" value="{{old('std_id')}}" name="std_id" id="account" placeholder="cat_id" style="width: 100%;min-height: 40px;">
									<option disabled="disabled" selected>Choose the Student</option>
								</select>

								@if ($errors->has('std_id'))
								<label id="std_id-error" class="error" for="std_id">
									{{$errors->first('std_id')}}
								</label>
								@endif
							</div>
							

						</div>
						<div class="form-group row">
							<div class="col-md-6">
							<label for="input-group-icon-email" class=" form-control-label">Reasons</label>
							<textarea type="text" name="description" class="form-control "  ></textarea>
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

	

	<script type="text/javascript">
		


		$('#account').select2({
				ajax: {
					url: "{{route('get_student_search')}}",
					method:"post",
					dataType: 'json',
					processResults: function (_data, params) {

						var data1= $.map(_data, function (obj) {
							var newobj = {};
							newobj.id = obj.id;
							newobj.text= `${obj.s_name} - (${obj.id}) `;
							return newobj;
						});
						return { results:data1};
					}
				}
			});



	</script>

	@endpush