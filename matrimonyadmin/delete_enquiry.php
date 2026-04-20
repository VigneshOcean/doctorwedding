<?php

include("../include/connect.php");

$id=$_REQUEST['id'];

$comm=$_REQUEST['comm'];

mysqli_query($con, "delete from contact where id='$id'");

if($comm=='comman')

{

echo "<script type='text/javascript'>alert('Enquiry deleted Successfully');window.location.href='inbox_comman.php'</script>;";

}

if($comm=='private')

{

echo "<script type='text/javascript'>alert('Enquiry deleted Successfully');window.location.href='inbox_private.php'</script>;";

}

?>