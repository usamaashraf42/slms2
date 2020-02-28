@extends('_layouts.admin.default')
@section('title', 'Account Statement')
@section('content')

@php($banks=\App\Models\Bank::get())
@php($category=\App\Models\AccountCategory::get())
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Account Statement</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('account-statement.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}

							<div class="row">
								<div class="col-md-6">

										<div class="form-group" >
											<label for="account">Select Checque</label>
											<select type="text" class="checque_id" value="{{old('checque_id')}}" onchange="checqueDetail(this)" name="checque_id" id="checque_id" placeholder="checque_id" style="width: 100%;height: 40px;">
												<option disabled="disabled" selected>Choose the Checque</option>
											</select>

										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group @if($errors->has('cash_type')) has-error @endif"">
											<label for="cus_cat_name">Account </label>
											<input class="form-control account_id" value="{{old('account_id')}}"  name="account_id" id="account_id" placeholder="Name">
									

											@if ($errors->has('account_id'))
											<label id="account_id-error" class="error" for="account_id">{{$errors->first('account_id')}}</label>
											@endif
										</div>
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

				$('#checque_id').select2({
					ajax: {
						url: "{{route('get_issue_checque')}}",
						method:"post",
						dataType: 'json',
						processResults: function (_data, params) {

							var data1= $.map(_data, function (obj) {
								var newobj = {};
								newobj.id = obj.checque_no;
								newobj.text= `${obj.checque_no} `;
								return newobj;
							});
							return { results:data1};
						}
					}
				});

				function checqueDetail(obj){


					var checque_id=$("[name='checque_id']").val();

						$.ajax({
							method:"POST",
							url:"{{route('checqueDetail')}}",
							data : {checque_id:checque_id},
							dataType:"json",
							success:function(res){
								console.log('response',res);
								if(res.status){
									console.log('checque detail',res.data.detail.amount);
									// res.data.detail?
									if(res.data.detail){
										$('#amount').val(res.data.detail.amount);
										$('#account_id').val(res.data.detail.issue_account.name);
										$('#posting_date').val(res.data.detail.posting_date);
										$('#description').val(res.data.detail.description);
									}
									


								}
							}
						});
					

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