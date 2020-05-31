<?php



//including the database connection file
require_once("db_connect.php");
 
//getting id of the data from url
if(isset($_GET['img_id']))
{
$id = $_GET['img_id'];
 
//deleting the row from table
$sql = "DELETE FROM gallery WHERE img_id='".$id."'";
$result=mysqli_query($conn,$sql);
}

 header("Location:viewgallery.php"); 

?>





