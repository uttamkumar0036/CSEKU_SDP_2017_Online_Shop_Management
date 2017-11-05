<!doctype html>
<html>
<head>
<title>Customer Details</title>
<style>

.php{width:100%; margin : 0 auto; background : #ddd;}
.headeroption{background:#808000;color :white; font-weight: bold; font-size: 20px; text-align :center; padding :1px;}
.footeroption{background:#ddd;color : black; font-weight: bold; font-size: 19px; text-align :center; padding :2px;}
.headeroption h2, footeroption h2 {margin 0;}
.main {min-height : 400px;padding:10px;font-weight: bold;font-family:monaco;}
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
		<h2>Customer Details</h2>
	</section>
  <section class = "main">
  <hr/> 
  YOUR ADDRESS
  <hr/>
  <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER ['PHP_SELF']);?>">
		<table>
			  <tr>
			     <td> First Name* </td>
				   <td><input type = "text"  name = "fname" required = "1" placeholder = "Enter First Name" /> </td>
		  	</tr>
			  <tr>
				   <td> Last Name* </td>
				   <td><input type = "text" name = "lname"required = "1"placeholder = "Enter Last Name" /></td>
			 </tr>
			 <tr>
				   <td> E-mail*</td>
				   <td><input type = "text" name = "mail"required = "1" placeholder = "Enter Your Email"/></td>
			</tr>
			
			 <tr>
				   <td> Gender </td>
				   <td>
				   <input type = "radio" name = "gender" value = "Male" />Male
				   <input type = "radio" name = "gender" value = "Female" />Female
				   </td>
			</tr>
			<tr>
				   <td> Telephone*</td>
				   <td><input type = "text" name = "phone"required = "1" placeholder = "+880"/></td>
			<tr/>
			 <tr>
			 <td> Region*</td>
			 <td>
			<select id="country" name="country">
			<option value="australia">Dhaka</option>
			<option value="canada">Khulna</option>
			<option value="usa">Chittagong</option>
			<option value="usa">Rajshahi</option>
			<option value="usa">Barisal</option>
			<option value="usa">Sylhet</option>
			</select>
			</td>
			</tr>

			<tr>
				  <td> Address* </td>
			  	<td><textarea name = "comment" rows = "5" cols = "40"required = "1" placeholder= "Enter Your Address"></textarea></td>
			</tr>
			<tr>
				  <td></td>
			  	<td><input type ="submit" name = "submit"/></td>
			</tr>
		</table>
		</form>
			<?php
				
				if ($_SERVER ["REQUEST_METHOD"] == "POST")
				{
					
					$fname		= 	validate($_POST ["fname"]);
					$lname		= 	validate($_POST ["lname"]);
					$mail 		= 	validate($_POST ["mail"]);
					$telephone	= 	validate($_POST ["phone"]);
					$comment	=	validate($_POST ["comment"]);
					$gender		=	validate($_POST ["gender"]);
					
				}
				function validate($data)
				{
					$data = trim ($data);
					$data = stripcslashes ($data);
					$data = htmlspecialchars ($data);
					return $data;
				}
			
			?>
	</section>
		<section class = "footeroption">
		<p>
         &copy; Copyright <a href="index.php">Online Shopping</a>. All Rights Reserved.
        </p>
		</section>
</div>
</body>
</html>
