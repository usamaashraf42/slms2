@extends('_layouts.admin.default')
@section('title', 'Dashboard')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">Subject</h4>
					<div class="heading-elements float-right">
                        <button type="button" class="btn btn-success btn-min-width mr-1 mb-1" data-toggle="modal"
                                      data-target="#add_shed"><i class="la la-plus">&nbsp;Add Subject</i></button>
                    </div>
					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
							<thead>
								<tr>
									<th></th>
									<th>Subject Code</th>
									<th>Name</th>
									<th>Author</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@isset($subject)
									@foreach($subject as $cour)
									<tr>
										<td><input type="checkbox" name="ids[]" value="{{$cour->id}}"></td>
										<td>@isset($cour->sub_code){{$cour->sub_code}}@endisset</td>
										<td>@isset($cour->sub_name){{$cour->sub_name}}@endisset</td>
										<td>
											@isset($cour->author){{$cour->author}}@endisset
										</td>
										<td><a href="javascript:;" onclick="editItem({{$cour->id}})" class="btn btn-info btn-sm">Edit</a>
											@if($cour->status)
												<a href="javascript:;" onclick="deleteItem({{$cour->id}})"  class="btn btn-success btn-sm">Active</a> 
											@else 
												<a href="javascript:;" onclick="deleteItem({{$cour->id}})" class="btn btn-warning btn-sm">Deactive</a> @endif
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
<div class="col-md-12">
	
</div>
<div id="show_edit_modal"></div>
<div class="modal fade text-left" id="add_shed" tabindex="-1"
 role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h3 class="modal-title" id="myModalLabel35"> Add New Subject</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" id="addDataForm" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="modal-body">
					<fieldset class="form-group floating-label-form-group">
						<label for="sub_code">Subject Code</label>
						<input type="number" class="form-control" id="sub_code" name="sub_code" placeholder="Enter Subject Code">
					</fieldset>
			
					<fieldset class="form-group floating-label-form-group">
						<label for="sub_name">Subject Name</label>
						<input type="text" class="form-control" id="sub_name" name="sub_name" placeholder="Enter Subject Name">
					</fieldset>

					<fieldset class="form-group floating-label-form-group">
						<label for="author">Subject Author</label>
						<input type="text" class="form-control" id="author" name="author" placeholder="Enter Subject Author">
					</fieldset>
					<br>
				</div>
				<div class="modal-footer">
					<img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
					height="50"/>
					&nbsp;&nbsp;&nbsp;
					<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
					value="Dismiss">
					<input type="submit" class="btn btn-outline-success btn-lg"  id="addDataBtn" value="Add Subject">
				</div>
			</form>
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
	function editItem(id) {
		$.ajax({
			url: 'admin/class/'+id+'/edit',
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
                url: "{{route('subject.store')}}",
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
                            'Subject Added Successfully',
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