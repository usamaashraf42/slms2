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
@php($counter=0)
          <h2 > @isset($stduents[0]->branch) {{$stduents[0]->branch->branch_name}}@endisset</h2>
					@component('_components.alerts-default')
						@endcomponent

					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
						<thead>
							<tr >
                <th></th>
								<th>Std Id</th>
								<th>Name</th>
								<th>DOA</th>

                <th>Annual Fee</th>
                <th>Sch</th>
                <th>Net Annual Fee</th>
								<th>Reg</th>

								<th>june</th>
                <th>July</th>
                <th>Aug</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dec</th>
                <th>Jan</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Apr</th>
                <th>May</th>

                <th>Total paid</th>
                <th>Remaining</th>


                <th>Books</th>
                <th>Uniform</th>
                <th>Transport</th>

                
                <th>Action</th>
							</tr>
						</thead>
						<tbody>
							@isset($stduents)
              @php($class=0)
							@foreach($stduents as $pro)
              @php($classId=$pro->course_id)
              @if($classId!=$class)
                  <tr> 
                    <td colspan="13"><strong>@if(isset($pro->course->course_name)){{$pro->course->course_name}} @endif </strong></td> 
                  </tr> 
                  @endif

                  <tr class="row_std_{{$pro->id}}">
                    <form method="POST" action="javascript:;" id="form{{$pro->id}}">
                      <input type="hidden" name="" class="std_id{{$pro->id}}" value="{{$pro->id}}">
                    <td>{{++$counter}}</td>
                    <td>{{$pro->id}}</td>
                    <td>@isset($pro->s_name){{$pro->s_name}}@endisset</td>
                    <td>@isset($pro->s_DOB){{$pro->s_DOB}}@endisset</td>

                    <td><input  name="annual_fee" data-ids="{{$pro->id}}" class="pay_amount  std_annual_fee_{{$pro->id}} annual_fee" value="@isset($pro->studentFee){{$pro->studentFee->annual_fee}}@endisset" style="max-width: 40px;"></td>
                    <td><input  name="scholarship_of" data-ids="{{$pro->id}}" class="pay_amount  std_scholarship_of_{{$pro->id}} scholarship_of" value="@isset($pro->studentFee){{$pro->studentFee->scholarship_of}}@endisset" style="max-width: 40px;"></td>
                    <td><input  name="Net_AnnualFee" data-ids="{{$pro->id}}" class="pay_amount  std_Net_AnnualFee_{{$pro->id}} total_payable" readonly value="@isset($pro->studentFee){{$pro->studentFee->Net_AnnualFee}}@endisset" style="max-width: 40px;"></td>

                    <td><input  name="reg_fee" data-ids="{{$pro->id}}" class="pay_amount std_reg_fee_{{$pro->id}} " value="@isset($pro->studentFee){{$pro->studentFee->reg_fee}}@endisset" style="max-width: 40px;"></td>

                    <td><input type="number" step="any" min="0"  name="std_m6_{{$pro->id}}"  data-ids="{{$pro->id}}" class="pay_amount std_m6_{{$pro->id}}" value="0" style="max-width: 40px;"></td>
                    <td><input type="number" step="any" min="0"  name="std_m7_{{$pro->id}}"  data-ids="{{$pro->id}}" class="pay_amount std_m7_{{$pro->id}}" value="0" style="max-width: 40px;"></td>
                    <td><input type="number" step="any" min="0"  name="std_m8_{{$pro->id}}"  data-ids="{{$pro->id}}" class="pay_amount std_m8_{{$pro->id}}" value="0" style="max-width: 40px;"></td>
                    <td><input type="number" step="any" min="0"  name="std_m9_{{$pro->id}}"  data-ids="{{$pro->id}}" class="pay_amount std_m9_{{$pro->id}}" value="0" style="max-width: 40px;"></td>
                    <td><input type="number" step="any" min="0"  name="std_m10_{{$pro->id}}"  data-ids="{{$pro->id}}" class="pay_amount std_m10_{{$pro->id}}" value="0" style="max-width: 40px;"></td>
                    <td><input type="number" step="any" min="0"  name="std_m11_{{$pro->id}}"  data-ids="{{$pro->id}}" class="pay_amount std_m11_{{$pro->id}}" value="0" style="max-width: 40px;"></td>
                    <td><input type="number" step="any" min="0"  name="std_m12_{{$pro->id}}" data-ids="{{$pro->id}}"  class="pay_amount std_m12_{{$pro->id}}" value="0" style="max-width: 40px;"></td>
                    <td><input type="number" step="any" min="0"  name="std_m1_{{$pro->id}}"  data-ids="{{$pro->id}}" class="pay_amount std_m1_{{$pro->id}}" value="0" style="max-width: 40px;"></td>
                    <td><input type="number" step="any" min="0"  name="std_m2_{{$pro->id}}"  data-ids="{{$pro->id}}" class="pay_amount std_m2_{{$pro->id}}" value="0" style="max-width: 40px;"></td>
                    <td><input type="number" step="any" min="0"  name="std_m3_{{$pro->id}}"  data-ids="{{$pro->id}}" class="pay_amount std_m3_{{$pro->id}}" value="0" style="max-width: 40px;"></td>
                    <td><input type="number" step="any" min="0"  name="std_m4_{{$pro->id}}"  data-ids="{{$pro->id}}" class="pay_amount std_m4_{{$pro->id}}" value="0" style="max-width: 40px;"></td>
                    <td><input type="number" step="any" min="0"  name="std_m5_{{$pro->id}}"  data-ids="{{$pro->id}}" class="pay_amount std_m5_{{$pro->id}}" value="0" style="max-width: 40px;"></td>

                    <td><input type="number" step="any" min="0" data-ids="{{$pro->id}}"  readonly name="std_total_paid_{{$pro->id}}" class="paid_amount std_total_paid_{{$pro->id}}" value="0" style="max-width: 70px;"></td>
                    <td><input type="number" step="any" min="0" data-ids="{{$pro->id}}" readonly  name="std_remaining_{{$pro->id}}" class="remained_amount std_remaining_{{$pro->id}}" value="@isset($pro->studentFee){{$pro->studentFee->Net_AnnualFee}}@endisset" style="max-width: 70px;"></td>
                    <td><input type="number" step="any" min="0" data-ids="{{$pro->id}}"  name="std_book_{{$pro->id}}" class="std_book_{{$pro->id}}" value="0" style="max-width: 40px;"></td>
                    <td><input type="number" step="any" min="0" data-ids="{{$pro->id}}"  name="std_uniform_{{$pro->id}}" class="std_uniform_{{$pro->id}}" value="0" style="max-width: 40px;"></td>
                    <td><input type="number" step="any" min="0" data-ids="{{$pro->id}}"  name="std_transport_{{$pro->id}}" class="std_transport_{{$pro->id}}" value="0" style="max-width: 40px;"></td>

                    <td><button onclick="approveRequest({{$pro->id}})" data-ids="{{$pro->id}}" class="btn btn-info btn-sm" >Update</button>
                    </td>
                    </form>
							 </tr>
              

              @php($class=$pro->course_id)
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

      
    
      
      	function approveRequest(id){

      		   var std_ids=(id);
             console.log('ids',id);
             var std_id=id;
            var annual_fee=parseFloat($('.std_annual_fee_'+std_ids).val());
            var scholarship_of=parseFloat($('.std_scholarship_of_'+std_ids).val());
            var std_Net_AnnualFee_=parseFloat($('.std_Net_AnnualFee_'+std_ids).val());

            var std_reg_fee_=parseFloat($(".std_reg_fee_"+std_ids).val());

            var std_m6_=parseFloat($('.std_m6_'+std_ids).val());
            var std_m7_=parseFloat($('.std_m7_'+std_ids).val());
            var std_m8_=parseFloat($('.std_m8_'+std_ids).val());
            var std_m9_=parseFloat($('.std_m9_'+std_ids).val());
            var std_m10_=parseFloat($('.std_m10_'+std_ids).val());
            var std_m11_=parseFloat($('.std_m11_'+std_ids).val());
            var std_m12_=parseFloat($('.std_m12_'+std_ids).val());
            var std_m1_=parseFloat($('.std_m1_'+std_ids).val());
            var std_m2_=parseFloat($('.std_m2_'+std_ids).val());
            var std_m3_=parseFloat($('.std_m3_'+std_ids).val());
            var std_m4_=parseFloat($('.std_m4_'+std_ids).val());
            var std_m5_=parseFloat($('.std_m5_'+std_ids).val());

            var std_book_=$('.std_book_'+std_ids).val();
            var std_uniform_=$('.std_uniform_'+std_ids).val();
            var std_transport_=$('.std_transport_'+std_ids).val();


          var query_params = {std_id:std_id,annual_fee:annual_fee,scholarship_of:scholarship_of,std_Net_AnnualFee_:std_Net_AnnualFee_,std_reg_fee_:std_reg_fee_,std_m6_:std_m6_,std_m7_:std_m7_,std_m8_:std_m8_,std_m9_:std_m9_,std_m10_:std_m10_,std_m11_:std_m11_,std_m12_:std_m12_,std_m1_:std_m1_,std_m2_:std_m2_,std_m3_:std_m3_,std_m4_:std_m4_,std_m5_:std_m5_,std_uniform_:std_uniform_,std_transport_:std_transport_};
            console.log('query_params',query_params);

               
         $.ajax({
            url: "{{route('updateStdStatementMaster')}}", 
            method:"POST",
            data:{std_id:std_id,annual_fee:annual_fee,scholarship_of:scholarship_of,std_Net_AnnualFee_:std_Net_AnnualFee_,std_reg_fee_:std_reg_fee_,std_m6_:std_m6_,std_m7_:std_m7_,std_m8_:std_m8_,std_m9_:std_m9_,std_m10_:std_m10_,std_m11_:std_m11_,std_m12_:std_m12_,std_m1_:std_m1_,std_m2_:std_m2_,std_m3_:std_m3_,std_m4_:std_m4_,std_m5_:std_m5_,std_uniform_:std_uniform_,std_transport_:std_transport_,std_book_:std_book_},
            success: function(response){
             
            	console.log('ajax call',response);
              if(response.status){
                if(response.status==1){
                  $('.row_std_'+id).remove();
                  toastr.success('Record Update Successfully');
                }else{
                  $('.row_std_'+id).remove();
                  toastr.warning('Failed to remove');
                }
              }
              else{
                 toastr.danger('Record not update');
              }
            }});
      }
 
