<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="delete from sale where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
	echo '<script>swal("Successfully", "Sale deleted successfully", "success").then(function() { window.location = "sale.php";  });</script>';
}
else{
	echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
}
?>
