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
<form action="{{route('update-student-statement.update',$student->id)}}" method="POST"  enctype="multipart/form-data">
										@csrf
										@method("PUT")
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th > Db/cr </th>
											<th > Description </th>
											<th> Cheque No.  </th>
											<th> Amount  </th>
											<th> Posting Date  </th>
											<th>Action</th>


										</tr>
									</thead>
									
										<input type="hidden" name="std_id" value="@isset($ly->id){{$ly->id}}@endisset">
										<tbody id="qualificationRows">
											<tr>
												<td> 
													<select name="amount_type[]" class="" >
														<option  value="DB" >DB</option>
														<option  value="CR"  >CR</option>
													</select>  
												</td>
												<td><input type="text" name="description[]" value="" > </td>
												<td> <input type="text" name="cheque[]" value=""> </td>
												<td> <input type="number" min="0" step="any"  class="amount" value="0" name="amount[]" ></td>
												<td> <input type="date" name="posting_date[]" value="{{date('d-m-Y')}}" > </td>
												<td><div class="btn btn-danger pull-right deleteQualification">-</div></td>

											</tr>


										</tbody>



									</table>
								</div>
								<div class="btn btn-primary pull-right addQualification" style="margin-left: 10px; margin-top: 15px;">+</div>
							</br>
						</br>
					</br>
				</br>


				<div class="card formsubmit" style="width:100%; display: block;" >
					<div class="card-block">
						<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
							<button class="btn btn-primary ks-rounded"> Submit </button>
							<button class="btn btn-success ks-rounded">Cancel</button>
						</div>
					</div>
				</div>




		</div>
	</div>
</div>
</div>
</div>
@endsection

@push('post-scripts')
<script type="text/javascript">
	function printDivs(eve,obj)
	{
		$("#"+$(obj).attr('id')).print();

	}
	$(document).ready(function(){
		$(document).ready(function(){
			$(document).on('click', '.addQualification', function(e) {
				var htmlContent=`<tr>
				<td> 
				<select name="amount_type[]" class="" >
				<option  value="DB" >DB</option>
				<option  value="CR"  >CR</option>
				</select>  
				</td>
				<td><input type="text" name="description[]" value="" > </td>
				<td> <input type="text" name="cheque[]" value=""> </td>
				<td> <input type="number" min="0" step="any  class="amount" value="0" name="amount[]" ></td>
				<td> <input type="date" name="posting_date[]" value="{{date('d-m-Y')}}" > </td>
				<td><div class="btn btn-danger pull-right deleteQualification">-</div></td>

				</tr>`;

				$('#qualificationRows').append(htmlContent);
			});
		});
		$(document).on('click', '.deleteQualification', function(e) {
			var rowCount = $('#qualificationRows tr').length;
			console.log('row count',rowCount);
			$(this).parent().parent('tr').remove();
		});
		$('input[name=martial_status]').on('change', function() {
			InputShow();
		});
		$('input[name=gender]').on('change', function() {
			InputShow();
		});
	});
</script>
@endpush