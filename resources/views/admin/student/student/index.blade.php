@extends('_layouts.admin.default')
@section('title', 'Student')
@section('content')
<style>
.btn-editer{
    background: #001aff;
    color: aliceblue;
}
.ak{
	float: right;
}
</style>
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Student</h4>
					<div class="heading-elements float-right">
                        <a href="{{route('student-registration.create')}}"><button type="button" class="btn btn-success btn-min-width mr-1 mb-1"><i class="la la-plus">&nbsp;Add Student</i></button></a>
                    </div>
                    @component('_components.alerts-default')
						@endcomponent
					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
							<thead>
								<tr>
									<th></th>
									<th>Student Id</th>
									<th>Name</th>
									<th>Branch</th>
									<th>Section</th>
									<th>Mobile No</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@isset($students)
									@foreach($students as $cour)
									<tr>
										<td><input type="checkbox" name="ids[]" value="{{$cour->id}}"></td>
										<td style="max-width: 40px!important;" style="max-width: 40px!important;">@isset($cour->id){{$cour->id}}@endisset</td>
										<td style="max-width: 40px!important;">@isset($cour->s_name){{$cour->s_name.' S/O '.$cour->s_fatherName}}@endisset</td>
										<td style="max-width: 40px!important;">
											@isset($cour->Branchs){{$cour->Branchs->branch_name}}@endisset
										</td>
										<td style="max-width: 40px!important;"> @isset($cour->course){{$cour->course->course_name}}@endisset </td>
										<td style="max-width: 40px!important;"> @isset($cour->s_phoneNo){{$cour->s_phoneNo}}@endisset </td>
										<td style="max-width: 40px!important;"><!-- <a href="{{route('students.edit',$cour->id)}}"  class="btn btn-editer btn-sm">Edit</a> -->
											<a href="{{route('feepost.show',$cour->id)}}"  class="btn btn-editer btn-sm">Fee</a>
											<a href="{{route('studentStatement',$cour->id)}}" class="btn btn-warning btn-sm">Statement</a>
											@if($cour->status)
												<a href="javascript:;" onclick="deleteItem({{$cour->id}})"  class="btn btn-success btn-sm">Active</a> 
											@else 
									<a href="javascript:;" onclick="deleteItem({{$cour->id}})" class="btn btn-warning btn-sm" >Deactive</a> @endif
										</td>
									</tr>
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

<style>
	.sorting_asc{
		max-width: 40px!important;
	}
	.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
     vertical-align: top; 
}
</style>
@endpush
@push('post-scripts')


</script>student_search

  <link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
  <!-- <link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"> -->
 
      <script src="{{asset('assets/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>


<script>

  $('#example').DataTable( {
    "processing": true,
    "serverSide": true,

    "pageLength": 30,
    ajax: {

      "url":"<?= route('student_search') ?>",
      "dataType":"json",
      "type":"POST"
    },
    columns:[
    {"data":"id","render":function(id){
      return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input type="checkbox" class="checkboxes" value="'+id+'" />  <span></span></label>'; 
    },"searchable":false,"orderable":false},

    {"data":"id"},
    {"data":"s_name","render":function(status,type,row){
      console.log(row);
      return row.s_name?row.s_name+' '+row.s_fatherName?row.s_fatherName:'':'';

    }},
    {"data":"Branchs","render":function(status,type,row){
      console.log(row);
      return row.Branchs?row.Branchs->branch_name:'';

    }},
    {"data":"b_cell","render":function(status,type,row){
      console.log(row);
      return row.b_cell?row.b_cell:'';

    }},
  
    {"data":"Rent","render":function(status,type,row){
      console.log(row);
      return row.Rent?row.Rent:'';

    }},
    {"data":"utilities","render":function(status,type,row){
      console.log(row);
      return row.utilities?row.utilities:'';

    }},
    {"data":"Misc","render":function(status,type,row){
      console.log(row);
      return row.Misc?row.Misc:'';

    }},


    {"data":"status","render":function(status,type,row){
      return status?'<a href="javascript:;" onclick="change_status(this,'+row.id+',0)" class="btn btn-success"> Active </a>':'<a href="javascript:;" onclick="change_status(this,'+row.id+',1)" class="btn btn-danger"> Deactive </a>';
    }},
    {"data":"id","render":function(id){
      var edit_route = '{{ route("branch.edit", ":id") }}';
      edit_route = edit_route.replace(':id', id);

      // var delete_route = '{{ route("branch.edit", ":id") }}';
      // delete_route = delete_route.replace(':id', id);
      var buttons = '<a href="'+edit_route+'" class="btn btn-warning">Edit</a>';

      // buttons +='<a href="'+delete_route+'"  data-placement="left" onclick="delete_record(this); return false;"  class="btn btn-danger">Delete</a>';
      return buttons;
    },"searchable":false,"orderable":false}
    ]
  } );
</script>
@endpush