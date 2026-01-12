<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<?php
include_once "sidebar.php";
$id=$_REQUEST['id'];
$sql="select * from employee where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<div class="col-md-10 bg-light min-vh-100 pt-200">

<div class="card">
<div class="card-body">
<h5 class="pb-5">Update Employee</h5>
<form method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Full Name</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control mb-2" required>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Email</label>
    <div class="col-md-6">
      <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Phone Number</label>
    <div class="col-md-6">
      <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Gender</label>
    <div class="col-md-6">
      <select name="gender" class="form-control mb-2">
        <option value="">Gender</option>
        <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
        <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
        <option value="Other" <?php if ($row['gender'] == 'Other') echo 'selected'; ?>>Other</option>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Date of Birth</label>
    <div class="col-md-6">
      <input type="date" name="dob" value="<?php echo $row['dob']; ?>" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">CNIC / National ID</label>
    <div class="col-md-6">
      <input type="text" name="cnic" value="<?php echo $row['cnic']; ?>" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Address</label>
    <div class="col-md-6">
      <textarea name="address" rows="3" class="form-control mb-2"><?php echo $row['address']; ?></textarea>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Role</label>
    <div class="col-md-6">
      <select name="role" class="form-control mb-2">
        <option value="">Role</option>
        <option value="Washer" <?php if ($row['role'] == 'Washer') echo 'selected'; ?>>Washer</option>
        <option value="Technician" <?php if ($row['role'] == 'Technician') echo 'selected'; ?>>Technician</option>
        <option value="Manager" <?php if ($row['role'] == 'Manager') echo 'selected'; ?>>Manager</option>
        <option value="Receptionist" <?php if ($row['role'] == 'Receptionist') echo 'selected'; ?>>Receptionist</option>
        <option value="Supervisor" <?php if ($row['role'] == 'Supervisor') echo 'selected'; ?>>Supervisor</option>
      </select>
    </div>
  </div>
<div class="form-group row">
    <label class="col-md-2 text-right pt-1">Permission</label>
    <div class="col-md-6">
      <textarea name="permission" rows="3" class="form-control mb-2" placeholder="Permission"><?php echo $row['permission']; ?></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Joining Date</label>
    <div class="col-md-6">
      <input type="date" name="joining_date" value="<?php echo $row['joining_date']; ?>" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Shift Timing</label>
    <div class="col-md-6">
      <input type="text" name="shift" value="<?php echo $row['shift']; ?>" placeholder="e.g., 9 AM - 5 PM" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Salary</label>
    <div class="col-md-6">
      <input type="number" name="salary" value="<?php echo $row['salary']; ?>" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Profile Picture</label>
    <div class="col-md-6">
      <input type="file" name="img" class="form-control mb-2">
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
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $cnic=$_POST['cnic'];
    $address=$_POST['address'];
    $role=$_POST['role'];
    $permission=$_POST['permission'];
    $joining_date=$_POST['joining_date'];
    $shift=$_POST['shift'];
    $salary=$_POST['salary'];
    if(!empty($_FILES['img']['name']))
	{
		move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
		$img=$_FILES['img']['name'];
	}
	else{
		$img=$row['img'];
	}
	$sql = "UPDATE employee SET name='$name', email='$email', phone='$phone', gender='$gender', dob='$dob', cnic='$cnic', address='$address', role='$role', permission='$permission', joining_date='$joining_date', shift='$shift', salary='$salary', img='$img' WHERE id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Employee updated successfully", "success").then(function() { window.location = "employee.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>