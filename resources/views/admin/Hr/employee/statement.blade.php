@extends('_layouts.admin.default')
@section('title', 'Employee Statement')
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
			<style type="text/css">



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

				.nav-tabs { border-bottom: 2px solid #DDD; }
				.nav-tabs > li a.active, .nav-tabs > li a.active:focus, .nav-tabs>li a.active:hover {
					width: 96%;
					outline: none;
					border: 1px solid #0071b3;
					padding-left: 5px;
					background-color: #0071b3;
					border-bottom-color: transparent;
				}
				.nav-tabs > li > a { border: none; color: #ffffff;background: #014772; }
				.nav-tabs > li.active > a, .nav-tabs > li > a:hover {
					border: none;
					color: #ffffff !important;
					background: #0282d0;
				}
				.nav-tabs > li > a::after { content: ""; background: #5a4080; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
				.nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
				.tab-nav > li > a::after { background: #5a4080 none repeat scroll 0% 0%; color: #fff; }
				.tab-pane { padding: 15px 0; }
				.tab-content{padding:20px}
				.nav-tabs > li {
					width: 20%;
					text-align: center;
					height: 50px;
					margin: 0px 4px;
				}
				.card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
				body{ background: #EDECEC; padding:50px}

				@media all and (max-width:724px){
					.nav-tabs > li > a > span {display:none;} 
					.nav-tabs > li > a {padding: 5px 5px;}
				}

				@page { size: auto;  margin: 0mm; margin-right: 5px; }

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
									Employee Statement
								</div>
								<br>
								<div style="float: left;margin-top: -15px;"><strong>{{$employee->id.'  '.$employee->name.' '.$employee->fname}} &nbsp; &nbsp; @if($employee->status=='0') <span class="badge badge-info">Left</span> @else <span class="badge badge-success">Active</span>   @endif</strong></div>
								<div  style="float: right; margin-top: -20px; float: right;">{{$employee->mobile}}  </div>
								<div style="width: 40%;"></div><br>
								<strong>Branch: </strong>@isset($employee->branch->branch_name){{$employee->branch->branch_name}} @endisset
								<strong>Designation:</strong> @isset($employee->desig){{$employee->desig->designation}}@endisset
							</div>

							<div class="card">
								<ul class="nav nav-tabs" role="tablist">

									<li role="presentation"><a href="#detail" class="active" aria-controls="detail" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Salary Posted</span></a></li>
									<li role="presentation" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Account Statment</span></a></li>
									<li role="presentation" ><a href="#maintain"  aria-controls="maintain" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Profident Fund</span></a></li>

								</ul>

								<!-- Tab panes -->

								<div class="tab-content">
									<!-- //////////////////////////////////////////////// -->
									

									<br>
									<div role="tabpanel" class="tab-pane active" id="detail">      
										<div class="nav_bva" style="margin-top: -20px;">
											Employee Salaries<span>&nbsp;&nbsp;  </span>
										</div>
										<br>

										<br>

										<div class="table-responsive">
											<table class="table  table-bordered" id="salaryPost">
												<thead>
													<tr >
													<th></th>
														<th>Date</th>
														<th>Month/Year</th>
														<th>Salary</th>
														<th>Total Days</th>
														<th>Absent </th>
														<th>Total Pay day</th>
														<th>Earlyoffdays</th>
														<th>totaldeductdays</th>
														<th>tax</th>
														<th>Total Salary</th>
														<th>actualSalaryGiven</th>

													</tr>
												</thead>
												<tbody>
													@php($counter=1)
													@if(isset($employee->salaryPost) && $employee->salaryPost)
													@foreach($employee->salaryPost as $salary)
													<tr>
														<td>{{$counter++}}</td>
														<td>{{$salary->created_at}}</td>
														<td>{{$salary->month}} / {{$salary->year}}</td>
														<td>{{$salary->current_salay}}</td>
														<td>{{$salary->total_days}}</td>
														<td>{{$salary->total_absent}}</td>
														<td>{{$salary->totalpaydays}}</td>
														<td>{{$salary->Earlyoffdays}}</td>
														<td>{{$salary->totaldeductdays}}</td>
														<td>{{$salary->tax}}</td>
														<td>{{$salary->total_salary}}</td>
														<td>{{$salary->actualSalaryGiven}}</td>

													</tr>
													@endforeach
													@endif
												</tbody>

											</table>
										</div>

									</div>

									<!-- ////////////////////////???????????????????????????????? -->

									<div role="tabpanel" class="tab-pane " id="home">      
										<div class="nav_bva" style="margin-top: -20px;">
											Account Statment<span>&nbsp;&nbsp;  </span>
										</div>
										<br>

										<br>

										<div class="table-responsive">
											<table class="table  table-bordered" id="EmployeeAccount">
												<thead>
													<tr >
														<th></th>
														<th>Date</th>
														<th>Month/Year</th>
														<th>Desc</th>
														<th >Dabit </th>
														<th >Credit</th>
														<th> Balance </th>

													</tr>


												</thead>
												<tbody>
													@php($counter=1)
													@if(isset($employee->EmployeeAccount) && $employee->EmployeeAccount)
													@foreach($employee->EmployeeAccount as $account)
													<tr>
														<td>{{$counter++}}</td>
														<td>{{$account->date}}</td>
														<td>{{$account->month}}/{{$account->year}}</td>
														<td>{{$account->description}}</td>
														<td >{{$account->Debit}} </td>
														<td >{{$account->credit}}</td>
														<td> {{$account->Balance}} </td>
													</tr>
													@endforeach
													@endif
												</tbody>
											</table>


										</div>
									</div>





									<!-- ?///////////////////////////////////////// here second tab start /////////////////////////////////////////////////////// -->
									<div role="tabpanel" class="tab-pane " id="maintain">  
										@php($counter=1)
										<div role="tabpanel" class="tab-pane " id="home">      <div class="nav_bva" style="margin-top: -20px;">
											Profident Fund <span>&nbsp;&nbsp;  </span>
										</div>
										<br>


										<br>

										<div class="table-responsive">
											<table class="table  table-bordered" id="profident_fund">
												<thead>
													<tr >
														<th></th>
														<th>Month/Year</div></th>
														<th>PF</th>
														<th >Total Pf </div></th>


													</tr>

												</thead>
												<tbody>
													@if(isset($employee->profident_fund) && $employee->profident_fund)
													@foreach($employee->profident_fund as $account)
													<tr>
														<td>{{$counter++}}</td>
														<td>{{$account->month}}/{{$account->year}}</td>
														<td>{{$account->pf_amount}}</td>
														<td >{{$account->total_pf_amount}} </td>

													</tr>
													@endforeach
													@endif
												</tbody>




											</table>
										</div>


									</div>
								</div>



							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
@push('post-styles')
	<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	@endpush
	@push('post-scripts')
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	
	
	<script src="{{asset('assets/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/bootstrap-datatable/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('assets/bootstrap-datatable/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/bootstrap-datatable/js/jszip.min.js')}}"></script>
	<script src="{{asset('assets/bootstrap-datatable/js/pdfmake.min.js')}}"></script>
	<script src="{{asset('assets/bootstrap-datatable/js/vfs_fonts.js')}}"></script>
	<script src="{{asset('assets/bootstrap-datatable/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('assets/bootstrap-datatable/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('assets/bootstrap-datatable/js/buttons.colVis.min.js')}}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script>
		$(document).ready(function() {



 //     var table = $('#profident_fund').DataTable( {
 //     	"order": [[ 0, "desc" ]],
 //     	lengthChange: false,
 //     	buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
 //     } );

 //     table.buttons().container()
 //     .appendTo( '#example_wrapper .col-md-6:eq(0)' );




 //     var table = $('#EmployeeAccount').DataTable( {
 //     	"order": [[ 0, "desc" ]],
 //     	lengthChange: false,
 //     	buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
 //     } );

 //     table.buttons().container()
 //     .appendTo( '#example_wrapper .col-md-6:eq(0)' );




 //     var table = $('#salaryPost').DataTable( {
 //     	"order": [[ 0, "desc" ]],
 //     	lengthChange: false,
 //     	buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
 //     } );

 //     table.buttons().container()
 //     .appendTo( '#example_wrapper .col-md-6:eq(0)' );


 // } );
			


	

		

	</script>



	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
	<script type="text/javascript">
		function printDivs(eve,obj)
		{
			$("#"+$(obj).attr('id')).print();

		}
	</script>
	@endpush