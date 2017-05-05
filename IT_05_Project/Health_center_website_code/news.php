<marquee scrollamount="2" behavior="scroll" direction="up">
   <?php
   include('db1.php');

$sql = 'SELECT * from news';

//mysql_select_db('hospital1');
$retval = mysqli_query($conn, $sql );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

while($row = mysqli_fetch_array($retval))

{
       
         
        echo ">><a href='{$row['link']}' target='_blank'>{$row['news']}</a> <br>";
	echo "------------------------------------------------------------------";
	echo "<br>";
}
?>
</marquee>
<a style="color:black" href='fullnews.php' target='_blank'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;view all</a>
