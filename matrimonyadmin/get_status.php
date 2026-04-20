<?php
include("../include/connect.php");
$h=$_GET['h'];
$selsql="SELECT * from register where id='$h'";
$selresult=mysqli_query($con,$selsql) or die(mysqli_error($con));
$row=mysqli_fetch_array($selresult);
$name=$row['name'];
$sts1=$row['status'];
$clientemail=$row['email']; 
$clientmobile=$row['mobile'];

if($sts1==1)
{
mysqli_query($con,"update register set status='0' where id='$h'");
}
else if($sts1==0)
{
$a=rand(100000,999999);
$b='HM';
$username=$b.$a;
$s=rand(10000,99999);	
mysqli_query($con,"update register set status='1' where id='$h'");	
mysqli_query($con,"update register set username='$username',password='$s' where id='$h'");		
echo $username;
}
?>