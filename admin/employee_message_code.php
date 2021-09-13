<?php 
include '../connection.php';

$subject = $_POST['subject'];
$message = $_POST['message'];
$userid =  $_POST['recepientId'];

$sql = "INSERT INTO messages2 (userId,subject,message) VALUES ('$userid','$subject','$message')";

						$result = mysqli_query($conn, $sql);
						if($result)
						{
							header('Location:employee_message.php?messageSent');

						}
						else{
							echo "Something went wrong. Please try again later.".$sql;
						}
?>