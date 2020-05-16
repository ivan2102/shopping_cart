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
								<i class="fas fa-tachometer-alt"></i> Dashboard / Add Product
							</li>
						</ol>
					</div>
				</div>

				<div class="row">
                <div class="col-lg-12">
					<div class="panel-heading">
						<h3 class="panel-title">
							<i class="fas fa-money-bill-alt fa-fw"></i> Add Product
						</h3>
					</div>
				 
					
					<div class="panel-body">
					<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
					<label class="col-md-3 control-label">Product Title:</label>

					<div class="col-md-6">
					<input type="text" name="product_title" class="form-control">
					</div>
					</div>

					<div class="form-group">
					<label class="col-md-3 control-label">Product Category</label>

					<div class="col-md-6">
					<select name="product_category" id="product_category" class="form-control">
					<option value="">Select Category</option>

					<?php 
					
					$query_cat = query("SELECT * FROM categories");
					confirm($query_cat);

					while($row = fetch_array($query_cat)) {

						$category_id = $row['category_id'];
						$category_title = $row['category_title'];

						echo "<option value='$category_id'>$category_title</option>";
					}

				   
					
					?>
					</select>
					</div>
					</div>

					<div class="form-group">
					<label class="col-md-3 control-label">Product Price:</label>

					<div class="col-md-6">
					<input type="text" name="product_price" class="form-control">
					</div>
					</div>

					<div class="form-group">
					<label class="col-md-3 control-label">Product Image:</label>

					<div class="col-md-6">
					<input type="file" name="product_image" id="product_image" class="form-control">
					</div>
					</div>

					<div class="form-group">
					<label class="col-md-3 control-label">Product Description:</label>

					<div class="col-md-6">
					<textarea name="product_description" class="form-control"  rows="3"></textarea>
					</div>
					</div>

					<div class="form-group">
					<label class="col-md-3 control-label"></label>

					<div class="col-md-6">
					<input type="submit" name="add_product" value="Add Product" class="btn btn-primary form-control">
					</div>
					</div>
					</form>
					</div>
				</div>

				</div>
				</div>


			</div>
		</div>
	</section>
	

<?php require_once("includes/footer.php"); ?>

<?php } ?>

<?php 

if(isset($_POST['add_product'])) {

	$product_title = escape_string($_POST['product_title']);
	$product_category = escape_string($_POST['product_category']);
	$product_price = escape_string($_POST['product_price']);
	$product_description = escape_string($_POST['product_description']);
	$product_image = escape_string($_FILES['product_image']['name']);
	$temp_name = escape_string($_FILES['product_image']['tmp_name']);

	move_uploaded_file($temp_name, "product_images/$product_image");

	$query_insert_product = query("INSERT INTO products(product_title,category_id,product_price,product_image,product_description)
	VALUES('{$product_title}','{$category_id}','{$product_price}','{$product_image}','{$product_description}')");
	confirm($query_insert_product);

	if($query_insert_product) {

		echo "<script>alert('Product has been added successfully')</script>";
		echo "<script>window.open('products.php','_self')</script>";
	}
}


?>