<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<?php
include_once "sidebar.php";
$id=$_REQUEST['id'];
$sql="select * from faq where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<div class="col-md-10 bg-light min-vh-100 pt-200">

<div class="card">
<div class="card-body">
<h5 class="pb-5">Update FAQs</h5>
<form method="post">

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Question</label>
  <div class="col-md-6">
    <input type="text" name="question" value="<?php echo $row['question'];?>" placeholder="Question" class="form-control mb-2" required>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Answer</label>
  <div class="col-md-6">
    <textarea name="answer" placeholder="Answer" rows="6" class="form-control mb-2" required><?php echo $row['answer'];?></textarea>
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
	$question=$_POST['question'];
	$answer=$_POST['answer'];
	
	$sql="update faq set question='$question', answer='$answer' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "FAQ updated successfully", "success").then(function() { window.location = "faq.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>