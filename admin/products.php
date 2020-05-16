<?php require_once("includes/header.php"); ?>
<?php require_once("../config.php"); ?>		
<?php require_once("includes/nav.php"); ?>

<?php  

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {

	?>
	
<section id="content">
<div class="content-blog">
<div class="container">
<div class="row">

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fas fa-tachometer-alt"></i> Dashboard / View Products
</li>
</ol>
</div><!--col-lg-12 Ends -->
</div><!-- 2 row Ends -->

<div class="row">
<div class="col-lg-12">
<div class="panel-heading">
    <h3 class="panel-title">
        <i class="fas fa-money-bill-alt fa-fw"></i> View Products
</div>
</div>
</div>

<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Product ID</th>
<th>Product Title</th>
<th> Category ID</th>
<th>Product Price</th>
<th>Product Image</th>
<th>Product Description</th>
<th>Delete Product</th>
<th>Edit Product</th>
</tr>

</thead>

<tbody>
<?php
$i = 0;

$query_products= query("SELECT * FROM products");
confirm($query_products);

while($row = fetch_array($query_products)) {

    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $category_id = $row['category_id'];
    $product_price = $row['product_price'];
    $product_image = $row['product_image'];
    $product_description = substr($row['product_description'],0,100);
    $i++;


?>



<tr>
<td><?php echo $i; ?></td>
<td><?php echo $product_title; ?></td>
<td><?php echo $category_id; ?></td>
<td><?php echo $product_price; ?></td>
<td><img src="product_images/<?php echo $product_image; ?>" width="70" height="70"></td>
<td><?php echo $product_description; ?></td>
<td>
<a class="btn btn-danger btn-md" href="delete_product.php?product_id=<?php echo $product_id; ?>">
<i class="fas fa-trash-alt"></i>
</a>
</td>
<td>
<a class="btn btn-info btn-md" href="edit_product.php?product_id=<?php echo $product_id; ?>">
<i class="fas fa-pencil-alt"></i>
</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>






</div>
</div>
</div>
</div>
</section>

<?php } ?>

<?php require_once("includes/footer.php"); ?>

