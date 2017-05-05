<?php
 //database configuration
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'newhc';
    
    //connect with the database
	$conn=mysqli_connect("localhost","root","") or die("unable to connect");
	$db=mysqli_select_db($conn,"newhc");
    //$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
?>
