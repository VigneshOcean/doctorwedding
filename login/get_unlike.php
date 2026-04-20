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

$h=$_GET['h'];

mysqli_query($con,"delete from likes where sender_id='$id' and to_id='$h'");

}

?>