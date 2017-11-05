<html>
<head>
    <title>Online Shopping</title>
    <link href = "css/jquery.bxslider.css" rel = "stylesheet" type = "text/css">
    <link href = "css/style.css" rel = "stylesheet" type = "text/css">
</head>
<body>
<style>

</style>
        <div id = "wrapper">
        <div id = "header">
        </div>
    <!--==main header==-->
    <div id = "main-header">
    <!--==User Menu==-->
        <div id ="user-menu">
            <li><a href ="showproduct.php">Cart</a></li>
            <li></li>
            <?php
            session_start();
            if ($_SESSION['login']==0){
                ?>
                <li><a href="cuslogin.php">Login</a></li>
            <?php
            }else{
                ?>
                <li><a href="#"><?php echo $_SESSION['username']?></a></li>
                <li></li>
                <li><a href="cuslogin.php">Logout</a></li>
            <?php
            }
            ?>

        </div>
        <div id = "logo">
            <span id="ist">Online</span><span id="iist">Shopping</span>
        </div>
        <!--==Search area==-->
         <div id = "search">
            <form action="">
                <input class = "search-area" type = "text" name = "valueToSearch" placeholder ="Search here">
                <input class = "search-btn" type = "submit" name = "search" value= "Search">
            </form>

        </div>
        </div>
        <!--==Nevigation Bar==-->
        <div id = "navigation">

        <nav>
            <a href="index.php">Home</a>
            <a href="showproduct.php">Products</a>
            <a href="contact.php">Contact Us</a>
            <a href="#">Help</a>

        </nav>      
        </div>
<style>
#navigation{
    width:100%;
    height:35px;
    background:#808000;
    float:left;
    font-weight: bold;
    font-family : monaco;

}
.main {min-height : 400px; padding:10px; font-weight: bold; font-family:monaco;}
.main {min-height : 400px;padding:10px;}
.tblone{width : 100%;border :1px solid #fff; margin : 23px 0}
.tblone td{padding :5px 10px;text-align : center; font-size:18px; font-weight:bold;color:purple;font-family:consolas;}
table.tblone tr:nth-child(2n+1){background: #fff;height : 30px;font-size: 22px;}
table.tblone tr:nth-child(2n){background: #fff;height : 30px;}
</style>