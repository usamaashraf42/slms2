@extends('_layouts.admin.default')
@section('title', 'Exam Create')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Exam Create</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('exam.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}

							
							<div class="row" style="margin: 10px 0px;">
								<div class="col-md-4">
									<label class="control-label">Select Branch</label>
									<select name="branch_id" type="branch_id" id="branch_id" value="{{ old('branch_id') }}" onchange="branchHasClass(this)" class="form-control branch_id" placeholder="abc123@example.com">
										<option>Choose The Branch</option>
										@foreach($branches as $branch)
										<option value="{{$branch->id}}">{{$branch->branch_name}}</option>
										@endforeach
									</select>
									@if ($errors->has('branch_id'))
									<div class="alert alert-danger" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
											<span class="sr-only">Close</span>
										</button>
										<strong>Warning!</strong> {{$errors->first('branch_id')}}
									</div>
									@endif
								</div>

								<div class="col-md-4">
									<label class="control-label">Exam Term</label>
									<select  type="text" name="term_id" value="{{ old('term_id') }}" onchange="examTerm(this)"  placeholder="Mobile No" class="form-control">
										<option>Choose The Exam Term</option>
										@foreach($categories as $cats)
										<option value="{{$cats->id}}">{{$cats->term}}</option>
										@endforeach
									</select>

									@if ($errors->has('term_id'))
									<div class="alert alert-danger" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
											<span class="sr-only">Close</span>
										</button>
										<strong>Warning!</strong> {{$errors->first('term_id')}}
									</div>
									@endif


								</div>
								<div class="col-md-4">
									<label class="control-label">Select Exam</label>
									<select  type="text " name="exam_sub_id" value="{{ old('exam_sub_id') }}" placeholder="Mobile No" class="form-control exam_sub_id">
									</select>

									@if ($errors->has('sub_id'))
									<div class="alert alert-danger" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
											<span class="sr-only">Close</span>
										</button>
										<strong>Warning!</strong> {{$errors->first('sub_id')}}
									</div>
									@endif


								</div>

							</div> 
							<div class="row" style="margin: 10px 0px;">
								<div class="col-md-12">
									<table class="table table-bordered">
										<thead class="thead-light">
											<tr>
												<th>Class</th>
												<th>Section</th>
												<th>Subject</th>
												<th>Exam Date</th>
												<th>Start Time</th>
												<th>End Time</th>
												<th>Marks</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody id="qualificationRows">
											<tr class="sectionRow">
												<td>
													<select type="text" class="form-control course_id" onchange="sectionSelect(this)" name="course_id[]">
														<option>Choose the Class</option>

													</select>
												</td>
												<td>
													<select type="text" class="form-control section_id"  name="section_id[]">
														<option>Choose the Section</option>

													</select>
												</td>
												<td>
													<select type="text" class="form-control sub_id" name="sub_id[]">
														<option>Choose the Subject</option>
														@foreach($subjects as $sub)
														<option value="{{$sub->id}}">{{$sub->sub_name}}</option>
														@endforeach

													</select>
												</td>
												<td>
													<input type="text" class="form-control exam_date" value="{{date('d-m-Y')}}" placeholder="31-12-2019"  name="exam_date[]">
												</td>
												<td>
													<input type="text" class="form-control start_time" value="09:30" placeholder="00:00"  name="start_time[]">
												</td>
												<td><input type="text" class="form-control end_time" value="12:30" placeholder="00:00"  name="end_time[]"></td>
												<td><input type="text" class="form-control " name="max_mark[]"></td>
												<td></td>
											</tr>
											
										</tbody>
									</table>

									<div class="btn btn-success pull-right addQualification">+</div>
								</div>
							</div>

							<div class="form-group row">


								<div class="card" style="width:100%">
									<div class="card-block">
										<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
											<input class="btn btn-primary ks-rounded" onclick="submitForm(this);" value="Submit"> </button>
											<button class="btn btn-success ks-rounded">Cancel</button>
										</div>

									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		@endsection

		@push('post-styles')



		@endpush
		@push('post-scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

		<script>

			$('.exam_date').mask('99-99-9999');

			$('.start_time').mask('99:99');
			$('.end_time').mask('99:99');



			
			function submitForm(btn) {
        		// disable the button
        		btn.disabled = true;
        		// submit the form    
        		btn.form.submit();
        	}


        	function branchHasClass(objClass){
        		console.log('objClass',objClass,$('.branch_id').val());
        		var branch_id1=$('.branch_id').val();
        		$(".course_id").html('');
        		console.log('branchHasClasses',branch_id1);
        		$(".course_id").html(` <option selected="selected" disabled='disabled'> Select Class  </option>`);
        		$.ajax({
        			method:"POST",
        			url:"{{route('branchHasClasses')}}",
        			data : {branch_id:branch_id1},
        			dataType:"json",
        			success:function(response){
        				console.log('branchHasClass',response);
        				if(response.status){
        					response.data.forEach(function(val,ind){
        						var id = val.id;
        						var name = val.course_name;
        						var option = `<option value="${id}" ${branch_id1==id?'selected':''}>${name}</option>`;
        						$(".course_id").append(option);
        					});
        				}

        			}
        		});

        	}


        	function examTerm(obj){
        		console.log('examTerm',$(obj).val());
        		
        		$('.exam_sub_id').html(` <option selected="selected" disabled='disabled'> Select Exam  </option>`);
        		$.ajax({
        			method:"POST",
        			url:"{{route('ExamTypeCategory')}}",
        			data : {id:$(obj).val()},
        			dataType:"json",
        			success:function(response){

        				console.log('examterm',response);
        				if(response.status){
        					response.data.forEach(function(val,ind){
        						var id = val.id;
        						var name = val.term;
        						var option = `<option value="${id}">${name}</option>`;
        						$('.exam_sub_id').append(option);
        					});
        				}

        			}
        		});
        	}

        	function sectionSelect(obj){
        		console.log('course_id',$(obj).val());
        		
        		$(obj).parent().parent('.sectionRow').find('.section_id').html(` <option selected="selected" disabled='disabled'> Select Section  </option>`);
        		$.ajax({
        			method:"POST",
        			url:"{{route('CourseHasSection')}}",
        			data : {id:$(obj).val()},
        			dataType:"json",
        			success:function(response){
        				if(response.status){
        					response.data.forEach(function(val,ind){
        						var id = val.id;
        						var name = val.course_name;
        						var option = `<option value="${id}">${name}</option>`;
        						$(obj).parent().parent('.sectionRow').find('.section_id').append(option);
        					});
        				}

        			}
        		});
        	}
        </script>




        <link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-font.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker.css')}}" />

        <link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-ios.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-android.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-windows.css')}}" /> 
        <script type="text/javascript" src="{{asset('js/datepickerScroll/src/anypicker.js')}}"></script>

        <script type="text/javascript">

        	// $("#start_time").AnyPicker({
        	// 	mode: "datetime",
        	// 	dateTimeFormat: " dd-MMM-yyyy hh:mm AA",
        	// });
        	// $("#end_time").AnyPicker({
        	// 	mode: "datetime",
        	// 	dateTimeFormat: " dd-MMM-yyyy hh:mm AA",
        	// });

   //      	$(".start_time").click(function(e) {
			//    // mouse click on button 'bar'
			//    console.log('start Class event');
			//    console.log('e',$(this));
			//    $(this).AnyPicker({
	  //       		mode: "datetime",
	  //       		dateTimeFormat: " dd-MMM-yyyy hh:mm AA",
	  //       	});
			// });

			// $(document).ready(function(){
   //      		$(document).on('click', '.end_time', function(e) {
   //      			console.log('clicks');
   //      			AnyPicker();


   //      			$(e.target).AnyPicker().reload();


   //      			$(e.target).AnyPicker({
		 //        		mode: "datetime",
		 //        		dateTimeFormat: " dd-MMM-yyyy hh:mm AA",
		 //        	});
   //      		});
   //      	});

   // $(document).on('click', '.end_time', function(el) { 
   // 	console.log('click on endTime');
   // 	$(this).AnyPicker({
   // 		mode: "datetime",
   // 		dateTimeFormat: " dd-MMM-yyyy hh:mm AA",
   // 	});
   // });
   // $(document).on('click', '.start_time', function(el) { 
   // 	console.log('click on startTime');
   // 	$(this).AnyPicker({
   // 		mode: "datetime",
   // 		dateTimeFormat: " dd-MMM-yyyy hh:mm AA",
   // 	});
   // });



        	// $(document).ready(function(){

        	// 	$(document).on('click', '.start_time', function(e) {
        	// 		$(e.target).AnyPicker().reload();

        	// 		console.log('clicks');

        	// 		AnyPicker();

        	// 		$(e.target).AnyPicker({

		       //  		mode: "datetime",
		       //  		dateTimeFormat: " dd-MMM-yyyy hh:mm AA",
		       //  	});
        	// 	});
        	// });
			// $(".end_time").click(function(e) {
			//    console.log('end_time Class event');
			//    $(this).AnyPicker({
	  //       		mode: "datetime",
	  //       		dateTimeFormat: " dd-MMM-yyyy hh:mm AA",
	  //       	});
			// });


        	// function start_time(obj){
        	// 	$(obj).AnyPicker({
	        // 		mode: "datetime",
	        // 		dateTimeFormat: " dd-MMM-yyyy hh:mm AA",
	        // 	});
        	// }
        	// function end_time(obj){
        	// 	$(obj).AnyPicker({
	        // 		mode: "datetime",
	        // 		dateTimeFormat: " dd-MMM-yyyy hh:mm AA",
	        // 	});
        	// }

        </script>

        <script type="text/javascript">
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

        		console.log('remove tr');
        		$(this).parent().parent('tr').remove();

        	});

        	$(document).ready(function(){
        		$(document).on('click', '.addQualification', function(e) {
        			var sectionRow=``;

	        		// var branch_id1=$('.branch_id').val();
	        		// console.log('branchHasClasses',branch_id1);
	        		// $.ajax({
	        		// 	method:"POST",
	        		// 	url:"{{route('branchHasClasses')}}",
	        		// 	data : {branch_id:branch_id1},
	        		// 	dataType:"json",
	        		// 	success:function(response){

	        		// 		console.log('branchHasClass sectionRow',response);
	        		// 		if(response.status){
	        		// 			sectionRow+=`<option selected="selected" disabled='disabled'> Select Class  </option>`;
	        		// 			response.data.forEach(function(val,ind){
	        		// 				var id = val.id;
	        		// 				var name = val.course_name;
	        		// 				var option = `<option value="${id}" >${name}</option>`;
	        		// 				sectionRow+=option;
	        		// 			});
	        		// 		}

	        		// 	}
	        		// });

	        		// console.log('sectionRow',$('.sectionRow').first().clone());

	        		// var sectionRow=$('.sectionRow').first().clone();

	        		var $tr    = $(this).closest('.sectionRow');
	        		var clone = $tr.clone();
	        		clone.find(':text').val('');
					    // $tr.after($clone);
					    console.log('clone',clone);

					    var clonedRow = $('.sectionRow').first().clone();
					    // clonedRow.find('input').val('');
					    console.log('cloneRoew',clonedRow);
					    $('#qualificationRows').append(clonedRow);

					    $('#qualificationRows').append(clone);

	     //    		console.log('sectionRowHTml',sectionRow);
      //   			var htmlContent=`<tr class="sectionRow">
      //   			<td>
      //   			<select type="text" class="form-control course_id" onchange="sectionSelect(this)" name="course_id[]">
						// ${sectionRow}        			
      //   			</select>
      //   			</td>
      //   			<td>
      //   			<select type="text" class="form-control section_id"  name="section_id[]">
      //   			<option>Choose the Section</option>

      //   			</select>
      //   			</td>
      //   			<td>
      //   			<select type="text" class="form-control sub_id" name="sub_id[]">
      //   			<option>Choose the Subject</option>
      //   			@foreach($subjects as $sub)
      //   			<option value="{{$sub->id}}">{{$sub->sub_name}}</option>
      //   			@endforeach

      //   			</select>
      //   			</td>
      //   			<td>
      //   			<input type="text" class="form-control start_time" id="start_time" readonly name="start_time[]">
      //   			</td>
      //   			<td><input type="text" class="form-control end_time" readonly id="end_time"  name="end_time[]"></td>
      //   			<td><input type="text" class="form-control " name="max_mark[]"></td>


      //   			<td><div class="btn btn-danger pull-right deleteQualification">-</div></td>
      //   			</tr>`;

      //   			$('#qualificationRows').append(htmlContent);
  });
        	});
        	$(document).on('click', '.deleteQualification', function(e) {

        		var rowCount = $('#qualificationRows tr').length;
        		console.log('row count',rowCount);
        		if(rowCount==1){

        			return false;
        		}
        		console.log('remove tr');
        		$(this).parent().parent('tr').remove();

        	});


        </script>


        @endpush