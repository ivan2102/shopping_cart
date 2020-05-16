<?php require_once("includes/header.php"); ?>
<?php require_once("config.php"); ?>
<?php require_once("includes/nav.php"); ?>

<section id="content">
<div class="content-blog">
<div class="container">
<div class="row">
<div class="page_header text-center">
<h2>Shop</h2>
<p>You can order products from here</p>
</div>
<div class="col-md-12">
<div class="row">
<div id="shop-mason" class="shop-mason-4col">

<?php 
$query = "SELECT * FROM products";
if(isset($_GET['category_id'])){
$category_id = $_GET['category_id'];
$query .= " WHERE category_id='$category_id'";
confirm($query);

}


$query_category = query($query);
while($row = fetch_array($query_category)) {

$product_id = $row['product_id'];
$category_id = $row['category_id'];
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
<a href="single.php?product_id=<?php echo $product_id; ?>" class="fa fa-link"></a>
<a href="single.php?product_id=<?php echo $product_id; ?>" class="fa fa-shopping-cart"></a>
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
<?php }  ?>
</div>
</div>
<div class="clearfix"></div>
<!-- Pagination -->
<div class="page_nav">
<a href=""><i class="fa fa-angle-left"></i></a>
<a href="" class="active">1</a>
<a href="">2</a>
<a href="">3</a>
<a class="no-active">...</a>
<a href="">9</a>
<a href=""></i><i class="fa fa-angle-right"></i></a> 
</div>

<!-- End Pagination -->

</div>
</div>
</div>
</div>
</section>
	

<?php require_once("includes/footer.php"); ?>