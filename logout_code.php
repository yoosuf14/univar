<?php
session_start();
unset($_SESSION['customer_session_id']);
session_destroy();
header("Location: login.php");
?>