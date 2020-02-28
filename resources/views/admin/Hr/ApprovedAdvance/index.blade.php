@extends('_layouts.admin.default')
@section('title', 'Advance Approval Management')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">Advance Approval</h4>
					
					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
							<thead>
								<tr>
									<th></th>
									<th>Branch </th>
									<th>Employee / Id</th>
									<th>Amount</th>
									<th>Reason</th>
									<th>Installment</th>
									
								</tr>
							</thead>
							<tbody>
								@isset($advances)
								@foreach($advances as $sec)


								<tr class="approval_record_{{$sec->id}}">
									<td><input type="checkbox" name="ids[]" value="{{$sec->id}}"></td>
									<td>@isset($sec->branch){{$sec->branch->branch_name}}@endisset</td>
									<td>@isset($sec->employee){{$sec->employee->name }} <a href="javascript:;">{{$sec->employee->emp_id}}</a>@endisset</td>
									<td>@isset($sec->advance_amount){{$sec->advance_amount}}@endisset</td>
									<td>@isset($sec->reason){{$sec->reason}}@endisset</td>
									<td>
										@foreach($sec->installment as $insta)
										<p>{{$insta->month?get_month_name_by_no($insta->month):''}} / {{$insta->year}} : {{$insta->installment_amount}}</p>
										@endforeach
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


