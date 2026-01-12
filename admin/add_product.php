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
<h5 class="pb-5">Add Inventory</h5>
<form method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Title</label>
    <div class="col-md-6">
      <input type="text" name="title" placeholder="Enter product title" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Category</label>
    <div class="col-md-6">
      <select name="category" id="category" class="form-control mb-2">
        <option value="">Category</option>
        <?php
        $sql = "select * from category";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
          <option value="<?php echo $row['id']; ?>"><?php echo $row['cat_name']; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Company</label>
    <div class="col-md-6">
      <input type="text" name="company" placeholder="Enter company name" class="form-control mb-2">
    </div>
  </div>
<div class="form-group row">
    <label class="col-md-2 text-right pt-1">Purchase Price</label>
    <div class="col-md-6">
      <input type="number" name="purchase_price" placeholder="Enter purchase price" class="form-control mb-2">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Sale Price</label>
    <div class="col-md-6">
      <input type="number" name="price" placeholder="Enter sale price" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Actual Stock</label>
    <div class="col-md-6">
      <input type="number" name="actual_stock" placeholder="Enter actual stock" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Image</label>
    <div class="col-md-6">
      <input type="file" name="img" class="form-control mb-2">
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
    $title=$_POST['title'];
	$company=$_POST['company'];
	$category=$_POST['category'];
    $purchase_price=$_POST['purchase_price'];
	$price=$_POST['price'];
	$description=$_POST['description'];
	$actual_stock=$_POST['actual_stock'];
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
	$img=$_FILES['img']['name'];
	$sql="insert into product values('','$category','$title','$company','$purchase_price','$price','$discount','$actual_stock','$actual_stock','$img','$description')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Product added successfully", "success").then(function() { window.location = "product.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>