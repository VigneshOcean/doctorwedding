<?php
include("../include/connect.php");
session_start();
$id=$_SESSION['id'];
$REMOTE_ADDR=$_SERVER['REMOTE_ADDR'];
if(!isset($_SESSION['id']))
{
echo "<script type=text/javascript>window.location='index.php?err';</script>";
}
else
{
$h=$_GET['h'];

$res1=mysqli_query($con,"select * from register where id='$id'");
$row1=mysqli_fetch_array($res1);
$sendername=$row1['name'];	
$username=$row1['username'];

$res=mysqli_query($con,"select * from register where id='$h'"); 
$row=mysqli_fetch_array($res);

$name=$row['name'];	
$clientmobile=$row['mobile'];	
//$message=urlencode ("Mr/Miss ".$name.",Your profile has been liked by ".$sendername."(".$username.")-hmmatrimony.com only for adidravidar.Contact:9171113312");
$message=urlencode ("Mr/Miss ".$name.",Your profile has been liked by ".$sendername."(".$username.")-hmmatrimony.com only for adidravidar.Contact:9171113312 -HMMATR");

$curl = curl_init();
//curl_setopt($curl, CURLOPT_URL, "http://bhashsms.com/api/sendmsg.php?user=hmmatrimony&pass=success&sender=HMMATR&priority=ndnd&stype=normal&phone=".$clientmobile."&text=".$message.""); 
curl_setopt($curl, CURLOPT_URL, "http://site.ping4sms.com/api/httpapi?username=hmmatrimony&password=success&sender=HMMATR&route=2&number=".$clientmobile."&sms=".$message."&templateid=1207162823550804186"); 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);


$c_date=date('Y-m-d');
date_default_timezone_set('Asia/Kolkata');
$date = new DateTime();
$c_time=$date->format( 'H:i:s A' );
mysqli_query($con,"insert into likes(sender_id,to_id,c_date,c_time,ip_add)values('$id','$h','$c_date','$c_time','$REMOTE_ADDR')");

}
?>