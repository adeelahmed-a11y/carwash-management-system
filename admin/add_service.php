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
<h5 class="pb-5">Add Service</h5>
<form method="post" enctype="multipart/form-data">

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Title</label>
  <div class="col-md-6">
    <input type="text" name="title" placeholder="Enter service title" class="form-control mb-2" required>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Category</label>
  <div class="col-md-6">
    <select name="category" class="form-control mb-2" required>
      <option value="">- Select -</option>
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
    <input type="number" name="cost" step="0.01" placeholder="Enter actual cost" class="form-control mb-2" required>
  </div>
</div>
<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Price (₨)</label>
  <div class="col-md-6">
    <input type="number" name="price" step="0.01" placeholder="Enter price" class="form-control mb-2" required>
  </div>
</div>
<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Discount Price (₨)</label>
  <div class="col-md-6">
    <input type="number" name="discount" step="0.01" placeholder="Enter discount price" class="form-control mb-2" required>
  </div>
</div>
<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Service Duration</label>
  <div class="col-md-6">
    <input type="number" name="duration" placeholder="Enter duration in minutes" class="form-control mb-2" required>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Availability</label>
  <div class="col-md-6">
    <select name="status" class="form-control mb-2" required>
      <option value="1">Available</option>
      <option value="0">Unavailable</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Tools Required</label>
  <div class="col-md-6">
    <input type="text" name="tools" placeholder="e.g. vacuum, foam sprayer" class="form-control mb-2">
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
    <textarea name="description" rows="5" placeholder="Enter service description" class="form-control mb-2" required></textarea>
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
	$category=$_POST['category'];
    $cost=$_POST['cost'];
	$price=$_POST['price'];
    $discount=$_POST['discount'];
    $duration=$_POST['duration'];
    $status=$_POST['status'];
    $tools=$_POST['tools'];
	$description=$_POST['description'];
	
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
	$img=$_FILES['img']['name'];
	$sql="insert into service values('','$title','$category','1','$cost','$price','$discount','$duration','$status','$tools','$img','$description')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Service added successfully", "success").then(function() { window.location = "service.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>