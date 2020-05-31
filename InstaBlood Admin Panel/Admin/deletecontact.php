<?php


//including the database connection file
require_once("db_connect.php");
 
//getting id of the data from url
if(isset($_GET['contact_id']))
{
$id = $_GET['contact_id'];
 
//deleting the row from table
$sql = "DELETE FROM contactus WHERE contact_id='".$id."'";
$result=mysqli_query($conn,$sql);
}

 header("Location:contact.php"); 

?>



