@extends('_layouts.admin.default')
@section('title', 'Maintaince User')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
					<h4 class="card-title">Maintaince User </h4>


					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
						<thead>
							<tr >
                <th></th>
								<th>Maintain Category</th>
								<th>Users</th>
								
							</tr>
						</thead>
						<tbody>

              @foreach($categories as $main)
              <tr >
               
                <td colspan="3"><strong style="font-size: 16px;padding-right: 12px;">{{$main->main_name}}</strong><i class="fa fa-angle-down" style="font-size:18px;font-weight: bold;"></i></td>
               
                @foreach($main->main_users as $user)
                  <tr>
                    <td colspan="2"></td>
                    <td>@isset($user->user){{$user->user->name}} @endisset</td>
                  </tr>

                @endforeach


                    @foreach($main->maintain_childrens as $child_main)
                    <tr >
                      <td colspan="3"><i class="fa fa-play"></i> <strong>{{$child_main->main_name}} </strong></td>
                      @foreach($child_main->main_users as $user)
                        <tr>
                          <td colspan="2"></td>
                          <td >@isset($user->user){{$user->user->name}} @endisset</td>
                        </tr>
                      @endforeach
                    </tr>
                    @endforeach

              </tr>
              @endforeach
							
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

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endpush
@push('post-scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>

 
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
                if(response.status==1){
                  $('.correctionRow'+id).remove();
                  toastr.success('Record Update Successfully');
                }else{
                  $('.correctionRow'+id).remove();
                  toastr.warning('Correction already approved');
                }
              }
              else{
                 toastr.danger('Record not update');
              }
            }});
      }
 
</script>

@endpush