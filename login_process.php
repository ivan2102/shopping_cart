<?php require_once("config.php"); ?>

<?php

if(isset($_POST['login'])) {

    $customer_email = escape_string($_POST['customer_email']);
    $customer_password = escape_string($_POST['customer_password']);

    $query_customer = query("SELECT * FROM customers WHERE customer_email='$customer_email' AND customer_password='$customer_password'");
    confirm($query_customer);

    $check_customer = mysqli_num_rows($query_customer);

    $get_ip = getRealUserIp();

    $query_cart = query("SELECT * FROM cart WHERE ip_address='$get_ip'");
    confirm($query_cart);

    $check_cart = mysqli_num_rows($query_cart);

    if($check_customer == 0) {

        echo "<script>alert('Your Email or Password are wrong')</script>";
        exit();
    }

    if($check_customer == 1 && $check_cart == 0) {

        $_SESSION['customer_email'] = $customer_email;

        echo "<script>alert('You are Logged In')</script>";
        echo "<script>window.open('my_orders.php','_self')</script>";

    }else {

        $_SESSION['customer_email'] = $customer_email;

        echo "<script>alert('You are Logged In')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }



   // $user_email = escape_string($_POST['user_email']);
    //$password = md5($_POST['password']);

   // $query_login = query("SELECT * FROM users WHERE user_email='$user_email' AND password='$password'");
   // confirm($query_login);

   // $count = mysqli_num_rows($query_login);
     
   // if($count == 1) {

      //  $_SESSION['customer'] = $user_email;
       // $_SESSION['customer_id'] = $user_id;
       // $_SESSION['customer_email'] = $customer_email;
      //  echo "<script>alert('You are logged in successfully')</script>";
      //  echo "<script>window.open('checkout.php','_self')</script>";
  //  } else {

        //set_message("Your credentials are wrong, please try again");
       // redirect("Location: login.php");

   // }
}

?>