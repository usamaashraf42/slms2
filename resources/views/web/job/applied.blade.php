<style>
	

	.ui.dropdown {
		max-width: 800px;
	}

	@media only screen and (max-width: 767px) {
		.ui.selection.dropdown .menu {
			/*      max-height: 8.01428571rem; /* + 1.335714285 to 9.349999995rem */
			/*      max-height: 9.349999995rem; /* Adds a half */
			max-height: 16.02857142rem; /* Double size */
		}
	}
	@media only screen and (min-width: 768px) {
		.ui.selection.dropdown .menu {
			/*         max-height: 10.68571429rem; /* + 1.3357142863 to 12.0214285763rem */
			max-height: 12.0214285763rem;
		}
	}
	@media only screen and (min-width: 992px) {
		.ui.selection.dropdown .menu {
			max-height: 16.02857143rem; /* + 1.3357142858 to 17.3642857158rem */
		}
	}
	@media only screen and (min-width: 1920px) {
		.ui.selection.dropdown .menu {
			max-height: 21.37142857rem; /* + 1.3357142856 to 22.7071428556rem */
		}
	}
	#custom-check{
		position: relative;
	}
	#custom-check:before{
		content: "";
		width: 18px;
		height: 18px;
		border:solid 2px green;
		background: white;
		position: absolute;
	}
	#custom-check:after{
		content:"";
		width:10px;
		height: 5px;
		border:solid 2px #fff;
		border-top:none;
		border-right:none;
		position: absolute;
		top:5px;
		left:5px;
		transform: rotate(-45deg);
		opacity: 0;
		transition: all 0.2s ease-out;
	}
	#custom-check:checked:after{
		opacity: 1;
	}
	#custom-check:checked:before{
		background: green;
	}
	.form-group{
		margin-bottom: 10px;
	}
</style>
@extends('layouts.main')

@section('body-class') fee_post @endsection
@section('fee_post')

<div  class="form_layout">
</div>

