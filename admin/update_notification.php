<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<?php
include_once "sidebar.php";
$id=$_REQUEST['id'];
$sql="select * from notification where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<div class="col-md-10 bg-light min-vh-100 pt-200">

<div class="card">
<div class="card-body">
<h5 class="pb-5">Update Notification</h5>
<form method="post">

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Title</label>
  <div class="col-md-6">
    <input type="text" name="title" value="<?php echo $row['title'];?>" placeholder="Title" class="form-control mb-2" required>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Description</label>
  <div class="col-md-6">
    <textarea name="description" placeholder="Description" rows="6" class="form-control mb-2" required><?php echo $row['description'];?></textarea>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1"></label>
  <div class="col-md-6">
      <button type="submit" name="submit" class="btn btn-success">Update</button>
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
	$title=$_POST['title'];
	$description=$_POST['description'];
	
	$sql="update notification set title='$title', description='$description' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Notification updated successfully", "success").then(function() { window.location = "notification.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>