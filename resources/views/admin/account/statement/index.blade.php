@extends('_layouts.admin.default')
@section('title', 'Statement')
@section('content')
<div class="content container-fluid" style="background-color: #fff;">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<style type="text/css">
				.table_1 th ,.table_1 td{
					border: 1px solid #000!important;
					text-align: center!important;
					font-size: 12px!important;
					color: #000!important;
				}
				.table_1 tr{
					border-top: 1px solid #000!important;
					border-bottom: 1px solid #000!important;
				}
				.page[size="A4"][layout="landscape"] {
					width: 29.7cm;
					height: 21cm;  
				}
				th{
					padding: 2px!important;
					text-transform: 
				}
				.nav_bva{
					text-align: center;
					font-size: 20px;
					font-weight: bold;
				}
				.nav_bva1{
					text-align: left;
					font-size: 18px;
					width: 50%;
				}
				.total_navaq{
					width: 48%;
					display: inline-block;
				}
				.table_1 td{
					padding: 2px!important;
					font-size: 12px!important;
					color: #000!important;
				}

				@page { size: auto;  margin: 5mm!important;}
			</style>
			
			<div class="col-md-12">

				<button style="font-size:36px;color:#000d82;" onclick="printDivs(this,printAllRecord);"> <i class="fa fa-print"></i><br><input type='button' id='btn' value='Print'  class="btn btn-primary float-center allrecord"></button>
			</div>

			<br><br>
			<section id="printAllRecord">
				<div class="DivIdToPrint">
					<div  id="DivIdToPrint">
						<div  style="float: right;">
							<div style="float: right;">Printed On:{{date('d-M-Y')}}</div>
						</div>
						<div class="" style="margin-top: 25px; text-align: center;">
							<div class="logo_heading" style="width: 40%; margin: 0 auto;">
								<img src="{{asset('images/school/alis pvt ltd.png')}}">
							</div>
						</div>
						<div  style="margin-top: 40px;">
							<div class="container">
								<div class="nav_bva">
									Student Statement
								</div>
								<br>
								<div style="float: left;margin-top: -15px;"><strong>{{$account[0]->account->student->id.'  '.$account[0]->account->student->s_name}} &nbsp; &nbsp; @if($account[0]->account->student->is_freeze=='0') <span class="badge badge-info">freeze</span> @else  @if($account[0]->account->student->status) <span class="badge badge-success">Active</span> @else <span class="badge badge-danger">Deactive</span> @endif @endif</strong></div>
								<div  style="float: right; margin-top: -20px; float: right;">{{$account[0]->account->student->s_phoneNo}}  </div>
								<div style="width: 40%;"></div><br>
								<strong>Branch: </strong>{{$account[0]->account->student->branch->branch_name}}
								<strong>Class:</strong> @isset($account[0]->account->student->course->course_name){{$account[0]->account->student->course->course_name}}@endisset

							</div>
							<table class="table_1">
								<thead>
									<tr style="border-top: 1px solid #000!important;border-bottom:1px solid #000!important;">
										<th><div >Date</div></th>
										<th><div>Fee-Id</div></th>
										<th><div>Month/Year</div></th>
										<th><div style="width: 300px;">Desc</div></th>
										<th ><div>comp/Exam</div></div></th>
										<th><div>Ac/Utility</div></th>
										<th><div>Stat/Trans </div></th>
										<th><div>Mon Fee / fact</div></th>
										<th><div>Fine</div></th>
										<th ><div>Debit </div></th>
										<th ><div>Credit</div></th>
										<th> <div>Balance </div></th>

									</tr>

								</thead>
								<tbody>
									@foreach($account as $master)
									<tr>
										<td>{{date("d-m-y", strtotime($master->posting_date))}}</td>
										<td>@isset($master->feePost){{$master->feePost->id}}@endisset</td>
										<td>@isset($master->feePost){{getMonthName($master->feePost->fee_month).'/ '. $master->feePost->fee_year}}@endif</td>
										<td style="max-width: 65px;">@isset($master->description){{($master->description)}}@endisset</td>
										<td>@isset($master->feePost){{$master->comp_fee.'/'.$master->feePost->examfee}}@endisset</td>
										<td>@isset($master->feePost){{$master->feePost->accharge.'/'.$master->feePost->utility_fee}}@endisset</td>
										<td>@isset($master->feePost){{$master->feePost->statfee.'/'.$master->feePost->transport_fee}}@endisset</td>
										<td>@isset($master->feePost->current_fee){{($master->feePost->current_fee).'/'.($master->feePost->student->studentFee['m'.$master->feePost->fee_month])}}@endisset</td>
										<td>@if(isset($master->feePost) && ($master->fee_id) &&  empty($master->correction_id)){{$master->feePost->fine}} @else 0 @endif</td>
										<td>@isset($master->a_debit){{$master->a_debit}}@endisset</td>
										<td>@isset($master->a_credit){{$master->a_credit}}@endisset</td>
										<td>@isset($master->balance){{$master->balance}}@endisset</td>								
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endsection

		@push('post-scripts')
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
		<script type="text/javascript">
			function printDivs(eve,obj)
			{
				$("#"+$(obj).attr('id')).print();

			}
		</script>
		@endpush