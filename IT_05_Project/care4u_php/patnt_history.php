<?php

$reg=$_POST["reg"];
include('db1.php');
$sql = "SELECT ap_date,doctor,special FROM `appoint` WHERE regno LIKE '$reg';";
 
 $res = mysqli_query($conn,$sql);

if (!$res) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

$result = array();
if(mysqli_num_rows($res)>0){
while($row = mysqli_fetch_array($res))
{
array_push($result,array("ap_date"=>$row['ap_date'],"drname"=>$row['doctor'],"special"=>$row['special']));
}
 
echo json_encode(array("result"=>$result));
}
else{
echo "blank";
}
mysqli_close($conn);

?>