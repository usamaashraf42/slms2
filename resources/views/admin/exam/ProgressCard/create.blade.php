@extends('_layouts.admin.default')
@section('title', 'Progress Card')
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
</style>
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Progress Card</h4>
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{route('progress-card.store')}}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="branch_id">Select Branch</label>
										<select class="form-control branch_id" name="branch_id" onchange="getClass(this)"  id="branch_id" required>
											<option selected="selected" value="0">All Branches</option>
											@if(!empty($branches))
											@foreach($branches as $branch)
											<option value={{$branch['id']}}>{{$branch['branch_name']}}</option>
											@endforeach
											@endif
										</select>

									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="select2">Select Class</label>
										<select type="text" class="form-control class_id" id="class_id" onchange="sectionSelect(this)"  name="class_id"  placeholder="Name">
											<option selected="selected" disabled="disabled">Seclect Class</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="select2">Select Section</label>
										<select type="text" class="form-control section_id" id="section_id" onchange="getStudent()" name="section_id"  placeholder="Name">
											<option selected="selected" disabled="disabled">Seclect Section</option>
											<option value="blue">Blue</option>
											<option value="red">Red</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="exam_type_id">Exam Type</label>
										<select type="text" class="form-control exam_type_id" id="exam_type_id" onchange="getExame(this)"   name="exam_type_id"  placeholder="Name">
											<option selected="selected" disabled="disabled">Seclect Exam Type</option>
											@if(!empty($assesment))
											@foreach($assesment as $ass)
											<option value={{$ass['id']}}>{{$ass['term']}}</option>
											@endforeach
											@endif
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="exam_id">Exam</label>
										<select type="text" class="form-control exam_id" id="exam_id"  name="exam_id"  placeholder="Name">
										</select>
									</div>
								</div>


								<div class="col-md-3">
									<div class="form-group">
										<label for="std_id">Select Student</label>
										<select type="text" class="form-control std_id" id="std_id"   name="std_id"  placeholder="Name">
											<option selected="selected" disabled="disabled">Seclect Student</option>
											
										</select>
									</div>
								</div>
								
						</div>
					</div>
					<div class="form-group row">
						<div class="card formsubmit" style="width:100%; display: block" >
							<div class="card-block">
								<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
									<button class="btn btn-primary ks-rounded"> Submit </button>
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
<!-- 
////////////////////////////////////student_picture start ///////////////////////////////////////// -->

