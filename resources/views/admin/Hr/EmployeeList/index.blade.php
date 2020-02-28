@extends('_layouts.admin.default')
@section('title', 'Employee List')
@section('content')
@php($levelName='')
<style>
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
		border: solid 1px #fff;
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
	.table_1 th ,.table_1 td{
		border: 1px solid #000!important;
		text-align: center!important;
		font-size: 12px!important;
		color: #000!important;
	}
	th{
		border: 1px solid #000px;
		padding: 2px!important;
		width: 35px!important;
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
		padding: 4px!important;
		font-size: 12px!important;
		color: #000!important;
	}
</style>
<div class="content container-fluid" style="background-color: #fff;">
	<div style="display: block;">
		<div class="col-md-12">
			<button style="font-size:36px;color:#000d82;" onclick="printDivs(this,printAllRecord);"> <i class="fa fa-print"></i><br>
				<input type='button' id='btn' value='Print'  class="btn btn-primary float-center allrecord"></button>
			</div>
			
		<!-- <div class="col-md-12">
			<input type='button' id='btn' value='Print' onclick="printDivs(this,printAllRecord);" 
			class="btn btn-primary float-center allrecord" style="width: 100%;">
		</div> -->
		<div id="printableDiv">
			<div id="printAllRecord" style="padding-top: 15px;">
				<div>
					<div style="width: 100%;">
						<style>
							body {
								background-color: #fff;
							}
							table, th, td {
								border: 1px solid black;
								border-collapse: collapse;
							}
							.table_1 th ,.table_1 td{
								border: 1px solid #000!important;
								text-align: center!important;
								font-size: 12px!important;
								color: #000!important;
								padding: 4px 4px!important;
							}
							.table_2 th ,.table_2 td{
								border: 1px solid #000!important;
								text-align: center!important;
								font-size: 14px!important;
								color: #000!important;
								padding: 9px 9px!important;
							}
							page {
								background: white;
								display: block;
								margin: 0 auto;
								margin-bottom: 0.5cm;
								box-shadow: 0 0 0.5cm rgba(0,0,0,0.0);
							}
							page[size="A4"] {  
								width: 22.60cm;
								height: 29.7cm; 
							}
							page[size="A4"][layout="landscape"] {
								width: 29.7cm;
								height: 22.60cm;  
							}

							@media print {
								body, page {
									margin: 0;
									box-shadow: 0;
								}
							}
							@media print{@page {size: landscape}}
						</style>
						<div style="clear: both;"></div>

						<page  size="A4" layout="landscape" style="page-break-after: always!important;padding: 20px;clear: both!important;">
							<div class="logo_heading" style="margin: 0 auto; width: 400px;padding-top: 30px;">
								<img src="{{asset('images/school/alis pvt ltd.png')}}">
								<p style="text-align: right;">Employee List of  {{ isset($month)? getMonthName($month) : ''}}-{{$year}}</p>
							</div>

							<div style="width: 100%; float: left; margin-left: 0px;">
								<table style="width: 100%;">
									<thead>
										<tr>
											<th class="border-0 text-uppercase small font-weight-bold" style="min-width: 210px!important;">
												{{ isset($month)? getMonthName($month) : ''}}-{{$year}}<br><p class="baranchName"></p><br><p class="courseName"></p></th>
												@for($i=1; $i<=$month_days; $i++)
												<th>{{$i}}</th>
												@endfor
											</tr>
										</thead>
										<tbody id="dataTable">

											@php($empCounter=1)
											@foreach($datas as $data)


											<tr >
												<td style="border-bottom: 1px solid!important;min-width: 210px!important;"> {{$data->emp_id.' '.$data->name}}</td>
												@for($i=1; $i<=$month_days; $i++)

												<?php

												$date="$year".'-'."$month".'-'."$i";
												$att_date=$data->get_attandanceByMonth($date);
												?>

												<td>@if($att_date)
													<i style="color: green" class="fa">&#xf00c;</i>
													@else

													<!-- <i style=" color:red" class="fa">&#xf00d;</i> -->
													@endif
												</td> 

												@endfor
											</tr>
											@php($empCounter++)
											@endforeach
										</tbody>
									</table>
									<div style="width: 100%;">
										<div style="width:45%;margin-top: 20px;">
											<p style="padding-left: 30px;">Total Employee : <strong>{{$empCounter}}</strong> </p>
										</div>

									</div>
								</div>
							</page>


						</div>
					</div>
				</div>
			</div>

		</div>
		@endsection
		@push('post-styles')
		@endpush
		@push('post-scripts')
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script>

			function printDivs(eve,obj)
			{
				console.log('printId',$(obj).attr('id'));

				var divToPrint=document.getElementById($(obj).attr('id'));

				var newWin=window.open('','Print-Window');

				newWin.document.open();

				newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

				newWin.document.close();

				setTimeout(function(){newWin.close();},10);
			}
		</script>

		@endpush