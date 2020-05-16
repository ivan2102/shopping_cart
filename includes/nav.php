<?php require_once("config.php"); ?>

<div class="menu-wrap">
<div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
<ul class="sf-menu">
<li>
<a href="index.php">Home</a>
</li>

<li>

<a href="cart.php">Cart</a>
</li>
<li>
<a href="#">Shop</a>
<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
<ul>

<?php 
$query_cat = query("SELECT * FROM categories");
confirm($query_cat);
while($row = fetch_array($query_cat)) {

	$category_id = $row['category_id'];
	$category_title = $row['category_title'];

?>

<li><a href="index.php?category_id=<?php echo $category_id; ?>"><?php echo $category_title; ?></a></li>

<?php } ?>
</ul>
</li>
<li>
<a href="my_account.php">My Account</a>

<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
<ul>
	<li><a href="my_orders.php">My Orders</a></li>
	<li><a href="edit_account.php">Edit Account</a></li>
	<li>
<?php
if(!isset($_SESSION['customer_email'])) {

	echo "<a href='login.php'>Login</a>";
}else {

	echo "<a href='logout.php'>Logout</a>";
}

?>
</li>
</ul>
</<a>
<li>
<a href="contact.php">Contact Us</a>
</li>
<li>
<a href="admin/index.php">Admin</a>
</li>
<li>
<!--<a href="customer_register.php">Register</a>-->
<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
<ul>
<li>

</li>
</ul>
</li

</ul>
<div class="header-xtra">
<div class="s-cart">
<div class="sc-ico"><i class="fa fa-shopping-cart"></i><em><?php items(); ?></em></div>

<div class="cart-info">
	<small>You have <em class="highlight"><?php items(); ?> item(s)</em> in your shopping bag</small>
	<br>
	<br>
	<?php 

	$total = 0;

	$ip_address = getRealUserIp();

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
	$sub_total = $row['product_price'] * $quantity;
	$total += $sub_total;
	
    ?>
	<div class="ci-item">
		<img src="admin/product_images/<?php echo $product_image; ?>" width="70" alt=""/>
		<div class="ci-item-info">
			<h5><a href="cart.php"><?php echo $product_title; ?></a></h5>
			<p><?php echo $product_price; ?> INR <?php echo $quantity; ?></p>
			<div class="ci-edit">
				<a href="#" class="edit fa fa-edit"></a>
				<a href="delete_cart.php?product_id=<?php echo $product_id; ?>" class="edit fa fa-trash"></a>
			</div>
		</div>
	</div>

	<div class="ci-total">Subtotal: <?php echo $sub_total; ?></div>
	<div class="cart-btn">
		<a href="cart.php">View Bag</a>
		<a href="#">Checkout</a>
	</div>
	<?php } } ?>
</div>
</div>
<div class="s-search">
<div class="ss-ico"><i class="fa fa-search"></i></div>
<div class="search-block">
	<div class="ssc-inner">
		<form>
			<input type="text" placeholder="Type Search text here...">
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
</div>
</div>
</div>
</div>
</div>
</header>