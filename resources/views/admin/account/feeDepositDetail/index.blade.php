@extends('_layouts.admin.default')
@section('title', 'Fee Deposit Detail')
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



    <div class="col-md-12">

      <button style="font-size:36px;color:#000d82;" onclick="printDivs(this,DivIdToPrint);"> <i class="fa fa-print"></i><br><input type='button' id='btn' value='Print'  class="btn btn-primary float-center allrecord"></button>
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

        <div class="col-md-10" style="margin-top: 40px;">

         <div class="container">
           <div class="nav_bva" style="margin-top: -20px;">
            Fee Deposit Detail for <span>&nbsp;&nbsp; @isset($monthName){{$monthName}}@endisset/@isset($year){{$year}}@endisset </span>
          </div>
          <br>
          <div style="float: left;margin-top: -15px;"><strong><h4>@isset($fees[0]->branch->branch_name){{$fees[0]->branch->branch_name}} @endisset</h4></strong></div>

          <div style="width: 40%;"></div>
        </div>
        <br>
        <table class="table">
         <thead>

          <tr>
            <th></th>
            <th style="max-width: 100px!important;"><strong><h4>@isset($fees[0]->branch->branch_name){{$fees[0]->branch->branch_name}} @endisset</h4></strong></th>
            <th> Ly No</th>
            <th> FeeId</th>
            <th> <div style="transform: rotate(90deg);max-width: 44px;">Bank</div></th>
            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 30px; font-size: 8pt; font-weight: bold;"> Deposit Date</div></th>


            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Deposit Amount </div></th>
           



          </tr>
        </thead>
       

        

        <tbody>


           @foreach($fees as $data)
          <tr>
            <td>{{$counter++}}</td>
            <td style="text-align: left!important;"><i>
              @if(isset($data->student->s_name))
              {{ $data->student->s_name }} &nbsp; &nbsp; {{ $data->student->s_phoneNo }} &nbsp; &nbsp; {{ $data->student->s_name}}&nbsp; &nbsp; @if($data->student->is_freeze=='0') <span class="badge badge-info">freeze</span> @endif
              @endif
            </td>
              <td style="text-align: left!important;"><i>
                @isset($data->std_id){{$data->std_id}}@endisset</td>
               <td>@isset($data->fee_id){{$data->fee_id}}@endisset </td>
               <td>@isset($data->bank->bank_name){{$data->bank->bank_name}}@endisset </td>
               <td>@isset($data->deposite_date){{date("d-m-y", strtotime(date($data->deposite_date)))}}@endisset </td>



               <td>@isset($data->paid_amount){{$data->paid_amount}}@endisset </td>

               </tr>

      
               @endforeach
             </tbody>
           </table>


        

         <br>
       </br>
       <h4><b>Summary:</b></h4>
       <table>
         <thead>
           <tr>
             <th>Bank</th>
             <th>Deposit Std</th>
             <th>Deposit Amount</th>
            
           </tr>
         </thead>
         <tbody>
          @php($bankName=0)
          @php($depositStd=0)
          @php($depositAmount=0)


          @foreach($BankFees as $banks)
              <tr>
               <th>@isset($banks->bank->bank_name) {{$banks->bank->bank_name}} @endisset</th>
               <th>{{$banks->deposit_stds}}</th>
               <th>{{$banks->depositAmount}}</th>
              
             </tr>
             

          @endforeach
         </tbody>
       </table>

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
