<?php require_once("../config.php") ?>

<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {

    if(isset($_GET['admin_id'])) {

        $admin_id = $_GET['admin_id'];
    

$query_delete_admin_user = query("DELETE FROM admin WHERE admin_id='$admin_id'");
confirm($query_delete_admin_user);

if($query_delete_admin_user) {

    echo "<script>alert('User has been deleted successfully')</script>";
    echo "<script>window.open('view_users.php','_self')</script>";

}

}




?>

<?php } ?>