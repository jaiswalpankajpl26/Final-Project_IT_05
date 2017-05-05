<?php  
/*$db_name="dispensary_new";
$mysqli_user="root";

$mysqli_pass="";
$server_name="localhost";
//$server_name="172.31.80.231";

$con=mysqli_connect($server_name,$mysqli_user,$mysqli_pass,$db_name);
*/
include('db1.php');
 $dname = $_POST["dname"];  
 $date =  $_POST["date"]; 
$dtime=$_POST["dtime"];
$regno=$_POST["regno"];
$task=$_POST["dtask"];
$special=$_POST["special"];
$doc=$dname.' '.$dtime;
if($task=="appoint"){
//$sql_cheq_reg= "select id from `patient` where `cardNo` like '$regno' ;";
$sql_cheq_reg="select cardNo from `patient` where cardNo=\"$regno\" ";
$res = mysqli_query($conn,$sql_cheq_reg);  
if($no=mysqli_num_rows($res)>0)
{
	//$sql_check="select drname from `appoint` where `ap_date` like '$date' and `pregno` like '$regno' and `ap_time` like '$dtime'";
	$sql_check="select doctor from `appoint` where `ap_date`=\"$date\" and `regno`=\"$regno\" and `doctor` like '%$dname%'";
	$check = mysqli_query($conn,$sql_check);
	if(mysqli_num_rows($check)>0)
	{
		echo "Duplicate";
	}
	else{
		//$sql_limit="SELECT count(*) from `appoint` where `drname` like '$dname' and `ap_date` like '$date' and `ap_time` like '$dtime' ";
		$sql_limit="SELECT count(*) from `appoint` where `doctor` like '%$dname%' and `ap_date`=\'$date\'  ";
		$result_limit = mysqli_query($conn,$sql_limit); 
		//if( $result_limit >15)
			//echo "limitexceed";
		//else
		{
//$sql_query = "insert into `appoint`(`drname`,`ap_date`,`ap_time`,`pregno`) values('$dname','$date','$dtime','$regno');";

$sql_query = "insert into `appoint`(`doctor`,`special`,`ap_date`,`regno`) values('$doc','$special','$date','$regno');";
 $result = mysqli_query($conn,$sql_query);  
 
 if($result >0 )  
 {  echo "true";
 }  
else  
 {   echo "false"; }  
  }
	}
}
  else
  {echo "wrong card no.....Please enter Valid no.!!!!!";
  }

}
else{
	//$sql_cancel="delete from `appoint` where `drname` like '$dname' and `ap_date` like '$date' and `pregno` like '$regno' and `ap_time` like '$dtime'; ";

	$sql_cancel="delete from `appoint` where `ap_date`=\"$date\" and `regno`=\"$regno\" and `doctor` like '%$dname%' ; ";
	$res = mysqli_query($conn,$sql_cancel); 
	$res=mysqli_affected_rows($conn);
	if($res>=1)
		echo "true_can";
	else	
		echo "false_can";
	
}
mysqli_close($conn);
 ?>  
 
