<?php

include("../include/connect.php");

$userid=$_REQUEST['userid'];

$photo_name=$_REQUEST['photo_name'];

$picture2='../profile/';

$picture=$picture2.$photo_name;

unlink($picture);

mysqli_query($con, "update register set uploadedfile='' where id='$userid'");

echo "<script type='text/javascript'>alert('Profile Picture deleted');window.location='edit.php';</script>";

?>