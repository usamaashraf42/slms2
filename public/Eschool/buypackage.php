<?php

 	$servername = "localhost";
 	$serverUsername = "admin_eschool";
 	$serverPassword = "lv2dadalyceum";
 	$dbName = "admin_eschool";

// Create connection
$conn = new mysqli($servername, $serverUsername, $serverPassword, $dbName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	$_UserId = $_POST['_usr_id'];
	$_CodePost = $_POST['_codePost'];
	
	$sql = "SELECT * FROM packages WHERE Code = '$_CodePost' AND Status = 0";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {

   $row = mysqli_fetch_assoc($result);
   
   echo $row['Id'] . ":" . $row['Duration'];	   
} 
else {
		echo "Wrong Code";	
}
	

$conn->close();
?>