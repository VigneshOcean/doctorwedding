<?php
include("include/connect.php");
ini_set('upload_max_filesize', '20M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 900);

$a=mysqli_query($con,"select * from register where valid_string!=''")or die(mysqli_error());
while($row_a=mysqli_fetch_array($a))
{
$userid=$row_a['id'];
$today_date=$row_a['today_date'];
$valid_for=$row_a['valid_for'];
mysqli_query($con,"INSERT INTO `validity_history` (
`user_id` ,
`valid_from` ,
`valid_to`
)
VALUES (
'$userid','$today_date','$valid_for'
)")or die(mysqli_error());




}
?>