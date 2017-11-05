<!DOCTYPE html>
<html>
<head>
	<title>Dashbord</title>
<style>
body{
	margin:0px;
	padding: 0px;
}
.headeroption{background:#34495E;color : #fff; font-weight: bold; font-size: 20px; text-align :center; padding :10px;}
.menu ul{
	list-style: none;
	margin:0px;
}

.menu ul li{
	padding:15px;
	position: relative;
	width:200px;
	background-color: #34495E;
	border-top: 1px solid #BDC3c7;
	text-align:center ;
}
.menu ul ul{
	transition : all 0.3s;
	opacity:0;
	position: absolute;
	visibility: hidden;
	left:82%;
	top:-2%;
	text-align:center ;
}
.menu ul li:hover > ul{
	opacity: 1;
	visibility: visible;
}
.menu ul li a{
	color:white;
	text-decoration: none;
	text-align:center ;
}
</style>
</head>
<body>
	<section class = "headeroption">
		<h2>Welcome to Admin Pannel</h2>
		
	</section>
	<div class = "menu">
		<ul>
			<li><a href = "">Category</a>
				<ul>
					<li><a href = "catadd.php">Add</a></li>
					<li><a href = "catlist.php">List</a></li>
				</ul>
			</li>
			<li><a href = "">Brand</a>
				<ul>
					<li><a href = "brandadd.php">Add</a></li>
					<li><a href = "brandlist.php">List</a></li>
				</ul>
			</li>
			<li><a href = "">Product</a>
				<ul>
					<li><a href = "productadd.php">Add</a></li>
					<li><a href = "productlist.php">List</a></li>
				</ul>
			</li>
			<li><a href = "adminlogin.php">Log Out</a>
			</li>
		</ul>
		</div>
</body>
</html>