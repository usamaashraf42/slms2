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
    width: 325px;
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
    width: 400px;
    color: black;
    border: 1px solid #ccc;
    padding: 15px;
}
</style>
<div style="width: 436px;
    background-color: #f5f5f5;
    padding: 10px; text-align: center;">
  <div style="width: 400px; border-bottom: 2px solid #000;">
      <img src="http://www.lyceumgroupofschools.com/images/school/americanlycesum.png">
 </div>
<br>

<strong><p>Dear {{$user->name}},</p></strong>
<p style="font-weight: bold;color: #34327c;">Please Click <a class="nari" href="{{route('admin.password.reset',$data->token)}}"><button class="btn-success" style="
    border-radius: 10px;
    border: 6px solid #e2e2e2;
    padding: 4px 8px;
    width: 128px;
    border-radius: 10x;
    color: aliceblue;
    font-size: 12px;
    background: #34327c;">Reset Password </button></a> to reset your password.</p>

<br>
<div>
  <p style="text-align: center; width: 400px;">
   <a class="nari" href="{{route('admin.password.reset',$data->token)}}" 
    style="border: 1px solid #000;
    padding: 12px 39px;
    width: 128px;
    color: aliceblue;
    border-radius: 5px;
    margin: 41px;
    font-size: 16px;
    text-decoration: none;
    background: #34327c;
    margin: 0 auto;">Reset Password</a>  
  </p>
</div>
<div>
  <p>
    For any further information send email at <br> <strong>web@americanlyceum.com</strong>
  </p>
</div>
  <br><br>
<p> Web Portal Administrator,</p>
<p>American Lyceum International School,</p>
​
<p><strong>Email: web@americanlyceum.com</strong></p>
<p><strong>www.americanlyceum.com</strong></p>
</div>
</body>
</html>