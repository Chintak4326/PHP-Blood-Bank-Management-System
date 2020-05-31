<?php
include('db_connect.php');
$id=$_POST['id'];
$type=$_POST['type'];

if($type=='city'){
	$sql="select id,name from city where state_id='$id'";
}else{
	$sql="select id,name from state where country_id='$id'";
}
        $result = mysqli_query($conn, $sql);
        $html='';
        	while($row = mysqli_fetch_assoc($result)){
                                           
        $html.='<option value='. $row['id'].'>' . $row['name'] .'</option>';
}                                    
echo $html;
?>