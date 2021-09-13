<?php
include_once '../connection.php';

if(isset($_POST['uname'])){
$username = $_POST['uname'];
$password = $_POST['upassword'];
$password = md5($password);


$sql = "SELECT * FROM user WHERE uname = '$username' AND upassword='$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
 {
	while ($row = mysqli_fetch_assoc($result))

 {
 	// $id = $row['id'];
 	session_start();
 	$_SESSION['uname'] = $username;
 	$_SESSION['user_type'] = $row['user_type'];
}

 header("Location: home_redirect.php");
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