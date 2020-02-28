@extends('_layouts.admin.default')
@section('title', 'Employee Salary Sheets')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">Employee Salary Sheets Of {{ isset($month)? getMonthName($month) : ''}}-{{$year}} </h4>
					<div class="heading-elements float-right">
						<!-- <a href="{{route('staff.create')}}">
							<button type="button" class="btn btn-success btn-min-width mr-1 mb-1">
								<i class="la la-plus">&nbsp;Add Staff</i>
							</button>
						</a>  -->
					</div>
					@component('_components.alerts-default')
					@endcomponent
					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
							<thead>
								<tr>
									<th></th>
									<th >Branch</th>
									<th>E-Id</th>
									<th>Name</th>
									<th>Total Salary</th>

									<th>Absent</th>
									<th>Absent fine</th>

									<th>Late</th>
									<th>Late fine</th>

									<th>E.off</th>
									<th>E.off fine</th>

									<th>Leave</th>
									<th>Leave fine</th>

									<th>Admin Ad</th>
									<th>Admin Cr</th>

									<th>Advance</th>
									<th>prev Balance</th>

									<th>Tax</th>
									<th>Security</th>

									<th>Medical</th>
									<th>TA</th>

									<th>PF Rate</th>
									<th>PF Amount</th>

									<th>Net Salary</th>
								</tr>
							</thead>
							<tbody>
								@php($counter=1)
								@isset($datas)
								@foreach($datas as $admin)
								<tr>

									<td>{{$counter++}}</td>
									<td>@isset($admin->branch){{$admin->branch->branch_name}}@endisset</td>
									<td>@isset($admin->emp_id){{$admin->emp_id}}@endisset</td>
									<td>@isset($admin->employee){{$admin->employee->name}}@endisset</td>
									<td>@isset($admin->current_salay){{$admin->current_salay}}@endisset</td>

									<td>{{$admin->total_absent}}</td>
									<td>{{$admin->absent_fine}}</td>

									<td>{{$admin->latedays}}</td>
									<td>{{$admin->late_fine}}</td>

									<td>{{$admin->Earlyoffdays}}</td>
									<td>{{$admin->_off_fine}}</td>

									<td>{{$admin->total_leaves}}</td>
									<td>{{$admin->leave_fine}}</td>


									<td>{{$admin->admin_add}}</td>
									<td>{{$admin->admin_cr}}</td>


									<td>{{$admin->advance}}</td>
									<td>{{$admin->prevBalance}}</td>

									<td>{{$admin->tax}}</td>
									<td>{{$admin->security}}</td>

									<td>{{$admin->medical}}</td>
									<td>{{$admin->ta}}</td>

									<td>{{$admin->pf_rate}}</td>
									<td>{{$admin->pf}}</td>

									<td>{{$admin->total_salary}}</td>
								</tr>
								@endforeach
								@endisset
							</tbody>

						</table>
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
@endpush
@push('post-scripts')
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

<script>
	$(document).ready(function() {
     //Default data table
     $('#default-datatable').DataTable();


     var table = $('#example').DataTable( {
     	"order": [[ 0, "asc" ]],
     	lengthChange: false,
     	"pageLength": 75,
     	buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
     } );

     table.buttons().container()
     .appendTo( '#example_wrapper .col-md-6:eq(0)' );

 } );
</script>

@endpush