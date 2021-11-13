<?php
$did=$_POST["id"];
$conn=mysqli_connect('localhost','root','','test_crud') or die("connection fail");
$q="SELECT * FROM data WHERE id=$did";
$result=mysqli_query($conn,$q) or die("Query Error");
$output="";
if(mysqli_num_rows($result)){
	while($data=mysqli_fetch_assoc($result)){
		$output.="<tr>
		<input type='hidden' id='edit-sid'  value='{$data["id"]}'>
<td>Name</td>
<td><input type='text' id='edit-name' value='{$data["name"]}'></td>
</tr>
<tr>
<td>Mail</td>
<td><input type='text' id='edit-mail' value='{$data["mail"]}'></td>
</tr>
<tr>
<td>Designation</td>
<td><input type='text' id='edit-designation' value='{$data["designation"]}'></td>
</tr>
<tr>
<td>Salary</td>
<td><input type='text' id='edit-Salary' value='{$data["Salary"]}'></td>
</tr>
<tr>
<td>Date</td>
<td><input type='text' id='edit-date' value='{$data["date"]}'></td>
</tr><br>
<tr>
<td></td>
<td><input type='submit' class='edit-submit' value='Save'></td>
</tr>
";
}
	mysqli_close($conn);
	echo $output;
}else{
	
	echo "Record not Found";
	
}

?>