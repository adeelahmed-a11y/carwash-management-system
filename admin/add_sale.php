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
<h5 class="pb-5">Add Sale</h5>
<form method="post" enctype="multipart/form-data">
    <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Product</label>
    <div class="col-md-6">
      <select name="product" class="form-control mb-2">
        <option value="">Product</option>
        <?php
        $sql = "select * from product";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
          <option value="<?php echo $row['id']; ?>"><?php echo $row['pro_title']; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
    <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Quantity</label>
    <div class="col-md-6">
      <input type="number" name="qty" placeholder="Enter product quantity" class="form-control mb-2">
    </div>
  </div>
    <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Customer</label>
    <div class="col-md-6">
      <select name="customer" class="form-control mb-2">
        <option value="">Customer</option>
        <?php
        $sql = "select * from user";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
          <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Description</label>
    <div class="col-md-6">
      <textarea name="description" rows="5" placeholder="Enter description" class="form-control mb-2"></textarea>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1"></label>
    <div class="col-md-6">
      <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </div>
  </div>
</form>



</div>
</div>


</div>
</div>
</div>
<?php
if(isset($_POST['submit'])){
    $product=$_POST['product'];
    $qty=$_POST['qty'];
	$customer=$_POST['customer'];
	$description=$_POST['description'];
    $date=date('Y-m-d');
    $time=date('H:i:s');
    $sql="select * from product where id='$product'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
    $available=$row['available']-$qty;
    $sql="update product set available='$available' where id='$product'";
    $result=mysqli_query($con,$sql);
	$sql="insert into sale values('','$product','$customer','$qty','$date','$time','$description')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Sale added successfully", "success").then(function() { window.location = "sale.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>