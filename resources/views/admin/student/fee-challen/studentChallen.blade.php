@extends('_layouts.admin.default')
@section('title', 'Fee Challen')
@section('content')
@php($monthName=(getMonthName($feePost->fee_month)))
@php($month=$feePost->fee_month)


<?php

if(isset($feePost->fee_this_month) && $feePost->fee_this_month){
	$feeMonths=$feePost->fee_this_month;
}else{
	$feeMonths=$feePost->current_fee;
}


if(isset($feePost->fee_factor) && $feePost->fee_factor){
	$feeFactors=$feePost->fee_factor;
}else{
	$feeFactors=(isset($feePost->student->studentFee['m'.$month])?$feePost->student->studentFee['m'.$month]:0);
}


$feeFactor=round(($feeFactors),2);



$feeMonth=round($feeMonths,2);


$miscCharge=($feePost->total_fee - $feePost->current_fee);



?>



<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<style>

				@page { size: auto;  margin: 5mm!important;}
				@media print {
					.page {
						margin: 0;
						border: initial;
						border-radius: initial;
						width: initial;
						min-height: initial;
						box-shadow: initial;
						background: initial;
						page-break-after: always;
					}
					.page:last-child{
						page-break-after: auto !important;
					}
					table, th, td {
    font-size: 12px;
    padding: 0px 2px!important;
}

		table{
			border-spacing: 0px!important;
			border-collapse: collapse!important;
		}
				}
			</style>
			<div class="col-md-12">

				<button style="font-size:36px;color:#000d82;" onclick="printDiv(this,printAllRecord);"> <i class="fa fa-print"></i><br><input type='button' id='btn' value='All Record Print'  class="btn btn-primary float-center allrecord"></button>
			</div>
			<br><br>
			<div id="printAllRecord">
				<section class="Report">
					<div  id="DivIdToPrint">
						<style>
							table,th, td{
								padding: 0px;
							}
						</style>
						<div class="main_div" style=" page-break-after: always!important; margin-top: -8px;">
							<div style="border: 1px solid;padding: 5px;margin-top: 2px;max-height: 100px; width: 98%">
								<span style="margin-left:100px;font-size: 23px"><b >@if(isset($feePost->student->branch->userSetting->school_name) && $feePost->student->branch->userSetting->school_name){{$feePost->student->branch->userSetting->school_name}}@else{{(' American Lyceum International School')}}@endif</b></span>
								<i style="float: right">{{$monthName}}/{{$feePost->fee_year}}</i>
								<br>
								@if(isset($feePost->student->branch->userBank) && count(($feePost->student->branch->userBank)))
								@foreach($feePost->student->branch->userBank as $banks)
								@isset($banks->bank->bank_name)<b style="">{{$banks->bank->bank_name}}</b> ,@endisset
								@endforeach

								
								<br>
								<i style="float: right">@isset($feePost->student->branch->branch_name){{$feePost->student->branch->branch_name}} @endisset</i>
								<b style="text-align: right">@if(isset($feePost->student->branch->userSetting->account_no) && $feePost->student->branch->userSetting->account_no) {{$feePost->student->branch->userSetting->account_no}} @else Credit MCB Bank Ltd:AC#4011076351010132 @endif</b>
								@else
								<b style="">MCB</b>,<b style="margin-left: 0px">UBl Omni</b>,<b style="margin-left: 5px">HBL Konnect, Alfalah </b><br>
								<i style="float: right">@isset($feePost->student->branch->branch_name){{$feePost->student->branch->branch_name}} @endisset</i>
								<b style="text-align: right">Credit MCB Bank Ltd:AC#4011076351010132 </b>
								@endif

								
							</div>
							<div style="border: 1px solid;padding: 5px;margin-top: 2px;max-height: 120px; width: 98%;">
								<b>{{$feePost->student->s_name}}</b>
								<b>@if(isset($feePost->student->course->course_name)){{$feePost->student->course->course_name}} @endif</b><i style="float: right"></i><i style="float: right">Student Copy</i>&nbsp;&nbsp;&nbsp; <i> ID#@if(isset($feePost->id)) {{$feePost->id}} @else {{000}} @endif</i>

							</div>
							<div class="main_div1" style="border: 1px solid;padding-left:10px; width: 98%;">

								<div class="table_under_div">
									<div style="float:left; width: 59%;margin-top: 10px">
										<div style="border: 1px solid; width: 98%;" >
											<b style="margin-top: 20px;font-size:13px ;margin-left: 20px;"><span>Previous</span> <span>Payment</span> <span> History</span></b>
										</div>
										<table border=""  style="width: 98%;font-size: 13px;padding: 2px;border-spacing:unset!important;     border-collapse: collapse!important;" >
											<tr>
												<th style="width: 130px;">Date</th>
												<th style="width: 320px; font-size: 10px;">Description</th>
												<th>Debit</th>
												<th>Credit</th>
												<th>Balance</th>
											</tr>
											@if(isset($feePost->student->account->ledger) && count($feePost->student->account->ledger)>0)
											@foreach($feePost->student->account->lengthLedger->sortBy('id') as $account)
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
											<div style="float: left; width: 300px;"> <strong>Due date  =  @if($feePost->outstand_lastmonth > 0)
												{{date("d-M-Y", strtotime($feePost['fee_due_date2']))}}
												@else
												{{date("d-M-Y", strtotime($feePost['fee_due_date1']))}}
											@endisset</strong> 
											After due date bank must charge @if(isset($feePost->student->branch->userSetting->currency) && $feePost->student->branch->userSetting->currency){{$feePost->student->branch->userSetting->currency}} @else{{(' Rs')}}@endif. @if(isset($feePost->student->branch->userSetting->fine) && $feePost->student->branch->userSetting->fine){{$feePost->student->branch->userSetting->fine}} @else{{('40')}}@endif/- fine per day</div>
											<br>
											

											<i style="float: left">{{$monthName}}/@if(isset($feePost['fee_year'])){{$feePost['fee_year']}}@else{{''}}@endif</i>   
											<p style="float: right; ">&nbsp;&nbsp; Accounts contact(@if(isset($feePost->student->branch->userSetting->account_no) && $feePost->student->branch->userSetting->account_no>0){{$feePost->student->branch->userSetting->account_no}} @else{{(' 03464292920')}}@endif ) </p><div><span> SID#@isset($feePost->student->id){{$feePost->student->id}}@endisset</span></div> 
										</div>
									</div>
									<div  style="max-height: 40%;">
										<div style=" float: right; margin-top: 2px;border: 1px solid;font-size: 13px; width: 37.50%;">
											<div >Annual Fee:  @if(isset($feePost->student->studentFee['annual_fee'])){{$feePost->student->studentFee['annual_fee']}}@else {{0}}  @endif : Total Installment :@if(isset($feePost->student->studentFee['installment_no'])){{$feePost->student->studentFee['installment_no']}}@else {{0}}@endif </div>
											<div> Annual Scholarship : @if(isset($feePost->student->studentFee['scholarship_of'])){{$feePost->student->studentFee['scholarship_of']}}@else {{0}}@endif :Net Fee: @if(isset($feePost->student->studentFee['Net_AnnualFee'])){{$feePost->student->studentFee['Net_AnnualFee']}}@else {{0}}@endif </div>
											<div>
												@if(isset($feePost->student->branch->userSetting->netMonthly)  && $feePost->student->branch->userSetting->netMonthly )
												Net Annual Monthly : @if(isset($feeMonth)){{ round(($feeMonth)) }} @else {{0}}@endif 
												@endif
											</div>
										</div>
										<table border="" style="font-size: 13px; border-collapse: collapse!important; width: 38%; float: right;">
											<tr>
												<th>Description</th>
												<th>Amount</th>
											</tr>
											<tr>
												<td><i style="margin-left: 10px">Admission Fee</i>/<i>Registration</i></td>
												<td><i style="margin-left: 10px">@if(isset($feePost['admissionFee'])){{$feePost['admissionFee']}}@else{{0}}@endif</i>/<i style="margin-left: 10px">@if(isset($feePost['registerationFee'])){{$feePost['registerationFee']}}@else{{0}}@endif</i></td>
											</tr>

											@if(isset($feePost->student->branch->userSetting->securityFee)  || isset($feePost->student->branch->userSetting->deffered))
											@if(($feePost->student->branch->userSetting->securityFee)  || ($feePost->student->branch->userSetting->deffered))
											<tr>
												<td>
													@if(isset($feePost->student->branch->userSetting->securityFee) && ($feePost->student->branch->userSetting->securityFee))<i style="margin-left: 10px">Security</i>/ @endif
													@if(isset($feePost->student->branch->userSetting->deffered) && ($feePost->student->branch->userSetting->deffered))<i style="margin-left: 10px">Deferred </i></td> @endif
													<td>
														@if(isset($feePost->student->branch->userSetting->securityFee) && ($feePost->student->branch->userSetting->securityFee))
														<i style="margin-left: 2px">@if(isset($feePost->student->studentFee['sec_fee'])){{$feePost->student->studentFee['sec_fee']}}@else{{0}}@endif</i>/
														@endif
														@if(isset($feePost->student->branch->userSetting->deffered) && ($feePost->student->branch->userSetting->deffered))
														<i style="margin-left: 10px">@if(isset($feePost['deffered_amount'])){{$feePost['deffered_amount']}}@else{{0}}@endif</i>@endif
													</td>

												</tr>
												@endif
												@endif


												@if(isset($feePost->student->branch->userSetting->examFee))
												@if(($feePost->student->branch->userSetting->examFee))
												<tr>
													<td>
														<i style="margin-left: 10px">Exam Fee</i><i style="margin-left: 10px"></i></td>
														{{--<td><i style="margin-left: 2px"></i><i style="margin-left: 5px"></i></td>--}}
														<td><i style="margin-left: 2px">@isset($feePost['examfee']){{$feePost['examfee']}}@endisset</i><i style="margin-left: 5px"></i></td>

													</tr>
													@endif
													@endif

													@if(isset($feePost->student->branch->userSetting->compFee) || isset($feePost->student->branch->userSetting->utitlity))
													@if(($feePost->student->branch->userSetting->compFee) || ($feePost->student->branch->userSetting->utitlity))
													<tr>
														<td>
															@if(isset($feePost->student->branch->userSetting->compFee) && ($feePost->student->branch->userSetting->compFee))  <i style="margin-left: 10px">Computer</i>/ @endif 
															@if(isset($feePost->student->branch->userSetting->utitlity) && $feePost->student->branch->userSetting->utitlity) <i style="margin-left: 10px">Utility</i> @endif
														</td>
														<td>
															@if(isset($feePost->student->branch->userSetting->compFee) && $feePost->student->branch->userSetting->compFee)
															<i style="margin-left: 2px">@isset($feePost['comp_fee']){{$feePost['comp_fee']}}@endisset</i>/ 
															@endif 
															@if(isset($feePost->student->branch->userSetting->utitlity) && $feePost->student->branch->userSetting->compFee)
															<i style="margin-left: 5px">@isset($feePost['utility_fee']){{$feePost['utility_fee']}}@endisset</i> 
															@endif
														</td>
													</tr>
													@endif
													@endif


													@if(isset($feePost->student->branch->userSetting->StatFee) || isset($feePost->student->branch->userSetting->labFee))
													@if(($feePost->student->branch->userSetting->StatFee) || ($feePost->student->branch->userSetting->labFee))
													<tr>
														<td>
															@if($feePost->student->branch->userSetting->StatFee) 
															<i style="margin-left: 10px">Stationery</i>/
															@endif
															@if($feePost->student->branch->userSetting->labFee) 
															<i style="margin-left: 10px">Science Lab</i>
															@endif
														</td>
														<td>
															@if($feePost->student->branch->userSetting->StatFee) 
															<i style="margin-left: 2px">@isset($feePost['statfee']){{$feePost['statfee']}}@endisset</i>/
															@endif
															@if($feePost->student->branch->userSetting->labFee)
															<i style="margin-left: 2px">@isset($feePost['statfee']){{$feePost['labfee']}}@endisset</i>
															@endif
														</td>
													</tr>
													@endif
													@endif

													@if(isset($feePost->student->branch->userSetting->transportCharge) || isset($feePost->student->branch->userSetting->acCharge))
													@if(($feePost->student->branch->userSetting->transportCharge) || ($feePost->student->branch->userSetting->acCharge))
													<tr>
														<td>
															@if($feePost->student->branch->userSetting->transportCharge) 
															<i style="margin-left: 10px">Transport</i>/
															@endif
															@if($feePost->student->branch->userSetting->acCharge) 
															<i style="margin-left: 10px">AC Charge</i>
															@endif
														</td>
														<td>
															@if($feePost->student->branch->userSetting->transportCharge) 
															<i style="margin-left: 2px">@isset($feePost['transport_fee']){{$feePost['transport_fee']}}@endisset</i>/
															@endif
															@if($feePost->student->branch->userSetting->acCharge) 
															<i style="margin-left: 2px">@isset($feePost['accharge']){{$feePost['accharge']}}@endisset</i>
															@endif
														</td>
													</tr>
													@endif
													@endif

													@if(isset($feePost->student->branch->userSetting->summerPack) || isset($feePost->student->branch->userSetting->Insurace))
													@if(($feePost->student->branch->userSetting->summerPack) || ($feePost->student->branch->userSetting->Insurace))
													<tr>
														<td>
															@if($feePost->student->branch->userSetting->summerPack) 
															<i style="margin-left: 10px">Summer Pack</i>/
															@endif
															@if($feePost->student->branch->userSetting->Insurace) 
															<i style="margin-left: 10px">Insurance</i>
															@endif
														</td>
														<td>
															@if($feePost->student->branch->userSetting->summerPack)
															<i style="margin-left: 2px">@isset($feePost['libfee']){{$feePost['libfee']}}@endisset</i>/
															@endif
															@if($feePost->student->branch->userSetting->Insurace)
															<i style="margin-left: 2px">@isset($feePost['insurance_of']){{$feePost['insurance_of']}}@endisset</i>
															@endif
														</td>
													</tr>
													@endif
													@endif

													@if(isset($feePost->student->branch->userSetting->bookFee) || isset($feePost->student->branch->userSetting->uniFee))
													@if(($feePost->student->branch->userSetting->bookFee) || ($feePost->student->branch->userSetting->uniFee))
													<tr>

														<td>
															@if($feePost->student->branch->userSetting->bookFee) 
															<i style="margin-left: 10px">Books</i>/
															@endif
															@if($feePost->student->branch->userSetting->uniFee) 
															<i style="margin-left: 10px">Uniform</i>
															@endif
														</td>
														<td>
															@if($feePost->student->branch->userSetting->bookFee)
															<i style="margin-left: 2px">@isset($feePost['books_charges']){{$feePost['books_charges']}}@endisset</i>/
															@endif
															@if($feePost->student->branch->userSetting->uniFee)
															<i style="margin-left: 2px">@isset($feePost['uniform']){{$feePost['uniform']}}@endisset</i>
															@endif
														</td>
													</tr>
													@endif
													@endif


													<tr>
														<td><i style="margin-left: 10px"> Misc1</i>/
															<i style="margin-left: 10px">Misc2</i>
														</td>
														<td>
															<i style="margin-left: 2px">@isset($feePost['misc1']){{$feePost['misc1']}}@endisset</i>/
															<i style="margin-left: 2px">@isset($feePost['misc2']){{$feePost['misc2']}}@endisset</i>
														</td>
													</tr>
													

													
													<tr>
														<td><i style="margin-left: 10px">Installment @isset($feeMonth){{(($feeMonth))}}@endisset * @isset($feeFactor){{$feeFactor}}@endisset</i><i style="margin-left: 10px"></i></td>
														<td><i style="margin-left: 2px">{{(isset($feePost['current_fee'] )?(round(($feePost['current_fee']))):0)}}</i><i style="margin-left: 2px"></i></td>
													</tr>

													<tr>
														<td><i style="margin-left: 10px">Last Month Late deposit Fine</i><i style="margin-left: 2px"></i></td>
														<td><i style="margin-left: 2px">@isset($feePost['fine']){{$feePost['fine']}}@endisset</i><i style="margin-left: 2px"></i></td>
													</tr>


													<tr>
														<td><i style="margin-left: 10px"><b>This Month Total</b></i><i style="margin-left: 10px"></i></td>

														<td><i style="margin-left: 2px"></i>@isset($feePost['total_fee']){{round(($feePost['total_fee']-$feePost['outstand_lastmonth'] -$feePost['deffered_amount']))}}@endisset<i style="margin-left: 5px"></i></td>

													</tr>
													<tr>
														<td><i style="margin-left: 10px">Deffered from prev month ( + )</i><i style="margin-left: 10px"></i></td>
														<td><i style="margin-left: 2px"></i>@isset($feePost->outstand_lastmonth){{$feePost->outstand_lastmonth}}@endisset<i style="margin-left: 2px"></i></td>
													</tr>

													@if(isset($feePost->student->branch->userSetting->deffered) )
													<tr>
														<td><i style="margin-left: 10px"></i>deffer to next month ( - )<i style="margin-left: 10px"></i> </td>
														<td><i style="margin-left: 2px"></i> @if(isset($feePost['deffered_amount'])){{$feePost['deffered_amount']}}@else{{0}}@endif<i style="margin-left: 5px"></i></td>
													</tr>
													@endif

													


													<tr>
														<td><i style="margin-left: 10px"><b>Payable Before due date</b></i><i style="margin-left: 10px"></i></td>
														<td><i style="margin-left: 2px"><b>@isset($feePost['total_fee']){{$feePost['total_fee']}}@endisset</b></i><i style="margin-left: 2px"></i></td>
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
									<div class="school" style="margin-bottom:30px;">
										<div style="border: 1px solid;padding: 5px;margin-top: 2px;max-height: 100px; width: 98%">
											<span style="margin-left:100px;font-size: 23px"><b >@if(isset($feePost->student->branch->userSetting->school_name) && $feePost->student->branch->userSetting->school_name){{$feePost->student->branch->userSetting->school_name}}@else{{(' American Lyceum International School')}}@endif</b></span>
											<i style="float: right">{{$monthName}}/{{$feePost->fee_year}}</i>
											<br>
											@if(isset($feePost->student->branch->userBank) && count(($feePost->student->branch->userBank)))
											@foreach($feePost->student->branch->userBank as $banks)
											@isset($banks->bank->bank_name)<b style="">{{$banks->bank->bank_name}}</b> ,@endisset
											@endforeach

											<br>
											<i style="float: right">@isset($feePost->student->branch->branch_name){{$feePost->student->branch->branch_name}} @endisset</i>
											<b style="text-align: right">@if(isset($feePost->student->branch->userSetting->account_no) && $feePost->student->branch->userSetting->account_no) {{$feePost->student->branch->userSetting->account_no}} @else Credit MCB Bank Ltd:AC#4011076351010132 @endif</b>
											@else
											<b style="">MCB</b>,<b style="margin-left: 0px">UBl Omni</b>,<b style="margin-left: 5px">HBL Konnect, Alfalah </b><br>
											<i style="float: right">@isset($feePost->student->branch->branch_name){{$feePost->student->branch->branch_name}} @endisset</i>
											<b style="text-align: right">Credit MCB Bank Ltd:AC#4011076351010132 </b>
											@endif


										</div>
										<div style="border: 1px solid;padding: 5px;margin-top: 2px;max-height: 120px; width: 98%;">
											<b>{{$feePost->student->s_name}}</b>
											<b>@if(isset($feePost->student->course->course_name)){{$feePost->student->course->course_name}} @endif</b><i style="float: right"></i><i style="float: right">School Copy</i>&nbsp;&nbsp;&nbsp; <i> ID#@if(isset($feePost->id)) {{$feePost->id}} @else {{000}} @endif</i>

										</div>
										<table border="1px" style="font-size: 12px;width: 100%;border-collapse: collapse!important;">
											<tr><th>Admission Fee/Registration</th><th>Security/Deferred</th><th>Exam </th><th>Comp Utility</th><th>Summer/Insuranc</th><th>Stationery/Science Lab</th></tr>
											<tr><td>@if(isset($feePost->admissionFee)){{$feePost['admissionFee']}}@else{{0}}@endif/@if(isset($feePost->registerationFee)){{$feePost->registerationFee}}@else{{0}}@endif</td><td>@if(isset($feePost->student->studentFee['sec_fee'])){{$feePost->student->studentFee['sec_fee']}}@else{{0}}@endif/@if(isset($feePost->deffered_amount)){{$feePost->deffered_amount}}@else{{0}}@endif</td><td>@isset($feePost->examfee){{$feePost->examfee}}@endisset</td><td>@isset($feePost->examfee){{$feePost->comp_fee}}@endisset/0</td><td>@isset($feePost->examfee){{$feePost->libfee}}@endisset/0</td><td>@isset($feePost->statfee){{$feePost->statfee}}@endisset/@isset($feePost->labfee){{$feePost->labfee}}@endisset</td></tr>
											<tr><td>Transport</td><td>Misc1</td><td>Misc2</td><td>LastMDeff/Unapp Amount</td><td>Outstanding</td><td>AC Charges</td></tr>
											<tr><td>@isset($feePost->transport_fee){{$feePost->transport_fee}}@endisset</td><td>@isset($feePost->misc1){{$feePost->misc1}}@endisset</td><td>@isset($feePost->misc2){{$feePost->misc2}}@endisset</td><td>@isset($feePost->month_def){{$feePost->month_def}}@endisset/@isset($feePost->month_def){{$feePost->total_fee-$feePost->paid_amount}}@endisset</td><td>@isset($feePost->student->account[0]->a_balance){{$feePost->student->account[0]->a_balance}}@endisset</td><td>@isset($feePost->accharge){{$feePost->accharge}}@endisset</td></tr>
										</table>
										<div class="calculation" style="float: right;margin-top: 2px;margin-bottom: 1px;">
											<table border="1px solid" style="font-size: 12px;width: 98%;border-collapse: collapse!important;">
												<tr>
													<td>
														<i>Installment:@isset($feeMonth){{(($feeMonth))}}@endisset * @isset($feeFactor){{$feeFactor}}@endisset</i>
													</td>
													<td>@isset($feePost->student->studentFee['Net_AnnualFee'])
														{{ 
															round(($feePost->student->studentFee['Net_AnnualFee']/12),2)
															* 
															(isset($feeFactor)?$feeFactor:1)
														}}@endisset</td>
													</tr>
													<tr>
														<td>
															<i>Late Deposit Fine</i>
														</td>
														<td>
															@isset($feePost->fine){{$feePost->fine}}@endisset
														</td>
													</tr>
													<tr>
														<td>
															<i>Payable Before due date</i>
														</td>
														<td>
															@isset($feePost->total_fee){{$feePost->total_fee}}@endisset
														</td>
													</tr>
												</table>
											</div>
											<div style="float: left; width: 300px;"> <strong>Due date  = @isset($feePost->fee_due_date1) {{date("d-M-Y", strtotime($feePost->fee_due_date1)) }}@endisset</strong><br>  <p style="font-size: 12px;">After due date bank must charge @if(isset($feePost->student->branch->userSetting->currency) && $feePost->student->branch->userSetting->currency){{$feePost->student->branch->userSetting->currency}}@else{{(' Rs')}}@endif. @if(isset($feePost->student->branch->userSetting->fine) && $feePost->student->branch->userSetting->fine){{$feePost->student->branch->userSetting->fine}} @else{{('40')}}@endif /- fine per day </p></div><br>
											<div><span> SID#@isset($feePost->student->id){{$feePost->student->id}}@endisset</span>
												<br>
												<i style="float: left">{{$monthName}}/@if(isset($feePost->fee_year)){{$feePost->fee_year}}@else{{''}}@endif</i>   </div> 

											</div>
											<div class="school" style="margin-bottom:30px;">
												<div style="border: 1px solid;padding: 5px;margin-top: 2px;max-height: 100px; width: 98%">
													<span style="margin-left:100px;font-size: 23px"><b >@if(isset($feePost->student->branch->userSetting->school_name) && $feePost->student->branch->userSetting->school_name){{$feePost->student->branch->userSetting->school_name}}@else{{(' American Lyceum International School')}}@endif</b></span>
													<i style="float: right">{{$monthName}}/{{$feePost->fee_year}}</i>
													<br>
													@if(isset($feePost->student->branch->userBank) && count(($feePost->student->branch->userBank)))
													@foreach($feePost->student->branch->userBank as $banks)
													@isset($banks->bank->bank_name)<b style="">{{$banks->bank->bank_name}}</b> ,@endisset
													@endforeach

													<br>
													<i style="float: right">@isset($feePost->student->branch->branch_name){{$feePost->student->branch->branch_name}} @endisset</i>
								<b style="text-align: right">@if(isset($feePost->student->branch->userSetting->account_no) && $feePost->student->branch->userSetting->account_no) {{$feePost->student->branch->userSetting->account_no}} @else Credit MCB Bank Ltd:AC#4011076351010132 @endif</b>


													@else
													<b style="">MCB</b>,<b style="margin-left: 0px">UBl Omni</b>,<b style="margin-left: 5px">HBL Konnect, Alfalah </b><br>
													<i style="float: right">@isset($feePost->student->branch->branch_name){{$feePost->student->branch->branch_name}} @endisset</i>
													<b style="text-align: right">Credit MCB Bank Ltd:AC#4011076351010132 </b>
													@endif


												</div>
												<div style="border: 1px solid;padding: 5px;margin-top: 2px;max-height: 120px; width: 98%;">
													<b>{{$feePost->student->s_name}}</b>
													<b>@if(isset($feePost->student->course->course_name)){{$feePost->student->course->course_name}} @endif</b><i style="float: right"></i><i style="float: right">Bank Copy</i>&nbsp;&nbsp;&nbsp; <i> ID#@if(isset($feePost->id)) {{$feePost->id}} @else {{000}} @endif</i>

												</div>
												<table border="1px" style="font-size: 12px;width: 100%!important;border-collapse: collapse!important;" >
													<tr><th>Admission Fee/Registration</th><th>Security/Deferred</th><th>Exam </th><th>Comp Utility</th><th>Summer/Insuranc</th><th>Stationery/Science Lab</th></tr>
													<tr><td>@if(isset($feePost->admissionFee)){{$feePost->admissionFee}}@else{{0}}@endif/@if(isset($feePost->registerationFee)){{$feePost->registerationFee}}@else{{0}}@endif</td><td>@if(isset($feePost->student->studentFee['sec_fee'])){{$feePost->student->studentFee['sec_fee']}}@else{{0}}@endif/@if(isset($feePost->deffered_amount)){{$feePost->deffered_amount}}@else{{0}}@endif</td><td>@isset($feePost->examfee){{$feePost->examfee}}@endisset</td><td>@isset($feePost->examfee){{$feePost->comp_fee}}@endisset/0</td><td>@isset($feePost->examfee){{$feePost->libfee}}@endisset/0</td><td>@isset($feePost->statfee){{$feePost->statfee}}@endisset/@isset($feePost->labfee){{$feePost->labfee}}@endisset</td></tr>
													<tr><td>Transport</td><td>Misc1</td><td>Misc2</td><td>LastMDeff/Unapp Amount</td><td>Outstanding</td><td>AC Charges</td></tr>
													<tr><td>@isset($feePost->transport_fee){{$feePost->transport_fee}}@endisset</td><td>@isset($feePost->misc1){{$feePost->misc1}}@endisset</td><td>@isset($feePost->misc2){{$feePost->misc2}}@endisset</td><td>@isset($feePost->month_def){{$feePost->month_def}}@endisset/@isset($feePost->month_def){{$feePost->total_fee-$feePost->paid_amount}}@endisset</td><td>@isset($feePost->student->account[0]->a_balance){{$feePost->student->account[0]->a_balance}}@endisset</td><td>@isset($feePost->accharge){{$feePost->accharge}}@endisset</td></tr>
												</table>
												<div class="calculation" style="float: right; margin-top: 5px;">
													<table border="1px solid" style="font-size: 12px;width: 101%;border-collapse: collapse!important;">
														<tr>
															<td>
																<i>Installment:@isset($feeMonth){{(($feeMonth))}}@endisset * @isset($feeFactor){{$feeFactor}}@endisset</i>
															</td>
															<td>@isset($feePost->student->studentFee['Net_AnnualFee'])
																{{ 
																	round(($feePost->student->studentFee['Net_AnnualFee']/12),2)
																	* 
																	(isset($feeFactor)?$feeFactor:1)
																}}@endisset</td>
															</tr>
															<tr>
																<td>
																	<i>Late Deposit Fine</i>
																</td>
																<td>
																	@isset($feePost->fine){{$feePost->fine}}@endisset
																</td>
															</tr>
															<tr>
																<td>
																	<i>Payable Before due date</i>
																</td>
																<td>
																	@isset($feePost->total_fee){{$feePost->total_fee}}@endisset
																</td>
															</tr>

														</table>
													</div>
													<div style="float: left; width: 300px;"> <strong>Due date  = @isset($feePost->fee_due_date1) {{date("d-M-Y", strtotime($feePost->fee_due_date1)) }}@endisset</strong><br> <p style="font-size: 12px;">After due date bank must charge @if(isset($feePost->student->branch->userSetting->currency) && $feePost->student->branch->userSetting->currency){{$feePost->student->branch->userSetting->currency}}@else{{(' Rs')}}@endif . @if(isset($feePost->student->branch->userSetting->fine) && $feePost->student->branch->userSetting->fine){{$feePost->student->branch->userSetting->fine}} @else{{('40')}}@endif /- fine per day</p></div><br>
													<div><span > SID#@isset($feePost->student->id){{$feePost->student->id}}@endisset</span></div>
													<div>
														<i style="float: left;margin-top: 6px;">{{$monthName}}/@if(isset($feePost->fee_year)){{$feePost->fee_year}}@else{{''}}@endif</i>
													</div>
												</div>
											</div>
										</div>
										<!--  <input type='button' id='btn' value='Print' id="DivIdToPrint{{$feePost->student->s_lyceonianNo}}" onclick="printDiv(DivIdToPrint{{$feePost->student->s_lyceonianNo}});" class="btn btn-primary">  -->
									</div>
								</section>
							</div>
						</div>
					</div>
					@endsection
					@push('post-styles')
					@endpush
					@push('post-scripts')
					<script>
						$(function(){
							var divToPrint=document.getElementById('printAllRecord');
							var newWin=window.open('','Print-Window');
							newWin.document.open();
							newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
							newWin.document.close();
							setTimeout(function(){newWin.close();},10);
						});
					</script>

					@endpush