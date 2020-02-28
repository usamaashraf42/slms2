@extends('_layouts.admin.default')
@section('title', 'Performance')
@section('content')
<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Performance </h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard </a></li>
					<li class="breadcrumb-item active">Performance </li>

					<li class="breadcrumb-item active">{{date("M Y", strtotime(date('d-m-Y')))}} </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="{{route('performance.create')}}" class="btn add-btn" ><i class="fa fa-plus"></i> Add Performance </a>
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
							<th></th>
							<th>Employee Name</th>
							@foreach($performances as $per)
							<th>{{$per->indicator_name}} (max={{$per->indicator_total_marks}})</th>
							@endforeach
							<th>Remarks</th>

							
						</tr>
					</thead>
					<tbody>
						@isset($users)
						@foreach($users as $admin)
						<tr>

							<td></td>
							<td>@isset($admin->name){{$admin->name}}@endisset</td>
							@foreach($performances as $per)
							@php($record=$admin->get_employeePerformance(date('m'),date('Y'),$per->id))
							<td>@isset($record['marks']){{ $record['marks']  }} @endisset</td>
							@endforeach
							<td>@isset($record->remarks){{$record->remarks}}@endisset</td>
							
						</tr>
						@endforeach
						@endisset
					</tbody>

				</table>
			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add department Modal -->
<div id="add_department" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Performance Indicator </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times; </span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{route('performance-indicator.store')}}">
					@csrf
					

					<div class="form-group">
						<label for="indicator_name">Performance Indicator  <span class="text-danger">* </span></label>
						<input class="form-control indicator_name" name="indicator_name" id="indicator_name" required >
					</div>
					<div class="form-group">
						<label for="indicator_total_marks">Marks   <span class="text-danger">* </span></label>
						<input class="form-control indicator_total_marks" name="indicator_total_marks" id="indicator_total_marks" type="number" min="0" value="0" style="width: 100%;min-height: 40px;"  />
						
					</div>
					<br>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Submit </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add department Modal -->

<!-- Edit department Modal -->
<div id="edit_department" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Performance Indicator </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times; </span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="javascript:;" id="PerformanceIndicatorUpdate">
					@csrf
					

					<div class="form-group">
						<label for="indicator_name">Performance Indicator  <span class="text-danger">* </span></label>
						<input class="form-control indicator_name" name="indicator_name" id="indicator_name" required >
					</div>
					<div class="form-group">
						<label for="indicator_total_marks">Marks   <span class="text-danger">* </span></label>
						<input class="form-control indicator_total_marks" name="indicator_total_marks" id="indicator_total_marks" type="number" min="0" value="0" style="width: 100%;min-height: 40px;"  />
						
					</div>
					<br>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Submit </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit department Modal -->
<div id="show_edit_modal"></div>
<!-- Delete department Modal -->
<div class="modal custom-modal fade" id="delete_department" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>Delete department </h3>
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
<!-- /Delete department Modal -->
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<script>
	
	$('#account').select2({
		ajax: {
			url: "{{route('get_employee')}}",
			method:"post",
			dataType: 'json',
			processResults: function (_data, params) {
				console.log('_data',_data);
				var data1= $.map(_data, function (obj) {
					var newobj = {};
					newobj.id = obj.id;
					newobj.text= `${obj.name} - (${obj.id}) `;
					return newobj;
				});
				return { results:data1};
			}
		}
	});
</script>
<script>
	$(document).ready(function() {

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
			url: 'admin/performance/performance-indicator/'+id+'/edit',
			type: 'get',
			data: {
				'id': id
			},
			success: function (response) {

				$("#show_edit_modal").html(response);
				jQuery("#edit_performanceIndicator").modal('show');
			},
			error: function (e) {
				console.log('error', e);
			}
		});
	}

	function showConfirmDelete() {
		return confirm("Are You Sure You Want To Change Status?");
	}

	function deleteItem(id) {
		var val = showConfirmDelete();
		if (val) {
			$.ajax({
				url: "{{route('performance-indicator-delete')}}",
				type: 'post',
				data: {
					'id': id
				},
				dataType: 'json',
				success: function (response) {
					console.log('id', response);

					if (response.status == "200") {

						swal(
							'Success!',
							'Data Update Successfully',
							'success'
							);

						location.reload(true);

					} else {
						swal(
							'Warning!',
							response.message,
							'warning'
							);
					}
				},
				error: function () {
					swal(
						'Oops...',
						'Something went wrong!',
						'error'
						)
				}
			});
		}
	}

	
</script>

@endpush