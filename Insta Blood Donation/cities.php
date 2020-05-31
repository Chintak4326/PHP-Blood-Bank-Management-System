<?php
require_once('db_connect.php');
$state_id = (int) $_GET['state_id'];
$sql = "SELECT * FROM cities WHERE state_id=$state_id";
$result = mysqli_query($conn, $sql);
	echo "<option disabled selected>Please Select City</option>";
while($row = mysqli_fetch_assoc($result)){
	echo "<option value='" . $row['id'] . "'>" . $row['name'] ."</option>";
}

?>