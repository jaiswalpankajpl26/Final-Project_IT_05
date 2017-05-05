<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>MNNIT Hospital Unit</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css"


    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">



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
    windows.open("light.php?action=<?php $row['slno']  ?>");
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

  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>


<style type="text/css">
    body
    {
        font-family: arial;
    }

    th,td
    {
        margin: 0;
        text-align: center;
        border-collapse: collapse;
        outline: 1px solid #e3e3e3;
    }

    td
    {
        padding: 5px 10px;
        color:black;
    }

    th
    {
        background: #003366;
        color: white;
        padding: 5px 10px;
    }

    td:hover
    {
        cursor: pointer;
        background: #003366;
        color: white;
    }
    </style>

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
include('ulink.php');
?>
    <div  class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row4">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->






     <table width="80%" align="center" >
    <div id="head_nav">
    <tr>
        <th>Slno</th>
        <th>Name</th>
        <th>Speciality</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thrusday</th>
        <th>Friday</th>
        <th>Saturday</th>
        <th>Sunday</th>
        <th>Availability</th>
    </tr>
</div>

    <tr>

         <?php

include('db1.php');
//include('db.php');



$sql = 'SELECT * from dutychart';

//mysql_select_db('hospital1');
$retval = mysqli_query($conn, $sql );
if(! $retval )
{
  die('Could not get data: ' . mysqli_error($conn));
}

while($row = mysqli_fetch_array($retval))

{


{
    ?>


        <td><?= $row['slno']  ?></td>

            <td><?= $row['name']  ?></td>
            <td><?= $row['spel'] ?></td>
            <td><?= $row['mon']  ?></td>
            <td title="No Class" class="Holiday"> <?= $row['tue']  ?></td>
            <td><?= $row['wed']?></td>
            <td><?= $row['thu'] ?></td>
            <td><?= $row['fri'] ?></td>
            <td><?= $row['sat']  ?></td>
            <td><?= $row['sun']  ?></td>


             <td><a href="available.php?action=<?= $row['slno']; ?> "> details</a></td>
            <div id="light">




    </tr>



   <?php
}


}

mysqli_close($conn);
?>

</table>

    <!-- ####################################################################################################### -->
    <div class="clear"></div>
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
