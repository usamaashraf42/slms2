@extends('_layouts.admin.default')
@section('title', 'Ledger')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<h4 class="card-title">Ledger</h4>
			<div class="card-box">
				<div class="card-block">

					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('ledger.store') }}" enctype = "multipart/form-data" id="upload_new_form">

						{{csrf_field()}}

						<div class="form-group row">
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">Account Id</label>
							<div class="col-sm-4">
								<select type="text" name="account_id" id="account" class="form-control" >
								</select>

								@if ($errors->has('account_id'))
								<label id="account_id-error" class="error" for="account_id">
									{{$errors->first('account_id')}}
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

	<script type="text/javascript">
		$('#account').select2({
			ajax: {
				url: "{{route('get_account')}}",
				method:"post",
				dataType: 'json',
				processResults: function (_data, params) {

					var data1= $.map(_data, function (obj) {
						var newobj = {};
						newobj.id = obj.id;
						newobj.text= `${obj.name} - (${obj.type}) `;
						return newobj;
					});
					return { results:data1};
				}
			}
		});
	</script>
	@endpush