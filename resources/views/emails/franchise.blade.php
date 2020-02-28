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
      <div class="logo_heading" style="width: 300px;
    height: 180px;">
       <img src="http://lyceumgroupofschools.com/images/school/logooo.png" width="100%" height="100%">
     </div>
     <h2>Subject: Franchise Applicant Record</h2>
     <p>Dear American Lyceum School System,</p>
     <p>New Franchise Applicant Record:</p>

     <div class="box">
      <p><strong>Name : </strong><span style=" padding-left: 10px; text-align: center;"> @isset($first_name){{$first_name}} @endisset</span></p>
      <p><strong>Email: </strong><span style=" padding-left: 10px; text-align: center;"> @isset($email){{$email}}@endisset</span></p>
      <p><strong>phone: </strong><span style=" padding-left: 10px; text-align: center;"> @isset($phone){{$phone}}@endisset</span></p>
      <p><strong>address: </strong><span style=" padding-left: 10px; text-align: center;"> @isset($country_address){{$country_address}}@endisset</span></p>
      <p><strong>area: </strong><span style=" padding-left: 10px; text-align: center;"> @isset($select_area){{$select_area}}@endisset</span></p>
      <p><strong>franchise: </strong><span style=" padding-left: 10px; text-align: center;"> @isset($select_franchise){{$select_franchise}}@endisset</span></p>
      <p><strong>exist_school: </strong><span style=" padding-left: 10px; text-align: center;"> @isset($exist_school){{$exist_school}}@endisset</span></p>
      <p><strong>school_building: </strong><span style=" padding-left: 10px; text-align: center;"> @isset($school_building){{$school_building}}@endisset</span></p>
      <p><strong>number_students: </strong><span style=" padding-left: 10px; text-align: center;"> @isset($number_students){{$number_students}}@endisset</span></p>

      
      <p>If you want to change the role or want to get another role please Request to <strong> web@americanlyceum.com</strong></p>
      <div>
      </div>
    </div>
   

    <div>
      <p>
        For any further information send email at <strong>web@americanlyceum.com</strong>
      </p>
    </div>
    <br><br>
    <strong> Thank you,</strong>
    <p><strong>Email: web@americanlyceum.com</strong></p>
    <p><strong>www.americanlyceum.com</strong></p>