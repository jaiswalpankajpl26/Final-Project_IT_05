<?php
$db_name="dispensary_new";
$mysqli_user="root";
//$mysqli_pass="techo";
$mysqli_pass="";
//$server_name="hc.mnnit.ac.in";
//$server_name="172.31.80.231";
$server_name="localhost";

$con=mysqli_connect($server_name,$mysqli_user,$mysqli_pass,$db_name);
session_start();

 $id = $_POST["dr_id"]; 
	//$day=$_GET['selected_day'];
 
 $sql = "SELECT idx,officer_id,`from`,`to` FROM `leave` WHERE officer_id LIKE '$id';";
 
 $res = mysqli_query($con,$sql);

if (!$res) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

$result = array();

while($row = mysqli_fetch_array($res))
{
array_push($result,array("id"=>$row['dr_id'],"from"=>$row['from'],"to"=>$row['to'],"idx"=>$row['idx']));
}
 
echo json_encode(array("result"=>$result));

mysqli_close($con);
 
?>
 
