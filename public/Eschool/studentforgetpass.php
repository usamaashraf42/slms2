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

	$_Q1Post=$_POST['_UsernamePost'];
	$_Q2Post=$_POST['_SecurityAnswerPost'];
	
	$sql = "SELECT * FROM students WHERE Username='$_Q1Post' AND Security_Answer='$_Q2Post'";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {

   $row = mysqli_fetch_assoc($result);
   
   $nid = $row['Id'];
   
   $sql = "UPDATE students SET Password = '1234' WHERE Id = '$nid'";
   $result2 = $conn->query($sql);
   //echo $row['Id'];
   echo "1";
} 
else {
		echo "0";	
}
	

$conn->close();
?>