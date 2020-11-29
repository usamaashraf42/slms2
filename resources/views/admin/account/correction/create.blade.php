@extends('_layouts.admin.default')
@section('title', 'Correction')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Correction</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('correction.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}
							<input type="hidden" name="feeId" class="feeId">

							<div class="form-group row">
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Month</label>
								<div class="col-sm-4">
									<select id="input-group-icon-email" name="month" type="text" class="form-control month" placeholder="">
										<option selected="selected" value="0">-- Month--</option>
										<option  value='1' >Janaury</option>
										<option value='2' >February</option>
										<option value='3' >March</option>
										<option value='4' >April</option>
										<option value='5' >May</option>
										<option value='6' >June</option>
										<option value='7' >July</option>
										<option value='8' >August</option>
										<option value='9' >September</option>
										<option value='10' >October</option>
										<option value='11' selected>November</option>
										<option value='12' >December</option>
									</select>
									<div class="alert alert-danger month-error" style="display:none">
										<p style="color: red">Month is required</p>
									</div>
								</div>
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Year</label>
								<div class="col-sm-4">
									<select id="input-group-icon" name="year" type="text" class="form-control year" placeholder="">
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
									<div class="alert alert-danger year-error" style="display:none">
										<p style="color: red">Year is required</p>
									</div>


								</div>
							</div>
							<div class="form-group row">
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Std_id</label>
								<div class="col-sm-4">
									<input id="input-group-icon-email" name='ly_no' type="text" class="form-control ly_no" placeholder="Student id">
								</div>
								<div class="alert alert-danger ly_no-error" style="display:none">
									<p style="color: red">Student Id is required</p>
								</div>

								<div class="col-sm-4">
									<label for="input-group-icon-email" class="col-sm-2 form-control-label"></label>
									<a class="btn btn-primary" href="javascript:;" style="" onclick="approveRequest()">Search</a>
								</div>


							</div>
							<div class="form-group row">
								<label for="input-group-icon-email" class="col-sm-2 form-control-label ">Student Name</label>
								<div class="col-sm-4">
									<input id="input-group-icon-email stdName" name="stdName" type="text" class="form-control stdName" placeholder="" readonly>
								</div>
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Outstanding Amount</label>
								<div class="col-sm-4">
									<input id="input-group-icon" value=""  type="text" name="outstandingAmount" class="form-control outstandingAmount" placeholder="" readonly>


								</div>
							</div>
							<div class="form-group row">
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Fine</label>
								<div class="col-sm-4">
									<input id="input-group-icon-email" value=""  type="text" name="fine" class="form-control stdFine" placeholder="" readonly> 
								</div>
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Fee</label>
								<div class="col-sm-4">
									<input id="input-group-icon" type="text" name="fee" class="form-control feeAmount" placeholder="" readonly>

								</div>
							</div>
							<div class="form-group row">
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Posted Fee</label>
								<div class="col-sm-4">
									<input id="input-group-icon-email" name="totalPayable" type="text" class="form-control totalPayable" placeholder="" readonly>
								</div>
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Correction Amount</label>
								<div class="col-sm-2">
									<input id="input-group-icon-email" name="correctionAmount" value="0" type="text" class="form-control correctionAmount" placeholder="">

								</div>

								<div class="col-sm-2">
									<input id="input-group-icon-email" name="afterCorrection" value="0" type="text" class="form-control afterCorrection" placeholder="">

								</div>
							</div>
							<div class="form-group row">

								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Total Amount To payable</label>
								<div class="col-sm-4">
									<input id="input-group-icon-email" name="totalInstallment" type="text" class="form-control totalpayable" placeholder="" readonly>
								</div>


								


								<label for="input-group-icon-email" class="col-sm-2 form-control-label"> Due Date</label>
								<div class="col-sm-4">
									<div class="ui calendar" id="example12">
										<div class="ui input" style="width: -webkit-fill-available!important;">
											<input type="text" class="form-control" value="{{old('due_date')}}" name="due_date" id="due_date" autocomplete="off"  placeholder="due_date" readonly>
										</div>
									</div>
									@if ($errors->has('due_date'))
									<label id="due_date-error" class="error" for="due_date">
										{{$errors->first('due_date')}}
									</label>
									@endif
								</div>
							</div>
							<div class="form-group row">

							


								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Total Installment</label>
								<div class="col-sm-4">
									<input id="input-group-icon-email" name="totalInstallment" type="text" class="form-control totalInstallment" placeholder="" readonly>
								</div>



								
							</div>


							<!-- <div class="form-group row">
								<label for="deffered" class="col-sm-2 form-control-label">Deferred Amount</label>
								<div class="col-sm-4">
									<input id="deffered" name="deffered" type="number" value="0" min="0" class="form-control " placeholder="" >
								</div>
							</div>
							 -->

							<div class="form-group row correctionDescription" >
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Remarks</label>
								<div class="col-sm-4">
									<textarea id="input-group-icon-email" value="" name="correctionRemarks" type="text" class="form-control correctionRemarks" rows="3" placeholder="" required></textarea>
								</div>

							</div>



							<div class="form-group row">


								<div class="card" style="width:100%">
									<div class="card-block">
										<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
											<input class="btn btn-primary ks-rounded" onclick="submitForm(this);" value="Submit"> </button>
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
<script>
    function submitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form    
        btn.form.submit();
    }
</script>
		<script type="text/javascript">
	function show(obj){
		console.log('value',$(obj).val());
		var radioValue = $("input[name='reason']:checked").attr('data-content');
		console.log(radioValue);
		if(radioValue=='Add Some Reason'){
			$('.correctionDescription').show();
		}else{
			$('.correctionDescription').css({"display": "none"});
		}
	}
	$('.correctionAmount').on('keyup',function(e){
		console.log('this');
		var val1=parseFloat($('.correctionAmount').val());
		var val2=parseFloat($('.totalPayable').val());
		$('.afterCorrection').val(val2-val1);

	});
	function approveRequest(){
		var ly_no=$('.ly_no').val();
		var month=$('.month').val();
		var year=$('.year').val();
		if(ly_no!=null){
			console.log('ly_no',ly_no);
         $.ajax({
            url: "{{route('correctionStudentCorrection')}}", 
            method:"POST",
            data:{'id':ly_no,'month':month,'year':year},
            success: function(response){
            	console.log('ajax call',response);
              if(response.status){

                console.log('student name',response.data.student.s_name);
                $('.feeId').val(response.data.id);
                $('.stdName').val(response.data.student.s_name);
				$('.outstandingAmount').val(response.data.outstand_lastmonth);
				$('.stdFine').val(response.data.fine);
				$('.feeAmount').val(response.data.paid_amount);
				$('.totalPayable').val(response.data.total_fee);
				$('.totalInstallment').val(response.data.student.student_fee.installment_no);
				console.log('balance',response.data.student.balance);
				$('.totalpayable').val(response.data.student.balance.balance)
               
                
              }
              else{
                alert('Record Not Found');
              }
            }});
     }else{
     		if((ly_no==null )){
     			$('.ly_no-error').show();
     		}
     	}
		
      }
</script>



<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-font.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-ios.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-android.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-windows.css')}}" /> 

    <!-- <script type="text/javascript" src="{{asset('js/datepickerScroll/vendors/jquery-1.11.1.min.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('js/datepickerScroll/src/anypicker.js')}}"></script>

    <script type="text/javascript">
     
     $("#due_date").AnyPicker({
       mode: "datetime",
       dateTimeFormat: " dd-MMM-yyyy",
     });

    </script>


		@endpush