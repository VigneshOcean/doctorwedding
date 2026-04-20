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
<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center"  style="border:solid 1px #000000;">
  <tbody>
    <tr>
      <td  width="20%"></td>
      <td width="30%"></td>
      <td width="20%"></td>
      <td width="30%"></td>
    </tr>
    <tr>
      <td  width="20%" height="34"> Name</td>
      <td><?php echo $name; ?>      </td>
      <td  width="20%" > Gender</td>
      <td><?php echo $gender; ?>   </td>
    </tr>
    <tr>
      <td  width="20%" height="34" >Date of Birth</td>
      <td ><?php echo $dob; ?>      </td>
      <td > Time of birth</td><td colspan="2"><?php echo $tob; ?>  </td> </tr>
    <tr>
      <td height="34" width="20%">Place of Birth</td>
      <td ><?php echo $p_birth; ?> </td>
      <td >Status</td><td width="30%"><?php echo $status1; ?> </td>
    </tr>
    <tr> <td height="34"  width="20%">Mobile</td> 
    <td ><?php echo $mobile; ?>      </td> 
      <td >Home Type</td>      <td width="30%"><?php echo $home_type; ?>   </td>   
    </tr>
    
    <tr>   <td height="34"  width="23%"> Email</td> 
    <td colspan="3"> <?php echo $email; ?></td>
    </tr>
    <tr>   <td height="34"  width="23%"> Residential Address</td> 
    <td colspan="3"> <?php echo $ma1['address']; ?></td>
    </tr>
    <tr> <td height="34"  width="20%">Caste</td> 
    <td ><?php echo $caste1; ?></td>
      <td >Sub Caste</td><td width="30%"><?php echo $subcaste1; ?> </td>  
    </tr>
    <tr><td height="34"  width="20%"> Star</td>
    <td ><?php echo $star; ?> </td>
      <td > Moonsign</td>  <td><?php echo $moonsign; ?> </td>   </tr>
    <tr><td height="34"  width="20%"> Education</td> 
    <td ><?php echo $education; ?></td>
      <td > Job</td><td width="30%"><?php echo $job; ?> </td> 
    </tr>
    <tr> <td height="34"  width="20%">Company Name</td>
    <td ><?php echo $ma1['job_cmpy']; ?></td>
      <td >Job location</td><td width="30%"><?php echo $ma1['job_loc']; ?>  </td> 
    </tr>
    <tr><td height="34"  width="20%">Salary</td> 
    <td ><?php echo $salary; ?> </td>
      <td > </td> <td width="30%"> </td>
    </tr>
    <tr><td height="34"  width="20%"> No of Brothers</td>  
    <td ><?php echo $no_of_brothers; ?>(<?php echo $bro_married; ?>) </td>
      <td >No of Sisters</td> <td width="30%"> <?php echo $no_of_sisters; ?>(<?php echo $sis_married; ?>)</td> 
    </tr>
    
    <tr> <td height="34"  width="20%"> Father's Name</td>
    <td ><?php echo $ma1['fathername']; ?></td>
      <td >Mother's Name</td>  <td width="30%"><?php echo $ma1['mother_name']; ?> </td> 
    </tr>
    <tr><td height="34" > Father Occupation</td><td ><?php echo $ma1['father_occupation']; ?> </td>
      <td >Mother Occupation</td> <td width="30%"><?php echo $ma1['mother_occupation']; ?></td> 
    </tr>
    
    <tr>   <td height="34"  width="23%">Dosam</td> 
    <td colspan="3"> <?php echo $ma1['dosam']; ?></td>
    </tr>
        <tr>   <td height="34"  width="23%" >Expectation</td> 
        <td colspan="3"> <?php echo $expectation; ?></td>
     </tr>
      <tr>   <td  width="23%" >Horoscope</td> 
        <td colspan="3"><img src="http://www.hmmatrimony.com/matrimonyadmin/horo/<?php echo $ma1['horo']; ?>" height="270" width="500" /></td>
     </tr>
  </tbody>
</table>
</body>
</html>
<?php
}
?>