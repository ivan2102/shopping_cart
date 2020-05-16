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
<i class="fas fa-tachometer-alt"></i> Dashboard / View Orders
</li>
</ol>
</div><!--col-lg-12 Ends -->
</div><!--row 1 Ends -->

<div class="row">
<div class="col-lg-12">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fas fa-money-bill-alt fa-fw"></i> View Orders
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Order N.O</th>
<th>Customer Email</th>
<th>Invoice Number</th>
<th>Product Title</th>
<th>Quantity</th>
<th>Order Date</th>
<th>Total Amount</th>
<th>Order Status</th>
<th>Delete Order</th>
</tr>
</thead><!-- thead Ends -->

<tbody>
<?php 

$i = 0;

$query_pending_orders = query("SELECT * from pending_orders");
confirm($query_pending_orders);

while($row = fetch_array($query_pending_orders)) {

$order_id = $row['order_id'];
$customer_id = $row['customer_id'];
$invoice_number = $row['invoice_number'];
$product_id = $row['product_id'];
$quantity = $row['quantity'];
$order_status = $row['order_status'];

$i++;

?>

<tr>
<td><?php echo $i; ?></td>
<td>
<?php
$query_customers = query("SELECT * FROM customers WHERE customer_id='$customer_id'");
confirm($query_customers);
$row = fetch_array($query_customers);
$customer_email = $row['customer_email'];
echo $customer_email;
?>
</td>
<td bgcolor="lightgreen"><?php echo $invoice_number; ?></td>
<td>
<?php
$query_products = query("SELECT * FROM products WHERE product_id='$product_id'");
confirm($query_products);
$row = fetch_array($query_products);
$product_title = $row['product_title'];
echo $product_title;
?>
</td>
<td><?php echo $quantity; ?></td>
<td>
<?php 
$query_customer_orders = query("SELECT * FROM customer_orders WHERE order_id='$order_id'");
confirm($query_customer_orders);
$row = fetch_array($query_customer_orders);
$due_amount = $row['due_amount'];
$order_date = $row['order_date'];
echo $order_date;

?>
</td>
<td>$<?php echo $due_amount; ?></td>
<td><?php echo $order_status; ?></td>
<td>
<a class="btn btn-danger btn-md" href="delete_order.php?order_id=<?php echo $order_id; ?>">
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
</div>
</section>



<?php } ?>











<?php require_once("includes/footer.php"); ?>