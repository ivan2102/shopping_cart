<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>
<?php require_once("../config.php"); ?>

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
<i class="fas fa-tachometer-alt btn-warning"></i> Dashboard / Add Admin User
</li>
</ol>
</div>
</div><!--1 row Ends -->
<div class="row">
<div class="col-lg-12">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fas fa-money-bill-alt fa-fw btn-info"></i> Add Admin User
</h3>
</div><!--panel-heading Ends -->

<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<div class="col-md-3 control-label">
<label for="">Admin Name:</label>
</div>

<div class="col-md-6">
<input type="text" name="admin_name" class="form-control" required>
</div>
</div>

<div class="form-group">
<div class="col-md-3 control-label">
<label for="">Admin Email:</label>
</div>

<div class="col-md-6">
<input type="email" name="admin_email" class="form-control" required>
</div>
</div>

<div class="form-group">
<div class="col-md-3 control-label">
<label for="">Admin Password:</label>
</div>

<div class="col-md-6">
<input type="password" name="admin_password" class="form-control" required>
</div>
</div>

<div class="form-group">
<div class="col-md-3 control-label">
<label for="">Admin Job:</label>
</div>

<div class="col-md-6">
<input type="text" name="admin_job" class="form-control" required>
</div>
</div>

<div class="form-group">
<div class="col-md-3 control-label">
<label for="">Admin Image:</label>
</div>

<div class="col-md-6">
<input type="file" name="admin_image" class="form-control">
</div>
</div>

<div class="form-group">
<div class="col-md-3 control-label">
<label for="">Admin Country:</label>
</div>

<div class="col-md-6">
<input type="text" name="admin_country" class="form-control" required>
</div>
</div>

<div class="form-group">
<div class="col-md-3 control-label">
<label for="">Admin Contact:</label>
</div>

<div class="col-md-6">
<input type="text" name="admin_contact" class="form-control" required>
</div>
</div>

<div class="form-group">
<div class="col-md-3 control-label">
<label for="">Admin About:</label>
</div>

<div class="col-md-6">
<textarea rows="3" cols="" name="admin_about" class="form-control" required></textarea>
</div>
</div>



<div class="text-center">
<div class="col-md-3 control-label">
<label for=""></label>
</div>
<div class="col-md-6">
<button type="submit" name="submit" value="Add User" class="form-control btn btn-primary">
<i class="fas fa-user-md"></i> Add User
</button>
</div>
</div>
</form>
</div>
</div>

</div>
</div>

</section>

<?php 

if(isset($_POST['submit'])) {

    $admin_name = escape_string($_POST['admin_name']);
    $admin_email = escape_string($_POST['admin_email']);
    $admin_password = escape_string($_POST['admin_password']);
    $admin_job = escape_string($_POST['admin_job']);
    $admin_image = escape_string($_FILES['admin_image']['name']);
    $temp_image = escape_string($_POST['admin_image']['tmp_name']);
    $admin_country = escape_string($_POST['admin_country']);
    $admin_contact = escape_string($_POST['admin_contact']);
    $admin_about = escape_string($_POST['admin_about']);
    
    move_uploaded_file($temp_image,"customer_image/$admin_image");

    $query_insert_admin = query("INSERT INTO admin(admin_name,admin_email,admin_password,admin_job,admin_image,admin_country,admin_contact,admin_about) 
    VALUES('{$admin_name}','{$admin_email}','{$admin_password}','{$admin_job}','{$admin_image}','{$admin_country}','{$admin_contact}','{$admin_about}')");
    confirm($query_insert_admin);

    if($query_insert_admin) {

        echo "<script>alert('User added successfully')</script>";
        echo "<script>window.open('view_users.php','_self')</script>";
    }

   
}


?>



<?php } ?>





















<?php require_once("includes/footer.php"); ?>