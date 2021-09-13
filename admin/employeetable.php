<?php
session_start(); 
if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Admin")||($_SESSION["user_type"])=="GM")) {
    
  }
  else {
    header("location:login.php");
  }
  ?>  
  <?php 	
	
	include("employee.php");
	$s=new employee();
	
	if(isset($_GET["d"])){
		
		$s->del($_GET["d"]);
	}
	
	
	
	$all=$s->get_all_employee();
	
	
?>
<?php include "head.php" ?>
<table  class="table" >

	<tr>
		<th>employee Id</th>
		<th>employee Name</th>
		<th>employee contact number</th>
		<th>employee NIC</th>
		<th>employee Salary</th>
		<th>Appointment date</th>
		
	</tr>
	
<?php
	foreach($all as $tmp){
	echo "<tr>
		<td>$tmp->emp_id</td>
		<td>$tmp->emp_name</td>
		<td>$tmp->emptel</td>
		<td>$tmp->nic</td>
		<td>$tmp->salary</td>
		<td>$tmp->appdate</td>
		<td> <span onclick='del($tmp->emp_id)'> delete </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='employeeform.php?ed=$tmp->emp_id'>Edit </a> </td>
		
		
		
	</tr>";
	
	}
?>	
</table>
<?php include "footer.php" ?>

<script> 
function del(id){
	$result=confirm("are you sure you want to delete the data");
	if ($result==true)
		location.href="employeetable.php?d="+id;
	
	
}
</script>