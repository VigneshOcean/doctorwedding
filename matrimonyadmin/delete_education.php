<?php
include("../include/connect.php");
$id=$_REQUEST['id'];
mysqli_query($con, "delete from education where id='$id'");
echo "<script type='text/javascript'>alert('Education deleted Successfully');window.location.href='view_education.php'</script>;";
?>