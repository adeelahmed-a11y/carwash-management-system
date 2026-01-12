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
<div class="col-md-12">
<h5>View User</h5>
</div>
<div class="col-md-12 mt-4">
<table class="table table-bordered">
<tr>
<th></th>
<th>Name</th>
<th>Email</th>
<th>Contact</th>
<th>City</th>
<th>Address</th>
<th>Action</th>
</tr>
<tbody>
<?php
$i=1;
$sql="select * from user";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><img src="../image/<?php echo $row['image'];?>" height="80" width="90"></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['contact'];?></td>
<td><?php echo $row['city'];?></td>
<td><?php echo $row['address'];?></td>
<td>
<div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Action
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a href="update_user.php?id=<?php echo $row['id'];?>"><button class="dropdown-item" type="button">Update</button></a></li>
    <li><a href="delete_user.php?id=<?php echo $row['id'];?>"><button class="dropdown-item" type="button">Delete</button></a></li>
  </ul>
</div>
</td>
</tr>
<?php }
}
else{
	?>
    <tr>
    <td colspan="7" class="text-center">No record available</td>
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