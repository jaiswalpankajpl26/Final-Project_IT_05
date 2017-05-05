<?php

//Fetching Values from URL  
$name2 = $_POST['name1'];
$email2 = $_POST['email1'];
$password2 = $_POST['password1'];
$contact2 = $_POST['contact1'];
// Establishing connection with server..
$connection = mysql_connect("localhost", "root", "");
// Selecting Database 
$db = mysql_select_db("mydba", $connection);
if (isset($_POST['name1'])) {
//Insert query 
    $query = mysql_query("insert into form_element(name, email, password, contact) values ('$name2', '$email2', '$password2','$contact2')");
    echo "Form Submitted succesfully";
}
//connection closed
mysql_close($connection);
?>