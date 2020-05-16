<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>
<?php require_once("config.php"); ?>

<?php 

if(!isset($_SESSION['customer']) && empty($_SESSION['customer'])) {

redirect("Location: login.php");
}


$user_id = $_SESSION['customer_id'];


?>

<?php 
if(isset($_POST['submit'])) {
if($_POST['agree'] == true ) {
	$country = escape_string($_POST['country']);
	$first_name = escape_string($_POST['first_name']);
	$last_name = escape_string($_POST['last_name']);
	$company = escape_string($_POST['company']);
	$address = escape_string($_POST['address']);
	$city = escape_string($_POST['city']);
	$zip = escape_string($_POST['zip']);
	$mobile = escape_string($_POST['mobile']);
	$payment = escape_string($_POST['payment']);
	

	$query_usersmeta = query("SELECT * FROM usersmeta WHERE user_id='$user_id'");
	confirm($query_usersmeta);
    $row = fetch_array($query_usersmeta);
	$count = mysqli_num_rows($query_usersmeta);

	if($count == 1) {
		//update usersmeta
		$query_update_usersmeta = query("UPDATE usersmeta SET country='{$country}',first_name='{$first_name}',last_name='{$last_name}',
		company='{$company}',address='{$address}',city='{$city}',zip='{$zip}',mobile='{$mobile}' WHERE user_id='{$user_id}'");
		confirm($query_update_usersmeta);
		if($query_update_usersmeta) {

			echo "<script>alert('User updated successfully')</script>";
		}

	}else {
		//insert usersmeta
		$query_insert_usersmeta = query("INSERT INTO usersmeta(country,first_name,last_name,company,address,city,zip,mobile,user_id) 
		VALUES('$country','$first_name','$last_name','$company','$address','$city','$zip','$mobile','$user_id')");
		confirm($query_insert_usersmeta);

		if($query_insert_usersmeta) {

			echo "<script>alert('User inserted successfully')</script>";
		}
	}

}

}

$query_usersmeta = query("SELECT * FROM usersmeta WHERE user_id='$user_id'");
	confirm($query_usersmeta);
	$row = fetch_array($query_usersmeta);
	
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$company = $row['company'];
	$address = $row['address'];
	$city = $row['city'];
	$country = $row['country'];
	$zip = $row['zip'];
	$mobile = $row['mobile'];


?>

<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
	<div class="page_header text-center">
		<h2>Shop - Checkout</h2>
		<p>Get the best kit for smooth shave</p>
	</div>
<form method="post" action="checkout.php">
<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Billing Details</h3>
						<div class="space30"></div>
						
							<label class="">Country </label>
							<select  value="" class="form-control">
								<option value="">Select Country</option>
								<option value="AX">Aland Islands</option>
								<option value="AF">Afghanistan</option>
								<option value="AL">Albania</option>
								<option value="DZ">Algeria</option>
								<option value="AD">Andorra</option>
								<option value="AO">Angola</option>
								<option value="AI">Anguilla</option>
								<option value="AQ">Antarctica</option>
								<option value="AG">Antigua and Barbuda</option>
								<option value="AR">Argentina</option>
								<option value="AM">Armenia</option>
								<option value="AW">Aruba</option>
								<option value="AU">Australia</option>
								<option value="AT">Austria</option>
								<option value="AZ">Azerbaijan</option>
								<option value="BS">Bahamas</option>
								<option value="BH">Bahrain</option>
								<option value="BD">Bangladesh</option>
								<option value="BB">Barbados</option>
							</select>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<label>First Name </label>
									<input class="form-control" name="first_name" placeholder="" value="<?php echo $first_name; ?>" type="text">
								</div>
								<div class="col-md-6">
									<label>Last Name </label>
									<input class="form-control" name="last_name" placeholder="" value="<?php echo $last_name; ?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Company Name</label>
							<input class="form-control" name="company" placeholder="" value="<?php echo $company; ?>" type="text">
							<div class="clearfix space20"></div>
							<label>Address </label>
							<input class="form-control" name="address" placeholder="Street address" value="<?php echo $address; ?>" type="text">
							<div class="clearfix space20"></div>
							
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-4">
									<label> City </label>
									<input class="form-control" name="city" placeholder=" City" value="<?php echo $city; ?>" type="text">
								</div>
								<div class="col-md-4">
									<label>Country</label>
									<input class="form-control" name="country" value="<?php echo $country; ?>" placeholder="State" type="text">
								</div>
								<div class="col-md-4">
									<label>Postcode </label>
									<input class="form-control" name="zip" placeholder=" Zip" value="<?php echo $zip; ?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							
							<label>Phone </label>
							<input class="form-control" name="mobile" id="billing_phone" placeholder="" value="<?php echo $mobile; ?>" type="text">
						
					</div>
				</div>
				
				
			</div>
			
			<div class="space30"></div>
			<h4 class="heading">Your order</h4>
			
			<table class="table table-bordered extra-padding">
				<tbody>
					<tr>
						<th>Cart Subtotal</th>
						<td><span class="amount">£190.00</span></td>
					</tr>
					<tr>
						<th>Shipping and Handling</th>
						<td>
							Free Shipping				
						</td>
					</tr>
					<tr>
						<th>Order Total</th>
						<td><strong><span class="amount">£190.00</span></strong> </td>
					</tr>
				</tbody>
			</table>
			
			<div class="clearfix space30"></div>
			<h4 class="heading">Payment Method</h4>
			<div class="clearfix space20"></div>
			
			<div class="payment-method">
				<div class="row">
					
						<div class="col-md-4">
							<input name="payment" id="radio1" class="css-checkbox" type="radio" value="cod"><span>Cash on Delivery</span>
							<div class="space20"></div>
							<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
						</div>
						<div class="col-md-4">
							<input name="payment" id="radio2" class="css-checkbox" type="radio" value="cheque"><span>Cheque Payment</span>
							<div class="space20"></div>
							<p>Please send your cheque to BLVCK Fashion House, Oatland Rood, UK, LS71JR</p>
						</div>
						<div class="col-md-4">
							<input name="payment" id="radio3" class="css-checkbox" type="radio" value="paypal"><span>Paypal</span>
							<div class="space20"></div>
							<p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account</p>
						</div>
					
				</div>
				<div class="space30"></div>
				
					<input name="agree" id="checkboxG2" value="true" class="css-checkbox" value="true" type="checkbox"><span>I've read and accept the <a href="#">terms &amp; conditions</a></span>
				
				<div class="space30"></div>
				<input type="submit" name="submit" class="button btn-lg" value="Pay Now">
			</div>
		</div>
	
		</form>

		</div>
	</section>
	
    <?php require_once("includes/footer.php"); ?>


	
	
	
	
	
