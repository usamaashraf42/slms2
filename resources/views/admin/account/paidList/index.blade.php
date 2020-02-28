@extends('_layouts.admin.default')
@section('title', 'Paid')
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

    @if(isset($record) && count($record))
    <div class="col-md-12">
      <input type='button' id='btn' value='All Record Print' onclick="printDivs(this,DivIdToPrint)" class="btn btn-primary float-center allrecord" style="width: 100%;">
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
           @foreach($record as $branch)
          <div  style="float: right;">
           <div style="float: right;">Printed On:{{date('d-M-Y')}} <span>{{date('H:i')}}</span></div>
         </div>
         <div class="" style="margin-top: 25px; text-align: center;">

          <div class="logo_heading" style="width: 40%; margin: 0 auto;">
            <img src="{{asset('images/school/alis pvt ltd.png')}}">

          </div>
        </div>

        <div class="col-md-10" style="margin-top: 40px;">

         <div class="container">
           <div class="nav_bva" style="margin-top: -20px;">
            Paid list for <span>&nbsp;&nbsp; @isset($monthName){{$monthName}}@endisset/@isset($year){{$year}}@endisset </span>
          </div>
          <br>
          <div style="float: left;margin-top: -15px;"><strong><h4>{{$branch->branch_name}}</h4></strong></div>

          <div style="width: 40%;"></div>
        </div>
        <br>


        <table class="table">
         <thead>

          <tr>
            <th></th>
            <th style="max-width: 100px!important;"><strong><h4>{{$branch->branch_name}}</h4></strong></th>
            <th> Ly No</th>
            <th> FeeId</th>
            <th> <div style="transform: rotate(90deg);max-width: 44px;">Bank</div></th>
            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 30px; font-size: 8pt; font-weight: bold;"> Deposit Date</div></th>
            <!-- <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 35px; font-size: 8pt; font-weight: bold;"> Deposit Amount</div></th> -->
            <!-- <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 35px; font-size: 8pt; font-weight: bold;"> insurance</div></th> -->
           <!--  <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 54px; font-size: 8pt; font-weight: bold;font-size: 9pt;">Deferred Amount
            Lastmonth </div></th> -->
