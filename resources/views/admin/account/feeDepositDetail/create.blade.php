@extends('_layouts.admin.default')
@section('title', 'Fee Deposit Detail')
@section('content')
<div class="content container-fluid">
	<div class="row">

		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<h4 class="card-title">Fee Deposit Detail</h4>
			<div class="card-box">

				<div class="card-block">

					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('fee-deposit-detail.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">

										<label for="exampleInputPassword1">Select Branch</label>
										<select class="branch_id" name="branch_id"   id="select_branch" required style="width: 100%;height: 40px;">
											<option selected="selected" value="0">All Branches</option>
											@if(!empty($branches))
											@foreach($branches as $branch)
											<option value={{$branch['id']}}>{{$branch['branch_name']}}</option>
											@endforeach
											@endif
										</select>

									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="select2">Month</label>
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
								<div class="col-md-4">
									<div class="form-group">
										<label for="select2">Years</label>
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



							
							<div class="form-group row">

								<div class="card" style="width:100%">
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

		<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />

		<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


		<script>
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
				$("[name='class_id']").html(` <option selected="selected" value='0'> All Classes  </option>`);
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

		@endpush