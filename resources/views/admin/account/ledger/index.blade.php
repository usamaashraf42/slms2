@extends('_layouts.admin.default')
@section('title', 'Ledger')
@section('content')
@php($dabit=0)
@php($credit=0)
@php($index=0)
<style>
	.img-circle{
		border-radius: 50%!important;
	}
</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/svg.js/3.0.13/svg.js">
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Ledger @isset($master[0]->account->name){{$master[0]->account->name.'  '.$master[0]->account->id}} @endisset</h4>
					<div class="heading-elements float-right">
						<strong>@isset($master[0]->account->type){{$master[0]->account->type}}@endisset</strong>
					</div>
<!-- 					<form action="{{route('application.selectedApplicant')}}" method="POST" >

 -->						<div class="container">
								
						

							</div>

						@component('_components.alerts-default')
						@endcomponent

						<div class="table-responsive">
							<table id="example" class="table border table-bordered ">
								<thead>
									<tr>
										<th>#</th>
										<!-- <th>Transaction</th> -->
										<th> No</th>
										<th>Description  </th>
										<th>Date  </th>
										
										<th>Type</th>
										<th>Dabit  </th>
										<th>Credit  </th>
										<th>Balance  </th>
										

									</tr>
								</thead>
								<tbody>
									@if(isset($master))
									@foreach($master as $masters)
									<tr>
										<td>{{$index+=1}}</td>

										<!-- <td></td> -->

										<td>@isset($masters->detail_id){{$masters->detail_id}}@endisset</td>
										<td>@isset($masters->description){{$masters->description}}@endisset</td>
										<td>@isset($masters->posting_date){{$masters->posting_date}}@endisset</td>
										

										<td>@if($masters->amount_type=='CR')<?php $credit += $masters->a_credit;?> <span class="badge badge-primary">CR<span> @else <span class="badge badge-warning"><?php $dabit += $masters->a_debit;?> DB<span> @endif</td>
											<td>@isset($masters->a_debit){{$masters->a_debit}}@endisset</td>
											<td>@isset($masters->a_credit){{$masters->a_credit}}@endisset</td>
											<td>@isset($masters->balance){{$masters->balance}}@endisset</td>

											</tr>
											@endforeach
											@endif
										</tbody>
									<!-- </form> -->
								</table>
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
	


	</script>
	
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
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	<script>
		// $(document).ready(function() {

		// 	$('#example thead tr').clone(true).appendTo( '#example thead' );
		// 	$('#example thead tr:eq(1) th').each( function (i) {
		// 		var title = $(this).text();
		// 		$(this).html( '<input type="text" placeholder="Search '+title+'" />' );

		// 		$( 'input', this ).on( 'keyup change', function () {
		// 			if ( table.column(i).search() !== this.value ) {
		// 				table
		// 				.column(i)
		// 				.search( this.value )
		// 				.draw();
		// 			}
		// 		} );
		// 	} );

		// 	// var table = $('#example').DataTable( {
				

			
		// 	// } );


		// } );
	$(document).ready(function() {
	// DataTable initialisation
	$('#example').DataTable(
		{
			"paging": false,
			"autoWidth": true,
			"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api();
				nb_cols = api.columns().nodes().length;
				var j = 3;
				while(j < nb_cols){
					var pageTotal = api
                .column( j, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return Number(a) + Number(b);
                }, 0 );
          // Update footer
          $( api.column( j ).footer() ).html(pageTotal);
					j++;
				} 
			}
		}
	);
});
	</script>


	@endpush