<?php
include_once 'connection.php';

if(isset($_POST['username'])){
$username = $_POST['username'];
$password = $_POST['password'];
$password = sha1($password);


$sql = "SELECT * FROM customers WHERE username = '$username' AND password='$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
 {
	while ($row = mysqli_fetch_assoc($result))

 {
 	$id = $row['id'];
 	$email = $row['email'];
 	session_start();
 	$_SESSION['id'] = $id;
 	$_SESSION['customer_session_id'] = $id;
}

 header("Location: home.php");
}
else
{
	// echo "Invalid credentials. Please enter correct username and Password";
	header("Location: login.php?loginError=Invalid%20Credentials");
}
}
else
{
	header("Location: login.php");
}
?>