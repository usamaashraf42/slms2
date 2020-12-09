@extends('_layouts.admin.default')
@section('title', 'Maintenance List')
@section('content')
<div class="content container-fluid" style="background-color: #fff;">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<style type="text/css">
				.table_1 th ,.table_1 td{
					border: 1px solid #000!important;
					text-align: center!important;
					font-size: 12px!important;
					color: #000!important;
				}
				.table_1 tr{
					border-top: 1px solid #000!important;
					border-bottom: 1px solid #000!important;
				}
				.page[size="A4"][layout="landscape"] {
					width: 29.7cm;
					height: 21cm;
				}
				th{
					padding: 2px!important;
					text-transform:
				}
				.nav_bva{
					text-align: center;
					font-size: 20px;
					font-weight: bold;
				}
				.nav_bva1{
					text-align: left;
					font-size: 18px;
					width: 50%;
				}
				.total_navaq{
					width: 48%;
					display: inline-block;
				}
				.table_1 td{
					padding: 2px!important;
					font-size: 12px!important;
					color: #000!important;
				}

				@page { size: auto;  margin: 5mm!important;}
			</style>

			<div class="col-md-12">

				<button style="font-size:36px;color:#000d82;" onclick="printDivs(this,printAllRecord);"> <i class="fa fa-print"></i><br><input type='button' id='btn' value='Print'  class="btn btn-primary float-center allrecord"></button>
			</div>

			<br><br>
			<section id="printAllRecord">
				<div class="DivIdToPrint">
					<div  id="DivIdToPrint">
						<div  style="float: right;">
							<div style="float: right;">Printed On:{{date('d-M-Y')}}</div>
						</div>
						<div class="" style="margin-top: 25px; text-align: center;">
							<div class="logo_heading" style="width: 40%; margin: 0 auto;">
								<img src="{{asset('images/school/alis pvt ltd.png')}}">
							</div>
						</div>
						<div  style="margin-top: 40px;">
							<div class="container">
								<div class="nav_bva">
									Maintenance List
								</div>
								<br>

							</div>
							<form method="POST" action="{{route('list.store')}}">
								@csrf
								<div class="row">
									<div class="col-md-2">
										<label>Type</label>
										<select  class="form-control type_id" id="type_id"  name="type_id"  placeholder="type_id" style="height: 40px; width: 100%;">

											<option value="1">Waiting for Maintenance</option>
											<option value="0">Maintenance Done</option>
											<option value="2">Maintenance Done Approval</option>
											<option value="5">Waiting for Approval</option>

										</select>
									</div>

									<div class="col-md-2">
										<label>Branch</label>
										<select  class="form-control branch_id" id="branch_id"  name="branch_id"  placeholder="branch_id" style="height: 40px; width: 100%;">

											<option selected="selected" disabled="disabled">Select Branch</option>
											@if(!empty($branches))
											@foreach($branches as $branch)
											<option value={{$branch->id}} >{{$branch->branch_name}}</option>
											@endforeach
											@endif
										</select>
									</div>

									<div class="col-md-2">
										<label>Category</label>
										<select  class="form-control cat_id" id="cat_id"  name="cat_id"  placeholder="cat_id" style="height: 40px; width: 100%;">

											<option selected="selected" disabled="disabled">Select Category</option>
											@if(!empty($categories))
											@foreach($categories as $data)
											<option value={{$data->id}} >{{$data->main_name}}</option>
											@endforeach
											@endif
										</select>
									</div>

									<div class="col-md-2">
										<label>Assign To</label>
										<select  class="form-control emp_id" id="emp_id"  name="emp_id"  placeholder="emp_id" style="height: 40px; width: 100%;">

											<option selected="selected" disabled="disabled">Select Employee</option>
											@if(!empty($employees))
											@foreach($employees as $data)
											<option value={{$data->id}} >{{$data->name}}</option>
											@endforeach
											@endif
										</select>
									</div>
									<div class="col-md-3">
										<label>&nbsp;&nbsp;&nbsp;</label>
										<button type="submit" class="btn btn-md btn-success" style="margin-top: 25px;">Print</button>
									</form>
									<button  class="btn btn-md btn-info" style="margin-top: 25px;max-width: 65px;">Excel</button>
								</div>


							</div>
							<br><br>

							<div class="table-responsive">
								<table class="table table_1 table-bordered" id="maintenanceList">
									<thead>
										<tr style="border-top: 1px solid #000!important;border-bottom:1px solid #000!important;">
											<th> Maintaince Proof</th>
											<th> Branch</th>
											<th> Maintenance Assign </th>
											<th> Main Category</th>
											<th> Category</th>
											<th> Posted Date </th>
											<th> Resolve time </th>
											<th> Description</th>
											<th> Remarks</th>
											<th> Resolved Proof</th>
											<th> Action</th>
										</tr>
									</thead>
								</table>
							<!-- <table class="table table_1">
								<thead>
									<tr style="border-top: 1px solid #000!important;border-bottom:1px solid #000!important;">
										<th> Maintaince Proof</th>
										<th> Branch</th>
										<th> Maintenance Assign </th>
										<th> Main Category</th>
										<th> Category</th>
										<th> Posted Date </th>
										<th> Resolve time </th>
										<th> Description</th>
										<th> Remarks</th>
										<th> Resolved Proof</th>

										<th> Action</th>
									</tr>
								</thead>


								<tbody>
									@foreach($maintenances as $main)
									<tr>
										<td>@if($main->images)
											<img class="example-image" src="{{$main->images}}"  alt="" height="60" width="60" style="border-radius: 50%!important;" />

											@else
										<a class="example-image-link" href="{{asset('images/maintenance/no-image.png')}}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" /></a>@endif</td>
											<td>@isset($main->branch) {{$main->branch->branch_name}} @endisset</td>
											<td>@isset($main->assignUser) {{$main->assignUser->name}} @endisset</td>
											<td>@isset($main->category) {{$main->category->main_name}} @endisset</td>
											<td>@isset($main->subcategory) {{ $main->subcategory->main_name }} @endisset</td>
											<td>@isset($main->posted_date) {{$main->posted_date}} @endisset</td>
											<td>
												@if(isset($main->category->maintain_category)) 													{{$main->category->maintain_category->avg_time}}
												@else
													@isset($main->category) {{ $main->category->avg_time }} @endisset
												@endif
											</td>


											<td>@isset($main->description) {{$main->description}} @endisset</td>
											<td><textarea name="remarks" class="form-control" placeholder="Remarks"></textarea></td>
											<td><input type="file" name="resolved_proof"></td>

											<td>
												<button data-ids="{{$main->id}}" onclick="resolved(this)" class="btn-sm btn-success">Resolved</button>

												<button data-ids="{{$main->id}}" onclick="referToHigher(this)" class="btn-sm btn-warning">Refer to Higher</button>
											</td>
										</tr>
										@endforeach
									</tbody>

								</table> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endsection

		@push('post-scripts')
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>

