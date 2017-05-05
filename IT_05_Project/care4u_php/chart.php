<?php  
/*$db_name="hc_db";
$mysqli_user="root";
$mysqli_pass="techo";
//$mysqli_pass="";
$server_name="localhost";
$con=mysqli_connect($server_name,$mysqli_user,$mysqli_pass,$db_name);

 $day = $_POST["selected_day"]; 
 $date= $_POST["selected_date"];
 $special=$_POST["special"];
  //  $special=$_GET["special"];
 //$day = isset($_POST['selected_day']) ? $_POST['selected_day'] : '';
 //$date = isset($_POST['selected_date']) ? $_POST['selected_date'] : '';
 //$special = isset($_POST['special']) ? $_POST['special'] : '';

// $day="MON";
 //$date="2016-11-14";
 //$special="OPN23";
  $date = date("Y-m-d", strtotime($date));
 
 $sql = "SELECT distinct `officer_id`,`name`,`time`,`specialization` FROM `duty` WHERE `day` LIKE '$day'and
  `specialization` like (SELECT distinct `option`.`id`from `option` inner join `duty` on `option`.`id`= `duty`.`specialization` and 
  	`option`.`name` like '%$special%') 
and `officer_id` not in (select `officer_id` from `leave` where '$date'>=`from` and '$date'<=`to`)";
 
 $res = mysqli_query($con,$sql);
if (!$res) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
$result = array();
while($row = mysqli_fetch_array($res))
{
array_push($result,array("id"=>$row['officer_id'],"name"=>$row['name'],"time"=>$row['time'],"specialization"=> "$special"));
}
echo json_encode(array("result"=>$result));
mysqli_close($con);
*/
 
 include('db1.php');
 $day = $_POST["selected_day"]; 
 $date= $_POST["selected_date"];
 $spec=$_POST["special"];

$prog=array();
//$day='mon';
//$spec='Dentist';
//$date='27-02-2017';

$sql="select name,$day,d.slno from dutychart d where d.spel=\"$spec\" && $day not like 'xxx'
 and d.slno not in(select doctorid from leave1 where \"$date\">=from1 and \"$date\"<=to1) ";
//$sql="select distinct name,spel from dutychart where spel not in( select spel from dutychart where $day like 'xxx')";
$res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($res))
        {
           array_push($prog,array("id"=>$row['slno'],"name"=>$row['name'],"time"=>$row[$day],"specialization"=>"$spec"));
        }
		echo json_encode(array("result"=>$prog));
?>

 
