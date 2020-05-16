<?php require_once("../config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php") ?>

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
<i class="fas fa-tachometer-alt"></i> Dashboard / View Payments
</li>
</ol>
</div>
</div><!--1 row Ends -->

<div class="row">
<div class="col-lg-12">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fas fa-money-bill-alt fa-fw btn-info"></i> View Payments
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Payment N.O</th>
<th>Invoice Number</th>
<th>Amount Sent</th>
<th>Payment Mode</th>
<th>Transaction</th>
<th>Omni Code</th>
<th>Payment Date</th>
<th>Delete Payment</th>
</tr>
</thead>

<tbody>
<?php 

$i = 0;

$query_payments = query("SELECT * FROM payments");
confirm($query_payments);

while($row = fetch_array($query_payments)) {

    $payment_id = $row['payment_id'];
    $invoice_number = $row['invoice_no'];
    $amount_sent = $row['amount_sent'];
    $payment_mode = $row['payment_mode'];
    $transaction = $row['transaction'];
    $omni_code = $row['omni_code'];
    $payment_date = $row['payment_date'];
    
    $i++;

?>

<tr>
<td><?php echo $i; ?></td>
<td bgcolor="lightgreen"><?php echo $invoice_number; ?></td>
<td><?php echo $amount_sent; ?></td>
<td><?php echo $payment_mode; ?></td>
<td><?php echo $transaction; ?></td>
<td><?php echo $omni_code; ?></td>
<td><?php echo $payment_date; ?></td>
<td>
<a class="btn btn-danger btn-md" href="delete_payment.php?payment_id=<?php echo $payment_id; ?>">
<i class="fas fa-trash"></i>
</a>
</td>
</tr>

<?php } ?>

</tbody>
</table>
</div>
</div><!--panel-body Ends -->
</div>
</div>
</div>
</div>
</section>



<?php } ?>

















<?php require_once("includes/footer.php"); ?>