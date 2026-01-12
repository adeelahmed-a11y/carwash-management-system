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
<h5 class="pb-5">Add Admin</h5>
<form method="post" enctype="multipart/form-data">
<div class="form-group row">
<label class="col-md-2 text-right pt-1">Name</label>
<div class="col-md-6">
<input type="text" name="name" placeholder="Name" class="form-control mb-2" required>
</div>
</div>
<div class="form-group row">
<label class="col-md-2 text-right pt-1">Email</label>
<div class="col-md-6">
<input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
</div>
</div>
<div class="form-group row">
<label class="col-md-2 text-right pt-1">Password</label>
<div class="col-md-6">
<input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
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
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="insert into admin values('','$name','$email','$password')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Admin added successfully", "success").then(function() { window.location = "admin.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>