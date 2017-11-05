<?php 
include_once "config.php";
include_once "Database.php";

?>

<?php
session_start();
$conn = new mysqli('localhost','root','','online_shop');

if(isset($_POST['submit']))
	{
		$userName=$_POST['adminUser'];
		$pa=$_POST['adminPass'];

		$qry="select adminPass from tbl_admin where adminUser ='$userName' ";
		$result=mysqli_query($conn,$qry);
		$values=mysqli_fetch_assoc($result);
		if($values)
		{
			$passValue=$values['adminPass'];
			if($passValue==$pa)
				header("location: dashbord.php");
		}
		else 
		{
			$msg = "Invalid!!";
		}
	}

		//echo "<br>Invalid";
?>



<!doctype html>
<html>
<head>
<title>Admin Login</title>
<style>

.php{width:1350px; margin : 0 auto; background : #ddd;}
.headeroption{background:#808000;color : #fff; font-weight: bold; font-size: 20px; text-align :center; padding :10px;}
.footeroption{background:white;color : black; font-weight: bold; font-size: 18px; text-align :center; padding :5px;}
.headeroption h2, footeroption h2 {margin 0;}
.main {min-height : 400px;padding:10px; font-weight: bold; font-family:monaco;}
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
</style>
</head>
<body>
<div class = "php">
	<section class = "headeroption">
		<h2>Admin Login Form</h2>
	</section>
  <section class = "main">
  <hr/> 
  Please Provide Your Username & Password
  <hr/>
  <form method = "POST" action = "adminlogin.php">
		<table>
			<?php
	if(isset($msg))
	{
		echo "<span style ='color:red'>".$msg."</span>";
	}
?>
		<span style = "color : red; font-size:18px">
		</span>
			  <tr>
			     <td> User Name* </td>
				   <td><input type = "text"  name = "adminUser" placeholder = "Enter Your User Name" /> </td>
		  	</tr>
			<tr>
			     <td> Password* </td>
				   <td><input type = "text"  name = "adminPass" placeholder = "Enter Your Password" /> </td>
		  	</tr>
			<tr>
				  <td></td>
			  	<td><input type ="submit" name = "submit" value="Log in" /></td>
			</tr>
		</table>
		</form>
			
	</section>
		<section class = "footeroption">
		<p>
         &copy; Copyright. All Rights Reserved.
        </p>
		</section>
</div>
</body>
</html>
