<?php
//include('db.php');
include('db1.php');
$tbl_name="feedback"; // Table name

// Connect to server and select database.


// Get values from form
$name=$_POST["name"];
$email=$_POST["email"];
$comment=$_POST["comment"];


// Insert data into mysql
$sql="INSERT INTO $tbl_name(name, email, comment)VALUES('$name', '$email', '$comment')";
$result=mysqli_query($conn,$sql);

// if successfully insert data into database, displays message "Successful".
if($result){
header("location:feedback.php");
}

else {
echo "ERROR";
}
?>

<?php
// close connection
mysqli_close();

?>

