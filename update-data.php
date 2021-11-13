<?php
$did=$_POST["did"];
$name=$_POST["name"];
$mail=$_POST["mail"];
$designation=$_POST["designation"];
$Salary=$_POST["Salary"];
$date=$_POST["date"];


$conn=mysqli_connect('localhost','root','','test_crud') or die("Connection fail");
$q="UPDATE data SET 
name = '$name', mail = '$mail', designation = '$designation', Salary=$Salary, date='$date'
WHERE id=$did";

if(mysqli_query($conn,$q)){
	
	echo 1;
	
}else{
	
	echo 0;
	
}


?>