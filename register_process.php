<?php require_once("config.php"); ?>

<?php
if(isset($_POST['register'])) {

    $user_email = escape_string($_POST['user_email']);
    $password = md5($_POST['password']);

    $query_insert = query("INSERT INTO users(user_email,password) VALUES('{$user_email}','{$password}')");
    confirm($query_insert);

    if($query_insert) {

        $_SESSION['customer'] = $user_email;
        $_SESSION['customer_id'] = last_id();
        echo "<script>alert('User inserted successfully')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else {

        set_message("Your credentials are wrong, please try again");
        redirect("Location: login.php");
    }

}


?>