<?php

 	$servername = "localhost";
 	$serverUsername = "admin_eschool";
 	$serverPassword = "lv2dadalyceum";
 	$dbName = "admin_eschool";

    
    $usersPosts = array(
    "_StdIdPost", 
    "_ClassPost", 
    "_SemesterPost", 
    "_WeekPost", 
    "_DayPost", 
    "_ActivityPost", 
    "_TimePost", 
	"_TriesPost", 
    "_StatusPost");
    
    $usersFieldsTitles = array(
    "Std_Id", 
    "Class", 
    "Semester", 
    "Week", 
    "Day", 
    "Activity", 
    "Time",
	"Tries",
    "Status");
    
    $usersFieldTitlesQuery = "INSERT INTO analytics(";
    $usersFieldValuesQuery = " VALUES (";
    
    $firstRecord = 1;
    
    for ($x = 0; $x < sizeof($usersFieldsTitles); $x++) {  

        if($_POST[$usersPosts[$x]]){
            
            if($firstRecord == 1){
                //echo "-a";
                $usersFieldTitlesQuery .= $usersFieldsTitles[$x];
                $usersFieldValuesQuery .=  "\"" . $_POST[$usersPosts[$x]] . "\"";
                $firstRecord = 0;    
            
            }else{
                //echo "-b";
                $usersFieldTitlesQuery .= ", " . $usersFieldsTitles[$x];
                $usersFieldValuesQuery .=  ", \"" . $_POST[$usersPosts[$x]] . "\"";
                
            }
        }
    } 
    
    $usersFieldTitlesQuery .= ")";
    $usersFieldValuesQuery .= ")";
    
    $sql = $usersFieldTitlesQuery . $usersFieldValuesQuery;
    
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
 	    echo "Failed" . '<br>';
		die("Error: " . mysqli_error()); 
	} 
	else{
		
	}	 
	
	 
	
?>


























