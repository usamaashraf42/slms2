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

$isExist=checkIFExist($_UsernamePost);

if($isExist>0){
	
/* 	$sql = "INSERT INTO students (Username, Password)
	VALUES ('$_UsernamePost', '$_PasswordPost')";

	if ($conn->query($sql) == TRUE) {
		//echo "\n save data: 1";		
		echo "1";	//New Record added
	
	} else {
		//echo "\n 0: " . $sql . "<br>" . $conn->error;
		echo "0";
	} */

	echo "1";
	$conn->close();
	
	
}else{	

	echo "0";	//Record allready exists
}



function checkIFExist($_UsernamePost){

    $sname = "localhost";
    $susername = "admin_eschool";
    $spassword = "lv2dadalyceum";
    $sdbname = "admin_eschool";

// Create connection
$conn = new mysqli($sname, $susername, $spassword, $sdbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT id from students where Username='$_UsernamePost'";
$result = $conn->query($sql);
$isExist=0;
if ($result->num_rows > 0) {
   
    if($row = $result->fetch_assoc()) {
		$isExist=0;
    }
} else {
	$isExist=1;
}

return $isExist;
}


?>


