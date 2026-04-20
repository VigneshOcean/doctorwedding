<?php
include("../include/connect.php");
$userid=$_POST['userid'];
$today_date=$_POST['today_date'];
$marriage_status=$_POST['marriage_status'];


mysqli_query($con,"update register set enquiry_date='$today_date',enquiry_status='$marriage_status' where id='$userid'")or die(mysqli_error($con));



echo "<script type='text/javascript'>window.close();</script>";

?>