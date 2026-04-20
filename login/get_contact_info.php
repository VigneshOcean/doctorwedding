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
$profileid=$_GET['profileid'];
$cost=$_GET['cost'];

$res1=mysqli_query($con,"select * from register where id='$id'");
$row1=mysqli_fetch_array($res1);
$sendername=$row1['name'];	
$username=$row1['username'];
$wallet =$row1['wallet'];
$balance = ($wallet-$cost);
$res=mysqli_query($con,"select * from register where id='$profileid'"); 
$row=mysqli_fetch_array($res);
$name=$row['name'];	
$clientmobile=$row['mobile'];	
/*$message=urlencode ("Mr/Miss ".$name.",Your profile has been liked by ".$sendername."(".$username.")-hmmatrimony.com only for adidravidar.Contact:9171113312 -HMMATR");
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://site.ping4sms.com/api/httpapi?username=hmmatrimony&password=success&sender=HMMATR&route=2&number=".$clientmobile."&sms=".$message."&templateid=1207162823550804186"); 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);*/

$c_date=date('Y-m-d');
$m_date = date("Y-m-d", strtotime(" +1 months"));
date_default_timezone_set('Asia/Kolkata');
$date = new DateTime();
$c_time=$date->format( 'H:i:s A' );
 $s = mysqli_query($con,"insert into getcontact_history(sender_id,to_id,c_date,c_time,ip_add,cost,valid_from,valid_to)values('$id','$profileid','$c_date','$c_time','$REMOTE_ADDR','$cost','$c_date','$m_date')");
if($s){ 
    $s = mysqli_query($con,"UPDATE `register` SET `wallet`='$balance' where id='$id'");
    
}
}
?>