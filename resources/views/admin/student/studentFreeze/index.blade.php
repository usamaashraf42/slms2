@extends('_layouts.admin.default')
@section('title', 'Student Freeze')
@section('content')
<div class="content container-fluid">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <div class="card-box">
        <div class="col-md-12">

          <button style="font-size:36px;color:#000d82;" onclick="printDiv(this,printAllRecord);"> <i class="fa fa-print"></i><br><input type='button' id='btn' value='All Record Print'  class="btn btn-primary float-center allrecord"></button>
        </div>


        <div id="printAllRecord" >
        <div class="card-block">
          <!-- <h4 class="card-title">Student Left @isset($records[0]->student->branch) Of {{$records[0]->student->branch->branch_name}}@endisset</h4> -->
          @component('_components.alerts-default')
            @endcomponent

            <table id="example" class="table border table-bordered ">
            <thead>
              <tr >
                <th>Std Id#</th>
                <th>Student</th>
                <th>Branch</th>

                <th>DateOfAdd</th>
                <th>FreezeDate</th>
                <th>FreezeTillDate</th>

                <th>Reason</th>

              </tr>
            </thead>
            <tbody>
             @isset($students)
              @php($class=0)
              @foreach($students as $pro)
              @php($classId=$pro->course_id)
              @if($classId!=$class)
                  <tr> 
                    <td colspan="13"><strong>@if(isset($pro->course->course_name)){{$pro->course->course_name}} @endif </strong></td> 
                  </tr> 
                  @endif
                  <tr>
                    <td>@isset($pro->id){{$pro->id}}@endisset</td>
                    <td>@isset($pro){{$pro->s_name}}@endisset</td>
                    <td>@isset($pro){{$pro->branch->branch_name}}@endisset</td>

                    <td>@isset($pro->admission_date){{date("d-M-Y", strtotime($pro->admission_date) ) }}@endisset</td>
                    <td>@isset($pro->freeze_date){{date("d-M-Y", strtotime($pro->freeze_date) ) }}@endisset</td>
                    <td>@isset($pro->freeze_till_date){{date("d-M-Y", strtotime($pro->freeze_till_date) ) }}@endisset</td>

                    <td>@isset($pro->description){{$pro->description}}@endisset</td>
                   
                   
                   
                    
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

 
</script>

@endpush