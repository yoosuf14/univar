<?php
session_start();
unset($_SESSION['user_type']);
session_destroy();
header("Location: login.php");
?>