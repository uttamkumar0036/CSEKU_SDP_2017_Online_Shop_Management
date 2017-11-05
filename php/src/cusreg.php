
<?php  
include "config.php";
include "Database.php";
include "inc/design.php";
?>

<?php
	$db=new Database();
	if(isset($_POST['submit']))
	{
		$name = mysqli_real_escape_string ($db->link,$_POST['cus_username']);
		$email = mysqli_real_escape_string ($db->link,$_POST['cus_email']);
		$pass = mysqli_real_escape_string ($db->link,$_POST['cus_pass']);

		if($name == '' || $email == '' || $pass == '')
		{
			$error = "Field Must Not be Empty !";
		}
		else
		{
			$query = "INSERT INTO tbl_customer (cus_username,cus_email,cus_pass) VALUES 
                        ('$name','$email','$pass')";
                       
			$create = $db->customerinsert($query);
		}
	}
	
?>

<?php
	if(isset($error))
	{
		echo "<span style ='color:red'>".$error."</span>";
	}
?>

<!doctype html>
<html>
<head>
<title>Customer Registration</title>

</style>
</head>
<body>
<div class = "php">
	<section class = "headeroption">
		<h2>Customer Registration</h2>
	</section>
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
			     <td> E-mail* </td>
				   <td><input type = "text"  name = "cus_email" required = "1" placeholder = "Enter Your Email" /> </td>
		  	</tr>
			<tr>
			     <td> Password* </td>
				   <td><input type = "Password"  name = "cus_pass" required = "1" placeholder = "Enter Your Password" /> </td>
		  	</tr>
			<tr>
				  <td></td>
			  	<td><input type ="submit" name = "submit"/></td>
			</tr>
			<tr>
			<td>
				<p>
					Already have an account? <a href = "cuslogin.php">Sign in</a>
				</p>
			</td>
			</tr>
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
