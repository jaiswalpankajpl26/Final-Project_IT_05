<?php  


/*$db_name="dispensary_new";
$mysqli_user="root";
//$mysqli_pass="techo";
$mysqli_pass="";
$server_name="localhost";
//$server_name="172.31.80.231";

$con=mysqli_connect($server_name,$mysqli_user,$mysqli_pass,$db_name);
session_start();

 //$day = $_POST["selected_day"]; 
$day="MON";
	//$day=$_GET['selected_day'];
 
 $sql = "SELECT officer_id,d_id,time,specialization FROM duty_chart WHERE day LIKE '$day';";
 
 $res = mysqli_query($con,$sql);



if (!$res) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}



 
$result = array();

 
while($row = mysqli_fetch_array($res))
{

array_push($result,array("id"=>$row['dr_id'],"name"=>$row['d_id'],"time"=>$row['time'],"specialization"=> $row['specialization']));
}
 
//echo json_encode(array("result"=>$result));
echo "Server down !!! :) We care4u..";
mysqli_close($con);
 */
echo "GGG";
?>
 
