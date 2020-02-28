@extends('_layouts.admin.default')
@section('title', 'Manual Fee Deposit')
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
					<h4 class="card-title"> Manual Fee Deposit</h4>
					
					
					<form method="POST" action="{{ route('manual-fee-deposit.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						@csrf
						@component('_components.alerts-default')
						@endcomponent

						@if(Session::has('alreadyUploaded'))
						<div class="alert alert-danger" role="alert">
							@foreach(Session::get('alreadyUploaded') as $key)
							@foreach($key as $val)
							<div>
								<strong>Transaction:@isset($val->transactionId){{$val->transactionId}}@endisset</strong>  @isset($val->message){{ $val->message }}@endisset
							</div>
							@endforeach

							@endforeach
							@php(Session::forget('alreadyUploaded'))
						</div>
						@endif
						<div class="form-group row">
							<!-- <label for="input-group-icon-email" class="col-sm-2 form-control-label">Worksheet Name</label>
							<div class="col-sm-4">
								<input id="input-group-icon-email" name='name' value="{{old('name')}}" type="text" class="form-control" placeholder="Worksheet Name">
							</div> -->
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">Std Id</label>
							<div class="col-sm-4">
								<input id="input-group-icon" type="text" name="std_id" value="{{old('std_id')?old('std_id'):''}}"  class="form-control" placeholder="">
								@if ($errors->has('std_id'))
								<div class="alert alert-danger">
									<p>{{$errors->first('std_id')}}</p>
								</div>
								@endif

							</div>
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">Fee ID </label>
							<div class="col-sm-4">
								<input id="input-group-icon-email" value="{{old('feeId')?old('feeId'):''}}"  type="text" name="feeId" class="form-control" placeholder="">
							</div>

						</div>
						<div class="form-group row">
							
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">Amount</label>
							<div class="col-sm-4">
								<input id="input-group-icon" value="{{old('amount')?old('amount'):''}}"  type="number" name="amount" class="form-control" placeholder="">
								@if ($errors->has('amount'))
								<div class="alert alert-danger">
									<p>{{$errors->first('amount')}}</p>
								</div>
								@endif
							</div>
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">Deposit Date</label>

							<div class="col-md-4">
								<input type="text" readonly="" class="form-control deposit_date" value="{{old('deposit_date')}}" name="deposit_date" id="deposit_date" placeholder="">

								
								@if ($errors->has('bank'))
								<div class="alert alert-danger">
									<p>{{$errors->first('bank')}}</p>
								</div>
								@endif

							</div>
						</div>
							
						<div class="form-group row">
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">Month</label>
							<div class="col-sm-4">
								<select id="input-group-icon-email" name="month" type="text" class="form-control" placeholder="">
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
							<label for="input-group-icon-email" class="col-sm-2 form-control-label">Year</label>
							<div class="col-sm-4">
								<select id="input-group-icon" name="year" type="text" class="form-control" placeholder="">
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
						
						


						<div class="form-group row">

							<div class="card" style="width:100%">
								<div class="card-block">
									<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
										<button type="submit" class="btn btn-primary ks-rounded"> Submit </button>
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
	
	
<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-font.css')}}" />
			<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker.css')}}" />

			<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-ios.css')}}" />
			<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-android.css')}}" />
			<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-windows.css')}}" /> 

			<!-- <script type="text/javascript" src="{{asset('js/datepickerScroll/vendors/jquery-1.11.1.min.js')}}"></script> -->
			<script type="text/javascript" src="{{asset('js/datepickerScroll/src/anypicker.js')}}"></script>

			<script type="text/javascript">

				$("#deposit_date").AnyPicker({
					mode: "datetime",
					dateTimeFormat: " dd-MMM-yyyy",
				});
				$("#posting_date").AnyPicker({
					mode: "datetime",
					dateTimeFormat: " dd-MMM-yyyy",
				});


			</script>
	@endpush