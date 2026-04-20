<?php

include("../include/connect.php");

$userid=$_REQUEST['userid'];

$photo_name=$_REQUEST['photo_name'];

$picture2='../matrimonyadmin/horo/';

$picture=$picture2.$photo_name;

unlink($picture);

mysqli_query($con, "update register set horo='' where id='$userid'");

echo "<script type='text/javascript'>alert('Horoscope deleted');window.location='edit.php';</script>";

?>