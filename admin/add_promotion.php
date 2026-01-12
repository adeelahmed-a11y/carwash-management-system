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
<h5 class="pb-5">Add Promotion</h5>
<form method="post">

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Title</label>
  <div class="col-md-6">
    <input type="text" name="title" placeholder="Title" class="form-control mb-2" required>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Description</label>
  <div class="col-md-6">
    <textarea name="description" placeholder="Description" rows="6" class="form-control mb-2" required></textarea>
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
include_once "../function.php";
if(isset($_POST['submit'])){
	$title=$_POST['title'];
	$description=$_POST['description'];
    $date=date('Y-m-d');
    $subject= $title;
	$body= $description;
    $sql="select * from user";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result)){
        sendEmail($row['email'],$row['name'],$subject,$body);
    }
	$sql="insert into promotion values('','$title','$date','$description')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Promotion added successfully", "success").then(function() { window.location = "promotion.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>