<?php
require_once("db_connect.php");
error_reporting(0);

?>
<htmL>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="uploadfile" value=""/>
    <input type="submit" name="submit" value="Upload File"/>

 </form>
 <body>
 </html>
 <?php
 
 $filename=$_FILES["uploadfile"]["name"];
 $tempname=$_FILES["uploadfile"]["tmp_name"];
  $folder="instaimages/".$filename;#
  echo $folder;
 move_uploaded_file($tempname,$folder);
 
 ?>