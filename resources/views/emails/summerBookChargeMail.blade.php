<!DOCTYPE html>
<html>
<head>
  <title>Online payment of summer book</title>
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
<h2>Subject: Online payment of summer book</h2>
<p>Dear {{$user->s_name}},</p>

<br>Your summer book order  for @isset($user->course->course_name) {{ $user->course->course_name }} @endisset has been received. You will receive your order within 7 working days at the following @isset($address) {{ $address }} @endisset </p>
<p>If you do not receive this order within 7 working days, please contact your branch. </p>

 
<strong>Regards,</strong>
<strong>ALIS</strong>
​
​
​