@extends('_layouts.admin.default')
@section('title', 'Bank Payment')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Bank Payment</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('bank-payment.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}

						
								<div class="form-group">


									<label for="exampleInputPassword1">Select Account</label>
									     <select type="text" class="category" value="{{old('from')}}" name="account_id" id="account" placeholder="cat_id" style="width: 100%;min-height: 40px;">
			                              <option disabled="disabled" selected>Choose the Account</option>
			                      		</select>
									
								</div>
						
							<div class="row">
								<div class="col-md-6">
									<div class="form-group @if($errors->has('amount')) has-error @endif"">
										<label for="amount">Amount</label>
										<input type="number" step="any" min="0" class="form-control total_amount" value="{{old('amount')}}" name="amount" id="amount"  placeholder="">
										@if ($errors->has('amount'))
										<label id="amount-error" class="error" for="amount">{{$errors->first('amount')}}</label>
										@endif
									</div>

								</div>
								<div class="col-md-6">


									<div class="form-group @if($errors->has('posting_date')) has-error @endif ">
										<label for="cus_cat_name">Date</label>
										<div class="ui calendar" id="posting_date" style="width: 100%">
											<div class="ui input" style="width: -webkit-fill-available!important;">
												<input type="text"  class="form-control" value="{{old('posting_date')}}" name="posting_date" id="posting_date" autocomplete="off"  placeholder="posting_date">
											</div>
										</div>
										@if ($errors->has('posting_date'))
										<label id="posting_date-error" class="error" for="posting_date">{{$errors->first('posting_date')}}</label>
										@endif
									</div>

									

								</div>
							</div>




							<div class="form-group @if($errors->has('description')) has-error @endif">
								<label for="description">Description</label>
								<textarea class="form-control" id="description" name="description" rows="4">{{old('description')}}</textarea>
								@if ($errors->has('description'))
								<label id="description-error" class="error" for="description">{{$errors->first('description')}}</label>
								@endif
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