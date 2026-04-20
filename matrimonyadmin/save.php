<?php
include("../include/connect.php");
$command=$_POST['command'];
if($command=="change_psw")
{
    $c_pass=$_POST['c_pass'];	
	$n_pass=$_POST['n_pass'];
	$user_id=$_POST['user_id'];
	mysqli_query($con,"update admin set password='$n_pass' where id='$user_id' and password='$c_pass'");
	echo "<script type='text/javascript'>alert('Your password Changed Successfully');window.location.href='change_pass.php';</script>";
}
else if($command=="change_password")
{
$tab_id=$_POST['tab_id'];
$n_pass=$_POST['n_pass'];
mysqli_query($con,"update admin set password='$n_pass' where id='$tab_id'");
echo "<script type='text/javascript'>alert('Password Changed!');window.location.href='change_password.php';</script>";
}
else if($command=="news")
{
    //echo $command; exit;
    $news_heading=mysqli_real_escape_string($con, $_POST['news_heading']);	
	$descrip=mysqli_real_escape_string($con, $_POST['descrip']);
	$news_id=$_POST['news_id'];
	$aa=mysqli_query($con,"select * from news where id='$news_id'") or die(mysqli_error($con));
	$count_aa=mysqli_num_rows($aa);
	if($count_aa>0)
	{
		mysqli_query($con,"update news set news_heading='$news_heading',descrip='$descrip' where id='$news_id'") or die(mysqli_error($con));
	}
	else
	{
	mysqli_query($con, "insert into news (news_heading,descrip) values('$news_heading','$descrip')") or die(mysqli_error($con));	
	}
	
	echo "<script type='text/javascript'>alert('News and Events updated Successfully');window.location.href='news.php';</script>";
}
elseif($command=="education")
{
        $education=$_POST['education'];	   $cost=$_POST['cost'];
	mysqli_query($con, "insert into education(education,cost) values('$education','$cost')");
	echo "<script type='text/javascript'>alert('Education Added Successfully');window.location.href='view_education.php';</script>";
}
elseif($command=="edit_education")
{
        $education=$_POST['education'];	   $cost=$_POST['cost'];
	$c_id=$_POST['c_id'];	
	mysqli_query($con, "update education set education='$education',cost='$cost' where id='$c_id'");
	echo "<script type='text/javascript'>alert('Education Name Edited Successfully');window.location.href='view_education.php';</script>";
}
else if($command=="horo")
{
$random_no=rand(10000000,99999999);
$userid=$_POST['userid'];
$file=$_FILES['image']['name'];
	if(!empty($file))
	{	
	$target_path = "horo/";
	$uploaded_files=$random_no."_".$_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], $target_path .$random_no."_".$_FILES['image']['name']);
	}
//echo "update register set horo='$uploaded_files' where id='$userid'";exit;
mysqli_query($con, "update register set horo='$uploaded_files' where id='$userid'");
	echo "<script type='text/javascript'>alert('Horoscope Uploaded Successfully');window.location.href='home.php';</script>";
}
elseif($command=="caste")
{
    $caste=$_POST['caste'];	
	mysqli_query($con, "insert into caste (caste) values('$caste')");
	echo "<script type='text/javascript'>alert('Caste Added Successfully');window.location.href='view_caste.php';</script>";
}
elseif($command=="edit_caste")
{
    $caste=$_POST['caste'];	
	$c_id=$_POST['c_id'];	
	mysqli_query($con, "update caste set caste='$caste' where id='$c_id'");
	echo "<script type='text/javascript'>alert('Caste Name Edited Successfully');window.location.href='view_caste.php';</script>";
}
elseif($command=="subcaste")
{
    $caste=$_POST['caste'];	
	 $subcaste=$_POST['subcaste'];	
	mysqli_query($con, "insert into subcaste (caste,subcaste) values('$caste','$subcaste')");
	echo "<script type='text/javascript'>alert('Sub-Caste Added Successfully');window.location.href='view_subcaste.php';</script>";
}
elseif($command=="edit_subcaste")
{
    $caste=$_POST['caste'];	
	 $subcaste=$_POST['subcaste'];
	 	$c_id=$_POST['c_id'];		
		mysqli_query($con, "update subcaste set caste='$caste',subcaste='$subcaste' where id='$c_id'");
	echo "<script type='text/javascript'>alert('Sub-Caste Name Edited Successfully');window.location.href='view_subcaste.php';</script>";
}
elseif($command=="education")
{
    $education=$_POST['education'];	
	mysqli_query($con, "insert into education (education) values('$education')");
	echo "<script type='text/javascript'>alert('Education Details Added Successfully');window.location.href='add_education.php';</script>";
}
elseif($command=="compose")
{
    $caste=mysqli_real_escape_string($con, $_POST['caste']);	
	$subject=mysqli_real_escape_string($con, $_POST['subject']);	
	$message=mysqli_real_escape_string($con, $_POST['message']);	
	mysqli_query($con, "insert into message (caste,subject,message) values('$caste','$subject','$message')");
	echo "<script type='text/javascript'>alert('Message Sent');window.location.href='compose_message.php';</script>";
}
?>