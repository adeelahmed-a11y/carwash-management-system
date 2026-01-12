<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<?php
include_once "sidebar.php";
?>
<div class="col-md-10 bg-light min-vh-100 pt-200">

<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-4">
<div class="card">
<div class="card-body text-center">
<h6>Total Categories</h6>
<?php
$sql="select * from category";
$result=mysqli_query($con,$sql);
echo mysqli_num_rows($result);
?>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card">
<div class="card-body text-center">
<h6>Total Product</h6>
<?php
$sql="select * from product";
$result=mysqli_query($con,$sql);
echo mysqli_num_rows($result);
?>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card">
<div class="card-body text-center">
<h6>Total Customer</h6>
<?php
$sql="select * from user";
$result=mysqli_query($con,$sql);
echo mysqli_num_rows($result);
?>
</div>
</div>
</div>

</div>
</div>
</div>

</div>
</div>
</div>