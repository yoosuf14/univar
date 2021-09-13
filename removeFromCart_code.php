<?php 
//this will run when an add to cart button is clicked
include 'connection.php';
session_start();
if(isset($_SESSION['customer_session_id']))
{

$customerid = $_SESSION['customer_session_id'];
$productId = $_REQUEST['productId'];

$sql = "DELETE FROM cart WHERE customerid =$customerid AND productId =$productId";

	$result = mysqli_query($conn, $sql);

	if($result)

	{

		echo "Product removed successfully";
		echo "$customerid";
		echo "$productId";

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