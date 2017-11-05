<?php include'inc/header.php';?>
<?php include'config.php';?>
<?php include'database.php';?>


<?php

$db    = new Database();
$query = "SELECT * FROM tbl_brand";
$read  = $db->select($query);

?>
<?php 
if(isset($_GET['msg']))
{
	echo "<span style='color:#ff0080;font-weight: bold;font-size:18px;'>".$_GET['msg']."</span>";
}
?>
<style type="text/css">
.main {min-height : 400px; padding:10px; font-weight: bold; font-family:monaco;}
</style>

<table class ="tblone">
<tr>
	<th width = "25%" height="40px">Serial No</th>
	<th width = "45%" height="40px">Brand Name</th>
	<th width = "30%" height="40px">Action</th>

</tr>

<?php if($read){ ?>
<?php 
$i  = 1;
while ($row = $read->fetch_assoc()){ 
?>
<tr>
	<td><?php echo $i++ ?></td>
	<td><?php echo $row['brandName'];?></td>
	<td><a href ="brandedit.php?brandId=<?php echo urlencode($row['brandId']); ?>">Edit</a></td>
</tr>
<?php } ?>
<?php } else { ?>

<p>Data is NOT available!!</p>
<?php } ?>
</table>
<a href="brandadd.php">Add Brand</a>
<div>
<a href="dashbord.php">Admin Pannel</a>
</div>


<?php include'inc/footer.php';?>


















