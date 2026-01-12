<?php
include_once "header.php";
?>
<div class="container">
<div class="row body-content">
<?php
$id=$_REQUEST['id'];
$sql="select * from service where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<div class="col-md-6">
<img src="image/<?php echo $row['image'];?>" class="img-fluid">
</div>
<div class="col-md-6">
<h3 class="pt-4"><?php echo $row['title'];?></h3>
<p class="line-height pt-2"><?php echo $row['category'];?></p>
<p class="line-height pt-2"><?php echo ($row['status']==1) ? "Available" : "Unavailable";?></p>
<p class="line-height pt-2"><?php echo $row['duration'];?> Minutes</p>
 <h4>Rs. <?php echo number_format($row['price']);?> <span class="text-success float-end">-Rs.<?php echo number_format($row['discount']);?> OFF</span>
 </h4>
<hr>
<p class="pt-1"><?php echo $row['description'];?></p>
<?php
if($row['status']==1){  
?>
<a href="book_now.php?id=<?php echo $row['id'];?>"><button class="btn btn-success">Book Now</button></a>  
<?php } else{ ?>
<button class="btn btn-success" disabled>Book Now</button>
<?php  } ?>
</div>
<div class="col-md-6">
<h3>View Feedback</h3>
<?php
$sql="select name, rating, review from feedback INNER JOIN user on user.id=feedback.user_id where service_id='$id'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
$totalreview=mysqli_num_rows($result);
while($row=mysqli_fetch_array($result)){
?>
<span class="line-height"><?php echo $row['name'];?></span><br>
<?php
	for($j=1;$j<=$row['rating'];$j++){
		echo '<i class="fa fa-star pe-1 text-warning"></i>';
	}
	for($k=1;$k<=(5-$row['rating']);$k++){
		echo '<i class="fa fa-star pe-1"></i>';
	}
?>
<p class="line-height pt-1 pb-2"><?php echo $row['review'];?></p>
<?php }
}
 ?>
</div>
    

</div>
</div>

<?php
include_once "footer.php";
?>
</body>
</html>