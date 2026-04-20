<?php

include("../include/connect.php");

$id=$_REQUEST['id'];

$pagename=$_REQUEST['pagename'];

mysqli_query($con,"delete from register where id='$id'");

echo "<script type='text/javascript'>alert('Profile deleted Successfully');window.location.href='$pagename'</script>;";

?>