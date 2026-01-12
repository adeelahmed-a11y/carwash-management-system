<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="delete from booking where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
	echo '<script>swal("Successfully", "Booking deleted successfully", "success").then(function() { window.location = "booking.php";  });</script>';
}
else{
	echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
}
?>
