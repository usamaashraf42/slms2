@extends('_layouts.admin.default')
@section('title', 'Student Left Approved Report')
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
				<div class="card-block">
					<h4 class="card-title">Student Left Approved Report </h4>
					@component('_components.alerts-default')
						@endcomponent

						<table id="example" class="table border table-bordered ">
						<thead>
              <tr >
                <th>Ly no</th>
                <th>Student</th>
                <th>Branch</th>

                <th>Reason</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
             @isset($records)
              @php($class=0)
              @foreach($records as $pro)
              @php($classId=$pro->student->course_id)
              @if($classId!=$class)
                  <tr> 
                    <td colspan="13"><strong>@if(isset($pro->student->course->course_name)){{$pro->student->course->course_name}} @endif </strong></td> 
                  </tr> 
                  @endif
                  <tr>
                    <td>@isset($pro->std_id){{$pro->std_id}}@endisset</td>
                    <td>@isset($pro->student){{$pro->student->s_name}}@endisset</td>
                    <td>@isset($pro->student){{$pro->student->branch->branch_name}}@endisset</td>
                    <td>@isset($pro->description){{$pro->description}}@endisset</td>
                   
                   
                    <td>
                      @if($pro->status==1)<button class="btn btn-success btn-sm">{{'approved'}}</button>@endif @if($pro->status==2)<button class="btn btn-danger btn-sm">{{'Unapproved'}}@endif </button> @if($pro->status==0)<button class="btn btn-warning btn-sm">{{'pending'}} </button>@endif 

                      @if($pro->status==1)<a class="btn btn-warning btn-sm" href="{{route('student.certificate',$pro->id)}}">{{'Certificate'}}</a>@endif 

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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
<script>
  function printDivs(eve,obj)
    {


      $("#printAllRecord").print();


    }
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