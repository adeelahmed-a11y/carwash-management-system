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
<h5 class="pb-5">Add Employee</h5>
<form method="post" enctype="multipart/form-data">

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Full Name</label>
    <div class="col-md-6">
      <input type="text" name="name" placeholder="Full Name" class="form-control mb-2" required>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Email</label>
    <div class="col-md-6">
      <input type="email" name="email" placeholder="Email" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Phone Number</label>
    <div class="col-md-6">
      <input type="text" name="phone" placeholder="Phone Number" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Gender</label>
    <div class="col-md-6">
      <select name="gender" class="form-control mb-2">
        <option value="">Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Date of Birth</label>
    <div class="col-md-6">
      <input type="date" name="dob" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">CNIC / National ID</label>
    <div class="col-md-6">
      <input type="text" name="cnic" placeholder="CNIC / National ID" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Address</label>
    <div class="col-md-6">
      <textarea name="address" rows="3" class="form-control mb-2" placeholder="Address"></textarea>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Role</label>
    <div class="col-md-6">
      <select name="role" class="form-control mb-2">
        <option value="">Role</option>
        <option value="Washer">Washer</option>
        <option value="Technician">Technician</option>
        <option value="Manager">Manager</option>
        <option value="Receptionist">Receptionist</option>
        <option value="Supervisor">Supervisor</option>
      </select>
    </div>
  </div>
    <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Permission</label>
    <div class="col-md-6">
      <textarea name="permission" rows="3" class="form-control mb-2" placeholder="Permission"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Joining Date</label>
    <div class="col-md-6">
      <input type="date" name="joining_date" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Shift Timing</label>
    <div class="col-md-6">
      <input type="text" name="shift" placeholder="e.g., 9 AM - 5 PM" class="form-control mb-2">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-2 text-right pt-1">Salary</label>
    <div class="col-md-6">
      <input type="number" name="salary" placeholder="Salary" class="form-control mb-2">
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
    move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
	$img=$_FILES['img']['name'];
	$sql="insert into employee values('','$name','$email','$phone','$gender','$dob','$cnic','$address','$role','$permission','$joining_date','$shift','$salary','$img')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Employee added successfully", "success").then(function() { window.location = "employee.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>