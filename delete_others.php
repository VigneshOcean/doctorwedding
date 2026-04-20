<?php
include("include/connect.php");
ini_set('upload_max_filesize', '20M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 900);
$a=mysqli_query($con,"select * from register where religion NOT IN ('27','15','21','20')");
$count_a=mysqli_num_rows($a);
if($count_a>0)
{
while($row_a=mysqli_fetch_array($a))
{
$u_id=$row_a['id'];
$uploadedfile=$row_a['uploadedfile'];
$horo=$row_a['horo'];
if($uploadedfile!='')
{
$picture2='profile/';
$picture=$picture2.$uploadedfile;
unlink($picture);
}
if($horo!='')
{
$picture12='admin/horo/';
$picture124=$picture12.$horo;
unlink($picture124);
}
mysqli_query($con,"delete from register where id='$u_id'");

}
}
?>