@extends('_layouts.admin.default')
@section('title', 'Student Freeze')
@section('content')
<div class="content container-fluid">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <div class="card-box">
        <div class="col-md-12">

          <a href="{{route('admission-package.create')}}"><button style="font-size:36px;color:#000d82;"> <i class="fa fa-plus"></i><br><input type='button' id='btn' value='Add Package'  class="btn btn-primary float-center allrecord"></button></a>
        </div>


        <div id="printAllRecord" >
          <div class="card-block">
            <!-- <h4 class="card-title">Student Left @isset($records[0]->student->branch) Of {{$records[0]->student->branch->branch_name}}@endisset</h4> -->
            @component('_components.alerts-default')
            @endcomponent

            <table id="example" class="table border table-bordered ">
              <thead>
                <tr >

                  <th>Branch</th>
                  <th>Class</th>

                  <th>Registration</th>
                  <th>Admission</th>
                  <th>Security</th>
                  <th>Annual Fee</th>
                  <th>Scholarship Fee</th>
                  <th>Net Annual Fee</th>

                </tr>
              </thead>
              <tbody>
               @isset($records)
               @php($class=0)
               @foreach($records as $pro)
               @php($classId=$pro->branch_id)
                  @if($classId!=$class)
                  <tr> 
                    <td colspan="8"><strong>@if(isset($pro->branch->branch_name)){{$pro->branch->branch_name}} @endif </strong> 
                      <!-- <a href="{{route('admission-package.edit',$pro->branch_id)}}" class="btn btn-success">Edit</a> -->
                    </td> 
                  </tr> 
                  @endif

               <tr>
               <td>@isset($pro->branch){{$pro->branch->branch_name}} @endisset</td>
               <td>@isset($pro->course){{$pro->course->course_name}} @endisset</td>

               <td>@isset($pro->registration_Fee){{$pro->registration_Fee}} @endisset</td>
               <td>@isset($pro->admission_Fee){{$pro->admission_Fee}} @endisset</td>
               <td>@isset($pro->security_Refundable){{$pro->security_Refundable}} @endisset</td>
               <td>@isset($pro->annual_fee){{$pro->annual_fee}} @endisset</td>
               <td>@isset($pro->scholarship){{$pro->scholarship}} @endisset</td>
               <td>@isset($pro->annually){{$pro->annually}} @endisset</td>
              </tr>
              @php($class=$pro->branch_id)
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