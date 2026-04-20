<?php error_reporting(0);
ini_set('display_errors', 0);
include("../include/connect.php");  
$userid=$_POST['userid'];
$wallet=$_POST['wallet_amount'];
$wallet_validity_start=$_POST['wallet_validity_start'];
$wallet_validity_end =$_POST['wallet_validity_end'];

$wallet_validity_star_string=strtotime($wallet_validity_start);
	$wallet_validity_end_string	=strtotime($wallet_validity_end);

// print_r($_POST); die;


$res=mysqli_query($con,"select * from register where id='$userid'");
$row=mysqli_fetch_array($res);

$username=$row['username'];	
$pass=$row['password'];	
$clientmobile=$row['mobile'];	
$current_wallet=($row['wallet']+$wallet);

 mysqli_query($con,"update register set wallet='$wallet',wallet_validity_start='$wallet_validity_start',wallet_validity_end='$wallet_validity_end',wallet_validity_star_string='$wallet_validity_star_string',wallet_validity_end_string='$wallet_validity_end_string' where id='$userid'");




/*
$message=urlencode ("Thanks for registration with Happy Marriage Matrimony.Username:".$username." and Password: ".$pass." -HMMATR");
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://site.ping4sms.com/api/httpapi?username=hmmatrimony&password=success&sender=HMMATR&route=2&number=".$clientmobile."&sms=".$message."&templateid=1207162823556605196");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
*/

//mysqli_query($con, "insert into validity_history('user_id','valid_from','valid_to')values('$userid','$today_date','$valid_for')")or die(mysqli_error($con));


$ud = mysqli_query($con,"INSERT INTO `wallet_history` (
`user_id` ,
`amount`,`valid_from`,`valid_to`)
VALUES (
'$userid','$wallet' ,'$wallet_validity_start','$wallet_validity_end'
)")or die(mysqli_error());

echo "<script type='text/javascript'>window.close();</script>";

?>