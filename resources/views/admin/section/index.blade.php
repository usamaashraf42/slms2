@extends('_layouts.admin.default')
@section('title', 'Dashboard')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">section</h4>
					<div class="heading-elements float-right">
						<button type="button" class="btn btn-success btn-min-width mr-1 mb-1" data-toggle="modal"
						data-target="#add_shed"><i class="la la-plus">&nbsp;Add section</i></button>
					</div>
					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
							<thead>
								<tr>
									<th></th>
									<th>Class Name</th>
									<th>Name</th>
									<th>Computer Fee</th>
									<th>Lab Fee</th>
									<th>Library Fee</th>
									<th>Exam Fee</th>
									<th>stationary</th>
									<th>AC Charge</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@isset($section)
								@foreach($section as $sec)
								<tr>
									<td><input type="checkbox" name="ids[]" value="{{$sec->id}}"></td>
									<td>@isset($sec->classes){{$sec->classes->course_name}}@endisset</td>
									<td>@isset($sec->course_name){{$sec->course_name}}@endisset</td>
									<td>@isset($sec->computer_fee){{$sec->computer_fee}}@endisset</td>
									<td>@isset($sec->lab_fee){{$sec->lab_fee}}@endisset</td>
									<td>@isset($sec->lib_fee){{$sec->lib_fee}}@endisset</td>
									<td>@isset($sec->exam_fee){{$sec->exam_fee}}@endisset</td>
									<td>@isset($sec->stationary){{$sec->stationary}}@endisset</td>
									<td>@isset($sec->ac_charge){{$sec->ac_charge}}@endisset</td>
									
									<td><a href="javascript:;" onclick="editItem({{$sec->id}})" class="btn btn-info btn-sm">Edit</a>
										@if($sec->status)
										<a href="javascript:;" onclick="deleteItem({{$sec->id}})"  class="btn btn-success btn-sm">Active</a> 
										@else 
										<a href="javascript:;" onclick="deleteItem({{$sec->id}})" class="btn btn-warning btn-sm">Deactive</a> @endif
									</td>
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


{{-- ////////////////// Model Target /////////////////// --}}
<div id="show_edit_modal"></div>
{{-- //////////////////////  Add Model ..................... --}}
<div class="modal fade text-left" id="add_shed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header bg-success">
			<h3 class="modal-title" id="myModalLabel35"> Add New section</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="" id="addDataForm" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-body">
				<fieldset class="form-group floating-label-form-group">
					<label for="course_name">section Name</label>
					<input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter section Name">
				</fieldset>
				
				

				<fieldset class="form-group floating-label-form-group">
					<label for="course_name">Section Name</label>
					@isset($classes)
					
					<select class="form-control" id="parentId" name="parentId">
						<option selected="selected" disabled="disabled">Choose Class</option>
						@foreach($classes as $cours)
						<option value="{{$cours->id}}">{{$cours->course_name}}</option>
						@endforeach
					</select>
					
					@endisset
				</fieldset>
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<fieldset class="form-group floating-label-form-group">
							<label for="computer_fee">Computer Fee</label>
							<input type="number" min="0" max="999999999" class="form-control" id="computer_fee" name="computer_fee" placeholder="Enter Computer Fee">
						</fieldset>
					</div>
					<div class="col-md-6 col-sm-12">
						<fieldset class="form-group floating-label-form-group">
							<label for="lab_fee">Lab Fee</label>
							<input type="number" min="0" max="999999999" class="form-control" id="lab_fee" name="lab_fee" placeholder="Enter Lab fee">
						</fieldset>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<fieldset class="form-group floating-label-form-group">
							<label for="lib_fee">Library Fee</label>
							<input type="number" min="0" max="999999999" class="form-control" id="lib_fee" name="lib_fee" placeholder="Enter Library Fee">
						</fieldset>
					</div>
					<div class="col-md-6 col-sm-12">
						<fieldset class="form-group floating-label-form-group">
							<label for="exam_fee">Exam Fee</label>
							<input type="number" min="0" max="999999999" class="form-control" id="exam_fee" name="exam_fee" placeholder="Enter Exam Fee">
						</fieldset>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<fieldset class="form-group floating-label-form-group">
							<label for="stationary">stationary Charge</label>
							<input type="number" min="0" max="999999999" class="form-control" id="stationary" name="stationary" placeholder="Enter stationary Charge">
						</fieldset>
					</div>
					<div class="col-md-6 col-sm-12">
						<fieldset class="form-group floating-label-form-group">
							<label for="ac_charge">Ac Charge</label>
							<input type="number" min="0" max="999999999" class="form-control" id="ac_charge" name="ac_charge" placeholder="Enter AC Charge">
						</fieldset>
					</div>
				</div>
				
			</div>
			<br>
			<div class="modal-footer">
				<img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
				height="50"/>
				&nbsp;&nbsp;&nbsp;
				<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
				value="Dismiss">
				<input type="submit" class="btn btn-outline-success btn-lg"  id="addDataBtn" value="Add Course">
			</div>
		</form>
	</div>
</div>
</div>
{{-- //////////////////////////// Add Model End.............................. --}}

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
     	"order": [[ 0, "desc" ]],
     	lengthChange: false,
     	buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
     } );

     table.buttons().container()
     .appendTo( '#example_wrapper .col-md-6:eq(0)' );

 } );
</script>
<script>
	

	/*showing confirm cancel popup box*/
	function showConfirm() {
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
		var val = showConfirmDelete();
		if (val) {
			$.ajax({
				url: "{{route('course.deleteCourse')}}",
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
		}
	}

	/*showing update item modal on click*/
	function editItem(id) {
		$.ajax({
			url: 'admin/section/'+id+'/edit',
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
            	url: "{{route('section.store')}}",
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