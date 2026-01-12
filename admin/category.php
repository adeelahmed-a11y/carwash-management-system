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
<h5>View Category</h5>
</div>
<div class="col-md-6 text-end">
<a href="add_category.php"><button class="btn btn-success">Add New</button></a>
</div>
<div class="col-md-12 mt-4">
<table class="table table-bordered">
<tr>
<th>Sr.</th>
<th>Category Name</th>
<th style="width:16%;">Action</th>
</tr>
<tbody>
<?php
$i=1;
$sql="select * from category";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo $row['cat_name'];?></td>
<td>
<div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Action
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a href="update_category.php?id=<?php echo $row['id'];?>"><button class="dropdown-item" type="button">Update</button></a></li>
    <li><a href="delete_category.php?id=<?php echo $row['id'];?>"><button class="dropdown-item" type="button">Delete</button></a></li>
  </ul>
</div>
</td>
</tr>
<?php }
}
else{
	?>
    <tr>
    <td colspan="5" class="text-center">No record available</td>
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