<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<?php
include_once "sidebar.php";
$id=$_REQUEST['id'];
$sql="select * from service where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<div class="col-md-10 bg-light min-vh-100 pt-200">

<div class="card">
<div class="card-body">
<h5 class="pb-5">Update Service</h5>
<form method="post" enctype="multipart/form-data">

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Title</label>
  <div class="col-md-6">
    <input type="text" name="title" value="<?php echo $row['title'];?>" class="form-control mb-2" required>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Category</label>
  <div class="col-md-6">
    <select name="category" class="form-control mb-2" required>
      <option value="<?php echo $row['category'];?>">- Select -</option>
      <option value="Hand Wash">Hand Wash</option>
      <option value="Interior Wipe">Interior Wipe</option>
      <option value="Vacuum Interior">Vacuum Interior</option>
      <option value="Compound Wax">Compound Wax</option>
      <option value="Headlights">Headlights</option>
      <option value="Engine Wash">Engine Wash</option>
      <option value="Tire Shine">Tire Shine</option>
      <option value="Car Wax">Car Wax</option>
    </select>
  </div>
</div>
<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Actual Cost (₨)</label>
  <div class="col-md-6">
    <input type="number" name="cost" value="<?php echo $row['cost'];?>" step="0.01" placeholder="Enter actual cost" class="form-control mb-2" required>
  </div>
</div>
<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Price (₨)</label>
  <div class="col-md-6">
    <input type="number" name="price" value="<?php echo $row['price'];?>" step="0.01" class="form-control mb-2" required>
  </div>
</div>
<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Discount Price (₨)</label>
  <div class="col-md-6">
    <input type="number" name="discount" value="<?php echo $row['discount'];?>" step="0.01" placeholder="Enter discount price" class="form-control mb-2" required>
  </div>
</div>
<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Service Duration</label>
  <div class="col-md-6">
    <input type="number" name="duration" value="<?php echo $row['duration'];?>" class="form-control mb-2" required>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Availability</label>
  <div class="col-md-6">
    <select name="status" class="form-control mb-2">
      <option value="1" <?php if($row['status']==1) echo "selected";?>>Available</option>
      <option value="0" <?php if($row['status']==0) echo "selected";?>>Unavailable</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Tools Required</label>
  <div class="col-md-6">
    <input type="text" name="tools" value="<?php echo $row['tools']?>" placeholder="e.g. vacuum, foam sprayer" class="form-control mb-2">
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
    <textarea name="description" rows="5" class="form-control mb-2" required><?php echo $row['description']?></textarea>
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
	$category=$_POST['category'];
    $cost=$_POST['cost'];
	$price=$_POST['price'];
    $discount=$_POST['discount'];
    $duration=$_POST['duration'];
    $status=$_POST['status'];
    $tools=$_POST['tools'];
	$description=$_POST['description'];
	
	if(!empty($_FILES['img']['name']))
	{
		move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
		$img=$_FILES['img']['name'];
	}
	else{
		$img=$row['image'];
	}
	$sql="update service set title='$title', category='$category', cost='$cost', price='$price', discount='$discount', duration='$duration', status='$status', tools='$tools', image='$img', description='$description' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Service updated successfully", "success").then(function() { window.location = "service.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>