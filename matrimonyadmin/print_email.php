<?php
include("../include/connect.php");
session_start();
$id=$_SESSION['id'];
if(!isset($_SESSION['id']))
{
echo "<script type=text/javascript>
window.location='index.php?err'
</script>";
}
else
{
error_reporting(0);
$userid=$_REQUEST['userid'];

$file_name="export.doc";
header("Content-type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="'.$file_name.'"');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../include/title.php"); ?>
</head>
<?php
$ma=mysqli_query($con, "select * from register where id='$userid'");

$ma1=mysqli_fetch_array($ma);
$name=$ma1['name'];
$gender=$ma1['gender'];
$dob=$ma1['dob'];
$tob=$ma1['tob'];
$tob=$ma1['tob'];
$p_birth=$ma1['p_birth'];
$status1=$ma1['status1'];
$home_type=$ma1['home_type'];
$age=$ma1['age'];
$mobile=$ma1['mobile'];
$email=$ma1['email'];
$religion=$ma1['religion'];
$caste=$ma1['caste'];
$star=$ma1['star'];
$moonsign=$ma1['moonsign'];
$education=$ma1['education'];
$job=$ma1['job'];
$salary=$ma1['salary'];
$no_of_brothers=$ma1['no_of_brothers'];
$bro_married=$ma1['bro_married'];
$no_of_sisters=$ma1['no_of_sisters'];
$sis_married=$ma1['sis_married'];
$self_desc=$ma1['self_desc'];
$expectation=$ma1['expectation'];
$pro_picture=$ma1['uploadedfile'];
$horo12=$ma1['horo'];
	 
	  $man=mysqli_query($con, "select * from caste where id='$religion'");
	  $man11=mysqli_fetch_array($man);
	  $caste1=$man11['caste'];
	  	  $man112=mysqli_query($con, "select * from subcaste where id='$caste'");
$man111=mysqli_fetch_array($man112);
$subcaste1=$man111['subcaste'];
?>
<body>

<h3 style='margin-left:5%;'>Adidravidar matrimony [www.hmmatrimony.com]</h3>
<table width="90%" cellspacing="0" cellpadding="0" border="0" align="center" class="table_reg" style="border:solid 1px #000000;">
  <tbody>
    <tr>
      <td width="4%" height="34"></td>
      <td class="topic" width="23%"></td>
      <td colspan="3"></td>
      <td class="topic" width="18%"></td>
      <td></td>
    </tr>
    <tr>
      <td width="4%" height="34"></td>
      <td class="topic" width="23%"> Name</td>
      <td colspan="3"><?php echo $name; ?>      </td>
      <td class="topic" width="18%"> Gender</td>
      <td><?php echo $gender; ?>   </td>
    </tr>
    <tr><td width="4%" height="34"></td>
      <td class="topic" width="23%">Date/Time of Birth</td><td colspan="3"><?php echo $dob; ?>/<?php echo $tob; ?> 
      </td><td class="topic"> Place of Birth</td><td colspan="2"> <?php echo $p_birth; ?> </td> </tr>

    <tr> <td height="34"></td>  <td class="topic">Home Type</td> <td colspan="3"><?php echo $home_type; ?> 
      </td> <td class="topic">Age</td>      <td width="29%"><?php echo $age; ?>   </td>   </tr>
    <tr><td height="34"></td> <td class="topic"> Mobile</td><td colspan="3"><?php echo $mobile; ?> </td>
          <td class="topic"> Email</td><td width="29%"><?php echo $email; ?></td> </tr>
    <tr> <td height="34"></td> <td class="topic">Caste</td> <td colspan="3"><?php echo $caste1; ?></td>
      <td class="topic">Sub Caste</td><td width="29%"><?php echo $subcaste1; ?> </td>  </tr>
    <tr><td height="34"></td>  <td class="topic"> Star(Nakshatra)</td><td colspan="3"><?php echo $star; ?> </td>
      <td class="topic"> Moonsign</td>  <td><?php echo $moonsign; ?> </td>   </tr>
    <tr><td height="34"></td> <td class="topic"> Education</td> <td colspan="3"><?php echo $education; ?></td>
      <td class="topic"> Job</td><td width="29%"><?php echo $job; ?> </td> </tr>
    <tr> <td height="34"></td>  <td class="topic">Company Name</td><td colspan="3"><?php echo $m1['job_cmpy']; ?></td>
      <td class="topic">Job location</td><td width="29%"><?php echo $m1['job_loc']; ?>  </td> </tr>
    <tr><td height="34"></td> <td class="topic">Salary</td> <td colspan="3"><?php echo $salary; ?> </td>
      <td class="topic"> Residence</td> <td width="29%"><?php echo $m1['address']; ?> </td></tr>
    <tr><td height="34"></td> <td class="topic"> No of Brothers</td>  <td colspan="3"><?php echo $no_of_brothers; ?>(<?php echo $bro_married; ?>) </td>
      <td class="topic">No of Sisters</td> <td width="29%"> <?php echo $no_of_sisters; ?>(<?php echo $sis_married; ?>)</td> </tr>
    
    <tr> <td height="34"></td><td class="topic"> Father's Name</td><td colspan="3"><?php echo $ma1['fathername']; ?></td>
      <td class="topic">Mother's Name</td>  <td width="29%"><?php echo $ma1['mother_name']; ?> </td> </tr>
    <tr><td height="34"></td><td class="topic"> Father Occupation</td><td colspan="3"><?php echo $ma1['father_occupation']; ?> </td>
      <td class="topic">Mother Occupation</td> <td width="29%"><?php echo $ma1['mother_occupation']; ?></td> </tr>
  <tr>   <td height="34"></td> <td class="topic">Dosam</td> <td colspan="5"> <?php echo $ma1['dosam']; ?></td>
     </tr>
   <tr>   <td height="34"></td> <td class="topic">Expectation</td> <td colspan="5"> <?php echo $expectation; ?></td>
     </tr>

<?php 
if($ma1['uploadedfile']!='') {
?>
 <tr> <td height="34"></td> <td class="topic">Profile Picture</td> <td colspan="5"><img src="http://www.hmmatrimony.com/profile/<?php echo $ma1['uploadedfile']; ?>" height="266" width="365" /><td></tr>
<?php
} 
if($ma1['horo']!='') {
?>
<tr> <td height="34"></td> <td class="topic">Horoscope</td> <td colspan="5"><img src="http://www.hmmatrimony.com/matrimonyadmin/horo/<?php echo $ma1['horo']; ?>" height="270" width="517" /></td>
    </tr>
<?php } ?>
</tbody>
</table>
</body>
</html>
<?php
}
?>