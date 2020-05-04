
@extends('_layouts.admin.default')
@section('title', 'jazzcash file read')
@section('content')
<style>
	.checkbox_1{
		position: relative;
	}
	.checkbox_1:before{
		content: "";
		width: 24px;
		height: 24px;
		margin-left: -1px;
		margin-top: -3px;
		border-radius: 50%!important;
		border: solid 2px #014a75;
		background: white;
		position: absolute;
	}
	.checkbox_1:after{
		content: "";
		width: 18px;
		height: 9px;
		border: solid 2px #fff;
		border-top: none;
		border-right: none;
		position: absolute;
		top: 3px;
		left: 3px;
		transform: rotate(-45deg);
		opacity: 0;
		transition: all 0.2s ease-out;
	}
	.checkbox_1:checked:after{
		opacity: 1;
	}
	.checkbox_1:checked:before{
		background: #014a75;
		border-radius: 50%!important;
	}
</style>
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">jazzcash file read</h4>
					
					
					<form method="POST" action="{{ route('jazzcash-file-read.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						@csrf
						@component('_components.alerts-default')
						@endcomponent

					
						<div class="form-group row">
							<label for="deposite_date" class="col-sm-2 form-control-label">Date of file </label>
							<div class="col-sm-4">
								<div class="ui calendar" id="example1">
								  <div class="ui input left icon">
								    <i class="calendar icon"></i>
								    <input type="text" class="form-control deposite_date" value="{{old('deposite_date')}}" name="deposite_date" id="deposite_date" autocomplete="off"  placeholder="deposite_date" >
								  </div>
								</div>

							</div>
							<label for="default-input-rounded" class="col-sm-2 form-control-label">File Input</label>
							<div class="col-sm-4">
								<label class="btn btn-primary ks-btn-file">
									<span class="la la-cloud-upload ks-icon"></span>
									<span class="ks-text">Choose file</span>
									<input type="file" name="mis">
								</label>
								
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

	<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />

	<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>

	<script>
		var today = new Date();
		$('#example12').calendar({
			monthFirst: false,
			type: 'date',
			minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
		});
		$('#example1').calendar({
			monthFirst: false,
			type: 'date',
			minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
		});

		

	</script>

	@endpush