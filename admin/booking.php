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
<div class="col-md-8">
<h5>View Booking</h5>
</div>
<div class="col-md-4">
<input type="text" name="search" id="searchInput" class="form-control" placeholder="Search Booking">
</div>
<div class="col-md-12 mt-4">
<table class="table table-bordered booking-table">
<thead>
<tr>
<th>Sr.</th>
<th>Name</th>
<th>Title</th>
<th>Price</th>
<th>Date</th>
<th>Payment Status</th>
<th>Payment Id</th>
<th>Status</th>
<th style="width:16%;">Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="select user.name, title, booking.price, booking.* from booking INNER JOIN service on service.id=booking.service_id INNER JOIN user on user.id=booking.user_id";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['title'];?></td>
<td>Rs. <?php echo number_format($row['price']);?></td>
<td><?php echo date('d M, Y', strtotime($row['date']))?> <?php echo date('h:i A', strtotime($row['time']))?></td>
<td><?php echo $row['payment_status'];?></td>
<td><?php echo $row['payment_id'];?></td>
<td>
<?php
if($row['status']==0){
	echo "Pending";
	
}
else if($row['status']==1){
	echo "Confirm";
	
}
else if($row['status']==2){
	echo "Reschedule";
	
}
else{
	echo "Rejected";
	
}
?>
</td>
<td>
<div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Action
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a href="update_booking.php?id=<?php echo $row['id'];?>"><button class="dropdown-item" type="button">Update</button></a></li>
    <li><a href="delete_booking.php?id=<?php echo $row['id'];?>"><button class="dropdown-item" type="button">Delete</button></a></li>
  </ul>
</div>
</td>
</tr>
<?php }
}
else{
	?>
    <tr>
    <td colspan="9" class="text-center">No record available</td>
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
  <script>
  document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('.booking-table tbody tr');
    rows.forEach(row => {
      let text = row.textContent.toLowerCase();
      row.style.display = text.includes(filter) ? '' : 'none';
    });
  });
</script>