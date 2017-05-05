<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>MNNIT Hospital Unit</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<!-- 3 Column Stylesheet Added To The Page And Not To The Layout.css -->
<link rel="stylesheet" href="styles/column.css" type="text/css" />

<link rel="stylesheet" href="css.css" type="text/css" />
<script type="text/javascript" src="js.js"></script>






<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />

<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
<script type="text/javascript" src="calen.js"></script>



<script type='text/javascript' src='./jquery.js'></script>
	<link href='calendar.css' rel='stylesheet' type='text/css'>






<script type="text/javascript">
	window.onload = function(){


		g_globalObject = new JsDatePick({
			useMode:1,
			isStripped:true,
			target:"div3_example"

		});

		g_globalObject.setOnSelectedDelegate(function(){
			var obj = g_globalObject.getSelectedDay();
			alert("a date was just selected and the date is : " + obj.day + "/" + obj.month + "/" + obj.year);
			document.getElementById("div3_example_result").innerHTML = obj.day + "/" + obj.month + "/" + obj.year;
			//var ff=document.getElementById("div3_example_result").value;
			//alert(ff);
		});



		g_globalObject2 = new JsDatePick({
			useMode:1,
			isStripped:false,
			target:"div4_example",
			cellColorScheme:"beige"

		});

		g_globalObject2.setOnSelectedDelegate(function(){
			var obj = g_globalObject2.getSelectedDay();
			//
                        //alert("a date was just selected and the date is : " + obj.day + "/" + obj.month + "/" + obj.year);
			document.getElementById("div3_example_result").innerHTML = obj.day + "/" + obj.month + "/" + obj.year;
		});

	};
</script>









</head>
<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
     <h1><img src="m.JPG" width="950"height="140"alt="" /></h1>
      <p></p>
       <p></p>
        <p></p>
         <p></p>
    </div>

  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div id="topnav">
   <?php
include('ulink.php');
?>
    <div  class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row4">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->
    <div id="left_column">
      <div class="holder">
         <?php
include('link.php');
?>
      </div>
    </div>
    <!-- ############ -->
    <div id="content">
      <h1 class="title" style="color: #003366;" >Institute health center</h1>
      <div class="imgholder"><img src="images/demo/h.jpg" alt="" /></div>





      <h2 class="title" style="color: #003366;">Doctors on Leave [<?php echo $_POST['sel']; ?>]</h2>



      <table summary="Summary Here" cellpadding="0" cellspacing="0">
         <thead>
          <tr>
            <th>Doctor Name</th>
            <th>Reason for leave</th>
            <th>From</th>
            <th>To</th>

          </tr>
        </thead>
        <tbody>
          <tr class="light">

<?php
$x=0;
$var3=$_POST['sel'];

include('db1.php');


if(! $conn )
{
  die('Could not connect: ' . mysqli_error());
}
$sql = 'SELECT * from leave1';

//mysqli_select_db('u851320107_hms');
$retval = mysqli_query( $conn,$sql );
if(! $retval )
{
  die('Could not get data: ' . mysqli_error($conn));
}

while($row = mysqli_fetch_array($retval))

{
    $var1=$row['from1'];
    $var2=$row['to1'];
    $timestamp1 = strtotime($var1);
$timestamp2 = strtotime($var2);
$timestamp3 = strtotime($var3);

 

if($timestamp3 >= $timestamp1 &&$timestamp2 >= $timestamp3)

{
    $x++; 
    ?>
         
    <td style="color: #040000;"><?= $row['docname']; ?></td>
            <td style="color: #040000;"><?= $row['reason']; ?></td>
            <td style="color: #040000;"><?= $row['from1']; ?></td>
            <td style="color: #040000;"><?= $row['to1']; ?></td>
    </tr>
<?php
}


}


if($x==0)
{
 ?>
            <p style="color: #040000;">No Doctors on Leave./All Doctors are availabe.</p>


<!--start here-->



<?php
}
else
{
    ?>
        

 <?php
 }
 ?>

  

<!--End here -->

<?php
mysqli_close($conn);
?>


        </tbody>
      </table>
        
         
         
         
      <h3 class="title" style="color: #003366;">Doctors Available [<?php echo $_POST['sel']; ?>]</h3>



      <table summary="Summary Here" cellpadding="0" cellspacing="0">
         <thead>
          <tr>
            <th>Doctor Name</th>
            <th>Specialisation</th>
         

          </tr>
        </thead>
        <tbody>
          <tr class="light">

<?php
$x=0;
$var3=$_POST['sel'];
$sel_date=strtotime($var3);
$sel_day=date("D",$sel_date);
include('db1.php');

  
	 $q=" select name,spel from dutychart where name not in (select docname from leave1 where '$var3'>=(from1) && '$var3'<=to1 ) && $sel_day<> 'xxx'  ";
	 $ret = mysqli_query( $conn,$q );
	 while($r=mysqli_fetch_array($ret)){
	 ?>      
    <td style="color: #040000;"><?= $r['name']; ?></td>
            <td style="color: #040000;"><?= $r['spel']; ?></td>
           
    </tr>
    
<?php
	 }

?>

  

<!--End here -->

<?php
mysqli_close($conn);
?>


        </tbody>
      </table>
         
            
  </div>
         
                 
    <!-- ############ -->
    <div id="right_column">
      <div class="holder">




 <div>

<h1 class="title" style="color: #003366;">Doctors Availability Calender</h1>


<form action="info.php" method="post">
        <table summary="Summary Here" cellpadding="0" cellspacing="0">
            <tr class='monthdisp'>
                <td class='navigate' align='left'><img src='./previous.png' onclick='return prev()' /></td>
                <td align='center' id='month'></td>
                <td class='navigate' align='right'><img src='./next.png' onclick='return next()' /></td>
                </tr>
            <tr>
                <td colspan=3>
                    <table id='dispDays' border=0 cellpadding=4 cellspacing=4>
                    </table>
                </td>
            </tr>
        </table>
     Select Date: <input type='text' id='sel'name="sel" onclick='dispCal()' size=10 readonly='readonly' />

        <img src='./calendar.png' onload='dispCal()' style='cursor: pointer; vertical-align: middle;' />
         <input type="submit" value="submit"></input>
</form>

        </div>




      </div>
      <div class="holder" >
        <h2 class="title" style="color: #003366;">Latest News</h2>
        <div height="40">




<?php
include('news.php');
?>


        </div>


      </div>
        <div class="holder">
        <h2 class="title" style="color: #003366;">Special Information</h2>

<?php
include('snews.php');
?>
      </div>
    </div>
    <!-- ####################################################################################################### -->
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
    <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - <a href="#">MNNIT Hospital Unit</a></p>
  <!--<p class="fl_right">Developed by <a href="https://www.facebook.com/riths39" title="facebook link or contact(zritesh01@gmail.com)"></a></p> -->
  <p class="fl_right"> <a title="Contact(ak@mnnit.ac.in)">Web Administrator</a></p>
  </div>
</div>
</body>
</html>
