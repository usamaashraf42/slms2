@extends('_layouts.admin.default')
@section('title', 'Employees')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="col-md-12">
					<input type='button' id='btn' value='Print' onclick="printDivs(this,printAllRecord)" 
					class="btn btn-primary float-center allrecord" style="width: 100%;">
					<input type='button' id='btn' value='Excel' onclick="exportF(this)" 
					class="btn btn-primary float-center allrecord" style="width: 100%;">

					
				</div>
				<div id="printAllRecord" >
					<style>
						.table_1 th{
							padding: 1px;
							margin: 0.2px;
							border: 1px solid #000;
						}
						.table-bordered td, .table-bordered th {
							border: 1px solid #000000;
							font-size: 12px!important;
						}
						.table_1 th{
							padding: 3px;
							margin: 0.2px;
							border: 1px solid #000;
						}
						td,th{
							border: 1px solid #000;
							padding: 3px;
						}
					</style>
					<div class="card-block">
						<h4 class="card-title">Employees </h4>
						@component('_components.alerts-default')
						@endcomponent

						<table id="example" class="table_1 border table-bordered ">
							<thead>
								<tr >
									<th></th>
									<th>E Id</th>
									<th>Name</th>
									<th>Branch</th>

								</tr>
							</thead>
							<tbody>
								@php($counter=0)
								@isset($employees)
								@php($class=0)
								@foreach($employees as $pro)



								@php($classId=$pro->branch_id)
								@if($classId!=$class)
								<tr> 
									<td colspan="5"><strong>@if(isset($pro->branch->branch_name)){{$pro->branch->branch_name}} @endif </strong></td> 
								</tr> 
								@endif


								<tr>
									<td>{{++$counter}}</td>
									<td>@isset($pro){{$pro->emp_id}}@endisset</td>
									<td>@isset($pro){{$pro->name.' '.$pro->fname}}@endisset</td>
									<td style="width: 100px;">@isset($pro->branch->branch_name){{$pro->branch->branch_name}}@endisset</td>


								</tr>


								@php($class=$pro->branch_id)
								@endforeach
								@endisset
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@push('post-styles')

@endpush
@push('post-scripts')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
<script>
	function printDivs(eve,obj)
	{


		$("#printAllRecord").print();


	}

	function null_model(){
        // alert("s");
        $("#append_data").text('');
        $("#append_data").html('');
    }


    function exportF(elem) {
    	console.log('elem'elem);
  var table = document.getElementById("example");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}


</script>

@endpush