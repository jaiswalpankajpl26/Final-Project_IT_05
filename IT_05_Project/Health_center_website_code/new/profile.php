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


<?php
include("session.php");
?>






</head>
<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">

         <h1><img src="m.jpg" width="950"height="140"alt="" /></h1>
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
    <ul>
     
        <li><a href="updatedata.php">Updata Data</a></li>
    </ul>
    <div  class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row4">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->
    <div id="left_column">
      <div class="holder">
        <h2 class="title">Hospital Services</h2>
        <ul class="nostart">


        </ul>
      </div>
      <div class="holder">
        <h2 class="title">Recognised Hospitals</h2>
        <ul class="nostart">
        



        </ul>
      </div>
    </div>
    <!-- ############ -->
    <div id="content">
      <h1 class="title">MNNIT Hospital</h1>
      <div class="imgholder"><img src="images/demo/440x215.gif" alt="" /></div>

      <p>

          The multifarious medical needs of the Campus population consisting of Students, Staff members and members of their families are met by the Institute Hospital. The Hospital is headed by the Head (Hospital Services) with a team of full time Medical Officers, Visiting Specialists and Para Medical staff. The Director has also constituted a Hospital Advisory Committee with a Chairman nominated by him and members drawn from hospital and other recognized bodies of the Institute including student representatives, with the Head (Hospital Services) as the Member Secretary of the Committee. This Committee formulates various policies for providing medical facilities to the Campus population.

      </p>



       </div>
    <!-- ############ -->
    <div id="right_column">
      <div class="holder">




 <div>

<h1 class="title">Information Calender</h1>


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
        <h2 class="title">Latest News</h2>
        <div height="40">




<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'manoj';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = 'SELECT * from news';

mysql_select_db('hms');
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



        </div>


      </div>
        <div class="holder">
        <h2 class="title">Special Imformation</h2>
       

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
  </div>
</div>
</body>
</html>