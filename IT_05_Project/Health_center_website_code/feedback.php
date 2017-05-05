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


    </div>

  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div id="topnav">
  <?php
include('db1.php');
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
      <h1 class="title" style="color: #003366;">FEEDBACK</h1>
      <div id="post" style="cursor:pointer;color:blue;" align="center" onclick="post()"><Button type="button" style="cursor:pointer;">Post Your Comment</button></div>


<div id="comment" style="display:none;">
<form action="feedbackconform.php" method="POST">

<p style="color: #040000;">Your name: <br>
<input type="text" required="required" name="name" width="30"><br>
<br>

Your email: <br>
<input type="email" required="required" name="email"><br>
<br>

Your comments: <br>
<textarea name="comment"  required="required" rows="10" cols="50"></textarea><br><br>

<input type="submit" value="Submit">

</form>

       </div></br>
<div id="feed">
<?php
include('db1.php');
error_reporting(0);
$sql="select * from feedback ORDER BY date DESC";
$result=mysqli_query($conn,$sql);
session_start();
if($result){
$count=mysqli_num_rows($result);
while($row=mysqli_fetch_row($result))
{
echo "<div style='background-color: #ffffff;border-radius:10px;'><div style='display: inline;
float: left;
padding: 20px;
width: 100%;'>";
echo "<h2 style='color: #3e3e3e;
font-size: 18px;
padding-bottom: 0;
background-color : transparent;'>";
echo $row[1];echo "</h2>";
echo "<p style='font-size:10px;'>Posted on <span style='color:#906969;'>";
echo $row[6];
echo "</span></p></div>";
echo "<p style='margin-left:20px;font-size:14px;'>";
echo $row[3];
echo "</p></br></div>";
echo '
<div style="margin-top:10px;margin-left:20px;font-size:10px;"><a style="cursor:pointer" id="a'.$count.'" onclick="comment('.$count.')">';echo $row[5];echo ' Comments</a>
&nbsp;&nbsp;&nbsp;&nbsp;<a style="cursor:pointer" onclick="like('.$count.')">';echo $row[4];echo ' Likes</a></div>
                    ';
if(isset($_SESSION['login_username']))
{
echo '<div id="'.$count.'" style="display:none;float:left;margin:20px;"><form method="post" action="post_comment.php?q='.$count.'"><input name="commenttxt'.$count.'" placeholder="Type your comment" size="60%" style="border-radius:5px;height:20px;" ></form></div></br></br></br></br>';
}
$com=mysqli_query($conn,"select * from threaded_comments where parent_id='$count' ORDER BY created_at DESC");
echo '
<div id="c'.$count.'" style="margin-top:10px;margin-left:20px;font-size:10px;display:none;">';
while($row1=mysqli_fetch_row($com))
{
echo "<div style='background-color: #ffffff;border-radius:10px;'><div style='display: inline;
float: left;
padding: 20px;
width: 100%;'>";
echo "<p style='font-size:10px;'>Posted by <a style='color:blue;background-color : transparent;'>";
echo $row1[1];echo "</a> on <span style='color:#906969;'>";
echo $row1[3];
echo "</span></p></div>";
echo "<p style='margin-left:20px;font-size:14px;'>";
echo $row1[2];
echo "</p></br></div>";
}
echo '</div>';

$count--;
}
}

?>
</div>

</div>
<script>
function like(e)
{
window.location.href = "like.php?q="+e;
}
function post()
{
document.getElementById("comment").style.display="block";
}
function comment(e)
{
var str="c";
var str2=str.concat(e);
document.getElementById(str2).style.display="block";
document.getElementById(e).style.display="block";
}
</script>
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

  <p class="fl_right">Developed by  Web Administrator</p>

  </div>
</div>
</body>
</html>
