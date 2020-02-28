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
			<div id="printAllRecord" style="height: 1000px;">

				<style>
   .bcardw {
  display: inline-block;
  width: 320px;
  height:465px;
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

.phone {
    position: relative;
    top: 8px;
    margin-bottom: 1px;
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
  top: 0px;
  left: 0px;
}
@media print {
.bcardw {
    display: inline-block;
    width: 300px;
    height: 465px;
    margin: 15px;
    padding: 10px;
    box-shadow: 2px 2px 8px 2px #888;
    border-radius: 3px;
    font-family: sans-serif;
    background-color: white;
}
.phone {
    position: relative;
    top: 8px;
    margin-bottom: 2px;
    left: 0px;
}
.box2_2{
  width: 250px; margin: 0 auto; text-align: left;
}
* {
    -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
    color-adjust: exact !important;  /*Firefox*/
  }

}
 
 
  </style>
  @isset($record)
@foreach($record as $std)
<div class="bcardw" style="background-image: url('{{asset('images/school/schools_img.jpg')}}'); background-size: cover;">

  <div class="logo_heading" style="margin: 0 auto; max-width: 100px;    padding-top: 20px;">
                  <img src="" width="100%"  style="min-height: 100px;">
                </div>
  <div class="nsad" style="width: 142px; margin: 0 auto; margin-left: 70px; margin-top: 3px;">
   <img src="@if($std->images) {{asset('images/staff/'.$std->images)}} @else {{asset('images/staff/no-image.png')}} @endif" class="rounded-circle"  style="border-radius: 50%; 
   width: 147px;
    height: 147px;
    border: 3px solid red;" >
 </div>

   <div class="phone" style="text-align: center;font-size: 16px;"><strong>@isset($std->name){{$std->name}} @endisset &nbsp;&nbsp; </strong></div>
  <div class="box2_2" style="width: 240px; margin: 0 auto; text-align: left;">

  <div class="phone" style="margin-bottom: 2px!important;"><strong>Employee No &nbsp;&nbsp;:&nbsp;</strong> <span>@isset($std->emp_id){{$std->emp_id}}@endisset</span> </div>
  <div class="phone" style="margin-bottom: 2px!important;"><strong>Designation &nbsp;&nbsp;:&nbsp;</strong><span>@isset($std->desig){{$std->desig->designation}}@endisset</span></div>
    <div class="phone" style="margin-bottom: 2px!important;"><strong>Branch &nbsp; &nbsp;&nbsp;:&nbsp;</strong> <span>@isset($std->branch->branch_name){{ $std->branch->branch_name}}@endisset</span></div>

  <br>
  <div class="phone"></div>
  </div>
  <div class="zip" style="margin-top: 13px;">
    <div style="width: 120px;
    height: 25px;
    padding: 2px 4px;
    text-align: center;
    margin-top: 8px;

    border: 1px solid #ccc;">
  <img src="data:image/png;base64,{{  DNS1D::getBarcodePNG($std->emp_id, 'C39+',3,40) }}" alt="barcode"  width="100%" />
</div>
</div>
<div style="float: right; width: 69px; margin-top: -62px;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(70)->generate($std->emp_id)) !!} ">
  </div>
</div>

@endforeach
@endisset
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
    
    // begin of barcode
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
