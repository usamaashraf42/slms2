<style>
  #div_one{
  
width: 50%;
  display: inline-block!important;
  
  }
  #box_pla{
    max-width: 450px!important;
  }
  #box_pla{
   display: inline-block!important;
  }
  table {
  font-family: arial, sans-serif!important;
  border-collapse: collapse!important;
  width: 100%!important;
}

td, th {
  border: 1px solid #000000!important;
  text-align: left!important;
  padding: 4px!important;
  font-size: 13px!important;
}

.div_one7, tr:nth-child(odd) {
  background-color: #cbe6f3!important;
}
</style> 
<br>

<div><h2>Subject: New Admission</h2></div>
<div style="max-width: 450px;">
<p>Dear Manager,</p>
<p>Congratulations at admission in  American Lyceum. Following are the details of the admission:</p>


  <div style="width: 50%;float: left;"><strong>Student Number Issued</strong></div><div style="width: 50%;float: right;"><span>: {{$data->id}} </span></div>
<div style="width: 50%;float: left;"><strong>Student Admitted in    </strong></div><div style="width: 50%;float: right;"><span>: @isset($data->Branchs){{$data->Branchs->branch_name}}@endisset</span></div>

<div style="width: 50%;float: left;"><strong>Name of Student  </strong></div><div style="width: 50%;float: right;"><span>:@isset($data->s_name){{$data->s_name}}@endisset</span></div>
<div style="width: 50%;float: left;"><strong>Father's Name  </strong></div><div style="width: 50%;float: right;"><span>: @isset($data->s_fatherName){{$data->s_fatherName}}@endisset</span></div>
<div style="width: 50%;float: left;"><strong>Grade</strong></div><div style="width: 50%;float: right;"><span>: @isset($data->course->course_name){{$data->course->course_name}}@endisset</span></div>
<div style="width: 50%;float: left;"><strong>Emergency Number </strong></div><div style="width: 50%;float: right;"><span>: @isset($data->emergency_mobile){{$data->emergency_mobile}}@endisset</span></div>
<div style="width: 50%;float: left;"><strong>Annual Fee</strong></div><div style="width: 50%;float: right;"><span>: @isset($data->studentFee->annual_fee){{$data->studentFee->annual_fee}}@endisset</span></div>
<div style="width: 50%;float: left;"><strong>Annual Scholarship </strong></div><div style="width: 50%;float: right;"><span> :@isset($data->studentFee->scholarship_of){{$data->studentFee->scholarship_of}}@endisset</span></div>
<div style="width: 50%;float: left;"><strong>To be paid in Installments</strong></div><div style="width: 50%;float: right;"><span>: @isset($data->studentFee->installment_no){{$data->studentFee->installment_no}}@endisset </span></div>
<!-- <div class="div_one"><strong>Payment made at the time of Admission</strong></div><div class="div_one"><span>@isset($data->emergency_mobile){{$data->emergency_mobile}}@endisset</span></div> -->
<!-- <div class="div_one"><strong>Pending Payment</strong></div><div class="div_one"><span>:  @isset($data->emergency_mobile){{$data->emergency_mobile}}@endisset</span></div> -->

<div style="width: 50%;float: left;"><strong>Payment Schedule</strong></div><div class="div_one"><span>: </span></div>
</div>

<table class="div_one7"  style="max-width: 550px;margin-top: 4px;max-width: 550px;margin-top: 4px;">
  <tr style="background: #bce0ff;">
    <th>Month</th>
    <th>Amount to pay</th>
    <th>Month</th>
    <th>Amount to pay</th>
    <th>Month</th>
    <th>Amount to pay</th>
  </tr>
  <tr>
    <td>Jan</td>
    <td>@isset($data->studentFee->m1){{round(($data->studentFee->m1)*(($data->studentFee->Net_AnnualFee)/12))}}@endisset</td>
    <td>Feb</td>
    <td>@isset($data->studentFee->m2){{round(($data->studentFee->m2) *(($data->studentFee->Net_AnnualFee)/12))}}@endisset</td>   
    <td>March</td>
    <td>@isset($data->studentFee->m3){{round(($data->studentFee->m3) *(($data->studentFee->Net_AnnualFee)/12))}}@endisset</td>
  </tr>
  <tr style="background: #bce0ff;">
    <td>April</td>
    <td>@isset($data->studentFee->m4){{round(($data->studentFee->m4) *(($data->studentFee->Net_AnnualFee)/12))}}@endisset</td>
    <td>May</td>
    <td>@isset($data->studentFee->m5){{round(($data->studentFee->m5) *(($data->studentFee->Net_AnnualFee)/12))}}@endisset</td>   
    <td>June</td>
    <td>@isset($data->studentFee->m6){{round(($data->studentFee->m6) *(($data->studentFee->Net_AnnualFee)/12))}}@endisset</td>
  </tr>
  <tr>
    <td>July</td>
    <td>@isset($data->studentFee->m7){{round(($data->studentFee->m7) *(($data->studentFee->Net_AnnualFee)/12))}}@endisset</td>
    <td>Aug</td>
    <td>@isset($data->studentFee->m8){{round(($data->studentFee->m8) *(($data->studentFee->Net_AnnualFee)/12))}}@endisset</td>   
    <td>Sep</td>
    <td>@isset($data->studentFee->m9){{round(($data->studentFee->m9) *(($data->studentFee->Net_AnnualFee)/12))}}@endisset</td>
  </tr>
    <tr style="background: #bce0ff;">
    <td>Oct</td>
    <td>@isset($data->studentFee->m10){{round(($data->studentFee->m10) *(($data->studentFee->Net_AnnualFee)/12))}}@endisset</td>
    <td>Nov</td>
    <td>@isset($data->studentFee->m11){{round(($data->studentFee->m11) *(($data->studentFee->Net_AnnualFee)/12))}}@endisset</td>   
    <td>Dec</td>
    <td>@isset($data->studentFee->m12){{round(($data->studentFee->m12) *(($data->studentFee->Net_AnnualFee)/12))}}@endisset</td>
  </tr>
</table>
<p>We are passionate to ENABLE GREATNESS in this child. Lets gear up for this mission. <br>
(If any information is wrong, Please send email to
<strong><a href="www.americanlyceum.com">web@americanlyceum.com</a></strong></p>
  <br><br>
<p> Admission Officer</p>
<p>American Lyceum</p>
<p><strong>Cell:03224772704</strong></p>
<p><strong><a href="www.americanlyceum.com">www.americanlyceum.com</a></strong></p>
<br>

