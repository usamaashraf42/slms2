@extends('_layouts.admin.default')
@section('title', 'Leaves')
@section('content')
<!-- Page Content -->
<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Leaves </h3>
				
			</div>
			
		</div>
	</div>
	<!-- /Page Header -->
		@component('_components.alerts-default')
		@endcomponent
		<!-- Leave Statistics -->
		<div class="row">

			<div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
				<div class="dash-widget dash-widget5">
					<span class="dash-widget-icon bg-primary"><i class="fa fa-users" aria-hidden="true"></i></span>
					<div class="dash-widget-info">
						<h6>Today Presents </h6>
					<h4>{{count($presentEmployees)}} / {{count($employees)}} </h4>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
				<div class="dash-widget dash-widget5">
					<span class="dash-widget-icon bg-info"><i class="fa fa-user" aria-hidden="true"></i></span>
					<div class="dash-widget-info">
						<h6>Planned Leaves </h6>
					<span>{{count($approval_leave)}}  <span>Today </span></h4>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
				<div class="dash-widget dash-widget5">
					<span class="dash-widget-icon bg-warning"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
					<div class="dash-widget-info">
						<h6>Unplanned Leaves </h6>
					<h4>{{count($pending_leave)}}  <span>Today </span></h4>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
				<div class="dash-widget dash-widget5">
					<span class="dash-widget-icon bg-success"><i class="fa fa-money" aria-hidden="true"></i></span>
					<div class="dash-widget-info">
						<h6>Pending Requests </h6>
					<h4>{{count($pending_leave)}} </h4>
					</div>
				</div>
			</div>
		</div>

		
		<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
				<div class="table-responsive">
					<table id="example" class="table border table-bordered ">
						<thead>
							<tr>
								<th>Employee </th>
								<th>Leave Type </th>
								<th>From </th>
								<th>To </th>
								<th>No of Days </th>
								<th>Reason </th>
								<th class="text-center">Status </th>
								<th class="text-right">Actions </th>
							</tr>
						</thead>
						<tbody>
							@foreach($leaves as $today_leave)
							<tr class="leave_request_{{$today_leave->id}}">
								<td>
									<h2 class="table-avatar">
										@isset($today_leave->user->images)
										<a href="#" class="avatar"><img alt="" src="{{asset('images/staff/',$today_leave->user->images)}}" /></a>
										@endisset
										@isset($today_leave->user->name){{$today_leave->user->name}} @endisset <span>@isset($today_leave->user->designation){{$today_leave->user->designation}} @endisset </span>
									</h2>
								</td>
								<td>@isset($today_leave->leave->leave_name){{$today_leave->leave->leave_name}} @endisset </td>
								<td>{{date('d M Y', strtotime($today_leave->leave_from))}} </td>
								<td>{{date('d M Y', strtotime($today_leave->leave_till))}} </td>
								<?php
								$diff = strtotime($today_leave->leave_till) - strtotime($today_leave->leave_from); 

								$days= abs(round($diff / 86400));
								?>
								<td>{{$days+1}} days </td>

								<td>{{$today_leave->reason}} </td>
								<td class="text-center">
									<select name="leave_status" class="leave_status_{{$today_leave->id}}">
										@if($today_leave->leave_status==1)
										
										<option value="1" selected=><i class="fa fa-dot-circle-o text-info"></i> Pending </option>
										<option value="0" ><i class="fa fa-dot-circle-o text-success"></i> Approved </option>
										<option value="2" ><i class="fa fa-dot-circle-o text-danger"></i> Declined </option>
										@endif
										@if($today_leave->leave_status==0)
										<option value="0" selected><i class="fa fa-dot-circle-o text-success"></i> Approved </option>

										<option value="1" =><i class="fa fa-dot-circle-o text-info"></i> Pending </option>
										<option value="2" ><i class="fa fa-dot-circle-o text-danger"></i> Declined </option>
										@endif
										@if($today_leave->leave_status==2)
										<option value="2" selected><i class="fa fa-dot-circle-o text-danger"></i> Declined </option>

										<option value="1" ><i class="fa fa-dot-circle-o text-info"></i> Pending </option>
										<option value="0" ><i class="fa fa-dot-circle-o text-success"></i> Approved </option>

										@endif
									</select>
								</td>
								<td class="text-right">
									<a href="javascript:;" onclick="resend({{$today_leave->id}})"  class="btn btn-info btn-sm">update</a>


								</td>
							</tr>

							@endforeach


						</tbody>
					</table>
				</div>
			</div>{{--  --}}
		</div>
	</div>
		</div>{{--  --}}
	<!-- /Page Content -->

	@endsection

	@push('post-styles')
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}" />
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
	<script src="{{asset('assets/js/moment.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>


	<script>


		/*showing confirm cancel popup box*/
		function resend(id) {
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
						title: 'Leave Status Update!',
						text: 'Leave Status Update successfully!',
						icon: 'success'
					}).then(function() {

						var leaves_status=$(".leave_request_"+id).find('.leave_status_'+id).val();
						console.log('leaves_status',leaves_status);
						$.ajax({
							url: "{{route('leaves_request_update')}}",
							type: 'post',
							data: {
								'id': id,'leaves_status':leaves_status
							},
							dataType: 'json',
							success: function (response) {
								console.log('response', response);

								if (response.status == "200") {

									$(".leave_request_"+id).remove();

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
					});
				} else {
					swal("Cancelled", "Your imaginary file is safe :)", "error");
				}
			})

		// return confirm("Are You Sure You Want To Resend This Notification?");
	}

	// function resend(id) {
	// 	console.log('id',id);
	// 	var val = showConfirm();
	// 	if (val) {
	// 		$.ajax({
	// 			url: "{{route('leaves_request_update')}}",
	// 			type: 'post',
	// 			data: {
	// 				'id': id
	// 			},
	// 			dataType: 'json',
	// 			success: function (response) {
	// 				console.log('id', response);

	// 				if (response.status == "200") {

	// 					swal(
	// 						'Success!',
	// 						'Notification Sent Successfully',
	// 						'success'
	// 						);

	// 				} else {
	// 					alert(response.message);
	// 				}
	// 			},
	// 			error: function () {
	// 				swal(
	// 					'Oops...',
	// 					'Something went wrong!',
	// 					'error'
	// 					)
	// 			}
	// 		});
	// 	}
	// }


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
					url: "{{route('holidays.deleteHoliday')}}",
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
			url: 'admin/holidays/'+id+'/edit',
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
</script
    @endpush