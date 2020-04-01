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
					<form method="POST" action="{{ route('feepost.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						{{ csrf_field() }}


						<div class="form-group row">
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">Select Branch </label>
							<input type="hidden" name="branch" class="branch">
							<div class="col-sm-4">
								<select  class=" branch_id" id="branch_id" onchange="getClass(this)"   name="branch_id"  placeholder="branch_id" style="height: 40px; width: 100%;">

									<option selected="selected" disabled="disabled">Seclect Branch</option>
									@if(!empty($branches))
									@foreach($branches as $branch)
									<option value={{$branch['id']}} @if($branch['id']==old('branch_id')){{'checked'}} @endif>{{$branch['branch_name']}}</option>
									@endforeach
									@endif
								</select>
								@if ($errors->has('branch_id'))
								<label id="branch_id-error" class="error" for="branch_id">
									{{$errors->first('branch_id')}}
								</label>
								@endif
							</div>
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">Outstanding </label>


							<div class="col-sm-4">
								<select id="input-group-icon-email" name="outType" type="text" class="form-control" placeholder="">
									<option selected="selected" value="0"> with outstanding</option>
									<option  value='1'>Without outstanding</option>

								</select>

							</div>


						</div>
						<div class="form-group row">
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">First Due Date </label>
							<div class="col-sm-4">
								<input type="text" class="form-control fee_due_date1" value="{{old('fee_due_date1')}}" name="fee_due_date1" id="fee_due_date1" autocomplete="off"  placeholder="fee_due_date1" readonly>


								@if ($errors->has('fee_due_date1'))
								<label id="fee_due_date1-error" class="error" for="fee_due_date1">
									{{$errors->first('fee_due_date1')}}
								</label>
								@endif
							</div>
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">Red Due Date </label>
							<div class="col-sm-4">

								<input type="text" class="form-control fee_due_date2" value="{{old('fee_due_date2')}}" name="fee_due_date2" id="fee_due_date2" autocomplete="off"  placeholder="Date" readonly>

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
									<option  value='1'@if(date('m')==1){{'selected'}}@endif>Janaury</option>
									<option value='2' @if(date('m')==2){{'selected'}}@endif>February</option>
									<option value='3' @if(date('m')==3){{'selected'}}@endif>March</option>
									<option value='4' @if(date('m')==4){{'selected'}}@endif>April</option>
									<option value='5' @if(date('m')==5){{'selected'}}@endif>May</option>
									<option value='6' @if(date('m')==6){{'selected'}}@endif>June</option>
									<option value='7' @if(date('m')==7){{'selected'}}@endif>July</option>
									<option value='8' @if(date('m')==8){{'selected'}}@endif>August</option>
									<option value='9' @if(date('m')==9){{'selected'}}@endif>September</option>
									<option value='10'@if(date('m')==10){{'selected'}}@endif>October</option>
									<option value='11'@if(date('m')==11){{'selected'}}@endif>November</option>
									<option value='12'@if(date('m')==12){{'selected'}}@endif>December</option>
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
						<div class="form-group row discountgivenDiv" > 
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">Discount %</label>
							<div class="col-sm-4">
								<input type="number" name="discount" class="form-control"  step="any" min="0" max="100" value="0">
								@if ($errors->has('discount'))
								<label id="discount-error" class="error" for="discount">
									{{$errors->first('discount')}}
								</label>
								@endif
							</div>
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">Discount Reason </label>
							<div class="col-sm-4">
								<input type="text" name="discount_description" class="form-control"  value="" >
								@if ($errors->has('year'))
								<label id="year-error" class="error" for="year">
									{{$errors->first('year')}}
								</label>
								@endif


							</div>
						</div>
						<style type="text/css">




/********************Button 1*******************/
.box-1
{
  width:60px;
  height:20px;
  background: rgb(1, 42, 124);
  position:relative;
  margin-bottom:20px;
}

.box-1 input{
  position:absolute;
  width:100%;
  height:100%;
  cursor:pointer;
  opacity:0;

}

.box-1 .toogle{
  display:block;
  position:absolute;
 
  width:30px;
  height:100%;
  background: #ff3a3a;
  top:0;
  box-shadow:0px 0px 3px rgb(50,50,50) inset;
  -webkit-transition: all 0.2s ease;
	-moz-transition: all 0.2s ease;
  -ms-transition: all 0.2s ease;
  -o-transition: all 0.2s ease;
	transition: all 0.2s ease;
  text-align:center;
}
.box-1 .toogle:before{
  content:"OFF";
  color: #fff;
  text-shadow: 1px 1px #000;
  font-family:tahoma;
  font-size: 11px;
}

