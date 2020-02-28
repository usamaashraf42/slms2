<?php

 	$servername = "localhost";
 	$serverUsername = "admin_eschool";
 	$serverPassword = "lv2dadalyceum";
 	$dbName = "admin_eschool";

    
    $usersPosts = array(
    "_ALISIDPost", 
    "_UsernamePost", 
	"_PasswordPost", 
	"_NamePost", 
    "_GenderPost", 
    "_AgePost", 
    "_ReligionPost", 
    "_CountryPost", 
    "_CityPost", 
    "_Guardian_NamePost", 
    "_Guardian_Phone_NumberPost", 
    "_Guardian_EmailPost", 
    "_Guardian_AddressPost", 
    "_Guardian_CNICPost", 
    "_Emergency_NumberPost",
    "_Security_AnswerPost",
	"_Package_CodePost",
	"_Total_CoinsPost"
    );
    
    $usersFieldsTitles = array(
    "ALIS_Id", 
    "Username", 
	"Password", 
	"Name", 
    "Gender", 
    "Age", 
    "Religion", 
    "Country", 
    "City", 
    "Guardian_Name", 
    "Guardian_Phone_Number", 
    "Guardian_Email", 
    "Guardian_Address", 
    "Guardian_CNIC", 
    "Emergency_Number",
    "Security_Answer",
	"Package_Id",
	"TotalCoins"
    );
    
    $usersFieldTitlesQuery = "INSERT INTO students(";
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
    
	//echo $sql;
	
	//Make connection
	
	$conn = mysqli_connect($servername, $serverUsername, $serverPassword, $dbName);
	
	//checkConnection
	
    if (mysqli_connect_error())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
        //echo "C_Success";
    }
	
    if($firstRecord == 0){
        $result = mysqli_query($conn, $sql);    
    }
	
 	if(!$result){
 	    echo "chu_error!";
		//die("error: " . mysqli_error()); 
	} 
	else{
	   
		$sql = "SELECT Id, Username FROM students";
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


























