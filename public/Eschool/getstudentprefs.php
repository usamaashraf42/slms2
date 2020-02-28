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

	$_StudentIdPost = $_POST['_studentId'];
	
	$sql = "SELECT * FROM students WHERE Id = '$_StudentIdPost' ";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {

   $row = mysqli_fetch_assoc($result);
   echo $row['C0_Day'] . ":" . $row['C1_Day'] . ":" . $row['C2_Day'];		
} 
else {
		echo "0";	
}
	

$conn->close();
?>