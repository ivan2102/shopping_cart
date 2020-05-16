<?php require_once("../config.php"); ?>

<?php  

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {

    ?>

    <?php 
    
    if(isset($_GET['product_id'])) {

        $product_id = $_GET['product_id'];

        $query_delete_product = query("DELETE FROM products WHERE product_id='$product_id'");
        confirm($query_delete_product);

        if($query_delete_product) {

            echo "<script>alert('Product has been deleted successfully')</script>";
            echo "<script>window.open('products.php','_self')</script>";
        }
    }
    
    
    
    
    ?>










    <?php } ?>