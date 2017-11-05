<?php if(isset($_POST['submit']))
{
$ImageName = $_FILES['photo']['name'];
$fileElementName = 'photo';
$path = 'images/'; 
$location = $path . $_FILES['photo']['name'];
echo "Locatn : ".$location; 
$rr=$_FILES['photo']['tmp_name'];
 
echo "<br>TMP : ".$rr;
move_uploaded_file($_FILES['photo']['tmp_name'], $location); 
} ?>
<form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">
<input type="file" name="photo">
<input type="submit" name="submit">
</form>