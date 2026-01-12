<?php
include_once "header.php";
?>
<div class="container">
<div class="row body-content">
<div class="col-md-12">
<h2 class="text-center">View Services</h2>
<div class="row">
<?php
$keyword=$_POST['keyword'];
$sql="select * from service where title LIKE '%$keyword%' OR category LIKE '%$keyword%' OR price LIKE '%$keyword%'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<div class="col-md-3 mt-3">
<a href="service_detail.php?id=<?php echo $row['id'];?>">
<div class="card mb-2">
<img src="image/<?php echo $row['image'];?>" class="card-img-top" height="300">
<p class="text-dark line-height ps-2 pt-3"><strong><?php echo $row['title'];?></strong></p>
<p class="text-dark line-height ps-2">Rs. <?php echo number_format($row['price']);?></p>
</div>
</a>
</div>
<?php } ?>
</div>
</div>
</div>
<div class="row body-content">
<div class="col-md-12">
<h2 class="text-center">View Products</h2>
<div class="row">
<?php
$sql="select * from product where pro_title LIKE '%$keyword%' OR company LIKE '%$keyword%' OR price LIKE '%$keyword%'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<div class="col-md-3 mt-3">
<a href="product_detail.php?id=<?php echo $row['id'];?>">
<div class="card mb-2">
<img src="image/<?php echo $row['image'];?>" class="card-img-top" height="300">
<p class="text-dark ps-2 pt-3"><strong><?php echo $row['pro_title'];?></strong></p>
<p class="text-dark line-height ps-2">Rs. <?php echo number_format($row['price']);?></p>
</div>
</a>
</div>
<?php } ?>
</div>
</div>
</div>
</div>

<?php
include_once "footer.php";
?>
</body>
</html>