{{-- ////////////////// Model Target /////////////////// --}}
<div id="show_edit_modal"></div>
{{-- //////////////////////  Add Model ..................... --}}
<div class="modal fade text-left" id="add_shed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header bg-success">
			<h3 class="modal-title" id="myModalLabel35"> Add Advance Request</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="{{route('advance-request.store')}}" id="addDataForm" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<fieldset class="form-group floating-label-form-group">
							<label for="advance_amount">Advance Amount</label>
							<input type="number" step="any" min="0" value="0" class="form-control" id="advance_amount" name="advance_amount" placeholder="Enter section Name">
						</fieldset>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<fieldset class="form-group floating-label-form-group">
							<label for="reason">Reason</label>
							<textarea class="form-control" id="reason" name="reason"></textarea> 
						</fieldset>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<fieldset class="form-group floating-label-form-group">
							<label for="total_installment">Advance Installment</label>
							<input type="number"  min="0" max="12" class="form-control" id="total_installment" name="total_installment" placeholder="Total Installment">
						</fieldset>
					</div>

				</div>
				<div class="row">
					<h4>Installment Plan</h4>
				</div>
				<div class="row" id="rowMonth">
					
				</div>

			</div>
			<br>
			<div class="modal-footer">
				<img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
				height="50"/>
				&nbsp;&nbsp;&nbsp;
				<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
				value="Dismiss">
				<input type="submit" class="btn btn-outline-success btn-lg"  id="addDataBtn" value="Submit">
			</div>
		</form>
	</div>
</div>
</div>
{{-- //////////////////////////// Add Model End.............................. --}}

@endsection

@push('post-styles')
<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
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
<script>
	

	/*showing confirm cancel popup box*/
	function resend(id) {
		swal({
			title: "Are you sure?",
			text: " Record will be update",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				showConfirm(id)
			} else {
				swal("Your Record is safe!");
			}
		});
	}

	function showConfirm(id) {
		var status=$('.advance_status_'+id).val();
			$.ajax({
				url: "{{route('advance-approval.store')}}",
				type: 'post',
				data: {
					'id': id,
					'adv_status':status,
				},
				dataType: 'json',
				success: function (response) {
					console.log('id', response);

					if (response.status == "200") {
						$('.approval_record_'+id).remove();
						swal(
							'Success!',
							'Notification Sent Successfully',
							'success'
							);

					} else {
						alert(response.message);
					}
				},
				error: function () {
					swal(
						'Oops...',
						'Something went wrong!',
						'error'
						)
				}
			});
		
	}


	/*showing confirm cancel popup box*/
	function showConfirmDelete() {
		return confirm("Are You Sure You Want To Delete This Data?");
	}

	/*delete item */
	function deleteItem(id) {
		var val = showConfirmDelete();
		if (val) {
			$.ajax({
				url: "{{route('course.deleteCourse')}}",
				type: 'post',
				data: {
					'id': id
				},
				dataType: 'json',
				success: function (response) {
					console.log('id', response);

					if (response.status == "200") {

						swal(
							'Success!',
							'Shed Deleted Successfully',
							'success'
							);

						location.reload(true);

					} else {
						swal(
							'Warning!',
							response.message,
							'warning'
							);
					}
				},
				error: function () {
					swal(
						'Oops...',
						'Something went wrong!',
						'error'
						)
				}
			});
		}
	}

	/*showing update item modal on click*/
	function editItem(id) {
		$.ajax({
			url: 'admin/section/'+id+'/edit',
			type: 'get',
			data: {
				'id': id
			},
			success: function (response) {

				$("#show_edit_modal").html(response);
				jQuery("#updateCourse").modal('show');
			},
			error: function (e) {
				console.log('error', e);
			}
		});
	}

	/* On-click function to view  detail */
	function detail(id) {
		window.location = baseurl + '/shed/' + id;
	}



	$('.loader-img').hide();
	$("#addDataBtn").click(function (e) {


            var form = $('#addDataForm')[0]; // You need to use standard javascript object here
            var formData = new FormData(form);
            console.log('formData', formData);
            console.log('form', form);
            $.ajax({
            	url: "{{route('advance-request.store')}}",
            	type: "POST",
            	enctype: 'multipart/form-data',
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: formData,
                beforeSend: function () {
                	$('.loader-img').show();
                	$('#preloader').show();
                },
                complete: function () {
                	$('#preloader').fadeOut('slow', function () {
                		$(this).remove();
                	});
                	$('.loader-img').hide();
                },
                success: function (response) {
                	console.log('response', response);
                	if (response.status == '200') {

                		

                		$('#add_shed').modal('hide');

                		$("#addDataForm")[0].reset();
                		$(".slim-btn-remove").click();

                		swal(
                			'Success!',
                			'Shed Added Successfully',
                			'success'
                			);
                		location.reload(true);
                	} else {
                		console.log('error blank', response.message);
                		swal(
                			'Warning!',
                			response.message,
                			'warning'
                			);
                	}
                }, error: function (e) {
                	console.log('error', e);
                	swal(
                		'Oops...',
                		'Something went wrong!',
                		'error'
                		)
                }
            });
            e.preventDefault();
        });

	$('#total_installment').on('keyup keypress blur change',function() {
		addMonthYear();
	});

	function addMonthYear(){
		$("#rowMonth").html('');
		var htmlCount=parseInt($('#total_installment').val());
		var rowMonthYear=``;
		for(var i=0; i<htmlCount; i++){
			rowMonthYear+=`<div class="col-md-4 col-sm-4">
			<fieldset class="form-group floating-label-form-group">
			<label for="stationary">Month</label>
			<select type="text" class="form-control month"    name="month[]">
			<option selected="selected" value="0">--Select Month--</option>
			<option  value='1' @if(date('m')==1){{'selected'}}@endif>Janaury</option>
			<option value='2' @if(date('m')==2){{'selected'}}@endif>February</option>
			<option value='3' @if(date('m')==3){{'selected'}}@endif>March</option>
			<option value='4' @if(date('m')==4){{'selected'}}@endif>April</option>
			<option value='5' @if(date('m')==5){{'selected'}}@endif>May</option>
			<option value='6' @if(date('m')==6){{'selected'}}@endif>June</option>
			<option value='7' @if(date('m')==7){{'selected'}}@endif>July</option>
			<option value='8' @if(date('m')==8){{'selected'}}@endif>August</option>
			<option value='9' @if(date('m')==9){{'selected'}}@endif>September</option>
			<option value='10' @if(date('m')==10){{'selected'}}@endif>October</option>
			<option value='11' @if(date('m')==11){{'selected'}}@endif>November</option>
			<option value='12' @if(date('m')==12){{'selected'}}@endif>December</option>
			</select>
			</fieldset>
			</div>
			<div class="col-md-4 col-sm-4">
			<fieldset class="form-group floating-label-form-group">
			<label for="ac_charge">Year</label>
			<select type="text" class="form-control year"   name="year[]"  placeholder="Student Name">
			<option selected="selected" disabled="disabled">--Select Year--</option>
			<option value="2024" @if(date('Y')==2024){{'selected'}}@endif>2024</option>
			<option value="2023" @if(date('Y')==2023){{'selected'}}@endif>2023</option>
			<option value="2022" @if(date('Y')==2022){{'selected'}}@endif>2022</option>
			<option value="2021" @if(date('Y')==2021){{'selected'}}@endif>2021</option>
			<option value="2020" @if(date('Y')==2020){{'selected'}}@endif>2020</option>
			<option value="2019" @if(date('Y')==2019){{'selected'}}@endif>2019</option>
			<option value="2018" @if(date('Y')==2018){{'selected'}}@endif>2018</option>
			<option value="2017" @if(date('Y')==2017){{'selected'}}@endif>2017</option>
			<option value="2016" @if(date('Y')==2016){{'selected'}}@endif>2016</option>
			<option value="2015" @if(date('Y')==2015){{'selected'}}@endif>2015</option>
			<option value="2014" >2014</option>
			<option value="2013" >2013</option>
			<option value="2012" >2012</option>
			<option value="2011" >2011</option>
			<option value="2010" >2010</option>
			<option value="2009" >2009</option>
			<option value="2008" >2008</option>
			<option value="2007" >2007</option>
			<option value="2006" >2006</option>
			<option value="2005" >2005</option>
			<option value="2004" >2004</option>
			<option value="2003" >2003</option>
			<option value="2002" >2002</option>
			<option value="2001" >2001</option>
			<option value="2000" >2000</option>

			</select>
			</fieldset>
			</div>
			<div class="col-md-4 col-sm-4">
			<fieldset class="form-group floating-label-form-group">
			<label for="installment_amount">Amount</label>
			<input type="number" min="0" max="12" class="form-control"  name="installment_amount[]" placeholder="Total Installment">
			</fieldset>
			</div>`

			
		}
		$('#rowMonth').append(rowMonthYear);

	}
</script>

@endpush