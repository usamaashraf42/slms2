@extends('_layouts.admin.default')
@section('title', 'Marks List')
@section('content')
<style>
	.img-circle{
		border-radius: 50%!important;
	}

	.table th ,.table td{
		padding: 4px!important;
	}
</style>
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">Marks List Mangement</h4>
					<div class="heading-elements float-right">

					</div>
					<form action="{{route('application.updateStatus')}}" method="POST" >
						@csrf

						@component('_components.alerts-default')
						@endcomponent

						<div class="table-responsive">

							<table id="example" class="table border table-bordered ">
								<thead>
									<tr>
										<th></th>
										<th>Applicant</th>
										<th>Grade</th>
										<th>Salary Expection</th>
										<th>Total Given Marks</th>
										<th>Total Marks</th>

										<th>Taken By</th>
									
										<th>Action</th>
									</tr>

								</thead>
								<tbody>
									@isset($markslists)
									@foreach($markslists as $list)

									<tr>
										<td><input type="checkbox" name="application_ids[]" value="{{$list->id}}"></td>

												<td>@isset($list->application->applicant){{$list->application->applicant->name.' '.$list->application->applicant->fname}} @endisset</td>
												<td>{{$list->slary_expection}}</td>
												<td>{{$list->grade}}</td>
												<td> {{ $list->confidence + $list->grip + $list->control + $list->involvement + $list->handwriting + $list->educational + $list->experience + $list->experience + $list->stress_tolerence + $list->planing_organizing + $list->work_standard + $list->team_work + $list->communication_skills + $list->personality + $list->motivation + $list->leadership + $list->average_work_time}} </td>
												<td>{{85}}</td>

												<td>@if(!empty($list->taken_by)){{$list->taken_by}}@endif </td>
												
												<td><a href="javascript:;"  class="btn btn-info btn-sm">View</a>
													
												</td>
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
     //Default data table
     $(document).ready(function() {


     	var table = $('#example').DataTable( {
     		orderCellsTop: true,
     		fixedHeader: true
     	} );


     } );
 </script>


 @endpush