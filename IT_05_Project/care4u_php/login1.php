<?php  


$db_name="dispensary_new";
$mysqli_user="root";
//$mysqli_pass="techo";
$mysqli_pass="";
$server_name="localhost";
//$server_name="127.0.0.1";

$con=mysqli_connect($server_name,$mysqli_user,$mysqli_pass,$db_name);
session_start();
$response = array();


 $user_name = $_POST["login_name"];  
 $user_pass =  $_POST["login_pass"]; 
  //$user_pass=md5($user_pass);
$sql_query = "select id from doctor where officer_id like '$user_name' and pass like '$user_pass';";  
 $result = mysqli_query($con,$sql_query);  
 
 if(mysqli_num_rows($result) >0 )  
 {  
 $row = mysqli_fetch_assoc($result);  
$response["name"] =$row["d_id"];   
  $response["success"] = 1;
        
      echo json_encode($response);
 
 }  
 else  
 {   
 
 $response["success"] = 0;
  $response["name"] = "Wrong UserId or Password";
        
 
echo json_encode($response);
  }  
mysqli_close($con);
 ?>  
