<?php require_once("includes/header.php"); ?>
<?php require_once("../config.php"); ?>			
<?php require_once("includes/nav.php"); ?>

<?php 

if(!isset($_SESSION['admin_email'])) {

	echo "<script>window.open('login.php','_self')</script>";

}else {


?>
	<div class="close-btn fa fa-times"></div>

	

	
<!-- SHOP CONTENT -->
<section id="content">
<div class="content-blog">
<div class="container">
<div class="row">
<div class="page_header text-center">
<h2>Admin Panel</h2>
<p>You can order products from here</p>
</div>
<div class="col-md-12">
<div class="row">

<?php 
$i = 0;

$query_get_products = query("SELECT * FROM products");
confirm($query_get_products);

while($row = fetch_array($query_get_products)) {

$product_id = $row['product_id'];
$product_image = $row['product_image'];
$product_title = $row['product_title'];
$product_price = $row['product_price'];
$i++;

?>
<div id="shop-mason" class="shop-mason-4col">
<div class="sm-item isotope-item">
	<div class="product">
		<div class="product-thumb">
			<img src="product_images/<?php echo $product_image; ?>" class="img-responsive" alt="">
			<div class="product-overlay">
				<span>
				<a href="../single.php?product_id=<?php echo $product_id; ?>" class="fa fa-link"></a>
				<a href="../single.php?product_id=<?php echo $product_id; ?>" class="fa fa-shopping-cart"></a>
				</span>					
			</div>
		</div>
		<div class="rating">
			<span class="fa fa-star act"></span>
			<span class="fa fa-star act"></span>
			<span class="fa fa-star act"></span>
			<span class="fa fa-star act"></span>
			<span class="fa fa-star act"></span>
		</div>
		<h2 class="product-title"><a href="#"><?php echo $product_title; ?></a></h2>
		<div class="product-price">$<?php echo $product_price; ?></div>
	</div>
</div>
<?php } ?>
</div>
</div>
<div class="clearfix"></div>
<!-- Pagination -->

<!-- End Pagination -->
</div>
</div>
</div>
</div>
</section>
	
<?php } ?>
<?php require_once("includes/footer.php"); ?>