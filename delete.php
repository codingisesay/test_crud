<?php

$dataID=$_POST["id"];
$conn=mysqli_connect('localhost','root','','test_crud') or die("Connection Fail");
$q="DELETE FROM data WHERE id='$dataID'";
if(mysqli_query($conn,$q)){
	
	echo 1;
	
}else{
	
	echo 0;
	
}

?>