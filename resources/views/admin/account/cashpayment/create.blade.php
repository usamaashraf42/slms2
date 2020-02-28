@extends('_layouts.admin.default')
@section('title', 'Cash Payment')
@section('content')

@php($banks=\App\Models\Bank::get())
@php($category=\App\Models\AccountCategory::get())
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Cash Payment</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('cash-payment.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}

							<div class="row">
								<div class="col-md-6">

									<div  style="float: right; clear: both;"> <button type="button" class="btn btn-success btn-min-width mr-1 mb-1" data-toggle="modal"
										data-target="#add_shed"><i class="la la-plus">&nbsp;Add Payee</i></button></div>
										<div class="clearfix"></div>
										<div class="form-group" style="margin-top: -20px;">
											<label for="account">Select Account</label>
											<select type="text" class="category" value="{{old('from')}}" name="account_id" id="account" placeholder="cat_id" style="width: 100%;height: 40px;">
												<option disabled="disabled" selected>Choose the Account</option>
											</select>

										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group @if($errors->has('cash_type')) has-error @endif"">
											<label for="cus_cat_name">Cash type</label>
											<select class="form-control cash_type" value="{{old('cash_type')}}" onchange="bank_div(this)" name="cash_type" id="cash_type" placeholder="Name">
												<option>Choose Cash Type</option>
												<option value="Checque">Checque</option>
												<option value="Cash">Hard Cash</option>
												<option value="Demand">Demand Draft</option>

											</select>
											@if ($errors->has('cash_type'))
											<label id="cash_type-error" class="error" for="cash_type">{{$errors->first('cash_type')}}</label>
											@endif
										</div>
									</div>
								</div>
								<div class="row" id="bank" style="display: none;">
									<div class="col-md-4">
										<label for="bank">Bank Name</label>
										<select type="text" step="any" min="0" class="form-control bank" onchange="getChecque(this)" value="{{old('bank')}}" name="bank" id="bank" placeholder="">
											<option selected="true" disabled="disabled">Choose Bank</option>
											@foreach($banks as $bank)
											<option value="{{$bank->id}}">{{$bank->bank_name}}</option>
											@endforeach

										</select>
									</div>
									<div class="col-md-4">
										<label for="cheque">Checque No</label>
										<select type="text" step="any" min="0" class="form-control cheque" value="{{old('cheque')}}" name="cheque" id="cheque" placeholder="">
										</select>
									</div>
									<div class="col-md-4">
										<label for="bank">Cheque Date</label>
										<input type="text" readonly class="form-control cheque_date" value="{{old('cheque_date')}}" name="cheque_date" id="cheque_date" placeholder="">
									</div>
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
											<div class="ui calendar"  style="width: 100%">
												<div class="ui input" style="width: -webkit-fill-available!important;">
													<input type="text"  class="form-control posting_date" value="{{old('posting_date')}}" name="posting_date" id="posting_date" autocomplete="off" readonly  placeholder="posting_date">
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


			{{-- //////////////////////  Add Model ..................... --}}
			<div class="modal fade text-left" id="add_shed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-success">
						<h3 class="modal-title" id="myModalLabel35"> Add New section</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="{{ route('account.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}

							<div class="col-md-12">
								<div class="form-group">
									<label for="exampleInputPassword1">Account Name</label>
									<input type="text" class="form-control category" value="{{old('name')}}" name="name" id="name" placeholder="Account Name">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group @if($errors->has('cat_id')) has-error @endif"">
										<label for="cat_id">Account Category</label>
										<select  class="form-control " value="{{old('cat_id')}}" name="cat_id" id="cat_id"  placeholder="">
											<option disabled="disabled" selected="selected">Choose the Category</option>
											@foreach($category as $cat)
											<option value="{{$cat->id}}" @if($cat->id==old('cat_id')) selected @endif>{{$cat->name}}</option>
											@endforeach

										</select>
										@if ($errors->has('cat_id'))
										<label id="cat_id-error" class="error" for="cat_id">{{$errors->first('cat_id')}}</label>
										@endif
									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group @if($errors->has('code')) has-error @endif ">
										<label for="cus_cat_name">Code</label>
										<div class="ui calendar" id="code" style="width: 100%">
											<div class="ui input" style="width: -webkit-fill-available!important;">
												<input type="number"  class="form-control" value="{{old('code')}}" name="code" id="code" autocomplete="off"  placeholder="code">
											</div>
										</div>
										@if ($errors->has('code'))
										<label id="code-error" class="error" for="code">{{$errors->first('code')}}</label>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group @if($errors->has('type')) has-error @endif"">
										<label for="type">Account Type</label>
										<select  class="form-control " value="{{old('type')}}" name="type" id="type"  placeholder="">
											<option disabled="disabled" selected="selected">Choose the Type</option>
											<option value="bank">Bank</option>
											<option value="student">Student</option>
											<option value="branch">Branch</option>
											<option value="employee">Employee</option>

											<option value="pretty">Pretty</option>
											<option value="expense">Expense</option>
											

										</select>
										@if ($errors->has('type'))
										<label id="type-error" class="error" for="type">{{$errors->first('type')}}</label>
										@endif
									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group @if($errors->has('opening_balance')) has-error @endif ">
										<label for="cus_cat_name">Opening Balance</label>
										<div class="ui calendar" id="opening_balance" style="width: 100%">
											<div class="ui input" style="width: -webkit-fill-available!important;">
												<input type="number" step="any" value="0"  class="form-control" value="{{old('opening_balance')}}" name="opening_balance" id="opening_balance" autocomplete="off"  placeholder="opening_balance">
											</div>
										</div>
										@if ($errors->has('opening_balance'))
										<label id="opening_balance-error" class="error" for="opening_balance">{{$errors->first('opening_balance')}}</label>
										@endif
									</div>

								</div>
								<!-- <div class="col-md-6">


									<div class="form-group @if($errors->has('code')) has-error @endif ">
										<label for="cus_cat_name">Code</label>
										<div class="ui calendar" id="code" style="width: 100%">
											<div class="ui input" style="width: -webkit-fill-available!important;">
												<input type="text"  class="form-control" value="{{old('code')}}" name="code" id="code" autocomplete="off"  placeholder="code">
											</div>
										</div>
										@if ($errors->has('code'))
										<label id="code-error" class="error" for="code">{{$errors->first('code')}}</label>
										@endif
									</div>

									

								</div> -->
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
			{{-- //////////////////////////// Add Model End.............................. --}}

			@endsection

			@push('post-styles')



			@endpush
			@push('post-scripts')


			<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


			<script>
				function bank_div(obj){
					var banks_d=$(obj).val();
					if(banks_d=='Checque')
						$('#bank').show();
					else
						$("#bank").hide();

					if(banks_d=='Advance'){
						$("#bank").css("display", "none");
						$("#add_invoice").css("display", "none");
						$("#add_button").css("display", "none");
					}
				}



				function getChecque(obj){
					$("[name='cheque']").html(` <option selected="selected" disabled='disabled'> All Checque  </option>`);
					var bank  = $(".bank").val();
					console.log('branch',$("[name='bank']").val());
					$('.branch').val(bank);
					$.ajax({
						method:"POST",
						url:"{{route('bankHasChecque')}}",
						data : {bank_id:bank},
						dataType:"json",
						success:function(res){
							if(res.status){
								res.data.forEach(function(val,ind){
									var id = val.id;
									var name = val.checque_no;
									var option = `<option value="${id}">${name} </option>`;
									$("[name='cheque']").append(option);
								});
							}

							$('.cheque').select2();
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
			<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-font.css')}}" />
			<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker.css')}}" />

			<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-ios.css')}}" />
			<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-android.css')}}" />
			<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-windows.css')}}" /> 

			<!-- <script type="text/javascript" src="{{asset('js/datepickerScroll/vendors/jquery-1.11.1.min.js')}}"></script> -->
			<script type="text/javascript" src="{{asset('js/datepickerScroll/src/anypicker.js')}}"></script>

			<script type="text/javascript">

				$("#cheque_date").AnyPicker({
					mode: "datetime",
					dateTimeFormat: " dd-MMM-yyyy",
				});
				$("#posting_date").AnyPicker({
					mode: "datetime",
					dateTimeFormat: " dd-MMM-yyyy",
				});


			</script>
			@endpush