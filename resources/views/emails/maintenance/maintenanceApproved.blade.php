<!DOCTYPE html>
<html>
<head>
  <title>Maintenance approval request approved</title>
</head>
<body>
  <style>
    p{
      margin-top: 1px;
      margin-bottom: 1px;
      font-size: 19px;
      font-family: auto;
    }
    </style>
  <div style="background-color: #fff;text-align: justify;">

    <strong><p>Dear Maintenance Manager! </p></strong>
  

  <div>
   
    <p>
     Your sent request for {{isset($data->branch->branch_name)?$data->branch->branch_name:''}}  - ( {{isset($data->category->main_name)?$data->category->main_name:''}} {{isset($data->subcategory->main_name)?$data->subcategory->main_name:''}} ) { {{isset($data->description)?$data->description:''}} } has been approved. Kindly do the needful at its earliest.

    </p>
  </div>

  </div>
  
  <p> For any queries or help please feel free to contact us.</p>
  <img src="http://lyceumgroupofschools.com/assets/img/logo.png" alt="" height="60" width="60">
  <p>American Lyceum,</p>
  <p></p>
  <a href="https://www.lyceumgroupofschools.com">https://www.lyceumgroupofschools.com</a>
  <p><strong>info@americanlyceum.com</strong></p>
  <!-- <p><strong>03-111-4444-92</strong></p> -->

</body>
</html>