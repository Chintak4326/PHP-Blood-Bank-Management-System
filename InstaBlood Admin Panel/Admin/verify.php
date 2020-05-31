<?php
require_once('db_connect.php');
//print_r($_GET);
$key = $_GET['key'];
$id = $_GET['id'];

$sql = "SELECT * FROM `admin` WHERE id=$id AND verification_key='$key' AND active=0";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if($count == 1){
	$usql = "UPDATE `admin` SET active=1 WHERE id=$id";
	$ures = mysqli_query($conn, $usql);
	if($ures){
		$smg = "Account Activated Successfully";
	}else{
		$fmsg = "Account Activation failed, contact support";
	}
}else{
	$fmsg = "key not found in db";
}

?>
<html>
<head>
<title>User Registration Script in PHP & MySQL</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="styles.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</div>
</body>
<?php require_once('credits.php'); ?>
</html>