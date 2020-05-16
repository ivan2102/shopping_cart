<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>
<?php require_once("../config.php"); ?>

<?php

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {


?>

<section id="content">
<div class="content-blog">
<div class="container">

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fas fa-tachometer-alt"></i> Dashboard / View Customers
</li>
</ol>
</div>
</div><!--row 1 Ends -->

<div class="row">
<div class="col-lg-12">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fas fa-money-bill-alt"></i> View Customers
</h3>
</div><!--panel-heading Ends -->

<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Customer O.N</th>
<th>Customer Name</th>
<th>Customer Email</th>
<th>Customer Country</th>
<th>Customer City</th>
<th>Customer Contact</th>
<th>Customer Address</th>
<th>Customer Image</th>
<th>Delete Customer</th>
</tr>
</thead>

<tbody>
<?php 

$i = 0;

$query_customers = query("SELECT * FROM customers");
confirm($query_customers);

while($row = fetch_array($query_customers)) {

$customer_id = $row['customer_id'];
$customer_name = $row['customer_name'];
$customer_email = $row['customer_email'];
$customer_country = $row['customer_country'];
$customer_city = $row['customer_city'];
$customer_contact = $row['customer_contact'];
$customer_address = $row['customer_address'];
$customer_image = $row['customer_image'];

$i++;

?>

<tr>
<td><?php echo $i; ?></td>
<td><?php echo $customer_name; ?></td>
<td><?php echo $customer_email; ?></td>
<td><?php echo $customer_country; ?></td>
<td><?php echo $customer_city; ?></td>
<td><?php echo $customer_contact; ?></td>
<td><?php echo $customer_address; ?></td>
<td><img src="customer_images/<?php echo $customer_image; ?>" width="50" height="50"></td>
<td>
<a class="btn btn-danger btn-md" href="delete_customer.php?customer_id=<?php echo $customer_id; ?>">
<i class="fas fa-trash"></i> 
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





<?php } ?>






















<?php require_once("includes/footer.php"); ?>