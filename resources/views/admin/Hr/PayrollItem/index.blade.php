@extends('_layouts.admin.default')
@section('title', 'Pay-roll Item')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<h4 class="card-title">Pay-roll Item</h4>
			<div class="card-box">
				<div class="card-block">
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('payroll-item.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}
							
							<div class=" form-group row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="pf">Profident Fund %</label>
										<input  class="form-control pf" min="0" max="100" id="pf" value="@isset($PayrollItem->pf){{$PayrollItem->pf}} @endisset"   name="pf"  placeholder="0">
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="eobi">EOBI %</label>
										<input  class="form-control eobi" min="0" max="100" value="@isset($PayrollItem->eobi) {{$PayrollItem->eobi}} @endisset"  name="eobi"  placeholder="0"> 
									</div>
								</div>
							</div>


							<div class=" form-group row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="description">Description </label>
										<textarea type="number" class="form-control description" id="description" value=""   name="description"  placeholder="0">@isset($PayrollItem->description){{ $PayrollItem->description}} @endisset</textarea> 
									</div>
								</div>

							
								
							</div>
							


							
							
							
							<div class="form-group row">
								<div class="card" style="width:100%">
									<div class="card-block">
										<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
											<button class="btn btn-primary ks-rounded"> Update </button>
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