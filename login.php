<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-12 bg-img">
<div class="row">
<div class="bg-img-inner">
<h3 class="text-center text-white">LOGIN</h3>
</div>
</div>
</div>
</div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow py-3 ps-3">
    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Login</li>
  </ol>
</nav>
<div class="container">
<div class="row pb-60">
<div class="col-md-5 m-auto pt-60">
<div class="card">
<div class="card-body">
<h3 class="text-center">Login Now</h3>
<form method="post">
<label>Email Id</label>
<input type="email" name="email" placeholder="Email" class="form-control mb-3" required>
<label>Password</label>
<input type="password" name="password" placeholder="Password" class="form-control mb-4" required>
<input type="submit" name="submit" value="Login" class="btn btn-success btn-group-lg w-100 mt-1 mb-3">
</form>
<p class="text-center line-height">Don't have an account? <a href="register.php">Create one now</a></p>
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
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="select * from user where email='$email' AND password='$password'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if($row){
		$_SESSION['user']=$email;
		echo "<script>window.location.href='index.php'</script>";	
	}
	else{
		echo '<script>swal("Warning", "Invalid email or password", "warning");</script>';	
		
	}
}
?>