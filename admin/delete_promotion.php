<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="delete from promotion where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
	echo '<script>swal("Successfully", "Promotion deleted successfully", "success").then(function() { window.location = "promotion.php";  });</script>';
}
else{
	echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
}
?>
