<?php
include_once "header.php";
if(!isset($_SESSION['user'])){
    echo '<script>swal("Warning", "Please login into the system", "warning").then(function() { window.location = "login.php";  });</script>';
}
$id=$_REQUEST['id'];
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-12 bg-img">
<div class="row">
<div class="bg-img-inner">
<h3 class="text-center text-white">FEEDBACK</h3>
</div>
</div>
</div>
</div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow py-3 ps-3">
    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Feedback</li>
  </ol>
</nav>
<div class="container">
<div class="row pb-60">
<div class="col-md-7 m-auto pt-60">
<div class="card">
<div class="card-body">
<h3 class="text-center">Send Feedback</h3>
<form method="post">
<label>Rating</label>
<select name="rating" class="form-control mb-2" required>
<option value="">Rating</option>    
<option value="1">1 Star</option>
<option value="2">2 Star</option>
<option value="3">3 Star</option>
<option value="4">4 Star</option>
<option value="5">5 Star</option>
</select>
<label>Review</label>
<textarea name="review" placeholder="Enter Your Review" class="form-control mb-3" rows="4" required></textarea>
<input type="submit" name="submit" value="Send Now" class="btn btn-success btn-group-lg w-100 mt-1 mb-3">
</form>
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
	$rating=$_POST['rating'];
	$review=$_POST['review'];
	$date=date('Y-m-d');
	$time=$_POST['time'];
	$sql="insert into feedback values('','".$user['id']."','$id','$rating','$date','$review')";
	$result=mysqli_query($con,$sql);
    if($result){
		echo '<script>swal("Successfully", "Feedback sent successfully", "success").then(function() { window.location = "booking.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>