<script src="{{asset('assets/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">

		<script type="text/javascript">
			function printDivs(eve,obj)
			{
				$("#"+$(obj).attr('id')).print();
			}

			function referToHigher(ids){
				console.log('ids',$(ids).attr('data-ids'),ids);

				var idd=$(ids).attr('data-ids');
				$.ajax({
					url: "{{route('maintenanceTransferToHigherLevel')}}",
					method:"POST",
					data:{id:idd},
					success: function(response){

						console.log('ajax call',response);
						if(response.status){
							if(response.status==1){
								$(ids).parent().parent('tr').remove();
								maintaince_new();
								maintaince_approval();
								maintaince_resolved();
								toastr.success('Record Update Successfully');
							}else{
								$(ids).parent().parent('tr').remove();
								maintaince_new();
								maintaince_approval();
								maintaince_resolved();
								toastr.warning('Failed to update');
							}

						}
						else{
							toastr.danger('Record not update');

						}
					}
				});
			}
			function resolved(ids){
				console.log('ids',$(ids).attr('data-ids'),ids);

				var idd=$(ids).attr('data-ids');
				$.ajax({
					url: "{{route('maintainceResolved')}}",
					method:"POST",
					data:{id:idd},
					success: function(response){

						console.log('ajax call',response);
						if(response.status){
							if(response.status==1){
								$(ids).parent().parent('tr').remove();
								// maintenanceList();

								toastr.success('Record Update Successfully');
							}else{
								$(ids).parent().parent('tr').remove();
								// maintenanceList();

								toastr.warning('Failed to update');
							}

						}
						else{
							toastr.danger('Record not update');

						}
					}});
			}
			maintenanceList();
			 $("[name=cat_id]").add('[name=type_id]').add('[name=emp_id]').add('[name=branch_id]').on('on change',function() {
			 	maintenanceList();
			 });
			function maintenanceList(){
				$('#maintenanceList').DataTable().clear().destroy();
				var table = $('#maintenanceList').DataTable();

				table.destroy();
				var cat_id=$("[name=cat_id]").val();
				var branch_id=$("[name=branch_id]").val();
				var type_id=$("[name=type_id]").val();
				var emp_id=$("[name=emp_id]").val();

				console.log('cat_id',cat_id,'branch_id',branch_id,'type_id',type_id,'emp_id',emp_id);
				$('#maintenanceList').DataTable( {
					"processing": true,
					"serverSide": true,

					"pageLength": 30,
					ajax: {

						"url":"<?= route('maintenance-list') ?>",
						"dataType":"json",
					    "data":{cat_id:cat_id,branch_id:branch_id,type_id:type_id,emp_id:emp_id},
					    "type":"POST"
					},
					columns:[

					{"data":"images","render":function(status,type,row){

						return row.images?`<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/${row.images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/${row.images}"  alt="${row.category?row.category?row.category.main_name:'':''}" height="60" width="60" style="border-radius: 50%!important;" />
						</a>`:
						`<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/no-image.png" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" />`;

					}},

					{"data":"branch_id","render":function(status,type,row){

						return row.branch?row.branch.branch_name:'';

					}},
					{"data":"user_id","render":function(status,type,row){

						return row.assign_user?row.assign_user.name:'';

					}},
					{"data":"main_id","render":function(status,type,row){

						return row.category?row.category.main_name:'';

					}},
					{"data":"main_id","render":function(status,type,row){

						return row.subcategory?row.subcategory.main_name:'';
					}},

					{"data":"posted_date","render":function(status,type,row){

						return row.posted_date?row.posted_date:'';

					}},

					{"data":"posted_date","render":function(status,type,row){

						return row.posted_date?row.posted_date:'';

					}},

					{"data":"description","render":function(status,type,row){

						return row.description?row.description:'';

					}},
					{"data":"remarks","render":function(status,type,row){

						return `<textarea name="remarks" class="form-control" placeholder="Remarks"></textarea>`;

					}},
					{"data":"remarks","render":function(status,type,row){

						return `<input type="file" name="resolved_proof">`;

					}},



					{"data":"type","render":function(status,type,row){

						var buttons = `<button data-ids="${row.id}" onclick="resolved(this)" class="btn-sm btn-success">Resolved</button>
						<button data-ids="${row.id}" onclick="referToHigher(this)" class="btn-sm btn-warning">Refer to Higher</button>`;

						return buttons;
					},"searchable":false,"orderable":false}



					]
				} );
			}
		</script>
		@endpush
