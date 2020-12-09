@extends('_layouts.admin.default')
@section('title', 'Outstanding Fee Challan')
@section('content')
@php($monthName=(getMonthName($month)))

<style>
	table{
		border-spacing: 0px!important;
		border-collapse: collapse;!important;
	}
	@page {
		size: A4;
		margin: 4mm!important;
	}
	@media print {
		.page {
			margin: 0;
			border: initial;
			border-radius: initial;
			width: initial;
			min-height: initial;
			box-shadow: initial;
			background: initial;
			page-break-after: always!important;
		}
table, th, td {
    font-size: 12px;
    padding: 0px 2px!important;
}

		table{
			border-spacing: 0px!important;
			border-collapse: collapse!important;
		}

	</style>
	<div class="content container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">

				@if(isset($record->student) && count($record->student))

				<div class="col-md-12">

					<button style="font-size:36px;color:#000d82;" onclick="printDiv(this,printAllRecord);"> <i class="fa fa-print"></i><br><input type='button' id='btn' value='Print'  class="btn btn-primary float-center allrecord"></button>

					<!-- <a href="{{url('admin/student/fee/challan/pdf/'.''.$branch_id.'/'.$class_id.'/'.$ly_no)}}"><button style="font-size:36px;color:#000d82;" > <i class="fa fa-doc"></i><br><input type='button' id='btn' value='Pdf'  class="btn btn-info float-center allrecord"></button></a> -->
				</div>
				<div class="col-md-12">


				</div>
				<br><br>
				<div id="printAllRecord" style="height: 1000px;">


					@foreach($record->student as $data)

					@if(isset($data->status) && ($data->status==1))

					@if(isset($class_id) && ($class_id!=0) && ($data->course_id!=$class_id))

					@else

					@if(isset($ly_no) && !empty($ly_no) &&($ly_no!=0) && ($data->id!=$ly_no))

					@else


					<section class="Report">


						<div  id="DivIdToPrint{{$data->id}}" >
							<style>
								table,th,td{
									font-size: 13px;padding: 1px  2px;
								}
							</style>
							<br>

							@php($feeArray=array())


							@isset($data->feePost[0])
							@php(array_push($feeArray, $data->feePost[0]))
							@endisset

                            @foreach($data->feePost as $feeRecords)

                                @if($feeRecords->fee_month==12 && $feeRecords->fee_year==2020 )

                                    @php($decFee=$feeRecords)
                                @endif
                            @endforeach


							@if(isset($feeArray[0]) )

							@php($feeFactor=$feeArray[0]->fee_factor?$feeArray[0]->fee_factor:(isset($data->studentFee['m'.$month])?$data->studentFee['m'.$month]:0))

							@php($feeMonth=$feeArray[0]->fee_this_month?$feeArray[0]->fee_this_month:(isset($feeArray[0]->current_fee)?(round(($feeArray[0]->current_fee))):0))

							<div class="main_div page" style="max-height: 1000px;">
								<div style="border: 1px solid;padding: 5px;margin-top: -25px;margin-right: 10px;max-height: 100px; width: 98%">
									<span style="margin-left:100px;font-size: 20px"><b >@if(isset($record->userSetting->school_name) && $record->userSetting->school_name){{$record->userSetting->school_name}} @else{{(' American Lyceum International School')}}@endif</b></span>
									<i style="float: right">Outstanding Challan</i>
									<br>

									@if(isset($record->userBank) && count(($record->userBank)))
									@foreach($record->userBank as $banks)
									@isset($banks->bank->bank_name)<b style="">{{$banks->bank->bank_name}}</b> ,@endisset
									@endforeach

									<br>
									<i style="float: right">{{$record->branch_name}}</i>

									<b style="text-align: right">@if(isset($record->userSetting->account_no) && $record->userSetting->account_no) {{$record->userSetting->account_no}} @else Credit MCB Bank Ltd:AC#4011076351010132 @endif</b>
									@else

									<b style="">MCB</b>,<b style="margin-left: 0px">UBl Omni</b>,<b style="margin-left: 5px">HBL Konnect, Alfalah , Mobi Cash</b><br>
									<i style="float: right">{{$record->branch_name}}</i>
									<b style="text-align: right">Credit MCB Bank Ltd:AC#4011076351010132 </b>
									@endif



								</div>
								<div style="border: 1px solid;padding: 5px;margin-top: 2px;margin-right: 10px;max-height: 120px; width: 98%;">
									<b>{{$data->s_name}}</b>
									<b>&nbsp;&nbsp;@if(isset($data->course->course_name)){{$data->course->course_name}} @endif</b><i style="float: right"></i><i style="float: right">Student Copy</i>&nbsp;&nbsp;&nbsp; <i> ID#@if(isset($feeArray[0]['id'])){{$feeArray[0]['id']}}@else {{000}} @endif</i>

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
												@if(isset($data->account->ledger) && count($data->account->ledger)>0)
												@foreach($data->account->lengthLedger->sortBy('id') as $account)
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
												<div style="float: left; width: 300px;"> <br><strong>Due date  =  @if($feeArray[0]->outstand_lastmonth > 0)
													{{date("d-M-Y", strtotime("2020-12-15"]))}}
													@else
													{{date("d-M-Y", strtotime("2020-12-15"))}}
												@endisset</strong> After due date bank must charge @if(isset($record->userSetting->currency) && $record->userSetting->currency){{$record->userSetting->currency}}@else{{(' Rs')}} @endif. @if(isset($record->userSetting->fine) && $record->userSetting->fine){{$record->userSetting->fine}}@else{{('40')}} @endif/- fine per day</div>
												<br>


												<i style="float: left">Outstanding Challan</i>
												<p style="float: right; ">&nbsp;&nbsp; Accounts contact(@if(isset($record->userSetting->acctant_no) && $record->userSetting->acctant_no >0) {{$record->userSetting->acctant_no}} @else 03464292920 @endif) </p><div><span> SID#@isset($data->id){{$data->id}}@endisset</span></div>

											</div>
										</div>
										<div  style="max-height: 40%;">
											<div style=" float: right; margin-top: 2px;border: 1px solid;font-size: 13px; width: 37.50%;">
												<div >Annual Fee:  @if(isset($data->studentFee['annual_fee'])){{$data->studentFee['annual_fee']}}@else {{0}}  @endif : Total Outstanding :@if(isset($data->studentFee['installment_no'])){{$data->studentFee['installment_no']}}@else {{0}}@endif </div>
												<div> Annual Scholarship : @if(isset($data->studentFee['scholarship_of'])){{$data->studentFee['scholarship_of']}}@else {{0}}@endif :Net Fee: @if(isset($data->studentFee['Net_AnnualFee'])){{$data->studentFee['Net_AnnualFee']}}@else {{0}}@endif </div>

												<div> Net Monthly : @if(isset($feeMonth)){{ round(($feeMonth)) }} @else {{0}}@endif </div>

											</div>
											<table border="" style="font-size: 13px; border-collapse: collapse!important; width: 38%; float: right;">


												<tr>
													<th>Description</th>
													<th>Amount</th>

												</tr>

												<tr>
													<td><i>Admission Fee</i>/<i>Registration</i></td>
													<td><i style="margin-left: 2px">0</i>/<i style="margin-left: 10px">0</i></td>
												</tr>

												@if(isset($record->userSetting->securityFee)  || isset($record->userSetting->deffered))
												@if(($record->userSetting->securityFee)  || ($record->userSetting->deffered))
												<tr>
													<td>
														@if(isset($record->userSetting->securityFee) && ($record->userSetting->securityFee))<i style="margin-left: 10px">Security</i>/ @endif
														@if(isset($record->userSetting->deffered) && ($record->userSetting->deffered))<i style="margin-left: 10px">Deferred </i></td> @endif
														<td>
															@if(isset($record->userSetting->securityFee) && ($record->userSetting->securityFee))
															<i style="margin-left: 2px">0</i>/
															@endif
															@if(isset($record->userSetting->deffered) && ($record->userSetting->deffered))
															<i style="margin-left: 10px">0</i>@endif
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
															<td><i style="margin-left: 2px">0</i><i style="margin-left: 5px"></i></td>

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
																<i style="margin-left: 2px">0</i>/
																@endif
																@if(isset($record->userSetting->utitlity) && $record->userSetting->compFee)
																<i style="margin-left: 5px">0</i>
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
																<i style="margin-left: 2px">0</i>/
																@endif
																@if($record->userSetting->labFee)
																<i style="margin-left: 2px">0</i>
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
																<i style="margin-left: 2px">0</i>/
																@endif
																@if($record->userSetting->acCharge)
																<i style="margin-left: 2px">0</i>
																@endif
															</td>
														</tr>
														@endif
														@endif
														@if(isset($record->userSetting->summerPack) || isset($record->userSetting->Insurace))
														@if(($record->userSetting->summerPack) || ($record->userSetting->Insurace))
														<!-- <tr>
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
																<i style="margin-left: 2px">0</i>/
																@endif
																@if($record->userSetting->Insurace)
																<i style="margin-left: 2px">0</i>
																@endif
															</td>
														</tr> -->
														<tr>
															<td>
																<i style="margin-left: 10px">Discount</i>


															</td>
															<td>
																<i style="margin-left: 2px">
																	0
																</i>


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
																<i style="margin-left: 2px">0</i>/
																@endif
																@if($record->userSetting->uniFee)
																<i style="margin-left: 2px">0t</i>
																@endif
															</td>
														</tr>
														@endif
														@endif

														<tr>
															<td><i style="margin-left: 10px">@if(isset($feeArray[0]['misc1'])){{substr($feeArray[0]['misc1'], 0, 10)}}@else {{''}} @endif Misc1</i>/<i style="margin-left: 10px">Misc2</i></td>
															<td><i style="margin-left: 2px">0</i>/<i style="margin-left: 2px">0</i></td>
														</tr>





														<tr>
															<td><i style="margin-left: 10px">Outstanding </i><i style="margin-left: 10px"></i></td>
															<td><i style="margin-left: 2px">
                                                                @if(isset($data->account->ledger) && count($data->account->ledger)>0)
                                                                    {{$data->account->ledger[count($data->account->ledger)-1]->balance - (isset($decFee->total_fee)?$decFee->total_fee:0) }}
                                                                @endif
                                                            </i><i style="margin-left: 2px"></i></td>
														</tr>

														<tr>
															<td><i style="margin-left: 10px">Last Month Late deposit Fine</i><i style="margin-left: 2px"></i></td>
															<td><i style="margin-left: 2px">0</i><i style="margin-left: 2px"></i></td>
														</tr>





														<tr>
															<td><i style="margin-left: 10px"><b>Total Outstanding </b></i><i style="margin-left: 10px"></i></td>

															<td><i style="margin-left: 2px"></i>
																@if(isset($data->account->ledger) && count($data->account->ledger)>0)
                                                                    {{$data->account->ledger[count($data->account->ledger)-1]->balance - (isset($decFee->total_fee)?$decFee->total_fee:0) }}
                                                                @endif
																<i style="margin-left: 5px"></i></td>

														</tr>
														<tr>
															<td><i style="margin-left: 10px">Deffered from prev month ( + )</i><i style="margin-left: 10px"></i></td>
															<td><i style="margin-left: 2px"></i>0<i style="margin-left: 2px"></i></td>
														</tr>

														@if(isset($feeArray[0]->student->branch->userSetting->deffered) )
														<tr>
															<td><i style="margin-left: 10px"></i>deffer to next month ( - )<i style="margin-left: 10px"></i> </td>
															<td><i style="margin-left: 2px"></i>0<i style="margin-left: 5px"></i></td>
														</tr>
														@endif






														<tr>
															<td><i style="margin-left: 10px"><b>Payable Before due date</b></i><i style="margin-left: 10px"></i></td>
															<td><i style="margin-left: 2px"><b>
                                                                @if(isset($data->account->ledger) && count($data->account->ledger)>0)
                                                                    {{$data->account->ledger[count($data->account->ledger)-1]->balance - (isset($decFee->total_fee)?$decFee->total_fee:0) }}
                                                                @endif
                                                                </b></i><i style="margin-left: 2px"></i></td>
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
												<i style="float: right">Outstanding Challan</i>
												<br>

												@if(isset($record->userBank) && count(($record->userBank)))
												@foreach($record->userBank as $banks)
												@isset($banks->bank->bank_name)<b style="">{{$banks->bank->bank_name}}</b> ,@endisset
												@endforeach

												<br>
												<i style="float: right">{{$record->branch_name}}</i>

												<b style="text-align: right">@if(isset($record->userSetting->account_no) && $record->userSetting->account_no) {{$record->userSetting->account_no}} @else Credit MCB Bank Ltd:AC#4011076351010132 @endif</b>
												@else
												<b style="">MCB</b>,<b style="margin-left: 0px">UBl Omni</b>,<b style="margin-left: 5px">HBL Konnect, Alfalah , Mobi Cash </b><br>
												<i style="float: right">{{$record->branch_name}}</i>
												<b style="text-align: right">Credit MCB Bank Ltd:AC#4011076351010132 </b>
												@endif



											</div>
											<div style="border: 1px solid;padding: 5px;margin-top: 2px;margin-right: 10px;max-height: 120px; width: 98%;">
												<b>{{$data->s_name}}</b>
												<b>&nbsp;&nbsp;@if(isset($data->course->course_name)){{$data->course->course_name}} @endif</b><i style="float: right"></i><i style="float: right">School Copy</i>&nbsp;&nbsp;&nbsp; <i> ID#@if(isset($feeArray[0]['id'])){{$feeArray[0]['id']}}@else {{000}} @endif</i>

											</div>


											<table border="1px" style="font-size: 14px;padding: 1px  2px;width: 100%;border-spacing:unset!important;     border-collapse: collapse!important;" >

												<tr><th>Admission Fee/Registration</th><th>Security/Deferred</th><th>Exam </th><th style="width:160px">Comp Utility</th><th>Summer/Insuranc</th><th>Stationery/Science Lab</th></tr>
												<tr><td>@if(isset($feeArray[0]['admissionFee'])){{$feeArray[0]['admissionFee']}}@else{{0}}@endif/@if(isset($feeArray[0]['registerationFee'])){{$feeArray[0]['registerationFee']}}@else{{0}}@endif</td><td>@if(isset($data->studentFee['sec_fee'])){{$data->studentFee['sec_fee']}}@else{{0}}@endif/@if(isset($feeArray[0]['deffered_amount'])){{$feeArray[0]['deffered_amount']}}@else{{0}}@endif</td><td>@isset($feeArray[0]['examfee']){{$feeArray[0]['examfee']}}@endisset</td><td>@isset($feeArray[0]['examfee']){{$feeArray[0]['comp_fee']}}@endisset/0</td><td>@isset($feeArray[0]['examfee']){{$feeArray[0]['libfee']}}@endisset/0</td><td>@isset($feeArray[0]['statfee']){{$feeArray[0]['statfee']}}@endisset/@isset($feeArray[0]['labfee']){{$feeArray[0]['labfee']}}@endisset</td></tr>
												<tr>
													<td>Transport</td>
													<td>Misc1</td>
													<td>Misc2</td>
													<td>LastMDeff/Unapp Amount</td>
													<td>Outstanding</td>
													<td>AC Charge</td>
												</tr>
												<tr>
													<td>0</td>
													<td>0</td>
													<td>0</td>
													<td>0</td>
													<td>@isset($feeArray[0]->outstand_lastmonth){{$feeArray[0]->outstand_lastmonth}}@endisset</td>
													<td>@isset($feeArray[0]['accharge']){{$feeArray[0]['accharge']}}@endisset</td></tr>
												</table>
												<div class="calculation" style="float: right;border: 1px solid">
													<table border="1px solid" style="font-size: 14px;padding: 1px  2px;border-spacing:unset!important;     border-collapse: collapse!important;">
														<tr>
															<td>
																<i>Outstanding</i>
															</td>
															<td>@if(isset($data->account->ledger) && count($data->account->ledger)>0)
                                                                    {{$data->account->ledger[count($data->account->ledger)-1]->balance - (isset($decFee->total_fee)?$decFee->total_fee:0) }}
                                                                @endif</td>

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
																                                                                    {{$data->account->ledger[count($data->account->ledger)-1]->balance - (isset($decFee->total_fee)?$decFee->total_fee:0) }}

															</td>
														</tr>

													</table>
												</div>
												<div style="float: left; width: 300px;"><br> <strong>Due date  =  @if($feeArray[0]->outstand_lastmonth > 0)
													{{date("d-M-Y", strtotime("2020-12-15"]))}}
													@else
													{{date("d-M-Y", strtotime("2020-12-15"))}}
												@endisset</strong> After due date bank must charge @if(isset($record->userSetting->currency) && $record->userSetting->currency){{$record->userSetting->currency}}@else{{(' Rs')}}@endif. @if(isset($record->userSetting->fine) && $record->userSetting->fine){{$record->userSetting->fine}}@else{{('40')}} @endif /- fine per day</div>
												<br>
												<div><span> SID#@isset($data->id){{$data->id}}@endisset</span></div>

												<i style="float: left">@if(isset($feeArray[0]['fee_month'])){{getMonthName($feeArray[0]['fee_month'])}} @endisset/@if(isset($feeArray[0]['fee_year'])){{$feeArray[0]['fee_year']}}@else{{''}}@endif</i>
											</div>
											<div class="school" style="margin-bottom:50px;">
												<div style="border: 1px solid;padding: 5px;margin-top: -18px;margin-right: 10px;max-height: 100px; width: 98%">
													<span style="margin-left:100px;font-size: 20px"><b >@if(isset($record->userSetting->school_name) && $record->userSetting->school_name){{$record->userSetting->school_name}} @else{{(' American Lyceum International School')}}@endif</b></span>
													<i style="float: right">@if(isset($feeArray[0]['fee_month'])){{getMonthName($feeArray[0]['fee_month'])}} @endisset/@if(isset($feeArray[0]['fee_year'])){{$feeArray[0]['fee_year']}}@else{{''}}@endif</i>
													<br>

													@if(isset($record->userBank) && count(($record->userBank)))
													@foreach($record->userBank as $banks)
													@isset($banks->bank->bank_name)<b style="">{{$banks->bank->bank_name}}</b> ,@endisset
													@endforeach

													<br>
													<i style="float: right">{{$record->branch_name}}</i>

													<b style="text-align: right">@if(isset($record->userSetting->account_no) && $record->userSetting->account_no) {{$record->userSetting->account_no}} @else Credit MCB Bank Ltd:AC#4011076351010132 @endif</b>
													@else
													<b style="">MCB</b>,<b style="margin-left: 0px">UBl Omni</b>,<b style="margin-left: 5px">HBL Konnect, Alfalah , Mobi Cash</b><br>
													<i style="float: right">{{$record->branch_name}}</i>
													<b style="text-align: right">Credit MCB Bank Ltd:AC#4011076351010132 </b>
													@endif



												</div>
												<div style="border: 1px solid;padding: 5px;margin-top: 2px;margin-right: 10px;max-height: 120px; width: 98%;">
													<b>{{$data->s_name}}</b>
													<b>&nbsp;&nbsp;@if(isset($data->course->course_name)){{$data->course->course_name}} @endif</b><i style="float: right"></i><i style="float: right">Bank Copy</i>&nbsp;&nbsp;&nbsp; <i> ID#@if(isset($feeArray[0]['id'])){{$feeArray[0]['id']}}@else {{000}} @endif</i>

												</div>


												<table border="1px" style="font-size: 14px;padding: 1px  2px;width: 100%;border-spacing:unset!important;     border-collapse: collapse!important;" >

													<tr><th>Admission Fee/Registration</th><th>Security/Deferred</th><th>Exam </th><th style="width: 160px">Comp Utility</th><th>Summer/Insuranc</th><th>Stationery/Science Lab</th></tr>
													<tr><td>@if(isset($feeArray[0]['admissionFee'])){{$feeArray[0]['admissionFee']}}@else{{0}}@endif/@if(isset($feeArray[0]['registerationFee'])){{$feeArray[0]['registerationFee']}}@else{{0}}@endif</td><td>@if(isset($data->studentFee['sec_fee'])){{$data->studentFee['sec_fee']}}@else{{0}}@endif/@if(isset($feeArray[0]['deffered_amount'])){{$feeArray[0]['deffered_amount']}}@else{{0}}@endif</td><td>@isset($feeArray[0]['examfee']){{$feeArray[0]['examfee']}}@endisset</td><td>@isset($feeArray[0]['examfee']){{$feeArray[0]['comp_fee']}}@endisset/0</td><td>@isset($feeArray[0]['examfee']){{$feeArray[0]['libfee']}}@endisset/0</td><td>@isset($feeArray[0]['statfee']){{$feeArray[0]['statfee']}}@endisset/@isset($feeArray[0]['labfee']){{$feeArray[0]['labfee']}}@endisset</td></tr>
													<tr>
														<td>Transport</td><td>Misc1</td><td>Misc2</td><td>LastMDeff/Unapp Amount</td>
														<td>Outstanding</td>
														<td>AC Charge</td>
													</tr>
													<tr>
														<td>0</td>
														<td>0</td>
														<td>0</td>
														<td>0</td>
														<td>@if(isset($data->account->ledger) && count($data->account->ledger)>0)
                                                                    {{$data->account->ledger[count($data->account->ledger)-1]->balance - (isset($decFee->total_fee)?$decFee->total_fee:0) }}
                                                                @endif</td></tr>
													</table>
													<div class="calculation" style="float: right;border: 1px solid">
														<table border="1px solid" style="font-size: 14px;padding: 1px  2px;border-spacing:unset!important;     border-collapse: collapse!important;">
															<tr>
																<td>
																	<i>Outstanding</i>
																</td>
																<td>@if(isset($data->account->ledger) && count($data->account->ledger)>0)
                                                                    {{$data->account->ledger[count($data->account->ledger)-1]->balance - (isset($decFee->total_fee)?$decFee->total_fee:0) }}
                                                                @endif</td>

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
																	                                                                @endif

																</td>
															</tr>

														</table>
													</div>
													<div style="float: left; width: 300px;"> <strong>Due date  =  @if($feeArray[0]->outstand_lastmonth > 0)
														{{date("d-M-Y", strtotime("2020-12-15"]))}}
														@else
														{{date("d-M-Y", strtotime("2020-12-15"))}}
													@endisset</strong> After due date bank must charge @if(isset($record->userSetting->currency) && $record->userSetting->currency){{$record->userSetting->currency}}@else{{(' Rs')}}@endif. @if(isset($record->userSetting->fine) && $record->userSetting->fine){{$record->userSetting->fine}}@else{{('40')}} @endif /- fine per day</div><br>
													<div><span >    SID#@isset($data->id){{$data->id}}@endisset</span></div><br>
																											<i style="float: left;margin-top: -10px;">@if(isset($feeArray[0]['fee_month'])){{getMonthName($feeArray[0]['fee_month'])}} @endisset/@if(isset($feeArray[0]['fee_year'])){{$feeArray[0]['fee_year']}}@else{{''}}@endif</i>

													<div>


													</div>

												</div>
											</div>

										</div>
										<!--  <input type='button' id='btn' value='Print' id="DivIdToPrint{{$data->id}}" onclick="printDiv(DivIdToPrint{{$data->id}});" class="btn btn-primary">  -->
										@endif
										@endif
										@endif

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
					@endsection
					@push('post-styles')

					@endpush
					@push('post-scripts')
					<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
					<script>

						function printDiv(eve,obj)
						{
							console.log('printId',$(obj).attr('id'));

							var divToPrint=document.getElementById($(obj).attr('id'));

							var newWin=window.open('','Print-Window');

							newWin.document.open();

							newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

							newWin.document.close();

							setTimeout(function(){newWin.close();},10);

						}

						function pdfDiv(eve,obj){

							console.log('pdf');
							var jsVal = '';
							var specialElementHandlers = {
								'#editor': function (element, renderer) {
									return true;
								}
							};
							function generatePdf(jsVal){
								var doc = new jsPDF();

								doc.fromHTML($('#printAllRecord'+jsVal).html(), 15, 15, {
									'width': 170,
									'elementHandlers': specialElementHandlers
								});
								var pdfName = $('#printAllRecord'+jsVal+' .pdfName').html();
					   // console.log();
					   doc.save(pdfName.replace(/ /g,"_") + '.pdf');
					}
				}
			</script>
			<script>
				(function () {
					var
					form = $('.form'),
					cache_width = form.width(),
         a4 = [595.28, 841.89]; // for a4 size paper width and height

         $('#create_pdf').on('click', function () {
         	$('body').scrollTop(0);
         	createPDF();
         });
        //create pdf
        function createPDF() {
        	getCanvas().then(function (canvas) {
        		var
        		img = canvas.toDataURL("image/png"),
        		doc = new jsPDF({
        			unit: 'px',
        			format: 'a4'
        		});
        		doc.addImage(img, 'JPEG', 20, 20);
        		doc.save('Bhavdip-html-to-pdf.pdf');
        		form.width(cache_width);
        	});
        }

        // create canvas object
        function getCanvas() {
        	form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
        	return html2canvas(form, {
        		imageTimeout: 2000,
        		removeContainer: true
        	});
        }

    }());
</script>
@endpush
