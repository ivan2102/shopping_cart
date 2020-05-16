<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>
<?php require_once("config.php"); ?>
<?php

$customer_session = $_SESSION['customer_email'];
    

    $query_customer = query("SELECT * FROM customers WHERE customer_email='$customer_session'");
    confirm($query_customer);
    $row = fetch_array($query_customer);
    $customer_id = $row['customer_id'];

//$user_id = $_SESSION['customer_id'];
if(isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];

   $query_insert = query("INSERT INTO wishlist(product_id,customer_id,added_on)VALUES('{$product_id}','{$customer_id}',NOW())");
    confirm($query_insert);

    if($query_insert) {

        echo "<script>alert('Your Wishlist successfully inserted into Wishlist table')</script>";
        echo "<script>window.open('wishlist.php','_self')</script>";
    }

}




?>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>My Wishlist</h2>
					</div>
					<div class="col-md-12">

			<h3>Your Wishlist</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
					 <th>Wishlist ID</th>
					<th>Customer ID</th>
					<th>Product ID</th>
					<th>Product Title</th>
					<th>Product Price</th>
					<th>Added On</th>
					<th>Delete Wishlist</th>
					
					</tr>
				</thead>
				<tbody>

				<?php 
				$i = 0;

				$query_wishlist = query("SELECT * FROM wishlist");
				confirm($query_wishlist);

				while($row = fetch_array($query_wishlist)) {
                 $wishlist_id = $row['wishlist_id'];
				 $product_id = $row['product_id'];
				 $customer_id = $row['customer_id'];
				 $added_on = $row['added_on'];

				 $i++;
				
				  ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td>
							<?php echo $customer_id; ?>
						</td>
						<td>
							<?php echo $product_id; ?>		
						</td>
						<td>
						<?php 
							$query_products = query("SELECT * FROM products where product_id='$product_id'");
							confirm($query_products);
							$row = fetch_array($query_products);
							$product_title = $row['product_title'];
							$product_price = $row['product_price'];
							echo $product_title;
						?>				
						</td>
						<td>$<?php echo $product_price; ?></td>
						<td>
							<?php echo $added_on; ?>
						</td>

						<td>
						<a class="btn btn-danger btn-md" href="delete_wishlist.php?wishlist_id=<?php echo $wishlist_id; ?>">
						<i class="fas fa-trash"></i>
						</a>
						</td>
					</tr>
				<?php } ?>
					
				</tbody>
			</table>		

			<br>
			<br>
			<br>

			

					</div>
				</div>
			</div>
		</div>
	</section>
	
    <?php require_once("includes/footer.php"); ?>
