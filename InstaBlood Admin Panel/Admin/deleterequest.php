<?php


//including the database connection file
require_once("db_connect.php");
 
//getting id of the data from url
if(isset($_GET['request_id']))
{
$id = $_GET['request_id'];
 
//deleting the row from table
$sql = "DELETE FROM request WHERE request_id='".$id."'";
$result=mysqli_query($conn,$sql);
}

 header("Location:request.php"); 

?>



