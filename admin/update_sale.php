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
<h5 class="pb-5">Update Sale</h5>
<?php
$id=$_REQUEST['id'];
$sql = "SELECT sale.*, pro_title, purchase_price, user.name from sale INNER JOIN product on product.id=sale.pro_id INNER JOIN user on user.id=sale.user_id where sale.id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<form method="post" enctype="multipart/form-data">
    <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Product</label>
    <div class="col-md-6">
      <select name="product" class="form-control mb-2">
        <option value="">Product</option>
        <?php
        $sql1 = "select * from product";
        $result1 = mysqli_query($con, $sql1);
        while ($row1 = mysqli_fetch_array($result1)) {
        ?>
          <option value="<?php echo $row1['id']; ?>" <?php if($row['pro_id']==$row1['id']) echo "selected";?>><?php echo $row1['pro_title']; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
    <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Quantity</label>
    <div class="col-md-6">
      <input type="number" name="qty" value="<?php echo $row['qty']; ?>" placeholder="Enter product quantity" class="form-control mb-2">
    </div>
  </div>
    <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Customer</label>
    <div class="col-md-6">
      <select name="customer" class="form-control mb-2">
        <option value="">Customer</option>
        <?php
        $sql1 = "select * from user";
        $result1 = mysqli_query($con, $sql1);
        while ($row1 = mysqli_fetch_array($result1)) {
        ?>
          <option value="<?php echo $row1['id']; ?>" <?php if($row['user_id']==$row1['id']) echo "selected";?>><?php echo $row1['name']; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Description</label>
    <div class="col-md-6">
      <textarea name="description" rows="5" placeholder="Enter description" class="form-control mb-2"><?php echo $row['description']; ?></textarea>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1"></label>
    <div class="col-md-6">
      <button type="submit" name="submit" class="btn btn-success">Update</button>
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
	$sql="update sale set pro_id='$product', user_id='$customer', qty='$qty', description='$description' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Sale updated successfully", "success").then(function() { window.location = "sale.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>