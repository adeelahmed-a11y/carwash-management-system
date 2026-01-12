<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="delete from notification where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
	echo '<script>swal("Successfully", "Notification deleted successfully", "success").then(function() { window.location = "notification.php";  });</script>';
}
else{
	echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
}
?>
