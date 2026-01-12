<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-12 bg-img">
<div class="row">
<div class="bg-img-inner">
<h3 class="text-center text-white">MANAGE PROFILE</h3>
</div>
</div>
</div>
</div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow py-3 ps-3">
    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Profile</li>
  </ol>
</nav>
<div class="container">
<div class="row pb-60">
<div class="col-md-6 m-auto pt-60">
<div class="card">
<div class="card-body">
<h3 class="text-center">Manage Profile</h3>
<form method="post" enctype="multipart/form-data">
<label>Name</label>
<input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $user['name'];?>" class="form-control mb-3" required>
<label>Email Id</label>
<input type="email" name="email" placeholder="Enter Your Email" value="<?php echo $user['email'];?>" class="form-control mb-3" required>
<label>Password</label>
<input type="password" name="password" placeholder="Enter Your Password" value="<?php echo $user['password'];?>" class="form-control mb-3" required>
<label>Mobile Number</label>
<input type="number" name="contact" placeholder="Enter Your Mobile Number" value="<?php echo $user['contact'];?>" class="form-control mb-3" required>
<label>City</label>
<input type="text" name="city" placeholder="Enter Your City" value="<?php echo $user['city'];?>" class="form-control mb-3" required>
<label>Address</label>
<input type="text" name="address" placeholder="Enter Your Address" value="<?php echo $user['address'];?>" class="form-control mb-3" required>
<label>Image</label>
<input type="file" name="img" class="form-control mb-2">
<img src="image/<?php echo $user['image'];?>" height="60" width="80"><br>
<input type="submit" name="submit" value="Update" class="btn btn-success btn-group-lg mt-3 mb-3">
</form>
</div>
<div class="card-footer">
<p class="text-center pt-3 line-height">By clicking on update, Your profile will be updated.</p>
</div>
</div>
</div>
</div>

</div>
<?php
include_once "footer.php";
?>
</body>
</html>
<?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	if(!empty($_FILES['img']['name']))
	{
		move_uploaded_file($_FILES['img']['tmp_name'],"image/".$_FILES['img']['name']);
		$img=$_FILES['img']['name'];
	}
	else{
		$img=$user['image'];
	}
	$_SESSION['user']=$email;
	
	$sql="update user set name='$name', email='$email', contact='$contact', password='$password', city='$city', address='$address', image='$img' where id='".$user['id']."'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Profile updated successfully", "success").then(function() { window.location = "profile.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>