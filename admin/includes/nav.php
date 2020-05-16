<?php require_once("../config.php");?>
<?php 

if(!isset($_SESSION['admin_email'])) {

echo "<script>window.open('login.php','_self')</script>";

}else {






?>



<div class="menu-wrap">
<div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
<ul class="sf-menu">
<li>
<a href="../index.php">Home</a>
</li>
<li>
<a href="dashboard.php">Dashboard</a>
</li>

<li>
<a href="#">Products</a>
<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
<ul>
<li><a href="products.php">View Products</a></li>
<li><a href="add_product.php">Add Product</a></li>

</ul>
</li>

<li>
<a href="#">Categories</a>
<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
<ul>
<li><a href="categories.php">View Categories</a></li>
<li><a href="add_category.php">Add Category</a></li>

</ul>
</li>
<li>
<a href="#">Orders</a>
<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
<ul>
<li><a href="view_orders.php">View Orders</a></li>
<li><a href="view_payments.php">View Payments</a></li>
</ul>
</li>

<li>
<a href="#">Users</a>
<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
<ul>
<li><a href="add_user.php">Add User</a></li>
<li><a href="view_users.php">View Users</a></li>
<li><a href="edit_profile.php?admin_id=<?php echo $admin_id; ?>">Edit Profile</a></li>
</ul>
</li>



<li>
<a href="#">My Account</a>
<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
<ul>
<li><a href="view_customers.php">View Customers</a></li>
<li><a href="login.php">Login</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</li>


</ul>
<div class="header-xtra">
<div class="s-cart">
<div class="sc-ico"><i class="fa fa-shopping-cart"></i><em><?php  items(); ?></em></div>

<div class="cart-info">
<small>You have <em class="highlight"><?php items(); ?> item(s)</em> in your shopping bag</small>
<br>
<br>
<?php 
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
$product_price = $row['product_price'];
$product_image = $row['product_image'];
$sub_total = $row['product_price'] * $quantity;




?>
<div class="ci-item">

<img src="admin/product_images/<?php echo $product_image; ?>" width="70" alt=""/>
<div class="ci-item-info">
<h5><a href="./single-product.html"><?php echo $product_title; ?></a></h5>
<p>$<?php echo $product_price; ?></p>
<div class="ci-edit">
<a href="#" class="edit fa fa-edit"></a>
<a href="delete_cart.php?product_id=<? echo $product_id; ?>" class="edit fa fa-trash"></a>
</div>
</div>
</div>


<div class="ci-total">Subtotal: $<?php echo $sub_total; ?></div>
<div class="cart-btn">
<a href="#">View Bag</a>
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

<?php } ?>