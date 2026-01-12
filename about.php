<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-12 bg-img">
<div class="row">
<div class="bg-img-inner">
<h3 class="text-center text-white">ABOUT US</h3>
</div>
</div>
</div>
</div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow py-3 ps-3">
    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">About Us</li>
  </ol>
</nav>
<div class="container">
<div class="row pb-60">
<div class="col-md-12 pt-60">
<h3 class="text-center">About Us</h3>
<p class="text-justify">This project presents the development of a comprehensive car wash management system designed to streamline operations for administrators while enhancing the customer experience. The system includes features for admins to efficiently manage user accounts, services, bookings, and inventory, as well as track financial transactions and generate insightful reports. Admins can also run marketing campaigns to promote services and engage customers.</p>
 <p class="text-justify">For customers, the system offers a user-friendly interface to create accounts, explore available car wash services, and book appointments easily. Multiple secure payment options are provided, along with notifications for upcoming appointments and promotional offers. Customers can also leave feedback to help improve services.
 </p>
<h3 class="text-center">FAQs</h3>
<?php
$sql="select * from faq";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<h4><?php echo $row['question'];?></h4>
<p> <?php echo $row['answer'];?></p>
<?php } ?>
</div>
</div>

</div>
<?php
include_once "footer.php";
?>
</body>
</html>