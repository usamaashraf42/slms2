@extends('_layouts.admin.default')
@section('title', 'Attendance')
@section('content')
<style>
	body {
		margin: 0;
		padding: 0;
	}
	@page {   size: A4;
		margin: 0;}


		@media print {
			.page {
				height:100vh; 
				margin: 0 !important; 
				padding: 0 !important;
				border: initial;
				border-radius: initial;
				width: initial;
				min-height: initial;
				box-shadow: initial;
				background: initial;
				page-break-after: always;
				page-break-before: always;
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
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
					<div class="card-box">
						<div class="card-block">
							<h4 class="card-title">Attendance</h4>

							@component('_components.alerts-default')
							@endcomponent
							<form method="POST" action="{{route('manual-attendance.store')}}" enctype = "multipart/form-data" id="upload_new_form">
								{{ csrf_field() }}

								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputPassword1">Select Branch</label>
											<select  class=" branch_id" id="branch_id" onchange="getClass(this)"   name="branch_id"  placeholder="branch_id" style="height: 40px; width: 100%;">

												<option selected="selected" disabled="disabled">Seclect Branch</option>
												@if(!empty($branches))
												@foreach($branches as $branch)
												<option value={{$branch['id']}} @if($branch['id']==old('branch_id')){{'checked'}} @endif>{{$branch['branch_name']}}</option>
												@endforeach
												@endif
											</select>


										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="select2">Select Class</label>
											<select type="text" class="form-control class_id" id=""  name="class_id" onchange="sectionSelect(this)"  placeholder="Name">
												<option selected="selected" value="0">Seclect Class</option>

											</select>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label for="select2">Attendance Date</label>
											<div class="ui calendar" id="example1" style="width: 100%">
												<div class="ui input" style="width: -webkit-fill-available!important;">
													<input type="text" class="form-control"  value="{{date('d-m-Y')}}" name="attendance_date" id="attendance_date" autocomplete="off"  placeholder="Date">
												</div>
											</div>
										</div>
									</div>

								</div>





								<div class="form-group row">

									<div class="card" style="width:100%">
										<div class="card-block">
											<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
												<button class="btn btn-primary ks-rounded" onclick="submitForm(this);"> Submit </button>
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

			<script>
				function submitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form    
        btn.form.submit();
    }
</script>
<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />

<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
<script>
	$('.branch_id').select2();
	var today = new Date();
	$('#attendance_date').calendar({
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
				console.log('branchHasClass',data);
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
		$("[name='student_id']").html(` <option selected="selected" value='0'> All Classes  </option>`);
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