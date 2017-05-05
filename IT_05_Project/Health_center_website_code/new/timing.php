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

      <table cellspacing=10 cellpadding=10 border=1>
<tr><th style="color: #003366;">Registration/OPD Timings</th></tr>

<tr><td valign="top" colspan=2>
<p align='justify' style="color: #003366;"><b>On Working Days</b></p>
<p align='justify'>
<ul>
<li style="color: #040000;">8:00 am to 8:00 pm
</ul>
</p>
<p align='justify' style="color: #003366;"><b>On Saturday</b></p>
<p align='justify'>
<ul>
<li style="color: #040000;">9:00 am to 4:15 pm (Registration Timings)
<li style="color: #040000;">9:00 am to 5:00 pm (OPD Timings)
</ul>
</p>
<p align='justify'style="color: #003366;"><b>On Sunday/During Holidays</b></p>
<p align='justify'>
<ul>
<li style="color: #040000;">9:00 am to 2:00 pm
</ul>
</p>
</td>
</tr>

<tr><th colspan=2 style="color: #003366;">Emergency Duty Hours (Doctors)</th></tr>

<td valign="top" colspan=2>
<p align='justify' style="color: #003366;"><b>On Working Days</b></p>
<p align='justify'><ul>
<li style="color: #040000;">From 8:00 am to 2:00 pm
<li style="color: #040000;">From 2:00 pm to 8:00 pm
<li style="color: #040000;">From 8:00 pm to 8:00 am of the next day (Doctor on call)
</ul>
</p>
<p align='justify'style="color: #003366;"><b>On Saturday</b></p>
<p align='justify'><ul>
<li style="color: #040000">From 8:00 am to 5:00 pm
<li style="color: #040000;">From 5:00 pm to 8:00 pm (Doctor on call)
<li style="color: #040000;">From 8:00 pm to 8:00 am of the next day (Doctor on call)
</ul>
</p>

<p align='justify'style="color: #003366;"><b>On Sunday/During Holidays</b></p>
<p align='justify'><ul>
<li style="color: #040000;">From 8:00 am to 2:00 pm
<li style="color: #040000;">From 2:00 pm to 8:00 pm (Doctor on call)
<li style="color: #040000;">From 8:00 pm to 8:00 am of the next day (Doctor on call)
</ul>
</p>
</td>
</tr>

<tr><th colspan=2 style="color: #003366;">Specialist Appoinments</th></tr>
<td valign="top" colspan=2>
<p align='justify'>
<ul>
<li><b style="color: #040000;">Evening:</b> 5:30 pm Onwards
</ul>
</p>
</td>
</tr>

<tr><th colspan=2 style="color: #003366;">Laboratory Tests</th></tr>

<tr><td valign="top" colspan=2>
<p align='justify' style="color: #003366;"><b>In Working Days</b></p>
<p align='justify'>
<ul>
<li style="color: #040000;"><b>Morning:</b> 8.00 am to 1.00 pm
<li style="color: #040000;"><b>Afternoon:</b> 2.00 pm to 5.00 pm
</ul>
</p>
</td>
</tr>

<tr><th colspan=2 style="color: #003366;">National Holidays</th></tr>
<td valign="top" colspan=2>
<p align='justify' style="color: #003366;">Hospital OPD will remains closed on 26th January, 15th August and on 2nd October</p>
</td>
</tr>


</table>





         </div>
    <!-- ############ -->
    <div id="right_column">
      <div class="holder">




 <div>

<h1 class="title" style="color: #003366;">Doctors Available Calender</h1>


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
            <h2 class="title" style="color: #003366;">Special Info</h2>
       
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
 <p class="fl_right">Developed by <a href="https://www.facebook.com/manoj.k.hembram" title="facebook link or contact(hembrammanoj.id@gmail.com)">Manoj Kumar Hembram</a></p>
 
  </div>
</div>
</body>
</html>