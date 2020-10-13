@extends('_layouts.admin.default')
@section('title', 'Approved Student Re-admission')
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
					<h4 class="card-title">Approved Student Re-admission </h4>

         <!--  <h2 > @isset($students[0]->student->branch) {{$students[0]->student->branch->branch_name}}@endisset</h2> -->
					@component('_components.alerts-default')
						@endcomponent

					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
						<thead>
							<tr >
								<th>Ly no</th>
                <th>Student</th>
                <th>Branch</th>
                <th>Description</th>
                <th>Reason</th>
                <th>Action</th>
                <th>Action</th>
							</tr>
						</thead>
						<tbody>
							@isset($students)
              @php($class=0)
							@foreach($students as $pro)
              @php($classId=$pro->student->course_id)
              @if($classId!=$class)
                  <tr> 
                    <td colspan="13"><strong>@if(isset($pro->student->course->course_name)){{$pro->student->course->course_name}} @endif </strong></td> 
                  </tr> 
                  @endif
                  <tr class="correctionRow{{$pro->id}}">
                    <form method="POST" action="javascript:;" id="form{{$pro->id}}">
                      <input type="hidden" name="" class="correction_id{{$pro->id}}" value="{{$pro->id}}">
                    <td>{{$pro->std_id}}</td>
                    <td>@isset($pro->student){{$pro->student->s_name}}@endisset</td>
                    <td>@isset($pro->student){{$pro->student->branch->branch_name}}@endisset</td>
                    <td >@isset($pro->description){{$pro->description}}@endisset</td>
                    <td><input type="text"  name="remarks" class="remakrs{{$pro->id}}" value=""style="max-width: 60px;"></td>


                    <td><button onclick="approveRequest({{$pro->id}})" class="btn btn-info btn-sm" >Approve</button>
                    </form></td>
                    <td>
                    <button onclick="unapproveRequest({{$pro->id}})" class="btn btn-danger btn-sm" >unapproved</button>
                   </td>
							 </tr>
              

              @php($class=$pro->student->course_id)
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
            url: "admin/student/re-admission-report" + '/' + id + '/edit', 
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
          var remarks=$('.remakrs'+id).val();

          var query_params = {left_id:correction_id,remarks:remarks };
            console.log('query_params',query_params);
         $.ajax({
            url: "{{route('approval-re-admission.store')}}", 
            method:"POST",
            data:{id:correction_id,remarks:remarks},
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