<?php require_once("includes/header.php"); ?>
<?php require_once("../config.php"); ?>			
<?php require_once("includes/nav.php"); ?>


<?php  

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {



if(isset($_GET['category_id'])) {

    $category_id = $_GET['category_id'];

    $query_edit = query("SELECT * FROM categories WHERE category_id='$category_id'");
    confirm($query_edit);

    $row = fetch_array($query_edit);

    $category_id = $row['category_id'];
    $category_title = $row['category_title'];
}



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

<form class="form-horizontal" action="" method="POST">
<div class="form-group">
<label class="col-md-3 control-label">Category Title</label>

<div class="col-md-6">
<input type="text" name="category_title" value="<?php echo $category_title; ?>" class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"></label>

<div class="col-md-6">
<input type="submit" name="update" value="Update Category" class="btn btn-primary form-control">
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

if(isset($_POST['update'])) {

    $category_title = escape_string($_POST['category_title']);

    $query_update_cat = query("UPDATE categories SET category_title='$category_title' WHERE category_id='$category_id'");
    confirm($query_update_cat);

    if($query_update_cat) {

        echo "<script>alert('Category has been updated successfully')</script>";
        echo "<script>window.open('edit_category.php','_self')</script>";
    }
}




?>

<?php } ?>




























<?php require_once("includes/footer.php"); ?>