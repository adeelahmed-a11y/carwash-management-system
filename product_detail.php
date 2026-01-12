<?php
include_once "header.php";
?>
<div class="container">
<div class="row body-content">
<?php
$id=$_REQUEST['id'];
$sql="select * from product where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<div class="col-md-6">
<img src="image/<?php echo $row['image'];?>" class="img-fluid">
</div>
<div class="col-md-6">
<h3 class="pt-4"><?php echo $row['pro_title'];?></h3>
<p class="line-height pt-2"><?php echo $row['company'];?></p>
<p class="line-height pt-2"><?php echo $row['available'];?> In Stock</p>
 <h4>Rs. <?php echo number_format($row['price']);?>
 </h4>
<hr>
<p class="pt-1"><?php echo $row['description'];?></p>
</div>

</div>
</div>

<?php
include_once "footer.php";
?>
</body>
</html>