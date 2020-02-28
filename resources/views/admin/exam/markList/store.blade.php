@extends('_layouts.admin.default')
@section('title', 'Marks List')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			 <div class="card-block">
          <h4 class="card-title">Marks List </h4>
				<div class="col-md-12">
          <button style="font-size:36px;color:#000d82;" onclick="printDivs(this,printAllRecord)"> <i class="fa fa-print"></i><br><input type='button' id='btn' value='Print'  class="btn btn-primary float-center allrecord"></button>
          <!-- <input type='button' id='btn' value='Print' onclick="printDivs(this,printAllRecord)" 
          class="btn btn-primary float-center allrecord" style="width: 100%;"> -->
        </div>
        <div id="printAllRecord" >
          <style>
            .table_1 th{
              padding: 2.5px;
              margin: 0.5px;
             border: 1px solid #000;
            }
            .table-bordered td{
    border: 1px solid #000000;
    font-size: 15px!important;
}
            .table-bordered td, .table-bordered th {
    border: 1px solid #000000;
    font-size: 12px!important;
}
           .table_1 th{
              padding: 3px;
              margin: 0.3px;
              border: 1px solid #000;
            }
            td,th{
              border: 1px solid #000;
               padding: 3px;
            }
            page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;  
}
          </style>
			
					@component('_components.alerts-default')
						@endcomponent
<page size="A4" layout="landscape">
						<table id="example" class="table_1 border table-bordered ">
						<thead>
              <tr >
                <th></th>
                <th>Std Id</th>
                <th>Student</th>

                @if(isset($data[0]->subject_marks) && count($data[0]->subject_marks))
            
                  @foreach($data[0]->subject_marks as $sub)
                  <th>@isset($sub->subjects) {{$sub->subjects->sub_name}} @endisset</th>
                  @endforeach
                  @endif

             

                <th> Total Marks</th>
                
              </tr>
            </thead>
            <tbody>
             @isset($data)
              @php($class=0)
              @php($index=0)
              @foreach($data as $pro)


              
              @php($classId=$pro->section_id)
                @if($classId!=$class)
                  <tr> 
                    <td colspan="13"><strong>@if(isset($pro->student->course->course_name)){{$pro->student->course->course_name}} @endif </strong></td> 
                  </tr> 
                  @endif

                  @php($totalMarks=0)
                  @php($totalOverAllMarks=0)
                  <tr>
                    <td>{{++$index}}</td>
                    <td>@isset($pro->student){{$pro->student->id}}@endisset</td>
                    <td>@isset($pro->student){{$pro->student->s_name}}@endisset</td>
                    @if(isset($pro->subject_marks) && count($pro->subject_marks))
            
                    @foreach($pro->subject_marks as $sub)
                    <td>@isset($sub->gain_marks) {{$sub->gain_marks}} / {{$sub->total_marks}} @endisset</td>
                          @php($totalMarks+=$sub->gain_marks)
                          @php($totalOverAllMarks+=$sub->total_marks)
                    @endforeach
                  @endif


                    <td>{{$totalMarks}}/{{$totalOverAllMarks}}</td>
                   
                    
               </tr>
              

              @php($class=$pro->section_id)
              @endforeach
              @endisset
            </tbody>
					</table>
        </page>
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