<?php  


/*$db_name="dispensary_new";
$mysqli_user="root";
//$mysqli_pass="techo";
$mysqli_pass="";
//$server_name="hc.mnnit.ac.in";
//$server_name="172.31.80.231";
$server_name="localhost";

$con=mysqli_connect($server_name,$mysqli_user,$mysqli_pass,$db_name);
session_start();

 $day = $_POST["selected_day"]; 
//$day="MON";
	//$day=$_GET['selected_day'];
 
 $sql = "SELECT specialization FROM duty WHERE day LIKE '$day';";
 
 $res = mysqli_query($con,$sql);
if (!$res) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

$result = array();

 
while($row = mysqli_fetch_array($res))
{array_push($result,array("specialization"=> $row['specialization']));
}
 
echo json_encode(array("result"=>$result));
mysqli_close($con);
*/

include('db1.php');
$day=$_POST['selected_day'];
$date=$_POST['date'];
//$date=$date->format("d-m-Y");
//$date='6-2-2017';
//$day="mon";

$progs=array();
$sql="select distinct d.spel from dutychart d where d.spel in( select spel from dutychart where $day not like 'xxx')
      and d.slno not in(select doctorid from leave1 where \"$date\">=from1 and \"$date\"<=to1) ";
	$res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($res))
        {
           array_push($progs,array("specialization"=>$row['spel']));
        }
		echo json_encode(array("result"=>$progs));
?>
 
