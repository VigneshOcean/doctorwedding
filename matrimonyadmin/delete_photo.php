<?php
include("../include/connect.php");
$userid=$_REQUEST['userid'];
$photo_name=$_REQUEST['photo_name'];
$photo_no=$_REQUEST['photo_no'];
$picture2='../profile/';
$picture=$picture2.$photo_name;
unlink($picture);
if($photo_no==1)
{
mysqli_query($con,"update register set uploadedfile='' where id='$userid' ")or die(mysqli_error());
}
if($photo_no==2)
{
mysqli_query($con,"update register set second_upload='' where id='$userid' ")or die(mysqli_error());
}

echo "<script type='text/javascript'>alert('Profile Picture deleted');window.location='edit.php?userid=$userid';</script>";
?>