<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>
<?php require_once("config.php"); ?>


<?php

if(isset($_POST['login'])) {

	$customer_email = escape_string($_POST['customer_email']);
	$customer_password = escape_string($_POST['customer_password']);

	$query_customers = query("SELECT * FROM customers WHERE customer_email='$customer_email' AND customer_password='$customer_password'");
	confirm($query_customers);

	$get_ip = getRealUserIp();

	$check_customer = mysqli_num_rows($query_customers);

	$query_cart = query("SELECT * FROM cart WHERE ip_address='$get_ip'");
	confirm($query_cart);

	$check_cart = mysqli_num_rows($check_cart);

	if($check_customer == 0) {

		echo "<script>alert('Email or Password are wrong')</script>";
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

    //$user_email = escape_string($_POST['user_email']);
    //$password = md5($_POST['password']);

    //$query_login = query("SELECT * FROM users WHERE user_email='$user_email' AND password='$password'");
    //confirm($query_login);

    //$count = mysqli_num_rows($query_login);
     
    //if($count == 1) {

      //  $_SESSION['customer'] = $user_email;
	  //	$_SESSION['customer_id'] = $user_id;
		//$_SESSION['customer_email'] = $customer_email;
       // echo "<script>alert('You are logged in successfully')</script>";
      //  echo "<script>window.open('checkout.php','_self')</script>";
   // } else {

     //   set_message("Your credentials are wrong, please try again");
      //  redirect("Location: login.php");

   // }
}

?>


	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Shop - Account</h2>
						<p>Tagline Here</p>
					</div>
					<div class="col-md-12">
				<div class="row shop-login">
				<div class="col-md-6">
					<div class="box-content">

					<h2 class="heading text-center">I'm a Returning Customer</h2>
						<div class="clearfix space40"></div>
						<form class="logregform" method="POST" action="login_process.php">
							<div class="row">

							<h3 class="bg-danger"><?php display_message(); ?></h3>

								<div class="form-group">
									<div class="col-md-12">
										<label> E-mail Address</label>
										<input type="email" name="customer_email" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<a class="pull-right" href="#">(Lost Password?)</a>
										<label>Password</label>
										<input type="password" name="customer_password" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<!--<span class="remember-box checkbox">
									<label for="rememberme">
									<input type="checkbox" id="rememberme" name="rememberme">Remember Me
									</label>
									</span>-->
								</div>
								<div class="col-md-6">
									<button type="submit" name="login" class="button btn-md pull-right">Login</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6">
					<div class="box-content">
						<h3 class="heading text-center">Register An Account</h3>
						<div class="clearfix space40"></div>
						<form class="logregform" action="register_process.php" method="POST">
							<div class="row">

							<h3 class="bg-danger"><?php display_message(); ?></h3>
							
								<div class="form-group">
									<div class="col-md-12">
										<label>E-mail Address</label>
										<input type="email" name="customer_email" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-6">
										<label>Password</label>
										<input type="password" name="customer_password" value="" class="form-control">
									</div>
									<div class="col-md-6">
										<label>Re-enter Password</label>
										<input type="password" name="customer_password" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="space20"></div>
									<button type="submit" name="register" class="button btn-md pull-right">Register</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>


							
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<?php require_once("includes/footer.php"); ?>


