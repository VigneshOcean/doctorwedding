<?php

include("../include/connect.php");

session_start();

$id=$_SESSION['id'];

if(!isset($_SESSION['id']))

{

echo "<script type=text/javascript>window.location='index.php?err';</script>";

}

else

{

$c_pass=$_GET['q'];

$result2=mysqli_query($con, "select * from admin where password='$c_pass' AND id='$id'") or die(mysqli_error());

$count=mysqli_num_rows($result2);

if($count=='0')

{

echo "Password Incorrect";

}

if($count=='1')

{

echo "";

}





}

?>