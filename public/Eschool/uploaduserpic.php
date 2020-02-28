<?php
   if(isset($_FILES['theFile']))
   {
      echo "Success!  --  ";
	  echo "tmpName: " . $_FILES['theFile']['tmp_name'] . "   --  ";
	  echo "size: " . $_FILES['theFile']['size'] . "   --  "
	  echo "mime: " . $_FILES['theFile']['type'] . "   --  "
	  echo "name: " . $_FILES['theFile']['name'] . "   --  "

	$name=Time();
	$path = "uploadpics/$name.jpg";
	
	$actualpath = "http://www.lyceumgroupofschools.com/Eschool/$path";

	move_uploaded_file($_FILES['theFile']['tmp_name'], "../images/" . $_FILES['theFile']['name']);
	//move_uploaded_file($_FILES['theFile']['tmp_name'], $actualpath);
	
	
   } else
   {
      print("Failed!");
   }
?>	