@extends('_layouts.admin.default')
@section('title', 'Employees')
@section('content')
<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Employees </h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard </a></li>
					<li class="breadcrumb-item active">Employees </li>
				</ul>
			</div>
			<!-- <div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_termination"><i class="fa fa-plus"></i> Add Employees </a>
			</div> -->
		</div>
	</div>
	<!-- /Page Header -->

	<div class="row">
		<div class="col-md-12">
			@component('_components.alerts-default')
			@endcomponent
			<div class="table-responsive">
				<table id="example" class="table border table-bordered ">
					<thead>
						<tr>
							<th></th>
							<th>Emp Id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Branch</th>
							<th>join</th>
						</tr>
					</thead>
					<tbody>
						@foreach($employees as $employee)
						<tr>


								<td>{{$employee->branch_id}}</td>

							<td>{{$employee->emp_id}}</td>
							<td>{{$employee->name}}</td>
							<td>{{$employee->email}}</td>

							<td>{{$employee->mobile}}</td>
							<td>@isset($employee->branch) {{$employee->branch->branch_name}} @endisset</td>


							<td>{{$employee->date_join}}</td>

							
							
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

@push('post-styles')
<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
<!-- <link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"> -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
	$(document).ready(function() {
      // Default data table
      $('#default-datatable').DataTable();


      var table = $('#example').DataTable( {
      	"order": [[ 0, "asc" ]],
      	lengthChange: false,
      	buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );

      table.buttons().container()
      .appendTo( '#example_wrapper .col-md-6:eq(0)' );

  } );

	
	function editItem(id) {
		$.ajax({
			url: 'admin/income-tax/'+id+'/edit',
			type: 'get',
			data: {
				'id': id
			},
			success: function (response) {

				$("#show_edit_modal").html(response);
				jQuery("#edit_incomeTax").modal('show');
			},
			error: function (e) {
				console.log('error', e);
			}
		});
	}
</script>

@endpush