<?php 
include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php
	
	$id  = $_GET['brandId'];
	$db = new Database();

	$query = "SELECT * FROM tbl_brand WHERE brandId = $id";
	$getData  = $db->select($query)->fetch_assoc();

	if(isset($_POST['submit']))
	{
		$name = mysqli_real_escape_string ($db->link,$_POST['brandName']);
		if($name == '')
		{
			$error = "Field Must Not be Empty !";
		}
		else
		{
			$query = "UPDATE tbl_brand
						SET 
						brandName = '$name'
						WHERE
						brandId = '$id'";
			$update = $db->bupdate($query);
		}
	}
	
?>

<?php 
if(isset($_POST['delete']))
{
	$query = "DELETE FROM tbl_brand WHERE brandId = '$id'";
	$deleteData = $db->bdelete($query);
}

?>

<?php
	if(isset($error))
	{
		echo "<span style ='color:red'>".$error."</span>";
	}
?>
<style type="text/css">
	
	input[type=text],select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
input[type=submit] 
{
    background-color: green;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=reset] 
{
    background-color: green;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.main {min-height : 400px;padding:10px; font-weight: bold; font-family:monaco;}
</style>

<form action = "brandedit.php?brandId=<?php echo $id;?>" method = "post">
<table >
		<tr>
			<td>Brand Name</td>
			<td><input type ="text" name = "brandName" value = "<?php echo $getData['brandName'] ?>"/></td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type ="Submit" name = "submit" value = "Update"/>
			<input type ="reset"  Value = "Cancel" />
			<input type ="submit" name = "delete" Value = "Delete" />
			</td>

		</tr>
</table>
</form>
<a href = "brandlist.php">Show Brand List</a> 
<?php include 'inc/footer.php'; ?>