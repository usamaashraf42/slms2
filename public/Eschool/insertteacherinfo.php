<?php

 	$servername = "31.220.52.51";
 	$serverUsername = "admin_eschool";
 	$serverPassword = "lv2dadalyceum";
 	$dbName = "admin_eschool";

    
    $usersPosts = array(

    "_UsernamePost", 
	"_PasswordPost", 
	"_NamePost", 
    "_GenderPost", 
    "_AgePost", 

    "_CountryPost", 
    "_CityPost", 

    "_Phone_NumberPost", 
    );
    
    $usersFieldsTitles = array(
    
    "Username", 
	"Password", 
	"Name", 
    "Gender", 
    "Age", 
    
    "Country", 
    "City", 
    
    "", 
    );
    
    $usersFieldTitlesQuery = "INSERT INTO teachers(";
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
	   
		$sql = "SELECT Id, Username FROM teachers";
        $result = mysqli_query($conn, $sql);
        $lastID = "";
        
        if (mysqli_num_rows($result) > 0) {
            
            while($row = mysqli_fetch_assoc($result)) {
                $lastID = $row["Id"];
            }
        } else {
            echo '<br>' . "0 results";
        }
        
        echo $lastID ;
		
	}	 
	
	 
	
?>


























