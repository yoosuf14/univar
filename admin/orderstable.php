<?php
session_start(); 
if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Admin")||($_SESSION["user_type"])=="GM")) {
    
  }
  else {
    header("location:login.php");
  }
  ?>  
  <?php 
	
	include("orders.php");
	$c=new order();
	
	
	
	if(isset($_GET["d"])){
		
		$c->del($_GET["d"]);
	}
	
	
	
	$all_d = $c->get_all_dorders();
	$all_p = $c->get_all_porders();
	

	
include "head.php" ?>

<!-- Pending order begin -->
<h1>Pending orders</h1>
<table class="table" >

	<tr>
		<th>Order Date </th>
		<th>Customer Id </th>
		<th>Product Id</th>
		<th>Quantity</th>
	</tr>
	
	
<?php
foreach( $all_p as $tmp){
	echo "<tr>
		<td>$tmp->orderdate</td>
		<td>$tmp->customerid</td>
		<td>$tmp->productId</td>
		<td>$tmp->quantity</td>
		<td><span onclick='del($tmp->id)'><button class='btn btn-info'>Mark as Dispatched</button></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>";
	
	}
?>	

</table>
<!-- Pending orders end -->

<!-- Dispatched orders begin -->
<h1>Dispatched orders</h1>
<table class="table" id="mgtrep" >

	<tr>
		<th>Order Date </th>
		<th>Customer Id </th>
		<th>Product Id</th>
		<th>Quantity</th>
	</tr>
	
	
<?php
foreach( $all_d as $tmp){
	echo "<tr>
		<td>$tmp->orderdate</td>
		<td>$tmp->customerid</td>
		<td>$tmp->productId</td>
		<td>$tmp->quantity</td>
	</tr>";
	
	}
?>	

</table>
<!-- Dispatched orders end -->
<?php include "footer.php" ?>

<script> 
function del(id){
	$result=confirm("Are you sure you want to delete the order?");
	if ($result==true)
		location.href="orderstable.php?d="+id;
}
</script>
