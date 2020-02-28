@extends('_layouts.admin.default')
@section('title', 'Multi Correction Approval')
@section('content')
<div class="content container-fluid">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <div class="card-box">
        
        <div class="card-block">
          <h4 class="card-title">Multi Correction Approval</h4>
          <h2> @isset($correction[0]->student->branch)  {{$correction[0]->student->branch->branch_name}}@endisset</h2>
          @component('_components.alerts-default')
            @endcomponent

            <form method="POST" action="{{route('multiApproved')}}" >
              @csrf
            
            <label>Approval
            <input type="radio" name="type" id="custom-check" value="Approval" width="60px">
            </label>
            <label>Unapproval
            <input type="radio" name="type" id="custom-check" value="Unapproval" width="60px">
            </label>
            <button type="submit"  class="btn btn-info btn-sm" >Approve</button>
          <div class="table-responsive">
            <table id="example" class="table border table-bordered ">
            <thead>
              <tr >
                <th></th>
                <th>Action</th>
                <th>Ly no</th>
                <th>Student</th>
                <th>FeeId</th>
                <th>Posted Amount</th>
                <th>Month</th>
                <th>Cor Amount</th>
                <th>Deferred Amount</th>
                <th>After Cor</th>
                <th>Existing Ins</th>
                <th>Cor Auto Installment</th>
                <th>Reason</th>
                <th>Desc</th>
               
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
                  <tr class="correctionRow{{$pro->id}}">
                      <td><input type="checkbox" name="correctionId[]" id="custom-check" value="{{$pro->id}}" width="60px">
                      </td>
                      <td><select name="type">
                        <option>Approve</option>
                        <option>Unapprove</option>
                      </select></td>
                    <td><input type="text" class="std_id{{$pro->id}}" name="std_id" value="@isset($pro->std_id){{$pro->std_id}}@endisset" readonly></td>
                    <td><input type="text" readonly value="@isset($pro->student){{$pro->student->s_name}}@endisset" ></td>

                    <td><input type="text" class="feed_id{{$pro->id}}"  value="@isset($pro->feeId){{$pro->feeId}}@endisset" readonly></td>
                    <td><input type="text"  value="@isset($pro->feePost->total_fee){{$pro->feePost->total_fee+$pro->feePost->corrected_amount + $pro->feePost->isdeffered}}@endisset" readonly ></td>

                    <td><input type="text" readonly value="@isset($pro->feePost){{getMonthName($pro->feePost->fee_month)}}@endisset" ></td>

                    <td><input type="text" class="amount{{$pro->id}}"  name="amount[]" value="@isset($pro->amount){{$pro->amount}}@endisset" ></td>
                    <td><input type="text" class="deffered{{$pro->id}}" readonly  value="@isset($pro->feePost->isdeffered){{$pro->feePost->isdeffered}}@endisset" ></td>

                    <td><input type="text" readonly value="@isset($pro->feePost->total_fee){{$pro->feePost->total_fee}}@endisset" ></td>

                    <td><input type="text" class="installment_no{{$pro->id}}" readonly value="@isset($pro->student->studentFee){{$pro->student->studentFee->installment_no}}@endisset" ></td>
                    <td><input type="text" class="make_auto_installments{{$pro->id}}" readonly value="@isset($pro->make_auto_installments){{$pro->make_auto_installments}}@endisset" ></td>
                    <td><input type="text" class="corr_remarks{{$pro->id}}"  value="@isset($pro->corr_remarks){{$pro->corr_remarks}}@endisset" readonly=""></td>
                    <td><input type="text"name="description[]"  ></td>

                   
               </tr>
              

              @php($class=$pro->student->course_id)
              @endforeach
              @endisset
            </tbody>
            </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
 //  $(document).ready(function() {
 //     //Default data table
 //     $('#default-datatable').DataTable();


 //     var table = $('#example').DataTable( {
 //      "order": [[ 0, "desc" ]],
 //      lengthChange: false,
 //      buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
 //     } );

 //     table.buttons().container()
 //     .appendTo( '#example_wrapper .col-md-6:eq(0)' );

 // } );
  function null_model(){
        // alert("s");
         $("#append_data").text('');
           $("#append_data").html('');
      }
      function unapproveRequest(id){
          console.log('approve Request Id',id,$('form'+id).serialize(),`(#form${id})`);

          var std_id=$('.std_id'+id).val();
          var correction_id=$('.correction_id'+id).val();
          var feed_id=$('.feed_id'+id).val();
          var amount=$('.amount'+id).val();
          var deffered=$('.deffered'+id).val();
          var installment_no=$('.installment_no'+id).val();
          var make_auto_installments=$('.make_auto_installments'+id).val();
          var corr_remarks=$('.corr_remarks'+id).val();
          var query_params = {std_id: std_id,correctinId:correction_id,feed_id:feed_id,approveAmount:amount,deffered:deffered,installment_no:installment_no,make_auto_installments:make_auto_installments,corr_remarks:corr_remarks };
            console.log('query_params',query_params);

         
         $.ajax({
            url: "admin/account/correction" + '/' + id + '/edit', 
            method:"GET",
            success: function(response){
              console.log('ajax call',response);
              if(response.status){
                $('.correctionRow'+id).remove();
                swal("Record Update Successfully", "Well done", "success");
       
             
              }
              else{
                 swal("Failed to update", "danger");
              }
            }});
      }
      
        function approveRequest(id){

          console.log('approve Request Id',id,$('form'+id).serialize(),`(#form${id})`);

          var std_id=$('.std_id'+id).val();
          var correction_id=$('.correction_id'+id).val();
          var feed_id=$('.feed_id'+id).val();
          var amount=$('.amount'+id).val();
          var deffered=$('.deffered'+id).val();
          var installment_no=$('.installment_no'+id).val();
          var make_auto_installments=$('.make_auto_installments'+id).val();
          var corr_remarks=$('.corr_remarks'+id).val();
          var query_params = {std_id: std_id,correctinId:correction_id,feed_id:feed_id,approveAmount:amount,deffered:deffered,installment_no:installment_no,make_auto_installments:make_auto_installments,corr_remarks:corr_remarks };
            console.log('query_params',query_params);

         
         $.ajax({
            url: "{{route('approval-correction.store')}}", 
            method:"POST",
            data:{std_id: std_id,correctinId:correction_id,feed_id:feed_id,amount:amount,deffered:deffered,installment_no:installment_no,make_auto_installments:make_auto_installments,corr_remarks:corr_remarks},
            success: function(response){
              console.log('ajax call',response);
              if(response.status){
                $('.correctionRow'+id).remove();
                swal("Record Update Successfully", "Well done", "success");
       
             
              }
              else{
                 swal("Failed to update", "danger");
              }
            }});
      }
 
</script>

@endpush