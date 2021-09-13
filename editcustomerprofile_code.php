<?php 
// include_once 'connection.php';
include_once 'connection.php';

session_start();
if(isset($_SESSION['customer_session_id']))

{


// decrlaring a variable to sessionId
$session = $_SESSION['customer_session_id'];



$sql = "SELECT fname, lname, gender, address, phone FROM users WHERE id='$session'";
$resultset = mysqli_query($conn, $sql);
while($record = mysqli_fetch_assoc($resultset))
{   

   $fname = $record['fname'];
   $lname = $record['lname'];
   $gender = $record['gender'];
   $address = $record['address'];
   $phone = $record['phone'];
 }

if (!$_POST['fname']==null) {
	$fname = $_POST['fname'];
}
if (!$_POST['lname']==null) {
	$lname = $_POST['lname'];
}
if (!$_POST['phone']==null) {
	$phone = $_POST['phone'];
}
if (!$_POST['address']==null) {
	$address = $_POST['address'];
}




$sql = "UPDATE users
SET 
fname ='$fname' , 
lname ='$lname' , 
address ='$address' , 
phone ='$phone'
WHERE id='$session'";

$result = mysqli_query($conn, $sql);
if ($result) {
	echo "success!";
	header("Location:editcustomerprofile.php?success");
}
	else
	{
		echo "error: ".$sql;
	}

}
?>