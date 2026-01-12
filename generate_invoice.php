<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="select booking.*, service.title from booking INNER JOIN service on service.id=booking.service_id where booking.id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-12 bg-img">
<div class="row">
<div class="bg-img-inner">
<h3 class="text-center text-white">GENERATE INVOICE</h3>
</div>
</div>
</div>
</div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow py-3 ps-3">
    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Generate Invoice</li>
  </ol>
</nav>
<div class="container">
<div class="row body-content">
<div id="print_data">
<div class="col-md-12">
<h2 class="text-center">View Invoice</h2>   
<table class="table table-bordered mt-3">
<tr>
<th>Date</th>
<td><?php echo date('h:i A',strtotime($row['time']))." ".date('d M, Y',strtotime($row['date']));?></td>
</tr>
<tr>
<th>Title</th>
<td><?php echo $row['title'];?></td>
</tr>
<tr>
<th>Price</th>
<td><?php echo number_format($row['price']);?></td>
</tr>
<tr>
<th>Payment Id</th>
<td><?php echo $row['payment_id'];?></td>
</tr>
<tr>
<th>Payment Status</th>
<td><?php echo $row['payment_status'];?></td>
</tr>
<tr>
<th>Status</th>
<td>
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
</tr> 
<tr>
<th>Description</th>
<td><?php echo $row['description'];?></td>
</tr> 
</table>


</div>
</div>
<div class="text-center">
<button class="btn btn-success mt-3" onClick="printdata('print_data')">Print</button>
</div>
</div>
</div>

<?php
include_once "footer.php";
?>
</body>
</html>
<script>
function printdata(e1){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(e1).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML=restorepage;
}
</script>