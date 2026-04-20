<?php

include("../include/connect.php");

$status=$_REQUEST['status'];

$unique_id=$_REQUEST['unique_id'];

if($status=='like')

{

mysqli_query($con,"update likes set send_interest='yes' where id='$unique_id'")or die(mysqli_error($con));

}

else

{

mysqli_query($con,"update likes set send_interest='' where id='$unique_id'")or die(mysqli_error($con));

}

?>