<?php 
include_once 'connection.php';
session_start();

if (isset($_SESSION['customer_session_id'])) {

// echo "$userid";

$subject = $_POST['subject'];
$Description = $_POST['Description'];
$message = $_POST['message'];
$userid = $_SESSION['customer_session_id'];
$sql = "INSERT INTO messages (userId,subject,message,Description) VALUES ('$userid','$subject','$message','$Description')";

						$result = mysqli_query($conn, $sql);
						if($result)
						{
							header('Location:message.php?messageSent');

						}
						else{
							echo "Something went wrong. Please try again later.".$sql;
						}

}

else
{
	header("Location:login.php");
}
?>
