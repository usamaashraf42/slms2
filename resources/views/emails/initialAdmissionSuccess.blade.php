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
<h2>Subject: Initial Online registration</h2>
<p>Dear {{$user->father_name}},</p>

<br>
<p>Congratulations, You {{$user->name}} has been initially registered in schoo</p>
<p>Your Registration Number is ({{$user->id}})
</p>

<p>Our Manager will contact you shortly. In case you have any query please feel free to contact at (branch manager number) or 0330-4292901. 

</p>
 
<strong>Thank you,</strong>
<strong>ALIS</strong>
​
​
​