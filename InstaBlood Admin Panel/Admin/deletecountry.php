<?php
//including the database connection file
require_once("db_connect.php");
 
//getting id of the data from url
if(isset($_GET['id']))
{
$id = $_GET['id'];
$id="delete from country WHERE id ='".$id."'";
$run_delete=mysqli_query($conn,$id);
$count=mysqli_affected_rows($conn);
if($count==-1)
{
	echo "<script> alert ('Cannot Delete this Record'); </script>";
	echo "<script> location.href='country.php';</script>";
}
else
{
	echo "<script> alert ('City has been Deleted'); </script>";
	echo "<script> location.href='country.php';</script>";
}
}
?>




