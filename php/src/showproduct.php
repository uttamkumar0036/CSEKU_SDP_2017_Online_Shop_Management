<?php include'config.php';
    include 'inc/frontheader.php';
?>
<?php include'Database.php';?>



<?php

$db    = new Database();
$query = "SELECT * FROM tbl_product";
$read  = $db->select($query);

?>


<body>
    <br></br>
<h2 style="text-align: center;">Products</h2>
<table class ="tblone">
  <tr>
<?php if($read){ 

$count=0;
while ($row = $read->fetch_assoc()){ 
?>
    <td>
        
        <img src="<?php echo $row['image'];?>" style="height: 160px;width: 190px;"><br>
        <label style="color: black;">Brand : <?php echo $row['brandId'];?></label><br>
        <label style="color: black;">Product Name : <?php echo $row['productName'];?></label><br>
        <label style="color: black;">Price : <?php echo $row['price'];?></label><br>
        <a href ="details.php?productId=<?php echo urlencode($row['productId']); ?>">Details</a>
    </td>


    <?php 
    $count++;
    if($count==3){
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