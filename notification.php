<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-12 bg-img">
<div class="row">
<div class="bg-img-inner">
<h3 class="text-center text-white">NOTIFICATION</h3>
</div>
</div>
</div>
</div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow py-3 ps-3">
    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Notification</li>
  </ol>
</nav>
<div class="container">
<div class="row body-content">
<div class="col-md-12">
<h2 class="text-center">View Notification</h2>
<table class="table table-bordered mt-3">
<thead>
<tr>
<th style="width:5%;">Sr.</th>
<th>Title</th>
<th>Date</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="select * from notification order by id DESC";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo $row['title'];?></td>
<td><?php echo date('d M, Y', strtotime($row['date']))?></td>
<td><?php echo $row['description'];?></td>
</tr>
<?php
}
}
else{
	echo '<tr><td colspan="4" align="center">No record found</td></tr>';
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