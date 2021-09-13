<!doctype html>
<html lang="en">
<head>

	<?php
	include_once 'link.php';
	include_once 'connection.php';
	?>

	<title></title>
</head>
<body>

	<?php
	$email = $_POST['email'];
	$username = $_POST['username'];
	$nic = $_POST['nic'];
	$password = $_POST['password'];
	$password = sha1($password);

	$sql = "INSERT INTO customers (email,username,password,nic) VALUES ('$email', '$username', '$password','$nic')";

	$result = mysqli_query($conn, $sql);

	if($result)

	{

		header("Location: login.php");

	}

	else
	{
		echo "Error ".$sql;
	}	
	?>

	<?php
	include_once 'jslink.php';
	?>

</body>
</html>
