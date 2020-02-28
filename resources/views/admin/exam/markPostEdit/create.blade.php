@extends('_layouts.admin.default')
@section('title', 'Marks Post')
@section('content')
<style>
	.logo_heading{
		float: right;
		width: 200px
	}
	.good_try{text-align: center;}
	.teacher_class {
		width: 46%;
		text-align: center;
		margin: 0 auto;
	}
	.box_line{
		background: linear-gradient(to top, #ec0207 25%, #000d82 46%);
		width: 100%;
		margin-top: 65x;
		margin-top: 30px;
		height: 40px;
	}

	.tick{
		font-size: 6px;
	}
	.table1{
		width: 100%!important;
	}
	.table1 th td{
		padding: 2px!important;
	}
</style>
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Marks Post Edit</h4>
					@component('_components.alerts-default')
					@endcomponent
					
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3">
								<form method="POST" action="{{route('marks-edit.store')}}" enctype="multipart/form-data" id="upload_new_form">
										@csrf
								<div class="form-group">
									<label for=""> Branch</label>
									<input type="hidden" name="branch_id" value="{{$branch}}">
									<input type="text" class="form-control" readonly value="@isset($branchName->branch_name){{$branchName->branch_name}} @endisset">
									<p class="alert alert-danger branch_id_eror" style="display: none"></p>
								</div>

							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="select2"> Class</label>
									<input type="hidden" name="course_id" value="{{$course}}">
									<input type="text" class="form-control" readonly value="@isset($courseName->course_name){{$courseName->course_name}} @endisset">


									<p class="alert alert-danger class_id_eror" style="display: none"></p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="select2"> Section</label>
									<input type="hidden" name="section_id" value="{{$section_id}}">
									<input type="text" class="form-control" readonly value="@isset($sectionName->course_name){{$sectionName->course_name}} @endisset">

									<p class="alert alert-danger section_id_eror" style="display: none"></p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="subject_id"> Subject</label>
									<input type="hidden" name="subject_id" value="{{$subject_id}}">
									<input type="text" class="form-control" readonly value="@isset($subjectName->sub_name) {{$subjectName->sub_name}} @endisset">
									<p class="alert alert-danger subject_id_eror" style="display: none"></p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exam_type_id">Exam Type</label>
									<input type="hidden" name="exam_id" value="{{$exam_id}}">
									<input type="text" class="form-control" readonly value="@isset($StudentExamMarkName->exam_main_category->term){{$StudentExamMarkName->exam_main_category->term}} @endisset">

									<p class="alert alert-danger exam_type_id_eror" style="display: none"></p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exam_id">Exam</label>
									<input type="hidden" name="exam_type_id" value="{{$exam_type_id}}">
									<input type="text" class="form-control" readonly value="@isset($StudentExamMarkTypeName->exam_main_category->term){{$StudentExamMarkTypeName->exam_main_category->term}} @endisset">


								</div>
							</div>
							<input type="hidden" name="month" value="@isset($month){{$month}} @endisset">
							<input type="hidden" name="year" value="@isset($year){{$year}} @endisset">
							<div class="col-md-3">
								<div class="form-group">
									<label for="select2">Select Month</label>
									<select type="text" class="form-control month" id="month" disabled="true"  name="month">
										<option selected="selected" value="0">--Select Month--</option>
										<option  value='1' @if($month==1){{'selected'}}@endif>Janaury</option>
										<option value='2' @if($month==2){{'selected'}}@endif>February</option>
										<option value='3' @if($month==3){{'selected'}}@endif>March</option>
										<option value='4' @if($month==4){{'selected'}}@endif>April</option>
										<option value='5' @if($month==5){{'selected'}}@endif>May</option>
										<option value='6' @if($month==6){{'selected'}}@endif>June</option>
										<option value='7' @if($month==7){{'selected'}}@endif>July</option>
										<option value='8' @if($month==8){{'selected'}}@endif>August</option>
										<option value='9' @if($month==9){{'selected'}}@endif>September</option>
										<option value='10' @if($month==10){{'selected'}}@endif>October</option>
										<option value='11' @if($month==11){{'selected'}}@endif>November</option>
										<option value='12' @if($month==12){{'selected'}}@endif>December</option>
									</select>
									<p class="alert alert-danger month_eror" style="display: none"></p>
								</div>
							</div> 
							<div class="col-md-3">
								<div class="form-group">
									<label for="select2">Select Year</label>
									<select type="text" class="form-control year" id="year" disabled="true"   name="year"  placeholder="Student Name">
										<option selected="selected" disabled="disabled">--Select Year--</option>
										<option value="2024" @if($year==2024){{'selected'}}@endif>2024</option>
										<option value="2023" @if($year==2023){{'selected'}}@endif>2023</option>
										<option value="2022" @if($year==2022){{'selected'}}@endif>2022</option>
										<option value="2021" @if($year==2021){{'selected'}}@endif>2021</option>
										<option value="2020" @if($year==2020){{'selected'}}@endif>2020</option>
										<option value="2019" @if($year==2019){{'selected'}}@endif>2019</option>
										<option value="2018" @if($year==2018){{'selected'}}@endif>2018</option>
										<option value="2017" @if($year==2017){{'selected'}}@endif>2017</option>
										<option value="2016" @if($year==2016){{'selected'}}@endif>2016</option>
										<option value="2015" @if($year==2015){{'selected'}}@endif>2015</option>
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
									<p class="alert alert-danger year_eror" style="display: none"></p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="max_mark">Total Marks </label>
									<input type="number" class="form-control max_mark" id="max_mark" value="{{$max_mark}}"  name="max_mark" min="0"  placeholder="00">
									<p class="alert alert-danger max_mark_eror" style="display: none"></p>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="table-responsive">
								<table id="example" class="table1 border table-bordered ">
									<thead>
										<tr>
											<th></th>
											<th>Ly-no</th>
											<th>Student's name</th>
											<th>Obtain</th>
											<th>class partiception</th>
											<th>Social integration</th>
											<th>Accept suggestion</th>
											<th>Share/Help Other</th>
											<th>disciplen manners</th>
											<th>confidance</th>
											<th>Motivation</th>

										</tr>
									</thead>
									
										<tbody id="studentRecord">
											@if(isset($studentMarks) && count($studentMarks))
											@php($counter=0)
											@foreach($studentMarks as $data)

											<tr>
												<input name='max_mark' type="hidden" value="{{$max_mark}}">
												<td>{{++$counter}}</td>
												<td><input type="text" readonly  name='std_ids[]' value="@isset($data->std_id) {{$data->std_id}} @endisset"  /></td>
												<td>@isset($data->student) {{$data->student->s_name}} / {{$data->student->s_fatherName}} @endisset </td>
												
												<input type="hidden" readonly  name='ids[]' value="@isset($data->id) {{$data->id}} @endisset" />
												<td><input name='gain_mark[]' value="@if(isset($data->gain_marks)) {{$data->gain_marks}} @else 0 @endif" /></td>
												<td><input name="class_participation[]" value="@if(isset($data->class_participation)) {{$data->class_participation}} @else 0 @endif"  style ="max-width: 60px;" /></td>
												<td><input name="social_integration[]" value="@if(isset($data->social_integration)) {{$data->social_integration}} @else 0 @endif" style ="max-width: 60px;"  /></td>
												<td><input name="accept_to_suggestion[]" value="@if(isset($data->accept_to_suggestion)) {{$data->accept_to_suggestion}} @else 0 @endif" style ="max-width: 60px;"  /></td>
												<td><input name="share_with[]" value="@if(isset($data->share_with)) {{$data->share_with}} @else 0 @endif" style ="max-width: 60px;"  /><input name="helping_other[]" value="@if(isset($data->helping_other)) {{$data->helping_other}} @else 0 @endif" style ="max-width: 60px;"  /></td>
												<td><input name="confidence[]" value="@if(isset($data->confidence)) {{$data->confidence}} @else 0 @endif" style ="max-width: 60px;"  /></td>
												<td><input name="spoken_eng[]" value="@if(isset($data->spoken_eng)) {{$data->spoken_eng}} @else 0 @endif" style ="max-width: 60px;"  /></td>
												<td><input name="motivation[]" value="@if(isset($data->motivation)) {{$data->motivation}} @else 0 @endif"  style ="max-width: 60px;" /></td>
											</tr>
											@endforeach
											@endif

											<tr>
												<input name='max_mark' type="hidden" value="{{$max_mark}}">
												<td>{{++$counter}}</td>
												<td><input type="text"   name='std_ids[]' value=""  /></td>
												<td></td>
												
												
												<td><input name='gain_mark[]' value="0" /></td>
												<td><input name="class_participation[]" value="0"  style ="max-width: 60px;" /></td>
												<td><input name="social_integration[]" value="0" style ="max-width: 60px;"  /></td>
												<td><input name="accept_to_suggestion[]" value="0" style ="max-width: 60px;"  /></td>
												<td><input name="share_with[]" value="0" style ="max-width: 60px;"  /><input name="helping_other[]" value="0" style ="max-width: 60px;"  /></td>
												<td><input name="confidence[]" value="0" style ="max-width: 60px;"  /></td>
												<td><input name="spoken_eng[]" value="0" style ="max-width: 60px;"  /></td>
												<td><input name="motivation[]" value="0"  style ="max-width: 60px;" /></td>
											</tr>
											<tr>
												<input name='max_mark' type="hidden" value="{{$max_mark}}">
												<td>{{++$counter}}</td>
												<td><input type="text"   name='std_ids[]' value=""  /></td>
												<td></td>
												
												
												<td><input name='gain_mark[]' value="0" /></td>
												<td><input name="class_participation[]" value="0"  style ="max-width: 60px;" /></td>
												<td><input name="social_integration[]" value="0" style ="max-width: 60px;"  /></td>
												<td><input name="accept_to_suggestion[]" value="0" style ="max-width: 60px;"  /></td>
												<td><input name="share_with[]" value="0" style ="max-width: 60px;"  /><input name="helping_other[]" value="0" style ="max-width: 60px;"  /></td>
												<td><input name="confidence[]" value="0" style ="max-width: 60px;"  /></td>
												<td><input name="spoken_eng[]" value="0" style ="max-width: 60px;"  /></td>
												<td><input name="motivation[]" value="0"  style ="max-width: 60px;" /></td>
											</tr>
											<tr>
												<input name='max_mark' type="hidden" value="{{$max_mark}}">
												<td>{{++$counter}}</td>
												<td><input type="text"   name='std_ids[]' value=""  /></td>
												<td></td>
												
												
												<td><input name='gain_mark[]' value="0" /></td>
												<td><input name="class_participation[]" value="0"  style ="max-width: 60px;" /></td>
												<td><input name="social_integration[]" value="0" style ="max-width: 60px;"  /></td>
												<td><input name="accept_to_suggestion[]" value="0" style ="max-width: 60px;"  /></td>
												<td><input name="share_with[]" value="0" style ="max-width: 60px;"  /><input name="helping_other[]" value="0" style ="max-width: 60px;"  /></td>
												<td><input name="confidence[]" value="0" style ="max-width: 60px;"  /></td>
												<td><input name="spoken_eng[]" value="0" style ="max-width: 60px;"  /></td>
												<td><input name="motivation[]" value="0"  style ="max-width: 60px;" /></td>
											</tr>


										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						
						<div class="card " style="width:100%;" >
							<div class="card-block">
								<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
									<button class="btn btn-primary ks-rounded"  onclick="formSubmit(this)"> Submit </button>
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

<script type="text/javascript">
	function formSubmit(obj){
		obj.disabled = true;
			        // submit the form    
			        obj.form.submit();
			        return true;
			    }
			    function addRowStudent(obj){
			    	var max_marks=$('.max_mark').val();
			    	var htmlContent=`<tr>
			    	<td> </td>
			    	<td><input type="text" name='std_ids[]' value="" /></td>
			    	<td></td>
			    	<td><input type="number" step="any" min='0' max="${max_marks} "name='gain_mark[]' value='0' style ="max-width: 60px;"  /></td>
			    	<td><input type="number" step="any" name="class_participation[]" value='0'  style ="max-width: 60px;" /></td>
			    	<td><input type="number" step="any" name="social_integration[]" value='0' style ="max-width: 60px;"  /></td>
			    	<td><input type="number" step="any" name="accept_to_suggestion[]" value='0' style ="max-width: 60px;"  /></td>
			    	<td><input type="number" step="any" name="share_with[]" value='0' style ="max-width: 60px;"  />
			    	<input type="number" step="any" name="helping_other[]" value='0' style ="max-width: 60px;"  />
			    	</td>
			    	<td><input type="number" step="any" name="confidence[]" value='0' style ="max-width: 60px;"  /></td>
			    	<td><input type="number" step="any" name="spoken_eng[]" value='0' style ="max-width: 60px;"  /></td>
			    	<td><input type="number" step="any" name="motivation[]" value='0'  style ="max-width: 60px;" /></td>

			    	</tr>`
			    	$("#studentRecord").append(htmlContent);
			    }
			</script>


			@endpush