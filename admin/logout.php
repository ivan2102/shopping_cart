<?php
require_once("../config.php");
require_once("../functions.php");
session_start();
session_destroy();

echo "<script>window.open('login.php','_self')</script>";




?>