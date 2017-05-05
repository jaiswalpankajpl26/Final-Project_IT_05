<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>MNNIT Hospital Unit</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<!-- 3 Column Stylesheet Added To The Page And Not To The Layout.css -->
<link rel="stylesheet" href="styles/3_column.css" type="text/css" />

<link rel="stylesheet" href="css.css" type="text/css" />
<script type="text/javascript" src="js.js"></script>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="jquery.cookie.js"></script>




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






<script>

        window.document.onkeydown = function (e)
{
    if (!e){
        e = event;
    }
    if (e.keyCode == 27){
        lightbox_close();
    }
}


        function lightbox_open(){
    window.scrollTo(0,0);
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block';
}


function lightbox_close(){
    document.getElementById('light').style.display='none';
    document.getElementById('fade').style.display='none';
}


    </script>

    <style>

        #fade{
    display: none;
    position: fixed;
    top: 0%;
    left: 0%;
    width: 100%;
    height: 100%;
    background-color: #000;
    z-index:1001;
    -moz-opacity: 0.7;
    opacity:.70;
    filter: alpha(opacity=70);
}
#light{
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    width: 300px;
    height: 200px;
    margin-left: -150px;
    margin-top: -100px;
    padding: 10px;
    border: 2px solid #FFF;
    background: white;
    z-index:1002;
    overflow:visible;
}




    </style>

<script language="javascript">
function toggle() {




        var str = document.getElementById('sel').value;

           document.getElementById("toggleText").$var3=str;


	var ele = document.getElementById("toggleText");
	var text = document.getElementById("displayText");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "show";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "hide";
	}
}
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
      <h1 class="title" style="color: #003366;">MNNIT Hospital</h1>

      <div>







          <table cellspacing=10 cellpadding=10 border=1>
<tr><th style="color: #003366;">Doctors Details</th></tr>
  <?php
$id =$_GET['action'];

include('db1.php');
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = "SELECT * FROM dutychart WHERE slno=$id";

mysql_select_db('hms');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

while($row = mysql_fetch_array($retval, MYSQL_ASSOC))

{


{
    ?>

<tr><td valign="top" colspan=2>
<p align='justify' style="color: #003366;"><b><? echo "{$row['name']} "  ?></b></p>
<p align='justify' style="color: #003366;"><b>Timing</b></p>
<p align='justify'>
<ul>
<li style="color: #040000;">MON -<? echo "{$row['mon']} "  ?></li>
<li style="color: #040000;">TUE -<? echo "{$row['tue']} "  ?></li>
<li style="color: #040000;">WED -<? echo "{$row['wed']} "  ?></li>
<li style="color: #040000;">THURS-<? echo "{$row['thurs']} "  ?></li>
<li style="color: #040000;">FRI -<? echo "{$row['fri']} "  ?></li>
<li style="color: #040000;">SAT -<? echo "{$row['sat']} "  ?></li>
<li style="color: #040000;">SUN -<? echo "{$row['sun']} "  ?></li>

</ul>


</p>


</td>
</tr>
 <?
}


}

mysql_close($conn);
?>


<tr><th colspan=2 style="color: #003366;">Select date from calender----></th></tr>











</table>



      </div>




<div >




      <table summary="Summary Here" cellpadding="0" cellspacing="0">
        

<?php
$x=0;
$id =$_GET['action'];

$var3=$_POST['sel'];
?>
          <p style="color: #040000;"> Selected Date:<?echo $var3;   ?>   </p>

     <?
include('db1.php');
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = "SELECT * from leave1 where doctorid='$id'";

mysql_select_db('hms');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

while($row = mysql_fetch_array($retval, MYSQL_ASSOC))

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
          <thead>
          <tr>
            <th>Doctor Name</th>
            <th>Reason</th>
            <th>From</th>
            <th>To</th>

          </tr>
        </thead>
        <tbody>
          <tr class="light">
    <td style="color: #040000;"><? echo "{$row['docname']} "  ?></td>
            <td style="color: #040000;"><?echo "{$row['reason']} "  ?></td>
            <td style="color: #040000;"><? echo "{$row['from1']} "  ?></td>
            <td style="color: #040000;"><?echo "{$row['to1']} "  ?></td>
    </tr>
<?
}


}
if($x==0)
{
 ?>
            <p style="color: #040000;">DOCTOR IS  AVAILABLE</p>
<?}
else
{
    ?>
          <p style="color: #040000;">NOT AVAILABLE</p>

 <?}
mysql_close($conn);
?>












        </tbody>
      </table>










</div>








         </div>
    <!-- ############ -->
    <div id="right_column">
      <div class="holder">




 <div>

<h1 class="title" style="color: #003366;">Information Calender</h1>



     


<form action="available.php?action=<?php echo $id ?>" method="post">
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
     Select Date: <input type='hidden' id='sel'name="sel" onclick='dispCal()' size=10 readonly='readonly' />

        <img src='./calendar.png' onload='dispCal()' style='cursor: pointer; vertical-align: middle;' />
         <input type="submit" value="RESET"></input>
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
    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">MNNIT Hospital Unit</a></p>
    <p class="fl_right">Developed by <a href="https://www.facebook.com/manoj.k.hembram" title="Free Website Templates">Manoj Kumar Hembram</a></p>

  </div>
</div>
</body>
</html>