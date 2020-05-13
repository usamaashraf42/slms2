@extends('_layouts.admin.default')
@section('title', 'Branch Edit')
@section('content')
@php($banks=\App\Models\Bank::get())
@php($oman=\App\Models\Country::get())
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title"> Branch Edit</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('branch.update',$branch->id) }}" enctype = "multipart/form-data" id="upload_new_form">
						<input type="hidden" name="_method" value="PUT">
						<div class="col-md-12">
							{{csrf_field()}}
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputPassword1">Branch Name</label>
										<input type="text" class="form-control branch_name" value="@isset($branch->branch_name){{$branch->branch_name}} @endif" name="branch_name" id="branch_name" placeholder="Account Category Name">
										@if ($errors->has('branch_name'))
										<label id="branch_name-error" class="error" for="branch_name" style="color: red">{{$errors->first('branch_name')}}</label>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputPassword1">Country</label>
										<select type="text" class="form-control b_countryCode"  name="b_countryCode" id="b_countryCode" placeholder="Country Code">
											<option value="" selected="selected">Select The Country</option>
											@foreach($oman as $om)
											<option value="{{$om->phonecod}}" @if($branch->b_countryCode==$om->phonecod) selected @endif>{{$om->nam}} </option>
											@endforeach>

										</select>
										@if ($errors->has('b_countryCode'))
										<label id="b_countryCode-error" class="error" for="b_countryCode" style="color: red">{{$errors->first('b_countryCode')}}</label>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Branch Manager</label>
										<input name="mangerName" type="text" value="@isset($branch->mangerName){{$branch->mangerName}} @endif" class="form-control" placeholder="School Name">
										@if ($errors->has('mangerName'))
										<label id="mangerName-error" class="error" for="mangerName" style="color: red">{{$errors->first('mangerName')}}</label>
										@endif
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Branch Contact Person</label>
										<input name="b_contactPerson" type="text" value="@isset($branch->b_contactPerson){{$branch->b_contactPerson}} @endisset" class="form-control" placeholder="Branch Contact Person">
										@if ($errors->has('b_contactPerson'))
										<label id="b_contactPerson-error" class="error" for="b_contactPerson" style="color: red">{{$errors->first('b_contactPerson')}}</label>
										@endif
									</div>

								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Branch Email</label>
										<input name="b_emil" type="email" value="@isset($branch->b_emil){{$branch->b_emil}} @endisset" class="form-control" placeholder="Branch email">
										@if ($errors->has('b_emil'))
										<label id="b_emil-error" class="error" for="b_emil" style="color: red">{{$errors->first('b_emil')}}</label>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Branch Cell</label>
										<input name="b_cell" type="text" value="@isset($branch->b_cell){{$branch->b_cell}} @endisset" class="form-control" placeholder="Branch Cell">
										@if ($errors->has('b_cell'))
										<label id="b_cell-error" class="error" for="b_cell" style="color: red">{{$errors->first('b_cell')}}</label>
										@endif
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Rent</label>
										<input name="Rent" min="0"  value="@isset($branch->Rent){{$branch->Rent}} @endisset" class="form-control" placeholder="Rent">
										@if ($errors->has('Rent'))
										<label id="Rent-error" class="error" for="Rent" style="color: red">{{$errors->first('Rent')}}</label>
										@endif
									</div>

								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Utilities</label>
										<input name="utilities" min="0" value="@isset($branch->utilities){{$branch->utilities}} @endif" class="form-control" placeholder="Branch email">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Misc</label>
										<input name="Misc" min="0" value="@isset($branch->Misc){{$branch->Misc}} @endisset" class="form-control" placeholder="Misc">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Student registration</label>
										<input name="b_regFee" min="0"  value="@isset($branch->b_regFee){{$branch->b_regFee}} @endisset" class="form-control" placeholder="salary">
										@if ($errors->has('b_regFee'))
										<label id="b_regFee-error" class="error" for="b_regFee" style="color: red">{{$errors->first('b_regFee')}}</label>
										@endif
									</div>

								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Fine</label>
										<input name="fine" min="0"  value="@isset($branch->userSetting->fine){{$branch->userSetting->fine}}@endisset" class="form-control" placeholder="Fine">
										@if ($errors->has('fine'))
										<label id="fine-error" class="error" for="fine" style="color: red">{{$errors->first('fine')}}</label>
										@endif
									</div>

								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Fee post Carryforward</label>
										<input name="on_round_off" min="0"  value="@isset($branch->userSetting->on_round_off){{$branch->userSetting->on_round_off}}@endisset" class="form-control" placeholder="Fine">
										@if ($errors->has('on_round_off'))
										<label id="on_round_off-error" class="error" for="on_round_off" style="color: red">{{$errors->first('on_round_off')}}</label>
										@endif
									</div>

								</div>
								
							</div>

							

						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<label class="control-label">School Name</label>
								<input name="school_name" type="text" value="@isset($branch->userSetting->school_name){{$branch->userSetting->school_name}}@endisset" class="form-control" placeholder="School Name">

							</div>
							<div class="col-md-4">
								<label class="control-label">Bank Account No</label>
								<input name="account_no" type="text" value="@isset($branch->userSetting->account_no){{$branch->userSetting->account_no}}@endisset" class="form-control" placeholder="000000000000">
							</div>
							<div class="col-md-4">
								
								<label class="control-label">Logo</label>
								<input name="logo" type="file" value="dshjajha" class="form-control" >
								@isset($branch->userSetting->logo)
								<img src="@if($branch->userSetting->logo) {{asset('newSchool/logo/'.$branch->userSetting->logo)}}@else{{asset('images/no-image.png')}} @endif" id="profile-img-tag" height="80" width = "80">
									@endisset

							</div>
							<div class="col-md-4">
								<label class="control-label">Currency</label>
								<input name="currency"  value=" @isset($branch->userSetting->currency){{$branch->userSetting->currency}} @endisset" class="form-control" >

							</div>
							<div class="col-md-4">
								<label class="control-label">Accountant Contact No</label>
								<input name="acctant_no"  value=" @isset($branch->userSetting->acctant_no){{$branch->userSetting->acctant_no}} @endisset" class="form-control" >

							</div>




						</div>

					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="col-md-12 col-sm-12">
									<label class="control-label">Banks</label>
									<select id='banks-selected-options' multiple='multiple' name="banks[]">
										@foreach($banks as $bank) 
										<option  value="{{$bank->id}}"  @if($branch->hasBank($bank->id)) selected @endif>{{$bank->bank_name}}</option>
										@endforeach
									</select>

								</div>

							</div>
							<div class="col-md-6">
								<div class="col-md-12 col-sm-12">
									<label class="control-label">Classes</label>
									<select id='courses-selected-options' multiple='multiple' name="classes[]">
										@foreach($courses as $course)
										<option  value="{{$course->id}}" @if($branch->hasCourse($course)) selected @endif >{{$course->course_name}}</option>
										@endforeach
									</select>

									@if ($errors->has('classes'))
									<label id="classes-error" class="error" for="classes"  style="color: red">{{$errors->first('classes')}}</label>
									@endif

								</div>

							</div>


						</div>
						




						


						
						<div class="form-group @if($errors->has('address')) has-error @endif">
							<label for="address">Address</label>
							<textarea class="form-control" id="address" name="address" rows="4">@isset($branch->userSetting->address){{$branch->userSetting->address}} @endisset</textarea>
							@if ($errors->has('address'))
							<label id="address-error" class="error" for="address">{{$errors->first('address')}}</label>
							@endif
						</div>
						<h4 class="card-title"> Challan Form Setting</h4>

						<div class="form-group row">
								<div class="col-sm-2">
									<div class="checkbox">
								<input type="checkbox" class="checkbox_1" id="securityFee" @if(isset($branch->userSetting->securityFee) && $branch->userSetting->securityFee) checked @endif name="securityFee" value="1"> 		<label for="securityFee"> Security Fee </label>
									</div>
								</div>

								<div class="col-sm-2">
									<div class="checkbox">
									<input type="checkbox" class="checkbox_1" @if(isset($branch->userSetting->deffered) && $branch->userSetting->deffered) checked @endif name="deffered" value="1" id="deffered"> 	<label for="deffered"> Deferred  </label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
										<input type="checkbox" @if(isset($branch->userSetting->examFee) && $branch->userSetting->examFee) checked @endif class="checkbox_1" id="examFee" name="examFee" value="1">  <label for="examFee">Exam </label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
										<input type="checkbox" @if(isset($branch->userSetting->compFee) && $branch->userSetting->compFee) checked @endif class="checkbox_1" id="compFee" name="compFee" value="1"> <label for="compFee">  Computer Utility </label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
										<input type="checkbox" @if(isset($branch->userSetting->uniFee) && $branch->userSetting->uniFee) checked @endif class="checkbox_1" id="uniFee" name="uniFee" value="1"> <label for="uniFee">  Uniform </label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
										<input type="checkbox" @if(isset($branch->userSetting->bookFee) && $branch->userSetting->bookFee) checked @endif class="checkbox_1" id="bookFee" name="bookFee" value="1"> <label for="bookFee">  Books </label>
									</div>
								</div>

								<div class="col-sm-2">
									<div class="checkbox">
										<input type="checkbox" @if(isset($branch->userSetting->StatFee) && $branch->userSetting->StatFee) checked @endif class="checkbox_1" id="StatFee" name="StatFee" value="1"> <label for="StatFee">  Stationay</label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
									<input type="checkbox" @if(isset($branch->userSetting->labFee) && $branch->userSetting->labFee) checked @endif class="checkbox_1" id="labFee" name="labFee" value="1"> 	<label for="labFee"> Lab Fee </label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
										<input type="checkbox" @if(isset($branch->userSetting->transportCharge) && $branch->userSetting->transportCharge) checked @endif class="checkbox_1" id="transportCharge" name="transportCharge" value="1">  <label for="transportCharge"> Transport </label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
										<input type="checkbox" @if(isset($branch->userSetting->acCharge) && $branch->userSetting->acCharge) checked @endif class="checkbox_1" id="acCharge" name="acCharge" value="1"> <label for="acCharge">  Ac Charge </label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
										<input type="checkbox" @if(isset($branch->userSetting->Insurace) && $branch->userSetting->Insurace) checked @endif class="checkbox_1" id="Insurace" name="Insurace" value="1"> <label for="Insurace">  Insurace </label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="checkbox">
										<input type="checkbox" @if(isset($branch->userSetting->summerPack) && $branch->userSetting->summerPack) checked @endif class="checkbox_1" id="summerPack" name="summerPack" value="1"> <label for="summerPack">  Summer Pack </label>
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
		<link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />

		<link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />


		@endpush
		@push('post-scripts')

		<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />

		<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
		<link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
		<script src="{{asset('assets/multi-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/multi-select/jquery.multi-select.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/multi-select/select2.full.min.js')}}" type="text/javascript"></script>

		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

		<script type="text/javascript">
			$("#banks-selected-options").multiSelect();
			$("#courses-selected-options").multiSelect();
		</script>
		<script>
			$('.branch_id').select2();
			var today = new Date();
			$('#posting_date').calendar({
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
							var option = `<option value="${id}">${name} </option>`;
							$("[name='class_id']").append(option);
						});
						$('.class_id').select2();
					}
				});

			}

			$('#account').select2({
				ajax: {
					url: "{{route('get_account')}}",
					method:"post",
					dataType: 'json',
					processResults: function (_data, params) {

						var data1= $.map(_data, function (obj) {
							var newobj = {};
							newobj.id = obj.id;
							newobj.text= `${obj.name} - (${obj.type}) `;
							return newobj;
						});
						return { results:data1};
					}
				}
			});

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