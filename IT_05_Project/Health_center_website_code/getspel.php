<?php
include('db1.php');
$day=$_GET['day'];
$date=$_GET['date'];
//$date=$dat->format("d-m-Y");
//$date='27-1-2017';
$progs=array();
$sql="select distinct d.spel from dutychart d where d.spel in( select spel from dutychart where $day not like 'xxx')
      and d.slno not in(select doctorid from leave1 where \"$date\">=from1 and \"$date\"<=to1) ";
	$res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($res))
        {
           array_push($progs,array($row['spel']));
        }
		echo json_encode($progs);