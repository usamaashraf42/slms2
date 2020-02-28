<?php

 	$servername = "localhost";
 	$serverUsername = "admin_slms";
 	$serverPassword = "lv2dadalyceum";
 	$dbName = "admin_slms";

// Create connection
$conn = new mysqli($servername, $serverUsername, $serverPassword, $dbName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	$s_lyceonianNo=$_POST['s_lyceonianNo'];
	
	$sql = "select * from stdinfo where s_lyceonianNo='$s_lyceonianNo' AND is_active = 1";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {

   $row = mysqli_fetch_assoc($result);
   $date = DateTime::createFromFormat("Y-m-d", $row['s_DOB']);
   echo  $row['s_name'] . ":" . $row['s_sex'] . ":" . $date->format("Y") . ":" . $row['s_fatherName'] . ":" . $row['s_phoneNo'] . ":" . $row['std_mail'];		

} 
else {
		echo "0";	
}
	

$conn->close();
?>