<!DOCTYPE html>
<html>
<head>
	<title> Challan</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		.box{
			width:600px;
			margin:0 auto;
		}
	</style>
</head>
<body>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">

			@if(isset($feeArray) && count($feeArray))

			
			<div class="col-md-12">


			</div>
			<br><br>
			<div id="printAllRecord" style="height: 1000px;">


				@foreach($feeArray as $data)

				

				<section class="Report">


					<div  id="DivIdToPrint{{$data->id}}" >
						<style>
							table,th,td{
								font-size: 13px;padding: 1px  2px;
							}
						</style>
						<br>





						@php($feeFactor=$data->fee_factor?$data->fee_factor:(isset($data->student->studentFee['m'.$month])?$data->student->studentFee['m'.$month]:0))

						@php($feeMonth=$data->fee_this_month?$data->fee_this_month:(isset($data->current_fee)?(round(($data->current_fee))):0))

						<div class="main_div page" style="max-height: 1000px;">
							<div style="border: 1px solid;padding: 5px;margin-top: -25px;margin-right: 10px;max-height: 100px; width: 98%">
								<span style="margin-left:100px;font-size: 20px"><b >@if(isset($record->userSetting->school_name) && $record->userSetting->school_name){{$record->userSetting->school_name}} @else{{(' American Lyceum International School')}}@endif</b></span>
								<i style="float: right">@if(isset($data['fee_month'])){{getMonthName($data['fee_month'])}} @endisset/@if(isset($data['fee_year'])){{$data['fee_year']}}@else{{''}}@endif</i>
								<br>

								@if(isset($record->userBank) && count(($record->userBank)))
								@foreach($record->userBank as $banks)
								@isset($banks->bank->bank_name)<b style="">{{$banks->bank->bank_name}}</b> ,@endisset
								@endforeach

								<br>
								<i style="float: right">{{$record->branch_name}}</i>
								<b style="text-align: right">&nbsp;&nbsp;&nbsp; </b>
								@else
								<b style="">MCB</b>,<b style="margin-left: 0px">UBl Omni</b>,<b style="margin-left: 5px">HBL Konnect, Alfalah </b><br>
								<i style="float: right">{{$record->branch_name}}</i>
								<b style="text-align: right">Credit MCB Bank Ltd:AC#4011076351010132 </b>
								@endif



							</div>
							<div style="border: 1px solid;padding: 5px;margin-top: 2px;margin-right: 10px;max-height: 120px; width: 98%;">
								<b>{{$data->s_name}}</b>
								<b>&nbsp;&nbsp;@if(isset($data->course->course_name)){{$data->course->course_name}} @endif</b><i style="float: right"></i><i style="float: right">Student Copy</i>&nbsp;&nbsp;&nbsp; <i> ID#@if(isset($data['id'])){{$data['id']}}@else {{000}} @endif</i>

							</div>
							<div style="border: 1px solid #000;padding-left:10px; width: 98%;">

								<div class="table_under_div">
									<div style="float:left; width: 59%;margin-top: 10px">
										<div style="border: 1px solid; width: 98%;" >
											<b style="margin-top: 20px;font-size:14px ;margin-left: 20px;"><span>Previous</span> <span>Payment</span> <span> History</span></b>
										</div>
										<table border=""  style="width: 98%;font-size: 14px;padding: 1px  2px;border-spacing:unset!important;     border-collapse: collapse!important;" >
											<tr>
												<th style="width: 130px;">Date</th>
												<th style="width: 320px; font-size: 10px;">Description</th>
												<th>Debit</th>
												<th>Credit</th>
												<th>Balance</th>

											</tr>
											@if(isset($data->student->account->ledger) && count($data->student->account->ledger)>0)
											@foreach($data->student->account->lengthLedger->sortBy('id') as $account)
											<tr>
												<td style="width: 130px;padding: 0px;">@if($account->posting_date){{date("d-M-y", strtotime($account->posting_date)) }}@else {{0}} @endif</td>
												<td style="padding: 0px; font-size: 10px;">@if($account->description){{substr($account->description, 0, 44)}}@else {{''}} @endif</td>
												<td style="padding: 0px;">@if($account->a_debit){{$account->a_debit}}@else {{0}} @endif</td>
												<td style="padding: 0px;">@if($account->a_credit){{$account->a_credit}}@else {{0}} @endif</td>
												<td style="padding: 0px;"> @if($account->balance){{$account->balance}}@else {{0}} @endif</td>
											</tr>
											@endforeach

											@endif

										</table>

										<div style="float: left; margin-top: 10px;">
											<div style="float: left; width: 300px;"> <br><strong>Due date  =  @if($data->outstand_lastmonth > 0)
												{{date("d-M-Y", strtotime($data['fee_due_date2']))}}
												@else
												{{date("d-M-Y", strtotime($data['fee_due_date1']))}}
											@endisset</strong> After due date bank must charge @if(isset($record->userSetting->currency) && $record->userSetting->currency){{$record->userSetting->currency}}@else{{(' Rs')}} @endif. @if(isset($record->userSetting->fine) && $record->userSetting->fine){{$record->userSetting->fine}}@else{{('40')}} @endif/- fine per day</div>
											<br>


											<i style="float: left">@if(isset($data['fee_month'])){{getMonthName($data['fee_month'])}} @endisset/@if(isset($data['fee_year'])){{$data['fee_year']}}@else{{''}}@endif</i>   
											<p style="float: right; ">&nbsp;&nbsp; Accounts contact(@if(isset($record->userSetting->acctant_no) && $record->userSetting->acctant_no >0) {{$record->userSetting->acctant_no}} @else 03464292920 @endif) </p><div><span> SID#@isset($data->id){{$data->id}}@endisset</span></div> 

										</div>
									</div>
									<div  style="max-height: 40%;">
										<div style=" float: right; margin-top: 2px;border: 1px solid;font-size: 13px; width: 37.50%;">
											<div >Annual Fee:  @if(isset($data->student->studentFee['annual_fee'])){{$data->student->studentFee['annual_fee']}}@else {{0}}  @endif : Total Installment :@if(isset($data->student->studentFee['installment_no'])){{$data->student->studentFee['installment_no']}}@else {{0}}@endif </div>
											<div> Annual Scholarship : @if(isset($data->student->studentFee['scholarship_of'])){{$data->student->studentFee['scholarship_of']}}@else {{0}}@endif :Net Fee: @if(isset($data->student->studentFee['Net_AnnualFee'])){{$data->student->studentFee['Net_AnnualFee']}}@else {{0}}@endif </div>

											<div> Net Monthly : @if(isset($feeMonth)){{ round(($feeMonth)) }} @else {{0}}@endif </div>

										</div>
										<table border="" style="font-size: 13px; border-collapse: collapse!important; width: 38%; float: right;">


											<tr>
												<th>Description</th>
												<th>Amount</th>

											</tr>

											<tr>
												<td><i>Admission Fee</i>/<i>Registration</i></td>
												<td><i style="margin-left: 2px">@isset($data['admissionFee']){{$data['admissionFee']}}@endisset</i>/<i style="margin-left: 10px">@if(isset($data['registerationFee'])){{$data['registerationFee']}}@else{{0}}@endif</i></td>
											</tr>

											@if(isset($record->userSetting->securityFee)  || isset($record->userSetting->deffered))
											@if(($record->userSetting->securityFee)  || ($record->userSetting->deffered))
											<tr>
												<td>
													@if(isset($record->userSetting->securityFee) && ($record->userSetting->securityFee))<i style="margin-left: 10px">Security</i>/ @endif
													@if(isset($record->userSetting->deffered) && ($record->userSetting->deffered))<i style="margin-left: 10px">Deferred </i></td> @endif
													<td>
														@if(isset($record->userSetting->securityFee) && ($record->userSetting->securityFee))
														<i style="margin-left: 2px">@if(isset($data['sec_fee'])){{$data['sec_fee']}}@else{{0}}@endif</i>/
														@endif
														@if(isset($record->userSetting->deffered) && ($record->userSetting->deffered))
														<i style="margin-left: 10px">@if(isset($data['deffered_amount'])){{$data['deffered_amount']}}@else{{0}}@endif</i>@endif
													</td>

												</tr>
												@endif
												@endif
												@if(isset($record->userSetting->examFee))
												@if(($record->userSetting->examFee))
												<tr>
													<td>
														<i style="margin-left: 10px">Exam Fee</i><i style="margin-left: 10px"></i></td>
														{{--<td><i style="margin-left: 2px"></i><i style="margin-left: 5px"></i></td>--}}
														<td><i style="margin-left: 2px">@isset($data['examfee']){{$data['examfee']}}@endisset</i><i style="margin-left: 5px"></i></td>

													</tr>
													@endif
													@endif
													@if(isset($record->userSetting->compFee) || isset($record->userSetting->utitlity))
													@if(($record->userSetting->compFee) || ($record->userSetting->utitlity))
													<tr>
														<td>
															@if(isset($record->userSetting->compFee) && ($record->userSetting->compFee))  <i style="margin-left: 10px">Computer</i>/ @endif 
															@if(isset($record->userSetting->utitlity) && $record->userSetting->utitlity) <i style="margin-left: 10px">Utility</i> @endif
														</td>
														<td>
															@if(isset($record->userSetting->compFee) && $record->userSetting->compFee)
															<i style="margin-left: 2px">@isset($data['comp_fee']){{$data['comp_fee']}}@endisset</i>/ 
															@endif 
															@if(isset($record->userSetting->utitlity) && $record->userSetting->compFee)
															<i style="margin-left: 5px">@isset($data['utility_fee']){{$data['utility_fee']}}@endisset</i> 
															@endif
														</td>
													</tr>
													@endif
													@endif
													@if(isset($record->userSetting->StatFee) || isset($record->userSetting->labFee))
													@if(($record->userSetting->StatFee) || ($record->userSetting->labFee))
													<tr>
														<td>
															@if($record->userSetting->StatFee) 
															<i style="margin-left: 10px">Stationery</i>/
															@endif
															@if($record->userSetting->labFee) 
															<i style="margin-left: 10px">Science Lab</i>
															@endif
														</td>
														<td>
															@if($record->userSetting->StatFee) 
															<i style="margin-left: 2px">@isset($data['statfee']){{$data['statfee']}}@endisset</i>/
															@endif
															@if($record->userSetting->labFee)
															<i style="margin-left: 2px">@isset($data['statfee']){{$data['labfee']}}@endisset</i>
															@endif
														</td>
													</tr>
													@endif
													@endif
													@if(isset($record->userSetting->transportCharge) || isset($record->userSetting->acCharge))
													@if(($record->userSetting->transportCharge) || ($record->userSetting->acCharge))
													<tr>
														<td>
															@if($record->userSetting->transportCharge) 
															<i style="margin-left: 10px">Transport</i>/
															@endif
															@if($record->userSetting->acCharge) 
															<i style="margin-left: 10px">AC Charge</i>
															@endif
														</td>
														<td>
															@if($record->userSetting->transportCharge) 
															<i style="margin-left: 2px">@isset($data['transport_fee']){{$data['transport_fee']}}@endisset</i>/
															@endif
															@if($record->userSetting->acCharge) 
															<i style="margin-left: 2px">@isset($data['accharge']){{$data['accharge']}}@endisset</i>
															@endif
														</td>
													</tr>
													@endif
													@endif
													@if(isset($record->userSetting->summerPack) || isset($record->userSetting->Insurace))
													@if(($record->userSetting->summerPack) || ($record->userSetting->Insurace))
													<tr>
														<td>
															@if($record->userSetting->summerPack) 
															<i style="margin-left: 10px">Summer Pack</i>/
															@endif
															@if($record->userSetting->Insurace) 
															<i style="margin-left: 10px">Insurance</i>
															@endif
														</td>
														<td>
															@if($record->userSetting->summerPack)
															<i style="margin-left: 2px">@isset($data['libfee']){{$data['libfee']}}@endisset</i>/
															@endif
															@if($record->userSetting->Insurace)
															<i style="margin-left: 2px">@isset($data['insurance_of']){{$data['insurance_of']}}@endisset</i>
															@endif
														</td>
													</tr>
													@endif
													@endif

													@if(isset($record->userSetting->bookFee) || isset($record->userSetting->uniFee))
													@if(($record->userSetting->bookFee) || ($record->userSetting->uniFee))
													<tr>

														<td>
															@if($record->userSetting->bookFee) 
															<i style="margin-left: 10px">Books</i>/
															@endif
															@if($record->userSetting->uniFee) 
															<i style="margin-left: 10px">Uniform</i>
															@endif
														</td>
														<td>
															@if($record->userSetting->bookFee)
															<i style="margin-left: 2px">@isset($data['books_charges']){{$data['books_charges']}}@endisset</i>/
															@endif
															@if($record->userSetting->uniFee)
															<i style="margin-left: 2px">@isset($data['uniform']){{$data['uniform']}}@endisset</i>
															@endif
														</td>
													</tr>
													@endif
													@endif

													<tr>
														<td><i style="margin-left: 10px">@if(isset($data['misc1'])){{substr($data['misc1'], 0, 10)}}@else {{''}} @endif Misc1</i>/<i style="margin-left: 10px">Misc2</i></td>
														<td><i style="margin-left: 2px">@isset($data['misc1']){{$data['misc1']}}@endisset</i>/<i style="margin-left: 2px">@isset($data['misc2']){{$data['misc2']}}@endisset</i></td>
													</tr>





													<tr>
														<td><i style="margin-left: 10px">Installment @isset($data->student->studentFee['Net_AnnualFee']){{round(($data->student->studentFee['Net_AnnualFee']/12))}}@endisset*@isset($feeFactor){{$feeFactor}}@endisset</i><i style="margin-left: 10px"></i></td>
														<td><i style="margin-left: 2px">{{(isset($feeMonth)?(round(($feeMonth))):0)* (isset($feeFactor)?$feeFactor:0)}}</i><i style="margin-left: 2px"></i></td>
														{{--{{dd($data[$feeMonth'])}}--}}
													</tr>

													<tr>
														<td><i style="margin-left: 10px">Last Month Late deposit Fine</i><i style="margin-left: 2px"></i></td>
														<td><i style="margin-left: 2px">@isset($data['fine']){{$data['fine']}}@endisset</i><i style="margin-left: 2px"></i></td>
													</tr>





													<tr>
														<td><i style="margin-left: 10px"><b>This Month Total</b></i><i style="margin-left: 10px"></i></td>

														<td><i style="margin-left: 2px"></i>@isset($data['grand_totalPayThisMonth']){{round(($data['grand_totalPayThisMonth']-$data['outstand_lastmonth'] -$data['deffered_amount']))}}@endisset<i style="margin-left: 5px"></i></td>

													</tr>
													<tr>
														<td><i style="margin-left: 10px">Deffered from prev month ( + )</i><i style="margin-left: 10px"></i></td>
														<td><i style="margin-left: 2px"></i>@isset($data->outstand_lastmonth){{$data->outstand_lastmonth}}@endisset<i style="margin-left: 2px"></i></td>
													</tr>

													@if(isset($data->student->branch->userSetting->deffered) )
													<tr>
														<td><i style="margin-left: 10px"></i>deffer to next month ( - )<i style="margin-left: 10px"></i> </td>
														<td><i style="margin-left: 2px"></i> @if(isset($data['deffered_amount'])){{$data['deffered_amount']}}@else{{0}}@endif<i style="margin-left: 5px"></i></td>
													</tr>
													@endif






													<tr>
														<td><i style="margin-left: 10px"><b>Payable Before due date</b></i><i style="margin-left: 10px"></i></td>
														<td><i style="margin-left: 2px"><b>@isset($data['total_fee']){{$data['total_fee']}}@endisset</b></i><i style="margin-left: 2px"></i></td>
													</tr>

													<tr>
														<td><i style="margin-left: 10px">Fine or Late Deposit</i><i style="margin-left: 10px"></i></td>
														<td><i style="margin-left: 2px"></i><i style="margin-left: 2px"></i></td>
													</tr>

													<tr>
														<td><i style="margin-left: 10px">Total After Due date</i><i style="margin-left: 10px"></i></td>
														<td><i style="margin-left: 2px"></i><i style="margin-left: 2px"></i></td>
													</tr>

												</table>
											</div>

										</div>

									</div>
									<div style="clear: both;"></div>
									<div class="school" style="margin-bottom:50px;margin-top: 15px;">
										<div style="border: 1px solid;padding: 5px;margin-top: -8px;margin-right: 10px;max-height: 100px; width: 98%">
											<span style="margin-left:100px;font-size: 20px"><b >@if(isset($record->userSetting->school_name) && $record->userSetting->school_name){{$record->userSetting->school_name}} @else{{(' American Lyceum International School')}}@endif</b></span>
											<i style="float: right">@if(isset($data['fee_month'])){{getMonthName($data['fee_month'])}} @endisset/@if(isset($data['fee_year'])){{$data['fee_year']}}@else{{''}}@endif</i>
											<br>

											@if(isset($record->userBank) && count(($record->userBank)))
											@foreach($record->userBank as $banks)
											@isset($banks->bank->bank_name)<b style="">{{$banks->bank->bank_name}}</b> ,@endisset
											@endforeach

											<br>
											<i style="float: right">{{$record->branch_name}}</i>
											<b style="text-align: right">&nbsp;&nbsp;&nbsp; </b>
											@else
											<b style="">MCB</b>,<b style="margin-left: 0px">UBl Omni</b>,<b style="margin-left: 5px">HBL Konnect, Alfalah </b><br>
											<i style="float: right">{{$record->branch_name}}</i>
											<b style="text-align: right">Credit MCB Bank Ltd:AC#4011076351010132 </b>
											@endif



										</div>
										<div style="border: 1px solid;padding: 5px;margin-top: 2px;margin-right: 10px;max-height: 120px; width: 98%;">
											<b>{{$data->s_name}}</b>
											<b>&nbsp;&nbsp;@if(isset($data->course->course_name)){{$data->course->course_name}} @endif</b><i style="float: right"></i><i style="float: right">School Copy</i>&nbsp;&nbsp;&nbsp; <i> ID#@if(isset($data['id'])){{$data['id']}}@else {{000}} @endif</i>

										</div>


										<table border="1px" style="font-size: 14px;padding: 1px  2px;width: 100%;border-spacing:unset!important;     border-collapse: collapse!important;" >

											<tr><th>Admission Fee/Registration</th><th>Security/Deferred</th><th>Exam </th><th style="width:160px">Comp Utility</th><th>Summer/Insuranc</th><th>Stationery/Science Lab</th></tr>
											<tr><td>@if(isset($data['admissionFee'])){{$data['admissionFee']}}@else{{0}}@endif/@if(isset($data['registerationFee'])){{$data['registerationFee']}}@else{{0}}@endif</td><td>@if(isset($data->student->studentFee['sec_fee'])){{$data->student->studentFee['sec_fee']}}@else{{0}}@endif/@if(isset($data['deffered_amount'])){{$data['deffered_amount']}}@else{{0}}@endif</td><td>@isset($data['examfee']){{$data['examfee']}}@endisset</td><td>@isset($data['examfee']){{$data['comp_fee']}}@endisset/0</td><td>@isset($data['examfee']){{$data['libfee']}}@endisset/0</td><td>@isset($data['statfee']){{$data['statfee']}}@endisset/@isset($data['labfee']){{$data['labfee']}}@endisset</td></tr>
											<tr>
												<td>Transport</td>
												<td>Misc1</td>
												<td>Misc2</td>
												<td>LastMDeff/Unapp Amount</td>
												<td>Outstanding</td>
												<td>AC Charge</td>
											</tr>
											<tr>
												<td>@isset($data['transport_fee']){{$data['transport_fee']}}@endisset</td>
												<td>@isset($data['misc1']){{$data['misc1']}}@endisset</td>
												<td>@isset($data['misc2']){{$data['misc2']}}@endisset</td>
												<td>@isset($data['month_def']){{$data['month_def']}}@endisset/@isset($data['month_def']){{$data['total_fee']-$data['paid_amount']}}@endisset</td>
												<td>@isset($data->outstand_lastmonth){{$data->outstand_lastmonth}}@endisset</td>
												<td>@isset($data['accharge']){{$data['accharge']}}@endisset</td></tr>
											</table>
											<div class="calculation" style="float: right;border: 1px solid">
												<table border="1px solid" style="font-size: 14px;padding: 1px  2px;border-spacing:unset!important;     border-collapse: collapse!important;">
													<tr>
														<td>
															<i>Installment:@isset($feeMonth){{$feeMonth}}@endisset*@isset($feeFactor){{$feeFactor}}@endisset</i>
														</td>
														<td>@isset($data['total_fee']){{$data['total_fee']}}@endisset</td>

													</tr>
													<tr>
														<td>
															<i>Late Deposit Fine</i>
														</td>
														<td>

														</td>
													</tr>
													<tr>
														<td>
															<i>Payable Before due date</i>
														</td>
														<td>

														</td>
													</tr>

												</table>
											</div>
											<div style="float: left; width: 300px;"><br> <strong>Due date  =  @if($data->outstand_lastmonth > 0)
												{{date("d-M-Y", strtotime($data['fee_due_date2']))}}
												@else
												{{date("d-M-Y", strtotime($data['fee_due_date1']))}}
											@endisset</strong> After due date bank must charge @if(isset($record->userSetting->currency) && $record->userSetting->currency){{$record->userSetting->currency}}@else{{(' Rs')}}@endif. @if(isset($record->userSetting->fine) && $record->userSetting->fine){{$record->userSetting->fine}}@else{{('40')}} @endif /- fine per day</div>
											<br>
											<div><span> SID#@isset($data->id){{$data->id}}@endisset</span></div>  

											<i style="float: left">@if(isset($data['fee_month'])){{getMonthName($data['fee_month'])}} @endisset/@if(isset($data['fee_year'])){{$data['fee_year']}}@else{{''}}@endif</i>   
										</div>
										<div class="school" style="margin-bottom:50px;">
											<div style="border: 1px solid;padding: 5px;margin-top: -18px;margin-right: 10px;max-height: 100px; width: 98%">
												<span style="margin-left:100px;font-size: 20px"><b >@if(isset($record->userSetting->school_name) && $record->userSetting->school_name){{$record->userSetting->school_name}} @else{{(' American Lyceum International School')}}@endif</b></span>
												<i style="float: right">@if(isset($data['fee_month'])){{getMonthName($data['fee_month'])}} @endisset/@if(isset($data['fee_year'])){{$data['fee_year']}}@else{{''}}@endif</i>
												<br>

												@if(isset($record->userBank) && count(($record->userBank)))
												@foreach($record->userBank as $banks)
												@isset($banks->bank->bank_name)<b style="">{{$banks->bank->bank_name}}</b> ,@endisset
												@endforeach

												<br>
												<i style="float: right">{{$record->branch_name}}</i>
												<b style="text-align: right">&nbsp;&nbsp;&nbsp; </b>
												@else
												<b style="">MCB</b>,<b style="margin-left: 0px">UBl Omni</b>,<b style="margin-left: 5px">HBL Konnect, Alfalah </b><br>
												<i style="float: right">{{$record->branch_name}}</i>
												<b style="text-align: right">Credit MCB Bank Ltd:AC#4011076351010132 </b>
												@endif



											</div>
											<div style="border: 1px solid;padding: 5px;margin-top: 2px;margin-right: 10px;max-height: 120px; width: 98%;">
												<b>{{$data->s_name}}</b>
												<b>&nbsp;&nbsp;@if(isset($data->course->course_name)){{$data->course->course_name}} @endif</b><i style="float: right"></i><i style="float: right">Bank Copy</i>&nbsp;&nbsp;&nbsp; <i> ID#@if(isset($data['id'])){{$data['id']}}@else {{000}} @endif</i>

											</div>


											<table border="1px" style="font-size: 14px;padding: 1px  2px;width: 100%;border-spacing:unset!important;     border-collapse: collapse!important;" >

												<tr><th>Admission Fee/Registration</th><th>Security/Deferred</th><th>Exam </th><th style="width: 160px">Comp Utility</th><th>Summer/Insuranc</th><th>Stationery/Science Lab</th></tr>
												<tr><td>@if(isset($data['admissionFee'])){{$data['admissionFee']}}@else{{0}}@endif/@if(isset($data['registerationFee'])){{$data['registerationFee']}}@else{{0}}@endif</td><td>@if(isset($data->student->studentFee['sec_fee'])){{$data->student->studentFee['sec_fee']}}@else{{0}}@endif/@if(isset($data['deffered_amount'])){{$data['deffered_amount']}}@else{{0}}@endif</td><td>@isset($data['examfee']){{$data['examfee']}}@endisset</td><td>@isset($data['examfee']){{$data['comp_fee']}}@endisset/0</td><td>@isset($data['examfee']){{$data['libfee']}}@endisset/0</td><td>@isset($data['statfee']){{$data['statfee']}}@endisset/@isset($data['labfee']){{$data['labfee']}}@endisset</td></tr>
												<tr>
													<td>Transport</td><td>Misc1</td><td>Misc2</td><td>LastMDeff/Unapp Amount</td>
													<td>Outstanding</td>
													<td>AC Charge</td>
												</tr>
												<tr>
													<td>@isset($data['transport_fee']){{$data['transport_fee']}}@endisset</td>
													<td>@isset($data['misc1']){{$data['misc1']}}@endisset</td>
													<td>@isset($data['misc2']){{$data['misc2']}}@endisset</td>
													<td>@isset($data['month_def']){{$data['month_def']}}@endisset/@isset($data['month_def']){{$data['total_fee']-$data['paid_amount']}}@endisset</td>
													<td>@isset($data->outstand_lastmonth){{$data->outstand_lastmonth}}@endisset</td><td>@isset($data['accharge']){{$data['accharge']}}@endisset</td></tr>
												</table>
												<div class="calculation" style="float: right;border: 1px solid">
													<table border="1px solid" style="font-size: 14px;padding: 1px  2px;border-spacing:unset!important;     border-collapse: collapse!important;">
														<tr>
															<td>
																<i>Installment:@isset($feeMonth){{ round(($feeMonth))}}@endisset*@isset($feeFactor){{$feeFactor}}@endisset</i>
															</td>
															<td>@isset($data['total_fee']){{$data['total_fee']}}@endisset</td>

														</tr>

														<tr>
															<td>
																<i>Late Deposit Fine</i>
															</td>
															<td>

															</td>
														</tr>
														<tr>
															<td>
																<i>Payable Before due date</i>
															</td>
															<td>

															</td>
														</tr>

													</table>
												</div>
												<div style="float: left; width: 300px;"> <strong>Due date  =  @if($data->outstand_lastmonth > 0)
													{{date("d-M-Y", strtotime($data['fee_due_date2']))}}
													@else
													{{date("d-M-Y", strtotime($data['fee_due_date1']))}}
												@endisset</strong> After due date bank must charge @if(isset($record->userSetting->currency) && $record->userSetting->currency){{$record->userSetting->currency}}@else{{(' Rs')}}@endif. @if(isset($record->userSetting->fine) && $record->userSetting->fine){{$record->userSetting->fine}}@else{{('40')}} @endif /- fine per day</div><br>
												<div><span >    SID#@isset($data->id){{$data->id}}@endisset</span></div><br>
												<i style="float: left;margin-top: -10px;">@if(isset($data['fee_month'])){{getMonthName($data['fee_month'])}} @endisset/@if(isset($data['fee_year'])){{$data['fee_year']}}@else{{''}}@endif</i>

												<div>


												</div>

											</div>
										</div>

									</div>

									
									
									@endforeach
								</div>
								@else
								<div class="alert alert-danger"> Record not found</div>
							</section>
							@endif
						</div>
					</div>
				</div>

				<div style="clear: both;"></div>
			</body>
			</html>