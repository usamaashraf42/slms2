@extends('_layouts.admin.default')
@section('title', 'Attendance')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col-sm-8">
              <h4 class="page-title">Attendance Mangement</h4>
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
                      <th></th>
                      <th>Student Id </th>
                      <th> Name </th>
                      <th>Class</th>
                      <th>In Time</th>
                      <th>Out Time</th>
                      <th>Hourse (D,H,S)</th>
                      
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

      "url":"<?= route('get_student_attandence') ?>",
      "dataType":"json",
      "type":"POST"
    },
    columns:[
    {"data":"id","render":function(id){
      return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input type="checkbox" class="checkboxes" value="'+id+'" />  <span></span></label>'; 
    },"searchable":false,"orderable":false},

    {"data":"std_id","render":function(status,type,row){
      return row.student?row.student.id:'';

    }},
    {"data":"id","render":function(status,type,row){
      return row.student.s_name?row.student.s_name:'';
    }},
    {"data":"id","render":function(status,type,row){
      return row.student.course_id?row.student.course.course_name:'';
    }},
    {"data":"id","render":function(status,type,row){
      return row.attendance?row.attendance[0].stamp:'';
    }},
    {"data":"id","render":function(status,type,row){
      var att=row.attendance;
      var counter=att.length;
      return counter>1?row.attendance[counter-1].stamp:'';
    }},
    {"data":"id","render":function(status,type,row){
      var att=row.attendance;
      var counter=att.length;
      return row.attendance[0]?duration(row.attendance[0].stamp,row.attendance[counter-1].stamp):'';
    }}
    ]
  } );
function duration(t0, t1){
    let d = (new Date(t1)) - (new Date(t0));
    let weekdays     = Math.floor(d/1000/60/60/24/7);
    let days         = Math.floor(d/1000/60/60/24 - weekdays*7);
    let hours        = Math.floor(d/1000/60/60    - weekdays*7*24            - days*24);
    let minutes      = Math.floor(d/1000/60       - weekdays*7*24*60         - days*24*60         - hours*60);
    let seconds      = Math.floor(d/1000          - weekdays*7*24*60*60      - days*24*60*60      - hours*60*60      - minutes*60);
    let milliseconds = Math.floor(d               - weekdays*7*24*60*60*1000 - days*24*60*60*1000 - hours*60*60*1000 - minutes*60*1000 - seconds*1000);
    let t = {};
    ['weekdays', 'days', 'hours', 'minutes', 'seconds', 'milliseconds'].forEach(q=>{ if (eval(q)>0) { t[q] = eval(q); } });
    console.log(t0,t1,'days',days);
    return `${days}, ${minutes},${seconds}`;
}


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