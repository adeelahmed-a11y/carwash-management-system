<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="delete from employee where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
	echo '<script>swal("Successfully", "Employee deleted successfully", "success").then(function() { window.location = "employee.php";  });</script>';
}
else{
	echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
}
?>