<!--             <th> <div style="transform: rotate(90deg);padding: 0px; min-width: 60px; font-size: 8pt; font-weight: bold;"> Net Fee</div></th>
 -->        <th> <div style="padding: 0px; max-width: 100px; font-size: 8pt; font-weight: bold; justify-content: center;">Posted Fee</div></th>

            <th ><div style="transform: rotate(90deg);padding: 0px; max-width: 37px; font-size: 8pt; font-weight: bold;"  >Correction Amount </div></th>
            <th ><div style="transform: rotate(90deg);padding: 0px; max-width: 37px; font-size: 8pt; font-weight: bold;"  >After Cor fee </div></th>

            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Deposit Amount </div></th>
            <!-- <th > <div style="transform: rotate(90deg);padding: 0px; max-width: 44px; font-size: 8pt; font-weight: bold;font-size: 9pt;">Fine</div></th>

            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Total </div></th>
            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Due date </div></th> -->




          </tr>
        </thead>
       

        @php($outArray=0)
        @php($activeArray=0)
        @foreach($branch->student as $data)

        @php($classId=$data->course_id)

        @if($data->status==1 )
        @php($activeArray++)
        @endif

        @php($feeArray=array())
        @foreach($data->feePost as $feeRecord)
        @if(isset($feeRecord->fee_month) && ($feeRecord->fee_month==$month) && ($feeRecord->fee_year==$year))
        @php(array_push($feeArray,$feeRecord))
        @endif
        @endforeach
        @if($data->status==1 && (count($feeArray) > 0))

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

        @if($data->status==1 && isset($feeArray[0]) && (($feeArray[0]->paid_amount)>0))

        <tbody>


          @if(isset($data->course->course_name) && ($levelName!=$data->course->course_name))
          <tr style="margin:5px;">
            <td colspan="14" ><strong>{{$data->course->course_name}}</strong></td>
          </tr>
          @php($levelName=$data->course->course_name)
          @endif




          <tr>
            <td>{{$counter++}}</td>
            <td style="text-align: left!important;"><i>{{$data->s_name}}&nbsp; &nbsp; {{$data->s_phoneNo}} &nbsp; &nbsp; @if($data->is_freeze=='0') <span class="badge badge-info">freeze</span> @endif</td>
              <td style="text-align: left!important;"><i>@isset($data->id){{$data->id}}@endisset</td>
               <td>@isset($feeArray[0]->id){{$feeArray[0]->id}}@endisset </td>
               <td>@isset($feeArray[0]->BankFeeDeposit->bank->bank_name){{$feeArray[0]->BankFeeDeposit->bank->bank_name}}@endisset </td>
               <td>@isset($feeArray[0]->BankFeeDeposit->deposite_date){{date("d-m-y", strtotime(date($feeArray[0]->BankFeeDeposit->deposite_date)))}}@endisset </td>
                <td>@isset($feeArray[0]->total_fee){{($feeArray[0]->total_fee)+($feeArray[0]->corrected_amount)}}@endisset </td>
                 <td>@isset($feeArray[0]->total_fee){{($feeArray[0]->corrected_amount)}}@endisset </td>

                  <td>@isset($feeArray[0]->total_fee){{($feeArray[0]->total_fee)}}@endisset </td>

               <td>@isset($feeArray[0]->BankFeeDeposit->paid_amount){{$feeArray[0]->BankFeeDeposit->paid_amount}}@endisset </td>
               <!-- <td>@isset($feeArray[0]->insurance_of) {{$feeArray[0]->insurance_of}}@endisset </td> -->
               <!-- <td> @isset($feeArray[0]->deffered_amount) {{$feeArray[0]->deffered_amount}}@endisset </td> -->
              <!--  <td>@isset($data->studentFee->Net_AnnualFee) {{round(($data->studentFee->Net_AnnualFee)/12)}} * {{$data->studentFee['m'.$month]}}@endisset </td>
               <td>@isset($feeArray[0]->fee_due_date2){{ $feeArray[0]->paid_amount}} @if($feeArray[0]->paid_date) {{date("d-M-y", strtotime(date($feeArray[0]->paid_date))) }} @endif @endisset</td>

               <td>@isset($feeArray[0]->transport_fee){{date($feeArray[0]->transport_fee)}}@endisset</td>
               <td>@isset($feeArray[0]->student->balance->balance){{date($feeArray[0]->student->balance->balance)}}@endisset</td>
               <td>@isset($feeArray[0]->fine){{date($feeArray[0]->fine)}}@endisset</td>
               <td><i>@isset($feeArray[0]->total_fee){{date($feeArray[0]->total_fee)}}@endisset &nbsp;&nbsp;</i> </td>
               <td><i>@isset($feeArray[0]->fee_due_date2){{date("d-M-y", strtotime(date($feeArray[0]->fee_due_date2)))}}@endisset</td> -->


               </tr>

               @endif
               @endforeach
             </tbody>
             @endforeach
           </table>

           {{-- //////////////////////////////// table////////////// --}}
           <div class="row">
            <div class="col-md-12">
              <div class="float-center">
                <table  style=" width: 50%; margin-top: 40px" border="1">
                  <thead>
                    <tr>
                      <th>Sr</th>
                      <th>Branch Name</th>
                      <th>Total std</th>
                      <th>Paid std</th>
                      <th>Paid average</th>
                      <th>Paid amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php($totalOutstandingamount=0)
                    @php($totalPostingamount=0)
                    @php($totalstudent=0)
                    @php($totaloutStd=0)
                    @php($totalpaidAmount=0)
                    @php($totalpaidStd=0)
                    
                    @php($index=1)
                    @foreach($record as $branch)
                    @php($paidAmount=0)
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

                      @if($data->status==1)
                        @isset($feeArray[0])
                          @php($total_std+=1)
                          @php($totalstudent++)
                          @php($totalPostedFee+=$feeArray[0]->total_fee)
                          @php($totalPostingamount+=$feeArray[0]->total_fee)
                        @endisset
                      @endif


                        	
               

                        @if($data->status==1 && isset($feeArray[0]) && ($feeArray[0]->paid_amount>0))
                            @php($outstandStd++)
                            @php($totalpaidStd++)
                            @php($paidAmount+=$feeArray[0]->paid_amount)
                            @php($totalpaidAmount+=$feeArray[0]->paid_amount)
                        @endif


                     
                    @endforeach
                    <!-- //////////////////////////////////////////////// Calculation -->


                    <tr>
                      <td>{{$index}}</td>
                      <td>{{$branch->branch_name}}</td>
                      <td>{{$total_std}}</td>
                      <td>{{($outstandStd)}}</td>
                      <td>{{round((($outstandStd/($total_std>0?$total_std:1))*100),2)}} %</td>
                      <td>{{number_format($paidAmount)}}</td>
                    </tr>
                    @php($index++)
                    @endforeach
                    <tr>
                      <td colspan="1"></td>
                      <td><strong>Total Amount</strong></td>
                      <td>{{$totalstudent}}</td>
                      <td>{{$totalpaidStd}}</td>
                      <td>{{round((($totalpaidStd/($totalstudent>0?$totalstudent:1))*100),2)}} %</td>

                      <td>{{number_format($totalpaidAmount)}}</td>
                    </tr>
                  </tbody>
                </table>

              </div>
              <div class="float-left" style="margin-top: 80px;margin-right: 20px">
                <ul>
                  <li>Total posted Amount: {{number_format($totalPostingamount)}}</li>
                  <li>Paid Amount: {{number_format($totalpaidAmount)}}</li>
                </ul>
              </div>

            </div>
            {{-- ////////////////////// end table summery//////////// --}}
            

            

            {{-- ////////////////////////// --}}
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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
  <script type="text/javascript">
    function printDivs(eve,obj)
    {


      $("#"+$(obj).attr('id')).print();


    }
  </script>
  @endpush
