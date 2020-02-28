@extends('_layouts.admin.default')
@section('title', 'Attendance')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">Attendance Management</h4>
					
					<form action="{{route('employee-attandance.store')}}" method="POST">
						@csrf

						@component('_components.alerts-default')
						@endcomponent

						<div class="row filter-row">
							<div class="col-sm-6 col-md-3">  
								<div class="form-group form-focus">
									<label for="branch_id">Select Branch</label>
									<select class="form-control-1 branch_id" name="branch_id" onchange="searchEmployee(this)"   id="branch_id"  style="height: 40px; width: 100%;">
										<option selected="selected" value="0">All Branches</option>
										@if(!empty($branches))
										@foreach($branches as $branch)
										<option value={{$branch['id']}}>{{$branch['branch_name']}}</option>
										@endforeach
										@endif
									</select>

								</div>
							</div>
							<div class="col-sm-6 col-md-3"> 
								<div class="form-group form-focus select-focus focused">
									<label class="focus-label">Month</label>
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
							<div class="col-sm-6 col-md-3"> 
								<div class="form-group form-focus select-focus focused">
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

							<div class="col-sm-6 col-md-3"> 
								<div class="form-group form-focus select-focus focused">
									<label for="account">Select Employee</label>
									<select type="text" class="category emp_id" value="{{old('emp_id')}}" onchange="searchEmployee(this)" name="emp_id" id="account" placeholder="cat_id" style="width: 100%;min-height: 40px;">
										<option disabled="disabled" selected>Seclect Employee</option>
									</select>



									
								</div>
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
	<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<style>
		@import url(https://fonts.googleapis.com/css?family=Numans);
		body {
			font-family: 'Numans', sans-serif;
		}
		.holder {
			position:fixed;
			top:50%;
			left:50%;
			transform: translate(-50%,-50%);
		}
		.checkdiv {

			position: relative;
			padding: 4px 8px;
			border-radius:40px;
			margin-bottom:4px;
			min-height:30px;
			padding-left:40px;
			display: flex;
			align-items: center;
		}
		.checkdiv:last-child {
			margin-bottom:0px;
		}
		.checkdiv span {
			position: relative;
			vertical-align: middle;
			line-height: normal;
		}
		.le-checkbox {

			appearance: none;
			position: absolute;
			top:50%;
			left:5px;
			transform:translateY(-50%);
			background-color: #F44336;
			width:30px;
			height:30px;
			border-radius:40px;
			margin:0px;
			outline: none; 
			transition:background-color .5s;
		}
		.le-checkbox:before {
			content:'';
			position: absolute;
			top:50%;
			left:50%;
			transform:translate(-50%,-50%) rotate(45deg);
			background-color:#ff3131;
			width:20px;
			height:5px;
			border-radius:40px;
			transition:all .5s;
		}

		.le-checkbox:after {
			content:'';
			position: absolute;
			top:50%;
			left:50%;
			transform:translate(-50%,-50%) rotate(-45deg);
			background-color:#ff3131;
			width:20px;
			height:5px;
			border-radius:40px;
			transition:all .5s;
		}
		.le-checkbox:checked {
			background-color:#4CAF50;
		}
		.le-checkbox:checked:before {
			content: '';
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%) translate(-4px,3px) rotate(45deg);
			background-color: #009821;
			width: 9px;
			height: 5px;
			border-radius: 40px;
		}

		.le-checkbox:checked:after {
			content: '';
			position: absolute;
			top: 36%;
			left: 51%;
			transform: translate(-50%,-50%) translate(3px,2px) rotate(-45deg);
			background-color: #009821;
			width: 16px;
			height: -1px;
			border-radius: 20px;
		}
	</style>
	@endpush
	@push('post-scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$(".text-success").click(function () {    
				if($(this).hasClass("text-success"))
				{
					$(this).addClass("text-danger");
					$(this).removeClass(".text-success");
				}
				else{
					$(this).addClass("text-success");
					$(this).removeClass("text-danger");
				}
			});

		});

		function searchEmployee(obj){
			var emp_id=$('.emp_id').val();
			var branch_id=$('.branch_id').val();
			$('#account').select2({
				ajax: {
					url: "{{route('get_employee')}}",
					method:"post",
					data:{emp_id:emp_id,branch_id:branch_id},
					dataType: 'json',
					processResults: function (_data, params) {
						console.log('_data',_data);
						var data1= $.map(_data, function (obj) {
							var newobj = {};
							newobj.id = obj.emp_id;
							newobj.text= `${obj.name} - (${obj.emp_id}) `;
							return newobj;
						});
						return { results:data1};
					}
				}
			});
		}

		searchEmployee('od');
		var emp_id=$('.emp_id').val();
		var branch_id=$('.branch_id').val();
		$('#account').select2({
			ajax: {
				url: "{{route('get_employee')}}",
				method:"post",
				dataType: 'json',
				processResults: function (_data, params) {
					console.log('_data',_data);
					var data1= $.map(_data, function (obj) {
						var newobj = {};
						newobj.id = obj.emp_id;
						newobj.text= `${obj.name} - (${obj.emp_id}) `;
						return newobj;
					});
					return { results:data1};
				}
			}
		});
	</script>

	@endpush