@extends('_layouts.admin.default')
@section('title', 'Correction Report')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="col-md-12">
          <input type='button' id='btn' value='Print' onclick="printDivs(this,printAllRecord)" 
          class="btn btn-primary float-center allrecord" style="width: 100%;">
        </div>
        <div id="printAllRecord" >
          <style>
            .table_1 th{
              padding: 1px;
              margin: 0.2px;
             border: 1px solid #000;
            }
            .table-bordered td, .table-bordered th {
    border: 1px solid #000000;
    font-size: 12px!important;
}
           .table_1 th{
              padding: 3px;
              margin: 0.2px;
              border: 1px solid #000;
            }
            td,th{
              border: 1px solid #000;
               padding: 3px;
            }
          </style>
				<div class="card-block">
					<h4 class="card-title">Correction Report @isset($correction[0]->student->branch) Of {{$correction[0]->student->branch->branch_name}}@endisset</h4>
					@component('_components.alerts-default')
						@endcomponent

						<table id="example" class="table_1 border table-bordered ">
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
                <th>Status</th>
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
                    <td>@isset($pro->student){{$pro->student->id}}@endisset</td>
                    <td>@isset($pro->student){{$pro->student->s_name}}@endisset</td>
                    <td style="width: 100px;">@isset($pro->student){{$pro->student->branch->branch_name}}@endisset</td>
                    <td>@isset($pro->feeId){{$pro->feeId}}@endisset</td>
                    <td>@isset($pro->feePost->total_fee){{$pro->feePost->total_fee+$pro->feePost->corrected_amount + $pro->feePost->isdeffered}}@endisset</td>
                    <td>@isset($pro->feePost){{getMonthName($pro->feePost->fee_month)}}@endisset</td>
                    <td>@isset($pro->amount){{$pro->amount}}@endisset</td>
                    <td>@isset($pro->feePost->isdeffered){{$pro->feePost->isdeffered}}@endisset</td>
                    <td>@isset($pro->feePost->total_fee){{$pro->feePost->total_fee}}@endisset</td>

                    <td>@isset($pro->student->studentFee){{$pro->student->studentFee->installment_no}}@endisset</td>
                    <td>@isset($pro->make_auto_installments){{$pro->make_auto_installments}}@endisset</td>
                    <td>@isset($pro->corr_remarks){{$pro->corr_remarks}}@endisset</td>
                    <td>@if($pro->correction_approv==1)<button class="btn btn-success btn-sm">{{'approved'}}</button>@endif @if($pro->correction_approv==2)<button class="btn btn-danger btn-sm">{{'Unapproved'}}@endif </button> @if($pro->correction_approv==0)<button class="btn btn-warning btn-sm">{{'pending'}}@endif </button></td>
                    
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

@endpush
@push('post-scripts')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
<script>
  function printDivs(eve,obj)
    {


      $("#printAllRecord").print();


    }

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