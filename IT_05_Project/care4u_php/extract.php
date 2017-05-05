


<?php
$db_name="newhc";
$mysqli_user="root";
//$mysqli_pass="techo";
$mysqli_pass="";
$server_name="localhost";

$con=mysqli_connect($server_name,$mysqli_user,$mysqli_pass,$db_name);
session_start();
$response = array();

 $medicine_name = $_POST["med"];
// $medicine_name="HISKAST TAB";
$sql_query = "select userid,current_stock from cpdr_current_stock where medicine_name like '$medicine_name' ;";  
 $result = mysqli_query($con,$sql_query);  
 
 if(mysqli_num_rows($result) >0 )  
 {  
 while($row = mysqli_fetch_assoc($result)){
//$response["stock"] =$row["current_stock"]; 
//$response["userid"]=$row["userid"]  
  //$response["success"] = 1;
  array_push($response,array("success"=>"1","stock"=>$row['current_stock'],"userid"=>$row['userid']));
  }
 }  
 else  
 {   
 
 $response["success"] = '0';
  $response["stock"] = "Wrong Medicine Name";
  $response["userid"]="";  
 

  }
echo json_encode($response);  
mysqli_close($con);
 ?>  
