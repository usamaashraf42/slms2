@extends('_layouts.admin.default')
@section('title', 'Student')
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
			<div id="printAllRecord" style="height: 1000px;">

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
  height: 22px;
  padding: 0px 5px;
  text-align: center;
  border: 1px solid #ccc;
}
@media print {
   .bcardw {
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
    margin-left: 40px;
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
   <img src="@if($std->images) {{asset('images/student/pics/'.$std->images)}} @else {{asset('images/student/pics/no-image.png')}} @endif" class="rounded-circle"  style="border-radius: 50%; 
  width: 100px;
    height: 100px;
    border: 3px solid red;" >
 </div>
   <div class="phone" style="text-align: center;
    font-size: 12px;margin-bottom: 2px;
    color: #000000;font-weight: bold;"><strong>@isset($std->s_name){{$std->s_name}} @endisset &nbsp;&nbsp; </strong></div>
  <div class="box2_2" style="width: 200px; margin: 0 auto; text-align: left;">
  <div class="phone"><strong>Branch:&nbsp;</strong> <span>@isset($std->branch){{$std->branch->branch_name}}@endisset</span> </div>
  <div class="phone"><strong>Class &nbsp;&nbsp;:</strong> <span>@isset($std->course){{$std->course->course_name}}@endisset</span> </div>
  <div class="phone"><strong>ID No &nbsp;&nbsp;:&nbsp;</strong> <span>@isset($std->id){{$std->id}}@endisset</span> </div>
  <div class="phone"><strong>Ph No &nbsp;:&nbsp;</strong><span>@isset($std->emergency_mobile){{$std->emergency_mobile}}@endisset</span></div>
  <div class="phone"><strong>Expiry :&nbsp;</strong> <span>30 Aug 2020</span></div>
  <div class="phone"></div>
  </div>
  <div class="zip" style="margin-left: 2px;">
    <div class="box_pading">
  <img src="data:image/png;base64,{{  DNS1D::getBarcodePNG($std->id, 'C39+',3,40) }}" alt="barcode"  width="100%" style="margin-top: 2px;">
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

var barCode = (function (){
  this.WHITE = 'rgb(255, 255, 255)';
  this.BLACK = 'rgb(0, 0, 0)';
  this.THIN_BAR = 1;
  this.THICK_BAR = 3;

  this.lastPixel = 0;
  
  this.drawBar = function (barWidth, color) {
    this.ctx.fillStyle = color;
    this.ctx.fillRect(this.lastPixel, 0, barWidth, this.canvas.height);
    this.lastPixel += barWidth;
  };
  
  this.draw2of5BarCode = function (barcodeNumber) {
    var barCodes = ['00110', '10001', '01001', '11000', '00101', '10100', '01100', '00011', '10010', '01010'];
    
    for (var f1 = 9; f1 >= 0; f1--) {
      for (var f2 = 9; f2 >= 0; f2--) {
        var f = f1 * 10 + f2;
        var texto = '';
        for (var i = 0; i < 5; i++) {
          texto += barCodes[f1].substr(i, 1) + barCodes[f2].substr(i, 1);
        }
        barCodes[f] = texto;
      }
    }
    this.drawBar(this.THIN_BAR, this.BLACK);
    this.drawBar(this.THIN_BAR, this.WHITE);
    this.drawBar(this.THIN_BAR, this.BLACK);
    this.drawBar(this.THIN_BAR, this.WHITE);
    if (barcodeNumber.length % 2 != 0) {
      barcodeNumber = '0' + barcodeNumber;
    }
    do {
      var i = Number(barcodeNumber.substr(0, 2));
      if (barcodeNumber.length == 2) {
        barcodeNumber = '';
      } else {
        barcodeNumber = barcodeNumber.substr(2, barcodeNumber.length - 2);
      }
      
      var f = barCodes[i];
      
      for (i = 0; i < 10; i += 2) {
        if (f.substr(i, 1) == '0') {
          this.drawBar(this.THIN_BAR, this.BLACK);
        } else {
          this.drawBar(this.THICK_BAR, this.BLACK);
        }
        if (f.substr(i + 1, 1) == '0') {
          this.drawBar(this.THIN_BAR, this.WHITE);
        } else {
          this.drawBar(this.THICK_BAR, this.WHITE);
        }
      }
    } while(barcodeNumber.length > 0);
    this.drawBar(this.THICK_BAR, this.BLACK);
    this.drawBar(this.THIN_BAR, this.WHITE);
    this.drawBar(this.THIN_BAR, this.BLACK);
  }
  
  this.drawBarcode = function (canvasId, barcodeNumber) {
    this.canvas = document.getElementById(canvasId);

    // verify canvas support
    if (!this.canvas.getContext) {
      return;
    }

    this.lastPixel = 0;
    this.ctx = this.canvas.getContext('2d');
    this.draw2of5BarCode(barcodeNumber);
  };
  
  return this;
})();


barCode.drawBarcode('barcode', '856000000005227702201707619934651263800000000003');
</script> 
@endpush
