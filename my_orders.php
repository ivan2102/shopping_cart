<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>
<?php require_once("config.php"); ?>

<?php 

if(isset($_GET['customer_id'])) {

$customer_id = $_GET['customer_id'];
}



$ip_address = getRealUserIp();
$order_status = 'pending';
$invoice_number = mt_rand();

$query_cart = query("SELECT * FROM cart WHERE ip_address='$ip_address'");
confirm($query_cart);

while($row = fetch_array($query_cart)) {

$product_id = $row['product_id'];
$quantity = $row['quantity'];

$query_products = query("SELECT * FROM products WHERE product_id='$product_id'");
confirm($query_products);

while($row = fetch_array($query_products)) {

$sub_total = $row['product_price'] * $quantity;


$query_insert_customer_orders = query("INSERT INTO customer_orders(customer_id,due_amount,invoice_number,quantity,order_date,order_status) 
VALUES('{$customer_id}','{$sub_total}','{$invoice_number}','{$quantity}',NOW(),'{$order_status}')");
confirm($query_insert_customer_orders);

$query_insert_pending_orders = query("INSERT INTO pending_orders(customer_id,invoice_number,product_id,quantity,order_status) 
VALUES('{$customer_id}','{$invoice_number}','{$product_id}','{$quantity}','{$order_status}')");
confirm($query_insert_pending_orders);

$query_delete_cart = query("DELETE FROM cart WHERE ip_address='$ip_address'");
confirm($query_delete_cart);

echo "<script>alert('Your Order has been submitted successfully')</script>";
echo "<script>window.open('my_orders.php','_self')</script>";
}

}



?>


<!-- SHOP CONTENT -->
<section id="content">
<div class="content-blog content-account">
<div class="container">
<div class="row">
<div class="page_header text-center">
<h2>My Orders</h2>
</div>
<div class="col-md-12">

<h3>Recent Orders</h3>
<br>
<table class="cart-table account-table table table-bordered">
<thead>
<tr>
<th>O.N</th>
<th>Due Amount</th>
<th>Invoice Number</th>
<th>Quantity</th>
<th>Order Date</th>
<th>Paid/Unpaid</th>
<th>Order Status</th>
</tr>
</thead>
<tbody>
<?php

$customer_session = $_SESSION['customer_email'];

$query_customers = query("SELECT * FROM customers WHERE customer_email='$customer_session'");
confirm($query_customers);

$row = fetch_array($query_customers);

$customer_id = $row['customer_id'];

$query_orders = query("SELECT * FROM customer_orders WHERE customer_id='$customer_id'");
confirm($query_orders);

$i = 0;

while($row = fetch_array($query_orders)) {

$order_id = $row['order_id'];
$customer_id = $row['customer_id'];
$due_amount = $row['due_amount'];
$invoice_number = $row['invoice_number'];
$quantity = $row['quantity'];
$order_date = substr($row['order_date'],0,11);
$order_status = $row['order_status'];
$i++;

if($order_status == 'pending') {

$order_status = "Unpaid";

}else {

$order_status = "Paid";
}



?>
<tr>
<td>
<?php echo $i; ?>
</td>
<td>
$<?php echo $due_amount; ?>
</td>
<td>
<?php echo $invoice_number; ?>		
</td>
<td>
<?php echo $quantity; ?>			
</td>
<td>
<?php echo $order_date; ?>
</td>
<td>
<?php echo $order_status; ?>
</td>
<td>
<a href="confirm.php?order_id=<?php echo $order_id; ?>" target="blank" class="btn btn-primary">Confirm If Paid</a>
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