.box-1 input:checked ~ .toogle{
  margin-left:30px;
}
.box-1 input:checked + .toogle:before{
  content:"ON";
}
						</style>
						<div class="table-responsive">
							<table id="example" class="table border table-bordered ">
								<thead>
									<tr><th></th>
										<th>Class</th>
										<th>Tution Fee</th>
										<th>Comp Fee</th>
										<th>Stat</th>
										<th>AC</th>
										<th>Lab</th>
										<th>Exam</th>
										<th>Lib</th>

										<th>Misc 1 Desc</th>
										<th>Misc 1 amount</th>
										<th>Misc 2 Desc</th>
										<th>Misc 2 amount</th>
									</tr>
								</thead>
								<tbody id="feepostClasses">

								</tbody>

							</table>
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



	@endpush
	@push('post-scripts')

	<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-font.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker.css')}}" />

	<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-ios.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-android.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-windows.css')}}" /> 

	<!-- <script type="text/javascript" src="{{asset('js/datepickerScroll/vendors/jquery-1.11.1.min.js')}}"></script> -->
	<script type="text/javascript" src="{{asset('js/datepickerScroll/src/anypicker.js')}}"></script>

	<script type="text/javascript">




		$(".fee_due_date1").AnyPicker({
			mode: "datetime",
			dateTimeFormat: " dd-MMM-yyyy",
		});
		$(".fee_due_date2").AnyPicker({
			mode: "datetime",
			dateTimeFormat: " dd-MMM-yyyy",
		});


	</script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script>
		function discountgiven(obj){
			$('.discountgivenDiv').css('display','block');
		}

		function getClass(obj){
			$("[name='class_id']").html(` <option selected="selected" value='0'> All Classes  </option>`);
			var branch_id  = $(".branch_id").val();
			console.log('branch',$("[name='branch_id']").val());
			$('.branch').val(branch_id);
			$("#feepostClasses").html('');
			$.ajax({
				method:"POST",
				url:"{{route('branchHasSectionStudent')}}",
				data : {id:branch_id},
				dataType:"json",
				success:function(res){
					if(res.status){
						var index=1;
						$("#feepostClasses").html('');
						res.data.forEach(function(val,ind){
							var id = val.id;
							var name = val.course_name;
							var option = `<option value="${id}">${name}</option>`;

							var htmlContent=`<tr><td>${index++}</td>
							<td>
							  <div class="box-1">
    <input type='checkbox' class="default" name="courses[]" value="${id}" checked/>
    <span class="toogle"></span>
  </div>
  
						${name}</td>
							<td>
							 <div class="box-1">
                             <input type='checkbox' class="default"  name="tution_${id}" value="1" checked=""/>
                             <span class="toogle"></span>
                             </div>
							</td>

							<td>
							 <div class="box-1">
                             <input type='checkbox' class="default"  name="comp_${id}" value="1" />
                             <span class="toogle"></span>
                             </div>
							</td>
							<td>
							 <div class="box-1">
                             <input type='checkbox' class="default"  name="stat_${id}" value="1" />
                             <span class="toogle"></span>
                             </div>
							</td>
							<td>
								 <div class="box-1">
                             <input type='checkbox' class="default"  name="ac_${id}" value="1" />
                             <span class="toogle"></span>
                             </div>
							</td>
							<td>
									 <div class="box-1">
                             <input type='checkbox' class="default"  name="lab_${id}" value="1" />
                             <span class="toogle"></span>
                             </div>
							</td>
							<td>
									 <div class="box-1">
                             <input type='checkbox' class="default"  name="exam_${id}" value="1" />
                             <span class="toogle"></span>
                             </div>
							</td>
							<td>
							 <div class="box-1">
                             <input type='checkbox' class="default"   name="lib_${id}" value="1" />
                             <span class="toogle"></span>
                             </div>
							</td>
							<td><input type="text" name="misc1_desc_${id}" style="max-width: 60px"></td>
							<td><input type="number" name="misc1_amount__${id}" step="any" style="max-width: 60px"></td>
							<td><input type="text" name="misc2_desc_${id}" style="max-width: 60px"></td>
							<td><input type="number" name="misc2_amount__${id}" step="any" style="max-width: 60px"></td>

							</tr>`;
							$("#feepostClasses").append(htmlContent);
						});
					}
					
				}
			});

		}

	</script>

	@endpush