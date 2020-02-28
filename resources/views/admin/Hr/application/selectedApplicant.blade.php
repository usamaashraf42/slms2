@extends('_layouts.admin.default')
@section('title', 'Interview Schedule')
@section('content')
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Interview Schedule</h4>
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('application.updateStatus') }}" enctype = "multipart/form-data" id="upload_new_form">
						{{ csrf_field() }}
						@foreach($ids as $id)
						<input type="hidden" name="application_ids[]" value="@if(isset($id) && !empty($id)){{$id}}@endif">
						@endforeach
						<div class="row" >
							<div class="col-md-4">
								<div class="form-group">
									<label for="branch_id">Application Status</label>
									<select  class=" form-control statusId"  name="statusId" class="form-control statusId">
										<option disabled="disabled" >Choose the Status</option>
										@php($oman=\App\Models\ApplicationStatus::where('status',1)->orderBy('id','DESC')->get())
										@foreach($oman as $om)
										<option value="{{$om->id}}" >{{$om->name}} </option>
										@endforeach
									</select>
									<p class="alert alert-danger statusId_eror" style="display: none"></p>
								</div>
							</div>


							<div class="col-md-4">
								<div class="form-group">
									<label for="start_date">Interview Start Date</label>

									<div class="ui calendar" id="start_date" style="width: 100%">
										<div class="ui input" style="width: -webkit-fill-available!important;">

											<input class="input-md  form-control " type="text" autocomplete="off"  name="start_date" autocomplete="off" value="{{date('d,M,Y')}}"  style="margin-bottom: 10px"  />
										</div>
									</div>


									<!-- <input   name="start_date" id="start_date" class="form-control start_date"   > -->
									<p class="alert alert-danger start_date_eror" style="display: none"></p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="till_date">Interview Till Date</label>
									<div class="ui calendar" id="till_date" style="width: 100%">
										<div class="ui input" style="width: -webkit-fill-available!important;">

											<input class="input-md  form-control " value="{{date('d,M,Y')}}" type="text" autocomplete="off"  name="till_date" autocomplete="off"   style="margin-bottom: 10px"  />
										</div>
									</div>

									<p class="alert alert-danger till_date_eror" style="display: none"></p>
								</div>
							</div>


								<!-- <div class="col-md-6">
									 <div class="form-group">
									 <label for="schedule">Schedule Time</label>
									 <input   name="schedule" id="schedule" class="form-control schedule" >
									 <p class="alert alert-danger schedule_eror" style="display: none"></p>
									</div> -->
								</div>

								<div class="row">

								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="start_time">Interview Start Time</label>
											<input   name="start_time" id="start_time" autocomplete="off" value="10:00" class="form-control punch_in"   >
											<p class="alert alert-danger start_time_eror" style="display: none">dfsdgfsf</p>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="till_time">Interview Till Time</label>
											<input   name="till_time" id="till_time" autocomplete="off" value="14:00" class="form-control punch_out"   >
											<p class="alert alert-danger till_time_eror" style="display: none"></p>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="start_time">Country</label>
											<select class="form-control country_id" name="country_id" id="country_id" onchange="countryHasBranch(this)">
												<option value="92">Pakistan</option>
												<option value="968">Oman</option>
											</select>
											<p class="alert alert-danger country_id_eror" style="display: none;"></p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="contact_no">Contact No</label>
											<input   name="contact_no" id="contact_no" value="03224772703" class="form-control contact_no"   >
											<p class="alert alert-danger contact_no_eror" style="display: none"></p>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="contact_email">Contact Email</label>
											<input   name="contact_email" id="contact_email" class="form-control contact_email" value="hr@americanlyceum.edu.pk"  >
											<p class="alert alert-danger Venue_eror" style="display: none"></p>
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label for="regards">Regards</label>
											<input   name="regards" id="regards" class="form-control regards" value="American Lyceum International School"  >
											<p class="alert alert-danger Venue_eror" style="display: none"></p>
										</div>
									</div>
									


								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="Venue">Venue</label>
											<input   name="Venue" id="Venue" class="form-control Venue"  value="American Lyceum International School, Township Branch" >
											<p class="alert alert-danger Venue_eror" style="display: none"></p>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="duration">Interval Between Candidate</label>
											<input   name="duration" id="duration" type="number" step="any" value="0" min="0" class="form-control duration">
											<p class="alert alert-danger email_subject_eror"  style="display: none"></p>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label for="email_subject">Subject Email</label>
											<input   name="email_subject" id="email_subject" class="form-control email_subject" value="Interview Call">
											<p class="alert alert-danger email_subject_eror" style="display: none"></p>
										</div>
									</div>


								</div>
								


								
								<div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="address">Address</label>
											<textarea name="address" rows="5" id="address" class="form-control address" value=""  >{{'58-I/B-I Molana Shaukat Ali Road, Township, Lahore
												https://maps.app.goo.gl/Lifc4NtKHocHRDHA7'}}
										</textarea>  
										<p class="alert alert-danger Venue_eror" style="display: none"></p>
									</div>
								</div>
							</div>

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="email_body">Email</label>
										<textarea name="email_body" class="form-control email_body"> We are pleased to inform you that you have been selected for interview from the plenty of candidates. The following are the detail of the interview.<br>
											Please bring the following things with you:<br>
											1- Your recent photograph<br>
											2- Your latest CV<br>
											3- Copies of your degrees<br>
											
										</textarea>
										<p class="alert alert-danger email_body_eror" style="display: none"></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="email_body">SMS</label>
										<textarea name="sms_body" rows="17" class="form-control email_body">Congratulations  you have been selected for interview from the plenty of candidates.  Check your email for more details.
										</textarea>
										<p class="alert alert-danger email_body_eror" style="display: none"></p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="sms_send">Sms</label>
										<input type="checkbox" name="sms_send" value="1">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="email_send">Email</label>
										<input type="checkbox" name="email_send" checked value="1">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
							value="Dismiss">
							<input type="submit" class="btn btn-outline-success btn-lg"  onsubmit="statusId_name()" id="addDataBtn" value="Submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endsection

	@push('post-styles')

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


	@endpush
	@push('post-scripts')

	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

	<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
	<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>


	<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

                <script>
                        CKEDITOR.replace( 'email_body' );
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
			// $(function() {
		 //   	$('#start_time').daterangepicker({
		 //            timePicker : true,
		 //            singleDatePicker:true,
		 //            timePicker24Hour : true,
		 //            timePickerIncrement : 1,
		 //            timePickerSeconds : true,
		 //            locale : {
		 //                format : 'HH:mm:ss'
		 //            }
		 //        }).on('show.daterangepicker', function(ev, picker) {
		 //            picker.container.find(".calendar-date").hide();
		 //        }).on('showCalendar.daterangepicker', function(ev, picker){
		 //           picker.container.find('.calendar-date').remove();
		 //        });
			// });
			// $(function() {
			// $('#till_time').daterangepicker({
		 //            timePicker : true,
		 //            singleDatePicker:true,
		 //            timePicker24Hour : true,
		 //            timePickerIncrement : 1,
		 //            timePickerSeconds : true,
		 //            locale : {
		 //                format : 'HH:mm:ss'
		 //            }
		 //        }).on('show.daterangepicker', function(ev, picker) {
		 //            picker.container.find(".calendar-date").hide();
		 //        }).on('showCalendar.daterangepicker', function(ev, picker){
		 //           picker.container.find('.calendar-date').remove();
		 //        });
			// });
			// $(function() {
		 //   	$('#start_date').daterangepicker({
		 //            timePicker : false,
		 //            singleDatePicker:true,
		 //            timePicker24Hour : true,
		 //            timePickerIncrement : 1,
		 //            timePickerSeconds : true,
		 //            locale : {
		 //                format : 'YYYY-MM-DD'
		 //            }
		 //        })
			// });
			// $(function() {
			// $('#till_date').daterangepicker({
		 //            timePicker : false,
		 //            singleDatePicker:true,
		 //            timePicker24Hour : true,
		 //            timePickerIncrement : 1,
		 //            timePickerSeconds : true,
		 //            locale : {
		 //                format : 'YYYY-MM-DD'
		 //            }
		 //        })
			// });
			var today = new Date();

			$('#start_date').val(new Date(today.getFullYear(), today.getMonth(), today.getDate()+1));
			$('#till_date').val(new Date(today.getFullYear(), today.getMonth(), today.getDate()+1));


			$('#start_date').calendar({
				monthFirst: false,
				type: 'date',
				minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()+1),

			});
			$('#till_date').calendar({
				monthFirst: false,
				type: 'date',
				minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()+1),
			});
		</script>

		<script type="text/javascript">
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#profile-img-tag').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			$("#images").change(function(){
				readURL(this);
			}); 

		</script>
		<script>
			function statusId_name(og){
				console.log('statusId_name');
				var valid = true;   
				console.log('form input',$('#statusId').val());
				if (valid && $('#statusId').val() == '' || $('#statusId').val() == null) {
					console.log('in condition');
					$('.statusId_eror').text('Course id field is required');
					$('.statusId_eror').css('display','block');
					valid = false;
				}
				if (valid && $('#schedule').val() == '') {
					$('.schedule_eror').text('student name field is required');
					$('.schedule_eror').css('display','block');
					valid = false;
				}
				if (valid && $('#start_date').val() == '') {
					$('.start_date_eror').text('date of birth field is required');
					$('.start_date_eror').css('display','block');
					valid = false;
				}
				if (valid && $('#till_date').val() == '') {
					$('.till_date_eror').text('Father name field is required');
					$('.till_date_eror').css('display','block');
					valid = false;
				}
				if (valid && $('#start_time').val() == '') {
					$('.start_time_error').text('Gender name field is required');
					$('.start_time_error').css('display','block');
					valid = false;
				}
				if (valid && $('#till_time').val() == '') {
					$('.till_time_error').text('Gender name field is required');
					$('.till_time_error').css('display','block');
					valid = false;
				}
				if (valid && $('#country_id').val() == '') {
					$('.country_id_error').text('Gender name field is required');
					$('.country_id_error').css('display','block');
					valid = false;
				}
				if (valid && $('#Venue').val() == '') {
					$('.Venue_error').text('Gender name field is required');
					$('.Venue_error').css('display','block');
					valid = false;
				}
				if (valid && $('#contact_no').val() == '') {
					$('.contact_no_error').text('Gender name field is required');
					$('.contact_no_error').css('display','block');
					valid = false;
				}
				if (valid && $('#email_subject').val() == '') {
					$('.email_subject_error').text('Gender name field is required');
					$('.email_subject_error').css('display','block');
					valid = false;
				}

				if (valid && $('#email_body').val() == '') {
					$('.email_body_error').text('Gender name field is required');
					$('.email_body_error').css('display','block');
					valid = false;
				}
				$('#upload_new_form :input:visible[required="required"]').each(function()
				{
					if(!this.validity.valid)
					{
						$(this).focus();
						return false;
					}
				});
			}

			$('.punch_in').timepicker({
			    timeFormat: 'h:mm p',
			    interval: 10,
			    minTime: '10',
			    maxTime: '6:00pm',
			    startTime: '10:00',
			    dynamic: false,
			    dropdown: true,
			    scrollbar: true
			});




			$('.punch_out').timepicker({
			    timeFormat: 'h:mm p',
			    interval: 10,
			    minTime: '10',
			    maxTime: '6:00pm',
			    startTime: '10:00',
			    dynamic: false,
			    dropdown: true,
			    scrollbar: true
			});

		</script>
		@endpush