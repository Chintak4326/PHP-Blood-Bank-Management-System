<?php


//including the database connection file
require_once("db_connect.php");
 
//getting id of the data from url
if(isset($_GET['blood_grp_id']))
{
$id = $_GET['blood_grp_id'];
 
//deleting the row from table
$sql = "DELETE FROM bloodgroup WHERE blood_grp_id='".$id."'";
$result=mysqli_query($conn,$sql);
}

 header("Location:bloodgrp.php"); 

?>

