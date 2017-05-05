<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>MNNIT Hospital Unit</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script>
var sel_day;

</script>
<script src="jquery-2.1.1.js"></script>
<script src="bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="datepicker.css" type="text/css" />
</head>>

<body>
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><img src="m.JPG" width="950"height="140"alt="" /></h1>
    </div>
    
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div id="topnav">
    <ul>
      <li><a href="home.php">Homepage</a></li>
      <li><a href="people.php">People</a></li>
      <li><a href="dutychart.php">Duty Chart</a></li>
      <li><a href="">Facilities</a>
        <ul>
          <li><a href="physiotherapy.php">Physiotherapy Cell</a></li>
          <li><a href="dental.php">Dental Cell</a></li>
          <li><a href="pathology.php">Pathology Cell</a></li>
        </ul>
      </li>
        <li ><a href="feedback.php">Feedback</a></li>
      <li class="last"><a href="member.php">Member Area</a></li>
    </ul>
    <div  class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row4">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->

<?php

$date=$_POST['sel_date'];
$special=$_POST['special'];
$doc=$_POST['doctor'];
$reg=$_POST['reg'];
include('db1.php');
include('db2.php');
require_once 'include/class.users.php';
require_once 'include/class.general.php';
//echo "<script type='text/javascript'> alert('kj');</script>";
// $general = new general ();
//$regId=$general->doRegistration($reg,"self","ofc27");
$counter=0;
$counter1=0;

$w="SELECT * FROM `counter` WHERE field =\"officer\" ";
mysqli_select_db("dispensary_new", $con);
$ress=mysqli_query($w);
echo "<script type='text/javascript'> alert('$ress');</script>";
$q1 = "SELECT starter, value FROM counter WHERE field = \"registration\" ;";
$r1=mysqli_query($con,$q1);
echo "<script type='text/javascript'> alert('jkb');</script>";
 if(mysqli_num_rows($r1) == 1){
                $query = mysqli_fetch_array($q1);
                
                $counter = $q1['starter'].($q1['value'] + 1);
}
   $starter = substr($counter, 0, 3);      //the first three characters of the counter
        $length = strlen($counter) - 3;

        $counter = substr($counter, 3, $length);

        $q2 = "UPDATE counter SET value = \"$counter\" WHERE starter = \"$starter\" ";
        $r2=mysqli_query($con,$q2);
alert($r2);

$q3 = "SELECT starter, value FROM counter WHERE field = \"sr\" ;";
$r3=mysqli_query($con,$q3);
 if(mysqli_num_rows($r3) == 1){
                $query = mysqli_fetch_array($q3);
                
                $counter1 = $q3['starter'].($q3['value'] + 1);
}
   $starter1 = substr($counter1, 0, 3);      //the first three characters of the counter
        $length1 = strlen($counter1) - 3;

        $counter1 = substr($counter1, 3, $length1);

        $q4 = "UPDATE counter SET value = \"$counter1\" WHERE starter = \"$starter1\" ";
        $r4=mysqli_query($con,$q4);
$srn=$counter1;
$r = explode ( "N", $srn );
$datetime=date('c');
$sr = "MNNIT/HC/" . date("Ymd") . "/" . $r [1];

$sqlQuery = "INSERT INTO `rgistration` (id,sr_no,patient_id,receptionist,doctor,checked,checkup_time,referred,mode,active)
												VALUES(\"$counter\",\"$sr\",\"$reg\",\"self\",\"$doc\",\"n\",\"$datetime\",\"NONE\",\"f\",\"y\")";
$result=mysqli_query($con,$sqlQuery);

$sql="insert into appoint values(\"$date\",\"$special\",\"$doc\",\"$reg\")";
$res=mysqli_query($conn,$sql);
if($res>0){
	?>
    Successfully Appointed...
    <?php
}
else{
	?>
    ERROR:
    <?php
}
?>
</div>
    <!-- ####################################################################################################### -->
    <div class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row5">
  <div id="footer" class="clear">
    <!-- ####################################################################################################### -->
    <div class="foot_contact">
      
    </div>
    <!-- ####################################################################################################### -->
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="copyright" class="clear">
 <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="#">MNNIT Hospital Unit</a></p>
   <p class="fl_right"> <a title="Contact(ak@mnnit.ac.in)">Web Administrator</a></p> 
  </div>
</div>
</body>
</html>s
