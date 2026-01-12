<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<?php
include_once "sidebar.php";
?>
<div class="col-md-10 bg-light min-vh-100 pt-200">

<div class="card" id="print_data">
<div class="card-body">
<div class="row">
<div class="col-md-12 text-center">
<h5>CarWash - Invoice</h5>
</div>
<div class="col-md-12 mt-4">
<table class="table table-bordered">
<tbody>
<?php
$id=$_REQUEST['id'];
$sql = "SELECT sale.*, pro_title, purchase_price, user.name, contact, address from sale INNER JOIN product on product.id=sale.pro_id INNER JOIN user on user.id=sale.user_id where sale.id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);  
?>
<tr>
    <th>Date</th>
    <td><?php echo date('d M, Y', strtotime($row['date']))?> <?php echo date('h:i A', strtotime($row['time']))?></td>
</tr>
<tr>
    <th>Name</th>
    <td><?php echo $row['name'];?></td>
</tr>
<tr>
    <th>Contact</th>
    <td><?php echo $row['contact'];?></td>
</tr>
<tr>
    <th>Address</th>
    <td><?php echo $row['address'];?></td>
</tr>
<tr>
    <th>Product Title</th>
    <td><?php echo $row['pro_title'];?></td>
</tr>
<tr>
    <th>Price</th>
    <td>Rs.<?php echo number_format($row['purchase_price']);?></td>
</tr>
<tr>
    <th>Quantity</th>
    <td><?php echo number_format($row['qty']);?> Item</td>
</tr>
<tr>
    <th>Total Bill</th>
    <td>Rs.<?php echo number_format($row['purchase_price']*$row['qty']);?></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="text-center">
<button class="btn btn-success mt-3" onClick="printdata('print_data')">Print</button>
</div>

</div>
</div>
</div>
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