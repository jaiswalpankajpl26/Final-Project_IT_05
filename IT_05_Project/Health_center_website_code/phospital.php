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
     <?php
include('link.php');
?>
    </div>
    <!-- ############ -->
    <div id="content">
      <h1 class="title" style="color: #003366;"> Institute health center</h1>
      <div class="imgholder"><img src="images/demo/h.jpg" alt="" /></div>

<table cellspacing=10 cellpadding=10 border=1>

<tr><th style="color: #003366;">List of Private Hospials (On Reimbursement Basis)</th></tr>


<tr><td valign="top" colspan=2>
<p align='justify' style="color: #003366;"><b>NAZRETH HOSPITAL</b></p>
<p align='justify' style="color: #003366;"><b>ADDRESS</b></p>
<p align='justify'>
<ul>
<p  style="color: #040000;">13-A, K. N. ROAD,<br>
ALLAHABAD-211001.</p>


</ul>
</p>

<p align='justify' style="color: #003366;"><b>KAMLA NEHRU HOSPITAL</b></p>
<p align='justify' style="color: #003366;"><b>ADDRESS</b></p>
<p align='justify'>
<ul>
<p  style="color: #040000;">TAGORE TOWN,<br>
ALLAHABAD-211002.</p>


</ul>
</p>
</tr>
<tr><th style="color: #003366;">CASHLESS</th></tr>
<tr><td valign="top" colspan=2>
<p align='justify' style="color: #003366;"><b>JEEVAN JYOTI HOSPITAL</b></p>
<p align='justify' style="color: #003366;"><b>ADDRESS</b></p>
<p align='justify'>
<ul>
<p  style="color: #040000;">162, BAI KA BAGH, LOWTHER ROAD,<br>
ALLAHABAD-211003,</br>
PH-0532-2414748, 2417252.</p>

</ul>
</p>

<p align='justify' style="color: #003366;"><b>SAKET MATERNITY & NURSING HOME PVT. LTD.</b></p>
<p align='justify' style="color: #003366;"><b>ADDRESS</b></p>
<p align='justify'>
<ul>
<p  style="color: #040000;">1203, BHS, KIDWAI NAGAR,ALLAHPUR,<br>
ALLAHABAD-211006,<br>
PH-0532-2505252, 2500425.</p>

</ul>
</p>

<p align='justify' style="color: #003366;"><b>Dr N.D.TAHILIANI MEMORIAL CLINIC</b></p>
<p align='justify' style="color: #003366;"><b>ADDRESS</b></p>
<p align='justify'>
<ul>
<p  style="color: #040000;">22,NAYAYA MARG,<br>
ALLAHABAD-211001<br>
PH-0532-2424544.</p>

</ul>
</p>

<p align='justify' style="color: #003366;"><b>VATSALYA MATERNITY & SURGICAL CENTRE</b></p>
<p align='justify' style="color: #003366;"><b>ADDRESS</b></p>
<p align='justify'>
<ul>
<p  style="color: #040000;">6/8, ELGIN ROAD, CIVIL LINES,<br>
ALLAHABAD-211001,<br>
PH-0532-2407500, 2407540.</p>
</li>

</ul>
</p>

<p align='justify' style="color: #003366;"><b>YASHLOK HOSPITAL & RESEARCH CENTRE</b></p>
<p align='justify' style="color: #003366;"><b>ADDRESS</b></p>
<p align='justify'>
<ul>
<p  style="color: #040000;">43A/31A, HASHIMPUR ROAD,<br>
ALLAHABAD-211002,</br>
PH-0532-2467258, 2465655.</p>

</ul>
</p>







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
        </div >



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
