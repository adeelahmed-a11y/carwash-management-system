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
<div class="col-md-6">
<h5>View Inventory</h5>
</div>
<div class="col-md-4 text-end">
<form method="GET" class="d-flex">
    <select name="order" class="form-control me-2" onchange="this.form.submit()">
        <option value="">Reorder Level</option>
        <option value="1" <?php if(isset($_GET['order']) && $_GET['order'] == '1') echo 'selected'; ?>>Ascending</option>
        <option value="0" <?php if(isset($_GET['order']) && $_GET['order'] == '0') echo 'selected'; ?>>Descending</option>
    </select>
</form>

</div>
<div class="col-md-2 text-end">
<a href="add_product.php"><button class="btn btn-success">Add New</button></a>
</div>
<div class="col-md-12 mt-4">
<table class="table table-bordered">
<tr>
<th></th>
<th>Title</th>
<th>Category</th>
<th>Price</th>
<th>Available</th>
<th>Description</th>
<th>Action</th>
</tr>
<tbody>
<?php
$i=1;
$orderBy = "";
if (isset($_GET['order'])) {
    if ($_GET['order'] == "1") {
        $orderBy = " ORDER BY price ASC";
    } elseif ($_GET['order'] == "0") {
        $orderBy = " ORDER BY price DESC";
    }
}

$sql = "SELECT product.id, cat_name, pro_title, price, discount, available, image, description 
        FROM product 
        INNER JOIN category ON category.id = product.cat_id" . $orderBy;

$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><img src="../image/<?php echo $row['image'];?>" height="80" width="90"></td>
<td><?php echo $row['pro_title'];?></td>
<td><?php echo $row['cat_name'];?></td>
<td>Rs.<?php echo number_format($row['price']);?></td>
<td><?php echo $row['available'];?> In Stock</td>
<td><?php echo mb_strimwidth($row['description'], 0, 120, '...');?></td>
<td>
<div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Action
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a href="update_product.php?id=<?php echo $row['id'];?>"><button class="dropdown-item" type="button">Update</button></a></li>
    <li><a href="delete_product.php?id=<?php echo $row['id'];?>"><button class="dropdown-item" type="button">Delete</button></a></li>
  </ul>
</div>
</td>
</tr>
<?php
if($row['available']<5){                                      
?>
<!-- Modal -->
<div id="myModal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['pro_title'];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Product Stock is very low. Only <?php echo $row['available'];?> products are available</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php }
}
}
else{
	?>
    <tr>
    <td colspan="7" class="text-center">No record available</td>
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
<script>
$(document).ready(function() {
    setTimeout(function(){
        $("#myModal").modal('show');
    },3000);
});
</script>