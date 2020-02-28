@extends('_layouts.admin.default')
@section('title', 'Fee Post')
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
					<h4 class="card-title">Fee Post</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('individual-feepost.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						{{ csrf_field() }}
				

							<div class="form-group row">
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Std Id </label>
								<input type="hidden" name="branch" class="branch">
								<div class="col-sm-4">
									<input  class=" std_id" id="std_id"   name="std_id"  placeholder="std_id" style="height: 40px; width: 100%;">

									@if ($errors->has('std_id'))
									<label id="std_id-error" class="error" for="std_id">
										{{$errors->first('std_id')}}
									 </label>
									@endif
								</div>
								

							</div>
							<div class="form-group row">
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">First Due Date </label>
								<div class="col-sm-4">
									<div class="ui calendar" id="example12" style="width: 100%">
										<div class="ui input" style="width: -webkit-fill-available!important;">
											<input type="text" class="form-control" value="{{old('fee_due_date1')}}" name="fee_due_date1" id="fee_due_date1" autocomplete="off"  placeholder="fee_due_date1">
										</div>
									</div>
									@if ($errors->has('fee_due_date1'))
									<label id="fee_due_date1-error" class="error" for="fee_due_date1">
										{{$errors->first('fee_due_date1')}}
									 </label>
									@endif
								</div>
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Red Due Date </label>
								<div class="col-sm-4">
									<div class="ui calendar" id="example1" style="width: 100%">
										<div class="ui input" style="width: -webkit-fill-available!important;">
											<input type="text" class="form-control" value="{{old('fee_due_date2')}}" name="fee_due_date2" id="fee_due_date2" autocomplete="off"  placeholder="Date">
										</div>
									</div>
									@if ($errors->has('fee_due_date2'))
									<label id="fee_due_date2-error" class="error" for="fee_due_date2">
										{{$errors->first('fee_due_date2')}}
									 </label>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Month </label>
								<div class="col-sm-4">
									<select id="input-group-icon-email" name="month" type="text" class="form-control" placeholder="">
										<option selected="selected" value="0">-- Month--</option>
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
									@if ($errors->has('month'))
									<label id="month-error" class="error" for="month">
										{{$errors->first('month')}}
									 </label>
									@endif
								</div>
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Year </label>
								<div class="col-sm-4">
									<select id="input-group-icon" name="year" type="text" class="form-control" placeholder="">
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
									@if ($errors->has('year'))
									<label id="year-error" class="error" for="year">
										{{$errors->first('year')}}
									 </label>
									@endif


								</div>
							</div>
							<div class=" form-group row">
								<label for="misc1_desc" class="col-sm-2 form-control-label">Misc 1 Desc </label>
								<div class="col-sm-4">
									<input type="text" class="form-control misc1_desc" id="misc1_desc" value="{{old('misc1_desc')}}"   name="misc1_desc"  placeholder="Misc 1 description">
								</div>
								<label for="misc1" class="col-sm-2 form-control-label">Misc 1 amount </label>
								<div class="col-sm-4">
									<input type="number" class="form-control misc1" value="{{old('misc1')}}"  name="misc1"  placeholder="Misc 2 amount"> 
								</div>
							</div>
							<div class=" form-group row">
								<label for="misc2_desc" class="col-sm-2 form-control-label">Misc 2 Desc </label>
								<div class="col-sm-4">
									<input type="text" class="form-control ly_no" id="misc2_desc" value="{{old('misc2_desc')}}"  name="misc2_desc"  placeholder="Misc 1 amount">
								</div>
								<label for="misc2" class="col-sm-2 form-control-label">Misc 2 amount </label>
								<div class="col-sm-4">
									<input type="number" class="form-control ly_no" value="{{old('misc2')}}"  name="misc2"  placeholder="Misc 2 amount"> 
								</div>
							</div>
							<div class="form-group row">
								<label for="fine_per_day" class="col-sm-2 form-control-label">Fine /Day </label>
								<div class="col-sm-4">
									<input type="number" class="form-control fine/day"  value="{{old('fine_per_day')}}"  name="fine_per_day"  placeholder="Fine/day"> 
									@if ($errors->has('fine_per_day'))
									<label id="fine_per_day-error" class="error" for="fine_per_day">
										{{$errors->first('fine_per_day')}}
									 </label>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-2 form-control-label">Fee Configuration </label>					
								<div class="col-sm-2">
									<div class="checkbox">
								<input type="checkbox" class="checkbox_1" id="tutionFee" name="tutionFee" value="1"> 		<label for="tutionFee"> Tution Fee </label>
									</div>
								</div>

								<div class="col-sm-2">
									<div class="checkbox">
									<input type="checkbox" class="checkbox_1" name="schFee" value="1"> 	<label for="schFee"> Scholarship Fee </label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
										<input type="checkbox" class="checkbox_1" name="compFee" value="1">  <label for="compFee">Computer Fee </label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
										<input type="checkbox" class="checkbox_1" name="statFee" value="1"> <label for="statFee">  Stationary Fee </label>
									</div>
								</div>
								<div class="col-sm-2">
								</div>
								<div class="col-sm-2">
								</div>

								<div class="col-sm-2">
									<div class="checkbox">
										<input type="checkbox" class="checkbox_1" name="acFee" value="1"> <label for="acFee">  AC Fee </label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
									<input type="checkbox" class="checkbox_1" name="labFee" value="1"> 	<label for="labFee"> Lab Fee </label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
										<input type="checkbox" class="checkbox_1" name="examFee" value="1">  <label for="examFee"> Exam Fee </label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
										<input type="checkbox" class="checkbox_1" name="libFee" value="1"> <label for="libFee">  Lib Fee </label>
									</div>
								</div>
								<div class="col-sm-1"></div>
							</div>
							<div class="form-group row">
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Outstanding </label>
								<div class="col-sm-4">
									<select id="input-group-icon-email" name="outType" type="text" class="form-control" placeholder="">
										<option selected="selected" value="0"> with outstanding</option>
										<option  value='1'>Without outstanding</option>

									</select>

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

	 function getClass(obj){
	 	$("[name='class_id']").html(` <option selected="selected" value='0'> All Classes  </option>`);
	 	var branch_id  = $(".branch_id").val();
	 	console.log('branch',$("[name='branch_id']").val());
	 	$('.branch').val(branch_id);
	 	$.ajax({
	 		method:"POST",
	 		url:"{{route('branchHasClass')}}",
	 		data : {id:branch_id},
	 		dataType:"json",
	 		success:function(data){
	 			data.forEach(function(val,ind){
	 				var id = val.course.id;
	 				var name = val.course.course_name;
	 				var option = `<option value="${id}">${name}</option>`;
	 				$("[name='class_id']").append(option);
	 			});
	 			$('.class_id').select2();
	 		}
	 	});
  
    }

</script>

		@endpush