<?php 
include("include/connect.php");
if(isset($_REQUEST['plan_id']))
{
$plan_id=$_REQUEST['plan_id'];
$plan=mysqli_query($con, "select * from plans where id=$plan_id");
$count_plan=mysqli_num_rows($plan);
	if($count_plan==0)
	{
	?>
	<script type="text/javascript">
	alert('unknown plan,please click on proper plan');
	window.location='index.php';
	</script>
	<?php
	}
	else
	{
		$row_plan=mysqli_fetch_array($plan);
		 $amount_plan=$row_plan['amount'];
		$name_plan=$row_plan['name']; 
	}
}
else
{
?>
<script type="text/javascript">
alert('unknown plan,please click on proper plan');
window.location='index.php';
</script>
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:41a13bc74d8d7f9cef5d2192fabf7f86",
                  "X-Auth-Token:99b6d23fc7794b5a971b24da9c3f4918"));
$payload = Array(
    'purpose' => $amount_plan ?? 0,
    'amount' => $amount_plan ?? 0,
    'phone' => '9999999999',
    'buyer_name' => $name_plan ?? 'Unknown',
    'redirect_url' => 'http://www.example.com/redirect/',
    'send_email' => true,
    'webhook' => 'http://www.example.com/webhook/',
    'send_sms' => true,
    'email' => 'foo@example.com',
    'allow_repeated_payments' => false
);
$response = curl_exec($ch);
curl_close($ch); 
echo $response;
?>
<?php } ?>