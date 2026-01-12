<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-12 bg-img">
<div class="row">
<div class="bg-img-inner">
<h3 class="text-center text-white">REGISTER</h3>
</div>
</div>
</div>
</div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow py-3 ps-3">
    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Register</li>
  </ol>
</nav>
<div class="container">
<div class="row pb-60">
<div class="col-md-6 m-auto pt-60">
<div class="card">
<div class="card-body">
<h3 class="text-center">Register Now</h3>
<form method="post" enctype="multipart/form-data">
<label>Name</label>
<input type="text" name="name" placeholder="Enter Your Name" class="form-control mb-3" required>
<label>Email Id</label>
<input type="email" name="email" placeholder="Enter Your Email" class="form-control mb-3" required>
<label>Password</label>
<input type="password" name="password" placeholder="Enter Your Password" class="form-control mb-3" required>
<label>Mobile Number</label>
<input type="number" name="contact" placeholder="Enter Your Mobile Number" class="form-control mb-3" required>
<label>City</label>
<input type="text" name="city" placeholder="Enter Your City" class="form-control mb-3" required>
<label>Address</label>
<input type="text" name="address" placeholder="Enter Your Address" class="form-control mb-3" required>
<label>Image</label>
<input type="file" name="img" class="form-control mb-4">
<input type="submit" name="submit" value="Register" class="btn btn-success btn-group-lg w-100 mt-1 mb-3">
</form>
<p class="text-center pt-3 line-height">By clicking register, I agree to your terms and condition.</p>
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
	move_uploaded_file($_FILES['img']['tmp_name'],"image/".$_FILES['img']['name']);
	$img=$_FILES['img']['name'];
	$sql="insert into user values('','$name','$email','$contact','$password','$city','$address','$img')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Account created successfully", "success").then(function() { window.location = "login.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>