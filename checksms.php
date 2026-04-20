<?php
if (! function_exists ( 'curl_version' )) {
    exit ( "Enable cURL in PHP" );
}
$message=urlencode ("Happy Marriage Matrimony.Your OTP is :55555 Kindly use : www.doctorwedding.com -HMMATR");

// Happy Marriage Matrimony.Your OTP is :{#var#} Kindly use : www.doctorwedding.com -HMMATR
$ch = curl_init ();
$timeout = 0; // 100; // set to zero for no timeout
//$myHITurl = "http://bhashsms.com/api/sendmsg.php?user=doctorwedding&pass=success&sender=HMMATR&priority=ndnd&stype=normal&phone=9788180320&text=".$message."";

//$myHITurl = "http://site.ping4sms.com/api/smsapi?key=cfe45240139e9205fe3c0f7932499342&route=2&sender=HMMATR&number=9677949101&sms=".$message."&templateid=1201159869405227230";
$myHITurl = "http://site.ping4sms.com/api/httpapi?username=doctorwedding&password=success&sender=HMMATR&route=2&number=9677949101&sms=".$message."&templateid=1207162823560830391";
http://site.ping4sms.com/api/httpapi?username=doctorwedding&password=success&sender=HMMATR&route=2&number=8667863881&sms=sms&templateid=templateid
//           http://site.ping4sms.com/api/smsapi?key=Account key&route=Route&sender=Sender id&number=Number(s)&sms=Message&templateid=DLT_Templateid

//$myHITurl = "http://site.ping4sms.com/api/dlrapi?key=cfe45240139e9205fe3c0f7932499342&messageid=47044613";


curl_setopt ( $ch, CURLOPT_URL, $myHITurl );
curl_setopt ( $ch, CURLOPT_HEADER, 0 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
$file_contents = curl_exec ( $ch );
if (curl_errno ( $ch )) {
    echo curl_error ( $ch );
    curl_close ( $ch );
    exit ();
}
curl_close ( $ch );
// dump output of api if you want during test
echo "$file_contents";
?>