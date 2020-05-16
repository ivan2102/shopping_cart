<?php require_once("config.php"); ?>

<?php 

if(isset($_SESSION['customer_email'])) {




if(isset($_GET['wishlist_id'])) {

    $wishlist_id = $_GET['wishlist_id'];

    $query_delete_wishlist = query("DELETE FROM wishlist WHERE wishlist_id='$wishlist_id'");
    confirm($query_delete_wishlist);

    if($query_delete_wishlist) {

        echo "<script>alert('Your Wishlist has been deleted successfully')</script>";
        echo "<script>window.open('wishlist.php','_self')</script>";
    }



}

?>


<?php } ?>