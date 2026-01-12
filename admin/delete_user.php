<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="delete from booking where user_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from user where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
	echo '<script>swal("Successfully", "User deleted successfully", "success").then(function() { window.location = "user.php";  });</script>';
}
else{
	echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
}
?>
