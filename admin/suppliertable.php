<?php
session_start(); 
if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Admin")||($_SESSION["user_type"])=="GM")) {
    
  }
  else {
    header("location:login.php");
  }
  ?>  
  <?php 	
	
	include("supplier.php");
	$s=new supplier();
	
	if(isset($_GET["d"])){
		
		$s->del($_GET["d"]);
	}
	
	
	
	$all=$s->get_all_supplier();
	
	
?>
<?php include "head.php" ?>
<table  class="table" >

	<tr>
		<th>Supplier Id</th>
		<th>Supplier Name</th>
		<th>Supplier contact number</th>
		<th>Supplier Address</th>
		
	</tr>
	
<?php
	foreach($all as $tmp){
	echo "<tr>
		<td>$tmp->sup_id</td>
		<td>$tmp->sup_name</td>
		<td>$tmp->sup_tel</td>
		<td>$tmp->sup_address</td>
		<td> <span onclick='del($tmp->sup_id)'> delete </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='supplierform.php?ed=$tmp->sup_id'>Edit </a> </td>
		
		
		
	</tr>";
	
	}
?>	
</table>
<?php include "footer.php" ?>

<script> 
function del(id){
	$result=confirm("are you sure you want to delete the data");
	if ($result==true)
		location.href="suppliertable.php?d="+id;
	
	
}
</script>