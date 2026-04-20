<?php
include("../include/connect.php");
$userid=$_POST['userid'];
$today_date=$_POST['today_date'];
$today_valid_string=strtotime($today_date);
$valid_for=$_POST['valid_for'];
$valid_string=strtotime($valid_for);

$a=rand(100000,999999);
$b="HM";
$profile_id=$b.$a;

$rand_no=rand(100000,999999);

//echo "update register set today_date='$today_date',valid_for='$valid_for',valid_status='1' where id='$userid'";exit;
mysqli_query($con,"update register set today_date='$today_date',valid_for='$valid_for',valid_status='1',valid_string='$valid_string',wallet_validity_start='$today_date',wallet=500,wallet_validity_end='$valid_for',wallet_validity_star_string='$today_valid_string',wallet_validity_end_string='$valid_string' where id='$userid'");


$res=mysqli_query($con,"select * from register where id='$userid'");
$row=mysqli_fetch_array($res);

$username=$row['username'];	
$pass=$row['password'];	
$clientmobile=$row['mobile'];	
//$message=urlencode ("Thanks for registration with Happy Marriage Matrimony.Username:".$username." and Password: ".$pass);
$message=urlencode ("Thanks for registration with Happy Marriage Matrimony.Username:".$username." and Password: ".$pass." -HMMATR");
$curl = curl_init();
//curl_setopt($curl, CURLOPT_URL, "http://bhashsms.com/api/sendmsg.php?user=hmmatrimony&pass=success&sender=HMMATR&priority=ndnd&stype=normal&phone=".$clientmobile."&text=".$message.""); 
curl_setopt($curl, CURLOPT_URL, "http://site.ping4sms.com/api/httpapi?username=hmmatrimony&password=success&sender=HMMATR&route=2&number=".$clientmobile."&sms=".$message."&templateid=1207162823556605196");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);


//mysqli_query($con, "insert into validity_history('user_id','valid_from','valid_to')values('$userid','$today_date','$valid_for')")or die(mysqli_error($con));


mysqli_query($con,"INSERT INTO `validity_history` (
`user_id` ,
`valid_from` ,
`valid_to`
)
VALUES (
'$userid','$today_date','$valid_for'
)")or die(mysqli_error());

echo "<script type='text/javascript'>window.close();</script>";

?>