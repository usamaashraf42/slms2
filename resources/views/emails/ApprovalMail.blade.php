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
<h2>Subject: Login and Role Approval Information</h2>
<p>Dear {{$user->name}},</p>
<p>Your login has been approved with the following details:</p>

<div class="box">
<p><strong>Name : </strong><span style=" padding-left: 10px; text-align: center;"> {{$user->name}}</span></p>
<p><strong>Role Approved:</strong><span style=" padding-left: 10px; text-align: center;"> @isset($user->roles){{roleImplode($user->roles)}}@endisset</span></p>
<p ><strong>Branch:</strong><span style=" padding-left: 10px; text-align: center;"> @isset($user->branch){{$user->branch->branch_name}}@endisset</span></p>
<p><strong>Account Status:</strong><span style=" padding-left: 10px; text-align: center;"> @if($user->activity) Active @else Inactive @endif</span></p>
<p>If you want to change the role or want to get another role please Request to<strong>web@americanlyceum.com</strong></p>
<div>
</div>
</div>
  <p>
    You can <a class="nari" href="{{route('admin.login')}}">Login</a> to get access to the web portal. 
  </p>

<div>
  <p>
    For any further information send email at <strong>web@americanlyceum.com</strong>
  </p>
</div>
  <br><br>
<strong> Thank you,</strong>
<strong>IT Team (SLMS)</strong>
<p><strong>Email: web@americanlyceum.com</strong></p>
<p><strong>www.americanlyceum.com</strong></p>
