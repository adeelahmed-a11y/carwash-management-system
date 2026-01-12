<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<?php
include_once "sidebar.php";
$id=$_REQUEST['id'];
$sql="select * from booking where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<div class="col-md-10 bg-light min-vh-100 pt-200">

<div class="card">
<div class="card-body">
<h5 class="pb-5">Update Booking</h5>
<form method="post" enctype="multipart/form-data">

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Date</label>
  <div class="col-md-6">
    <input type="date" name="date" value="<?php echo $row['date'];?>" class="form-control mb-2" required>
  </div>
</div>
<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Time</label>
  <div class="col-md-6">
    <input type="time" name="time" value="<?php echo $row['time'];?>" class="form-control mb-2" required>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right pt-1">Status</label>
  <div class="col-md-6">
    <select name="status" class="form-control mb-2" required>
      <option value="1" <?php if($row['status']==1) echo "selected";?>>Confirm</option>
      <option value="2" <?php if($row['status']==2) echo "selected";?>>Reschedule</option>
      <option value="0" <?php if($row['status']==0) echo "selected";?>>Pending</option>
      <option value="-1" <?php if($row['status']==-1) echo "selected";?>>Cancel</option>
    </select>
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
    $date=$_POST['date'];
	$time=$_POST['time'];
	$status=$_POST['status'];
	$sql="update booking set date='$date', time='$time', status='$status' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Status updated successfully", "success").then(function() { window.location = "booking.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>