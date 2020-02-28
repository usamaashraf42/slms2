
  <div style="width: 450px; border-bottom: 2px solid #000;">
      <img src="http://www.lyceumgroupofschools.com/images/school/americanlycesum.png">
 </div>
<h2 >Subject: Welcome to American Lyceum International School </h2>
<div style="max-width: 550px; height: auto;box-shadow: all;">
<p>We welcome you to the family of American Lyceum International School (ALIS). Your child is<br> about to begin one of the most exciting times of his/her life, and everyone in our school wants<br> to help you and your child experience, exciting and memorable</p>
<p>You must have heard that American Lyceum is a special place, and it is! Its depth of character,<br>traditions, diversity, commitment to academic excellence, as well as its experienced and caring <br>faculty contribute to make American Lyceum such an exemplary academic environment. We <br>want you to make your child enjoy the campus and take full advantage of everything <br>American Lyceum has to offer.  </P>
    <p>Our mission is to Enable Primary and Secondary Greatness and we are passionate to enable<br> greatness and leadership skills in your child with your help and facilitation. </p>
  <div style="width: 50%;float: left;"><strong>Student Number Issued</strong></div><div style="width: 50%;float: right;"><span>: {{$data->id}} </span></div>
<div style="width: 50%;float: left;"><strong>Student Admitted in    </strong></div><div style="width: 50%;float: right;"><span>: @isset($data->Branchs){{$data->Branchs->branch_name}}@endisset</span></div>
<div style="width: 50%;float: left;"><strong>Name of Student  </strong></div><div style="width: 50%;float: right;"><span>:@isset($data->s_name){{$data->s_name}}@endisset</span></div>
<div style="width: 50%;float: left;"><strong>Father's Name  </strong></div><div style="width: 50%;float: right;"><span>: @isset($data->s_fatherName){{$data->s_fatherName}}@endisset</span></div>
<div style="width: 50%;float: left;"><strong>Grade</strong></div><div style="width: 50%;float: right;"><span>: @isset($data->course->course_name){{$data->course->course_name}}@endisset</span></div>
<div style="width: 50%;float: left;"><strong>Emergency Number </strong></div><div style="width: 50%;float: right;"><span>: @isset($data->emergency_mobile){{$data->emergency_mobile}}@endisset</span></div>
<div style="width: 50%;float: left;"><strong>Annual Fee</strong></div><div style="width: 50%;float: right;"><span>: @isset($data->studentFee->annual_fee){{$data->studentFee->annual_fee}}@endisset</span></div>
<div style="width: 50%;float: left;"><strong>Annual Scholarship </strong></div><div style="width: 50%;float: right;"><span> :@isset($data->studentFee->scholarship_of){{$data->studentFee->scholarship_of}}@endisset</span></div>
<div style="width: 50%;float: left;"><strong>To be paid in Installments</strong></div><div style="width: 50%;float: right;"><span>: @isset($data->studentFee->installment_no){{$data->studentFee->installment_no}}@endisset </span></div>
<!-- <div style="width: 50%;float: left;"><strong>Payment made at the time of Admission</strong></div><div style="width: 50%;float: left;"><span>@isset($data->emergency_mobile){{$data->emergency_mobile}}@endisset</span></div> -->
<!-- <div style="width: 50%;float: left;"><strong>Pending Payment</strong></div><div style="width: 50%;float: left;"><span>:  @isset($data->emergency_mobile){{$data->emergency_mobile}}@endisset</span></div> -->
</div>
<div style="width: 50%;float: left;"><strong>Payment Schedule</strong></div><div style="width: 50%;float: right;"><span>: </span></div>
</div>
<table style="max-width: 550px;margin-top: 4px;">
  <tr style="background-color: #cbe6f3;">
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
<strong><a href="www.americanlyceum.com">web@americanlyceum.com</a></strong>
  <br><br>
  <p>Again, welcome to ALIS and we look forward to you having a safe and wonderful ALIS Experience! <br>
Please feel free to contact me at the number given on whatsapp for any further information. 
</p>
<p> Branch Manager, <br>
American Lyceum <br>

<span>Contact number of branch</span><br>
<span>email of branch</span><br>
</p>