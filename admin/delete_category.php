<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="delete from category where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
	echo '<script>swal("Successfully", "Category deleted successfully", "success").then(function() { window.location = "category.php";  });</script>';
}
else{
	echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
}
?>
