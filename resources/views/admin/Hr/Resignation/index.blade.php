@extends('_layouts.admin.default')
@section('title', 'Resignation')
@section('content')
<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Resignation </h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard </a></li>
					<li class="breadcrumb-item active">Resignation </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_resignation"><i class="fa fa-plus"></i> Add Resignation </a>
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
							<th>Resigning Employee  </th>
							<th>Designation  </th>
							<th>Reason  </th>
							<th>Notice Date  </th>
							<th>Resignation Date  </th>
							<th>Status</th>
							<th>Requested</th>
							<th >Action </th>
						</tr>
					</thead>
					<tbody>
						@foreach($datas as $data)
							<tr>
								
								<td>
									<h2 class="table-avatar blue-link">
										<a href="javascript:;" class="avatar"><img alt="" src="@if(isset($data->employee->images) && $data->employee->images) {{asset('images/staff/'.$data->employee->images)}} @else {{asset('images/staff/no-image.png')}} @endif" /></a>
										<a href="javascript:;">@isset($data->employee){{$data->employee->name}}@endisset </a>
									</h2>
								</td>
							
								<td>@isset($data->employee->employeeDesignation){{$data->employee->employeeDesignation->design_name}} @endisset </td>
								<td>@isset($data->description){{$data->description}} @endisset </td>


								<td>{{date('d M y', strtotime($data->notice_date))}}</td>
								<td>{{date('d M y', strtotime($data->resignation_date))}}</td>

								<td>@if($data->status) @if($data->status==3) <span class="badge badge-success">Approved</span> @else <span class="badge badge-primary">Pending</span> @endif @else <span class="badge badge-danger">Rejected</span> @endif</td>
								<td>@isset($data->requestBy){{$data->requestBy->name}}@endisset</td>
								<td >
									<a href="javascript:;"  data-ids="{{$data->id}}"onclick="approvedResignation(this)" class="btn btn-sm btn-primary">Approval</a>
									<a href="javascript:;" data-ids="{{$data->id}}" onclick="rejectResignation(this)" class="btn btn-sm btn-danger">Reject</a>
									
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

<!-- Add Resignation Modal -->
<div id="add_resignation" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Resignation </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times; </span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{route('resignation.store')}}">
					@csrf
					<!-- <div class="form-group">
						<label>Resigning Employee  <span class="text-danger">* </span></label>
						<select class="form-control emp_id" name="emp_id" id="emp_id" type="text" style="width: 100%;min-height: 40px;" onchange="get_employee_by_id(this)" />
							<option disabled="disabled" selected="selected">Choose the Employee</option>

						</select>
					</div> -->
					<div class="form-group">
						<label>Notice Date  <span class="text-danger">* </span></label>
						<div class="ui calendar" id="notice_date" style="width: 100%">
							<div class="ui input" style="width: -webkit-fill-available!important;">
								<input type="text" class="form-control" value="{{old('notice_date')}}" name="notice_date" id="notice_date" autocomplete="off"  placeholder="notice_date">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Resignation Date  <span class="text-danger">* </span></label>
						<div class="ui calendar" id="resignation_date" style="width: 100%">
							<div class="ui input" style="width: -webkit-fill-available!important;">
								<input type="text" class="form-control" value="{{old('resignation_date')}}" name="resignation_date" id="resignation_date" autocomplete="off"  placeholder="resignation_date">
							</div>
						</div>


					</div>
					<div class="form-group">
						<label>Reason  <span class="text-danger">* </span></label>
						<textarea name="reason" class="form-control" rows="4"></textarea>
					</div>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Submit </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Resignation Modal -->

<!-- Edit Resignation Modal -->
<div id="edit_resignation" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Resignation </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times; </span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label>Resigning Employee  <span class="text-danger">* </span></label>
						<input class="form-control" type="text" value="John Doe" />
					</div>
					<div class="form-group">
						<label>Notice Date  <span class="text-danger">* </span></label>
						<div class="cal-icon">
							<input type="text" class="form-control datetimepicker" value="28/02/2019" />
						</div>
					</div>
					<div class="form-group">
						<label>Resignation Date  <span class="text-danger">* </span></label>
						<div class="cal-icon">
							<input type="text" class="form-control datetimepicker" value="28/02/2019" />
						</div>
					</div>
					<div class="form-group">
						<label>Reason  <span class="text-danger">* </span></label>
						<textarea class="form-control" rows="4"></textarea>
					</div>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Submit </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Resignation Modal -->

<!-- Delete Resignation Modal -->
<div class="modal custom-modal fade" id="delete_resignation" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>Delete Resignation </h3>
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
<!-- /Delete Resignation Modal -->

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

</script>
<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />

<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
	var today = new Date();
	$('#notice_date').calendar({
		monthFirst: false,
		type: 'date',
		minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
	});
	$('#resignation_date').calendar({
		monthFirst: false,
		type: 'date',
		minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
	});

	$('#emp_id').select2({
		ajax: {
			url: "{{route('get_employee')}}",
			method:"post",
			dataType: 'json',
			processResults: function (_data, params) {

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

	function approvedResignation(obj){
		var ids=$(obj).attr('data-ids');
		console.log('ids',ids);


		$.ajax({
			url: "{{route('approvedResignation')}}",
			type: 'post',
			data: {'id': ids},
			dataType: 'json',
			success: function (response) {
				console.log('response', response);
				if(response.statuss){
					swal(
						'Success!',
						'Record update Successfully',
						'success'
						);

					location.reload(true);

				}else{
					swal(
						'Warning!',
						'Record not update',
						'warning'
						);
				}

			},
			error: function (response) {
				swal(
					'Warning!',
					'Record not update',
					'warning'
					);
			}
		});






		
	}

	function rejectResignation(obj){
		var ids=$(obj).attr('data-ids');
		console.log('ids',ids);


		$.ajax({
			url: "{{route('rejectResignation')}}",
			type: 'post',
			data: {'id': ids},
			dataType: 'json',
			success: function (response) {
				console.log('response', response);
				if(response.statuss){
					swal(
						'Success!',
						'Record update Successfully',
						'success'
						);

					location.reload(true);

				}else{
					swal(
						'Warning!',
						'Record not update',
						'warning'
						);
				}

			},
			error: function (response) {
				swal(
					'Warning!',
					'Record not update',
					'warning'
					);
			}
		});

	}
	@endpush