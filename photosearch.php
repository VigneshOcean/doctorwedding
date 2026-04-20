<?php
include('include/connect.php');


$a=mysqli_query($con, "select * from register");
while($row_a=mysqli_fetch_array($a))
{
	$username=$row_a['username'];
        $id=$row_a['id'];
	$profile_pics=$row_a['uploadedfile'];

	if($profile_pics!='')
	{
		
		$filename = 'profile/'.$profile_pics;
		if (file_exists($filename)) {  } else {  

mysqli_query($con, "update register set uploadedfile='' where id='$id'");

echo $username; echo '<br>'; }
	}
}


echo '<br><br><br><br><br>';
echo 'gg';

$a=mysqli_query($con, "select * from register");
while($row_a=mysqli_fetch_array($a))
{
	$username=$row_a['username'];
	$horo=$row_a['horo'];
$id=$row_a['id'];
	if($horo!='')
	{
		
		$filename = 'admin/horo/'.$horo;
		if (file_exists($filename)) {  } else { 

//mysqli_query($con, "update register set horo='' where id='$id'");

  echo $username; echo '<br>'; }
	}
}
?>