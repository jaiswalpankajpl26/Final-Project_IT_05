<?php
$username=$_POST['username'];
$password=$_POST['password'];
$con=@mysql_connect("mysql.serversfree.com","u851320107_root","manoj123456") or die(mysql_error());
$db=@mysql_select_db("u851320107_hms",$con)or die(mysql_error());

$sql="SELECT * FROM users WHERE username='$username' and password='$password'";

$result=mysql_query($sql);

$count=mysql_num_rows($result);

if($count==1){

session_register("username");
session_register("password");
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
ob_end_flush();
?>
