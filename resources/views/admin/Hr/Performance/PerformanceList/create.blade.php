@extends('_layouts.admin.default')
@section('title', 'performance-list')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Add New performance-list</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('performance-list.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						{{ csrf_field() }}

						<div class="row">
							
							<div class="col-md-12" style="margin-bottom: 20px;">
								<div class="row" style="margin: 10px 0px;">
									<div class="col-md-4">
										<label class="control-label"> Select Employee</label>
										<select  class=" form-control employee_id"  name="employee_id" id="employee_id">
											<option value="0">All Employee</option>
										</select>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="select2">Month</label>
											<select type="text" class="form-control month" id="month"   name="month">
												<option selected="selected" value="0">--Select Month--</option>
												<option  value='1' @if(date('m')==1){{'selected'}}@endif>Janaury</option>
												<option value='2' @if(date('m')==2){{'selected'}}@endif>February</option>
												<option value='3' @if(date('m')==3){{'selected'}}@endif>March</option>
												<option value='4' @if(date('m')==4){{'selected'}}@endif>April</option>
												<option value='5' @if(date('m')==5){{'selected'}}@endif>May</option>
												<option value='6' @if(date('m')==6){{'selected'}}@endif>June</option>
												<option value='7' @if(date('m')==7){{'selected'}}@endif>July</option>
												<option value='8' @if(date('m')==8){{'selected'}}@endif>August</option>
												<option value='9' @if(date('m')==9){{'selected'}}@endif>September</option>
												<option value='10' @if(date('m')==10){{'selected'}}@endif>October</option>
												<option value='11' @if(date('m')==11){{'selected'}}@endif>November</option>
												<option value='12' @if(date('m')==12){{'selected'}}@endif>December</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="select2">Years</label>
											<select type="text" class="form-control year" id="year"   name="year"  placeholder="Student Name">
												<option selected="selected" disabled="disabled">--Select Year--</option>
												<option value="2024" @if(date('Y')==2024){{'selected'}}@endif>2024</option>
												<option value="2023" @if(date('Y')==2023){{'selected'}}@endif>2023</option>
												<option value="2022" @if(date('Y')==2022){{'selected'}}@endif>2022</option>
												<option value="2021" @if(date('Y')==2021){{'selected'}}@endif>2021</option>
												<option value="2020" @if(date('Y')==2020){{'selected'}}@endif>2020</option>
												<option value="2019" @if(date('Y')==2019){{'selected'}}@endif>2019</option>
												<option value="2018" @if(date('Y')==2018){{'selected'}}@endif>2018</option>
												<option value="2017" @if(date('Y')==2017){{'selected'}}@endif>2017</option>
												<option value="2016" @if(date('Y')==2016){{'selected'}}@endif>2016</option>
												<option value="2015" @if(date('Y')==2015){{'selected'}}@endif>2015</option>
												<option value="2014" >2014</option>
												<option value="2013" >2013</option>
												<option value="2012" >2012</option>
												<option value="2011" >2011</option>
												<option value="2010" >2010</option>
												<option value="2009" >2009</option>
												<option value="2008" >2008</option>
												<option value="2007" >2007</option>
												<option value="2006" >2006</option>
												<option value="2005" >2005</option>
												<option value="2004" >2004</option>
												<option value="2003" >2003</option>
												<option value="2002" >2002</option>
												<option value="2001" >2001</option>
												<option value="2000" >2000</option>
											</select>
										</div>
									</div>
									


								</div>
								
								
								
								
							</div>
						</div>

						<div class="modal-footer">
							<!-- input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
							value="Reset">
						-->							<input type="submit" class="btn btn-outline-success btn-lg" id="addDataBtn"
						value="Submit">
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection

	@push('post-styles')

	@endpush

	@push('post-scripts')

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


	<script type="text/javascript">



		$('#employee_id').select2({
			ajax: {
				url: "{{route('get_employee')}}",
				method:"post",
				dataType: 'json',
				processResults: function (_data, params) {
					console.log('_data',_data);
					var data1= $.map(_data, function (obj) {
						var newobj = {};
						newobj.id = obj.id;
						newobj.text= `${obj.name} - (${obj.id}) `;
						return newobj;
					});
					return { results:data1};
				}
			}
		});

	</script>
	@endpush