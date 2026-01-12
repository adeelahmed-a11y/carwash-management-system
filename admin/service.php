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
<h5>View Service</h5>
</div>
<div class="col-md-6 text-end">
<a href="add_service.php"><button class="btn btn-success">Add New</button></a>
</div>
<div class="col-md-12 mt-4">
<table class="table table-bordered">
<tr>
<th></th>
<th>Title</th>
<th>Category</th>
<th>Price</th>
<th>Duration</th>
<th>Status</th>
<th>Description</th>
<th>Action</th>
</tr>
<tbody>
<?php
$i=1;
$sql="select * from service where type=1";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><img src="../image/<?php echo $row['image'];?>" height="80" width="90"></td>
<td><?php echo $row['title'];?></td>
<td><?php echo $row['category'];?></td>
<td>Rs.<?php echo number_format($row['price']);?><br>
<span class="text-success">-Rs.<?php echo number_format($row['discount']);?> OFF</span>
</td>
<td><?php echo $row['duration'];?> Minutes</td>
<td><?php echo ($row['status']==1) ? "Available" : "Unavailable";?></td>
<td><?php echo mb_strimwidth($row['description'], 0, 120, '...');?></td>
<td>
<div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Action
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a href="update_service.php?id=<?php echo $row['id'];?>"><button class="dropdown-item" type="button">Update</button></a></li>
    <li><a href="delete_service.php?id=<?php echo $row['id'];?>"><button class="dropdown-item" type="button">Delete</button></a></li>
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