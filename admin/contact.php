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
<h5>View Contact Us</h5>
</div>
<div class="col-md-12 mt-4">
<table class="table table-bordered">
<tr>
<th>Sr.</th>
<th>Name</th>
<th>Email</th>
<th>Subject</th>
<th>Message</th>
<th style="width:16%;">Action</th>
</tr>
<tbody>
<?php
$i=1;
$sql="select * from contact_us";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['subject'];?></td>
<td><?php echo $row['message'];?></td>
<td>
<div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Action
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a href="delete_contact.php?id=<?php echo $row['id'];?>"><button class="dropdown-item" type="button">Delete</button></a></li>
  </ul>
</div>
</td>
</tr>
<?php }
}
else{
	?>
    <tr>
    <td colspan="6" class="text-center">No record available</td>
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