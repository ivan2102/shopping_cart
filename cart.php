<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>
<?php require_once("config.php"); ?>


	<!-- SHOP CONTENT -->
<section id="content">
<div class="content-blog">
<div class="container">
<div class="row">
<div class="page_header text-center">
<h2>Shop Cart</h2>
<p>Get the best kit for smooth shave</p>
</div>
<div class="col-md-12">

<table class="cart-table table table-bordered">
<thead>
<tr>
<th>&nbsp;</th>
<th>Product Image</th>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
</tr>
</thead>
<tbody>
<?php 

$ip_address = getRealUserIp();

$total = 0;

$query_cart = query("SELECT * FROM cart WHERE ip_address='$ip_address'");
confirm($query_cart);


while($row = fetch_array($query_cart)) {

$product_id = $row['product_id'];
$quantity = $row['quantity'];

$query_products = query("SELECT * FROM products WHERE product_id='$product_id'");
confirm($query_products);

while($row = fetch_array($query_products)) {

$product_title = $row['product_title'];
$product_image = $row['product_image'];
$product_price = $row['product_price'];
$sub_total =  $row['product_price'] * $quantity;
$total += $sub_total;





?>
<tr>
<td>
<a value="<?php echo $product_id; ?>" class="btn btn-danger btn-md" href="delete_cart.php?product_id=<?php echo $product_id; ?>"><i class="fa fa-trash"></i></a>
</td>
<td>
<a href="#"><img src="admin/product_images/<?php echo $product_image; ?>" alt="" height="90" width="90"></a>					
</td>
<td>
<a href="#"><?php echo $product_title; ?></a>					
</td>
<td>
<span class="amount">$<?php echo $product_price; ?></span>					
</td>
<td>
<div class="quantity"><?php echo $quantity; ?></div>
</td>


<td>
<span class="amount">$<?php echo $total; ?></span>					
</td>
</tr>
<?php } } ?>
<tr>
<td colspan="6" class="actions">
<div class="col-md-6">
<div class="coupon">
<label>Coupon:</label><br>
<input name="code" placeholder="Coupon code" type="text"> <button name="submit" value="Apply Coupon" type="submit">Apply</button>
</div>
</div>

<?php 

if(isset($_POST['submit'])) {

	$code = escape_string($_POST['code']);

	if($code == "") {

     }else {

		$query_coupons = query("SELECT * FROM coupons WHERE coupon_code='$code'");
		confirm($query_coupons);

		$check_coupons = mysqli_num_rows($query_coupons);

		if($check_coupons == 1) {

			$row = fetch_array($query_coupons);

			$product_id = $row['product_id'];
			$coupon_price = $row['coupon_price'];
			$coupon_limit = $row['coupon_limit'];
			$coupon_used = $row['coupon_used'];

			if($coupon_limit == $coupon_used) {
			
				echo "<script>alert('Your Coupon Code Has Been Expired')</script>";

			} 
			else {

				$query_cart = query("SELECT * FROM cart WHERE product_id='$product_id' AND ip_address='$ip_address'");
				confirm($query_cart);
				$check_cart = mysqli_num_rows($query_cart);

				if($check_cart == 1) {

                 $query_update_coupons = query("UPDATE coupons SET coupon_used=coupon_used + 1 WHERE 
				 coupon_code='$code'");
				 confirm($query_update_coupons);

				 $query_update_cart = query("UPDATE cart SET product_price='$coupon_price' WHERE product_id='$product_id'
				 AND ip_address='$ip_address'");
				 confirm($query_update_cart);

				 echo "<script>alert('Your Coupon Code Has Been Applied')</script>";
				 echo "<script>window.open('cart.php','_self')</script>";


				}
				else {

                   echo "<script>alert('Product Does Not Exist In Cart')</script>";
				}

			}


			
		}
		
		else {

			echo "<script>alert('Your Coupon Code Is Not Valid')</script>";
		}
	 }
}


?>
<div class="col-md-6">
<div class="cart-btn">
<button class="button btn-md" type="submit">Update Cart</button>
<button class="button btn-md" type="submit">Checkout</a>
<a href="checkout.php">
</button>
</div>
</div>
</td>
</tr>
</tbody>
</table>		

<div class="cart_totals">
<div class="col-md-6 push-md-6 no-padding">
<h4 class="heading">Cart Totals</h4>
<table class="table table-bordered col-md-6">
<tbody>
<tr>
<th>Cart Subtotal</th>
<td><span class="amount">$<?php echo $sub_total; ?></span></td>
</tr>
<tr>
<th>Shipping and Handling</th>
<td>
Free Shipping				
</td>
</tr>
<tr>
<th>Order Total</th>
<td><strong><span class="amount">$<?php echo $total; ?></span></strong> </td>
</tr>
</tbody>
</table>
</div>
</div>			

</div>
</div>
</div>
</div>
</section>

<?php require_once("includes/footer.php"); ?>
