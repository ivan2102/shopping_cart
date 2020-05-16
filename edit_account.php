<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>
<?php require_once("config.php"); ?>

<?php 

$customer_session = $_SESSION['customer_email'];

$query_customer = query("SELECT * FROM customers WHERE customer_email='$customer_session'"); 
confirm($query_customer);


$row = fetch_array($query_customer);

$customer_id = $row['customer_id'];
$customer_name = $row['customer_name'];
$customer_email = $row['customer_email'];
$customer_country = $row['customer_country'];
$customer_city = $row['customer_city'];
$customer_contact = $row['customer_contact'];
$customer_address = $row['customer_address'];
$customer_image = $row['customer_image'];

  

?>

<section id="content">
<div class="content-blog">
<div class="container">
<div class="row">
<div class="page_header text-center">
<h2>Edit Your Account</h2>
</div><!--page_header Ends -->

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label>Customer Name:</label>
<input type="text" name="customer_name" class="form-control" value="<?php echo $customer_name; ?>" required>
</div>

<div class="form-group">
<label>Customer Email:</label>
<input type="text" name="customer_email" class="form-control" value="<?php echo $customer_email; ?>" required>
</div>

<div class="form-group">
<label>Customer Country:</label>
<input type="text" name="customer_country" class="form-control" value="<?php echo $customer_country; ?>" required>
</div>

<div class="form-group">
<label>Customer City:</label>
<input type="text" name="customer_city" class="form-control" value="<?php echo $customer_city; ?>" required>
</div>

<div class="form-group">
<label>Customer Contact:</label>
<input type="text" name="customer_contact" class="form-control" value="<?php echo $customer_contact; ?>" required>
</div>

<div class="form-group">
<label>Customer Address</label>
<input type="text" name="customer_address" class="form-control" value="<?php echo $customer_address; ?>" required>
</div>

<div class="form-group">
<label>Customer Image</label>
<input type="file" name="customer_image" class="form-control">
</div>

<div class="text-center">
<button type="submit" name="update" class="btn btn-primary btn-lg">
<i class="fas fa-edit"></i> Update Now
</button>



</div>
</form>



<?php 

if(isset($_POST['update'])) {

    $customer_name = escape_string($_POST['customer_name']);
    $customer_email = escape_string($_POST['customer_email']);
    $customer_country = escape_string($_POST['customer_country']);
    $customer_city = escape_string($_POST['customer_city']);
    $customer_contact = escape_string($_POST['customer_contact']);
    $customer_address = escape_string($_POST['customer_address']);
    $customer_image = escape_string($_FILES['customer_image']['name']);
    $temp_image = escape_string($_FILES['customer_image']['tmp_name']);

    move_uploaded_file($temp_image,"images/$customer_image");

    $query_update_customer = query("UPDATE customers SET customer_name='{$customer_name}',customer_email='{$customer_email}',customer_country='{$customer_country}',
    customer_city='{$customer_city}',customer_contact='{$customer_contact}',customer_address='{$customer_address}',customer_image='{$customer_image}' WHERE customer_id='{$customer_id}'");
    confirm($query_update_customer);

    if($query_update_customer) {

        echo "<script>alert('Your Account updated successfully,please Log in again')</script>";
        echo "<script>window.open('login.php','_self')</script>";
    }
}



?>
</div>
</div>
</div>
</section>









<?php require_once("includes/footer.php"); ?>