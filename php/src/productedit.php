<?php 
include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php 

$hostname="localhost";
$username="root";
$password="";
$databaseName="online_shop";

$connect = mysqli_connect($hostname,$username,$password,$databaseName);
$q = "SELECT * FROM tbl_category";

$result1= mysqli_query($connect,$q);

$query2 = "SELECT * FROM tbl_brand";

$result2= mysqli_query($connect,$query2);

?>

<?php
    
    $id  = $_GET['productId'];
    $db = new Database();

    $query = "SELECT * FROM tbl_product WHERE productId = $id";
    $getData  = $db->select($query)->fetch_assoc();

    if(isset($_POST['submit']))
    {
        
        $productName = mysqli_real_escape_string ($db->link,$_POST['productName']);
        $catId = mysqli_real_escape_string ($db->link,$_POST['catId']);
        $brandId = mysqli_real_escape_string ($db->link,$_POST['brandId']);
        $body = mysqli_real_escape_string ($db->link,$_POST['body']);
        $price = mysqli_real_escape_string ($db->link,$_POST['price']);
        $availability = mysqli_real_escape_string ($db->link,$_POST['availability']);


        $avatar_path='images/'.$_FILES['avatar']['name'];
        $fileName = $_FILES['avatar']['tmp_name'];

        
        //echo "<br>CatID : ".$_POST['catId']."<br>BrandID : ".$_POST['brandId'];
        if($productName == '' || $catId == '' || $brandId == '' || $body == '' ||
         $availability == ''|| $price =='')
        {
            $error = "Field Must Not be Empty !";
        }
        else
        {
           /* if(preg_match("!image!", $_FILES['avatar']['type']))
                {
                //echo "<br>preg_match_Done";*/
                    if(move_uploaded_file($fileName, $avatar_path))
                     {
                        echo "<br>Good<br>";
                        $query = "UPDATE tbl_product
                                    SET 
                                    productName = '$productName',
                                    catId = '$catId',
                                    brandId = '$brandId',
                                    body = '$body',
                                    price = '$price',
                                    image = '$avatar_path',
                                    availability = '$availability'
                                    WHERE
                                    productId = '$id'";
                        $update = $db->proupdate($query);
                    }
                //}
        }
    }
    ?>

    <?php 
if(isset($_POST['delete']))
{
    $query = "DELETE FROM tbl_product WHERE productId = '$id'";
    $deleteData = $db->prodelete($query);
}
 
?>
    
<?php
    if(isset($error))
    {
        echo "<span style ='color:red'>".$error."</span>";
    }
?>



<style type="text/css">
    
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
input[type=reset] 
{
    background-color: green;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.main {min-height : 400px;padding:10px; font-weight: bold; font-family:monaco;}
</style>
<img src="<?php echo $getData['image']; ?>" style="height: 50px;width: 50px;">
<form action = "productedit.php?productId=<?php echo $id;?>" method = "post" enctype="multipart/form-data">
<table>
         <tr>
            <td> Product Name</td>
            <td><input type ="text" name = "productName" value = "<?php echo $getData['productName'] ?>"/></td>
        </tr>
       <tr>
            <td>Category</td>
            <td>
                <select id="select" name="catId">
                    <?php while($row1 = mysqli_fetch_array($result1)):;?>
                        <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>
                        <?php endwhile;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Brand</td>
            <td>
                <select id="select" name="brandId">
                    <?php while($row1 = mysqli_fetch_array($result2)):;?>
                    <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>
                    <?php endwhile;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Body</td>
            <td><input type ="text" name = "body" value = "<?php echo $getData['body'] ?>"/></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type ="text" name = "price" value = "<?php echo $getData['price'] ?>"/></td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name="avatar"></td>

        </tr>
        <tr>
            <td>Availability</td>
            <td><input type="text" name="availability" value ="<?php echo $getData['availability']?>"></td>

        </tr>
        <tr>
            <td></td>
            <td>
            <input type ="Submit" name = "submit" value = "Update"/>
            <input type ="reset"  Value = "Cancel" />
            <input type ="submit" name = "delete" Value = "Delete" />
            </td>
        </tr>
</table>
</form>
<a href = "productlist.php">Show Product List</a> 
<?php include 'inc/footer.php'; ?>