<?php  
$db_name="dispensary_new";
$mysqli_user="root";
//$mysqli_pass="techo";
$mysqli_pass="";
$server_name="localhost";
//$server_name="172.31.80.231";

$con=mysqli_connect($server_name,$mysqli_user,$mysqli_pass,$db_name);

session_start();
 $idx = $_POST["idx"];
 
 $sql_query= "delete from `leave` where idx like '$idx' ;";
$res = mysqli_query($con,$sql_query);  
if (!$res) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

if($res>0)
{
echo "true";
}

else{
echo "ERROR!!!";
}
mysqli_close($con);
?>
