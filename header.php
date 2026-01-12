<?php
include_once "db_connection.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CarWash</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
<header class="section-header">
<section class="header-main border-bottom bg-white">
	<div class="container-fluid">
       <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
           <div class="col-md-6">
              <a href="index.php"><img  class="d-none d-md-flex" src="image/logo.png" width="60"></a>
           </div>
           <div class="col-md-6">
           <form method="post" action="search.php">
        <div class="d-flex form-inputs">
        <input class="form-control" type="text" name="keyword" placeholder="Search..." required>
        <button type="submit" name="search"><i class="fa fa-search"></i></button>
        </div>
        </form>
           </div>
       </div>
	</div> 
</section>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand d-md-none d-md-flex" href="index.php">CarWash</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>
       <li class="nav-item">
          <a class="nav-link" href="contact_us.php">Contact Us</a>
        </li>
        <?php
	 	  if(isset($_SESSION['user'])){
		  $sql="select * from user where email='".$_SESSION['user']."'";
		  $result=mysqli_query($con,$sql);
		  $user=mysqli_fetch_array($result);
		  ?>
          <li class="nav-item">
          <a class="nav-link" href="booking.php">Booking</a>
      	  </li>
          <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
      	  </li>
          <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
      	  </li>
          <?php 
		  }
		  else{
			 ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <?php } ?>
      </ul>
        <ul class="navbar-nav ms-auto">
        <?php
	 	  if(isset($_SESSION['user'])){
		  ?>
          <li class="nav-item">
          <a class="nav-link" href="notification.php"><i class="fa fa-bell"></i> Notification</a>
      	  </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
</header>