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
<body >

<!-- ####################################################################################################### -->

    <ul>
      <li><a href="home.php">Homepage</a></li>
      <li><a href="people.php">People</a></li>
      <li><a href="dutychart.php">Duty Chart</a></li>
      <li><a href="">Facilities</a>
        <ul>
          <li><a href="physiotherapy.php">Physiotherapy Cell</a></li>
          <li><a href="dental.php">Dental Cell</a></li>
          <li><a href="pathology.php">Pathology Cell</a></li>
        </ul>
      </li>
       <li ><a href="feedback.php">Feedback</a></li>
      <li class="last"><a href="member.php">Member Area</a></li>
    </ul>
    <div  class="clear"></div>
 
<!-- ####################################################################################################### -->

    <!-- ####################################################################################################### -->


       

    <!-- ############ -->

</body>
</html>