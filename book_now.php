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
<h3 class="text-center text-white">BOOKING</h3>
</div>
</div>
</div>
</div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow py-3 ps-3">
    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Booking</li>
  </ol>
</nav>
<div class="container">
<div class="row pb-60">
<div class="col-md-7 m-auto pt-60">
<div class="card">
<div class="card-body">
<h3 class="text-center">Send Booking</h3>
<form method="post" enctype="multipart/form-data">
<label>Car Make</label>
<input type="text" name="car_make" placeholder="Enter Car Make" class="form-control mb-2" required>
<label>Car Model</label>
<input type="text" name="car_model" placeholder="Enter Car Model" class="form-control mb-2" required>
<label>Year</label>
<input type="number" name="year" placeholder="Enter Year" class="form-control mb-2" required>
<label>Date</label>
<input type="date" name="date" min="<?php echo date('Y-m-d');?>" class="form-control mb-2" required>
<label>Time</label>
<input type="time" name="time" class="form-control mb-2" required>
<label>Description</label>
<textarea name="description" placeholder="Enter Booking Description" class="form-control mb-3" rows="4" required></textarea>
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
include_once "config.php";
include_once "function.php";
if(isset($_POST['submit'])){
	$car_make=$_POST['car_make'];
	$car_model=$_POST['car_model'];
	$year=$_POST['year'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$description=$_POST['description'];
    $sql="select * from service where id='$id'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
    $price=$row['price'];
	$sql="insert into booking values('','".$user['id']."','$id','$car_make','$car_model','$year','$date','$time','$price','','pending','0','$description')";
	$result=mysqli_query($con,$sql);
    $booking_id=mysqli_insert_id($con);
    $_SESSION['booking_id']=$booking_id;
    $subject= 'Booking sent successfully';
	$body= 'Thank Your for your booking with CarWash your booking date & time is: '.$date.' & '.$time.' and total price is '.$price.'';
	sendEmail($user['email'],$user['name'],$subject,$body);
	if($result){
		try {
        $response = $gateway->purchase(array(
            'amount' => $price,
            'currency' => PAYPAL_CURRENCY,
            'returnUrl' => PAYPAL_RETURN_URL,
            'cancelUrl' => PAYPAL_CANCEL_URL,
        ))->send();
 
        if ($response->isRedirect()) {
            $response->redirect(); // this will automatically forward the customer
        } else {
            // not successful
            echo $response->getMessage();
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>