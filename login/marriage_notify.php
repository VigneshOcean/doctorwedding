<?php

include("../include/connect.php");



if (!empty($_REQUEST['common_update']) && isset($_REQUEST['common_update'])) { //$a is empty because it has value 0



    $sender_id=$_REQUEST['sender_id'];

   

   $ip_addr=$_SERVER['REMOTE_ADDR'];



   mysqli_query($con,"insert into marriage_notification(sender_id, ip_addr)values('$sender_id', '$ip_addr')") or die(mysqli_error($con));

    

} else{

   $sender_id=$_REQUEST['sender_id'];

   $to_id=$_REQUEST['to_id'];

   $ip_addr=$_SERVER['REMOTE_ADDR'];



   mysqli_query($con,"insert into marriage_notification(sender_id,to_id,ip_addr)values('$sender_id','$to_id','$ip_addr')")or die(mysqli_error($con));

}

?>