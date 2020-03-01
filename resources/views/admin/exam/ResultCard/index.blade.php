@extends('_layouts.admin.default')
@section('title', 'Result Card')
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
					<h4 class="card-title">Result Card</h4>
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{route('student-card.store')}}" enctype = "multipart/form-data" id="upload_new_form">
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
										<label for="std_id">Select Student</label>
										<select type="text" class="form-control std_id" id="std_id"   name="std_id"  placeholder="Name">
											<option selected="selected" disabled="disabled">Seclect Student</option>
											
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
										<label for="student_Id">Enter Stdudent Id</label>
										<input type="text" class="form-control "    name="student_Id"  placeholder="Enter Stdudent Id">
											
									</div>
								</div>
								
								 <div class="col-md-3">
									<div class="form-group">
										<label for="select2">Select Month</label>
										<select type="text" class="form-control month" id="month"   name="month">
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
									</div>
								</div> 
								 <div class="col-md-3">
									<div class="form-group">
										<label for="select2">Select Year</label>
										<select type="text" class="form-control year" id="year"   name="year"  placeholder="Student Name">
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
									</div>
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