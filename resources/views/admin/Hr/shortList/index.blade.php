@extends('_layouts.admin.default')
@section('title', 'ShortList Applicant')
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
					<h4 class="card-title">ShortList Applicant</h4>
					<div class="heading-elements float-right">

					</div>
					<form action="{{route('application.selectedApplicant')}}" method="GET">	
						@csrf					
						@component('_components.alerts-default')
						@endcomponent
						<div class="col-md-4">
							<div class="form-group" style="margin-top: 25px;">
								<button type="submit" class="btn btn-success"> Call For Interview </button>
							</div>
						</div>


						
						
						

						<div class="table-responsive">
							<table id="example" class="table border table-bordered ">
								<thead>
									<tr>
										<th><div class="checkbox mass_select_all_wrap">
											<input type="checkbox" style=" width: 20px; height: 20px;" id="mass_select_all" data-to-table="tasks"><label>Select</label></div></th>
											<th>Reject</th>
											<th>View</th>
											<th>Image</th>
											<th>Name</th>
											<th>App Id</th>
											<th>Applied</th>
											<th>1st Jobs</th>
											<th>2nd Jobs</th>
											<th>3rd Jobs</th>
											<th>1st Branch</th>
											<th>2nd Branch</th>
											<th>3rd Branch</th>
											<th>Exp</th>
										</tr>

									</thead>
									<tbody>
										@isset($applications)
										@foreach($applications as $application)
										<tr>
											<td> <input name="application_ids[]" style=" width: 30px; height: 30px;"  type="checkbox" class="checkboxes custom-check selectedAppUnchecked{{$application->id}}" 
											 	value="{{$application->id}}"   />  
											</td>

											<td> <input name="reject_ids[]"  style=" width: 30px; height: 30px;"   type="checkbox" class="checkboxes custom-check rejectAll selectedAppUnchecked{{$application->id}}" value="{{$application->id}}"   />   
											</td>
											<td>
											<a href="{{ route('application.show',$application->id) }}"  class="btn btn-info btn-sm">View</a>
										</td>
											<td>
												@isset($application->applicant) 

												<img src="http://lyceumgroupofschools.com/images/applicant/{{$application->applicant->images}}" class="img-circle" height="60" width="60" style="border-radius: 50%!important;">@endisset
											</td>
										<td>@isset($application->applicant){{$application->applicant->name}} @endisset</td>
										<td>@isset($application->id){{$application->id}} @endisset</td>
										<td>@isset($application->created_at){{date('d-M-Y',strtotime($application->created_at))}} @endisset</td>
										<td>@if(!empty($application->job_preference1)){{$application->job_preference1}}@endif </td>
										<td>@if(!empty($application->job_preference2)) {{$application->job_preference2}}@endif </td>
										<td>@if(!empty($application->job_preference3)) {{$application->job_preference3}}@endif</td>
										<td>@if(!empty($application->applicant->preferenceBranch1)){{$application->applicant->preferenceBranch1->branch_name}}@endif </td>
										<td>@if(!empty($application->applicant->preferenceBranch2)) {{$application->applicant->preferenceBranch2->branch_name}}@endif</td>
										<td> @if(!empty($application->applicant->preferenceBranch3)) {{$application->applicant->preferenceBranch3->branch_name}}@endif</td>
										<td>@isset($application->applicant){{$application->applicant->experience}} @endisset</td>
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
<!-- <link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"> -->
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
		let example=$('#example').DataTable( {


			initComplete: function () {

				this.api().columns([7,8,9]).every( function () {
					var column = this;
					var select = $('<select><option value=""></option></select>')
					.appendTo( $(column.header()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
							);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		} );


	} );

	$('body').on('change', '#mass_select_all', function() {
		var rows, checked;
		rows = $('#example').find('tbody tr');
		checked = $(this).prop('checked');

		$('.rejectAll').prop('checked', false);

		$.each(rows, function() {
			var checkbox = $($(this).find('td').eq(0)).find('input').prop('checked', checked);
		});
	});



	$('.custom-check').on('click',function(){
		var ids=$(this).val();

            if($(this).prop("checked") == false){
                $(this).prop('checked', false);
            }
            else{
               $('.selectedAppUnchecked'+ids).prop('checked', false);
				$(this).prop('checked', true);
            }
	});

</script>


@endpush