<?php
session_start(); 
if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Stock")||($_SESSION["user_type"])=="GM")) {
    
  }
  else {
    header("location:login.php");
  }
  ?>  
  <?php 
	include("customer.php");
	$c=new customer();
	
	
	
	if(isset($_GET["d"])){
		
		$c->del($_GET["d"]);
	}
	
	
	
	$all = $c->get_all_customer();
	

	
include "head.php" ?>
<h1>Customer details</h1>
<table class="table" >

	<tr>
		<th>Customer Id </th>
		<th>Username </th>
		<th>First name</th>
		<th>Last name</th>
		<th>E-mail address</th>
		<th>N.I.C</th>
		<th>Contact number</th>
		<th>Address</th>
	</tr>
	
	
<?php
foreach( $all as $tmp){
	echo "<tr>
		<td>$tmp->cus_id</td>
		<td>$tmp->username</td>
		<td>$tmp->firstname</td>
		<td>$tmp->lastname</td>
		<td>$tmp->emailaddress</td>
		<td>$tmp->nic</td>
		<td>$tmp->contactnumber</td>
		<td>$tmp->address</td>
		<td><span onclick='del($tmp->cus_id)'>delete </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='customerform.php?ed=$tmp->cus_id'> Edit </a> </td>
	</tr>";
	
	}
?>	

</table>

<?php include "footer.php" ?>



<script> 
function del(id){
	$result=confirm("Are you sure you want to delete the customer?");
	if ($result==true)
		location.href="customertable.php?d="+id;
}
</script>