<?php require_once("config.php"); ?>


<?php 

if(isset($_SESSION['customer_email'])) {


if(isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];

    $query_delete_cart = query("DELETE FROM cart WHERE product_id='$product_id'");
    confirm($query_delete_cart);

    if($query_delete_cart) {

        echo "<script>alert('Your Product has been deleted successfully')</script>";
        echo "<script>window.open('cart.php','_self')</script>";
    }
}



?>

<?php } ?>

