
@extends('_layouts.admin.default')
@section('title', 'Student Edit')
@section('content')
<style>
	.table td, .table th {
		padding: .10rem!important;
		vertical-align: top;
		border-top: 1px solid #dee2e6;
		font-size: 12px!important;
	}
	.table th {
		padding: .10rem!important;
		vertical-align: top;
		max-width: 60px!important;
		border-top: 1px solid #dee2e6;
	}
	table.table-bordered.dataTable th, table.table-bordered.dataTable td {
		max-width: 40px;
		border-left-width: 0;
		/* max-width: 11px; */
	}
</style>
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
										<th>Ly no</th>
										<th>Student Name </th>
										<th>Father Name</th>
										<th>Phone</th>
										<th>Class</th>
										<th>Branch</th>
										<th>Status</th>

									</tr>
								</thead>
								<tbody>
									@isset($records)
									@php($class=0)
									@foreach($records as $pro)



									<tr >
										<input type="hidden" name="ids[]"  value="{{$pro->id}}">
										<td>{{$pro->id}}</td>
										<td><input type="text"  name="s_name[]" class="" value="@isset($pro){{$pro->s_name}}@endisset" style="max-width: 150px;"></td>

										<td><input type="text"  name="s_fatherName[]" class="" value="@isset($pro){{$pro->s_fatherName}}@endisset" style="max-width: 150px;"></td>
										
										
										<td><input type="text"  name="s_phoneNo[]" class="amount{{$pro->id}} correctionAmount" value="@isset($pro->s_phoneNo){{$pro->s_phoneNo}}@endisset" style="max-width: 100px;"></td>


										<td>
											<select type="text"  name="course_id[]"  style="max-width: 100px;">
												@foreach($courses as $course)
												<option value="{{$course->id}}" @if($pro->course_id==$course->id) selected @endif >{{$course->course_name}}</option>
												@endforeach
											</select>
										</td>
										<td>
											<select type="text"  name="branch_ids[]"  style="max-width: 100px;">
												@foreach($branches as $branch)
												<option value="{{$branch->id}}" @if($pro->branch_id==$branch->id) selected @endif >{{$branch->branch_name}}</option>
												@endforeach
											</select>
										</td>
										<td>
											<select type="text"  name="statuses[]"  style="max-width: 100px;">
												
												<option value="1" @if($pro->status==1) selected @endif >Active</option>
												<option value="0" @if($pro->status==0) selected @endif >Deactive</option>
												
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
	function null_model(){
        // alert("s");
        $("#append_data").text('');
        $("#append_data").html('');
    }

    $('.correctionAmount').on('keyup',function(){
    	var approvalAmount=parseInt($(this).val());
    	var correctionAmount=parseInt($(this).parent().parent('tr').find('.correction_amount').val());
    	var approvedTotalAmount=(+(correctionAmount)-((approvalAmount)));


    	$(this).parent().parent().find('.approvedamount').text(correctionAmount-approvalAmount);
    	$(this).parent().parent().find('.totalApprovedAmount').text(correctionAmount-approvalAmount);

    	console.log('ddd',correctionAmount,'approvalAmount',approvalAmount,'approvedTotalAmount');
    });
    function unapproveRequest(id){
    	console.log('approve Request Id',id,$('form'+id).serialize(),`(#form${id})`);

    	$.ajax({
    		url: "admin/account/correction" + '/' + id + '/edit', 
    		method:"GET",
    		success: function(response){
    			console.log('ajax call',response);
    			if(response.status){
    				$('.correctionRow'+id).remove();
    				toastr.success('Record Update Successfully');
    			}
    			else{
    				toastr.danger('Record not update');
    			}
    		}});
    }

    function approveRequest(id){

    	console.log('approve Request Id',id,$('form'+id).serialize(),`(#form${id})`);


    	var correction_id=$('.correction_id'+id).val();

    	var amount=$('.amount'+id).val();
    	var description=$('.description'+id).val();

    	var query_params = {correctinId:correction_id,approveAmount:amount,description:description };
    	console.log('query_params',query_params);


    	$.ajax({
    		url: "{{route('approval-correction.store')}}", 
    		method:"POST",
    		data:{correctinId:correction_id,approveAmount:amount,description:description},
    		success: function(response){

    			console.log('ajax call',response);
    			if(response.status){
    				$('.correctionRow'+id).remove();
    				toastr.success('Record Update Successfully');
    			}
    			else{
    				toastr.danger('Record not update');
    			}
    		}});
    }

</script>

@endpush