@extends('_layouts.admin.default')
@section('title', 'Attendace Sheet')
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
<!-- @foreach ($students as $users_list)			
@if(isset($users_list->course->Students) && count($users_list->course->Students))
<page size="A4" layout="landscape" style="page-break-after: always!important;padding: 20px;clear: both!important;padding: 15px;clear: both!important;">
	<div style="transform: rotate(90deg);
    width: 100%;  min-height: 1100px;margin-left: 0px!important;">
			<div class="logo_heading" style="margin: 0 auto; width: 65%;">
			<img src="{{asset('images/school/alis pvt ltd.png')}}">
				<p style="text-align: center;">Attendance Sheet of @isset($students[0]->branch) {{$students[0]->branch->branch_name}}@endisset For {{date("M-y", strtotime(date('d-m-Y'))) }}</p>
			</div>
				@if(isset($users_list->course->course_name) && ($levelName!=$users_list->course->course_name))
				<h4>{{$users_list->course->course_name}}</h4>
					@endif
						<div style="width: 45%; float: left;">
							<table class="table_1" style="width: 90%;">
								<thead>
									<tr>
										<th >Date</th>
										<th  style="min-width: 210px;">No of students</th>
										<th >sig</th>
										<th  style="min-width: 210px;"> </th>
									</tr>
									<tr>
										<td>1</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>2</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>3</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>4</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>5</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>6</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>1</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>7</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>8</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>9</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>10</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>11</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>12</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>13</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>14</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>15</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>16</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>17</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>18</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>19</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>20</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>21</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>22</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>23</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>24</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>23</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>25</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>26</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>27</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>28</td>
										<td></td>
										<td></td>
										<td></td> 
									</tr>
									<tr>
										<td>29</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>30</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>31</td>

										<td></td>
										<td></td>
										<td></td>
									</tr>
								</thead>
							</table>
						</div>
						<div style="width:53%; float: right;">
							<p style="padding-left: 44px;font-size: 12px;">Total students <strong>received</strong> fee vouchers </p><br>
							<p><br><hr style="width: 120px;margin-top: -18px; height: 2px solid #000;margin-left: 72px;  float: left;"></p>

							<p style="padding-left: 44px;font-size: 12px;">Total students <strong>not received</strong> fee vouchers  </p>		<br>
							<p><br><hr style="width: 120px;margin-top: -18px; height: 2px solid #000;margin-left: 72px; float: left;"></p>
						</div>
							</div>


				@endif
				@endforeach

</page> -->
@foreach ($students as $users_list)
@if(isset($users_list->course->Students) && count($users_list->course->Students))
<page  size="A4" layout="landscape" style="page-break-after: always!important;padding: 20px;clear: both!important;">
		<div class="logo_heading" style="margin: 0 auto; width: 400px;padding-top: 30px;">
		<img src="{{asset('images/school/alis pvt ltd.png')}}">
		<p style="text-align: right;">Attendance Sheet of @isset($students[0]->branch) {{$students[0]->branch->branch_name}}@endisset For {{date("M-y", strtotime(date('d-m-Y'))) }}</p>
		</div>
			@if(isset($users_list->course->course_name) && ($levelName!=$users_list->course->course_name))
			<h4>{{$users_list->course->course_name}}</h4>
			@endif
						<div style="width: 100%; float: left; margin-left: 0px;">
							<table style="width: 100%;">
								<thead>
									<tr>
										<th class="border-0 text-uppercase small font-weight-bold" style="min-width: 210px!important;">
											{{date('M-y')}}<br><p class="baranchName"></p><br><p class="courseName"></p></th>
											<th class=" small font-weight-bold">Voucher<br>Deliver</th>
											<th>01</th>
											<th>02</th>
											<th>03</th>
											<th>04</th>   
											<th>05</th> 
											<th>06</th>   
											<th>07</th>  
											<th>08</th>
											<th>09</th>
											<th>10</th>
											<th>11</th>
											<th>12</th>
											<th>13</th>
											<th>14</th>   
											<th>15</th> 
											<th>16</th>   
											<th>17</th>  
											<th>18</th>
											<th>19</th>
											<th>20</th>
											<th>21</th>
											<th>22</th>
											<th>23</th>   
											<th>24</th> 
											<th>25</th>   
											<th>26</th>  
											<th>27</th>
											<th>28</th>
											<th>29</th>
											<th>30</th>
											<th>31</th>
										</tr>
									</thead>
									<tbody id="dataTable">
										@foreach($users_list->course->Students->chunk(22) as $students)


										@foreach($students as $student)

										@if(isset($branch_id) && $student->branch_id==$branch_id)

										<tr >
											<td style="border-bottom: 1px solid!important;min-width: 210px!important;"> {{$student->id.' '.$student->s_name}}</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										@endif
										@endforeach
										@endforeach
									</tbody>
								</table>
								<div style="width: 100%;">
									<div style="width:45%;margin-top: 20px;">
										<p style="padding-left: 30px;">Total students <strong>received</strong> fee vouchers<hr style="width: 120px;margin-top: -18px; height: 2px solid #000;float: right;"></p>
									</div>
									<div style="width:50%; float: right;margin-top: -38px;">
									<p style="padding-left: 30px;">Total students <strong>not received</strong> fee vouchers <hr style="width: 120px;margin-top: -18px; height: 2px solid #000; float: right;"> </p>
									</div>
								</div>
							</div>
                       	</page>
                       	@endif
						@endforeach
			
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