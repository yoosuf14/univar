<?php 
//this will run when an confirmorder cart button is clicked
include 'connection.php';
session_start();
if(isset($_SESSION['customer_session_id']))
{

$customerid = $_SESSION['customer_session_id'];

$sql = "INSERT INTO orders (customerid,productId,quantity) SELECT customerid,productId,quantity FROM cart WHERE customerid = '$customerid'";

	$result = mysqli_query($conn, $sql);

	if($result)

	{

		echo "success inserting into orders";
		$sql = "DELETE FROM cart WHERE customerid = '$customerid'";

		$resultdelete = mysqli_query($conn, $sql);
			if ($resultdelete) {
				echo "Deleted from cart";
			}
			else{
				echo "Error deleting from cart";
			}
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