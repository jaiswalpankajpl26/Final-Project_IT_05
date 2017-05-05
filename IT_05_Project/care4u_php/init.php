<?php
$db_name="dispensary_new";
$mysql_user="root";
//$mysqli_pass="techo";
$mysqli_pass="";
$server_name="localhost";

$con=mysqli_connect($server_name,$mysql_user,$mysql_pass,$db_name);
if(!$con)
{

echo "Connenection Error------".mysqli_connect_error();

}
else
{
echo "<h3>Database connection Success....</h3>";

}

?>
