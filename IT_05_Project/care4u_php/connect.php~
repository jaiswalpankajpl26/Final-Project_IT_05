<?php
$db_name="newhc";
$mysqli_user="root";
//$mysqli_pass="techo";
$mysqli_pass="";
$server_name="localhost";

// Create connection
$response=array();
$con=mysqli_connect($server_name, $mysqli_user, $mysqli_pass,$db_name);
if (!$con) {
die ('could not connect:' . mysql_error () );
}
$sql_query = "select distinct(medicine_name) from cpdr_current_stock ;";  
$result = mysqli_query($con,$sql_query);  
while($row=mysqli_fetch_array($result))  
 {  
$name="";
$name=$row["medicine_name"];
//$response[$name]=$row["medicine_name"];
array_push($response,array("name"=>$row['medicine_name']));
//echo $response[$name];
 }
echo json_encode($response); 
?>
