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
		<li>
		<i class="fas fa-tachometer-alt"></i> Dashboard / Add Category
		</li>
		</ol>
		</div>
		</div>

		<div class="row">
		<div class="col-lg-12">
		<div class="panel-heading">
		<h3 class="panel-title">
		<i class="fas fa-money-bill-alt fa-fw"></i> Add Category
		</h3>
		</div>
				
	<div class="panel-body">
	<form class="form-horizontal" action="" method="post">
		<div class="form-group">
		<label class="col-md-3 control-label">Category Title</label>

		<div class="col-md-6">
		<input type="text" name="category_title" class="form-control">
		</div>
		</div>

		<div class="form-group">
		<label class="col-md-3 control-label"></label>

		<div class="col-md-6">
		<input type="submit" name="submit" value="Submit" class=" btn btn-primary form-control">
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

	<?php 
	if(isset($_POST['submit'])) {

		$category_title = escape_string($_POST['category_title']);

		$query_insert_category = query("INSERT INTO categories(category_title)VALUES('{$category_title}')");
		confirm($query_insert_category);

		if($query_insert_category) {

			echo "<script>alert('New Category Added successfully')</script>";
			echo "<script>window.open('categories.php','_self')</script>";
		}else {

			echo "<script>alert('Failed Add Category')</script>";
		}
	}
	
	
	
	?>
	

<?php require_once("includes/footer.php"); ?>

<?php } ?>