@extends('_layouts.admin.default')
@section('title', 'General Voucher')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">General Voucher</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('general-voucher.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}
							<div class="row">
								<div class="col-md-2">
									<label >Voucher No</label><br>
									<input type="name" class="form-control" value="" readonly name="voucher_no" style="background-color:#95d9d9;color: #fff; padding-left: 6px; width: 100px;">

								</div>

								<div class="col-md-2"> 
									<label >Dabit Total</label><br>
									<input type="text" class="form-control debit" id="debit" value="0.00" name="debit" style="background-color:#95d9d9;color: #000; padding-left: 6px; width: 80px;" readonly>
								</div>
								<div class="col-md-2"> 
									<label >Credit Total</label><br>

									<input type="name" id="credit" class="form-control credit" value="0.00" name="credit" style="background-color:#95d9d9;color: #000; padding-left: 6px; width: 80px;" readonly>
								</div>
							</div>
							<br>
							<div class="row">

								<div class="table-responsive" style=";" id='DivIdToPrint'>
									<table class="table table-bordered">
										<thead>
											<tr>
												<th style="padding-right: 130px;">Code</th>
												<th style="padding-right: 90px;"> Db/cr </th>
												<th style="width: 40px;"> Description </th>
												<th> Cheque No.  </th>
												<th> Amount  </th>
												<th> Posting Date  </th>


											</tr>
										</thead>

										<tbody>

											<tr>
												<td> 
													<input  name="code[]" class="js-example-data-ajax form-control"  placeholder="Select Account"  style="width: 200">
												</td>
												<td> 
													<select name="amt_type[]" class="js-example-data-ajax form-control valcheck" >
														<option  value="DB">DB</option>
														<option  value="CR">CR</option>
													</select>  
												</td>
												<td><input type="text" name="descript[]" > </td>
												<td> <input type="text" name="chqno[]" > </td>
												<td> <input type="number" step="any" min="0"   class="amount debit_collect " name="amount[]" value="0.00"></td>
												<td> <input type="datetime" name="posting_date[]" value="{{date('d-m-Y')}}" > </td>
											</tr>
											<tr>
												<td> 
													<input  name="code[]" class="js-example-data-ajax form-control"  placeholder="Select Account"  style="width: 200">
												</td>
												<td> 
													<select name="amt_type[]" class="js-example-data-ajax form-control valcheck" >
														<option  value="DB">DB</option>
														<option  value="CR">CR</option>
													</select>  
												</td>
												<td><input type="text" name="descript[]" > </td>
												<td> <input type="text" name="chqno[]" > </td>
												<td> <input type="text"  class="amount debit_collect " name="amount[]" value="0.00"></td>
												<td> <input type="datetime" name="posting_date[]" value="{{date('d-m-Y')}}" > </td>
											</tr>

											<tr>
												<td> 
													<input  name="code[]" class="js-example-data-ajax form-control"  placeholder="Select Account"  style="width: 200">
												</td>
												<td> 
													<select name="amt_type[]" class="js-example-data-ajax form-control valcheck" >
														<option  value="DB">DB</option>
														<option  value="CR">CR</option>
													</select>  
												</td>
												<td><input type="text" name="descript[]" > </td>
												<td> <input type="text" name="chqno[]" > </td>
												<td> <input type="text"  class="amount debit_collect " name="amount[]" value="0.00"></td>
												<td> <input type="datetime" name="posting_date[]" value="{{date('d-m-Y')}}" > </td>
											</tr>
											<tr>
												<td> 
													<input  name="code[]" class="js-example-data-ajax form-control"  placeholder="Select Account"  style="width: 200">
												</td>
												<td> 
													<select name="amt_type[]" class="js-example-data-ajax form-control valcheck" >
														<option  value="DB">DB</option>
														<option  value="CR">CR</option>
													</select>  
												</td>
												<td><input type="text" name="descript[]" > </td>
												<td> <input type="text" name="chqno[]" > </td>
												<td> <input type="text"  class="amount debit_collect " name="amount[]" value="0.00"></td>
												<td> <input type="datetime" name="posting_date[]" value="{{date('d-m-Y')}}" > </td>
											</tr>
											<tr>
												<td> 
													<input  name="code[]" class="js-example-data-ajax form-control"  placeholder="Select Account"  style="width: 200">
												</td>
												<td> 
													<select name="amt_type[]" class="js-example-data-ajax form-control valcheck" >
														<option  value="DB">DB</option>
														<option  value="CR">CR</option>
													</select>  
												</td>
												<td><input type="text" name="descript[]" > </td>
												<td> <input type="text" name="chqno[]" > </td>
												<td> <input type="text"  class="amount debit_collect " name="amount[]" value="0.00"></td>
												<td> <input type="datetime" name="posting_date[]" value="{{date('d-m-Y')}}" > </td>
											</tr>

										</tbody>

									</table>
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
		<script type="text/javascript">
    var obj_amount;
    var result;
    function open_amount_trans_model(obj1,yup){
      obj_amount = yup;
      $('#myModal').modal('show');
    }

    $('#multipler').keyup(function() {
      recalc();
    });

    $('#vall').keyup(function() {
      recalc();
    });
    function recalc() {
      var multipler = $("#multipler").val();
      var vall = $("#vall").val();
      result = multipler * vall;
      $("#equal_amount").val(result);
            // $(obj_amount).next('input').val(result);
            console.log(result);
            // $("#result").text(result);
          }
          function close_modal(obj) { 
            $(obj_amount).val(result);
            $(obj_amount).next('.inputs').focus();
            var multipler = $("#multipler").val();
            var vall = $("#vall").val();
            $('#myModal').modal('hide')
          }

        </script>
        <script type="text/javascript">
          $(document).ready(function(){
           $(".valcheck").on('change',function(e) {
             var ele = $(e.target).parent().parent().find("td").eq(1).children().val();
	    // console.log($(e.target).parent().parent().find("td").eq(1).children());
		      if(ele == 'DB'){
		       var dbt= $(e.target).parent().parent().find("td").eq(5).children().addClass('debit_collect').removeClass('amount');
		       console.log(dbt);
		     }
		     else{
		       var crt =$(e.target).parent().parent().find("td").eq(5).children().addClass('credit_amount').removeClass('amount');
		       console.log(crt);
		     }
   });
         });
       </script>
       <script type="text/javascript">
        $(document).ready(function(){
          $(".amount").on("keyup",function(e){
            var ele = $(e.target).parent().parent().find("td").eq(1).children().val();
            if(ele=='CR'){
              var data = $("body").find(".credit_amount").map(function() {
                return parseInt($(this).val());
              }).get();
           // console.log(data);return false;
           var total_payable = 0;

           for (var i=0;i<data.length;i++) {
            total_payable +=  data[i];
          }
          console.log(total_payable);
          $("body").find(".credit").val(total_payable);
        }else{

         $(".debit_collect").on("keyup",function(){
          var data = $("body").find(".debit_collect").map(function() {
            return parseInt($(this).val());
          }).get();
          
          var total_debit = 0;

          for (var i=0;i<data.length;i++) {
            total_debit +=  data[i];
          }
          console.log(total_debit);
          $("body").find(".debit").val(total_debit);
        });
       }
     });

        });
      </script>

		@endpush