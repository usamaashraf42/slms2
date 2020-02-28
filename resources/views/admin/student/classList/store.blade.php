@extends('_layouts.admin.default')
@section('title', 'Class List')
@section('content')
@php($levelName='')
<style>
	body {
		margin: 0;
		padding: 0;
	}
	@page {   size: A4;
		margin: 0;}


		@media print {
			.page {
				margin: 0;
				border: initial;
				border-radius: initial;
				width: initial;
				min-height: initial;
				box-shadow: initial;
				background: initial;
				page-break-after: always;
			}
		}

		th ,td{
			border: 1px solid #000!important;
			text-align: center!important;
			font-size: 12px!important;

		}

		.table td{
			padding: 0.10rem!important;
			font-size: 16px!important;
		}
		.table-bordered td, .table-bordered th {
			border: 1px solid #000000!important;
		}


		.checkbox_1{
			position: relative;
		}
		.checkbox_1:before{

			content: "";
			width: 24px;
			height: 24px;
			margin-left: -1px;
			margin-top: -3px;
			border-radius: 50%!important;
			border: solid 2px #014a75;
			background: white;
			position: absolute;
		}
		.checkbox_1:after{
			content: "";
			width: 18px;
			height: 9px;

			border: solid 2px #fff;

			border-top: none;
			border-right: none;
			position: absolute;
			top: 3px;
			left: 3px;
			transform: rotate(-45deg);
			opacity: 0;
			transition: all 0.2s ease-out;
		}
		.checkbox_1:checked:after{
			opacity: 1;
		}
		.checkbox_1:checked:before{
			background: #014a75;
			border-radius: 50%!important;
		}
		.boc_bag{   
			width: 50%;

		}
		.note{
			padding-left: 40px;
			margin-top: 12px;
		}

	</style>
	<div class="content container-fluid">
		<div style="display: block">
			<div class="col-md-12">
				<button style="font-size:36px;color:#000d82;" onclick="printDivs(this,printAllRecord);"> <i class="fa fa-print"></i><br><input type='button' id='btn' value='Print'  class="btn btn-primary float-center allrecord"></button>
			</div>
			<div class="row">
				<div id="printAllRecord" >
			
					@foreach ($students as $users_list)
					@php($tempStudent=0)
					<div class="row page"style="margin-top: 20px!important;">
						<div class="content container-fluid" >
							<div class="row" style="margin-top: 25px;text-align: right;">
								<div class="logo_heading" style="margin: 0 auto; width: 40%;">
									<img src="{{asset('images/school/alis pvt ltd.png')}}">
									<p style="text-align: right;">Official Class List of @isset($students[0]->branch) {{$students[0]->branch->branch_name}}@endisset For {{date("M-y", strtotime(date('d-m-Y'))) }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
									<div class="row p-5">
										<div style="width: 54%; float: left;">
											@if(isset($users_list->course->course_name) && ($levelName!=$users_list->course->course_name))
											
											<h2>{{$users_list->course->course_name}}</h2>
											@php($levelName=$users_list->course->course_name)
											@endif
											<table class="table table-bordered">
												<thead>
													<tr>
														<th class="border-0 text-uppercase small font-weight-bold">Lyc No</th>
														<th class="border-0 text-uppercase small font-weight-bold">Name</th>
														<th class="border-0 text-uppercase small font-weight-bold">DO Admission</th>
														<th class="border-0 text-uppercase small font-weight-bold">Status</th>
														<th class="border-0 text-uppercase small font-weight-bold" >Medical Caution</th>

													</tr>
												</thead>
												<tbody id="dataTable">
													@foreach($users_list->course->Students as $student)
													@if(isset($branch_id) && $student->branch_id==$branch_id)
													@php($tempStudent++)
													<tr>
														<td>{{$student->id}}</td>
														<td>{{$student->s_name}}  @if($student->is_freeze=='0') <span class="badge badge-info">freeze</span> @endif</td>
														<td>{{date("d-M-Y", strtotime(($student->admission_date))) }}</td>
														<td>{{$student->status?'Active':'Inactive'}}</td>
														<td>{{$student->medical_caution}}</td>

													</tr>
													@endif
													@endforeach
													
													
												</tbody>
											</table>
										</div>
										<div style="width:42%;">
											<p style="padding-left: 30px;">Total students <strong>received</strong> fee vouchers<hr style="width: 120px;margin-top: -18px; height: 2px solid #000;float: right;"></p><br>
											<p style="padding-left: 30px;">Total students <strong>not received</strong> fee vouchers <hr style="width: 120px;margin-top: -18px; height: 2px solid #000; float: right;"> </p>
										</div>
									</div>
								</div>
							</div>		
						</div>
						<div class="col-md-12">
							<div class="row" style="margin-top: 25px;text-align: right;">


							</div>
							<div class="name_done" style="margin-left: 15px;">
								<div class="boc_fag" style="float: left;">
									<p>Following students are coming but name not in the list.</p>
									<p>1) ________________________________________
									</p>
									<p>2) ________________________________________
									</p>
									<p>3) ________________________________________
									</p>
									<p>4) ________________________________________
									</p>
									<br>
									<div style="text-align: center;width: 260px;border-top:1px solid #000;margin-top: 15px;">

										<p>Class Teacher Signature</p>
										<p>Total Students {{$tempStudent}}</p>
									</div>
									<div class="row">
										<div class="note">
											<p>*Note: At the end of month submit this sheet with your branch manager signature.</p>
										</div>
									</div>
								</div>
								<div class="boc_fag" >
									<br>	<br>
									<div style="margin-left: 4%;">
										<p>Coming since _________________________
										</p>
										<p>Coming since _________________________
										</p>
										<p>Coming since _________________________
										</p>
										<p>Coming since _________________________
										</p>
									</div>
								</div>
							</div>

						</div>
					</div>
					
					@endforeach
				</div>
			</div>
			<div>
			</div>
			@endsection
			@push('post-styles')
			@endpush
			@push('post-scripts')
			<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
			<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
			<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
			<script>
				$('.branch_id').select2();
				var today = new Date();
				$('#example12').calendar({
					monthFirst: false,
					type: 'date',
					minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
				});
				$('#example1').calendar({
					monthFirst: false,
					type: 'date',
					minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
				});

				function getClass(obj){
					$("[name='class_id']").html(` <option selected="selected" disabled='disabled'> All Classes  </option>`);
					var branch_id  = $(".branch_id").val();
					console.log('branch',$("[name='branch_id']").val());
					$('.branch').val(branch_id);
					$.ajax({
						method:"POST",
						url:"{{route('branchHasClass')}}",
						data : {id:branch_id},
						dataType:"json",
						success:function(data){
							
							data.forEach(function(val,ind){
								var id = val.course.id;
								var name = val.course.course_name;
								var option = `<option value="${id}">${name}</option>`;
								$("[name='class_id']").append(option);
							});
							$('.class_id').select2();
						}
					});
				}
				function sectionSelect(obj){
					console.log('course_id',$(obj).val());
					$('#section_id').html(` <option selected="selected" disabled='disabled'> Select Section  </option>`);
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
									$('#section_id').append(option);
								});
							}

 			}
 		});
 	}
 </script>
			<script>
				function ClassList(){
					
					$('#dataTable').html('');
					console.log('class');
					console.log('getStudent',$("[name='branch_id']").val(),$("[name='class_id']").val());
					$("[name='student_id']").html(`<option selected="selected" value='0'> All Classes  </option>`);
					var branch_id=$("[name='branch_id']").val();
					var course_id=$("[name='class_id']").val();
					console.log('branch_id',branch_id,'course_id',course_id);
					if(course_id!='' && branch_id!=''){
						$.ajax({
							method:"POST",
							url:"{{route('classHasStudent')}}",
							data : {branch_id:branch_id,course_id:course_id},
							dataType:"json",
							success:function(data){
								console.log('datat',data);
								var dataContent=``;
								var index=0;
								data.forEach(function(val,ind){
									$('#dataTable').html('');

									var d=new Date(val.admission_date);
									console.log('hee',val.admission_date,'active',val.is_active);
									dataContent+=`<tr>
									<td>${val.id}</td>
									<td>${val.s_name}</td>
									<td>${d.getDate()+"-"+(d.getMonth()+1)+"-"+d.getFullYear()}</td>
									<td>${val.is_active?'Active':'Deactive'}</td>
									<td>${val.medical_caution?val.medical_caution:''}</td>

									</tr>
									`;
								});
								console.log('dataContent',dataContent);
								$('#dataTable').append(dataContent);

								printDivs('this',printAllRecord)
							}
						});
					}

					

				}
				function printDivs(eve,obj)
				{


					$("#printAllRecord").print();


				}
			</script>

			@endpush