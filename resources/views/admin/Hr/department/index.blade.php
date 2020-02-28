@extends('_layouts.admin.default')
@section('title', 'Department')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col-sm-8">
              <h4 class="page-title">Department Mangement</h4>
            </div>
            <div class="col-sm-4 text-right m-b-30">
              <a href="{{route('department.create')}}" class="btn btn-primary rounded" ><i class="fa fa-plus"></i> Add New </a>
            </div>
          </div>
          <br>

          @component('_components.alerts-default')
          @endcomponent
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="category_table" class="table">
                  <thead>
                    <tr>
                     <tr>
                      <th>#</th>
                      <th>Department Name </th>
                      <!-- <th>Branches</th> -->
                      
                      <th>Status </th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


  @endsection
  @push('post-styles')
  <link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
  <!-- <link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"> -->
  @endpush
  @push('post-scripts')
      <script src="{{asset('assets/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>


<script>

  $('#category_table').DataTable( {
    "processing": true,
    "serverSide": true,

    "pageLength": 30,
    ajax: {

      "url":"<?= route('department.SearchAjax') ?>",
      "dataType":"json",
      "type":"POST"
    },
    columns:[
    {"data":"id","render":function(id){
      return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input type="checkbox" class="checkboxes" value="'+id+'" />  <span></span></label>'; 
    },"searchable":false,"orderable":false},

    {"data":"dep_name"},

    // {"data":"dep_name","render":function(status,type,row){
    //   console.log('branch_name',ImplodeBranchName(row.EmployeeDepartmentBranc));
    //   return row.EmployeeDepartmentBranch?ImplodeBranchName(row.EmployeeDepartmentBranc):'';
    // }},
    
    


    {"data":"status","render":function(status,type,row){
      return status?'<a href="javascript:;" onclick="change_status(this,'+row.id+',0)" class="btn btn-success"> Active </a>':'<a href="javascript:;" onclick="change_status(this,'+row.id+',1)" class="btn btn-danger"> Deactive </a>';
    }},
    {"data":"id","render":function(id){
      var edit_route = '{{ route("department.edit", ":id") }}';
      edit_route = edit_route.replace(':id', id);

      // var delete_route = '{{ route("branch.edit", ":id") }}';
      // delete_route = delete_route.replace(':id', id);
      var buttons = '<a href="'+edit_route+'" class="btn btn-warning">Edit</a>';

      // buttons +='<a href="'+delete_route+'"  data-placement="left" onclick="delete_record(this); return false;"  class="btn btn-danger">Delete</a>';
      return buttons;
    },"searchable":false,"orderable":false}
    ]
  } );



  function change_status(obj,id,status) {
    $.ajax({
      url: "", 
      method:"POST",
      data:{'user_id':id,'status':status},
      success: function(response){
        if(response.status){
          if(status)
            $(obj).replaceWith('<a href="javascript:;" onclick="change_status(this,'+id+',0)" class="btn btn-success"> Active </a>');
          else
            $(obj).replaceWith('<a href="javascript:;" onclick="change_status(this,'+id+',1)" class="btn btn-danger"> Deactive </a>');
          toastr.success(response.message);
        }else{
         toastr.error(response.message);

       }
     }});
  }
  var action_url ;
  var user_id ;
  var row_obj;
  function delete_row(obj,id) {
    action_url = $(obj).attr('data-action');
    user_id = id;
    row_obj = obj;
    $(obj).on('confirmed.bs.confirmation', function () {

      $.ajax({
        url: action_url, 
        method:"DELETE",
        data:{'id':user_id},
        success: function(response){
          if(response.status){
            $(row_obj).parent().parent().remove();
          }
          else{
            console.log(response.message);
          }
        }});
    });
  }    
</script>


<script>
	$(document).ready(function() {
     //Default data table
     $('#default-datatable').DataTable();


     var table = $('#example').DataTable( {
     	"order": [[ 0, "desc" ]],
     	lengthChange: false,
     	buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
     } );

     table.buttons().container()
     .appendTo( '#example_wrapper .col-md-6:eq(0)' );

   } );
	function null_model(){
        // alert("s");
        $("#append_data").text('');
        $("#append_data").html('');
      }

      
      function approveRequest(id){
        console.log('approve Request Id',id);
        $.ajax({
          url: "{{route('correctionRecord')}}", 
          method:"POST",
          data:{'id':id},
          success: function(response){
           console.log('ajax call',response);
           if(response.status){
            $('.stdinfo').val(response.data.student.s_name);
            $('.branch').val(response.data.student.branch.branch_name);
            $('.amount').val(response.data.amount);
            $('.correctinId').val(response.data.id);
            $('.feeId').val(response.data.feeId);
            if(response.data.tbl_correctioncol==12){
              console.log('gg');
              $('#amount').css({"display": "none"});
            }else{
              console.log('display show');
              $('#amount').css({"display": "block"});
            }

          }
          else{
            console.log(response.message);
          }
        }});
      }

    </script>

    @endpush