<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <style>
    p{
      margin-top: 3px;
      margin-bottom: 3px;
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
      /* background: aliceblue; */
    width: 30%;
    color: black;
    border: 1px solid #ccc;
    /* background: #006ac5; */
    padding: 15px;
}
</style>
<br>
<h2>Subject: Email Verification</h2>
<p>Dear {{$user->name}},</p>

<br>
<div style=" width: 50%;">Your Verification code is: <strong>{{$user->verifyUser->token}}</strong></div>
<br>
<p>Enter it <a href="{{url('admin/verify', $user->email)}}">here</a> or on the page where it is required. </strong>
  <br>
  <div style=" width: 50%;"> Verification code: <strong>{{$user->verifyUser->token}}</strong></div>
  <div style=" width: 50%;"><a class="nari" href="{{url('admin/verify', $user->email)}}">Verify Here</a></div>
<strong>Thank you,</strong>
<strong>IT Team (SLMS)</strong>
​
<p><strong>Email: web@americanlyceum.com</strong></p>
<p><strong>www.americanlyceum.com</strong></p>
​
​