@extends('_layouts.admin.default')
@section('title', 'Income Tax')
@section('content')
<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Income Tax </h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard </a></li>
					<li class="breadcrumb-item active">Income Tax </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_termination"><i class="fa fa-plus"></i> Add Income Tax </a>
			</div>
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
							<th>Amount Start  </th>
							<th>Amount Till </th>
							<th>after_amount_percentage</th>
							<th>Fixed Tax</th>
							<th>Income Tax % </th>
							
							<th >Action </th>
						</tr>
					</thead>
					<tbody>
						@foreach($taxs as $data)
						<tr>




							<td>{{$data->annual_start_amount}}</td>
							<td>{{$data->annual_end_amount}}</td>
							<td>{{$data->after_amount_percentage}}</td>

							<td>{{$data->fix_tax}}</td>
							<td>{{$data->per_tax}}</td>

							
							<td >
								<a href="javascript:;" onclick="editItem({{$data->id}})" class="btn btn-info btn-sm">Edit</a>
								<a href="{{route('income-tax.destroy',$data->id)}}"  class="btn btn-sm btn-danger">Delete</a>

							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add Termination Modal -->
<div id="add_termination" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Income Tax </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times; </span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{route('income-tax.store')}}">
					@csrf
					<div class="form-group">
						<label>Annual start amount <span class="text-danger">* </span></label>
						<input class="form-control annual_start_amount" name="annual_start_amount" id="annual_start_amount" type="number" min='0' value='0' style="width: 100%;min-height: 40px;" />
				</div>
				<div class="form-group">
					<label>Annual End Amount <span class="text-danger">* </span></label>
					<input class="form-control annual_end_amount" name="annual_end_amount" id="annual_end_amount" type="number" min='0' value='0' style="width: 100%;min-height: 40px;" />
				</div>
				<div class="form-group">
					<label>After Amount Percentage <span class="text-danger">* </span></label>
					<input class="form-control after_amount_percentage" name="after_amount_percentage" id="after_amount_percentage" type="number" min='0' value='0' style="width: 100%;min-height: 40px;" />
				</div>
				<div class="form-group">
					<label>Fix Tax <span class="text-danger">* </span></label>
					<input class="form-control fix_tax" name="fix_tax" id="fix_tax" type="number" min='0' value='0' style="width: 100%;min-height: 40px;" />
				</div>
				<div class="form-group">
					<label>Percentage Tax <span class="text-danger">* </span></label>
					<input class="form-control per_tax" name="per_tax" id="per_tax" type="number" min='0' value='0' style="width: 100%;min-height: 40px;" />
				</div>
				<div class="submit-section">
					<button class="btn btn-primary submit-btn">Submit </button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<!-- /Add Termination Modal -->

<!-- Edit Termination Modal -->
<div id="edit_termination" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Termination </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times; </span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label>Terminated Employee  <span class="text-danger">* </span></label>
						<input class="form-control" type="text" value="John Doe" />
					</div>
					<div class="form-group">
						<label>Termination Type  <span class="text-danger">* </span></label>
						<div class="add-group-btn">
							<select class="select">
								<option />Misconduct 
								<option />Others 
							</select>
							<a class="btn btn-primary" href="javascript:void(0);"><i class="fa fa-plus"></i> Add </a>
						</div>
					</div>
					<div class="form-group">
						<label>Termination Date  <span class="text-danger">* </span></label>
						<div class="cal-icon">
							<input type="text" class="form-control datetimepicker" value="28/02/2019" />
						</div>
					</div>
					<div class="form-group">
						<label>Reason  <span class="text-danger">* </span></label>
						<textarea class="form-control" rows="4"></textarea>
					</div>
					<div class="form-group">
						<label>Notice Date  <span class="text-danger">* </span></label>
						<div class="cal-icon">
							<input type="text" class="form-control datetimepicker" value="28/02/2019" />
						</div>
					</div>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Submit </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Termination Modal -->
<div id="show_edit_modal"></div>
<!-- Delete Termination Modal -->
<div class="modal custom-modal fade" id="delete_termination" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>Delete Termination </h3>
					<p>Are you sure want __ delete? </p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">
						<div class="col-6">
							<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete </a>
						</div>
						<div class="col-6">
							<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Termination Modal -->
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
      	"order": [[ 0, "desc" ]],
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