@extends('_layouts.admin.default')
@section('title', 'Bank Student List')
@section('content')
@php($classss=0)
<div class="content container-fluid" style="background-color: #fff;">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <style type="text/css">


        th ,td{
          border: 1px solid #000!important;
          text-align: center!important;
          font-size: 12px!important;

        }
        .table tr{
          border-top: 1px solid #000!important;
          border-bottom: 1px solid #000!important;
        }
        th{
          padding: 2px;
          padding: 0.55rem;
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
      .table td{
        padding: .10rem!important;
        font-size: 12px!important;
      }
      @page { size: auto;  margin: 0mm; margin-right: 5px; }

    </style>

    @if(isset($students) && count($students))
    <div class="col-md-12">
      <div class="col-md-6">
        <input type='button' id='btn' value='Print' onclick="printDivd(DivIdToPrint)" class="btn btn-primary float-left allrecord" style="width: 50%;">
      </div>
      <div class="col-md-6">
        <input type='button'  id='btn' value='Excel' onclick="tableToExcel('bank-outstanding', 'Bank outstanding Excel')" class="btn btn-danger float-right" style="width: 50%;">
      </div>

    </div>
    <br><br>
    @isset($month)
    <?php 
    $dateObj= DateTime::createFromFormat('!m', $month);
    $monthName = $dateObj->format('F');
    ?>      
    @endisset

    @php($levelName='')
    @php($counter=1)

    <section class="outstanding">
      <div class="DivIdToPrint">

        <div  id="DivIdToPrint">
          <div  style="float: right;">
           <div style="float: right;">Printed On:{{date('d-M-Y')}} <span>{{date('H:i')}}</span></div>
         </div>
         <div class="" style="margin-top: 25px; text-align: center;">

          <div class="logo_heading" style="width: 40%; margin: 0 auto;">
            <img src="{{asset('images/school/alis pvt ltd.png')}}">

          </div>
        </div>

        <div class="col-md-10" style="margin-top: 40px;"  id="bank-outstanding">


          <br>


          <table class="table">
           <thead>

            <tr>
              <th></th>
              
              <th> Roll Number</th>
              <th> Challan Number</th>
              <th> Student Name</th>
              <th> Contact No</th>
              <th>Standard</th>
              <th> Campus</th>
              <th>Tution Fee</th>
              <th>Due Date</th>



            </tr>
          </thead>


          @php($outArray=0)
          @php($activeArray=0)




          @php($feeArray=array())





          @foreach($students as $data)

          @php($feeArray=array())


          @foreach($data->feePost as $feeRecord)
          @if(isset($feeRecord->fee_month) && ($feeRecord->fee_month==$month) && ($feeRecord->fee_year==$year))
          @php(array_push($feeArray,$feeRecord))
          @endif
          @endforeach

          @if(isset($feeArray[0]))
          <tbody>

            <tr>
              <td>{{$counter++}}</td>
          
              
              <td>{{$data->id}}</td>
              <td>@isset($feeArray[0]->id){{$feeArray[0]->id}}@endisset </td>
              <td >{{$data->s_name .' / '. $data->s_fatherName}}</td>
              <td >{{$data->s_phoneNo}}</td>
             
              <td>@isset($data->course->course_name){{$data->course->course_name}}@endisset</td>
              <td>@isset($data->branch->branch_name){{$data->branch->branch_name}}@endisset</td>


              <td>@isset($feeArray[0]->total_fee){{round($feeArray[0]->total_fee)}}@endisset </td>

              <td>@if($feeArray[0]->outstand_lastmonth > 0)
                {{date("d-M-Y", strtotime($feeArray[0]['fee_due_date2']))}}
                @else
                {{date("d-M-Y", strtotime($feeArray[0]['fee_due_date1']))}}
              @endisset </td>


            </tr>

            @endif
            @endforeach
          </tbody>

        </table>


      </div>
    </div>
  </div>
</div>


<style>
  .total_nava{width: 32%;
    display: inline-block;
  }
  .sub_nava{
    width: 30%;
    float: right;
  }
</style>
</div>
@else
<div class="alert alert-success"> Record Not Found</div>
@endif
@endsection

@push('post-scripts')
<script type="text/javascript">
   function printDivd(eve,obj)
    {
      console.log('printId');

      var divToPrint=document.getElementById('DivIdToPrint');

      var newWin=window.open('','Print-Window');

      newWin.document.open();

      newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

      newWin.document.close();

      setTimeout(function(){newWin.close();},10);

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
