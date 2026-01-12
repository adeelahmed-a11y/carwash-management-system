<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-12 bg-img">
<div class="row">
<div class="bg-img-inner">
<h3 class="text-center text-white">CONTACT US</h3>
</div>
</div>
</div>
</div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow py-3 ps-3">
    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
  </ol>
</nav>
<div class="container">
<div class="row pb-60">
<div class="col-md-6 m-auto pt-60">
<div class="card">
<div class="card-body">
<h3 class="text-center">Contact Us</h3>
<form method="post">
<label>Name</label>
<input type="text" name="name" placeholder="Name" class="form-control mb-3" required>
<label>Email Id</label>
<input type="email" name="email" placeholder="Email" class="form-control mb-3" required>
<label>Subject</label>
<input type="text" name="subject" placeholder="Subject" class="form-control mb-4" required>
<label>Message</label>
<textarea name="message" placeholder="Message" rows="5" class="form-control mb-4" required></textarea>
<input type="submit" name="submit" value="Send Message" class="btn btn-success btn-group-lg w-100 mt-1 mb-3">
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
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	$sql="insert into contact_us values('','$name','$email','$subject','$message')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Message sent successfully", "success").then(function() { window.location = "contact_us.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>