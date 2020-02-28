@extends('_layouts.admin.default')
@section('title', 'Trial Balance')
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
					<h4 class="card-title">Trial Balance </h4>
          @php($counter=0)
         
          @component('_components.alerts-default')
          @endcomponent

          <div class="table-responsive">
            <table id="example" class="table border table-bordered ">
              <thead>
               <tr >
                <th></th>
                <th>Dabit</th>
                <th>Credit</th>
                <th>Balance</th>
                
              </tr>
            </thead>
            <tbody>
             @isset($accounts)

             @foreach($accounts as $pro)


            

              <tr >
                <td colspan="4"><strong>{{$pro->name}}</strong></td>
                
                   @foreach($pro->childrens as $acc)
                  <tr>
                    <td>{{$acc->name}}</td>
                    <td>@if(isset($acc->dabit) && $acc->dabit>0) {{$acc->dabit}} @endif</td>
                    <td>@if(isset($acc->credit) && $acc->credit<0) {{$acc->credit}} @endif</td>
                    <td>@if(isset($acc->balance) && $acc->balance<0) {{$acc->balance}} @endif</td>
                   
                  </tr>
                  @endforeach
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
	

    </script>

    @endpush