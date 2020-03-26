@extends('_layouts.admin.default')
@section('title', 'Account Statement')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">Account Statement  (Current Balance= {{$ledger->balance}} )</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
							<thead>
								<tr>
									<th>Transaction Id</th>
									<th>Date</th>
									<th>Description</th>
									
									<th>Credit</th>
									<th>Debit</th>
									<th>Balance</th>
									
								</tr>
							</thead>
							<tbody>
								@isset($accounts)
								@foreach($accounts as $account)
								<tr>
									<!-- <td><input type="checkbox" name="ids[]" value="{{$account->id}}"></td> -->
									<td>@isset($account->id){{$account->id}}@endisset</td>
									<td>@isset($account->posting_date){{$account->posting_date}}@endisset</td>
									<td>@isset($account->description){{$account->description}}@endisset</td>
									<td>@isset($account->a_credit){{$account->a_credit}}@endisset</td>
									<td>@isset($account->a_debit){{$account->a_debit}}@endisset</td>
									<td>@isset($account->balance){{$account->balance}}@endisset</td>
									
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
     	"order": [[ 0, "asc" ]],
     	lengthChange: true,
     	pageLength: 50,
     	lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
     	buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
     } );

     table.buttons().container()
     .appendTo( '#example_wrapper .col-md-6:eq(0)' );

 } );
</script>

    @endpush