<?php

 	$servername = "localhost";
 	$serverUsername = "admin_eschool";
 	$serverPassword = "lv2dadalyceum";
 	$dbName = "admin_eschool";

	$conn = mysqli_connect($servername, $serverUsername, $serverPassword, $dbName);
	
	$id = $_POST[_StdIdPost];

	$sql = "SELECT * FROM report WHERE Std_Id = '$id'";	
		
	$result = mysqli_query($conn, $sql);
	
 	if(!$result){
 	    echo "Failed" . '<br>';
		die("Error: " . mysqli_error()); 
	} 
	else{
				
		if($result->num_rows > 0){
			
			while($row = mysqli_fetch_assoc($result)){
				
				echo $row['Class'] . ":" .$row['Day'] . ":" . $row['Activity'] . ":" . $row['Grade'] . ":" . $row['Time'] . ":";		
			}  
			
		}else{
			
			echo "No record found!";
		}
	}
	
?>


























