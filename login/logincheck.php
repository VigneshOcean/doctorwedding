<?php
include("../include/connect.php");
if(isset($_POST["username"]))
{
$email= $_POST["username"];
$pass = $_POST["password"]; 
if($email=='' || $pass=='')
{
    echo "<script type=text/javascript>
    alert('Invalid userName or Password')
    window.location='../index.php'
    </script>";
}

//echo "SELECT * FROM signup where username='$username' and pass='$pass'";exit;
$result = mysqli_query($con,"SELECT * FROM register where username='$email' and password='$pass'");
$row=mysqli_fetch_array($result);
$id=$row['id'];
//echo $id;exit;
$num=mysqli_num_rows($result);
if($num>0)
{
session_start();
$_SESSION['id']=$id;
date_default_timezone_set('Asia/Kolkata');
$current_date=date('Y-m-d H:i:s');
mysqli_query($con,"update register set last_login='".$current_date."',login_status='1' where id='$id'");
header("Location:dashboard.php");
}
else 
{
echo "<script type=text/javascript>
alert('Invalid userName or Password')
window.location='../index.php'
</script>";
}
}
else
{
    echo "<script type=text/javascript>
    alert('Invalid userName or Password')
    window.location='../index.php'
    </script>";
}
mysqli_close($con);
?>