</script>
<script type="text/javascript">
   $('.pay_amount').on('on keyup',function() {
    var std_ids=$(this).attr('data-ids');
   
    var std_Net_AnnualFee_=parseFloat($('.std_Net_AnnualFee_'+std_ids).val());

    var std_reg_fee_=parseFloat($(".std_reg_fee_"+std_ids).val());

    var std_m6_=parseFloat($('.std_m6_'+std_ids).val());
    var std_m7_=parseFloat($('.std_m7_'+std_ids).val());
    var std_m8_=parseFloat($('.std_m8_'+std_ids).val());
    var std_m9_=parseFloat($('.std_m9_'+std_ids).val());
    var std_m10_=parseFloat($('.std_m10_'+std_ids).val());
    var std_m11_=parseFloat($('.std_m11_'+std_ids).val());
    var std_m12_=parseFloat($('.std_m12_'+std_ids).val());
    var std_m1_=parseFloat($('.std_m1_'+std_ids).val());
    var std_m2_=parseFloat($('.std_m2_'+std_ids).val());
    var std_m3_=parseFloat($('.std_m3_'+std_ids).val());
    var std_m4_=parseFloat($('.std_m4_'+std_ids).val());
    var std_m5_=parseFloat($('.std_m5_'+std_ids).val());

    var std_book_=$('.std_book_'+std_ids).val();
    var std_uniform_=$('.std_uniform_'+std_ids).val();
    var std_transport_=$('.std_transport_'+std_ids).val();

    var paid=0;
    paid+=std_m6_;
    paid+=std_m7_;
    paid+=std_m8_;
    paid+=std_m9_;
    paid+=std_m10_;
    paid+=std_m11_;
    paid+=std_m12_;
    paid+=std_m1_;
    paid+=std_m2_;
    paid+=std_m3_;
    paid+=std_m4_;
    paid+=std_m5_;
    
    $('.std_total_paid_'+std_ids).val(paid);
    $('.std_remaining_'+std_ids).val(std_Net_AnnualFee_-paid);


     console.log('std_ids',std_ids,'std_Net_AnnualFee_',std_Net_AnnualFee_,'paid',paid,'');



 
  });
 $('.annual_fee').add('.scholarship_of').add('.total_payable').on('on keyup',function() {

    var std_ids=$(this).attr('data-ids');

    var annual_fee=parseFloat($('.std_annual_fee_'+std_ids).val());
    var scholarship_of=parseFloat($('.std_scholarship_of_'+std_ids).val());
    $('.std_Net_AnnualFee_'+std_ids).val(annual_fee-scholarship_of);
    $('.std_remaining_'+std_ids).val(annual_fee-scholarship_of);

   
  });

</script>
@endpush