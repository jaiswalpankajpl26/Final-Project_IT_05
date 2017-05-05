<?php
include("db1.php");
$parent_id=$_REQUEST['q'];
mysqli_query($conn,"UPDATE `feedback` SET `likes`=`likes`+1 WHERE id='$parent_id'");
header("location:feedback.php");
?>
