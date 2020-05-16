<?php require_once("includes/header.php"); ?>
<?php require_once("../config.php"); ?>			
<?php require_once("includes/nav.php"); ?>

<?php  

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {

	?>

    <?php

    if(isset($_GET['product_id'])) {

        $product_id = $_GET['product_id'];

        $query_pro = query("SELECT * FROM products WHERE product_id='$product_id'");
        confirm($query_pro);

        $row = fetch_array($query_pro);

        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_category = $row['product_category_id'];
        $product_price = $row['product_price'];
        $product_image = $row['product_image'];
        $product_description = $row['product_description'];
    }

    if(isset($_GET['category_id'])) {

        $category_id = $_GET['category_id'];

    $query_categories = query("SELECT * FROM categories WHERE category_id='$category_id'");
    confirm($query_categories);

    $row = fetch_array($query_categories);
    $category_id = $row['category_id'];
    $category_title = $row['category_title'];

    }

    ?>

    <section id="content">
    <div class="content-blog">
    <div class="container">
    <div class="row">
    <div class="panel-body">
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label class="col-md-3 control-label">Product Title:</label>

    <div class="col-md-6">
    <input type="text" name="product_title" value="<?php echo $product_title; ?>" class="form-control">
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-3 control-label">Product Category</label>

    <div class="col-md-6">
    <select name="product_category" id="product_category"  class="form-control">
    <option value=""><?php echo $product_category; ?></option>

    <?php 
    $query_cat = query("SELECT * FROM categories");
    confirm($query_cat);

    while($row = fetch_array($query_cat)) {

        $category_id  = $row['category_id'];
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
    <input type="text" name="product_price" value="<?php echo $product_price; ?>" class="form-control">
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-3 control-label">Product Image:</label>

    <div class="col-md-6">
    <input type="file" name="product_image" class="form-control">
    <br>
    <img src="admin/product_images/<?php echo $product_image; ?>" width="70" height="70">
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-3 control-label">Product Description:</label>

    <div class="col-md-6">
    <textarea name="product_description"  class="form-control" rows="3"><?php echo $product_description; ?></textarea>
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-3 control-label"></label>

    <div class="col-md-6">
    <input type="submit" name="update" value="Update Product" class="btn btn-primary form-control">
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </section>

<?php require_once("includes/footer.php"); ?>


<?php } ?>


<?php 

if(isset($_POST['update'])) {

    $product_title = escape_string($_POST['product_title']);
    $product_category = escape_string($_POST['product_category']);
    $product_price = escape_string($_POST['product_price']);
    $product_image = escape_string($_FILES['product_image']['name']);
    $temp_image = escape_string($_FILES['product_image']['tmp_name']);
    $product_description = escape_string($_POST['product_description']);

    move_uploaded_file($temp_image, "product_images/$product_image");

    $query_updates = query("UPDATE products SET product_title='$product_title',product_category_id='$product_category',
    product_price='$product_price',product_image='$product_image',product_description='$product_description'
    WHERE product_id='$product_id'");
    confirm($query_updates);

    if($query_updates) {

        echo "<script>alert('Product has been updated successfully')</script>";
        echo "<script>window.open('products.php','_self')</script>";
    }
}





?>