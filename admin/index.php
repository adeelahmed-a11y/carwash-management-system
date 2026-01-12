<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CarWash</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
<div class="container">
<h4 class="pt-2"><a href="index.php" class="text-white text-decoration-none">CarWash</a></h4>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav ms-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Back to Portal <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<div class="container-fluid">
<div class="row">
<div class="col-md-12 vh-100">
<div class="col-md-5 pt-200 m-auto">
<div class="card mt-5 bg-white">
<div class="card-header">
<h5>Admin Login</h5>
</div>
<form method="post">
<div class="card-body">
<input type="email" name="email" placeholder="Email" required class="form-control mb-3">
<input type="password" name="password" placeholder="Password" required class="form-control mb-3">
</div>
<div class="card-footer">
<input type="submit" name="submit" class="btn btn-success" value="Login">
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
include_once "../db_connection.php";
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="select * from admin where email='$email' AND password='$password'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if($row){
		$_SESSION['admin']=$email;
		header('location:home.php');
	}
	else{
		echo '<script>swal("Warning", "Invalid email or password", "warning");</script>';
		
	}
}
?>