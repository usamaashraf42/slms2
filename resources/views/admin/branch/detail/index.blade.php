@extends('_layouts.admin.default')
@section('title', 'Branch Detail')
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

    <!-- <div class="col-md-12">
      <input type='button' id='btn' value='All Record Print' onclick="printDivs(this,DivIdToPrint)" class="btn btn-primary float-center allrecord" style="width: 100%;">
    </div>
    <br><br> -->
    @isset($month)
    <?php 
    $dateObj= DateTime::createFromFormat('!m', $month);
    $monthName = $dateObj->format('F');
    ?>      
    @endisset
    @php($levelName='')
 
    <br><br>

    <section class="outstanding">
    
      <div class="DivIdToPrint">

        <div  id="DivIdToPrint">


         <div class="container">
          <div class="row">
            <div class="col-md-12"> 
              <!-- Nav tabs -->
              <div class="card">
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#detail" aria-controls="detail" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Branch Detail</span></a></li>
                  <li role="presentation" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Students</span></a></li>
                  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-user"></i>  <span>Posted</span></a></li>
                  <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-envelope-o"></i>  <span>Paid</span></a></li>
                  <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-cog"></i>  <span>Defaulter</span></a></li>
                </ul>

                <!-- Tab panes -->

                <div class="tab-content">
                  <!-- //////////////////////////////////////////////// -->

                  <div role="tabpanel" class="tab-pane active" id="detail">      
                    <div class="nav_bva" style="margin-top: -20px;">
                      Detail of <span>&nbsp;&nbsp; @isset($monthName){{$monthName}}@endisset/@isset($year){{$year}}@endisset </span>
                    </div>
                    <br>
                    <div style="float: left;margin-top: -15px;"><strong><h4>{{$branch->branch_name}}</h4></strong></div>
                    <br>
                    <table class="table">
                    <thead>

                      <tr>
                        <th></th>
                        <th style="max-width: 100px!important;"><strong><h4>Total Student</h4></strong></th>
                        <th> Posted Fee</th>
                        <th> Correction Fee</th>
                        <th>After Correction</th>

                        <th>Deposited Fee</th>
                        <th>Outstanding Fee</th>
                      </tr>
                    </thead>
                    @php($outArray=0)
                    @php($activeArray=0)

                    @php($totalFeePostedOfMonth=0)
                    @php($totalCorrectionOfMonth=0)
                    @php($totalDepositedOfMonth=0)

                    @foreach($branch->student as $data)
                    @php($totalStdudents=count($branch->student))

                   

                    @php(($studentFeeMonth=$data->feePostOfMonth($month)))
                    @if($studentFeeMonth)
                      @php($totalFeePostedOfMonth+=$studentFeeMonth->total_fee)
                      @php($totalCorrectionOfMonth+=$studentFeeMonth->corrected_amount)
                      @php($totalDepositedOfMonth+=$studentFeeMonth->paid_amount)
                    @endif

                 

                    @endforeach

                  <tbody>
                    <tr>
                      <td></td>
                      <td ><i>@isset($totalStdudents){{$totalStdudents}}@endisset</td>
                      <td ><i>@isset($totalFeePostedOfMonth){{$totalFeePostedOfMonth + $totalCorrectionOfMonth}}@endisset</td>
                      <td><i>@isset($totalCorrectionOfMonth){{$totalCorrectionOfMonth}}@endisset</td>
                      <td ><i>@isset($totalFeePostedOfMonth){{$totalFeePostedOfMonth }}@endisset </td>
                      <td><i>@isset($totalDepositedOfMonth){{$totalDepositedOfMonth}}@endisset</td>
                         <td ><i>@isset($totalFeePostedOfMonth){{$totalFeePostedOfMonth - $totalDepositedOfMonth}}@endisset</td>
                    </tr>
                  </tbody>

                </table>

              </div>
                 
                    <!-- ////////////////////////???????????????????????????????? -->
                    @php($counter=1)
                    @php($oldClassCounter=0)
                    @php($classCounter=0)
                    <div role="tabpanel" class="tab-pane " id="home">      <div class="nav_bva" style="margin-top: -20px;">
                      Students list for <span>&nbsp;&nbsp; @isset($monthName){{$monthName}}@endisset/@isset($year){{$year}}@endisset </span>
                    </div>
                    <br>
                    <div style="float: left;margin-top: -15px;"><strong><h4>{{$branch->branch_name}}</h4></strong></div>

                    <br>


                    <table class="table">
                     <thead>

                      <tr>
                        <th></th>
                        <th style="max-width: 100px!important;"><strong><h4>{{$branch->branch_name}}</h4></strong></th>
                        <th> Ly No</th>

                        <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Date of Admission </div></th>




                      </tr>
                    </thead>


                    @php($outArray=0)
                    @php($activeArray=0)


                    @foreach($branch->student as $data)
                    @php($classId=$data->course_id)

                    @if(($data))

                    <tbody>



                      @if(isset($data->course->course_name) && ($levelName!=$data->course->course_name))
                      @if($levelName)

                      @php($oldClassCounter=0)
                      @php($classCounter=0)
                      @php($classCounter=1)
                      @endif
                      <tr style="margin:5px;">
                        <td colspan="4" ><strong>{{$data->course->course_name}}</strong></td>
                      </tr>
                      @php($levelName=$data->course->course_name)

                      @endif
                      <tr>
                        <td>{{$counter++}}</td>
                        <td style="text-align: left!important;"><i>{{$data->s_name}}&nbsp; &nbsp; {{$data->s_phoneNo}}</td>
                         <td style="text-align: left!important;"><i>{{$data->id}}</td>
                          <td><i>@isset($data->admission_date){{date("d-M-y", strtotime(date($data->admission_date)))}}@endisset</td>
                          </tr>



                          @endif
                          @endforeach
                        </tbody>

                      </table>

                    </div>





                    <!-- ?///////////////////////////////////////// here second tab start /////////////////////////////////////////////////////// -->
                    <div role="tabpanel" class="tab-pane" id="profile">
                     @php($counter=1)
                     <div role="tabpanel" class="tab-pane " id="home">      <div class="nav_bva" style="margin-top: -20px;">
                      Posted Fee of <span>&nbsp;&nbsp; @isset($monthName){{$monthName}}@endisset/@isset($year){{$year}}@endisset </span>
                    </div>
                    <br>
                    <div style="float: left;margin-top: -15px;"><strong><h4>{{$branch->branch_name}}</h4></strong></div>

                 
                    <br>


                    <table class="table">
                     <thead>

                      <tr>
                        <th></th>
                        <th style="max-width: 100px!important;"><strong><h4>{{$branch->branch_name}}</h4></strong></th>
                        <th> Ly No</th>
                        <th> FeeId</th>
                        <th> <div style="transform: rotate(90deg);max-width: 44px;">Exam Fee</div></th>
                        <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 30px; font-size: 8pt; font-weight: bold;"> Utility</div></th>
                        <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 35px; font-size: 8pt; font-weight: bold;"> Stationery</div></th>

                        <!-- <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 35px; font-size: 8pt; font-weight: bold;"> Adm/ Reg</div></th> -->


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

                        <th ><div style="transform: rotate(90deg);padding: 0px; max-width: 37px; font-size: 8pt; font-weight: bold;"  >adm / reg </div></th>


                        <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Outstanding </div></th>
                        <th > <div style="transform: rotate(90deg);padding: 0px; max-width: 44px; font-size: 8pt; font-weight: bold;font-size: 9pt;">Fine</div></th>

                        <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Total </div></th>
                        <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Due date </div></th>




                      </tr>
                    </thead>


                    @php($outArray=0)
                    @php($activeArray=0)
                    @foreach($branch->student as $data)



                    @php(($studentFeeMonth=$data->feePostOfMonth($month)))
                    @php($classId=$data->course_id)




                    @if($data->is_active==1 && isset($studentFeeMonth))
                    <tbody>


                      @if(isset($data->course->course_name) && ($levelName!=$data->course->course_name))
                      <tr style="margin:5px;">
                        <td colspan="14" ><strong>{{$data->course->course_name}}</strong></td>
                      </tr>
                      @php($levelName=$data->course->course_name)
                      @endif




                      <tr>
                        <td>{{$counter++}}</td>
                        <td style="text-align: left!important;"><i>{{$data->s_name}}&nbsp; &nbsp; {{$data->s_phoneNo}}</td>
                          <td style="text-align: left!important;"><i>@isset($data->id){{$data->id}}@endisset</td>
                           <td>@isset($studentFeeMonth->id){{$studentFeeMonth->id}}@endisset </td>
                           <td>@isset($studentFeeMonth->examfee){{$studentFeeMonth->examfee}}@endisset </td>
                           <td>@isset($studentFeeMonth->utility_fee){{$studentFeeMonth->utility_fee}}@endisset </td>
                           <td>@isset($studentFeeMonth->statfee){{$studentFeeMonth->statfee}}@endisset </td>
                           <td>@isset($studentFeeMonth->insurance_of) {{$studentFeeMonth->insurance_of}}@endisset </td>
                           <td> @isset($studentFeeMonth->deffered_amount) {{$studentFeeMonth->deffered_amount}}@endisset </td>
                           <td>@isset($data->studentFee->Net_AnnualFee) {{($data->studentFee->Net_AnnualFee)/12}} * {{$data->studentFee['m'.$month]}}@endisset </td>
                           <td>@isset($studentFeeMonth->fee_due_date2){{ $studentFeeMonth->paid_amount}} @if($studentFeeMonth->paid_date) {{date("d-M-y", strtotime(date($studentFeeMonth->paid_date))) }} @endif @endisset</td>

                           <td>@isset($studentFeeMonth->transport_fee){{date($studentFeeMonth->transport_fee)}}@endisset</td>
                           <td>@isset($studentFeeMonth->admissionFee){{date($studentFeeMonth->admissionFee)}}@endisset / @isset($studentFeeMonth->registerationFee){{date($studentFeeMonth->registerationFee)}}@endisset</td>
                           <td>@isset($studentFeeMonth->student->balance->balance){{date($studentFeeMonth->student->balance->balance)}}@endisset</td>
                           <td>@isset($studentFeeMonth->fine){{date($studentFeeMonth->fine)}}@endisset</td>
                           <td><i>@isset($studentFeeMonth->total_fee){{date($studentFeeMonth->total_fee)}}@endisset &nbsp;&nbsp;</i> </td>
                           <td><i>@isset($studentFeeMonth->fee_due_date2){{date("d-M-y", strtotime(date($studentFeeMonth->fee_due_date2)))}}@endisset</td>


                           </tr>

                           @endif
                           @endforeach
                         </tbody>

                       </table>

                     </div>
                   </div>


                   <!-- ////////////////////////////////// Second tab end here ??????????????????????????????????????????? -->
                   <!-- //////////////////////////////////////// here third tab start?????????????????????????????????????????? -->
                   <div role="tabpanel" class="tab-pane" id="messages">
                     <div class="container">
                       <div class="nav_bva" style="margin-top: -20px;">
                         @php($counter=1)
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

        @php(($studentFeeMonth=$data->feePostOfMonth($month)))
        @php($classId=$data->course_id)


        @if($data->status==1 && isset($studentFeeMonth) && (($studentFeeMonth->paid_amount)>0))

        <tbody>


          @if(isset($data->course->course_name) && ($levelName!=$data->course->course_name))
          <tr style="margin:5px;">
            <td colspan="14" ><strong>{{$data->course->course_name}}</strong></td>
          </tr>
          @php($levelName=$data->course->course_name)
          @endif




          <tr>
            <td>{{$counter++}}</td>
            <td style="text-align: left!important;"><i>{{$data->s_name}}&nbsp; &nbsp; {{$data->s_phoneNo}}</td>
              <td style="text-align: left!important;"><i>@isset($data->id){{$data->id}}@endisset</td>
               <td>@isset($studentFeeMonth->id){{$studentFeeMonth->id}}@endisset </td>
               <td>@isset($studentFeeMonth->BankFeeDeposit->bank->bank_name){{$studentFeeMonth->BankFeeDeposit->bank->bank_name}}@endisset </td>
               <td>@isset($studentFeeMonth->BankFeeDeposit->deposite_date){{date("d-m-y", strtotime(date($studentFeeMonth->BankFeeDeposit->deposite_date)))}}@endisset </td>
               <td>@isset($studentFeeMonth->total_fee){{($studentFeeMonth->total_fee)+($studentFeeMonth->corrected_amount)}}@endisset </td>
               <td>@isset($studentFeeMonth->total_fee){{($studentFeeMonth->corrected_amount)}}@endisset </td>

               <td>@isset($studentFeeMonth->total_fee){{($studentFeeMonth->total_fee)}}@endisset </td>

               <td>@isset($studentFeeMonth->BankFeeDeposit->paid_amount){{$studentFeeMonth->BankFeeDeposit->paid_amount}}@endisset </td>
               <!-- <td>@isset($studentFeeMonth->insurance_of) {{$studentFeeMonth->insurance_of}}@endisset </td> -->
               <!-- <td> @isset($studentFeeMonth->deffered_amount) {{$studentFeeMonth->deffered_amount}}@endisset </td> -->
              <!--  <td>@isset($data->studentFee->Net_AnnualFee) {{round(($data->studentFee->Net_AnnualFee)/12)}} * {{$data->studentFee['m'.$month]}}@endisset </td>
               <td>@isset($studentFeeMonth->fee_due_date2){{ $studentFeeMonth->paid_amount}} @if($studentFeeMonth->paid_date) {{date("d-M-y", strtotime(date($studentFeeMonth->paid_date))) }} @endif @endisset</td>

               <td>@isset($studentFeeMonth->transport_fee){{date($studentFeeMonth->transport_fee)}}@endisset</td>
               <td>@isset($studentFeeMonth->student->balance->balance){{date($studentFeeMonth->student->balance->balance)}}@endisset</td>
               <td>@isset($studentFeeMonth->fine){{date($studentFeeMonth->fine)}}@endisset</td>
               <td><i>@isset($studentFeeMonth->total_fee){{date($studentFeeMonth->total_fee)}}@endisset &nbsp;&nbsp;</i> </td>
               <td><i>@isset($studentFeeMonth->fee_due_date2){{date("d-M-y", strtotime(date($studentFeeMonth->fee_due_date2)))}}@endisset</td> -->


               </tr>

               @endif

               @endforeach
             </tbody>

           </table>

         </div>
         <!-- ////////////////////////////////////// Here 3 Tab end ??????????????????????????????????????????????? -->
         <div role="tabpanel" class="tab-pane" id="settings">
          <div class="nav_bva" style="margin-top: -5px;">
           @php($counter=1)
           Outstanding list for <span>&nbsp;&nbsp; @isset($monthName){{$monthName}}@endisset/@isset($year){{$year}}@endisset </span>
         </div>
         <br>
         <div style="float: left;margin-top: -15px;"><strong><h4>{{$branch->branch_name}}</h4></strong></div>

         <div style="width: 40%;"></div>

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
               <th ><div style="transform: rotate(90deg);padding: 0px; max-width: 37px; font-size: 8pt; font-weight: bold;"  >adm / reg </div></th>
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

          @php(($studentFeeMonth=$data->feePostOfMonth($month)))
          @php($classId=$data->course_id)



          @if($data->is_active==1 && isset($studentFeeMonth) && ($studentFeeMonth->paid_amount<=0))
          <tbody>


            @if(isset($data->course->course_name) && ($levelName!=$data->course->course_name))
            <tr style="margin:5px;">
              <td colspan="14" ><strong>{{$data->course->course_name}}</strong></td>
            </tr>
            @php($levelName=$data->course->course_name)
            @endif




            <tr>
              <td>{{$counter++}}</td>
              <td style="text-align: left!important;"><i>{{$data->s_name}}&nbsp; &nbsp; {{$data->s_phoneNo}}</td>
                <td style="text-align: left!important;"><i>@isset($data->id){{$data->id}}@endisset</td>
                 <td>@isset($studentFeeMonth->id){{$studentFeeMonth->id}}@endisset </td>
                 <td>@isset($studentFeeMonth->examfee){{$studentFeeMonth->examfee}}@endisset </td>
                 <td>@isset($studentFeeMonth->utility_fee){{$studentFeeMonth->utility_fee}}@endisset </td>
                 <td>@isset($studentFeeMonth->statfee){{$studentFeeMonth->statfee}}@endisset </td>
                 <td>@isset($studentFeeMonth->insurance_of) {{$studentFeeMonth->insurance_of}}@endisset </td>
                 <td> @isset($studentFeeMonth->deffered_amount) {{$studentFeeMonth->deffered_amount}}@endisset </td>
                 <td>@isset($data->studentFee->Net_AnnualFee) {{($data->studentFee->Net_AnnualFee)/12}} * {{$data->studentFee['m'.$month]}}@endisset </td>
                 <td>@isset($studentFeeMonth)
                  @if($studentFeeMonth->outstand_lastmonth > 0)
                  {{date("d-M-Y", strtotime($studentFeeMonth['fee_due_date2']))}}
                  @else
                  {{date("d-M-Y", strtotime($studentFeeMonth['fee_due_date1']))}}
                  @endisset

                @endisset</td>

                <td>@isset($studentFeeMonth->transport_fee){{date($studentFeeMonth->transport_fee)}}@endisset</td>
                 <td>@isset($studentFeeMonth->admissionFee){{date($studentFeeMonth->admissionFee)}}@endisset / @isset($studentFeeMonth->registerationFee){{date($studentFeeMonth->registerationFee)}}@endisset</td>

                <td>@isset($studentFeeMonth->student->balance->balance){{date($studentFeeMonth->student->balance->balance)}}@endisset</td>
                <td>@isset($studentFeeMonth->fine){{date($studentFeeMonth->fine)}}@endisset</td>
                <td><i>@isset($studentFeeMonth->total_fee){{date($studentFeeMonth->total_fee)}}@endisset &nbsp;&nbsp;</i> </td>
                <td><i>@isset($studentFeeMonth->fee_due_date1)
                 @if($studentFeeMonth->outstand_lastmonth > 0)
                 {{date("d-M-Y", strtotime($studentFeeMonth['fee_due_date2']))}}
                 @else
                 {{date("d-M-Y", strtotime($studentFeeMonth['fee_due_date1']))}}
                 @endisset
               @endisset</td>


             </tr>

             @endif
             @endforeach
           </tbody>

         </table>

       </div>
       <!--  //////////////////////// ?????????????????????????????????????? -->
       <div role="tabpanel" class="tab-pane" id="extra">Tab-----------5</div>
     </div>

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
