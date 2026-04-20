<?php
include("../include/connect.php");
$email= $_POST["username"];
$pass = $_POST["password"]; 
//echo "SELECT * FROM signup where username='$username' and pass='$pass'";exit;
$result = mysqli_query($con,"SELECT * FROM admin where username='$email' and password='$pass'") or die(mysqli_error($con));
$row=mysqli_fetch_array($result);

$id=$row['id'];
//echo $id;exit;
$num=mysqli_num_rows($result);
if($num>0)
{
session_start();
$_SESSION['id']=$id;
header("Location:home.php");
}

else 
{
echo "<script type=text/javascript>
alert('Invalid userName or a Password')
window.location='index.php'
</script>";

}
mysqli_close($con);?>