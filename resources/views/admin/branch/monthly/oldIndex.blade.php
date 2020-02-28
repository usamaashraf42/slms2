@extends('_layouts.admin.default')
@section('title', 'Branch Monthly Detail')
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
          padding: 0rem;
          height: 80px!important;
        }
        .table_1 td{
    padding: 2px;
    padding: 0.5rem!important;
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
      .nav-tabs { border-bottom: 2px solid #DDD; }
      .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
      .nav-tabs > li > a { border: none; color: #ffffff;background: #5a4080; }
      .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none;  color: #5a4080 !important; background: #fff; }
      .nav-tabs > li > a::after { content: ""; background: #5a4080; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
      .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
      .tab-nav > li > a::after { background: ##5a4080 none repeat scroll 0% 0%; color: #fff; }
      .tab-pane { padding: 15px 0; }
      .tab-content{padding:20px}
      .nav-tabs > li  {width:20%; text-align:center;}
      .card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
      body{ background: #EDECEC; padding:50px}

      @media all and (max-width:724px){
        .nav-tabs > li > a > span {display:none;} 
        .nav-tabs > li > a {padding: 5px 5px;}
      }

      @page { size: auto;  margin: 0mm; margin-right: 5px; }

    </style>

    <div class="col-md-12">
      <input type='button' id='btn' value='All Record Print' onclick="printDivs(this)" class="btn btn-primary float-center allrecord" style="width: 100%;">
    </div>
    <br><br>
    @isset($month)
    <?php 
    $dateObj= DateTime::createFromFormat('!m', $month);
    $monthName = $dateObj->format('F');
    ?>      
    @endisset
    @php($levelName='')

    <section class="outstanding">
      <div id="DivIdToPrint">
       <div  style="float: right;">
         <div style="float: right;">Printed On:{{date('d-m-y')}} <span>{{date('H:i')}}</span></div>
       </div>
       <br>

       <div class="" style="margin-top: 25px; text-align: center;">
        <div class="logo_heading" style="width: 40%; margin: 0 auto;">
          <img src="{{asset('images/school/alis pvt ltd.png')}}">

        </div>
      </div>
      <page size="A4" layout="landscape">
       <div class="nav_bva" style="margin-top: -5px;">
        Monthly Paid Detail Of <span>&nbsp;&nbsp; @isset($monthName){{$monthName}}@endisset/@isset($year){{$year}}@endisset </span>
      </div>
      <br>
      <div style="float: left;margin-top: -15px;"><strong><h4>{{$branch->branch_name}}</h4></strong></div>

      <br>


      <table class="table_1">
       <thead>

        <tr>
          <th></th>
          <th style="max-width: 100px!important;"><strong><h4>{{$branch->branch_name}}</h4></strong></th>
          <th> Ly No</th>
          <th> Addmission</th>
          <th> FeeId</th>
          <th> <div style="transform: rotate(90deg);max-width: 44px;">Ac Fee</div></th>
          <th> <div style="transform: rotate(90deg);max-width: 44px;">Exam Fee</div></th>
          <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 30px; font-size: 8pt; font-weight: bold;"> Utility</div></th>
          <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 35px; font-size: 8pt; font-weight: bold;"> Stationery</div></th>
          <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 35px; font-size: 8pt; font-weight: bold;"> insurance</div></th>
          <th> <div style="transform: rotate(90deg);padding: 0px; min-width: 60px; font-size: 8pt; font-weight: bold;"> Net Fee</div></th>
          <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Outstanding </div></th>

          <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Total Payable </div></th>
          <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;"> Paid </div>
          </th>
           <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">paid This month </div></th>
           <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">outstanding paid</div></th>
          </th>
        </tr>
      </thead>


      @php($outArray=0)
      @php($activeArray=0)
      @php($counter=0)

      @php($curentFee=0)
      @php($outstaindFee=0)
      @php($paidFee=0)


      @php($totalPayableLast=0)
      @php($totalPaidCurrent=0)





      @foreach($branch->student as $data)


      @php($thisMonthPaid=0)
      @php($thisMonthOut=0)

      @php(($studentFeeMonth=$data->feePostOfMonth($month)))
      @php($classId=$data->course_id)

      @if($data->is_active==1 && isset($studentFeeMonth) && $studentFeeMonth->paid_amount>0)
      <tbody>


        @if(isset($data->course->course_name) && ($levelName!=$data->course->course_name))
        <tr style="margin:5px;">
          <td colspan="14" ><strong>{{$data->course->course_name}}</strong></td>
        </tr>
        @php($levelName=$data->course->course_name)
        @endif

        <tr>
          <td>{{++$counter}}</td>
          <td style="text-align: left!important;"><i>{{$data->s_name}}&nbsp; &nbsp; {{$data->s_phoneNo}}</td>
            <td style="text-align: left!important;"><i>@isset($data->id){{$data->id}}@endisset</td>
              <td>{{date("d-m-y", strtotime(($data->admission_date))) }}</td>
             <td>@isset($studentFeeMonth->id){{$studentFeeMonth->id}}@endisset </td>
             <td>@isset($studentFeeMonth->accharge){{$studentFeeMonth->accharge}}@endisset </td>
             <td>@isset($studentFeeMonth->examfee){{$studentFeeMonth->examfee}}@endisset </td>
             <td>@isset($studentFeeMonth->utility_fee){{$studentFeeMonth->utility_fee}}@endisset </td>
             <td>@isset($studentFeeMonth->statfee){{$studentFeeMonth->statfee}}@endisset </td>
             <td>@isset($studentFeeMonth->insurance_of) {{$studentFeeMonth->insurance_of}}@endisset </td>

             <td> @isset($studentFeeMonth->total_fee)

              @php($curentFee+= ($studentFeeMonth->current_fee) + ($studentFeeMonth->comp_fee) + ($studentFeeMonth->labfee) + ($studentFeeMonth->libfee) + ($studentFeeMonth->examfee) + ($studentFeeMonth->statfee) + ($studentFeeMonth->accharge) + ($studentFeeMonth->secFee) + ($studentFeeMonth->misc1) + ($studentFeeMonth->misc2))

              {{($studentFeeMonth->current_fee) + ($studentFeeMonth->comp_fee) + ($studentFeeMonth->labfee) + ($studentFeeMonth->libfee) + ($studentFeeMonth->examfee) + ($studentFeeMonth->statfee) + ($studentFeeMonth->accharge) + ($studentFeeMonth->secFee) + ($studentFeeMonth->misc1) + ($studentFeeMonth->misc2)
              }} 
              @endisset 
            </td>


              @php($thisMonthPaid= ($studentFeeMonth->current_fee) + ($studentFeeMonth->comp_fee) + ($studentFeeMonth->labfee) + ($studentFeeMonth->libfee) + ($studentFeeMonth->examfee) + ($studentFeeMonth->statfee) + ($studentFeeMonth->accharge) + ($studentFeeMonth->secFee) + ($studentFeeMonth->misc1) + ($studentFeeMonth->misc2))


             



            <td>
              @isset($studentFeeMonth->outstand_lastmonth)
              @php($outstaindFee+=$studentFeeMonth->outstand_lastmonth)
              {{ $studentFeeMonth->outstand_lastmonth}} 
              @endisset
            </td>
            <td>@isset($studentFeeMonth->total_fee){{date($studentFeeMonth->total_fee)}}@endisset</td>
            <td>
              @isset($studentFeeMonth->paid_amount)

              @php($paidFee+=$studentFeeMonth->paid_amount)
              {{($studentFeeMonth->paid_amount)}}
              @endisset
            </td>

            <td>
                @if($thisMonthPaid > $studentFeeMonth->paid_amount)
                    @php($totalPaidCurrent+=$studentFeeMonth->paid_amount)
                    {{ $studentFeeMonth->paid_amount }} 
                  @else 
                    @php($totalPaidCurrent+=$thisMonthPaid)
                    {{$thisMonthPaid}} 
                @endif </td>

            <td>@if($thisMonthPaid < $studentFeeMonth->paid_amount)
              {{($studentFeeMonth->paid_amount)- ($thisMonthPaid)}}
               @php($totalPayableLast+=($studentFeeMonth->paid_amount)- ($thisMonthPaid))
            @endisset</td>
          </tr>

          @endif
          @endforeach



          <tr>
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
            <td>{{$curentFee}}</td>
            <td>{{$outstaindFee}}</td>
            <td>{{$curentFee+ $outstaindFee}}</td>
            <td>{{$paidFee}}</td>
            <td>{{$totalPaidCurrent}}</td>
            <td>{{$totalPayableLast}}</td>
          </tr>

        </tbody>
      </table>


   
      <!-- /////////////////////////////////////??????????????????????????????????? -->

      <div  style="float: right;">
         <div style="float: right;">Printed On:{{date('d-M-Y')}} <span>{{date('H:i')}}</span></div>
       </div>
       <br>

       <div class="" style="margin-top: 25px; text-align: center;">
        <div class="logo_heading" style="width: 40%; margin: 0 auto;">
          <img src="{{asset('images/school/alis pvt ltd.png')}}">

        </div>
      </div>
      <page size="A4" layout="landscape">
       <div class="nav_bva" style="margin-top: -5px;">
        Monthly Outstanding Detail Of <span>&nbsp;&nbsp; @isset($monthName){{$monthName}}@endisset/@isset($year){{$year}}@endisset </span>
      </div>
      <br>
      <div style="float: left;margin-top: -15px;"><strong><h4>{{$branch->branch_name}}</h4></strong></div>

      <br>


      <table class="table_1">
       <thead>

        <tr>
          <th></th>
          <th style="max-width: 100px!important;"><strong><h4>{{$branch->branch_name}}</h4></strong></th>
          <th> Ly No</th>
          <th> Addmission</th>
          <th> FeeId</th>
          <th> <div style="transform: rotate(90deg);max-width: 44px;">Ac Fee</div></th>
          <th> <div style="transform: rotate(90deg);max-width: 44px;">Exam Fee</div></th>
          <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 30px; font-size: 8pt; font-weight: bold;"> Utility</div></th>
          <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 35px; font-size: 8pt; font-weight: bold;"> Stationery</div></th>
          <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 35px; font-size: 8pt; font-weight: bold;"> insurance</div></th>
          <th> <div style="transform: rotate(90deg);padding: 0px; min-width: 60px; font-size: 8pt; font-weight: bold;"> Net Fee</div></th>
          <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Outstanding </div></th>

          <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Total Payable </div></th>
          <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;"> Paid </div>
          </th>
        </tr>
      </thead>


      @php($outArray=0)
      @php($activeArray=0)
      @php($counter=0)

      @php($curentFee=0)
      @php($outstaindFee=0)
      @php($paidFee=0)





      @foreach($branch->student as $data)



      @php(($studentFeeMonth=$data->feePostOfMonth($month)))
      @php($classId=$data->course_id)

      @if($data->is_active==1 && isset($studentFeeMonth) && $studentFeeMonth->paid_amount<=0)
      <tbody>


        @if(isset($data->course->course_name) && ($levelName!=$data->course->course_name))
        <tr style="margin:5px;">
          <td colspan="14" ><strong>{{$data->course->course_name}}</strong></td>
        </tr>
        @php($levelName=$data->course->course_name)
        @endif

        <tr>
          <td>{{++$counter}}</td>
          <td style="text-align: left!important;"><i>{{$data->s_name}}&nbsp; &nbsp; {{$data->s_phoneNo}}</td>
            <td style="text-align: left!important;"><i>@isset($data->id){{$data->id}}@endisset</td>
              <td>{{date("d-m-y", strtotime(($data->admission_date))) }}</td>
             <td>@isset($studentFeeMonth->id){{$studentFeeMonth->id}}@endisset </td>
             <td>@isset($studentFeeMonth->accharge){{$studentFeeMonth->accharge}}@endisset </td>
             <td>@isset($studentFeeMonth->examfee){{$studentFeeMonth->examfee}}@endisset </td>
             <td>@isset($studentFeeMonth->utility_fee){{$studentFeeMonth->utility_fee}}@endisset </td>
             <td>@isset($studentFeeMonth->statfee){{$studentFeeMonth->statfee}}@endisset </td>
             <td>@isset($studentFeeMonth->insurance_of) {{$studentFeeMonth->insurance_of}}@endisset </td>

             <td> @isset($studentFeeMonth->total_fee)

              @php($curentFee+= ($studentFeeMonth->current_fee) + ($studentFeeMonth->comp_fee) + ($studentFeeMonth->labfee) + ($studentFeeMonth->libfee) + ($studentFeeMonth->examfee) + ($studentFeeMonth->statfee) + ($studentFeeMonth->accharge) + ($studentFeeMonth->secFee))

              {{($studentFeeMonth->current_fee) + ($studentFeeMonth->comp_fee) + ($studentFeeMonth->labfee) + ($studentFeeMonth->libfee) + ($studentFeeMonth->examfee) + ($studentFeeMonth->statfee) + ($studentFeeMonth->accharge) + ($studentFeeMonth->secFee)
              }} 
              @endisset 
            </td>

            <td>
              @isset($studentFeeMonth->outstand_lastmonth)
              @php($outstaindFee+=$studentFeeMonth->outstand_lastmonth)
              {{ $studentFeeMonth->outstand_lastmonth}} 
              @endisset
            </td>
            <td>@isset($studentFeeMonth->total_fee){{date($studentFeeMonth->total_fee)}}@endisset</td>
            <td>
              @isset($studentFeeMonth->paid_amount)
              @php($paidFee+=$studentFeeMonth->paid_amount)
              {{($studentFeeMonth->paid_amount)}}
              @endisset
            </td>
          </tr>

          @endif
          @endforeach



          <tr>
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
            <td>{{$curentFee}}</td>
            <td>{{$outstaindFee}}</td>
            <td>{{$curentFee+ $outstaindFee}}</td>
            <td>{{$paidFee}}</td>
          </tr>

        </tbody>
      </table>


</div>
</section>

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

@endsection

@push('post-scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
<script type="text/javascript">

  function printDivs(eve,obj)
  {


    $("#DivIdToPrint").print();


  }


  // function printDivs(obj)
  // {



  //   var divToPrint=document.getElementById('DivIdToPrint');

  //   var newWin=window.open('','Print-Window');

  //   newWin.document.open();

  //   newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  //   newWin.document.close();

  //   setTimeout(function(){newWin.close();},10);


  // }
</script>
@endpush
