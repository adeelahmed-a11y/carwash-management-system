<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<?php
include_once "sidebar.php";
$id=$_REQUEST['id'];
$sql="select * from user where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<div class="col-md-10 bg-light min-vh-100 pt-200">

<div class="card">
<div class="card-body">
<h5 class="pb-5">Update User</h5>
<form method="post">
<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Name</label>
  <div class="col-md-6">
    <input type="text" name="name" value="<?php echo $row['name'];?>" required class="form-control mb-2">
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Email</label>
  <div class="col-md-6">
    <input type="email" name="email" value="<?php echo $row['email'];?>" required class="form-control mb-2">
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Contact</label>
  <div class="col-md-6">
    <input type="text" name="contact" value="<?php echo $row['contact'];?>" required class="form-control mb-2">
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">City</label>
  <div class="col-md-6">
    <input type="text" name="city" value="<?php echo $row['city'];?>" required class="form-control mb-2">
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Address</label>
  <div class="col-md-6">
    <input type="text" name="address" value="<?php echo $row['address'];?>" required class="form-control mb-2">
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Password</label>
  <div class="col-md-6">
    <input type="password" name="password" value="<?php echo $row['password'];?>" required class="form-control mb-2">
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
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$sql="update user set name='$name', email='$email', contact='$contact', city='$city', address='$address', password='$password' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "User updated successfully", "success").then(function() { window.location = "user.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>