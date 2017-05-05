<?php
/*$hostname = "localhost";
$db_username = "root";
$db_password = "moon123";


$link = mysql_connect($hostname, $db_username, $db_password) or die("Cannot connect to the database");
mysql_select_db("newhc") or die("Cannot select the database");
*/
$conn=mysqli_connect("localhost","root","") or die("unable to connect");
$db=mysqli_select_db($conn,"newhc");

?>
