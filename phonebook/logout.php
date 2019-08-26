<?php
session_start();
//echo "logged out";
unset($_SESSION['user_logged_in']);

session_destroy();

header('location: login.php');
?>