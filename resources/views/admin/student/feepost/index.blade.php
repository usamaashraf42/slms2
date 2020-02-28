@extends('_layouts.admin.default')
@section('title', 'Fee Post')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">Fee Posts @isset($fees[0]->student->s_name) Of {{$fees[0]->student->s_name}} @endisset</h4>
					
					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
							<thead>
								<tr>
									<th></th>
									<th>Fee Id</th>
									<th>Month</th>
									<th>Year</th>
									<th>Total Fee</th>
									<th>Last Deposit Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@isset($fees)
									@foreach($fees as $cour)
									<tr>
										<td><input type="checkbox" name="ids[]" value="{{$cour->id}}"></td>
										<td>@isset($cour->id){{$cour->id}}@endisset</td>
										<td>@isset($cour->fee_month){{ getMonthName($cour->fee_month) }}@endisset</td>
										<td>
											@isset($cour->fee_year){{$cour->fee_year}}@endisset
										</td>

										<td> @isset($cour->total_fee){{$cour->total_fee}}@endisset </td>
										<td> @isset($cour->fee_due_date1){{$cour->fee_due_date1}}@endisset </td>
										<td>
											<a href="{{route('student.challen',$cour->id)}}"  class="btn btn-info btn-sm">Challen</a>
										</td>
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