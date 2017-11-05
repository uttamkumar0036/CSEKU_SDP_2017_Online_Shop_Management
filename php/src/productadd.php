<?php 

include "config.php";
include "Database.php";
?>

<?php
    $db=new Database();
    if(isset($_POST['submit']))
    {

            $productName = mysqli_real_escape_string($db->link,$_POST['productName']);
            $catId = mysqli_real_escape_string($db->link,$_POST['catId']);
            $brandId = mysqli_real_escape_string($db->link,$_POST['brandId']);
            $body = mysqli_real_escape_string($db->link,$_POST['body']);
            $price = mysqli_real_escape_string($db->link,$_POST['price']);
            $availability = mysqli_real_escape_string($db->link,$_POST['availability']);
            
            $avatar_path='images/'.$_FILES['avatar']['name'];
            //echo "Name : ".$avatar_path;
            $fileName = $_FILES['avatar']['tmp_name'];
            //echo "TMP : ".$fileName."<br>";
            //echo "<br>CatID : ".$_POST['catId']."<br>BrandID : ".$_POST['brandId'];
            //echo "IS<br>";

        if($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $availability == "")
            {
                $msg = "<span class ='error'>Fields Must not be empty ! </span>";
                return $msg;
            }
            else
            {
             //if(preg_match("!image!", $_FILES['avatar']['type']))
               
                //echo "<br>Done";
                    if(move_uploaded_file($fileName, $avatar_path))
                    { 
                  
                        echo "<br>Upload Done";
                        $query = "INSERT INTO tbl_product (productName,catId,brandId,body,price,image,availability) VALUES 
                        ('$productName','$catId','$brandId','$body','$price','$avatar_path',
                        '$availability')";

                        $create = $db->proinsert($query);
                    }
                
            }
        }
    
?>



<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "online_shop";

$connect = mysqli_connect($hostname,$username,$password,$databaseName);
$q = "SELECT * FROM tbl_category";

$result1= mysqli_query($connect,$q);

$query2 = "SELECT * FROM tbl_brand";

$result2= mysqli_query($connect,$query2);

?>




<!doctype html>
<html>
<head>
<title>Online Shopping</title>
<style>
.php{width:1350px; margin : 0 auto; background : #ddd;}
.headeroption{background:#34495E;color : #fff; font-weight: bold; font-size: 20px; text-align :center; padding :10px;}
.footeroption{background:white;color : black; font-weight: bold; font-size: 18px; text-align :center; padding :5px;}
.headeroption h2, footeroption h2 {margin 0;}
.main {min-height : 400px;padding:10px; font-weight: bold; font-family:monaco;}
.error{color:red;}
input[type=text],select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-weight: bold;
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
<form method="post" enctype="multipart/form-data">
<div class = "php">
    <section class = "headeroption">
        <h2>Dashbord</h2>
    </section>
    
    <section class = "main">

<div class="heading">
        <h2>Add New Product</h2>              
         <form action="productadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               <?php
    if(isset($insertProduct))
    {
        echo $insertProduct;
    }
?>

                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Enter Product Name..." />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                        <?php while($row1 = mysqli_fetch_array($result1)):;?>
                            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>
                            <?php endwhile;?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <?php while($row1 = mysqli_fetch_array($result2)):;?>
                            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>
                            <?php endwhile;?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea  name = "body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Price..." name="price" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="avatar">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Availability</label>
                    </td>
                    <td>
                        <input type="text" name="availability">
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>

            </table>
            <a href="dashbord.php">back</a>
            </form>
    </div>
</div>
</form>

<?php include 'inc/footer.php';




/*if(isset($_POST['submit']))
    {

            $productName = mysqli_real_escape_string($db->link,$_POST['productName']);
            $catId = mysqli_real_escape_string($db->link,$_POST['catId']);
            $brandId = mysqli_real_escape_string($db->link,$_POST['brandId']);
            $body = mysqli_real_escape_string($db->link,$_POST['body']);
            $price = mysqli_real_escape_string($db->link,$_POST['price']);
            
            $avatar_path='images/'.$_FILES['avatar']['name'];
            //echo "<br>CatID : ".$_POST['catId']."<br>BrandID : ".$_POST['brandId'];


        if($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "")
            {
                $msg = "<span class ='error'>Fields Must not be empty ! </span>";
                return $msg;
            }
            else
            {
                if(preg_match("!image!", $_FILES['avatar']['type']))
                {
                //echo "<br>preg_match_Done";
                    if(copy($_FILES['avatar']['tmp_name'], $avatar_path))
                     {
                        echo "<br>Done";
                        $query = "INSERT INTO tbl_product (productName,catId,brandId,body,price,image) VALUES 
                        ('$productName','$catId','$brandId','$body','$price','$avatar_path')";

                        $create = $db->proinsert($query);
                    }
                }
            }
        }
*/





?>


