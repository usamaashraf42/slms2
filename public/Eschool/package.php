<?php


//     $servername = "localhost";
//     $serverUsername = "admin_eschool";
//     $serverPassword = "lv2dadalyceum";
//     $dbName = "admin_eschool";

// // Create connection
// $conn = new mysqli($servername, $serverUsername, $serverPassword, $dbName);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 

        $tempArray=array();
        for($i=0; $i<10000;$i++){
            $recor=[];
            $recor['Code']=strtoupper(str_random(10));
            $recor['Duration']=20;
            $recor['Status']=0;
            $tempArray[]=$recor;
        }
      
        $insetion=\DB::table('packages')->insert($tempArray);
    

// $conn->close();
?>