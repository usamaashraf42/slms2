@extends('_layouts.admin.default')
@section('title', 'PaySlip')
@section('content')
<div class="content container-fluid">
	
	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Payslip</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">Payslip</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<div class="btn-group btn-group-sm">
					<button class="btn btn-white">CSV</button>
					<!-- <button class="btn btn-white">PDF</button> -->
					<button class="btn btn-white" onclick="printDiv(this)"><i class="fa fa-print fa-lg"></i> Print</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	
	<div class="row" id="printHello">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<h4 class="payslip-title">Payslip for the month of {{get_month_name_by_no($data->month)}} {{$data->year}} </h4>
					<div class="row">
						<div class="col-sm-6 m-b-20">
							<img src="assets/img/logo2.png" class="inv-logo" alt="">
							<ul class="list-unstyled mb-0">
								<li>Tawakkal Foods</li>
								<li>Samanabad ,</li>
								<li>Lahore</li>
							</ul>
						</div>
						<div class="col-sm-6 m-b-20">
							<div class="invoice-details">
								<h3 class="text-uppercase">Payslip #{{$data->id}}</h3>
								<ul class="list-unstyled">
									<li>Salary Month: <span>{{get_month_name_by_no($data->month)}}, {{$data->year}}</span></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 m-b-20">
							<ul class="list-unstyled">
								<li><h5 class="mb-0"><strong>John Doe</strong></h5></li>
								<li><span>Web Designer</span></li>
								<li>Employee ID: @isset($data->employee){{$data->employee->name}} @endisset</li>
								<li>Joining Date: {{date('d M Y', strtotime($data->employee->joining_date))}} </li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div>
								<h4 class="m-b-10"><strong>Earnings</strong></h4>
								<table class="table table-bordered">
									<tbody>
										<tr>
											<td><strong>Basic Salary</strong> <span class="float-right">{{$data->monthly_salary}}</span></td>
										</tr>
										<tr>
											<td><strong>House Rent Allowance (H.R.A.)</strong> <span class="float-right">{{$data->house_rent}}</span></td>
										</tr>
										<tr>
											<td><strong>Conveyance</strong> <span class="float-right">{{$data->transport}}</span></td>
										</tr>
										<tr>
											<td><strong>Other Allowance</strong> <span class="float-right">{{$data->ta}}</span></td>
										</tr>
										<tr>
											<td><strong>Total Earnings</strong> <span class="float-right"><strong>{{$data->ta + $data->transport + $data->house_rent + $data->monthly_salary}}</strong></span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-sm-6">
							<div>
								<h4 class="m-b-10"><strong>Deductions</strong></h4>
								<table class="table table-bordered">
									<tbody>
										<tr>
											<td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-right">{{$data->tax}}</span></td>
										</tr>
										<tr>
											<td><strong>Provident Fund</strong> <span class="float-right">{{$data->pf}}</span></td>
										</tr>
										<tr>
											<td><strong>EOBI</strong> <span class="float-right">{{$data->eobi}}</span></td>
										</tr>
										<tr>
											<td><strong>Loan</strong> <span class="float-right">{{ $data->security }}</span></td>
										</tr>
										<tr>
											<td><strong>Total Deductions</strong> <span class="float-right"><strong>{{ $data->tax + $data->pf + $data->eobi }}</strong></span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-sm-12">
							<p><strong>Net Salary: {{ round($data->total_given,2) }}</strong> <!-- (Fifty nine thousand six hundred and ninety eight only.) --></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('post-styles')

@endpush
@push('post-scripts')

<script type="text/javascript">
	  function printDiv(eve,obj)
    {
      console.log('printId',$(obj).attr('id'));

      var divToPrint=document.getElementById('printHello');

      var newWin=window.open('','Print-Window');

      newWin.document.open();

      newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

      newWin.document.close();

      setTimeout(function(){newWin.close();},10);

    }
</script>
@endpush