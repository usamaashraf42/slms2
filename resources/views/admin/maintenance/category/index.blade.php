@extends('_layouts.admin.default')
@section('title', 'Maintenance Category')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">

				<div class="card-block">
					<h4 class="card-title">Maintenance Category</h4>
					<div class="heading-elements float-right">
						<button type="button" class="btn btn-success btn-min-width mr-1 mb-1" data-toggle="modal"
						data-target="#add_shed"><i class="la la-plus">&nbsp;Add Category</i></button>
					</div>
					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
							<thead>
								<tr>
									<th></th>
									<th>Category Name</th>
									<th>Parent Category</th>
									<th>Avg Time</th>
									<th>Assign To</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@isset($categories)
								@foreach($categories as $sec)
								<tr>
									<td><input type="checkbox" name="ids[]" value="{{$sec->id}}"></td>
									<td>@isset($sec->main_name){{$sec->main_name}}@endisset</td>
									<td>@isset($sec->maintain_category){{$sec->maintain_category->main_name}}@endisset</td>
									<td>@isset($sec->avg_time){{$sec->avg_time}}@endisset</td>


									<td>@isset($sec->main_users){{implodeUser($sec->main_users)}}@endisset</td>

									<td>
										<a href="javascript:;" onclick="editItem({{$sec->id}})" class="btn btn-info btn-sm" style="width: 75px;">Edit</a>
										@if($sec->status)
										<a href="javascript:;" onclick="deleteItem(this,{{$sec->id}},0)"  class="btn btn-success btn-sm">Active</a>
										@else
										<a href="javascript:;" onclick="deleteItem(this,{{$sec->id}},1)" class="btn btn-danger btn-sm">Deactive</a> @endif
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
			<h3 class="modal-title" id="myModalLabel35"> Add New Category</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="" id="addDataForm" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-body">
				<fieldset class="form-group floating-label-form-group">
					<label for="main_name"> Name</label>
					<input type="text" class="form-control" id="main_name" name="main_name" placeholder="Enter Category Name">
				</fieldset>



				<fieldset class="form-group floating-label-form-group">
					<label for="course_name">Main Category</label>
					@isset($mains)

					<select class="form-control" id="parentId" name="parent_id">
						<option selected="selected" disabled="disabled">Choose Category</option>
						@foreach($mains as $cours)
						<option value="{{$cours->id}}">{{$cours->main_name}}</option>
						@endforeach
					</select>

					@endisset
				</fieldset>

				<div class="row">
					<div class="col-md-12 col-sm-12">
						<fieldset class="form-group floating-label-form-group">
							<label for="avg_time">Avg Time</label>
							<input type="text" min="0" max="999999999" class="form-control" id="avg_time" name="avg_time" placeholder="Enter Avg Time">
						</fieldset>
					</div>

				</div>


				<div class="row">
					<div class="col-md-6 col-sm-6">
						<label class="control-label">Task Assign to</label>
					</div>
					<div class="col-md-6 col-sm-6">
						<label class="control-label">Maintenance being given to employee (click Employee to remove)</label>
					</div>
					<div class="col-md-12 col-sm-12">

						<select id='pre-selected-options' multiple='multiple' name="users[]">
							@foreach($employees as $user)
							<option value="{{$user->id}}">{{$user->name}}</option>
							@endforeach
						</select>

					</div>
					</

				</div>

			</div>
			<br>
			<div class="modal-footer">
				<img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
				height="50"/>
				&nbsp;&nbsp;&nbsp;
				<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
				value="Dismiss">
				<input type="submit" class="btn btn-outline-success btn-lg"  id="addDataBtn" value="Add Category">
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


<link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

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


<link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('assets/multi-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/multi-select/jquery.multi-select.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/multi-select/select2.full.min.js')}}" type="text/javascript"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
<script type="text/javascript">

	$('#pre-selected-options').multiSelect();

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
	function deleteItem(obj,id,status) {
		$.ajax({
			url: "{{ route('category-status-change') }}",
			method:"POST",
			data:{'id':id,'status':status},
			success: function(response){
				if(response.status){
					if(status)
						$(obj).replaceWith('<a href="javascript:;" onclick="deleteItem(this,'+id+',0)" class="btn btn-success btn-sm"> Active </a>');
					else
						$(obj).replaceWith('<a href="javascript:;" onclick="deleteItem(this,'+id+',1)" class="btn btn-danger btn-sm"> Deactive </a>');

					toastr.success(response.message);

				}else{
					toastr.error(response.message);

				}
			}
		});



	}

	/*showing update item modal on click*/
	function editItem(id) {
		$.ajax({
			url: 'admin/maintenance/category/'+id+'/edit',
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
            	url: "{{route('category.store')}}",
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
