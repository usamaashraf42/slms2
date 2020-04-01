@extends('_layouts.admin.default')
@section('title', 'Outstanding')
@section('content')
@php($classss=0)
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
 
        th{
          padding: 0px!important;
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
    @if(isset($record) && count($record))
    <div class="col-md-12">

          <button style="font-size:36px;color:#000d82;" onclick="printDivs(this,'DivIdToPrint')"> <i class="fa fa-print"></i><br><input type='button' id='btn' value='All Record Print'  class="btn btn-primary float-center allrecord"></button>
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

<div id="DivIdToPrint">
  

         @foreach($record as $branch)
         <div class="logoremove">
         <div  style="float: right;">
           <div style="float: right;">Printed On:{{date('d-M-Y')}} <span>{{date('H:i')}}</span></div>
         </div>
         <br>  
        <div class="row" style="margin-top: 25px;text-align: right;">
          <div class="logo_heading" style="margin: 0 auto; width: 40%;">
                <img src="{{asset('images/school/alis pvt ltd.png')}}">
          </div>
        </div>

         <div class="nav_bva" style="margin-top: -5px;">
          Outstanding list for <span>&nbsp;&nbsp; @isset($monthName){{$monthName}}@endisset/@isset($year){{$year}}@endisset </span>
        </div>
        <br>
        </div>
       
         
        <!-- <div style="float: left;margin-top: -15px;"><strong><h4>{{$branch->branch_name}}</h4></strong></div> -->
      
        <br>

        <table class="table_1">
         <thead>
          <tr>
            <th></th>
            <th style="max-width: 100px!important;"><strong><h4>{{$branch->branch_name}}</h4></strong></th>
            <th> Ly No</th>
            <th> FeeId</th>
            <th> <div style="transform: rotate(90deg);max-width: 44px;">Exam Fee</div></th>
            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 30px; font-size: 8pt; font-weight: bold;"> Utility</div></th>
            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 35px; font-size: 8pt; font-weight: bold;"> Stationery</div></th>
            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 35px; font-size: 8pt; font-weight: bold;"> insurance</div></th>
            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 54px; font-size: 8pt; font-weight: bold;font-size: 9pt;">Deferred Amount
            Lastmonth </div></th>
            <th> <div style="transform: rotate(90deg);padding: 0px; min-width: 60px; font-size: 8pt; font-weight: bold;"> Net Fee</div></th>
            <th> <div style="padding: 0px; max-width: 100px; font-size: 8pt; font-weight: bold; justify-content: center;"> Unpaid
              Late Deposit
              Fine of Last
              Month with
            Date of</div></th>
            <th ><div style="transform: rotate(90deg);padding: 0px; max-width: 37px; font-size: 8pt; font-weight: bold;"  >Transport </div></th>
            <th> <div style="    transform: rotate(90deg);
            padding: 40px 0px;
            height: -1px;
            /* font-size: 8pt; */
            font-weight: bold;
            font-size: 8pt;">Outstanding </div></th>
            <th > <div style="transform: rotate(90deg);padding: 0px; max-width: 44px; font-size: 8pt; font-weight: bold;font-size: 9pt;">Fine</div></th>
            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Total </div></th>
            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Due date </div></th>
          </tr>
        </thead>    
        @php($outArray=0)
        @php($activeArray=0)
        @foreach($branch->student as $data)

        @php($classId=$data->course_id)

        @if($data->is_active==1 )
        @php($activeArray++)
        @endif

        @php($feeArray=array())
        @foreach($data->feePost as $feeRecord)
        @if(isset($feeRecord->fee_month) && ($feeRecord->fee_month==$month) && ($feeRecord->fee_year==$year))
        @php(array_push($feeArray,$feeRecord))
        @endif
        @endforeach
        @if($data->is_active==1 && (count($feeArray) > 0) && ($feeArray[0]->paid_amount<=0))

        @php($outArray++)
        @endif

        @endforeach
        
        @foreach($branch->student as $data)
        @php($feeArray=array())
        @foreach($data->feePost as $feeRecord)

        @if(isset($feeRecord->fee_month) && ($feeRecord->fee_month==$month) && ($feeRecord->fee_year==$year))
        @php(array_push($feeArray,$feeRecord))
        @endif
        @endforeach

        @if($data->is_active==1 && isset($feeArray[0]) && ($feeArray[0]->isPaid!=1) )
        <tbody>


          @if(isset($data->course->course_name) && ($levelName!=$data->course->course_name))
          <tr style="margin:5px;">
            <td colspan="14" ><strong>{{$data->course->course_name}}</strong></td>
          </tr>
          @php($levelName=$data->course->course_name)
          @endif


              @php($feeFactor=$feeArray[0]->fee_factor?$feeArray[0]->fee_factor:(isset($data->studentFee['m'.$month])?$data->studentFee['m'.$month]:0))

              @php($feeMonth=$feeArray[0]->fee_this_month?$feeArray[0]->fee_this_month:(isset($feeArray[0]->current_fee)?(round(($feeArray[0]->current_fee))):0))

          <tr>
            <td>{{$counter++}}</td>
            <td style="text-align: left!important;"><i>{{$data->s_name}}&nbsp; &nbsp; {{$data->s_phoneNo}} &nbsp; &nbsp; @if($data->is_freeze=='0') <span class="badge badge-info">freeze</span> @endif</td>
              <td style="text-align: left!important;"><i>@isset($data->id){{$data->id}}@endisset</td>
               <td>@isset($feeArray[0]->id){{$feeArray[0]->id}}@endisset </td>
               <td>@isset($feeArray[0]->examfee){{$feeArray[0]->examfee}}@endisset </td>
               <td>@isset($feeArray[0]->utility_fee){{$feeArray[0]->utility_fee}}@endisset </td>
               <td>@isset($feeArray[0]->statfee){{$feeArray[0]->statfee}}@endisset </td>
               <td>@isset($feeArray[0]->insurance_of) {{$feeArray[0]->insurance_of}}@endisset </td>

               <td> @isset($feeArray[0]->deffered_amount) {{$feeArray[0]->deffered_amount}}@endisset </td>

               <td>@isset($feeMonth) {{round($feeMonth)}} * {{ round($feeFactor,2)}} @endisset </td>

               <td>@isset($feeArray[0])
                @if($feeArray[0]->outstand_lastmonth > 0)
                {{date("d-M-Y", strtotime($feeArray[0]['fee_due_date2']))}}
                @else
                {{date("d-M-Y", strtotime($feeArray[0]['fee_due_date1']))}}
                @endisset

              @endisset</td>

              <td>@isset($feeArray[0]->transport_fee){{date($feeArray[0]->transport_fee)}}@endisset</td>
              <td>@isset($feeArray[0]->student->balance->balance)<p @if($feeArray[0]->student->balance->balance<0) style="color:red;font-weight: bold;"@endif >{{($feeArray[0]->student->balance->balance)}} </p>@endisset</td>
              <td>@isset($feeArray[0]->fine){{date($feeArray[0]->fine)}}@endisset</td>

              <td><i>@isset($feeArray[0]->total_fee){{date($feeArray[0]->total_fee)}}@endisset &nbsp;&nbsp;</i> </td>
              
              <td><i>@isset($feeArray[0]->fee_due_date1)
               @if($feeArray[0]->outstand_lastmonth > 0)
               {{date("d-M-Y", strtotime($feeArray[0]['fee_due_date2']))}}
               @else
               {{date("d-M-Y", strtotime($feeArray[0]['fee_due_date1']))}}
               @endisset
             @endisset</i></td>


           </tr>

           @endif
           @endforeach
         </tbody>
         @endforeach
       </table>
       {{-- //////////////////////////////// table////////////// --}}
       <br>
       <table  style=" width: 50%; margin-top: 40px" border="1">
        <thead>
          <tr>
            <th>Sr</th>
            <th>Branch Name</th>
            <th>Total std</th>
            <th>oustanding std</th>
            <th>average</th>
            <th>oustanding amount</th>
          </tr>
        </thead>
        
        <tbody>
          @php($totalOutstandingamount=0)
          @php($totalPostingamount=0)
          @php($totalstudent=0)
          @php($totaloutStd=0)
          @php($index=1)
          @foreach($record as $branch)

          @php($totalPostedFee=0)
          @php($outstanding=0)
          @php($total_std=0)
          @php($outstandStd=0)
          <!-- ////////////////////////////////////////////////////// Start Calculation -->
          @foreach($branch->student as $data)
          @php($feeArray=array())

          @foreach($data->feePost as $feeRecord)
          @if(isset($feeRecord->fee_month) && ($feeRecord->fee_month==$month) && ($feeRecord->fee_year==$year))
          @php(array_push($feeArray,$feeRecord))
          @endif
          @endforeach

          @if($data->is_active==1)
          

          @isset($feeArray[0])
          @php($total_std+=1)
          @php($totalstudent++)
          @php($totalPostedFee+=$feeArray[0]->total_fee)
          @php($totalPostingamount+=$feeArray[0]->total_fee)
          @endisset
          @endif


          @if($data->is_active==1 && isset($feeArray[0]) && ($feeArray[0]->isPaid!=1))
          @php($outstandStd++)
          @php($totaloutStd++)

          
          

          @if(isset($feeArray[0]->total_fee) && $feeArray[0]->total_fee > 0 )

          @isset($feeArray[0]->total_fee)
            @if($feeArray[0]->total_fee>0)
              @php($outstanding+=$feeArray[0]->total_fee)
              @php($totalOutstandingamount+=$feeArray[0]->total_fee)
            @endif

          @endisset

          
         
          @endif
          @endif
          @endforeach
          <!-- //////////////////////////////////////////////// Calculation -->


          <tr>
            <td>{{$index}}</td>
            <td>{{$branch->branch_name}}</td>
            <td>{{$total_std}}</td>
            <td>{{($outstandStd)}}</td>
            <td>{{round((($outstandStd/($total_std>0?$total_std:1))*100),2)}} %</td>
            <td>{{number_format($outstanding)}}</td>
          </tr>
          @php($index++)
          @endforeach
          <tr>
            <td colspan="1"></td>
            <td><strong>Total Amount</strong></td>
            <td>{{$totalstudent}}</td>
            <td>{{$totaloutStd}}</td>
            <td>{{round((($totaloutStd/($totalstudent>0?$totalstudent:1))*100),2)}} %</td>

            <td>{{number_format($totalOutstandingamount)}}</td>
          </tr>
        </tbody>
      </table>

      
      <div class="float-left" style="margin-top: 80px;margin-right: 20px">
        <ul>
          <li>Total posted Amount: {{number_format($totalPostingamount)}}</li>
          <!-- <li>Paid Amount: {{number_format($totalPostingamount-$totalOutstandingamount)}}</li> -->
          <li>outstanding Amount:{{number_format($totalOutstandingamount)}}</li>
        </ul>
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

@else
<div class="alert alert-success"> Record Not Found</div>
@endif
</div>
@endsection

@push('post-scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
<script type="text/javascript">
  function printDivs(eve,obj)
  {

// console.log('eve',eve,'obj',obj);
    $("#"+obj).print();




  }

  $(function(){
    $( ".logoremove" ).first().css( "display", "none" );
  });
</script>
@endpush
