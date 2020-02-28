@extends('_layouts.admin.default')
@section('title', 'Leaves')
@section('content')
<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<!-- <div class="col">
				<h3 class="page-title">Leaves 2019 </h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard </a></li>
					<li class="breadcrumb-item active">Leaves </li>
				</ul>
			</div> -->
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn btn-success" data-toggle="modal" data-target="#add_holiday"><i class="fa fa-plus"></i> Add Leaves </a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<div class="row">
		<div class="col-md-12">
			@component('_components.alerts-default')
			@endcomponent
			<div class="table-responsive">
				<table class="table table-striped custom-table mb-0">
					<thead>
						<tr>
							<th># </th>
							<th>Leave Title  </th>
							<th>Deduction</th>
							<th >Action </th>
						</tr>
					</thead>
					<tbody>
						@foreach($leaves as $holiday)

						<tr >
							<td>{{$holiday->id}} </td>
							<td>{{$holiday->leave_name}} </td>
							<td>{{ $holiday->deduction  }} </td>
							<td>

								<a href="javascript:;" onclick="editItem({{$holiday->id}})" class="btn btn-info btn-sm">Edit</a>
								@if($holiday->leave_status)
								<a href="javascript:;" onclick="deleteItem({{$holiday->id}})"  class="btn btn-success btn-sm">Active</a> 
								@else 
								<a href="javascript:;" onclick="deleteItem({{$holiday->id}})" class="btn btn-warning btn-sm">Deactive</a> 
								@endif

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

<!-- Add Holiday Modal -->
<div class="modal custom-modal fade" id="add_holiday" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Leave </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times; </span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{route('leaves-setting.store')}}">
					@csrf
					<div class="form-group">
						<label>leave Name  <span class="text-danger">* </span></label>
						<input class="form-control" name="leave_name" type="text" />
					</div>
					<div class="form-group">
						<label>deduction  <span class="text-danger">* </span></label>
						<input class="form-control " name="deduction" type="number" />
					</div>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Submit </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Holiday Modal -->

<!-- Edit Holiday Modal -->

<div id="show_edit_modal"></div>

<!-- <div class="modal custom-modal fade" id="edit_holiday" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Holiday </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times; </span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label>Holiday Name  <span class="text-danger">* </span></label>
						<input class="form-control" value="New Year" type="text" />
					</div>
					<div class="form-group">
						<label>Holiday Date  <span class="text-danger">* </span></label>
						<div class="cal-icon"><input class="form-control datetimepicker" value="01-01-2019" type="text" /></div>
					</div>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Save </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div> -->
<!-- /Edit Holiday Modal -->

<!-- Delete Holiday Modal -->
<div class="modal custom-modal fade" id="delete_holiday" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>Delete Holiday </h3>
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
<!-- /Delete Holiday Modal -->



@endsection

@push('post-styles')
<!-- <link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"> -->
	@endpush
	@push('post-scripts')
	<script src="{{asset('assets/js/moment.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}" />
<!-- <script src="{{asset('assets/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
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
     	"order": [[ 0, "desc" ]],
     	lengthChange: false,
     	buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
     } );

     table.buttons().container()
     .appendTo( '#example_wrapper .col-md-6:eq(0)' );

 } );
</script> -->
<script>
	

	/*showing confirm cancel popup box*/
	function showConfirm() {
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this imaginary file!",
			icon: "warning",
			buttons: [
			'No, cancel it!',
			'Yes, I am sure!'
			],
			dangerMode: true,
		}).then(function(isConfirm) {
			if (isConfirm) {
				swal({
					title: 'Shortlisted!',
					text: 'Candidates are successfully shortlisted!',
					icon: 'success'
				}).then(function() {
          form.submit(); // <--- submit form programmatically
      });
			} else {
				swal("Cancelled", "Your imaginary file is safe :)", "error");
			}
		})

		return confirm("Are You Sure You Want To Resend This Notification?");
	}

	function resend(id) {
		var val = showConfirm();
		if (val) {
			$.ajax({
				url: "#",
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
							'Notification Sent Successfully',
							'success'
							);

					} else {
						alert(response.message);
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


	/*showing confirm cancel popup box*/
	function showConfirmDelete() {
		return confirm("Are You Sure You Want To Delete This Data?");

	}

	/*delete item */
	function deleteItem(id) {


		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this imaginary file!",
			icon: "warning",
			buttons: [
			'No, cancel it!',
			'Yes, I am sure!'
			],
			dangerMode: true,
		}).then(function(isConfirm) {
			if (isConfirm) {
				$.ajax({
					url: "{{route('LeaveSettings.deleteLeaveSetting')}}",
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
								'Shed Deleted Successfully',
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
			} else {
				swal("Cancelled", "Your imaginary file is safe :)", "error");
			}
		})
		








		
	}

	/*showing update item modal on click*/
	function editItem(id) {
		$.ajax({
			url: 'admin/leaves-setting/'+id+'/edit',
			type: 'get',
			data: {
				'id': id
			},
			success: function (response) {

				$("#show_edit_modal").html(response);
				jQuery("#updateCourse").modal('show');
			},
			error: function (e) {
				console.log('error', e);
			}
		});
	}

	/* On-click function to view  detail */
	function detail(id) {
		window.location = baseurl + '/shed/' + id;
	}



	$('.loader-img').hide();
	$("#addDataBtn").click(function (e) {


            var form = $('#addDataForm')[0]; // You need to use standard javascript object here
            var formData = new FormData(form);
            console.log('formData', formData);
            console.log('form', form);
            $.ajax({
            	url: "#",
            	type: "POST",
            	enctype: 'multipart/form-data',
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: formData,
                beforeSend: function () {
                	$('.loader-img').show();
                	$('#preloader').show();
                },
                complete: function () {
                	$('#preloader').fadeOut('slow', function () {
                		$(this).remove();
                	});
                	$('.loader-img').hide();
                },
                success: function (response) {
                	console.log('response', response);
                	if (response.status == '200') {



                		$('#add_shed').modal('hide');

                		$("#addDataForm")[0].reset();
                		$(".slim-btn-remove").click();

                		swal(
                			'Success!',
                			'Shed Added Successfully',
                			'success'
                			);
                		location.reload(true);
                	} else {
                		console.log('error blank', response.message);
                		swal(
                			'Warning!',
                			response.message,
                			'warning'
                			);
                	}
                }, error: function (e) {
                	console.log('error', e);
                	swal(
                		'Oops...',
                		'Something went wrong!',
                		'error'
                		)
                }
            });
            e.preventDefault();
        });

    </script>

    @endpush