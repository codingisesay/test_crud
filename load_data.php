<?php

$conn=mysqli_connect('localhost','root','','test_crud') or die("Connection fail");
$q="SELECT * FROM data JOIN designation WHERE data.designation=designation.did";
$result=mysqli_query($conn,$q);
$output="";
if(mysqli_num_rows($result) > 0){
	$output='  <table cellpadding="7px">
        <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Designation</th>
        <th>Salary</th>
        <th>Date</th>
		<th>Operation</th>
        </thead>';
        
while($data=mysqli_fetch_assoc($result)){
	$output.="<tbody>
            <tr>
                <td>{$data['name']}</td>
                <td>{$data['mail']}</td>
                <td>{$data['designation']}</td>
                <td>{$data['Salary']}</td>
				<td>{$data['date']}</td>
                <td>
                    <input type='button' class='edit-btn' data-eid='{$data["id"]}' value='Edit' >
                    <input type='button' class='delete-btn' data-id='{$data["id"]}' value='Delete'>
                </td>
            </tr>
            
        </tbody>";
	
}
$output.="</table>";
mysqli_close($conn);
echo $output;
	
}else{
	
	echo"Record Not Found";
	
}

?>