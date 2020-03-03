@extends('_layouts.admin.default')
@section('title', 'Report Card')
@section('content')
<div class="content container-fluid">
	<div class="col-md-2">
		<button style="font-size:36px;color:#000d82;" onclick="printDivss(this,printAllRecord);"> <i class="fa fa-print"></i><br>
			<input type='button' id='btn' value='Print'  class="btn btn-primary float-center allrecord"></button>
		</div>
		<div  id="printAllRecord"  class="page-break-after " style="page-break-after  : auto | always | avoid | left | right!important;">
			<style>
				.page {
					width: 21cm;
					min-height: 29.7cm;
					padding: 14px;
					margin: 1cm auto;
					border: 1px #D3D3D3 solid;
					border-radius: 5px;
					background: white;
					box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
				}
				.box_color_fill {
					width: 12px;
					height: 12px;

					border: 1px solid #ddd;
					margin-right: 3px;
					margin-top: 2px;
				}
				.repeatedCard {
					padding: 20px;
					height: 270mm;
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
					.box_color_fill {
						width: 12px;
						height: 12px;
						border: 1px solid #ddd;
						margin-right: 3px;
						margin-top: 12px;
					}
				}

				td {
					border: 1px solid #726E6D;
					padding: 0px px;
					font-size: 13px;
				}
				ul, ol {
					padding-left: 6px!important;
				}
				thead{
					font-weight:bold;
					text-align:center;
					border: 1px solid #726E6D;
					color:black;
				}
				th{
					font-weight:bold;
					text-align:center;
					border: 1px solid #726E6D;
					padding: 4px 6px;
					color:black;
				}
				table {
					border-collapse: collapse;
				}
				.bar-graph {
					padding: 0;
					width: 100%;
					display: -webkit-flex;
					display: -ms-flexbox;
					display: flex;
					-webkit-align-items: flex-end;
					-ms-flex-align: end;
					align-items: flex-end;
					height: 216px;
					margin: 0;
				}
				.block_name{
					width:112px;
					font-size:12px;
					display: inline-flex;
				}

				.bar-graph li {
					display: block;
					padding-right: 5px;
					position: relative;
					text-align: center;
					vertical-align: bottom;
					border-radius: 4px 4px 0 0;
					max-width: 3.70%;
					font-size: 10px;
					height: 100%;
					margin: 0 1.8% 1% 0;
					-webkit-flex: 1 1 15%;
					-ms-flex: 1 1 15%;
					flex: 1 1 15%;
				}
				.bar-graph .bar-graph-axis {
					-webkit-flex: 1 1 8%;
					-ms-flex: 1 1 8%;
					flex: 1 1 8%;
					display: -webkit-flex;
					display: -ms-flexbox;
					display: flex;
					-webkit-flex-direction: column;
					-ms-flex-direction: column;
					flex-direction: column;
					-webkit-justify-content: space-between;
					-ms-flex-pack: justify;
					justify-content: space-between;
				}
				.bar-graph .bar-graph-label {
					margin: 0;
					background-color: none;
					color: #8a8a8a;
					position: relative;
				}


				.bar-graph .percent {
					letter-spacing: -3px;
					opacity: 0.4;
					width: 100%;
					font-size: 1.875rem;
					position: absolute;
				}
				.box3{
					width: 8px;
					height: 8px;
					font-size: 7px;

				}
				.bar-graph .percent span {
					font-size: 1.875rem;
				}
				.chart_barn {

					width: 20%;
					transform: rotate(-62deg);
					margin-left: -28px;
					font-weight: 500;
					font-size: 9px;
					position: absolute;
					list-style-type: none;
					bottom: -58px;
					margin-left: -10px;
				}
				.teacher_class{
					width: 33%;
					display: inline-block;
				}
				.teacher_clas{
					width: 75%;
					display: inline-block;
				}
				.bar-graph .description {
					font-weight: 800;
					opacity: 0.5;
					transform: rotate(-30deg);
					text-transform: uppercase;
					width: 100%;
					font-size: 10px;
					bottom: 20px;
					position: absolute;
					font-size: 1rem;
					overflow: hidden;
				}
				.bar-graph .bar.primary {
					border: 1px solid #1779ba;
					background: linear-gradient(#2196e3, #1779ba 70%);
				}

				.bar-graph .bar.secondary {
					border: 1px solid #767676;
					background: linear-gradient(#909090, #767676 70%);
				}

				.bar-graph .bar.success {
					border: 1px solid #3adb76;
					background: linear-gradient(#65e394, #3adb76 70%);
				}

				.bar-graph .bar.warning {
					border: 1px solid #ffae00;
					background: linear-gradient(#ffbe33, #ffae00 70%);
				}

				.bar-graph .bar.alert {
					border: 1px solid #cc4b37;
					background: linear-gradient(#d67060, #cc4b37 70%);
				}
				.fill-ratings {
					color: #e7711b;
					text-align: center;
					overflow: hidden;


				}
				.empty-ratings {
					padding: 0;
					display: block;
					z-index: 0;
				}
				.star-ratings {
					unicode-bidi: bidi-override;
					color: #ccc;
					position: relative;
					margin: 0;
					padding: 0;
				}
			</style>

			@foreach($data as $record)
			<div class="page">
				<div class="repeatedCard" style="-webkit-print-color-adjust: exact!important; padding-top: 10px;">
					<div style="width: 60%;float: left;">
						<div style="font-size: 22px; font-weight: bold; margin-bottom: 1px;">
							@if(isset($record->exam)) 
							@if(isset($record->exam->parent))
							{{$record->exam->parent->term}}
							@else
							{{$record->exam->term}}
							@endif
							@else 
							@isset($record->exam_type->term){{$record->exam_type->term}}@endisset 
							@endif, 
							{{ date("m", strtotime($record->created_at)) }}/ {{date("Y", strtotime($record->created_at))}}</div>
							<div style="font-size: 20px; font-weight: bold;">@isset($record->student){{$record->student->id}}@endisset</div>
							<div style="font-size: 17px; font-weight: bold; margin-bottom: 1px;">@isset($record->student){{$record->student->s_name}}@endisset</div>
							<div style="font-size: 17px; font-weight: bold; margin-bottom: 1px;">Grade: <span>@isset($record->student->course){{$record->student->course->course_name}}@endisset</span></div>
							<div style="font-size: 16px; font-weight: bold; margin-bottom: 10px;">@isset($record->branch) {{$record->branch->branch_name}} @endisset</div>
						</div>
						<div style="width: 30%;float: right;">
							<div class="logo_heading">
								<img src="{{asset('images/school/logoinvoice.png')}}">
							</div>
						</div>
						<div style="width: 70%;min-height: 450px;">
							<table class="bordert" id="task-table" style="width: 100%;">
								<thead>
									<tr>
										<th>Subject</th>
										<th>Total</th>
										<th>Obtained</th>
										<th>%age</th>
										<th>Grade</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$class_participation=0;
									$social_integration=0;
									$accept_to_suggestion=0;
									$share_with=0;
									$helping_other=0;
									$confidence=0;
									$spoken_eng=0;
									$motivation=0;
									$totalSubject=1;
									?>
									@if(isset($record->subject_marks) && count($record->subject_marks))
									@php($totalAllSubjectMarks=0)
									@php($totalAllGainedMarks=0)
									@foreach($record->subject_marks as $sub)
									<tr>
										<td>@isset($sub->subjects) {{$sub->subjects->sub_name}} @endisset</td>
										<td>{{$sub->total_marks}}</td>
										<td>{{$sub->gain_marks}}</td>
										<td>{{round(($sub->gain_marks/$sub->total_marks)*100 ,2)}} %</td>
										<td>{{(marksGrade(($sub->gain_marks/$sub->total_marks)*100) )}}</td>
										@php($totalAllSubjectMarks +=$sub->total_marks)
										@php($totalAllGainedMarks +=$sub->gain_marks)
										<?php
										$totalSubject++;
										$class_participation+=$sub->class_participation;
										$social_integration+=$sub->social_integration; 
										$accept_to_suggestion+=$sub->accept_to_suggestion;
										$share_with+=$sub->share_with;
										$helping_other+=$sub->helping_other;
										$confidence+=$sub->confidence;
										$spoken_eng+=$sub->spoken_eng;
										$motivation+=$sub->motivation;
										?>
									</tr>
									@endforeach
									<tr>
										<td>Total</td>
										<td>{{$totalAllSubjectMarks}}</td>
										<td>{{$totalAllGainedMarks}}</td>
										<td>{{round(($totalAllGainedMarks/$totalAllSubjectMarks)*100 ,2)}} %</td>
										<td>{{(marksGrade(($totalAllGainedMarks/$totalAllSubjectMarks)*100) )}}</td>
									</tr>
									@endif
								</tbody>
							</table>
							<div class="good_try">
								<h3>Good, try to reach the pinnacle</h3>
							</div>
						</div>
						<div style="width: 100%; min-height: 360px;">
							<div  style="width: 44%; float: left;">
								<h5>Personality Development Grid</h5>
								<table class="" id="task-table" style="width: 90%;">
									<thead>
										<tr>
											<th>Description</th>
											<th>Rank</th>
										</tr>
									</thead>
									<tbody>		
										<tr>
											<td>Class Participation</td>
											<td>
												<div class="fill-ratings">
													<span style="
													font-size: 15px;
													font-weight: bold; color:#{{MarksColor((($record->class_participation)/10) * 100)}};">★</span>
												</div>
											</td>
											<!-- <td> {{MarksColor(round(round($class_participation)/round($totalSubject)) * 100)}}</td> -->
										</tr>
										<tr>
											<td>social Integration</td>
											<td>
												<div class="fill-ratings">
													<span style="
													font-size: 15px;
													font-weight: bold; color:#{{MarksColor((($record->social_integration)/10) * 100)}};">★</span>
												</div>
											</td>
											<!-- <td>{{marksGrade(round(round($social_integration)/round($totalSubject))*100)}}</td> -->
										</tr>
										<tr>
											<td>Acceptance to suggestions</td>
											<td>
												<div class="fill-ratings">
													<span style="
													font-size: 15px;
													font-weight: bold; color:#{{MarksColor((($record->accept_to_suggestion)/10) * 100)}};">★</span>
												</div>
											</td>
											<!-- <td>{{marksGrade(round(round($accept_to_suggestion)/round($totalSubject))*100)}}</td> -->
										</tr>
										<tr>

											<td>Share with / Helping Others</td>
											<td>
												<div class="fill-ratings">
													<span style="
													font-size: 15px;
													font-weight: bold; color:#{{MarksColor((($record->share_with)/10) * 100)}};">★</span>
												</div>
											</td>
											<!-- <td>{{marksGrade(round(round($share_with)/round($totalSubject))*100)}} / {{marksGrade(round(round($helping_other/$totalSubject))*100)}}</td> -->

										</tr>
										<tr>
											<td>Discipline & Manners</td>
											<td>
												<div class="fill-ratings">
													<span style="
													font-size: 15px;
													font-weight: bold; color:#{{MarksColor((($record->helping_other)/10) * 100)}};">★</span>
												</div>
											</td>
										</tr>
										<tr>
											<td>Confidence & Spoken English</td>
											<td>
												<div class="fill-ratings">
													<span style="
													font-size: 15px;
													font-weight: bold; color:#{{MarksColor((($record->confidence)/10) * 100)}};">★</span>
												</div>
											</td>
											<!-- <td>{{marksGrade(round($spoken_eng/$totalSubject)*100)}}</td> -->
										</tr>
										<tr>
											<td>Motivation</td>
											<td>
												<div class="fill-ratings">
													<span style="
													font-size: 15px;
													font-weight: bold; color: #{{MarksColor((($record->motivation)/10) * 100)}};">★</span>
												</div>
											</td>
											<!-- <td>{{marksGrade(round($motivation/$totalSubject)*100)}}</td> -->
										</tr>
									</tbody>
								</table>
								<br>
								<div style="width: 100%; ">
									<br>
									<br>
									<div class="teacher_clas">
										<span></span>
										<div style="width: 200px;float:left; border-top: 1px solid #bbb;">
											Class Teacher
										</div>
									</div>
								</div>
							</div>
							<div style="width: 54%; float: right;">
								<h5></h5>
								<div style="width: 72%; float: left;">
									<div class="table img_dy" style="background-image: url('{{asset('images/school/graph.png')}}'); width: 285px; float: left;">
										<ul class="bar-graph" style="margin-left: 30px;">
											@if(isset($record->subject_marks) && count($record->subject_marks))
											@php($index=1)
											@foreach($record->subject_marks as $sub)
											@php($sub_id=isset($sub->subjects->id)?$sub->subjects->id:null)
											@php($per=($sub->gain_marks/$sub->total_marks)*97)
											<li class="bar" style="height: {{$per}}%; background-color: #{{colorCode($index,$sub_id)}};" title="{{$per}}">
												<div class="chart_barn">@isset($sub->subjects) {{$sub->subjects->sub_name}} @endisset</div></li>

												@php($index++)
												@endforeach
												@endif
											</ul>
										</div>
									</div>
									<div class="img_dy" style="width: 23%; float: right; margin-top: 38px;">
										<table style="border: 1px solid #ccc;">
											@if(isset($record->subject_marks) && count($record->subject_marks))
											@php($index=1)
											@foreach($record->subject_marks as $sub)
											@php($sub_id=isset($sub->subjects->id)?$sub->subjects->id:null)
											@php($per=($sub->gain_marks/$sub->total_marks)*100)
											<tr>
												<td style="border: none;"><div class="box3" style="background-color: #{{colorCode($index,$sub_id)}};"></div></td><td style="border: none;font-size: 8px!important">@isset($sub->subjects) {{$sub->subjects->sub_name}} @endisset</td>
											</tr>
											@php($index++)
											@endforeach
											@endif
										</table>
									</div>
								</div>
							</div>
							<div style="clear: both;"></div>
							<div style="width: 100%; ">
								<div class="teacher_class1" style="float:left;border-top: 1px solid #ddd;width: 200px;">
									<span></span>

									Senior Teacher
								</div>
								<div class="teacher_class2" style="float: right; border-top: 1px solid #ddd;width: 200px;">
									<span></span>

									Principal's Signature
								</div>
							</div>
							<div style="clear: both;"></div>
							<div>
								<br>
								<br>
								<div style="width:100%;">
									<div class="block_name">Grading Key</div>
									<div class="block_name"><span class="box_color_fill" style="background-color: #35ac46;"> </span> <p>A + 90% to 100%</p></div>	
									<div class="block_name"><span class="box_color_fill"> </span> <p>A 85 % to 89.9%</p></div>	
									<div class="block_name"><span class="box_color_fill"> </span> <p>A - 80% to 84.9%</p></div>	
									<div class="block_name"><span class="box_color_fill" style="background-color: #ff7743;"> </span> <p>B + 75% to 79.9%; </p></div>	
									<div class="block_name"><span class="box_color_fill"> </span> <p>B  70% to 74.9%; </p></div>	
									<div class="block_name"></div>	
									<div class="block_name"><span class="box_color_fill"> </span> <p>B - 65% to 69.9%</p></div>	
									<div class="block_name"><span class="box_color_fill" style="background-color: #ff558f;"> </span> <p>C + 60 % to 64.9%</p></div>	
									<div class="block_name"><span class="box_color_fill"> </span> <p>C  55% to 59.9%</p></div>	
									<div class="block_name"><span class="box_color_fill"> </span> <p>C - 50% to 54.9%; </p></div>	
									<div class="block_name"><span class="box_color_fill" style="background-color: #ffd53b;"> </span> <p>D 33% to 49.9%; </p></div>
								</div>
								<br>
								<br>

								<div class=" line_last" style="float: left; width: 48%;margin-top: 12px;">
									<img src="{{asset('images/school/Capture.JPG')}}" width="100%" height="40px;">
								</div>
								<div class=" line_last" style="float: right; width: 50%;">
									<p style="font-size: 10px;width: 100%;padding-top: 8px;"> 

										<strong>Head Office:</strong> 58-l/B-l Peco Road Township Lahore Ph: 0423-5115411<br>
										<strong> Email:</strong> info@americanlyceum.edu.pk
										<strong>web:<br>
										</strong> www.americanlyceum.edu.pk 
										Branches @isset($record->branch) {{$record->branch->b_address}} @endisset</p>
									</div>
								</div>
							</div>
						</div>
						@endforeach

					</div>
					<div style="clear: both;"></div>

					<div id="editor"></div>
				</div>
				@endsection
				@push('post-styles')
				@endpush
				@push('post-scripts')
				<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
				<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
				<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
				<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
				<script src="https://code.highcharts.com/highcharts.js"></script>
				<script>
					function tableShow(obj){
						var branch_id=$("[name='branch_id']").val();
						var class_id=$("[name='class_id']").val();
						var section_id=$("[name='section_id']").val();
						var subject_id=$("[name='subject_id']").val();
						var exam_type_id=$("[name='exam_type_id']").val();
						var exam_id=$("[name='exam_id']").val();
						var month=$("[name='month']").val();
						var year=$("[name='year']").val();
						console.log('branch_id',branch_id,'class_id',class_id,'section_id',section_id,'subject_id',subject_id,'exam_type_id',exam_type_id,'exam_id',exam_id,'month',month,'year',year);
						$.ajax({
							method:"POST",
							url:"{{route('marksPostingData')}}",
							data : {branch_id:branch_id,class_id:class_id,section_id:section_id,subject_id:subject_id,exam_type_id:exam_type_id,exam_id:exam_id,month:month,year:year},
							dataType:"json",
							success:function(response){
								console.log('response',response);
								if(response.status){

									var std=``;
									var indexA=0;
									response.data.forEach(function(val,ind){
										console.log(val,'student');
										std+=`<tr>
										<td> ${++indexA}</td>
										<td><input type="text" name='std_id[]' value="${val.id}" readonly class="form-control"/></td>
										<td><input type="text" value="${val.s_name+' '+val.s_fatherName}" readonly class="form-control"/></td>
										<td><input type="text" value="${response.exam.max_mark}" readonly class="form-control"/></td>
										<td><input type="number" step="any" min='0' max="${response.exam.max_mark} "name='gain_mark[]' value='0'  class="form-control"/></td>
										<td><input type="number" step="any" class="form-control"/></td>
										<td><input type="number" step="any" class="form-control"/></td>
										<td><input type="number" step="any" class="form-control"/></td>
										<td><input type="number" step="any" class="form-control"/></td>
										<td><input type="number" step="any" class="form-control"/></td>
										<td><input type="number" step="any" class="form-control"/></td>
										<td><input type="number" step="any" class="form-control"/></td>
										</tr>`;
									});
									$("#studentRecord").html(std);
									$('.nextRecordGet').css('display','none');
									$('.formsubmit').css('display','block');
								}
							}
						});

					}

					function getClas(obj){
						$("[name='class_id']").html(` <option selected="selected" value='0'> All Classes  </option>`);
						var branch_id  = $(".branch_id").val();
						console.log('branch',$("[name='branch_id']").val());
						$('.branch').val(branch_id);

						$.ajax({
							method:"POST",
							url:"{{route('branchHasClasses')}}",
							data : {branch_id:branch_id},
							dataType:"json",
							success:function(res){
								console.log('branchHasClasses',res);
								res.data.forEach(function(val,ind){
									var id = val.id;
									var name = val.course_name;
									var option = `<option value="${id}">${name}</option>`;
									$("[name='class_id']").append(option);
								});
							}
						});

					}
					function getClass(obj){
						console.log('course_id',$(obj).val());
						$('#class_id').html(` <option selected="selected" disabled='disabled'> Select Class  </option>`);
						$.ajax({
							method:"POST",
							url:"{{route('branchHasClasses')}}",
							data : {branch_id:$(obj).val()},
							dataType:"json",
							success:function(response){
								console.log('branchHasClasses',response);
								if(response.status){
									response.data.forEach(function(val,ind){
										var id = val.id;
										var name = val.course_name;
										var option = `<option value="${id}">${name}</option>`;
										$('#class_id').append(option);
									});
								}

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
								console.log('CourseHasSection',response);
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
					function getExame(obj){
						$("[name='exam_id']").html(` <option selected="selected" disabled='disabled> All Classes  </option>`);
						var type=$(obj).val();
						if(type!='' && type!=''){
							$.ajax({
								method:"POST",
								url:"{{route('ExamTypeHastExam')}}",
								data : {id:type},
								dataType:"json",
								success:function(res){
									if(res.status){
										res.data.forEach(function(val,ind){
											var id = val.id;
											var name = val.term;
											var option = `<option value="${id}">${name}</option>`;
											$("[name='exam_id']").append(option);
										});

									}
								}
							});
						}
					}

					function getStudent(){
						console.log('getStudent',$("[name='branch_id']").val(),$("[name='class_id']").val());

						$("[name='student_id']").html(` <option selected="selected" value='0'> All Classes  </option>`);

						var branch_id=$("[name='branch_id']").val();
						var course_id=$("[name='class_id']").val();
						if(course_id!='' && branch_id!=''){
							$.ajax({
								method:"POST",
								url:"{{route('classHasStudent')}}",
								data : {branch_id:branch_id,course_id:course_id},
								dataType:"json",
								success:function(data){
									data.forEach(function(val,ind){
										var id = val.id;
										var name = val.s_name+' '+val.s_fatherName;
										var option = `<option value="${id}">${name}</option>`;
										$("[name='student_id']").append(option);
									});

									$('.student_id').select2();
								}
							});
						}

					}
				</script>
				<script>
					function printDivss(eve,obj)
					{



						console.log('printDivss',$(obj).attr('id'));
						var divToPrint=document.getElementById('printAllRecord');

						var newWin=window.open('','Print-Window');

						newWin.document.open();

						newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

						newWin.document.close();

						setTimeout(function(){newWin.close();},10);



					}
					var doc = new jsPDF();
					var specialElementHandlers = {
						'#editor': function (element, renderer) {
							return true;
						}
					};
/*
  The solution below is a way to fix the percentages being off
  in iOs and Android devices and even browsers. It's also scalable
  because you can change the font-size of the stars and the width
  will adjust accordingly. This is the only way I found you could do
  unicode and CSS percentages for ratings.
  */

  $(document).ready(function() {
  // Gets the span width of the filled-ratings span
  // this will be the same for each rating
  var star_rating_width = $('.fill-ratings span').width();
  console.log('star_rating_width',star_rating_width);
  // Sets the container of the ratings to span width
  // thus the percentages in mobile will never be wrong
  $('.star-ratings').width(star_rating_width);
});

</script>


@endpush