@extends('_layouts.admin.default')
@section('title', 'Stdudent With Zero')
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
          <h4 class="card-title">Stdudent With Zero </h4>
          @component('_components.alerts-default')
            @endcomponent

            <table id="example" class="table border table-bordered ">
            <thead>
              <tr >
                <td></td>
                <th>Ly no</th>
                <th>Student Name</th>
                <th>Branch</th>
                <th>Class</th>
                <th>Date of Admission</th>
                <th>FeeId</th>
                
              </tr>
            </thead>
            <tbody>
             @isset($temarray)
              @php($index=1)


              @foreach($temarray as $pro)

                  <tr>
                    <td>{{$index++}}</td>
                    <td>@isset($pro){{$pro->id}}@endisset</td>
                    <td>@isset($pro){{$pro->s_name}}@endisset</td>
                    <td>@isset($pro->Branchs){{$pro->Branchs->branch_name}}@endisset</td>
                    <td>@if(isset($pro->course->course_name)){{$pro->course->course_name}} @endif </td>
                    <td>@if(isset($pro->admission_date)){{$pro->admission_date}} @endif </td>
                    <td>@isset($pro->branchFeePostDesc){{$pro->branchFeePostDesc->id}}@endisset</td>
                  </tr>
              


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
  
</script>

@endpush