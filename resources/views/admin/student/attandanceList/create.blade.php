@extends('_layouts.admin.default')
@section('title', 'Attendance List')
@section('content')
<style>
		@media print{@page {size: landscape}}
	.checkbox_1{
		position: relative;
	}
	.table-bordered td, .table-bordered th {
    border: 1px solid #000000;

}
.table td, .table th {
      padding: .01rem;
    font-size: 10px;
      padding-left: 5px;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
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
#btn{
	    width: 160px;
    background: #00619a;
    float: right;
    font-size: 22px;
}
	@page { width: 100%; size: auto;  margin: 0mm;
	size: landscape;}
</style>
<link media="print" href="print.css" />
<style>
		@page { width: 100%; size: auto;  margin: 0mm;
	size: landscape;}
@media print {
  .page_1 {
    margin: 0;
    color: #000;
    background-color: #fff;
  }
}
</style>
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Attendance List</h4>		
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{route('attendance-list.store')}}" enctype = "multipart/form-data" id="upload_new_form">
						{{ csrf_field() }}

						<div class="row">
							<div class="col-md-6">
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

								</select>

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="select2">Select Class</label>
								<select type="text" class="form-control class_id" id="class_id"  name="class_id" onchange="sectionSelect(this)"  placeholder="Name">
									<option selected="selected" disabled="disabled">Seclect Class</option>
									@if(!empty($level))
									@foreach($level as $branch)
									<option value={{$branch['grade_code']}} @if($branch['grade_code']==old('class_id')){{'checked'}} @endif>{{$branch['grade_name']}}</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>
				
					</div>
					<div class="form-group row">
						<div class="card" style="width:100%">
							<div class="card-block">
								<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
									<button class="btn btn-primary ks-rounded"> Attendance List </button>
								</div>

							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div style="display: none;">
	<div class="col-md-12">
		<input type='button' id='btn' value='Print' onclick="printDivs(this,printAllRecord);" 
		class="btn btn-primary float-center allrecord" style="width: 100%;">
	</div>

	<div id="printAllRecord" class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 60px;">
	<div class="content container-fluid">
	<div class="row" style="margin-top: 5px;text-align: right;">
	<div class="logo_heading" style="margin: 0 auto; width: 40%;">
	<img src="{{asset('images/school/alis pvt ltd.png')}}">
	<p style="text-align: right;">Attendace Sheet of Township For Aug-19</p>
    </div>
	</div>
	<div class="row">
			<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
				<div class="row p-5">
					<div style="width: 53%; float: left;">
						<table class="table table-bordered" style="margin-top: -35px;">
							<thead>
								<tr>
									<th class="text-uppercase small font-weight-bold">Date</th>
									<th class="text-uppercase small font-weight-bold">No of students</th>
									<th class="text-uppercase small font-weight-bold">sig</th>
									<th class="text-uppercase small font-weight-bold" style="width: 140px;"></th>
								</tr>
								<tr>
									<td>1</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>2</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>3</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>4</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>5</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>6</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>1</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>7</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>8</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>9</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>10</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>11</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>12</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>13</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>14</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>15</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>16</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>17</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>18</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>19</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>20</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>21</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>22</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
									<tr>
									<td>23</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>24</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>23</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>25</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>26</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>27</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>28</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>29</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>30</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>31</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</thead>
					
						</table>
					</div>
					<div style="width:45%;">
						<p style="padding-left: 30px;">Total students <strong>received</strong> fee vouchers<hr style="width: 120px;margin-top: -18px; height: 2px solid #000;float: right;"></p><br>
						<p style="padding-left: 30px;">Total students <strong>not received</strong> fee vouchers <hr style="width: 120px;margin-top: -18px; height: 2px solid #000; float: right;"> </p>
					</div>
				</div>
			</div>
		</div>		
	</div>

		<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="border-0 text-uppercase small font-weight-bold" style="width: 130px;">
								{{date('M-y')}}<br><p class="baranchName"></p><br><p class="courseName"></p></th>
								<th class=" small font-weight-bold">Voucher<br>Deliver</th>
								<th class="text-uppercase small font-weight-bold">1</th>
								<th class="text-uppercase small font-weight-bold">2</th>
								<th class="text-uppercase small font-weight-bold">3</th>
								<th class="text-uppercase small font-weight-bold">4</th>   
								<th class="text-uppercase small font-weight-bold">5</th> 
								<th class="text-uppercase small font-weight-bold">6</th>   
								<th class="text-uppercase small font-weight-bold">7</th>  
								<th class="text-uppercase small font-weight-bold">8</th>
								<th class="text-uppercase small font-weight-bold">9</th>
								<th class="text-uppercase small font-weight-bold">10</th>
								<th class="text-uppercase small font-weight-bold">11</th>
								<th class="text-uppercase small font-weight-bold">12</th>
								<th class="text-uppercase small font-weight-bold">13</th>
								<th class="text-uppercase small font-weight-bold">14</th>   
								<th class="text-uppercase small font-weight-bold">15</th> 
								<th class="text-uppercase small font-weight-bold">16</th>   
								<th class="text-uppercase small font-weight-bold">17</th>  
								<th class="text-uppercase small font-weight-bold">18</th>
								<th class="text-uppercase small font-weight-bold">19</th>
								<th class="text-uppercase small font-weight-bold">20</th>
								<th class="text-uppercase small font-weight-bold">21</th>
								<th class="text-uppercase small font-weight-bold">22</th>
								<th class="text-uppercase small font-weight-bold">23</th>   
								<th class="text-uppercase small font-weight-bold">24</th> 
								<th class="text-uppercase small font-weight-bold">25</th>   
								<th class="text-uppercase small font-weight-bold">26</th>  
								<th class="text-uppercase small font-weight-bold">27</th>
								<th class="text-uppercase small font-weight-bold">28</th>
								<th class="text-uppercase small font-weight-bold">29</th>
								<th class="text-uppercase small font-weight-bold">30</th>
								<th class="text-uppercase small font-weight-bold">31</th>
							</tr>
						</thead>
						<tbody id="dataTable">
						</tbody>
					</table>
				</div>
			<div style="width: 70%;">
				<div style="width:45%;margin-top: 20px;">
					<p style="padding-left: 30px;">Total students <strong>received</strong> fee vouchers<hr style="width: 120px;margin-top: -18px; height: 2px solid #000;float: right;"></p>
				</div>
				<div style="width:50%; float: right;margin-top: -28px;">
					<p style="padding-left: 30px;">Total students <strong>not received</strong> fee vouchers <hr style="width: 120px;margin-top: -18px; height: 2px solid #000; float: right;"> </p>
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
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
	<script>
		$('.branch_id').select2();
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
			$('#dataTable').html(``)
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
							console.log('hee');
							dataContent+=`<tr>
							<td style="border-bottom: 1px solid!important;min-width: 250px;"> ${val.id} ${val.s_name}</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							</tr>
							`;
						});
						console.log('dataContent',dataContent);
						var className=$( "#class_id option:selected" ).text();
						var baranchName=$( "#branch_id option:selected" ).text();

						console.log('className',className,'baranchName',baranchName);
						$('.baranchName').append(baranchName);
						$('.courseName').append(className);
						$('#dataTable').append(dataContent);
						printDivs(this,printAllRecord)
					}
				});
			}

			// printDivs('this',printAllRecord);

		}
		function printDivs(eve,obj)
		{


			$("#printAllRecord").print();


		}
	</script>

	@endpush