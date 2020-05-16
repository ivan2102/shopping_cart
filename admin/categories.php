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
			<div class="col-lg-12">
			<ol class="breadcrumb">
			<li class="active">
			<i class="fas fa-tachometer-alt"></i> Dashboard / View Categories
			</li>
			</ol>
			</div>
			</div>

			<div class="row">
			<div class="col-lg-12">
			<div class="panel-heading">
			<h3 class="panel-title">
			<i class="fas fa-money-bill-alt fa-fw"></i> View Categories
			</h3>
			</div>
			
				
					
					<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
					<thead>
					<tr>
					<th>Category ID</th>
					<th>Category Title</th>
					<th>Delete Category</th>
					<th>Edit Category</th>
					</tr>
					
					</thead>
					<tbody>
					<?php 
					$query_cat = query("SELECT * FROM categories");
					confirm($query_cat);

					while($row = fetch_array($query_cat)) {

						$category_id = $row['category_id'];
						$category_title = $row['category_title'];
					
					
					?>

					<tr>
					<td><?php echo $category_id; ?></td>
					<td><?php echo $category_title; ?></td>
					<td>
					<a class="btn btn-danger btn-lg" href="delete_category.php?category_id=<?php echo $category_id; ?>">
					<i class="fas fa-trash-alt"></i>
					</a>
					</td>
					<td>
					<a class="btn btn-info btn-lg" href="edit_category.php?category_id=<?php echo $category_id; ?>">
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
		</div>
	</section>
	

<?php require_once("includes/footer.php"); ?>

	<?php } ?>