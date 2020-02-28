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

	$_UsernamePost=$_POST['_UsernamePost'];
	$_PasswordPost=$_POST['_PasswordPost'];
	
	$sql = "SELECT * FROM teachers WHERE Username='$_UsernamePost' AND Password='$_PasswordPost'";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {

   $row = mysqli_fetch_assoc($result);
   echo $row['Id'] . ":" .$row['ALIS_Id'] . ":" . $row['Username'] . ":" . $row['Password'] . ":" . $row['Name'] . ":" . $row['Gender'] . ":" . $row['Age'] . ":" . $row['Religion'] . ":" . $row['Country'] . ":" . $row['City'] . ":" . $row['Guardian_Name'] . ":" . $row['Guardian_Phone_Number'] . ":" . $row['Guardian_Email'] . ":" . $row['Guardian_Address'] . ":" . $row['Guardian_CNIC'] . ":" . $row['Emergency_Number'];		
   
} 
else {
		echo "0";	
}
	

$conn->close();
?>