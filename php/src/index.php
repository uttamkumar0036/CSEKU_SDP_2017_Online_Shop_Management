<?php include'config.php';

    include 'inc/frontheader.php';
?>
<?php include'Database.php';?>

<?php
$db    = new Database();
$query = "SELECT * FROM tbl_product where catId ='Mobile Phones'";
$read  = $db->select($query);

?>



<body>
    <br></br>
<h2 style="text-align: center; color: black">Welcome to Online Shopping...</h2>
<h2 style="font-size: 22px; font-weight: bold;color: blue">Mobile Phones</h2>

<table class ="tblone">
  <tr>
<?php if($read){
$count=0;
while ($row = $read->fetch_assoc()){ 
?>
    <td>
        <img src="<?php echo $row['image'];?>" style="height: 160px;width: 190px;"><br>
        <label style="color: black;"><?php echo $row['productName'];?></label><br>
        <label style="color: black;"><?php echo $row['price'];?></label><br>
        <a style="text-decoration: none;" href ="details.php?productId=<?php echo urlencode($row['productId']); ?> ">Show Details</a>
    </td>


    <?php 
    $count++;
    if($count==4){
        $count=0;
        ?>
    </tr>
    <tr>
    <?php
    
        }    
    } 

    ?>
  
    </tr>

  <?php } ?>

</table>

<?php

$db    = new Database();
$query = "SELECT * FROM tbl_product where catId = 'Laptop'";
$read  = $db->select($query);

?>

<br>
<h2 style="font-size: 22px; font-weight: bold;color: blue">Laptop</h2><table class ="tblone">
  <tr>
<?php if($read){ 

$count=0;
while ($row = $read->fetch_assoc()){ 
?>
    <td>
        
        <img src="<?php echo $row['image'];?>" style="height: 160px;width: 190px;"><br>
        <label style="color: black;"><?php echo $row['productName'];?></label><br>
        <label style="color: black;"><?php echo $row['price'];?></label><br>
        <a style="text-decoration: none;" href ="details.php?productId=<?php echo urlencode($row['productId']); ?> ">Show Details</a>
    </td>


    <?php 
    $count++;
    if($count==4){
        $count=0;
        ?>
    </tr>
    <tr>
    <?php
    
        }    
    } 

    ?>
  
    </tr>

  <?php } ?>

</table>

<?php

$db    = new Database();
$query = "SELECT * FROM tbl_product where catId ='Televison'";
$read  = $db->select($query);

?>


    <br></br>
<h2 style="font-size: 22px; font-weight: bold;color: blue">Television</h2>
<table class ="tblone">
  <tr>
<?php if($read){ 

$count=0;
while ($row = $read->fetch_assoc()){ 
?>
    <td>
        
        <img src="<?php echo $row['image'];?>" style="height: 160px;width: 190px;"><br>
        <label style="color: black;"><?php echo $row['productName'];?></label><br>
        <label style="color: black;"><?php echo $row['price'];?></label><br>
        <a style="text-decoration: none;" href ="details.php?productId=<?php echo urlencode($row['productId']); ?> ">Show Details</a>
    </td>


    <?php 
    $count++;
    if($count==4){
        $count=0;
        ?>
    </tr>
    <tr>
    <?php
    
        }    
    } 

    ?>
  
    </tr>

  <?php } ?>

</table>

<?php

$db    = new Database();
$query = "SELECT * FROM tbl_product where catId = 'Camera'";
$read  = $db->select($query);

?>

    <br></br>
<h2 style="font-size: 22px; font-weight: bold;color: blue">Camera</h2>
<table class ="tblone">
  <tr>
<?php if($read){ 

$count=0;
while ($row = $read->fetch_assoc()){ 
?>
    <td>
        
        <img src="<?php echo $row['image'];?>" style="height: 160px;width: 190px;"><br>
        <label style="color: black;"><?php echo $row['productName'];?></label><br>
        <label style="color: black;"><?php echo $row['price'];?></label><br>
        <a style="text-decoration: none;" href ="details.php?productId=<?php echo urlencode($row['productId']); ?> ">Show Details</a>
    </td>


    <?php 
    $count++;
    if($count==4){
        $count=0;
        ?>
    </tr>
    <tr>
    <?php
    
        }    
    } 

    ?>
  
    </tr>

  <?php } ?>

</table>
</body>
<br>
    <?php include "inc/footer.php"; ?>