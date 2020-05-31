<?php


//including the database connection file
require_once("db_connect.php");
 
//getting id of the data from url
if(isset($_GET['id']))
{
$id = $_GET['id'];
 
//deleting the row from table
$sql = "DELETE FROM state WHERE id='".$id."'";
$result=mysqli_query($conn,$sql);
}

 header("Location:state.php"); 

?>

