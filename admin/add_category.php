<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<?php
include_once "sidebar.php";
?>
<div class="col-md-10 bg-light min-vh-100 pt-200">

<div class="card">
<div class="card-body">
<h5 class="pb-5">Add Category</h5>
<form method="post">
<div class="form-group row">
<label class="col-md-2 text-right pt-1">Category Name</label>
<div class="col-md-6">
<input type="text" name="name" placeholder="Category Name" class="form-control mb-2" required>
</div>
</div>
<div class="form-group row">
<label class="col-md-2 text-right pt-1"></label>
<div class="col-md-6">
<button type="submit" name="submit" class="btn btn-success">Submit</button>
</div>
</div>
</form>
</div>
</div>


</div>
</div>
</div>
<?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$sql="insert into category values('','$name')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Category added successfully", "success").then(function() { window.location = "category.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>