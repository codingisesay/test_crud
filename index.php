<?php
include 'header.php';
?>
<head>
<style>
#model{
	background-color:rgba(0,0,0,0.8);
	position:fixed;
	left:0px;
	top:0px;
	width:100%;
	height:100%;
	z-index:100;
	display:none;
}
#model-form{
	background-color:white;
	width:40%;
	height:40%;
	position:relative;
	top:20%;
	left:28%;
	padding:;
	border-radius:4px;	
}
#close-btn{
	background-color:red;
	color:white;
	width:30px;
	height:30px;
	line-height:30px;
	text-align:center;
	border-radius:50%;
	position:absolute;
	top:-15px;
	right:-15px;
	cursor:pointer;
}
#flip{
	cursor:pointer;
	  padding: 5px;
  text-align: center;
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
}
</style>
</head>
<div id="main-content">

<h2>Add New Record</h2>
    <form class="post-form" >
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label>Mail</label>
            <input type="text" name="mail" id="mail" required>
        </div>
        <div class="form-group">
            <label>Designation</label>
            <select name="Designation" id="Designation">
                <option value="" selected disabled>Select Class</option>
				<?php
                 $conn=mysqli_connect('localhost','root','','test_crud') or die("connection mail");
				 $q="SELECT * FROM designation";
				 $result=mysqli_query($conn,$q) or die('Query not Executed');
				 if($row=mysqli_num_rows($result)>0){ 
				 
				 while($data=mysqli_fetch_assoc($result)){
				 ?>
				
                <option value="<?php echo $data['did']; ?>"><?php echo $data['designation']; ?></option>
					<?php } ?>
			        <?php } ?>
                
            </select>
        </div>
        <div class="form-group">
            <label>Salary</label>
            <input type="text" name="salary" id="salary" required>
        </div>
		 <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" id="date" required>
        </div>
        <input type="button" class="submit" id="save-data" value="save">
    </form>




    <h2 id="flip">All Records</h2>
    <table cellpadding="7px" id="t1" style="display:none">
       
    </table>
</div>
</div>
</div>
<div id="model">
<div id="model-form">
<h2>Edit form</h2>
<table width="100%" cellpadding="0">

</table>
<div id="close-btn">X</div>
</div>


</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
$(document).ready(function(){
	function loadData(){
	$.ajax({
		url:"load_data.php",
		type:"POST",
	success:function(data){
		$("#t1").html(data);
		
	}
	})
	}
	loadData();
	
	
	$("#save-data").on("click",function(){
		
		var name=$("#name").val();
		var male=$("#mail").val();
		var Designation=$("#Designation").val();
		var salary=$("#salary").val();
		var date=$("#date").val();
		if(!name == "" && !male == "" && !Designation == "" && !salary == "" && !date == ""){
		$.ajax({
			url:"insert_data.php",
			type:"POST",
			data:{name:name,male:male,Designation:Designation,salary:salary,date:date},
			success:function(data){
				if(data == 1){
					
					loadData();
					
				}
				else{
					
					alert("Record Not Inserted");
					
				}
				
				}
		})
			
		}else{
		
		alert("All field are required");
		
		}
		
	
	})
	
	$(document).on("click",".delete-btn",function(){
		if(confirm("Do you Really want to delete this Record?")){
		var dataId=$(this).data("id");
		var element=this;
		$.ajax({
			url:"delete.php",
			type:"POST",
			data:{id:dataId},
			success:function(data){
				if(data == 1){
					
					$(element).closest("tr").fadeOut();
					
				}else{
					
					alert("Record not Deleted");
					
				}
				
			}
			
		})
		
		}
	})
	
		$(document).on("click",".edit-btn",function(){
		
		$("#model").show();
		var did=$(this).data("eid");
		$.ajax({
			url:"update.php",
			type:"POST",
			data:{id:did},
			success:function(data){
				$("#model-form table").html(data);
				}
			})
		
		})
		
		$("#close-btn").on("click",function(){
			$("#model").hide();
			})
	
			$(document).on("click",".edit-submit",function(){
				var did = $("#edit-sid").val();
				var name = $("#edit-name").val();
				var mail = $("#edit-mail").val();
				var designation = $("#edit-designation").val();
				var Salary = $("#edit-Salary").val();
				var date = $("#edit-date").val();
				$.ajax({
					url:"update-data.php",
					type:"POST",
					data:{did: did, name: name, mail:mail,designation:designation, Salary: Salary,date:date},
					success:function(data){
						if(data == 1){
							$("#model").hide();
							loadData();
							
						}
						
						
					}
					
					
					
				})
				
				
			})
			
			 $("#flip").click(function(){
             $("#t1").slideToggle("slow");
  });
});
	
</script>
</body>
</html>