<style>
	body {
  background: rgb(204,204,204); 
}
.box_new {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
.box_new[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
@media print {
  body, .box_new {
    margin: 0;
    box-shadow: 0;
  }
  .height_box{
  	min-height: 1320px!important;
  }
}
</style>
<button id="doPrint">Print</button>

<div class="hidden">

<div  class="box" style="margin-top: 50px; width: 100%;">
	<div id="printDiv">
	<div class="box_new"  size="A4" style="padding: 37px!important;">
		
<div class="height_box"  style="border: 1px solid #ccc;height: 100%;  height: 1050px;">
	 <div style="width: 100%;text-align: center;">
    <div align="center" style="margin-top: 200px!important;">
        <strong></strong>
    </div>
   
 
     <div style="margin: 0 auto; width: 250px;">
     	   <img  src="assets/img/logo_student.png"
            alt="LYCEUM"
        / width="100%">
     </div>
     <br>
      <div>
    <strong style="font-size: 24px;"> Progress Report</strong>
    </div>
 
    <div align="center" style="font-size: 22px;">
        Montessori Advance
    </div>
         <h6 style="font-size: 18px;">
        Final Semester
    </h6>   
    <br>
     <div class="img_box" style="  width: 180px;
       height: 180px;
       border-radius: 50%;border: 1px solid #ccc; margin: 0 auto;">
       <img src=" http://lyceumgroupofschools.com/images/student/pics/no-image.png" alt="" 
       class="image--cover"/ width="100%">
     </div>
     <div style="margin-bottom: 0px;">
  
<p>&nbsp;
</p>
<div>
</div>
  <p style="text-align: center;">
	<span style="background-color:initial; font-size:20pt; font-style:inherit">Student's Name <span>_____________________________</span>
</span>
</p>
<div class="WordSection1">
  <p class="MsoNormal">
  	<div style="font-size:20.0pt; line-height:115%; mso-bidi-font-family:Calibri; mso-bidi-theme-font:minor-latin">
  		<label>Section: </label><span> ______</span>
  		<label>Branch:</label><span> ______</span>
  		 <label>Lyceonion #:</label><span> ______</span></div>
  </p>
  <p class="MsoNormal">
  	<div style="font-size:20.0pt; line-height:115%; mso-bidi-font-family:Calibri; mso-bidi-theme-font:minor-latin">
  		<label>Name of Teacher: </label> <span>______________</span> <label>Session:</label> <span>_______</span></div>
  </p>
</div>
<p>&nbsp;
</p>

<p>&nbsp;
</p>
<p>&nbsp;
</p>

     </div>
</div>
<br clear="all"/>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- ////////////////////////////////////Student Picture End////////////////////////////////////////////// -->
<div class="content container-fluid" style="display: none">

	<div class="col-md-2">
				<input type='button' id='btn' value='All Record Print' onclick="printDiv(this,printAllRecord);" class="btn btn-primary float-center allrecord" style="width: 100%;">
			</div>
		
			<div id="printAllRecord" class="col-md-12 col-sm-12 col-sm-12" style="margin-bottom: 60px;">
				<style>
	
td {
  border: 1px solid #726E6D;
   padding: 4px 6px;
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

.footer {
  text-align:right;
  font-weight:bold;
}
.teacher_class {
    width: 200px;
    text-align: center;
    margin: 0 auto;
    display: inline-block;
}
.block_name {
    width: 133px;
    display: inline-block!important;
}
.last_line{
	width: 48%;
    float: left;
    display: inline-block;
}
				</style>
<div style="width: 100%;">
	<div style="width: 60%;float: left;">
		<h1>Final Semester Examination, 3/2018</h1>
		<h4>Syed Ahmed</h4>
		<h5>Grade: <span>IV</span></h5>
		<h6>Township</h6>
	</div>
<div style="width: 30%;float: right;">
		<div class="logo_heading">
		<img src="{{asset('images/school/logoinvoice.png')}}">
		</div>
	</div>
</div>



		 <div style="width: 70%;">
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
							<tr>
								<td>Urdu A</td>
								<td>75</td>
								<td>61.00</td>
								<td>81.33%</td>
								<td>A-</td>
							</tr>
							<tr>
								<td>Urdu B</td>
								<td>75</td>
								<td>63.00</td>
								<td>84.00%</td>
								<td>A+</td>
							</tr>
							<tr>
								<td>Maths</td>
								<td>100</td>
								<td>57.00</td>
								<td>81.33%</td>
								<td>A-</td>
							</tr>
							<tr>
								<td>Science</td>
								<td>75</td>
								<td>61.00</td>
								<td>81.33%</td>
								<td>A-</td>
							</tr>
							<tr>
								<td>Islamiat</td>
								<td>100</td>
								<td>61.00</td>
								<td>81.33%</td>
								<td>A-</td>
							</tr>
							<tr>
								<td>S Studies</td>
								<td>75</td>
								<td>61.00</td>
								<td>81.33%</td>
								<td>A-</td>
							</tr>
							<tr>
								<td>Art</td>
								<td>75</td>
								<td>61.00</td>
								<td>81.33%</td>
								<td>A-</td>
							</tr>
							<tr>
								<td>Computer</td>
								<td>85</td>
								<td>61.00</td>
								<td>81.33%</td>
								<td>A-</td>
							</tr>
							<tr>
								<td>English A</td>
									<td>75</td>
									<td>61.00</td>
								<td>81.33%</td>
								<td>A-</td>
							</tr>
							<tr>
								<td>English B</td>
								<td>78</td>
								<td>61.00</td>
								<td>81.33%</td>
								<td>A-</td>
							</tr>
							<tr>
								<td>English Listening Spkng</td>
								<td>95</td>
								<td>61.00</td>
								<td>81.33%</td>
								<td>A-</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="good_try">
					<h3>Good, try to reach the pinnacle</h3>
				</div>
			
			
				<div>
					<div style="width: 100%;">
                <div  style="width: 48%; float: left;">
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
				<td></td>
                </tr>
				<tr>
				<td>social Integration</td>
				<td></td>
				</tr>
				<tr>
				<td>Acceptance to suggestions</td>
				<td></td>
				</tr>
								<tr>
								<td>Share with / Helping Others</td>
								<td></td>
							</tr>
								<tr>
								<td>Discipline & Manners</td>
								<td></td>
							</tr>
								<tr>
								<td>Confidence & Spoken English</td>
								<td></td>
							</tr>
								<tr>
								<td>Motivation</td>
								<td></td>
							</tr>
						</tbody>
					</table>
					<br>
					<div style="width: 100%; float: right;">
				<div class="teacher_class">
					<span></span>
				<hr style="height: 1px!important; color: #000;
    background: #e2e2e2;margin-bottom: 0px;">
				<p>Class Teacher</p>
				</div>
				<div class="teacher_class" >
				<span></span>
            	<hr style="height: 1px!important; color: #000;
    background: #e2e2e2; margin-bottom: 0px;">
				<p>Senior Teacher</p>
				</div>
		<div class="teacher_class" >
				<span></span>
      	<hr style="height: 1px!important; color: #000;
    background: #e2e2e2;margin-bottom: 0px;">
            <p>Principal's Signature</p>
</div>
</div>
				</div>
	

				<div style="width: 48%; float: right;">
<div id="generatedByD3">
	<div class="">
		<svg width="500" height="400">
		<g class="bothAxis" transform="translate(50,50)">
		<g class="xAxis" transform="translate(0,300)" fill="none" font-size="10" font-family="sans-serif" text-anchor="middle"><path class="domain" stroke="currentColor" d="M0.5,6V0.5H450.5V6"></path>
		<g class="tick" opacity="1" transform="translate(25.403225806451626,0)">
			<line stroke="currentColor" y2="6"></line><text fill="currentColor" y="16" dy="0.81em" style="transform: rotate(340deg);">science</text></g>
	<g class="tick" opacity="1" transform="translate(61.69354838709678,0)">
		<line stroke="currentColor" y2="6"></line><text fill="currentColor" y="16" dy="0.81em" style="transform: rotate(340deg);">Art</text></g>
	<g class="tick" opacity="1" transform="translate(97.98387096774195,0)">
		<line stroke="currentColor" y2="6"></line><text fill="currentColor" y="16" dy="0.81em" style="transform: rotate(340deg);">Computer</text></g>
	<g class="tick" opacity="1" transform="translate(134.2741935483871,0)">
		<line stroke="currentColor" y2="6"></line><text fill="currentColor" y="16" dy="0.81em" style="transform: rotate(340deg);">English A</text></g>
	<g class="tick" opacity="1" transform="translate(170.56451612903226,0)">
		<line stroke="currentColor" y2="6"></line><text fill="currentColor" y="16" dy="0.81em" style="transform: rotate(340deg);">English B</text></g>
	<g class="tick" opacity="1" transform="translate(206.8548387096774,0)">
		<line stroke="currentColor" y2="6"></line><text fill="currentColor" y="16" dy="0.81em" style="transform: rotate(340deg);">English listening</text></g>
	<g class="tick" opacity="1" transform="translate(243.1451612903226,0)">
		<line stroke="currentColor" y2="6"></line><text fill="currentColor" y="16" dy="0.81em" style="transform: rotate(340deg);">spkng islamiat</text></g>
	<g class="tick" opacity="1" transform="translate(279.43548387096774,0)">
		<line stroke="currentColor" y2="6"></line><text fill="currentColor" y="16" dy="0.81em" style="transform: rotate(340deg);">Maths</text></g>
	<g class="tick" opacity="1" transform="translate(315.7258064516129,0)">
		<line stroke="currentColor" y2="6"></line><text fill="currentColor" y="16" dy="0.81em" style="transform: rotate(340deg);">s studies</text></g>

	<g class="tick" opacity="1" transform="translate(388.3064516129032,0)">
		<line stroke="currentColor" y2="6"></line><text fill="currentColor" y="16" dy="0.81em" style="transform: rotate(340deg);">Urdu A</text></g>
	<g class="tick" opacity="1" transform="translate(424.5967741935484,0)">
		<line stroke="currentColor" y2="6"></line><text fill="currentColor" y="16" dy="0.81em" style="transform: rotate(340deg);">Urdu B</text></g></g>
	<g class="yAxis" fill="none" font-size="10" font-family="sans-serif" text-anchor="end"><path class="domain" stroke="currentColor" d="M-6,300.5H0.5V0.5H-6"></path>
		<g class="tick" opacity="1" transform="translate(0,300.5)">
			<line stroke="currentColor" x2="-6"></line><text fill="currentColor" x="-9" dy="0.32em">0</text></g>
	<g class="tick" opacity="1" transform="translate(0,267.1666666666667)">
		<line stroke="currentColor" x2="-6"></line><text fill="currentColor" x="-9" dy="0.32em">20</text></g>
	<g class="tick" opacity="1" transform="translate(0,233.83333333333334)">
		<line stroke="currentColor" x2="-6"></line><text fill="currentColor" x="-9" dy="0.32em">40</text></g>
	<g class="tick" opacity="1" transform="translate(0,200.5)">
		<line stroke="currentColor" x2="-6"></line><text fill="currentColor" x="-9" dy="0.32em">60</text></g>
	<g class="tick" opacity="1" transform="translate(0,167.16666666666669)">
		<line stroke="currentColor" x2="-6"></line><text fill="currentColor" x="-9" dy="0.32em">80</text></g>
	<g class="tick" opacity="1" transform="translate(0,133.83333333333331)">
		<line stroke="currentColor" x2="-6"></line><text fill="currentColor" x="-9" dy="0.32em">100</text></g>
	<g class="tick" opacity="1" transform="translate(0,0.5)">
		<line stroke="currentColor" x2="-6"></line>
		<text fill="currentColor" x="-9" dy="0.32em">90</text>
	</g>
</g>
<rect class="bar" fill="#63b598" x="14.516129032258078" y="150" width="21.774193548387096" height="150"></rect>
<rect class="bar" fill="#ce7d78" x="50.80645161290324" y="143.33333333333331" width="21.774193548387096" height="156.66666666666669"></rect><rect class="bar" fill="#ea9e70" x="87.0967741935484" y="233.33333333333334" width="21.774193548387096" height="66.66666666666666"></rect>
<rect class="bar" fill="#a48a9e" x="123.38709677419357" y="66.66666666666666" width="21.774193548387096" height="233.33333333333334"></rect><rect class="bar" fill="#c6e1e8" x="159.67741935483872" y="50" width="21.774193548387096" height="250"></rect>
<rect class="bar" fill="#648177" x="195.96774193548387" y="40" width="21.774193548387096" height="260"></rect>
<rect class="bar" fill="#0d5ac1" x="232.25806451612905" y="100" width="21.774193548387096" height="200"></rect>
<rect class="bar" fill="#f205e6" x="268.5483870967742" y="216.66666666666666" width="21.774193548387096" height="83.33333333333334"></rect>
<rect class="bar" fill="#1c0365" x="304.8387096774194" y="33.33333333333337" width="21.774193548387096" height="266.66666666666663"></rect>
<rect class="bar" fill="#14a9ad" x="341.1290322580645" y="100" width="21.774193548387096" height="200"></rect>
<rect class="bar" fill="#4ca2f9" x="377.41935483870964" y="216.66666666666666" width="21.774193548387096" height="83.33333333333334"></rect>
<rect class="bar" fill="#a4e43f" x="413.7096774193549" y="200" width="21.774193548387096" height="100"></rect></g>

<text transform="rotate(-90)" y="10" x="-200" style="text-anchor:middle; font-size:14px; font-weight:bold;">Percentage</text>
</svg>
</div>
</div>
</div>
</div>
<div style="clear: both;"></div>
<div style="width: 100%;">
	<div class="block_name">Grading Key</div>
				<div class="block_name"><p>A + 90% to 100%</p></div>	
				<div class="block_name"><p>A 85 % to 89.9%</p></div>	
				<div class="block_name"><p>A - 80% to 84.9%</p></div>	
				<div class="block_name"><p>B + 75% to 79.9%; </p></div>	
				<div class="block_name"><p>B - 70% to 74.9%; </p></div>	
	            <div class="block_name"></div>	
				<div class="block_name"><p>B + 65% to 69.9%</p></div>	
				<div class="block_name"><p>C 60 % to 64.9%</p></div>	
				<div class="block_name"><p>C - 55% to 69.9%</p></div>	
				<div class="block_name"><p>D + 50% to 54.9%; </p></div>	
				<div class="block_name"><p>B - 33% to 49.9%; </p></div>
			</div>
		</div>
		
				<div class=" line_last" style="float: left; width: 48%;margin-top: 20px;">
					  <img src="{{asset('images/school/capture.jpg')}}" width="100%">
				</div>
			 <div class=" line_last" style="float: right; width: 50%;">
				<p> 
				  <strong>Head Office:</strong> 58-l/B-l Peco Road Township Lahore Ph: 0423-5115411
			      <strong>web:</strong> www.americanlyceum.edu.pk<br>
				  <strong>Email:</strong> info@americanlyceum.edu.pk <strong>Branches</strong> Wapda-Town Johar-Town Gulshan-Ravi Township</p>
			 </div>
			 </div>
		
		</div>
	</div>
</div>
@endsection

@push('post-styles')



@endpush
@push('post-scripts')


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script> -->

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
		console.log('getStudent',$("[name='branch_id']").val(),$("[name='section_id']").val());

		$(".std_id").html(` <option selected="selected" value='0'> All Student  </option>`);

		var branch_id=$("[name='branch_id']").val();
		var course_id=$("[name='section_id']").val();
		if(course_id!='' && branch_id!=''){
			$.ajax({
				method:"POST",
				url:"{{route('classHasStudent')}}",
				data : {branch_id:branch_id,course_id:course_id},
				dataType:"json",
				success:function(data){
					data.forEach(function(val,ind){
						var id = val.id;
						var name = val.s_name+' '+val.s_fatherName+' ('+val.id+')';
						var option = `<option value="${id}">${name}</option>`;
						$(".std_id").append(option);
					});

					$('.std_id').select2();
				}
			});
		}

	}
</script>
<script>

function printDiv(eve,obj)
	{


		     // $("#"+$(obj).attr('id')).print();

	console.log('printId',$(obj).attr('id'));
		 var divToPrint=document.getElementById($(obj).attr('id'));
	     var newWin=window.open('','Print-Window');
			    newWin.document.open();
			    newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
			    newWin.document.close();
			    setTimeout(function(){newWin.close();},10);
			    $("#outprint").print();
			}
</script>


</script>
<!-- <script>
document.getElementById("doPrint").addEventListener("click", function() {
     var printContents = document.getElementById('printDiv').innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
});
</script> -->

@endpush