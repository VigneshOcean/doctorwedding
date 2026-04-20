<?php

include("../include/connect.php");

$id=$_REQUEST['id'];

mysqli_query($con,"delete from caste where id='$id'");

echo "<script type='text/javascript'>alert('Caste deleted Successfully');window.location.href='view_caste.php'</script>;";

?>