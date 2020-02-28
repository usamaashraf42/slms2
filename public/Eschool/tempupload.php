<?php 
  include 'connect.php';
  $pic_bytes=$_POST['pic_bytes'];

  if (empty($_POST['pic_bytes'])) {  
 
  $response["success"] = 0; 
  $response["message"] = "One or more of the fields are empty ."; 
 
  die(json_encode($response)); 
  }     
    $name=Time();
    $path = "Eschool/uploadpics/$name.png";
    
    $actualpath = "http://lyceumgroupofschools/$path";

  //mysqli_query($conn,"insert into tbl_usr(usr_mail,usr_pwd,usr_name,usr_cell,usr_pic)values('$usr_mail','$usr_pwd','$usr_name','$usr_cell','$actualpath')");
 // $result=$conn->affected_rows;
 //if ($result>=1){
   file_put_contents($path,base64_decode($usr_pic));
 // $response["success"] = 1; 
 // $response["message"] = "User Sign Up SuccessFully";
 // }else{
  //  $response["success"] = 0; 
  //  $response["message"] = "Error..!! Try Again";
 // }
 // die(json_encode($response)); 
 
 // mysql_close(); 
 //   $response["success"] = 1; 
 // $response["message"] = "".$actualpath;
  
  ?>    