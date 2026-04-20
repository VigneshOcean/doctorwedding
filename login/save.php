<?php

include("../include/connect.php");

$command=$_POST['command'];

if($command=="change_password")

{

$tab_id=$_POST['tab_id'];

$n_pass=$_POST['n_pass'];



mysqli_query($con, "update register set password='$n_pass' where id='$tab_id'");

echo "<script type='text/javascript'>alert('Password Changed!');window.location.href='change_password.php';</script>";

}

if($command=="compose")

{

$name=$_POST['name'];

$email=$_POST['email'];

$mobile=$_POST['mobile'];

$msg=$_POST['msg'];

$c_date=date('d-m-Y');



mysqli_query($con, "insert into contact(name,email,mobile,msg,c_date,private_message)values ('$name','$email','$mobile','$msg','$c_date','yes')") or die(mysqli_error());



echo "<script type='text/javascript'>alert('Message Sent successfully');window.location.href='compose.php';</script>";

}

?>