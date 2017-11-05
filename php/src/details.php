<?php include'config.php';
    include 'inc/frontheader.php';
?>
<?php include'Database.php';?>



<?php
$pid=$_GET['productId'];
$qnty=0;
$db    = new Database();
$sql="SELECT * FROM tbl_cart WHERE productId='$pid'";
$res=$db->select($sql);

if (!empty($res)&&$res->num_rows > 0) {
    while($result = $res->fetch_assoc()) {
        $qnty=$qnty+$result['quantity'];
    }
}else{
    $qnty=0;
}

$query = "SELECT * FROM tbl_product where productId='$pid'";
$read  = $db->select($query);

?>


<h2 style="text-align: center;">
  Product Details
</h2>
<table class ="tblone">
  <tr>
<?php if($read){ 

$count=0;
$row = $read->fetch_assoc();
?>
    <td>
        
        <img src="<?php echo $row['image'];?>" style="height: 360px;width: 460px;"><br>
    </td>
       <td>
        <label class="l">Category : <?php echo $row['catId'];?></label><br>
        <label class="l">Brand : <?php echo $row['brandId'];?></label><br>
        <label class="l">Product Name : <?php echo $row['productName'];?></label><br>
        <label class="l">Price : <?php echo $row['price'];?></label><br>
        <label class="l">Available : <?php
            if ($row['availability']-$qnty>0){
                echo $row['availability']-$qnty;
            }else{
                echo 'No product available';
            }
            ?></label><br>
        <form class ="f" action="cart.php?productId=<?php echo urlencode($row['productId']); ?>" method="post" id="frm">
            <input type="number" class="" name="quantity" value="1" id="quantity">
            <input type="hidden" name="available" id="available" value="<?php echo $row['availability']-$qnty; ?>">
            <input type="button" value="Buy Now" id="btnSubmit" onclick="checkJS();">
        </form>
           <span style="display: none" id="spn">Not enough product</span>
    </td> 

     
<style>
     .l{font-size: 30px; color: green}
     .a{font-size: 30px; color: red ;}
     input[type=number],select {
    width: 30%;
    padding: 10px 18px;
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
}

</style>

    <?php 
   /* $count++;
    if($count==1){
        $count=0;
        ?>
    </tr>
    <tr>
    <?php
    
        } */   
  

    ?>
  
    </tr>

  <?php } ?>

</table>
    <label class="l"> Details : <?php echo $row['body'];?></label><br>
</body>
<br>
    <?php include "inc/footer.php"; ?>

<script>
    function checkJS() {
        var qnty,available,err;
        qnty=document.getElementById("quantity").value;
        available=document.getElementById("available").value;
        err=document.getElementById("spn");
        if(parseInt(qnty)>parseInt(available)){
            err.style.display="block";
        }else{
            err.style.display="none";
            document.getElementById("frm").submit();
        }
    }
</script>
