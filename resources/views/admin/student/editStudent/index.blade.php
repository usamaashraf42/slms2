
@extends('_layouts.admin.default')
@section('title', 'Student Edit')
@section('content')

<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">Student Edit </h4>

					<h2 > @isset($records[0]->student->branch) {{$records[0]->student->branch->branch_name}}@endisset</h2>

					@component('_components.alerts-default')
					@endcomponent

					<form action="{{route('student_edit_update')}}" method="POST">
						@csrf
						<div class="table-responsive">
							<table id="" class="table border table-bordered ">
								<thead>
									<tr >
										<th>action</th>
										<th>Image</th>
										<th>Std Id</th>
										<th>Student Name </th>
										<th>Father Name</th>
										<th>Phone</th>
										<th>Class</th>
										<th>Status</th>

									</tr>
								</thead>
								<tbody>
									@isset($records)
									@php($class=0)
									@foreach($records as $pro)



									<tr >
										<td><a href="javascript:;" onclick="updateProfile({{$pro->id}})" class="btn-sm btn-warning">Edit</a></td>
										
										<td><img class="example-image" src="@if($pro->images){{asset('images/student/pics/'.$pro->images)}} @else http://lyceumgroupofschools.com/images/applicant/no-image.png @endif"  alt="''" height="60" width="60" style="border-radius: 50%!important;" /></td>
										<td>{{$pro->id}}</td>
										<td>@isset($pro){{$pro->s_name}}@endisset</td>
										<td>@isset($pro){{$pro->s_fatherName}}@endisset</td>
										<td>@isset($pro->s_phoneNo){{$pro->s_phoneNo}}@endisset</td>


										<td>@isset($pro->course){{$pro->course->course_name}}@endisset</td>
										
										<td>
											
											@if($pro->status==1) Active @endif 
											@if($pro->status==0) Deactive @endif 

										</select>
									</td>

								</tr>


								@endforeach
								@endisset
							</tbody>
						</table>

					</div>
					<div class="form-group row">

						<div class="card" style="width:100%">
							<div class="card-block">
								<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
									<button class="btn btn-primary ks-rounded" type="submit" onclick="submitForm(this)" > Submit </button>
								</div>

							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
{{-- ////////////////// Model Target /////////////////// --}}
<div id="show_edit_modal"></div>

@endsection
@push('post-styles')
<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endpush
@push('post-scripts')
<script>
	function submitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form    
        btn.form.submit();
    }

    
</script>

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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


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
	function null_model(){
        // alert("s");
        $("#append_data").text('');
        $("#append_data").html('');
    }

    function updateProfile(id){
    	console.log('updateProfile',id);
		$.ajax({
			url: 'admin/student/edit-student/'+id+'/edit',
			type: 'get',
			
			success: function (response) {

				$("#show_edit_modal").html(response);
				jQuery("#updateCourse").modal('show');
			},
			error: function (e) {
				console.log('error', e);
			}
		});
	

    }

</script>

@endpush