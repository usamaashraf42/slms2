@extends('_layouts.admin.default')
@section('title', 'Human Resource')
@section('content')


<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">

				<div class="card-block">
					<h4 class="card-title">Leaves of {{Auth::user()->name}}</h4>
					<div class="heading-elements float-right">
						<button type="button" class="btn btn-success btn-min-width mr-1 mb-1" data-toggle="modal" data-target="#add_leave"><i class="la la-plus">&nbsp;Add Leave</i></button>
					</div>



					<div class="row">



						@foreach($counter_leaves as $count)
						<div class="col-md-3">
							<div class="stats-info">
								<h6>@isset($count->leave->leave_name){{$count->leave->leave_name}}@endisset </h6>
								<h4>{{$count->total_leaves}} </h4>
							</div>
						</div>
						@endforeach

					</div>
					<!-- /Leave Statistics -->

					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								@component('_components.alerts-default')
								@endcomponent
								<table class="table table-striped custom-table mb-0 datatable">
									<thead>
										<tr>
											<th>Leave Type </th>
											<th>From </th>
											<th>To </th>
											<th>No of Days </th>
											<th>Reason </th>
											<th class="text-center">Status </th>
											<th>Approved by </th>
											<th class="text-right">Actions </th>
										</tr>
									</thead>
									<tbody>
										@foreach($emp_leaves as $leav)
										<tr>
											<td>@isset($leav->leave->leave_name){{$leav->leave->leave_name}} @endisset</td>
											<td>{{date('d M Y', strtotime($leav->leave_from))}} </td>
											<td>{{date('d M Y', strtotime($leav->leave_till))}} </td>
											<?php
											$diff = strtotime($leav->leave_till) - strtotime($leav->leave_from); 

											$days= abs(round($diff / 86400));
											?>
											<td>{{$days+1}} days </td>
											<td>{{$leav->reason}} </td>
											<td class="text-center">
												<select disabled="disabled">
													@if($leav->leave_status==1)

													<option value="1" selected=><i class="fa fa-dot-circle-o text-info"></i> Pending </option>
													@endif
													@if($leav->leave_status==0)
													<option value="0" selected><i class="fa fa-dot-circle-o text-success"></i> Approved </option>
													@endif
													@if($leav->leave_status==2)
													<option value="2" selected><i class="fa fa-dot-circle-o text-danger"></i> Declined </option>
													@endif
												</select>
											</td>
											<td>
												@if(isset($leav->approvedBy))
												<h2 class="table-avatar">
													<a href="javascript:;" class="avatar avatar-xs"><img src="@if($leav->approvedBy->images) {{asset('images/staff/'.$leav->approvedBy->images	)}} @else assets/img/profiles/avatar-09.jpg @endif" alt="" /></a>
													<a href="javascript:;">{{$leav->approvedBy->name}} </a>
												</h2>
												@endif
											</td>
											<td >

												<a href="{{route('leaves-requests.edit',$leav->id)}}"  class="btn btn-info btn-sm">Edit</a>

												<a href="javascript:;" onclick="deleteItem({{$leav->id}})"  class="btn btn-danger btn-sm">Delete</a> 


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

				<!-- Add Leave Modal -->
				<div id="add_leave" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Leave </h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times; </span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST" action="{{route('leaves-requests.store')}}">
									@csrf
									<div class="form-group">
										<label>Leave Type  <span class="text-danger">* </span></label>
										<select class="select form-control" name="leave_id">
											<option selected="selected" disabled="disabled">Choose Leave Type </option>
											@foreach($leaves as $leave)
											<option value="{{$leave->id}}">{{$leave->leave_name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label>From  <span class="text-danger">* </span></label>
										<div class="ui calendar" id="leave_from" style="width: 100%">
											<div class="cal-icon ui input" style="width: -webkit-fill-available!important;">
												<input class="form-control " id="leave_from" name="leave_from" value="{{date('d-m-Y')}}" type="text" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>To  <span class="text-danger">* </span></label>
										<div class="ui calendar" id="leave_till" style="width: 100%">
											<div class="cal-icon ui input" style="width: -webkit-fill-available!important;">
												<input class="form-control " id="" name="leave_till" value="{{date('d-m-Y')}}" type="text" />
											</div>
										</div>


									</div>
					<!-- <div class="form-group">
						<label>Number of days  <span class="text-danger">* </span></label>
						<input class="form-control" readonly="" type="text" value="2" />
					</div>
					<div class="form-group">
						<label>Remaining Leaves  <span class="text-danger">* </span></label>
						<input class="form-control" readonly="" value="12" type="text" />
					</div> -->
					<div class="form-group">
						<label>Leave Reason  <span class="text-danger">* </span></label>
						<textarea rows="4" class="form-control" placeholder="Going to hospital " name="reason"></textarea>
					</div>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Submit </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Leave Modal -->
<div id="show_edit_modal">
	
</div>


@endsection

@push('post-styles')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}" />
@endpush
@push('post-scripts')
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}" />

<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />

<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>

<script>
	var today = new Date();
	$('#leave_from').calendar({
		monthFirst: false,
		type: 'date',
		minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
	});
	$('#leave_till').calendar({
		monthFirst: false,
		type: 'date',
		minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
	});





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
					url: "{{route('leave_requests.delete_leave_request')}}",
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
			url: 'admin/leaves-requests/'+id+'/edit',
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