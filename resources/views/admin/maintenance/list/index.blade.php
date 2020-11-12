@extends('_layouts.admin.default')
@section('title', 'Statement')
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
							<div class="table-responsive">
							<table class="table table_1">
								<thead>
									<tr style="border-top: 1px solid #000!important;border-bottom:1px solid #000!important;">
										<th> Maintaince Proof</th>
										<th> Branch</th>
										<th> Maintenance Assign </th>
										<th> Main Category</th>
										<th> Category</th>
										<th> Posted Date </th>
										<th> Description</th>
										<th> Remarks</th>
										<th> Resolved Proof</th>

										<th> Action</th>
									</tr>
								</thead>


								<tbody>
									@foreach($maintenances as $main)
									<tr>
										<td>@if($main->images)<a class="example-image-link" href="{{asset('images/maintenance/',$main->images)}}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="{{asset('images/maintenance/',$main->images)}}"   height="60" width="60" style="border-radius: 50%!important;" />
										</a>@else
										<a class="example-image-link" href="{{asset('images/maintenance/no-image.png')}}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" /></a>@endif</td>
											<td>@isset($main->branch) {{$main->branch->branch_name}} @endisset</td>
											<td>@isset($main->assignUser) {{$main->assignUser->name}} @endisset</td>
											<td>@isset($main->category->maintain_category) {{$main->category->maintain_category->main_name}} @endisset</td>
											<td>@isset($main->category) {{ $main->category->main_name }} @endisset</td>
											<td>@isset($main->posted_date) {{$main->posted_date}} @endisset</td>
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

								</table>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endsection

			@push('post-scripts')
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
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
						}});
				}
			</script>
			@endpush