@extends('_layouts.admin.default')
@section('title', 'Tentative')
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
            Tentative list for <span>&nbsp;&nbsp; @isset($monthName){{$monthName}}@endisset/@isset($year){{$year}}@endisset </span>
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
            <th> Std Id#</th>
            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 35px; font-size: 8pt; font-weight: bold;"> Exam / labFee</div></th>
            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 35px; font-size: 8pt; font-weight: bold;"> AC / libFee</div></th>
            
            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 35px; font-size: 8pt; font-weight: bold;"> misc1 / misc2</div></th>
            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 35px; font-size: 8pt; font-weight: bold;"> compFee / statFee</div></th>

            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 35px; font-size: 8pt; font-weight: bold;"> insurance</div></th>

            <th><div style="transform: rotate(90deg);padding: 0px; min-width: 60px; font-size: 8pt; font-weight: bold;"> Net Fee</div></th>

            <th><div style="transform: rotate(90deg);padding: 0px; min-width: 60px; font-size: 8pt; font-weight: bold;"> Current Fee</div></th>

            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Outstanding </div></th>

            <th > <div style="transform: rotate(90deg);padding: 0px; max-width: 44px; font-size: 8pt; font-weight: bold;font-size: 9pt;">Fine</div></th>

            <th> <div style="transform: rotate(90deg);padding: 0px; max-width: 38px; font-size: 8pt; font-weight: bold;font-size: 8pt;">Total To Be Posted</div></th>






          </tr>
        </thead>


        @php($outstanding_balance=0)
        @php($totalFine=0)
        @php($total_fee=0)
        @php($current_fee=0)
        @php($std_fee=0)
        @php($totalOutStd=0)
        @foreach($branch->student as $data)

        @php($classId=$data->course_id)

        @if($data->is_active==1 && $data->is_freeze!='0')
        <tbody>


          @if(isset($data->course->course_name) && ($levelName!=$data->course->course_name))
          <tr style="margin:5px;">
            <td colspan="14" ><strong>{{$data->course->course_name}}</strong></td>
          </tr>
          @php($levelName=$data->course->course_name)
          @endif

          @php($std_fee=0)


          <tr>
            <td>{{$counter++}}</td>
            <td style="text-align: left!important;"><i>{{$data->s_name}}&nbsp; &nbsp; {{$data->s_phoneNo}} &nbsp; &nbsp; @if($data->is_freeze=='0') <span class="badge badge-info">freeze</span> @endif</td>
              <td style="text-align: left!important;"><i>@isset($data->id){{$data->id}}@endisset</td>

                <td>
                  @if($examFee)
                  @isset($data->grade->exam_fee)
                  @php($std_fee+=$data->grade->exam_fee)
                  {{$data->grade->exam_fee}} 
                  @endisset

                  @else
                  0
                  @endif
                  / 
                  @if($labFee)
                  @isset($data->grade->lab_fee)
                  @php($std_fee+=$data->grade->lab_fee)
                  {{$data->grade->lab_fee}}
                  @endisset 
                  @else
                  0
                  @endif



                </td>

                <td>

                  @if($acFee)
                  @isset($data->grade->ac_charge)
                  @php($std_fee+=$data->grade->ac_charge)
                  {{$data->grade->ac_charge}}
                  @endisset
                  @else
                  0
                  @endif

                  / 
                  @if($libFee)
                  @isset($data->grade->lib_fee)
                  @php($std_fee+=$data->grade->lib_fee)
                  {{$data->grade->lib_fee}}

                  @endisset 
                  @else
                  0
                  @endif

                </td>

                <td>@if(isset($misc1))
                  @php($std_fee+=$misc1)
                  {{$misc1}}
                  @else
                  0
                  @endif
                  / @if(isset($misc2))
                  @php($std_fee+=$misc2)
                  {{$misc2}}
                  @else
                  0
                  @endif
                </td>

                <td>
                  @if($compFee)
                  @isset($data->grade->computer_fee)
                  @php($std_fee+=$data->grade->computer_fee)
                  {{$data->grade->computer_fee}}@endisset 
                  @else
                  0
                  @endif

                  / 
                  @if($statFee)
                  @isset($data->grade->stationary)
                  @php($std_fee+=$data->grade->stationary)
                  {{$data->grade->stationary}}
                  @endisset 
                  @else
                  0
                  @endif

                </td>

                <td>

                  @isset($data->grade->insurance_of)
                  @php($std_fee+=$data->grade->insurance_of)
                  {{$data->grade->insurance_of}}@endisset 

                  @endisset
                </td>

                <td>
                  @if($tutionFee)
                  @isset($data->studentFee->Net_AnnualFee)
                  @php($std_fee+=(($data->studentFee->Net_AnnualFee)/12) * ($data->studentFee['m'.$month]) )
                  {{($data->studentFee->Net_AnnualFee)/12}} * {{$data->studentFee['m'.$month]}}
                  @endisset 
                  @else
                  0
                  @endif
                </td>
                <td>@isset($data->studentFee->Net_AnnualFee)

                  @php($current_fee+=(  (($data->studentFee->Net_AnnualFee)/12) * ($data->studentFee['m'.$month])))
                  {{ ((($data->studentFee->Net_AnnualFee)/12) * ($data->studentFee['m'.$month])) }}
                @endisset </td>


                <td>@isset($data->account->LedgerBalance->balance)
                  @php($outstanding_balance+=$data->account->LedgerBalance->balance )
                  @if($outType)

                  @php($std_fee+=$data->account->LedgerBalance->balance  )
                  @endif

                  @if($data->account->LedgerBalance->balance)
                  @php($totalOutStd++)
                  @endif

                  {{ $data->account->LedgerBalance->balance}} 
                @endisset</td>


                <td>
                  @isset($data->account->LedgerBalance->balance)

                  @php($std_fee+=(($data->account->LedgerBalance->balance) >=1000?800:0 ) )
                  @php($totalFine+=(($data->account->LedgerBalance->balance) >=1000?800:0 ))
                  {{(($data->account->LedgerBalance->balance) >=1000?800:0 )}}
                  @endisset


                </td>


                @php($total_fee+=$std_fee)

                <td>{{ $std_fee}}</td>


              </tr>


              @endforeach

              <tr>
               <td colspan="9"> Total</td>
               <td>{{round($current_fee)}}</td>
               <td>{{round($outstanding_balance)}}</td>
               <td>{{round($totalFine)}}</td>
               <td>{{round($total_fee)}}</td>
             </tr>
           </tbody>


         </table>
         @endforeach

         <br>
       </br>
       <h4><b>Summary:</b></h4>
       <table>
         <thead>
           <tr>
             <th>Total student</th>
             <th>Oustanding Student</th>
             <th>Outstanding Amount</th>
             <th>Total Fine</th>
             <th>Current Fee</th>
             <th>Total Fee</th>
           </tr>
         </thead>
         <tbody>
           <tr>
             <td>{{$counter}}</td>
             <td>{{$totalOutStd}}</td>
             <td>{{round($outstanding_balance)}}</td>
             <td>{{round($totalFine)}}</td>
             <td>{{round($current_fee)}}</td>
             <td>{{round($total_fee)}}</td>
           </tr>
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
