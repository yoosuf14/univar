<?php
session_start();
	if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Admin")||($_SESSION["user_type"])=="GM")) {	
	 header("Location:viewproducts.php");	
	}
	elseif(isset($_SESSION["user_type"]) && (($_SESSION["user_type"])=="HR")) {
		header("location:customertable.php");
	}
	elseif(isset($_SESSION["user_type"]) && (($_SESSION["user_type"])=="Stock")) {
		header("location:customertable.php");
	
	}
	elseif(isset($_SESSION["user_type"]) && (($_SESSION["user_type"])=="Asset")) {
		header("location:assettable.php");
	
	}
	else {
		header("location:login.php");
	}
?>