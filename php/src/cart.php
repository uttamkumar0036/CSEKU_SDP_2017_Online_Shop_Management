<?php 

include'config.php';
include "inc/frontheader.php";
include 'Database.php';
$pid=$_GET['productId'];

$db    = new Database();
if(isset($_POST['quantity'])){
$sql="SELECT * FROM tbl_product WHERE productId='$pid'";
$res=$db->select($sql);
$row = $res->fetch_assoc();
$Name=$row['productName'];
$Price=$row['price'];
$qnty=$_POST['quantity'];
$img=$row['image'];
$availability = $row['availability'];


  $sql="INSERT INTO tbl_cart VALUES(NULL,'$pid','$Name','$Price','$qnty','$img')";
  $result=$db->cinsert($sql);

}

$sql = "select * from tbl_cart";
$read = $db->select($sql);

if(isset($_GET['id'])){
  $SQL="DELETE FROM tbl_cart WHERE cartId='".$_GET['id']."'";
  $db->select($SQL);

  header("Location:cart.php?productId=".$_GET['productId']);
}
?>

<h2 style="text-align: center">Your Cart</h2>

            <table class="tblone">
              <tr>
                <th width="20%">Product Name</th>
                <th width="10%">Image</th>
                <th width="15%">Price</th>
                <th width="25%">Quantity</th>
                <th width="20%">Total Price</th>
                <th width="10%">Action</th>
              </tr>   
              <?php 

              
              if($read){
              if ($read->num_rows > 0) {
            $sum = 0;
                while($row = $read->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $row['productName'] ?></td>
                  <td> <img src="<?php echo $row['image'];?>" style="height: 100px;width: 120px;"></td>
                  <td><?php echo $row['price'] ?></td>
                  <td><?php echo $row['quantity'] ?></td>
                  <td><?php $total = $row['quantity']*$row['price'];
                            echo $total; ?></td>
                  <td>
                    <a href="?productId=<?php echo $_GET['productId'] ?>&id=<?php echo $row['cartId'] ?>" onclick="return confirm('Sure to Remove??');" style="text-decoration: none;">&#x2702;</a>
                  </td>
                </tr>

                <?php $sum = $sum+$total;?>
                <?php
          }
      }
 }
              
?>


   </table>
       <table style="float:right;text-align:left" width="40%">
      <tr>
      <th>Sub Total : </th>
         <td style="font-weight: bold;"><?php echo $sum; ?></td>
       </tr>
       <tr>
        <th>VAT : </th>
          <td style="color: red;font-weight: bold;"> 10%</td>
      </tr>
         <tr>
         <th>Grand Total :</th>
        <td style="font-weight: bold;font-size: 25px; color: green"><?php $gtotal = $sum + $sum*0.1 ;
              echo $gtotal;?> 
        </td>
       </tr>
       </table>
       
       </section>
    <section style="color:blue;font-weight: bold; font-size: 22px">
 
         <a  href="showproduct.php?productId="<?php echo $_GET['productId'] ?>">Add Another Product</a>
         <br>
         <br>
         <a href="pay.php">Pay Online</a>
    </section>
    <br>
    <?php include "inc/footer.php"; ?>
        
