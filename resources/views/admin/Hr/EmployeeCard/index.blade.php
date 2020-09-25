@extends('_layouts.admin.default')
@section('title', 'Employee Card')
@section('content')

<div class="content container-fluid">
  <div class="box5">
    <div class="box2 col-sm-12 col-lg-12 col-xl-12">
      <div class="box2">
        <button style="font-size:36px;color:#000d82;" onclick="printDiv(this,printAllRecord);"> <i class="fa fa-print"></i><br>
          <input type='button' id='btn' value='Print'  class="btn btn-primary float-center allrecord"></button>
       </div>
       <div class="box2">
       </div>
       <br><br>
       <div id="printAllRecord" style="height: 1000px">

        <style>
         .bcardw {
          display: inline-block;
          width: 240px;
          height:370px;
          margin: 15px;
          padding: 10px;
          box-shadow: 2px 2px 8px 2px #888;
          border-radius: 3px;
          font-family: sans-serif;
          background-color: white;
        }
        .company {
          position: relative;
          top: 0px;
          left: 0px;
          background-color: #000!important;
          padding: 5px 10px;
          color: aliceblue;
          font-size: 18px;
        }
        .contact {
          position: relative;
          top: 0px;
          left: 0px;
        }
        .pad_let{
          width: 140px;
          margin: 0 auto;
          margin-left: 58px;
          margin-top: 3px;
        }
        .phone {
          position: relative;
          top: 3px;
          left: 0px;
        }
        .address {
          position: relative;
          top: 0px;
          left: 0px;
        }

        .street {
          position: relative;
          top: 0px;
          left: 0px;
        }

        .city {
          position: relative;
          top: 0px;
          left: 0px;
        }

        .state {
          position: relative;
          top: 0px;
          left: 0px;
        }

        .zip {
          position: relative;
          margin-top: 0px;
          left: 0px;
        }
        .box_pading{
          width: 180px;
          padding: 0px 5px;
          text-align: center;
        }
        @media print {
         .bcardw {
          transform: rotateY(180deg);
          display: inline-block;
          width: 180px;
          height:300px;
          font-size: 12px;
          margin: 15px;
          padding: 10px;
          box-shadow: 2px 2px 8px 2px #888;
          border-radius: 3px;
          font-family: sans-serif;
          background-color: white;
        }

        #printAllRecord{
          display: none;
        }
        

        .company {
          position: relative;
          top: 0px;
          left: 0px;
          background-color: #000!important;
          padding: 5px 10px;
          color: aliceblue;
          font-size: 18px;
        }

        .contact {
          position: relative;
          top: 0px;
          left: 0px;
        }
        .pad_let{
          width: 180px;
          margin: 0 auto;
          margin-left: 30px;
          margin-top: -4px;
        }
        .phone {
          position: relative;
          margin-top: 3px!important;

          left: 0px;
        }
        .address {
          position: relative;
          top: 0px;
          left: 0px;
        }

        .street {
          position: relative;
          top: 0px;
          left: 0px;
        }

        .city {
          position: relative;
          top: 0px;
          left: 0px;
        }
        .box2_2{
          width: 180px;
          margin: 0 auto;
        }
        .state {
          position: relative;
          top: 0px;
          left: 0px;
        }
        .box_pading{
          width: 170px;
        }
        .zip {
          position: relative;
          margin-top: 6px;
          left: 0px;
        }
        * {
          -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
          color-adjust: exact !important;  /*Firefox*/
        }
      }
    </style>
    @foreach($record as $std)
    <div class="bcardw" style="background-image: url('{{asset('images/school/student_3.jpg')}}'); background-size: cover;">
      <div class="logo_heading" style="margin: 0 auto; max-width: 64px;    padding-top: 5px;">
       <img src="{{asset('images/school/logo.png')}}" width="100%" >
     </div>
     <div class="pad_let">
       <img src="@if($std->images) {{asset('images/staff/'.$std->images)}} @else {{asset('images/student/pics/no-image.png')}} @endif" class="rounded-circle"  style="border-radius: 50%; 
       width: 100px;
       height: 100px;
       border: 3px solid red;" >
     </div>
     <div class="phone" style="text-align: center;
     font-size: 12px;margin-bottom: 2px;
     color: #000000;font-weight: bold;"><strong>@isset($std->name){{$std->name}} @endisset &nbsp;&nbsp; </strong>
    </div>
     <div class="box2_2" style="width: 223px; margin: 0 auto; text-align: left;">
      <div class="phone"><strong>Employee No:&nbsp;</strong> <span>@isset($std->emp_id){{$std->emp_id}}@endisset</span> </div>
      <div class="phone"><strong>Designation:</strong> <span style="font-size:10px;font-weight: bold">@isset($std->desig){{$std->desig->designation}}@endisset</span> </div>
      <div class="phone"><strong>Branch &nbsp;&nbsp;:&nbsp;</strong> <span>@isset($std->branch->branch_name){{ $std->branch->branch_name}}@endisset</span> </div>
      <div class="phone"></div>
    </div>
    <div class="zip" style="margin-left: 2px;">
      <div class="box_pading">
        <img src="data:image/png;base64,{{  DNS1D::getBarcodePNG($std->emp_id, 'C39+',3,40) }}" alt="barcode"  width="100%" style="margin-top: 8px;">
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>
</div>
@endsection
@push('post-styles')

@endpush
@push('post-scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script>

  function printDiv(eve,obj)
  {
   console.log('printId',$(obj).attr('id'));

   var divToPrint=document.getElementById($(obj).attr('id'));

   var newWin=window.open('','Print-Window');

   newWin.document.open();

   newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

   newWin.document.close();

   setTimeout(function(){newWin.close();},10);

 }

 
</script> 
@endpush
