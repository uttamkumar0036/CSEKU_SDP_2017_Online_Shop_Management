<?php include'inc/header.php';?>
<?php include'config.php';?>
<?php include'Database.php';?>

<?php

$db    = new Database();
$query = "SELECT * FROM tbl_product";
$read  = $db->select($query);

?>

<?php 
if(isset($_GET['msg']))
{
	echo "<span style='color:#ff0080;font-weight: bold;font-size:18px;'>".$_GET['msg']."</span>";
}
?>

<style>

.main {min-height : 400px; padding:10px; font-weight: bold; font-family:monaco;}
</style>
</head>
<body>

<h2>Product List</h2>
<table class ="tblone">
  <tr>
    <th>Serial No</th>
    <th>Product Name</th>
    <th>Category</th>
    <th>Brand</th>
    <th>Description</th>
    <th>Price</th>
    <th>Image</th>
    <th>Avilability</th>
    <th>Action</th>

  </tr>
<?php if($read){ ?>
<?php 
$i  = 1;
while ($row = $read->fetch_assoc()){ 
?>
<tr>
	<td><?php echo $i++ ?></td>
	<td><?php echo $row['productName'];?></td>
	<td><?php echo $row['catId'];?></td>
	<td><?php echo $row['brandId'];?></td>
	<td><?php echo $row['body'];?></td>
	<td><?php echo $row['price'];?></td>
     <td><img src="<?php echo $row['image'];?>" style="height: 70px;width: 90px;"></td>
     <td><?php echo $row['availability'];?></td>
	<td><a href ="productedit.php?productId=<?php echo urlencode($row['productId']); ?>">Edit</a></td>
</tr>
<?php } ?>
<?php } else { ?>

<p>Data is NOT available!!</p>
<?php } ?>
</table>
<a href="productadd.php">Add Product</a>
<div>
<a href="dashbord.php">Admin Pannel</a>
</div>

<?php include'inc/footer.php';?>

