<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>
<?php require_once("../config.php"); ?>

<?php 

if(!isset($_SESSION['admin_email'])) {

	echo "<script>window.open('login.php','_self')</script>";

}else {


?>


<?php 

    $admin_session = $_SESSION['admin_email'];

    $query_admin = query("SELECT * FROM admin WHERE admin_email='$admin_session'");
    confirm($query_admin);
    $row = fetch_array($query_admin);
    $admin_id = $row['admin_id'];
    $admin_name = $row['admin_name'];
    $admin_email = $row['admin_email'];
    $admin_job = $row['admin_job'];
    $admin_image = $row['admin_image'];
    $admin_country = $row['admin_country'];
    $admin_contact = $row['admin_contact'];
    $admin_about = $row['admin_about'];
	
	$query_products = query("SELECT * FROM products");
	confirm($query_products);
    $count_products = mysqli_num_rows($query_products);
    
    $query_customers = query("SELECT * FROM customers");
    confirm($query_customers);
    $count_customers = mysqli_num_rows($query_customers);

    $query_categories = query("SELECT * FROM categories");
    confirm($query_categories);
    $count_categories = mysqli_num_rows($query_categories);

    $query_pending_orders = query("SELECT * FROM pending_orders");
    confirm($query_pending_orders);
    $count_pending_orders = mysqli_num_rows($query_pending_orders);
	
	
	
	?>
<section id="content">
<div class="content-blog">
<div class="container">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">Dashboard</h1>
<ol class="breadcrumb">
<li class="active">
<i class="fas fa-tachometer-alt"></i> Dashboard
</li>
</ol>
</div>
</div><!--row Ends-->

<div class="row">

<div class="col-lg-3 col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fas fa-tasks fa-5x"></i>
</div><!--col-xs-3 Ends -->
<div class="col-xs-9 text-right">
<div class="huge"><?php echo $count_products; ?></div>
<div>Products</div>
</div><!--col-xs-9 text-right Ends -->
</div><!--row 3 Ends -->
</div><!--panel-heading -->
<a href="admin?products.php">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>

</div>

</div>

<div class="col-lg-3 col-md-6">
<div class="panel panel-green">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fas fa-comments fa-5x"></i>
</div><!--col-xs-3 Ends -->
<div class="col-xs-9 text-right">
<div class="huge"><?php echo $count_customers; ?></div>
<div>Customers</div>
</div><!--col-xs-9 text-right Ends -->
</div><!--row 3 Ends -->
</div><!--panel-heading -->
<a href="admin?customers.php">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>

</div>

</div>

<div class="col-lg-3 col-md-6">
<div class="panel panel-yellow">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fas fa-shopping-cart fa-5x"></i>
</div><!--col-xs-3 Ends -->
<div class="col-xs-9 text-right">
<div class="huge"><?php echo $count_categories; ?></div>
<div>Categories</div>
</div><!--col-xs-9 text-right Ends -->
</div><!--row 3 Ends -->
</div><!--panel-heading -->
<a href="admin?categories.php">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>

</div>

</div>

<div class="col-lg-3 col-md-6">
<div class="panel panel-red">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fas fa-support fa-5x"></i>
</div><!--col-xs-3 Ends -->
<div class="col-xs-9 text-right">
<div class="huge"><?php echo $count_pending_orders; ?></div>
<div>Orders</div>
</div><!--col-xs-9 text-right Ends -->
</div><!--row 3 Ends -->
</div><!--panel-heading -->
<a href="admin?orders.php">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>

</div>

</div>

</div><!--2 row Ends -->

<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fas fa fa-money"></i> New Orders
                </h3>
            </div><!--panel-heading Ends -->

<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
    <thead>

        <tr>
            <th>Order No:</th>
            <th>Customer Email:</th>
            <th>Invoice No:</th>
            <th>Product ID</th>
            <th>Quantity</th>
            <th>Order Status</th>
        </tr>
    </thead>

    <?php 
    
    $i = 0;

    $query_pending_orders = query("SELECT * FROM pending_orders ORDER BY 1 DESC LIMIT 0,4");
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

    <tbody>
        <tr>
            <td><?php echo $i; ?></td>
            <td>
            <?php 
                $query_customer_email = query("SELECT * FROM customers WHERE customer_id='$customer_id'");
                confirm($query_customer_email);
                $row = fetch_array($query_customer_email);
                $customer_email = $row['customer_email'];
                echo $customer_email;
            ?>
            
            </td>
            <td><?php echo $invoice_number; ?></td>
            <td><?php echo $product_id; ?></td>
            <td><?php echo $quantity; ?></td>
            <td><?php echo $order_status; ?></td>
         
        </tr>

    <?php } ?>

    </tbody>
</table>
</div><!--table responsive Ends -->

<div class="text-right">
<a href="admin?view.orders.php">
    View All Orders <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>
</div>
</div><!--col-lg-8 Ends -->

    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="thumb-info mb-md">
                  <img src="admin_images/<?php echo $admin_image; ?>" class="rounded img-responsive">
                  <div class="thumb-info-title">
                      <span class="thumb-info-inner"><?php echo $admin_name; ?></span>
                      <span class="thumb-info-type"><?php echo $admin_job; ?></span>
                  </div> 
                </div><!--thumb-info mb-md -->

                <div class="mb-md">
                    <div class="widget-content-expanded">
                        <i class="fas fa-user-md"></i> <span>Email: </span> <?php echo $admin_email; ?> <br>
                        <i class="fas fa-user-md"></i> <span>Country: </span> <?php echo $admin_country; ?> <br>
                        <i class="fas fa-user-md"></i> <span>Contact: </span> <?php echo $admin_contact; ?> <br>
                    </div><!--widget-content-expanded -->

                    <hr class="dotted short">
                    <h5 class="text-muted">About</h5>
                    <p><?php echo $admin_about; ?> </p>
                </div>
            </div>
        </div>
    </div>


</div><!--3 row Ends -->
</div><!--container Ends -->
</div><!--content-blog Ends -->
</section>

<?php } ?>