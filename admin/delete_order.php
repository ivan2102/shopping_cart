<?php require_once("../config.php"); ?>

<?php 

if(!isset($_SESSION['admin_email'])) {




if(isset($_GET['order_id'])) {

    $order_id = $_GET['order_id'];

    $query_delete_order = query("DELETE FROM order WHERE order_id='$order_id'");
    confirm($query_delete_order);

    if($query_delete_order) {

        echo "<script>alert('Order has been deleted successfully')</script>";
        echo "<script>window.open('view_orders.php','_self')</script>";
    }



}

?>


<?php } ?>