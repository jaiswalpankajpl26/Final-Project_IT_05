
<?php
include('db1.php');
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = 'SELECT * from news';
mysql_select_db('hospital1');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
?>
<marquee  behavior="scroll" direction="up">
   <?
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))

{
    echo "NEWS :{$row['news']}  <br> ".

         "--------------------------------<br>";
}
?>
</marquee>
<?
mysql_close($conn);
?>
