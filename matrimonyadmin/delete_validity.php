<?php
include("../include/connect.php");
$userid=$_REQUEST['userid'];
mysqli_query($con,"update register set today_date='',valid_for='',valid_status='',valid_string='' where id='$userid'");
echo "<script type='text/javascript'>alert('Validity deleted Successfully');window.close();</script>;";
?>