<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>
<?php require_once("config.php"); ?>
<?php if(!isset($_SESSION['customer']) && empty($_SESSION['customer'])) {

     redirect("Location: login.php");
} 

?>

<?php
$user_id = $_SESSION['customer_id'];
if(isset($_POST['submit'])) {
    if($_POST['agree'] == true) {
	
	$first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
	$last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
	$company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
	$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
	$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
	$country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
	$zip = filter_var($_POST['zip'], FILTER_SANITIZE_NUMBER_INT);
	$mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT);
	$payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);
	

	$query_user = query("SELECT * FROM usersmeta WHERE user_id='$user_id'");
	confirm($query_user);
	$row = fetch_array($query_user);
	$count = mysqli_num_rows($query_user);
	if($count == 1) {
	//update data in usersmeta table
	$query_update = query("UPDATE usersmeta SET first_name='$first_name',last_name='$last_name',
	company='$company',address='$address',city='$city',country='$country',zip='$zip',mobile='$mobile' WHERE user_id='$user_id'");
	confirm($query_update);
	
	if($query_update) {

		echo "<script>alert('Orders updated successfully')/script>";

	}

	}else {

		$query_insert = query("INSERT INTO usersmeta(user_id,first_name,last_name,company,address,city,country,zip,mobile)
		VALUES('$user_id','{$first_name}','{$last_name}','{$company}','{$address}','{$city}','{$country}','{$zip}','{$mobile}')");
		confirm($query_insert);
		if($query_insert) {

			echo "<script>alert('Orders inserted successfully')</script>";
		}

	}

}

}

$query_user = query("SELECT * FROM usersmeta WHERE user_id='$user_id'");
	confirm($query_user);
	while($row = fetch_array($query_user)) {


		$user_id = $row['user_id'];
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
						<h2>Shop - Cancel Order</h2>
						<p>Do you really want to cancel your Order?</p>
					</div>
<form method="post">
<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Cancel Order</h3>
						<div class="space30"></div>
						
						
							<div class="clearfix space20"></div>
							
							<div class="clearfix space20"></div>
							<label>Reason:</label>
							<textarea class="form-control" name="cancel" rows="" cols="10"></textarea> 
							
									
							
						
				
			
				
				<div class="space30"></div>
				<input type="submit" name="submit"  class="button btn-lg" value="Cancel Order">
			</div>
            </div>
				</div>
				
				
			</div>

	<?php } ?>
		</form>

		</div>
	</section>
	
    <?php require_once("includes/footer.php"); ?>
