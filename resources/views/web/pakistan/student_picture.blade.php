@extends('_layouts.web.pakistan.default')
@section('content')


<style>
	body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
</style>
<div style="margin-top: 500px;">
	<page size="A4" style="padding: 37px;">
		
<div style="border: 1px solid #ccc;height: 100%; width: 19cm;
  height: 27.5cm; ">
	 <div>
    <p>
        <strong></strong>
    </p>
    <p align="center">
        <strong></strong>
    </p>
    <p>
        <strong> Progress Report</strong>
    </p>
    <p align="center">
        Montessori Advance
    </p>
    <p>
        <img
            width="495"
            height="269"
            src="file:///C:/Users/Shafqat/AppData/Local/Temp/msohtmlclip1/01/clip_image002.jpg"
            alt="http://www.marchintokindergarten.com/wp-content/uploads/2013/02/156270175.jpg"
        />
        Final Semester
    </p>
    <p>
        Student’s Name_____________________________
    </p>
    <p>
        Section: ______Branch:______ Lyceonion #:______
    </p>
    <p>
        Name of Teacher: ______________Session:_______
    </p>
</div>
<br clear="all"/>
</div>





	</page>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@endsection