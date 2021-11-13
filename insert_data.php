<?php
$name=$_POST["name"];
$male=$_POST["male"];
$Designation=$_POST["Designation"];
$salary=$_POST["salary"];
$date=$_POST["date"];

$conn=mysqli_connect('localhost','root','','test_crud') or die("Connection Failed");

$q="INSERT INTO data (name,mail,designation,Salary,date) VALUES ('$name','$male',$Designation,'$salary','$date')";

if(mysqli_query($conn,$q)){
	
	echo 1;
	
}else{
	
	echo 0;
	
}

?>