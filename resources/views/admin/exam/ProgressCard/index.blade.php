@extends('_layouts.admin.default')
@section('title', 'Progress Card')
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

					<style>
						* {
							box-sizing: border-box;
							-moz-box-sizing: border-box;
						}

						.page {
							width: 21cm;
							min-height: 29.7cm;
							padding: 2cm;
							margin: 1cm auto;
							border: 1px #D3D3D3 solid;
							border-radius: 5px;
							background: white;
							box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
						}

						.subpage {
							padding: 10px;
							border: 2px solid #ddd;
							height: 256mm;
							outline: 1px #FFEAEA solid;
						}

						.progress_1 {
							font-size: 32px;
							font-weight: bold;
							font-family:Calibri;
							margin-top: 15px;
						}
						.final {
							font-size: 32px;
							font-weight: normal;
							margin-top: 20px;
							font-family:Calibri;
						}
						.montes {
							font-size: 34px;
							font-weight: normal;
							margin-top:20px;
							font-family:Calibri;
						}
						.lable_name{
							background-color:initial; font-size:20pt; font-style:inherit;font-size: 22px;
						}

						.result_name{
							font-weight: normal;font-size: 22px;width: 100%!important;
						}
						@page {
							size: A4;
							margin: 0;
						}

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
							.subpage {
								padding: 10px;
								border: 2px solid #ddd;
								height: 320mm;
								outline: 1px #FFEAEA solid;
							}



							.progress_1 {
								font-size: 32px;
								font-weight: bold;
								font-family:Calibri;
								margin-top: 15px;
							}
							.final {
								font-size: 32px;
								font-weight: normal;
								margin-top: 20px;
								font-family:Calibri;
							}
							.montes {
								font-size: 34px;
								font-weight: normal;
								margin-top:20px;
								font-family:Calibri;
							}
							.lable_name{
								background-color:initial; font-size:20pt; font-style:inherit;font-size: 22px;
							}

							.result_name{
								font-weight: normal;font-size: 22px;width: 100%;
							}
							.marin_top{
								margin-top: 200px;
							}
						}
						<
					</style>
					@foreach($students as $std)

					<div id="printDiv">
						<div class="page">
							<div class="subpage">
								<div class="height_box">
									<div style="width: 100%;text-align: center;">
										<div class="marin_top" align="center" style="margin-top: 100px!important;">
											<strong></strong>
										</div>


										<div style="margin: 0 auto; width: 250px;">
											<img  src="{{asset('assets/img/logo_student.png')}}"
											alt="LYCEUM"
											/ width="100%" style="-webkit-print-color-adjust: exact;">
										</div>
										<br>
										<div  class="progress_1">
											Progress Report
										</div>
										<br>
										<div  class="montes" align="center">
											@isset($std->course->course_name) {{$std->course->course_name}} @endisset
										</div>
										<br>
										<div class="final">
											@isset($exam->term) {{$exam->term}} @endisset
										</div>
										<br>
										<div class="img_box" style="  width: 180px;
										height: 180px;
										border-radius: 50%;border: 1px solid #ccc; margin: 0 auto;">
										<img src="@if($std->images) {{asset('images/student/pics/'.$std->images)}} @else http://lyceumgroupofschools.com/images/student/pics/no-image.png @endif" alt="" 
										class="image--cover"/ width="100%" style="max-height: 180px;max-width: 180px;border-radius: 50%;">
									</div>
									<div style="    margin: 0 auto;
									text-align: justify;
									width: 411px;">


									<br>
									<br>
									<strong class="lable_name">Student's Name :<strong style="
									text-decoration: underline;
									font-weight: normal;
									font-family: inherit;font-size: 22px;"><u>{{$std->s_name}}</u>

								</strong>

								<div class="WordSection1">

									<div style="font-size:20.0pt; line-height:115%; mso-bidi-font-family:Calibri; mso-bidi-theme-font:minor-latin">
										<strong class="lable_name">Section:</strong><u class="result_name">@isset($std->course->course_name) {{$std->course->course_name}} @endisset</u>
										<br>
										<strong class="lable_name">Branch:</strong><u class="result_name">@isset($std->branch->branch_name) {{$std->branch->branch_name}} @endisset</u></span>
										<br>
										<strong class="lable_name"> Lyceonion #:</strong><span> <u style="font-weight: normal;font-size: 24px;width: 100%;">@isset($std->id) {{$std->id}} @endisset</u></span>

										
										<div style="font-size:20.0pt; line-height:115%; mso-bidi-font-family:Calibri; mso-bidi-theme-font:minor-latin">
											<strong class="lable_name">Name of Teacher: </strong> <span><u class="result_name">tahir</u></span> 
											<br><strong class="lable_name">Session:</strong> <span><u class="result_name"></u></span></div>

										</div>


									</div>
								</div>
								<br clear="all"/>
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