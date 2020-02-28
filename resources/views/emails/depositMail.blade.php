<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <style>
    p{
      margin-top: 3px;
      margin-bottom: 1px;
          font-size: 19px;
    font-family: auto;
    }
    .to_mail{
      background: gainsboro;
    width: 25%;
    padding: 21px;
    }
    .nari{
    background: #006ac5;
    text-align: center;
    padding: 8px 20px;
color: #fff;
width: 150px;
  text-decoration: none;
    border-radius: 6px;
    box-shadow: 0px 2px 2px #ccc;
}
.nave{
    width: 30%;
    color: black;
    border: 1px solid #ccc;
    padding: 15px;
}
.box{
  width: 500px;
}
@media screen and (max-width: 600px) {
  .box{
  width: 100%;
}
@media screen and (max-width: 1400px) {
  .box{
  width: 60%;
}
@media screen and (max-width: 1900px) {
  .box{
  width: 60%;
}
  }
</style>
<br>
  <div class="logo_heading" style="width: 300px;">
                <img src="http://www.lyceumgroupofschools.com/images/school/americanlycesum.png">
 </div>
<h2>Subject: Fee of @isset($data->s_name){{$data->s_name}} @endisset Deposited</h2>
<p>Dear @isset($data->s_fatherName){{$data->s_fatherName}}@endisset,</p>

  	<p>
	    Thank you for paying the fee Installment of your child @isset($data->s_name){{$data->s_name}}@endisset of Rs.
		@isset($amount){{$amount}}@endisset on @isset($smsdepositDatest){{$smsdepositDatest}}@endisset in @isset($bankName){{$bankName}}@endisset
	</p>
	<p>
		If there is any error please send email at @isset($data->Branchs){{$data->Branchs->b_emil}}@endisset 
  	</p>


  <br><br>

<strong> Thank you,</strong>
<strong>Account Department</strong>
<p><strong>American Lyceum</strong></p>
<p><strong>@isset($data->Branchs){{$data->Branchs->branch_name}}@endisset</strong></p>
<p><strong>contact of Account Branch</strong></p>
