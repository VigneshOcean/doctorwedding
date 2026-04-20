<?php
include("../include/connect.php");
$id=$_REQUEST['id'];
mysqli_query($con,"delete from register where id='$id'");

$file = 'delete.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= "Id:".$id."Deleted on:".date('Y-m-d')."\n";
// Write the contents back to the file
file_put_contents($file, $current);


echo "<script type='text/javascript'>alert('Profile deleted Successfully');window.close();</script>;";
?>