<?php
include('../include/connect.php');
$user_id=$_REQUEST['user_id'];
if(isset($_REQUEST['userid']))
{
 $userid=$_REQUEST['userid'];
 mysqli_query($con,"update register set print_count=print_count+1 where id='".$userid."' ");
}
$prod=mysqli_query($con,"select * from register where id='$user_id'");
$usprod=mysqli_fetch_array($prod);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adidravidar matrimony [www.hmmatrimony.com]</title>
</head>
<body onload="window.print();">
<table width="100%" cellpadding="5" cellspacing="5">

<tr>
<td width="23%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Name</span></td>
<td width="1%">:</td>
<td width="25%"><span style="font-size:14px;"><?php echo  ucwords($usprod['name']); ?></span></td>
<td width="23%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">User Id</span></td>
<td width="1%">:</td>
<td width="25%"><?php echo $usprod['username']; ?></td>
</tr>

<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Date of Birth</span></td>
<td>:</td>
<td><span style="font-size:14px;"><?php echo $usprod['dob']; ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Age</span></td>
<td>:</td>
<td><?php echo $usprod['age']; ?></td>
</tr>

<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Time of Birth</span></td>
<td>:</td>
<td><span style="font-size:14px;"><?php echo $usprod['tob']; ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Place of Birth</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['p_birth']); ?></td>
</tr>

<?php
$horo=$usprod['horo'];
if($horo!='')
{
?>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Horoscope</span></td>
<td>:</td>
<td colspan="4">
<img src="http://hmmatrimony.com/matrimonyadmin/horo/<?php echo $usprod['horo']; ?>" height="300" width="500" />
</td>
</tr>
<?php
}
?>

</table>
</body>
</html>