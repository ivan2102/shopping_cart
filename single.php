<?php require_once("includes/header.php"); 
 require_once("includes/nav.php"); 	
 require_once("config.php"); 

//$user_id = $_SESSION['customer_id'];

if(isset($_GET['product_id'])) {
	$product_id = $_GET['product_id'];

	$query_pro = query("SELECT * FROM products WHERE product_id='$product_id'");
	confirm($query_pro);

	$row = fetch_array($query_pro); 
	$product_id = $row['product_id'];
	$product_category_id = $row['product_category_id'];
	$product_title = $row['product_title'];
	$product_price = $row['product_price'];
	$product_image = $row['product_image'];
	$product_description = $row['product_description'];

	
}


if(isset($_POST['submit'])) {

	$review = escape_string($_POST['review']);

	$query_insert_review = query("INSERT INTO reviews(product_id,user_id,review) VALUES('{$product_id}','{$user_id}','{$review}')");
	confirm($query_insert_review);

	if($query_insert_review) {

		echo "<script>alert('Review inserted successfully')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
}



?>


	
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Shop</h2>
						<p>Get the best kit for smooth shave</p>
					</div>

				
					<div class="col-md-10 col-md-offset-1">

<div class="row">
<div class="col-md-5">
<div class="gal-wrap">
<div id="gal-slider" class="flexslider">
<ul class="slides">
<!--<li><img src="images/shop/1.jpg" class="img-responsive" alt=""/></li>
<li><img src="images/shop/2.jpg" class="img-responsive" alt=""/></li>
<li><img src="images/shop/3.jpg" class="img-responsive" alt=""/></li>-->
<li><img src="admin/product_images/<?php echo $product_image; ?>" class="img-responsive" alt=""/></li>
</ul>
</div>
<ul class="gal-nav">
<li>
<div>
<img src="admin/product_images/<?php echo $product_image; ?>" class="img-responsive" alt=""/>
</div>
</li>
<!--<li>
<div>
<img src="images/shop/2.jpg" class="img-responsive" alt=""/>
</div>
</li>
<li>
<div>
<img src="images/shop/3.jpg" class="img-responsive" alt=""/>
</div>
</li>
<li>
<div>
<img src="images/shop/4.jpg" class="img-responsive" alt=""/>
</div>
</li>-->
</ul>
<div class="clearfix"></div>

</div>
</div>
<div class="col-md-7 product-single">
<h2 class="product-single-title no-margin"><?php echo $product_title; ?></h2>
<div class="space10"></div>
<div class="p-price"><?php echo $product_price; ?></div>
<p><?php echo $product_description; ?></p>

<?php add_cart(); ?>
 
<form action="single.php?add_cart=<?php echo $product_id; ?>" method="post" class="form-horizontal">
<div class="product-quantity">
<span>Quantity:</span>
<select name="quantity" class="form-control">
<option>Select Quantity</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select> 

</div>
<div class="shop-btn-wrap">
<button href="#" type="submit" class="button btn-small">Add to Cart
<i class="fas fa-shopping-cart"></i>
</button>
</div>
</form>
<div class="shop-btn-wrap">
<button href="#" type="submit" class="button btn-small">
<a href="wishlist.php?product_id=<?php echo $product_id; ?>">Add to Wishlist
<i class="fas fa-heart"></i>
</a>
</button>
</div>
<div class="product-meta">

<span>Categories:
<?php 
$query_cat = query("SELECT * FROM categories WHERE category_id='$product_category_id'");
confirm($query_cat);
$row = fetch_array($query_cat);

?>

<a href="#"><?php echo $row['category_title']; ?></a></span><br>


</div>
</div>
</div>
<div class="clearfix space30"></div>
<div class="tab-style3">
<!-- Nav Tabs -->
<div class="align-center mb-40 mb-xs-30">
<ul class="nav nav-tabs tpl-minimal-tabs animate">
<li class="active col-md-4">
<a aria-expanded="true" href="#mini-one" data-toggle="tab">Overview</a>
</li>
<li class="col-md-4">
<a aria-expanded="false" href="#mini-two" data-toggle="tab">Product Info</a>
</li>
<li class="col-md-4">
<a aria-expanded="false" href="#mini-three" data-toggle="tab">Reviews</a>
</li>
</ul>
</div>
<!-- End Nav Tabs -->
<!-- Tab panes -->
<div style="height: auto;" class="tab-content tpl-minimal-tabs-cont align-center section-text">
<div style="" class="tab-pane fade active in" id="mini-one">
<p><?php echo $product_description; ?></p>

</div>
<div style="" class="tab-pane fade" id="mini-two">
<table class="table tba2">
<tbody>

</tbody>
</table>
</div>
<div style="" class="tab-pane fade" id="mini-three">
<div class="col-md-12">
<h4 class="uppercase space35">3 <?php echo $product_title; ?></h4>
<ul class="comment-list">

<?php 




$query_select_reviews = query("SELECT * FROM reviews");
confirm($query_select_reviews);

while($row = fetch_array($query_select_reviews)) {

$review_id = $row['review_id'];
$review = $row['review'];
$review_image = $row['review_image'];
$timestamp = $row['timestamp'];

$query_select_customers = query("SELECT * FROM customers");
confirm($query_select_customers);
$row = fetch_array($query_select_customers);
$customer_name = $row['customer_name'];


?>
<li>
<a class="pull-left" href="#"><img class="comment-avatar" src="admin/admin_images/<?php echo $review_image; ?>" alt="" height="50" width="50"></a>
<div class="comment-meta">
<a href="#"><?php echo $customer_name; ?></a>
<span>
<em><?php echo $timestamp; ?></em>
</span>
</div>
<div class="rating2">
<span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
</div>
<p>
 <?php echo $review; ?>
</p>
</li>
<?php }  ?>

</ul>
<h4 class="uppercase space20">Add a review</h4>
<form id="form" method="post" class="review-form">
<?php 
$query_select_customers = query("SELECT * FROM customers");
confirm($query_select_customers);
$row = fetch_array($query_select_customers);
$customer_name = $row['customer_name'];
$customer_email = $row['customer_email'];

?>
<div class="row">
<div class="col-md-6 space20">
<input name="name" class="input-md form-control" value="<?php echo $customer_name; ?>" placeholder="Name *" maxlength="100" required="" type="text">
</div>
<div class="col-md-6 space20">
<input name="email" class="input-md form-control" value="<?php echo $customer_email; ?>" placeholder="Email *" maxlength="100" required="" type="email">
</div>
</div>
<div class="space20">
<span>Your Ratings</span>
<div class="clearfix"></div>
<div class="rating3">
<span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span>
</div>
<div class="clearfix space20"></div>
</div>
<div class="space20">
<textarea name="review" id="text" class="input-md form-control" rows="6" placeholder="Add review.." maxlength="400"></textarea>
</div>
<button type="submit" name="submit" class="button btn-small">
Submit Review
</button>
</form>
</div>
<div class="clearfix space30"></div>
</div>
</div>
</div>
<div class="space30"></div>
<div class="related-products">
<h4 class="heading">Related Products</h4>
<hr>
<div class="row">
	<div id="shop-mason" class="shop-mason-3col">

	<?php 
	$query_rel_prod = query("SELECT * FROM products ORDER BY rand() LIMIT 3");
	confirm($query_rel_prod);

	while($row = fetch_array($query_rel_prod)) {

		$product_id = $row['product_id'];
		$product_title = $row['product_title'];
		$product_price = $row['product_price'];
		$product_image = $row['product_image'];
	
	?>
<div class="sm-item isotope-item">
<div class="product">
<div class="product-thumb">
<img src="admin/product_images/<?php echo $product_image; ?>" class="img-responsive" alt="">
<div class="product-overlay">
<span>
<a href="index.php?product_id=<?php echo $product_id; ?>" class="fa fa-link"></a>
<a href="#" class="fa fa-shopping-cart"></a>
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
<div class="product-price">$79.00<span><?php echo $product_price; ?></span></div>
</div>
</div>

<?php } ?>

</div>

</div>
</div>

</div>
</div>
</div>
</div>
</section>

<?php require_once("includes/footer.php"); ?>



