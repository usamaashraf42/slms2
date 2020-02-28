@extends('_layouts.admin.default')
@section('title', 'Permission')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">Permission Mangement</h4>
					<div class="heading-elements float-right">
                      
                    </div>
					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
							<thead>
								<tr>
									<th></th>
									<th>Name</th>
								
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@isset($permissions)
									@foreach($permissions as $permission)
									<tr>
										<td><input type="checkbox" name="ids[]" value="{{$permission->id}}"></td>
										<td>@isset($permission->name){{$permission->name}}@endisset</td>
									
										<td>
											@if($permission->status)
												<a href="javascript:;" onclick="deleteItem({{$permission->id}})"  class="btn btn-success btn-sm">Active</a> 
											@else 
												<a href="javascript:;" onclick="deleteItem({{$permission->id}})" class="btn btn-warning btn-sm">Deactive</a> @endif
												
										</td>
										<td><a href="{{route('permission.edit',$permission->id)}}"  class="btn btn-info btn-sm">Edit</a></td>
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
                url: "{{route('class.store')}}",
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