<?php

 	$servername = "localhost";
 	$serverUsername = "admin_eschool";
 	$serverPassword = "lv2dadalyceum";
 	$dbName = "admin_eschool";

    $sql = "UPDATE students SET " . $_POST["titlePost"] . " = '" . $_POST["valPost"] . "' WHERE Id = " . $_POST["_IDPost"];
    
    //echo $sql;
	//Make connection
	
	$conn = mysqli_connect($servername, $serverUsername, $serverPassword, $dbName);
	
	//checkConnection
	
    if (mysqli_connect_error())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
        //echo "Success" . '<br>';
    }

    
    $result = mysqli_query($conn, $sql);    
    	
 	if(!$result){
 	    echo "Failed" . '<br>';
		die("Error: " . mysqli_error()); 
	} 
	else{
	   
		echo "Success";
	}	 
	
	 
	
?>
