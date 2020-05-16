<?php
require_once("config.php"); 
session_start();
unset($_SESSION['customer_email']);
//redirect("Location: login.php");
echo "<script>window.open('login.php','_self')</script>";

?>