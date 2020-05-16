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
<i class="fas fa-tachometer-alt btn-success"></i> Dashboard / View Users
</li>
</ol>
</div>
</div><!--1 row Ends -->

<div class="row">
<div class="col-lg-12">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fas fa-money-bill fa-fw btn-info"></i> View Admin Users
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Admin O.N</th>
<th>Admin Name</th>
<th>Admin Email</th>
<th>Admin Job</th>
<th>Admin Image</th>
<th>Admin Country</th>
<th>Admin Contact</th>
<th>Admin About</th>
<th>Delete Admin</th>
<th>Edit Profile</th>
</tr>
</thead>

<tbody>
<?php 

$i = 0;

$query_admin = query("SELECT * FROM admin");
confirm($query_admin);

while($row = fetch_array($query_admin)) {

    $admin_id = $row['admin_id'];
    $admin_name = $row['admin_name'];
    $admin_email = $row['admin_email'];
    $admin_job = $row['admin_job'];
    $admin_image = $row['admin_image'];
    $admin_country = $row['admin_country'];
    $admin_contact = $row['admin_contact'];
    $admin_about = substr($row['admin_about'],0,100);
     $i++;

?>

<tr>
<td><?php echo $i; ?></td>
<td><?php echo $admin_name; ?></td>
<td><?php echo $admin_email; ?></td>
<td><?php echo $admin_job; ?></td>
<td><img src="admin_images/<?php echo $admin_image;  ?>" width="50" height="50"></td>
<td><?php echo $admin_country; ?></td>
<td><?php echo $admin_contact; ?></td>
<td><?php echo $admin_about; ?></td>
<td>
<a class="btn btn-danger" href="delete_user.php?admin_id=<?php echo $admin_id; ?>">
<i class="fas fa-trash"></i>
</a>
</td>
<td>
<a class="btn btn-info" href="edit_profile.php?admin_id=<?php echo $admin_id; ?>">
<i class="fas fa-pencil-alt"></i>
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