<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<?php
include_once "sidebar.php";
$id=$_REQUEST['id'];
$sql="select product.id, cat_name, cat_id, pro_title, company, purchase_price, price, available, image, actual_stock, available, description from product INNER JOIN category on category.id=product.cat_id where product.id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<div class="col-md-10 bg-light min-vh-100 pt-200">

<div class="card">
<div class="card-body">
<h5 class="pb-5">Update Inventory</h5>
<form method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Title</label>
    <div class="col-md-6">
      <input type="text" name="title" value="<?php echo $row['pro_title'];?>" placeholder="Enter product title" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Category</label>
    <div class="col-md-6">
      <select name="category" id="category" class="form-control mb-2">
        <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
        <?php
        $sql1 = "select * from category where id!='" . $row['cat_id'] . "'";
        $result1 = mysqli_query($con, $sql1);
        while ($row1 = mysqli_fetch_array($result1)) {
        ?>
          <option value="<?php echo $row1['id']; ?>"><?php echo $row1['cat_name']; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Company</label>
    <div class="col-md-6">
      <input type="text" name="company" value="<?php echo $row['company'];?>" placeholder="Enter company name" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Purchase Price</label>
    <div class="col-md-6">
      <input type="number" name="purchase_price" value="<?php echo $row['purchase_price'];?>" placeholder="Enter purchase price" class="form-control mb-2">
    </div>
  </div>
    <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Price</label>
    <div class="col-md-6">
      <input type="number" name="price" value="<?php echo $row['price'];?>" placeholder="Enter sale price" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Actual Stock</label>
    <div class="col-md-6">
      <input type="number" name="actual_stock" value="<?php echo $row['actual_stock'];?>" placeholder="Enter actual stock" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Image</label>
    <div class="col-md-6">
      <input type="file" name="img" class="form-control mb-1">
      <img src="../image/<?php echo $row['image'];?>" height="60" width="80" class="mt-2 mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Description</label>
    <div class="col-md-6">
      <textarea name="description" rows="5" placeholder="Enter description" class="form-control mb-3"><?php echo $row['description'];?></textarea>
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
    $title=$_POST['title'];
	$company=$_POST['company'];
	$category=$_POST['category'];
    $purchase_price=$_POST['purchase_price'];
	$price=$_POST['price'];
	$actual_stock=$_POST['actual_stock'];
	$description=$_POST['description'];
	if($actual_stock>=$row['actual_stock']){
		$a=$actual_stock-$row['actual_stock'];
		$available=$row['available']+$a;
	}
	else{
		$a=$row['actual_stock']-$actual_stock;
		$available=$row['available']-$a;	
	}
	if(!empty($_FILES['img']['name']))
	{
		move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
		$img=$_FILES['img']['name'];
	}
	else{
		$img=$row['image'];
	}
	$sql="update product set cat_id='$category', company='$company', pro_title='$title', purchase_price='$purchase_price', price='$price', actual_stock='$actual_stock', available='$available', image='$img', description='$description' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Product updated successfully", "success").then(function() { window.location = "product.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>