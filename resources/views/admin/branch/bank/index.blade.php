@extends('_layouts.admin.default')
@section('title', 'Bank')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col-sm-8">
              <h4 class="page-title">Bank Mangement</h4>
            </div>
            <div class="col-sm-4 text-right m-b-30">
              <a href="{{route('bank.create')}}" class="btn btn-primary rounded" ><i class="fa fa-plus"></i> Add New </a>
            </div>
          </div>
          <br>

          @component('_components.alerts-default')
          @endcomponent
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="default-datatable" class="table">
                  <thead>
                    <tr>
                     <tr>
                      <th>#</th>
                      <th>Bank Name </th>
                      <th> Account No </th>
                      <td>Contact</td>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <body>
                    @foreach($banks as $bank)
                    <tr>
                      <td>{{$bank->id}}</td>
                      <td>{{$bank->bank_name}}</td>
                       <td>{{$bank->account_no}}</td>
                       <td>{{$bank->cont_no}}</td>
                       <td>{{$bank->address}}</td>
                       <td><a href="{{route('bank.edit',$bank->id)}}"  class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    @endforeach
                  </body>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


  @endsection
  @push('post-styles')
  <<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
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