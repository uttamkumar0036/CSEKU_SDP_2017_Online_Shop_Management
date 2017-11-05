<?php include "inc/design.php"; ?>

<?php 
include_once "config.php";
include_once "Database.php";
?>

<?php
session_start();
$_SESSION['login']=0;
$conn = new mysqli('localhost','root','','online_shop');

if(isset($_POST['login']))
	{
		$userName=$_POST['cus_username'];
		$pa=$_POST['cus_pass'];

		$qry="select cus_pass from tbl_customer where cus_username ='$userName' ";
		$result=mysqli_query($conn,$qry);
		$values=mysqli_fetch_assoc($result);
		if($values)
		{
			$passValue=$values['cus_pass'];
			if($passValue==$pa)
			    $_SESSION['login']=1;
			    $_SESSION['username']=$_POST['cus_username'];
				header("location: index.php");
		}
		else 
		{
			$msg = "Invalid!!";
			$_SESSION['login']=0;
		}
	}

		//echo "<br>Invalid";
?>





<!doctype html>
<html>
<head>
<title>Customer Login</title>

</head>
<body>
<div class = "php">
	<section class = "headeroption">
		<h2>Customer Login Form</h2>
	</section>
<?php 
if(isset($_GET['msg']))
{
	echo "<span style='color:#ff0080;font-weight: bold;font-size:18px;'>".$_GET['msg']."</span>";
}
?>
  <section class = "main">
  <hr/> 
  Please Provide Your Username & Password
  <hr/>
  <form method = "POST" action = "">
		<table>
			  <tr>
			     <td> User Name* </td>
				   <td><input type = "text"  name = "cus_username" required = "1" placeholder = "Enter Your User Name" /> </td>
		  	</tr>
			<tr>
			     <td> Password* </td>
				   <td><input type = "Password"  name = "cus_pass" required = "1" placeholder = "Enter Your Password" /> </td>
		  	</tr>
			<tr>
				  <td></td>
			  	<td><input type ="submit" name = "login" value="Sign In" /></td>
			</tr>
			<td>
				<p>
					Not yet an Account? <a href = "cusreg.php">Sign Up</a>
				</p>
			</td>
		</table>
		</form>
			
	</section>
		<section class = "footeroption">
		<p>
         &copy; Copyright <a href="index.php">Online Shopping</a>. All Rights Reserved.
        </p>
		</section>
</div>
</body>
</html>
