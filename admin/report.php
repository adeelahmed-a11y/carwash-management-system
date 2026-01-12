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
<h5>View Sale Report</h5>
</div>
<form method="post">
<div class="row">
<div class="col-md-5">
<label>From Date</label>
<input type="date" name="from_date" required class="form-control">
</div>
<div class="col-md-5">
<label>To Date</label>
<input type="date" name="to_date" required class="form-control">
</div>
<div class="col-md-2 mt-3 pt-2">
<button type="submit" name="report" class="btn btn-success">Submit</button>
</div>
</div>
</form>
<div class="col-md-12 mt-4">
<table class="table table-bordered">
<tr>
<th>Sr.</th>
<th>Date</th>
<th>Name</th>
<th>Title</th>
<th>Cost</th>
<th>Price</th>
</tr>
<tbody>
<?php
$i=1;
if(isset($_POST['report'])){
	$from_date=$_POST['from_date'];
	$to_date=$_POST['to_date'];
}
else{
	$from_date=date('Y-m-d');
	$to_date=date('Y-m-d');
}
$total=0;
$cost=0;
$sql="select user.name, title, booking.price, cost, booking.* from booking INNER JOIN service on service.id=booking.service_id INNER JOIN user on user.id=booking.user_id where (date_format(date,'%Y-%m-%d')>='$from_date' AND date_format(date,'%Y-%m-%d')<='$to_date') AND (booking.status=1 OR booking.status=2)";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo date('d M, Y', strtotime($row['date']))?> <?php echo date('h:i A', strtotime($row['time']))?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['title'];?></td>
<td>Rs. <?php echo number_format($row['cost']);?></td>
<td>Rs. <?php echo number_format($row['price']);?></td>

</tr>
<?php 
$cost+=$row['cost'];
$total+=$row['price'];
}
?>
<tr>
<td colspan="4">Total</td>
<td>Rs. <?php echo number_format($cost);?></td>
<td>Rs. <?php echo number_format($total);?></td>
</tr>
<tr>
<td colspan="5">Profit</td>
<td>Rs. <?php echo number_format($total-$cost);?></td>
</tr>
<?php
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