<?php

 	$servername = "localhost";
 	$serverUsername = "admin_eschool";
 	$serverPassword = "lv2dadalyceum";
 	$dbName = "admin_eschool";
/*	
    $servername = "localhost:3306";
     $port = "3306";
     $serverUsername = "tixelxstudioz_eschool";
     $serverPassword = "mypassword.com";
     $dbName = "tixelxstudioz_eschooldb";
*/	
	//Make connection
	$conn = mysqli_connect($servername, $serverUsername, $serverPassword, $dbName);

	
	//checkConnection
	  if (mysqli_connect_error())
	  {
	    echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }else{
	    echo "Success" . '<br>';
	  }

	$sql = "SELECT Id, Username FROM users";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row["Id"]. " - Name: " . $row["Username"]. "<br>";
        }
    } else {
        echo '<br>' . "0 results";
    }

    mysqli_close($conn);
	
?>
