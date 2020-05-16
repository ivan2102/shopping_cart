<?php require_once("includes/header.php"); ?>
<!--<?php //require_once("../includes/nav.php"); ?> -->
<?php require_once("../config.php"); ?>


<?php 
			
			if(isset($_POST) & !empty($_POST)) {

				$admin_email = escape_string($_POST['admin_email']);
				$admin_password = md5($_POST['admin_password']);

				$query_login = query("SELECT * FROM admin WHERE admin_email='$admin_email' AND admin_password='$admin_password'");
				confirm($query_login);
				
				$count = mysqli_num_rows($query_login);

				if($count == 1) {

					$_SESSION['admin_email'] = $admin_email;
					echo "<script>alert('You are Loged in successfully')</script>";
					echo "<script>window.open('index.php','_self')</script>";
				}else {

					echo "Invalid Login Credentials";
				}
			}
			
			
			
			?>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Login</h2>
						<p>Admin Login</p>
					</div>
					<div class="col-md-12">
				<div class="row shop-login">
				<div class="col-md-6 col-md-offset-3">
					<div class="box-content">
						<!--<h3 class="heading text-center">I'm a Returning Customer</h3>-->
						<div class="clearfix space40"></div>
						<form class="logregform" action="" method="POST">
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>E-mail Address</label>
										<input type="email" name="admin_email" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<a class="pull-right" href="#">(Lost Password?)</a>
										<label>Password</label>
										<input type="password" name="admin_password" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<span class="remember-box checkbox">
									<label for="rememberme">
									<input type="checkbox" id="rememberme" name="rememberme">Remember Me
									</label>
									</span>
								</div>
								<div class="col-md-6">
									<button type="submit" name="login" class="button btn-md pull-right">Login</button>
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


