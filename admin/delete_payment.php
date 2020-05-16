<?php require_once("../config.php"); ?>

<?php

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


 if(isset($_GET['payment_id'])) {

 $payment_id = $_GET['payment_id'];

 $query_delete_payment = query("DELETE FROM payments WHERE payment_id='$payment_id'");
 confirm($query_delete_payment);

 if($query_delete_payment) {

    echo "<script>alert('Your Payment has been deleted successfully')</script>";
    echo "<script>window.open('view_payments.php','_self')</script>";


 }

}



?>







<?php } ?>