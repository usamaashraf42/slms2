<?php

 	$servername = "localhost";
 	$serverUsername = "admin_eschool";
 	$serverPassword = "lv2dadalyceum";
 	$dbName = "admin_eschool";

    
    $usersPosts = array(
    "_StdIdPost", 
    "_ClassPost", 
    "_DayPost", 
    "_ActivityPost", 
    "_TimePost", 
	"_TriesPost", 
    "_GradePost");
    
    $usersFieldsTitles = array(
    "Std_Id", 
    "Class",
    "Day", 
    "Activity", 
    "Time",
	"Tries",
    "Grade");
	
	$conn = mysqli_connect($servername, $serverUsername, $serverPassword, $dbName);
	
	$id = $_POST[$usersPosts[0]];
	$Class = $_POST[$usersPosts[1]];
	$Day = $_POST[$usersPosts[2]];
	$Activity = $_POST[$usersPosts[3]];
	$Time = $_POST[$usersPosts[4]];
	$Tries = $_POST[$usersPosts[5]];
	$Grade = $_POST[$usersPosts[6]];
	
	echo "Class->" . $Class;
	
	$sql = "SELECT * FROM report WHERE Std_Id = '$id' AND Class = '$Class' AND Day = '$Day' AND Activity = '$Activity' ";
	//$sql = "SELECT * FROM report WHERE Std_Id = '$id'";	
		
	$result = mysqli_query($conn, $sql);
	
 	if(!$result){
 	    echo "Failed" . '<br>';
		die("Error: " . mysqli_error()); 
	} 
	else{
		
		echo $_POST[$usersPosts[$x]];
		
		if($result->num_rows > 0){
			echo "Updating rows ";
			
			$sql = "UPDATE report SET Grade = '$Grade' ,  Time = '$Time' , Tries = '$Tries' WHERE Std_Id = '$id' AND Class = '$Class' AND Day = '$Day' AND Activity = '$Activity' ";
			
			$result = mysqli_query($conn, $sql);
	
			if(!$result){
				echo "Failed" . '<br>';
				die("Error: " . mysqli_error()); 
			}else{
				
				echo "Updated!";
			} 
			
		}else{
			
			echo "Inserting rows ";
			
			$usersFieldTitlesQuery = "INSERT INTO report(";
			$usersFieldValuesQuery = " VALUES (";
			
			$firstRecord = 1;
		
			for ($x = 0; $x < sizeof($usersFieldsTitles); $x++) {  

			// echo "-OUT-" . $x . "-" . $usersFieldsTitles[$x] ."-" . $_POST[$usersPosts[$x]] . "_____";
				// if($_POST[$usersPosts[$x]]){
					
					if($firstRecord == 1){
						
						$usersFieldTitlesQuery .= $usersFieldsTitles[$x];
						$usersFieldValuesQuery .=  "\"" . $_POST[$usersPosts[$x]] . "\"";
						
						$firstRecord = 0;    
					
					}else{
						
						$usersFieldTitlesQuery .= ", " . $usersFieldsTitles[$x];
						$usersFieldValuesQuery .=  ", \"" . $_POST[$usersPosts[$x]] . "\"";
						
					}
				// }
			} 
			
			$usersFieldTitlesQuery .= ")";
			$usersFieldValuesQuery .= ")";
			
			$sql = $usersFieldTitlesQuery . $usersFieldValuesQuery;
			
			echo $sql;
			//Make connection
			
			$conn = mysqli_connect($servername, $serverUsername, $serverPassword, $dbName);
			
			//checkConnection
			
			if (mysqli_connect_error())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}else{
				//echo "Success" . '<br>';
			}

			if($firstRecord == 0){
				$result = mysqli_query($conn, $sql);    
			}
			
			if(!$result){
				
				echo "Q_Error";		
			}else{
				
				echo "Inserted!";
			}
		}
	}
	
?>


























