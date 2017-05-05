<?php
//include('db.php');
include('db1.php');
session_start();
{
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $sql="SELECT id FROM `login` WHERE
                         username='$user' and password='$pass'";
		$fetch=mysqli_query($conn,$sql);				 
    $count=mysqli_num_rows($fetch);
    if(mysqli_num_rows($fetch)>0)
    {
   //session_register("sessionusername");
    $_SESSION['login_username']=$user;
    header("Location:updatedata.php");
    }
    else
    {
       header('Location:index.php');
    }

}
?>
