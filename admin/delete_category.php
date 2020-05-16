<?php require_once("../config.php"); ?>

<?php  

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {




if(isset($_GET['category_id'])) {

    $category_id = $_GET['category_id'];

    $query_delete_cat = query("DELETE FROM categories WHERE category_id='$category_id'");
    confirm($query_delete_cat);

    if($query_delete_cat) {

        echo "<script>alert('Category deleted successfully')</script>";
        echo "<script>window.open('categories.php','_self')</script>";
    }
}



?>

<?php } ?>