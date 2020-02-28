@extends('_layouts.admin.default')
@section('title', 'Correction Approved Report')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">Correction Approved Report</h4>
					@component('_components.alerts-default')
						@endcomponent

					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
						<thead>
              <tr >
                <th>Ly no</th>
                <th>Student</th>
                <th>Branch</th>
                <th>FeeId</th>
                <th>Posted Amount</th>
                <th>Month</th>
                <th>Cor Amount</th>
                
                <th>Deferred Amount</th>
                <th>After Cor</th>
                <th>Existing Ins</th>
                <th>Cor Auto Installment</th>
                <th>Reason</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             @isset($correction)
              @php($class=0)
              @foreach($correction as $pro)
              @php($classId=$pro->student->course_id)
              @if($classId!=$class)
                  <tr> 
                    <td colspan="13"><strong>@if(isset($pro->student->course->course_name)){{$pro->student->course->course_name}} @endif </strong></td> 
                  </tr> 
                  @endif
                  <tr>
                    <td>@isset($pro->student){{$pro->student->s_lyceonianNo}}@endisset</td>
                    <td>@isset($pro->student){{$pro->student->s_name}}@endisset</td>
                    <td>@isset($pro->student){{$pro->student->branch->branch_name}}@endisset</td>
                    <td>@isset($pro->feeId){{$pro->feeId}}@endisset</td>
                    <td>@isset($pro->feePost->total_fee){{$pro->feePost->total_fee+$pro->feePost->corrected_amount + $pro->feePost->isdeffered}}@endisset</td>
                    <td>@isset($pro->feePost){{getMonthName($pro->feePost->fee_month)}}@endisset</td>
                    <td>@isset($pro->amount){{$pro->amount}}@endisset</td>
                    <td>@isset($pro->feePost->deffered_amount){{$pro->feePost->deffered_amount}}@endisset</td>
                    <td>@isset($pro->feePost->total_fee){{$pro->feePost->total_fee}}@endisset</td>

                    <td>@isset($pro->student->studentFee){{$pro->student->studentFee->installment_no}}@endisset</td>
                    <td>@isset($pro->make_auto_installments){{$pro->make_auto_installments}}@endisset</td>
                    <td>@isset($pro->corr_remarks){{$pro->corr_remarks}}@endisset</td>
                    <td>@if($pro->correction_approv==1)<button class="btn btn-success btn-sm">{{'approved'}}</button>@endif @if($pro->correction_approv==2)<button class="btn btn-danger btn-sm">{{'Unapproved'}}@endif </button> @if($pro->correction_approv==0)<button class="btn btn-info btn-sm">{{'pending'}}@endif </button>
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
	{{-- ///////////////////////// Model is start /////////////////////////// --}}
					<!--............................ modal is open .................................. -->
 <div id="model_append"></div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Correction Request</h5>
            <button type="button" class="close" data-dismiss="modal" onclick="null_model()" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('approval-correction.store')}}" method="POST">
              @csrf
             <input  type="hidden" name="correctinId" placeholder="First Name" class="form-control correctinId" readonly>
              <div class="row" id="">
              	<div class="col-md-12">
                  <label class="control-label"> Student Name</label>
                  <input  type="text" placeholder="First Name" class="form-control stdinfo" readonly>
              	</div>
              
              	<div class="col-md-12">
              
              			<label class="control-label"> Fee Id</label>
                  		<input type="text" placeholder="First Name" class="form-control feeId" readonly>
              		</div>
              		<div class="col-md-12">
              			<label class="control-label"> Branch</label>
                  		<input type="text" placeholder="First Name" class="form-control branch" readonly>
              		</div>
              		<br>
                  
              	
              	
              	<div class="col-md-12">
                  <label class="control-label"> Correction Amount</label>
                  <input name="amount" value="{{ old('amount') }}" type="text" placeholder="First Name" class="form-control amount" readonly>
              	</div>
              	<br>
              	<div class="col-md-12" id="amount" style="">
                  <label class="control-label"> Approved Amount</label>
                  <input name="approveAmount" value="{{ old('approveAmount') }}" type="number" placeholder="approved Amount" class="form-control">
              	</div>
              </div>
             
              </br>
               
              </br>
              
              <div class="form-group ">
                <label for="corr_remarks">Remarks</label>
                <textarea class="form-control" id="corr_remarks" name="corr_remarks" rows="4">{{old('corr_remarks')}}</textarea>
                
              </div>
             

          </div>
          <div class="modal-footer">
          	 <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button type="button" class="btn btn-secondary" onclick="null_model()" data-dismiss="modal">Close</button>
            </form>
            
            
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
	function null_model(){
        // alert("s");
         $("#append_data").text('');
           $("#append_data").html('');
      }

      
      	function approveRequest(id){
      		console.log('approve Request Id',id);
         $.ajax({
            url: "{{route('correctionRecord')}}", 
            method:"POST",
            data:{'id':id},
            success: function(response){
            	console.log('ajax call',response);
              if(response.status){
                $('.stdinfo').val(response.data.student.s_name);
                $('.branch').val(response.data.student.branch.branch_name);
                $('.amount').val(response.data.amount);
                $('.correctinId').val(response.data.id);
                $('.feeId').val(response.data.feeId);
                if(response.data.tbl_correctioncol==12){
                  console.log('gg');
                  $('#amount').css({"display": "none"});
                }else{
                  console.log('display show');
                  $('#amount').css({"display": "block"});
                }
                
              }
              else{
                console.log(response.message);
              }
            }});
      }
 
</script>

@endpush