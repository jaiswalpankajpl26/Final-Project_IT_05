<?php  
$db_name="hc_db";
$mysqli_user="root";
$mysqli_pass="techo";
//$mysqli_pass="";
$server_name="localhost";
$con=mysqli_connect($server_name,$mysqli_user,$mysqli_pass,$db_name);

$sql="select distinct d_id,name,specialization,time from duty";
$res=mysqli_query($con,$sql);
$rr="h"." " ."ko";
 echo "$rr";
$result = array();
while($row=mysqli_fetch_array($res)){

 $d=$row['d_id'];
	$s="select  day from duty where d_id='$d' ";
	$r=mysqli_query($con,$s);

	$st="";
	while ($rw=mysqli_fetch_array($r)) {
		$st=$st.",".$rw['day'];
	}
	array_push($result,array("dr_id"=>$row['d_id'],"name"=>$row['name'],"specialization"=>$row['specialization'],"day"=>"$st"));

}
echo json_encode(array("result"=>$result));

mysqli_close($con);
?>