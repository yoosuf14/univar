<?php 
//this will run when an add to cart button is clicked
include 'connection.php';
session_start();
if(isset($_SESSION['customer_session_id']))
{

$customerid = $_SESSION['customer_session_id'];
$totalprice = 0;

$sql = "SELECT products.UnitPrice, products.imagesrc, cart.quantity FROM products INNER JOIN cart ON products.productID = cart.productId WHERE cart.customerid = '$customerid'";

$resultset = mysqli_query($conn, $sql);
  while($record = mysqli_fetch_assoc($resultset))
 {   
 	  $totalprice = $totalprice + $record['UnitPrice']*$record['quantity'];
 	  
 }//end of while loop	
echo "$totalprice";
}
else{
	header("Location:login.php");
}
?>