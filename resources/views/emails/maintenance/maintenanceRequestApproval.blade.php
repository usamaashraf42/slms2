<!DOCTYPE html>
<html>
<head>
  <title>Email to Senior Management for approval</title>
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

    <strong><p>Respected Sir! </p></strong>
  

  <div>
   
    <p>
     I am sending this maintenance request of {{isset($data->branch->branch_name)?$data->branch->branch_name:''}}  - ( {{isset($data->category->main_name)?$data->category->main_name:''}} {{isset($data->subcategory->main_name)?$data->subcategory->main_name:''}} ) { {{isset($data->description)?$data->description:''}} }  to you. for your kind approval. Kindly approve this so I may proceed further.

    </p>
  </div>

  </div>
  
  <p> Regards,</p>

  <p>American Lyceum International School,</p>
  <p>Maintenance Manager</p>
  <a href="https://www.lyceumgroupofschools.com">https://www.lyceumgroupofschools.com</a>
  <img src="http://lyceumgroupofschools.com/assets/img/logo.png" alt="" height="60" width="60">
  <p><strong>info@americanlyceum.com</strong></p>
  
 <!--  <p><strong>03-111-4444-92</strong></p> -->

</body>
</html>