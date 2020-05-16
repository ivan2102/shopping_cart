<?php require_once("../config.php"); ?>

<?php 


if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {



    if(isset($_GET['customer_id'])) {

        $customer_id = $_GET['customer_id'];
    }
    
    $query_delete_customer = query("DELETE FROM customers WHERE customer_id='$customer_id'");
    confirm($query_delete_customer);
    
    if($query_delete_customer) {
    
        echo "<script>alert('Customer deleted successfully')</script>";
        echo "<script>window.open('view_customers.php','_self')</script>";
    }


?>


<?php } ?>