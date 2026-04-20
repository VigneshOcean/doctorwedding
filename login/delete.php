<?php

include("../include/connect.php");

$com=$_REQUEST['com'];

if($com=='likes')

{

$delid=$_REQUEST['delid'];

mysqli_query($con, "delete from likes  where id='$delid'");

echo "<script type='text/javascript'>alert('Like details deleted');window.location='likes.php';</script>";

}

?>