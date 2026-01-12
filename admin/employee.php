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
<div class="row">
<div class="col-md-6">
<h5>View Employee</h5>
</div>
<div class="col-md-6 text-end">
<a href="add_employee.php"><button class="btn btn-success">Add New</button></a>
</div>
<div class="col-md-12 mt-4">
<table class="table table-bordered">
<tr>
<th></th>
<th>Name</th>
<th>Phone</th>
<th>Gender</th>
<th>CNIC</th>
<th>Address</th>
<th>Role</th>
<th>Permission</th>
<th>Shift</th>
<th>Salary</th>
<th>Action</th>
</tr>
<tbody>
<?php
$i=1;
$sql="select * from employee";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><img src="../image/<?php echo $row['img'];?>" height="80" width="90"></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['phone'];?></td>
<td><?php echo $row['gender'];?></td>
<td><?php echo $row['cnic'];?></td>
<td><?php echo $row['address'];?></td>
<td><?php echo $row['role'];?></td>
<td><?php echo $row['permission'];?></td>
<td><?php echo $row['shift'];?></td>
<td><?php echo $row['salary'];?></td>
<td>
<div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Action
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a href="update_employee.php?id=<?php echo $row['id'];?>"><button class="dropdown-item" type="button">Update</button></a></li>
    <li><a href="delete_employee.php?id=<?php echo $row['id'];?>"><button class="dropdown-item" type="button">Delete</button></a></li>
  </ul>
</div>
</td>
</tr>
<?php }
}
else{
	?>
    <tr>
    <td colspan="10" class="text-center">No record available</td>
    </tr>
    <?php
}
 ?>
</tbody>
</table>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</body>
</html>