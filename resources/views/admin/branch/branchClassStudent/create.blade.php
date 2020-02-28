@extends('_layouts.admin.default')
@section('title', 'Branch Class Students')
@section('content')
<div class="content container-fluid">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <div class="card-box">
        <div class="col-md-12">

          <button style="font-size:36px;color:#000d82;" onclick="printDivs(this,printAllRecord)"> <i class="fa fa-print"></i><br><input type='button' id='btn' value='Print'  class="btn btn-primary float-center allrecord"></button>


          <!-- <button style="font-size:36px;color:#000d82;" onclick="tableToExcel(this,printAllRecord)"> <i class="fa fa-print"></i><br><input type='button' id='btn' value='Excel'  class="btn btn-primary float-center allrecord"></button> -->

          
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
            <h4 class="card-title">Branch Class Students </h4>
            @component('_components.alerts-default')
            @endcomponent

            <table id="example" class="table border table-bordered ">
              <thead>
                <tr >
                  <th></th>
                  <th>Class</th>
                  <th>Student</th>

                </tr>
              </thead>
              <tbody>
               @php($tota_stds=0)
               @php($class=0)
               @foreach($records as $pro)
               @if(isset($pro->course->Students) && ($pro->course->branchStudents($pro->branch_id)))

               @php($classId=$pro->branch_id)
               @if($classId!=$class)
               <tr> 
                <td colspan="3"><strong>@if(isset($pro->branch->branch_name)){{$pro->branch->branch_name}} @endif </strong></td> 
              </tr> 
              @endif
              <tr>
                <td></td>
                <td>@if(isset($pro->course->course_name)){{$pro->course->course_name}} @endif</td>
                <td>{{($pro->course->branchStudents($pro->branch_id))}}</td>

                @php($tota_stds+=($pro->course->branchStudents($pro->branch_id)))
              </tr>
              @endif


              @php($class=$pro->branch_id)
              @endforeach
              <tr>
                <td colspan="2"><strong>Total</strong></td>
                <td>{{$tota_stds}}</td>
              </tr>

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
<script type="text/javascript">
  var tableToExcel = (function() {
    var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
    return function(table, name) {
      if (!table.nodeType) table = document.getElementById(table)
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
      window.location.href = uri + base64(format(template, ctx))
    }
  })()
</script>
    @endpush