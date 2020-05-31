<?php
require_once('db_connect.php');
$country_id = (int) $_GET['country_id'];
$sql = "SELECT * FROM states WHERE country_id=$country_id";
$result = mysqli_query($conn, $sql);
	echo "<option disabled selected>Please Select State</option>";
while($row = mysqli_fetch_assoc($result)){
	echo "<option value='" . $row['id'] . "'>" . $row['name'] ."</option>";
}

?>