<section class="default-main content-start relative bg-white">
	<div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">
		<ul id="breadcrumb"><li id="bc-home"> <a href="#" class="first"></a></li><li id="bc-academics"> <a href="#">Job</a></li><li id="bc-college-acceptances"> <a href="#" class="current">Apply</a></li></ul>
		<div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">
		</div>
	</div>
	<div class="flex flex-row-ns flex-column flex-wrap mw8 center relative" style="background-image: url('');">
		<section id="contact-page" class="pt-90 pb-120 white-bg">
			<div class="col-md-12" style=" padding: 20px; margin: 0 auto; border: 1px solid #ccc; width: 100%;">
				<div class="row">
					<div class="container">
						<div id="signupbox"  class="mainbox col-md-12  col-sm-12">
							<div class="panel panel-info">
								<div class="panel-body" >
									<form   action="#" id="applicationForm"  method="POST" enctype="multipart/form-data">
										@csrf
										@if(Session::has('error_message'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Error!</strong>  {{ Session::get('error_message') }}
										</div>
										@endif
										@if(Session::has('success_message'))
										<div class="alert alert-success" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Success!</strong>  {{ Session::get('success_message') }}
										</div>
										@endif
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="exampleInputEmail1">Select Job Opening </label>
													<select type="textx" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
														<option value="0">SELECT JOB TO APPLY </option>
														<option value="1">General</option>
														<option value="2">Branch Heads </option>
														<option value="3">Section Heads </option>
														<option value="4">Montessori Trained Teachers and Administrators </option>
														<option value="5">O-Level Teachers (All Subject) </option>
														<option value="6">Matric Teachers  </option>
														<option value="7">English Teachers        </option>
														<option value="8">Maths Teachers          </option>
														<option value="9">Junior Section Teachers </option>
														<option value="10">Music Teachers          </option>
														<option value="11">Market Representative   </option>
														<option value="12">Franchise Manager       </option>
														<option value="13">ART Teachers            </option>
														<option value="14">Accountant              </option>
														<option value="15">Admin Officer           </option>
														<option value="16">Canteen Contractor      </option>
														<option value="17">O-Level Coordinator     </option>
														<option value="18">Web/App Developer       </option>
														<option value="19">HR       </option>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<label for="dob"> Select Country</label>
												<select class="form-control" name="country_id" id="country_id">
													<option value="0">Choose the country </option>
													<option value="92">Pakistan</option>
													<option value="968">Oman</option>
													<option value="968">Dubai</option>
												</select>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="branch_id">In which branch you are interested: Preference</label>
													<select class="form-control" name="branch_id" id="branch_id">	
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="branch_id">Nationality</label>
													<input class="input-md  textinput textInput form-control" id="nationality" maxlength="40" name="nationality"
													placeholder="Please enter Nationality" value="" style="margin-bottom: 10px" type="text" />
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="branch_id">Residence</label>
													<input class="input-md  textinput textInput form-control" id="residence" maxlength="40" name="residence" placeholder="Please enter the Residence" value="" style="margin-bottom: 10px" type="text" />
												</div>
											</div>
										</div>
										<div class="panel-body" >
											<div class="row">
												<div class="col-md-3 col-sm-3 col-xl-3">
													<img id="profile-img-tag" src="http://placehold.it/180" alt="your image" / width="220px" height="250px;" style="min-width: 220px; min-height: 250px;max-width: 220px; max-height: 250px;">
													<br>
													<label for="images" class="btn btn-primary" style="position: relative;left: 50px;top: 20px;">Upload Profile</label>
													<input type="file" id="images" value="{{ old('images') }}" name="images" class="hide" style="opacity: 0;">
												</div>
												<div class="col-md-9">
													<div class="row">
														<div class="col-md-4">
															<div id="div_id_username" class="form-group required">
																<label for="name" class="control-label   requiredField">Name								 
																	<span class="required" style="color: red">*</span> 
																</label>
																<div class="controls">
																	<input class="input-md  textinput textInput form-control" id="name" maxlength="40" name="name"
																	placeholder="Please enter the Full name" value="" style="margin-bottom: 10px" type="text" />
																	@if ($errors->has('name'))
																	<div class="alert alert-danger" role="alert">
																		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																			<span aria-hidden="true">×</span>
																			<span class="sr-only">Close</span>
																		</button>
																		<strong>Warning!</strong> {{$errors->first('name')}}
																	</div>
																	@endif
																</div>
															</div>
														</div>
														<div class="nationality" id="name">
																<div class="controls ">
																	<input class="input-md emailinput form-control" id="fname" value="" name="fname" placeholder="Enter the father name" style="margin-bottom: 10px" type="text" />
																	@if ($errors->has('fname'))
																<div class="alert alert-danger" role="alert">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																			<span aria-hidden="true">×</span>
																			<span class="sr-only">Close</span>
																</button>
																<strong>Warning!</strong> {{$errors->first('fname')}}
																</div>
																@endif
															</div> 
														</div>
														<div class="col-md-4">
															<div id="div_id_email" class="form-group required">
																<label for="fname" class="control-label   requiredField">Father Name <span class="required" style="color: red">*</span> </label>
																<div class="controls ">
																	<input class="input-md emailinput form-control" id="fname" value="" name="fname" placeholder="Enter the father name" style="margin-bottom: 10px" type="text" />
																	@if ($errors->has('fname'))
																	<div class="alert alert-danger" role="alert">
																		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																			<span aria-hidden="true">×</span>
																			<span class="sr-only">Close</span>
																		</button>
																		<strong>Warning!</strong> {{$errors->first('fname')}}
																	</div>
																	@endif
																</div>     
															</div>
														</div>

														<div class="col-md-4">
															<div id="div_id_location" class="form-group required">
																<label for="father_profession" class="control-label   requiredField">Father's Profession <span class="required" style="color: red">*</span></label>
																<div class="controls ">
																	<input class="input-md textinput textInput form-control" value="" id="father_profession" name="father_profession" placeholder="Father profession" style="margin-bottom: 10px" type="text" />
																	@if ($errors->has('father_profession'))
																	<div class="alert alert-danger" role="alert">
																		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																			<span aria-hidden="true">×</span>
																			<span class="sr-only">Close</span>
																		</button>
																		<strong>Warning!</strong> {{$errors->first('father_profession')}}
																	</div>
																	@endif
																</div> 
															</div>
														</div>
														<div class="col-md-4">
															<div id="div_id_company" class="form-group required"> 
																<label for="" class="control-label   requiredField">Date of Birth <span class="required" style="color: red">*</span></label>
																<div class="controls "> 
																	<input class="input-md  form-control " type="text" autocomplete="false" name="dob"  style="margin-bottom: 10px"  />
																	@if ($errors->has('dob'))
																	<div class="alert alert-danger" role="alert">
																		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																			<span aria-hidden="true">×</span>
																			<span class="sr-only">Close</span>
																		</button>
																		<strong>Warning!</strong> {{$errors->first('dob')}}
																	</div>
																	@endif

																</div>
															</div>
														</div>
														<div class="col-md-4">
															<div id="div_id_number" class="form-group required">
																<label for="qualification" class="control-label requiredField">Qualification <span class="required" style="color: red">*</span>:</label>
																<div class="controls ">
																	<input class="input-md textinput textInput form-control" value="" id="qualification" name="qualification" placeholder="provide your Qualification" style="margin-bottom: 10px" type="text" />
																</div> 
															</div> 
														</div>
														<div class="col-md-4">
															<label for="gender" class="control-label requiredField"> Gender <span class="required" style="color: red">*</span>
															</label>
															<div class="controls "  style="margin-bottom: 10px">
																<label class="radio-inline"> <input type="radio" name="gender" id="male" value="male"  style="margin-bottom: 10px"> Male </label>
																<label class="radio-inline"> <input type="radio" name="gender" id="id_As_2" value="female"  style="margin-bottom: 10px"> Female</label>
																@if ($errors->has('gender'))
																<div class="alert alert-danger" role="alert">
																	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																		<span aria-hidden="true">×</span>
																		<span class="sr-only">Close</span>
																	</button>
																	<strong>Warning!</strong> {{$errors->first('gender')}}
																</div>
																@endif
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div id="div_id_gender" class="form-group required">
														<label for="id_name" class="control-label   requiredField"> Status 
															<span class="required" style="color: red">*</span></label>
															<div class="controls "  style="margin-bottom: 10px">
																<label class="radio-inline"> <input type="radio" name="martial_status" id="married" value="Married"  style="margin-bottom: 10px"> Married </label>
																<label class="radio-inline"> <input type="radio" name="martial_status" id="id_gender_2" value="Single"  style="margin-bottom: 10px"> Single </label>
																<label class="radio-inline"> <input type="radio" name="martial_status" id="id_gender_1" value="separated"  style="margin-bottom: 10px"> Separated </label>
																@if ($errors->has('martial_status'))
																<div class="alert alert-danger" role="alert">
																	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																		<span aria-hidden="true">×</span>
																		<span class="sr-only">Close</span>
																	</button>
																	<strong>Warning!</strong> {{$errors->first('martial_status')}}
																</div>
																@endif
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div id="div_id_location" class="form-group required spouse_profInput" style="display: none;">
														<label for="spouse_prof" class="control-label   requiredField">Spouse's Profession</label>
														<div class="controls ">
															<input class="input-md textinput textInput form-control" value="" id="spouse_prof" name="spouse_prof" placeholder="Your Wife profession" style="margin-bottom: 10px" type="text" />
															@if ($errors->has('spouse_prof'))
															<div class="alert alert-danger" role="alert">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																	<span aria-hidden="true">×</span>
																	<span class="sr-only">Close</span>
																</button>
																<strong>Warning!</strong> {{$errors->first('spouse_prof')}}
															</div>
															@endif
														</div> 
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div id="div_id_name" class="form-group required kidsInput" style="display: none"> 
														<label for="kids" class="control-label   requiredField">No Of Kids</label> 
														<div class="controls "> 
															<input class="input-md textinput textInput form-control " value="" id="kids" name="kids" placeholder="Please Enter enter kids no" 
															style="margin-bottom: 10px" type="number" >
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div id="div_id_email" class="form-group required hus_nameInput" style="display: none">
														<label for="hus_name" class="control-label   requiredField">Husband's Name</label>
														<div class="controls ">
															<input class="input-md emailinput form-control" value="" id="hus_name" name="hus_name" placeholder="Please Enter the Husband Name" style="margin-bottom: 10px" type="text" />
														</div>     
													</div>
												</div>
											</div>
										</div>
									</div>
								</div> 
							</div>
							<hr>
							<h5>ACADEMICS:</h5>
							<hr>
							<table class="table table-bordered">
								<thead class="thead-light">
									<tr>
										<th>Qualification</th>
										<th>Institute name</th>
										<th>Degree</th>
										<th>Duration</th>
										<th>Mark Obtained</th>
										<th>Year of Passing</th>
										<th>images</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="qualificationRows">
									<tr>
										<td><input type="text" class="form-control" name="qualification[]"></td>
										<td><input type="text" class="form-control" name="institude[]"></td>
										<td><input type="text" class="form-control" name="degree[]"></td>
										<td><input type="text" class="form-control" name="duration[]"></td>
										<td><input type="number" class="form-control"  min="0" max="11" step="0.01" name="marks[]"></td>
										<td><input type="text" class="form-control " name="passing_date[]"></td>
										<td><form>
											<input type="file"  multiple required />
											<label class="label1" for="file-upload">Upload file</label>
											<div id="file-upload-filename"></div>
										</form> </td>
										<td><div class="btn btn_primary mt-0 pull-right deleteQualification">-</div></td>
									</tr>
									<tr>
										<td><input type="text" class="form-control" name="qualification[]"></td>
										<td><input type="text" class="form-control" name="institude[]"></td>
										<td><input type="text" class="form-control" name="degree[]"></td>
										<td><input type="text" class="form-control" name="duration[]"></td>
										<td><input type="number" class="form-control"  min="0" max="11" step="0.01" name="marks[]"></td>
										<td><input type="text" class="form-control " name="passing_date[]"></td>
										<td><form>
											<input type="file"  multiple required />
											<label class="label1" for="file-upload">Upload file</label>
											<div id="file-upload-filename"></div>
										</form> </td>
										<td><div class="btn btn_primary mt-0 pull-right deleteQualification">-</div></td>
									</tr>
									<tr>
										<td><input type="text" class="form-control" name="qualification[]"></td>
										<td><input type="text" class="form-control" name="institude[]"></td>
										<td><input type="text" class="form-control" name="degree[]"></td>
										<td><input type="text" class="form-control" name="duration[]"></td>
										<td><input type="number" class="form-control" name="marks[]"></td>
										<td><input type="text" class="form-control " name="passing_date[]"></td>
										<td><form>
											<input type="file"  multiple required />
											<label class="label1" for="file-upload">Upload file</label>
											<div id="file-upload-filename"></div>
										</form> </td>
										<td><div class="btn btn_primary mt-0 pull-right deleteQualification">-</div></td>
									</tr>
								</tbody>
							</table>
							<div class="btn btn-success pull-right addQualification">+</div>
							<hr>
							<h5>Job Experience:</h5>
							<hr>
							<table class="table table-bordered">
								<thead class="thead-light">
									<tr>
										<th>Organization/Institution</th>
										<th>job start</th>
										<th>Job end</th>
										<th>Reason Of Leaving</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="inputRows">
									<tr class="">
										<td><input type="text" class="form-control" name="org[]"></td>
										<td><input type="date" class="form-control" name="job_start[]"></td>
										<td><input type="date" name="job_end[]" class="form-control "></td>
										<td><input type="text" class="form-control"></td>
										<td><input type="text" class="form-control" name="leave_of_reason[]"></td>
										<td><div class="btn btn-success pull-right addRow">+</div></td>
									</tr>
								</tbody>
							</table>
							<br>
							<hr>
							<div class="row">
								<div class="col-md-12">
									<hr>
									<h5>Authentication</h5>
									<hr>
								</div>
								<br>
								<div class="col-md-6">
									<div id="div_id_name" class="form-group required examFee" style="display: block"> 
								<div class="col-md-6">
									<div id="div_id_location" class="form-group required examFee" style="display: block">
										<label for="password_confirmation" class="control-label   requiredField">Confirm password</label>
										<div class="controls ">
											<input class="input-md textinput textInput form-control" id="password_confirmation" name="password_confirmation" 
											placeholder="Confirm password" style="margin-bottom: 10px" type="password" />
											@if ($errors->has('password_confirmation'))
											<div class="alert alert-danger" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">×</span>
													<span class="sr-only">Close</span>
												</button>
												<strong>Warning!</strong> {{$errors->first('password_confirmation')}}
											</div>
											@endif
										</div> 
									</div>
								</div>
								<div class="col-md-6">
									<div id="div_id_location" class="form-group required examFee" style="display: block">
										<label for="email_confirmation" class="control-label   requiredField"></label>
										<div class="controls ">
											<input class="input-md textinput textInput form-control" id="email_confirmation" value="{{old('email_confirmation')}}" name="email_confirmation" placeholder="Confirm Email" style="margin-bottom: 10px" type="text" />
											@if ($errors->has('email_confirmation'))
											<div class="alert alert-danger" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">×</span>
													<span class="sr-only">Close</span>
												</button>
												<strong>Warning!</strong> {{$errors->first('email_confirmation')}}
											</div>
											@endif
										</div> 
									</div>
								</div>
							</div>
							 <div class="col-md-12">
							   <div class="form-group" style="margin-top: 40px;">
							   <div class="controls col-md-12">
							   <div id="div_id_terms" class="checkbox required">
							   <label for="id_terms" class=" requiredField">
							   <br><br>
							   </label>
							   </div>      
							 </div>
							</div>
								<div class="modal-footer">
									<input type="reset" class="btn btn-warning btn-lg" data-dismiss="modal"
									value="Reset">
									<input type="submit" class="btn btn-info btn-lg" data-dismiss="modal"  id="updateDataBtn" value="Submit">
								</div>
							</div>
						</form>
					</div>
				</div>
			</section>
			@endsection
			@push('post-scripts').
			<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
			<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
			<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
			<script>
				$(function() {
					$('input[name="dob"]').daterangepicker({
						singleDatePicker: true,
						showDropdowns: true,
						minYear: 1980,
						maxYear: parseInt(moment().format('YYYY'),16)
					});
					$('input[name="deposit_date"]').daterangepicker({
						singleDatePicker: true,
						showDropdowns: true,
						minYear: 1980,
						maxYear: parseInt(moment().format('YYYY'),16)
					});
				});
			</script>
			<script type="text/javascript">
				$('.city').select2();
				$(document).ready(function(){
					$(document).on('click', '.addRow', function(e) {
						console.log('sweetalert');
						var htmlContent=`<tr class="">
						<td><input type="text" class="form-control" name="org[]"></td>
						<td><input type="date" class="form-control" name="job_start[]"></td>
						<td><input type="date" name="job_end[]" class="form-control"></td>
						<td><input type="text" class="form-control"></td>
						<td><input type="text" class="form-control" name="leave_of_reason[]"></td><td><div class="btn btn-danger pull-right deleteRow">-</div></td>
						</tr>`;

						$('#inputRows').append(htmlContent);
					});
				});
				$(document).on('click', '.deleteRow', function(e) {

					//do whatever
					console.log('remove tr');
					$(this).parent().parent('tr').remove();

				});

				$(document).ready(function(){
					$(document).on('click', '.addQualification', function(e) {
						var htmlContent=`<tr>
						<td><input type="text" class="form-control" name="qualification[]"></td>
						<td><input type="text" class="form-control" name="institude[]"></td>
						<td><input type="text" class="form-control" name="degree[]"></td>
						<td><input type="text" class="form-control" name="duration[]"></td>
						<td><input type="text" class="form-control" name="marks[]"></td>
						<td><input type="text" class="form-control" name="passing_date[]"></td>
						<td><label for="images" class="btn btn-primary" style="position: relative;left: 0px;top: 5px;">Upload Profile</label>
						<input type="file" onchange="readURL(this);" value="" name="document[]" class="hide" style="opacity: 0; max-width: 100px!important;"></td>
						<td><div class="btn btn-danger pull-right deleteQualification">-</div></td>
						</tr>`;

						$('#qualificationRows').append(htmlContent);
					});
				});
				$(document).on('click', '.deleteQualification', function(e) {

					//do whatever
					var rowCount = $('#qualificationRows tr').length;
					console.log('row count',rowCount);
					if(rowCount==1){

						return false;
					}
					console.log('remove tr');
					$(this).parent().parent('tr').remove();

				});
				$('input[name=martial_status]').on('change', function() {
					InputShow();
				});
				$('input[name=gender]').on('change', function() {
					InputShow();
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
					console.log('images','update');
					readURL(this);
				});
			</script>
			<script>
				var input = document.getElementById( 'file-upload' );
				var infoArea = document.getElementById( 'file-upload-filename' );
				input.addEventListener( 'change', showFileName );
				function showFileName( event ) {
				var input = event.srcElement;
				var fileName = input.files[0].name;
				infoArea.textContent = 'File name: ' + fileName;
				}
			</script>
			@endpush