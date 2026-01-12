<?php
include_once "header.php";
?>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 img-fluid" src="image/s2.png" style="height:80vh;object-fit:cover;" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 img-fluid" src="image/s3.png" style="height:80vh;object-fit:cover;" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 img-fluid" src="image/s1.png" style="height:80vh;object-fit:cover;" alt="Third slide">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container">
<div class="row body-content">
<div class="col-md-12">
<h2 class="text-center">View Services</h2>
<div class="row">
<?php
$sql="select * from service where type=1";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<div class="col-md-3 mt-3">
<a href="service_detail.php?id=<?php echo $row['id'];?>">
<div class="card mb-2">
<img src="image/<?php echo $row['image'];?>" class="card-img-top" height="300">
<p class="text-dark line-height ps-2 pt-3"><strong><?php echo $row['title'];?></strong></p>
<p class="text-dark line-height ps-2">Rs. <?php echo number_format($row['price']);?> <span class="text-success">-Rs.<?php echo number_format($row['discount']);?> OFF</span></p>
</div>
</a>
</div>
<?php } ?>
</div>
</div>
</div>
<div class="row body-content">
<div class="col-md-12">
<h2 class="text-center">View Packages</h2>
<div class="row">
<?php
$sql="select * from service where type=2";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<div class="col-md-3 mt-3">
<a href="service_detail.php?id=<?php echo $row['id'];?>">
<div class="card mb-2">
<img src="image/<?php echo $row['image'];?>" class="card-img-top" height="300">
<p class="text-dark line-height ps-2 pt-3"><strong><?php echo $row['title'];?></strong></p>
<p class="text-dark line-height ps-2">Rs. <?php echo number_format($row['price']);?> <span class="text-success">-Rs.<?php echo number_format($row['discount']);?> OFF</span></p>
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