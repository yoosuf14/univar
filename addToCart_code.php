<?php 
//this will run when an add to cart button is clicked
include 'connection.php';
session_start();
if(isset($_SESSION['customer_session_id']))
{

$customerid = $_SESSION['customer_session_id'];
$productId = $_REQUEST['productId'];
$quantity = $_REQUEST['quantity'];

$sql = "INSERT INTO cart (customerid,productId,quantity) VALUES ('$customerid', '$productId', '$quantity')";

	$result = mysqli_query($conn, $sql);

	if($result)

	{

		echo "success";

	}

	else
	{
		echo "Error ".$sql;
	}
}
else{
	header("Location:login.php");
}

 ?>