@extends('_layouts.admin.default')
@section('title', 'Inventory')
@section('content')
<div class="content container-fluid">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <div class="card-box">

        <div class="card-block">
          <h4 class="card-title">Inventory</h4>

          @component('_components.alerts-default')
          @endcomponent
          <div class="table-responsive">
            <table id="example" class="table border table-bordered ">
              <thead>
                <tr>
                  <th>Category</th>
                  <th>Sub Category</th>
                  <th>Product</th>
                  <th>Qty</th>

                </tr>
              </thead>
              <tbody>
               @isset($inventories)
               @foreach($inventories as $pro)
               @php($classId=0)
               @if($classId!=$pro->branch_id)
               <tr> 
                <td colspan="4"><strong>@if(isset($pro->branch->branch_name)){{$pro->branch->branch_name}} @endif </strong></td> 
              </tr> 
              @php($classId=$pro->branch_id)
              @endif

              <tr>
                <td>@isset($pro->category){{$pro->category->pro_cat_name}}@endisset</td>
                <td>@isset($pro->sub_category){{$pro->sub_category->pro_cat_name}}@endisset</td>
                <td>@isset($pro->product){{$pro->product->pro_name}}@endisset</td>
                <td>{{$pro->qty}}</td>
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