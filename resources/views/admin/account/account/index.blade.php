@extends('_layouts.admin.default')
@section('title', 'Account')
@section('content')
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
					<h4 class="card-title">Account Mangement</h4>
					<div class="heading-elements float-right">
                        <a href="{{route('account.create')}}"><button type="button" class="btn btn-success btn-min-width mr-1 mb-1"><i class="la la-plus">&nbsp;Add Account</i></button></a>
                    </div>
					<div class="heading-elements float-right">
					</div>
					<form action="{{route('application.selectedApplicant')}}" method="POST" >
						@csrf

						@component('_components.alerts-default')
						@endcomponent

						<div class="table-responsive">
							<table id="example" class="table border table-bordered ">
								<thead>
									<tr>
										<th>No.</th>
										<th>Name</th>
										<th>Type</th>
										<th>Balance</th>
										<th>Category</th>
										<th>Status</th>
										<th>Action</th>
									</tr>

								</thead>
								<tbody>
									@isset($accounts)
									@foreach($accounts as $account)
									<tr>
										<td><input type="checkbox" name="account_id[]" value="{{$account->id}}"></td>
										

										<td>@isset($account->name){{$account->name}} @endisset</td>

										<td>@isset($account->type)<span class="btn btn-info">{{$account->type}}</span>@endisset</td>
										<td>@isset($account->c_balance){{$account->c_balance}} @endisset</td>
										<td>asset</td>
										<td>
											@if($account->email_verified_at)
											<a href="javascript:;"   class="btn btn-success btn-sm">Active</a> 
											@else 
											<a href="javascript:;"  class="btn btn-warning btn-sm">Deactive</a> @endif	
										</td>
										<td><a href="javascript:;"  class="btn btn-info btn-sm">View</a></td>
									</tr>
									@endforeach
									@endisset
								</tbody>
							</form>
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
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endpush
@push('post-scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<link rel="stylesheet" href="{{asset('js/lightbox/css/lightbox.min.css')}}">
    <script src="{{asset('js/lightbox/js/lightbox-plus-jquery.min.js')}}"></script>

<script>
  


$('.myImg').on('click',function(){
	console.log('propo');

	$('#img01').attr("src", this.src);
	$("#caption").html(this.alt);
	$('#myModal').css('display','block');
});

$('.close').on('click',function(){
	$('#myModal').css('display','none');
});
window.onclick = function(event) {
  $('#myModal').css('display','none');
}
</script>

</script>
<script>
	$(function() {
		$('input[name="schedule"]').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			minYear: 1980,
			timePicker: true,
			timePicker24Hour: true,
			timePickerIncrement: 10,
			autoUpdateInput: true,
			locale: {
				format: 'YYYY/MM/DD HH:mm',
			},
			maxYear: parseInt(moment().format('YYYY'),16)
		});


	});
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

<script>
	$(document).ready(function() {

		$('#example thead tr').clone(true).appendTo( '#example thead' );
		$('#example thead tr:eq(1) th').each( function (i) {
			var title = $(this).text();
			$(this).html( '<input type="text" placeholder="Search '+title+'" />' );

			$( 'input', this ).on( 'keyup change', function () {
				if ( table.column(i).search() !== this.value ) {
					table
					.column(i)
					.search( this.value )
					.draw();
				}
			} );
		} );

		var table = $('#example').DataTable( {
			orderCellsTop: true,
			fixedHeader: true
		} );


	} );
	$(function () {

		var specialElementHandlers = {
			'#editor': function (element,renderer) {
				return true;
			}
		};
		$('#cmd').click(function () {
			var doc = new jsPDF();
			doc.fromHTML($('#target').html(), 15, 15, {
				'width': 170,'elementHandlers': specialElementHandlers
			});
			doc.save('sample-file.pdf');
		});  
	});
</script>


@endpush