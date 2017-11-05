<?php 
include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php
	$db=new Database();
	if(isset($_POST['submit']))
	{
		$name = mysqli_real_escape_string ($db->link,$_POST['catName']);
		if($name == '')
		{
			$error = "Field Must Not be Empty !";
		}
		else
		{
			$query = "INSERT INTO tbl_category(catName) values ('$name')";
			$create = $db->insert($query);
		}
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

<form action = "catadd.php" method = "post">
<table >
		<tr>
			<td>Category Name</td>
			<td><input type ="text" name = "catName" placeholder = "Enter Your Category Name"/></td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type ="Submit" name = "submit" value = "Add"/>
			<input type ="reset"  Value = "Cancel" />
			</td>

		</tr>
</table>
</form>
<a href = "catlist.php">Show Category List</a> 
<?php include 'inc/footer.php'; ?>