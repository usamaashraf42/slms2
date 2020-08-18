@extends('_layouts.admin.default')
@section('title', 'Initial Admission')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">Initial Admission Mangement</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
							<thead>
								<tr>
									<th>Query Id</th>
									<th>Paid</th>
			                        <th>Date</th>
			                        <th>Branch</th>
			                        <th>Name </th>
			                        <th>Father Name </th>
			                        <th>Contact No</th>
			                        <th>Grade</th>
			                        <th> Query Person</th>
			                        <th>Reference</th>
			                        <th> Address</th>
			                        <th> Remarks</th>
			                        <th>Follow ups</th>
			                        <th>Action</th>
								</tr>
							</thead>
							<tbody>
								@isset($data)
			                      @foreach($data as $query)
			                      <tr class="query_{{$query->id}}">
			                        <td>{{$query->id}}</td>
			                        <td>
			                          @if($query->paid)
			                          	<button class="btn  btn-success btn-sm">Paid </button>
			                          @else
			                          	<button class="btn  btn-danger btn-sm">unpaid </button>
			                          @endif
			                           <a href="{{route('student.NewAdmission',$query->id)}}"  class="btn btn-success btn-sm">New Admission</a>
			                        </td>


			                        <td>{{date("d M Y", strtotime($query->created_at))}}</td>
			                        <td>@isset($query->branch) {{$query->branch->branch_name}} @endisset </td>
			                        <td>@isset($query->name) {{$query->name}} @endisset </td>
			                        <td> @isset($query->father_name) {{$query->father_name}} @endisset</td>
			                        <td>@isset($query->contact_no) {{$query->contact_no}} @endisset </td>
			                        <td>@isset($query->grade) {{$query->grade->course_name}} @endisset</td>
			                        <td> @isset($query->queryBy) {{$query->queryBy->name}} @endisset</td>
			                        <td> @isset($query->reference_by) {{$query->reference_by}} @endisset</td>
			                        <td> @isset($query->address) {{$query->address}} @endisset</td>
			                        <td> @isset($query->remarks) {{$query->remarks}} @endisset</td>
			                        <td> @isset($query->followUps) {{count($query->followUps)}} @endisset</td>

			                        <td>
			                          <a href="{{route('query.edit',$query->id)}}"  class="btn btn-warning btn-sm">Edit</a>
			                          <a href="javascript:;" onclick="queryClosed(this,{{$query->id}})"  class="btn btn-danger btn-sm">Closed</a> 
			                          <a href="{{route('followUP',$query->id)}}" class="btn btn-primary btn-sm">Follow</a> 
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
				<h3 class="modal-title" id="myModalLabel35"> Add New Course</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" id="addDataForm" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="modal-body">
					<fieldset class="form-group floating-label-form-group">
						<label for="course_code">Course Code</label>
						<input type="number" class="form-control" id="course_code" name="course_code" placeholder="Enter Course Code">
					</fieldset>
					
					<fieldset class="form-group floating-label-form-group">
						<label for="course_name">Course Name</label>
						<input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter Course Name">
					</fieldset>
					<br>
				</div>
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
		return confirm("Are You Sure You Want To Update This Account?");
	}

	function Deactive(id){
    swal({
      title: "Are you sure?",
      text: "You will be Deactive account!",
      icon: "warning",
      buttons: [
      'No, cancel it!',
      'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        $.ajax({
          method:"POST",
          url: "{{route('admin.deleteAdmin')}}",
          data : {'id': id},
          dataType:"json",
          success: function (response) {
            console.log('id', response);

            if (response.status) {
              
              swal(
                'Success!',
                'Account Deactive Successfully',
                'success'
                );

              location.reload(true);

            } else {
             swal(
              'Oops...',
              'Something went wrong!',
              'error'
              )
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
  function activeAccount(id){
    swal({
      title: "Are you sure?",
      text: "You will be Active account!",
      icon: "warning",
      buttons: [
      'No, cancel it!',
      'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        $.ajax({
          method:"POST",
          url: "{{route('admin.deleteAdmin')}}",
          data : {'id': id},
          dataType:"json",
          success: function (response) {
            console.log('id', response);

            if (response.status) {
              
              swal(
                'Success!',
                'Account Active Successfully',
                'success'
                );

              location.reload(true);

            } else {
             swal(
              'Oops...',
              'Something went wrong!',
              'error'
              )
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



	/*delete item */
	function deleteItem(id) {
		var val = showConfirmDelete();
		if (val) {
			$.ajax({
				url: "{{route('admin.deleteAdmin')}}",
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