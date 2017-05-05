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
      <h1 class="title" style="color: #003366;">INSTITUTE HEALTH CENTER</h1>

      <table cellspacing=10 cellpadding=10 border=1>
<tr><th style="color: #003366;">DENTAL SURGEON</th></tr>

<tr><td valign="top" colspan=2>
<p align='justify' style="color: #003366;"><b>Dr. Puneet Upadhyay</b></p>
<p align='justify' style="color: #003366;"><b>Timing</b></p>
<p align='justify'>
<ul>
<li style="color: #040000;">MON -2:00pm to 4:00 pm</li>
<li style="color: #040000;">TUE -2:00pm to 4:00 pm</li>
<li style="color: #040000;">WED -2:00pm to 4:00 pm</li>
<li style="color: #040000;">THURS -2:00pm to 4:00 pm</li>
<li style="color: #040000;">FRI -2:00pm to 4:00 pm</li>
<li style="color: #040000;">SUN -9:00am to 11:00 am</li>
</ul>
</p>
<p align='justify' style="color: #003366;"><b>Dr. Nadeem Javed</b></p>
<p align='justify' style="color: #003366;"><b>Timing</b></p>
<p align='justify'>
<ul>
<li style="color: #040000;">MON -4:00pm to 6:00 pm</li>
<li style="color: #040000;">TUE -4:00pm to 6:00 pm</li>
<li style="color: #040000;">WED -4:00pm to 6:00 pm</li>
<li style="color: #040000;">THURS -4:00pm to 6:00 pm</li>
<li style="color: #040000;">FRI -4:00pm to 6:00 pm</li>
<li style="color: #040000;">SAT -9:00am to 11:00 am</li>
</ul>
</p>


</td>
</tr>

<tr><th colspan=2 style="color: #003366;">TREATMENT FACILITY AVAILABLE</th></tr>

<td valign="top" colspan=2>
<p align='justify' style="color: #003366;"><b>On Working Days</b></p>
<p align='justify'><ul>
<li style="color: #040000;">SCALING</li>
<li style="color: #040000;">X-RAY</li>
<li style="color: #040000;">Composite Filling</li>
<li style="color: #040000;">Normal Extraction</li>
</ul>
</p>



</td>









</table>





         </div>
    <!-- ############ -->
    <div id="right_column">
      <div class="holder">




 <div>

<h1 class="title" style="color: #003366;">DOCTORS AVAILABILITY CALENDER</h1>


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
    <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="#">MNNIT Hospital Unit</a></p>
   <p class="fl_right"> <a title="Contact(ak@mnnit.ac.in)">Web Administrator</a></p>
 
  </div>
</div>
</body>
</html>
