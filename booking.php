<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-12 bg-img">
<div class="row">
<div class="bg-img-inner">
<h3 class="text-center text-white">TRACK BOOKING</h3>
</div>
</div>
</div>
</div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow py-3 ps-3">
    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Track Booking</li>
  </ol>
</nav>
<div class="container">
<div class="row body-content">
<div class="col-md-12">
<h2 class="text-center">View Booking</h2>   
<table class="table table-bordered mt-3">
<thead>
<tr>
<th style="width:5%;">Sr.</th>
<th>Date</th>
<th>Title</th>
<th>Price</th>
<th>Payment Id</th>
<th>Payment Status</th>
<th>Status</th>
<th>Description</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$date=date('Y-m-d');
$sql="select booking.*, service.title from booking INNER JOIN service on service.id=booking.service_id where booking.user_id='".$user['id']."' ORDER by booking.id DESC";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo date('h:i A',strtotime($row['time']))." ".date('d M, Y',strtotime($row['date']));?></td>
<td><?php echo $row['title'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $row['payment_id'];?></td>
<td class="text-capitalize"><?php echo $row['payment_status'];?></td>
<td style="width:15%;">
<?php
if($row['status']==0){
	echo "Pending";
}
else if($row['status']==1){
	echo "Approved";
}
else{
	echo "Rejected";
}
?>
</td>
<td><?php echo $row['description'];?></td>
<td>
<div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Action
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      <?php
    if($date>=$row['date']){                                     
    ?>
    <li><a href="feedback.php?id=<?php echo $row['service_id'];?>"><button class="dropdown-item" type="button">Feedback</button></a></li>
    <?php } ?>
      <li><a href="generate_invoice.php?id=<?php echo $row['id'];?>"><button class="dropdown-item" type="button">View Invoice</button></a></li>
  </ul>
</div>
</td>
</tr>
<?php
$start = new DateTime($date);
$end = new DateTime($row['date']);
$diff = $start->diff($end)->days;

if ($diff <= 3) {
?>
<!-- Modal -->
<div id="myModal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['title'];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Thank you for your booking with CarWash your booking Date & Time is <?php echo date('h:i A',strtotime($row['time']))." ".date('d M, Y',strtotime($row['date']));?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
}
}
}
else{
	echo '<tr><td colspan="9" align="center">No record found</td></tr>';
}

?>
</tbody>
</table>


</div>
</div>
</div>

<?php
include_once "footer.php";
?>
</body>
</html>
<script>
$(document).ready(function() {
    setTimeout(function(){
        $("#myModal").modal('show');
    },3000);
});
</script>