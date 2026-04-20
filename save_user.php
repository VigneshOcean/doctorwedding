<?php
include("include/connect.php"); 
error_reporting(0);
$command=$_POST['command'];
if($command=="register")
{
$name=$_POST['name'];
$rad_gen=$_POST['gender_type'];
$profile=$_POST['profile'];
$refernce=$_POST['refernce'];

$dob=$_POST['dob'];
$age=$_POST['age'];
$tob=$_POST['birthtime'];
$p_birth=$_POST['p_birth'];
$status1=$_POST['status1'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$religion=$_POST['religion'];
$caste=$_POST['caste'];
$star=$_POST['star'];
$moonsign=$_POST['moonsign'];
$education=$_POST['education'];
$edu_det=$_POST['edu_det'];
$job=$_POST['job'];
$job_cmpy=$_POST['job_cmpy'];
$job_loc=$_POST['job_loc'];

$skin=$_POST['skin'];
$height=$_POST['height'];
$salary=$_POST['salary'];
$address=$_POST['address'];
$no_of_brothers=$_POST['no_of_brothers'];
$bro_married=$_POST['bro_married'];
$no_of_sisters=$_POST['no_of_sisters'];
$sis_married=$_POST['sis_married'];
$falive=$_POST['falive'];
$malive=$_POST['malive'];
$fathername=$_POST['fathername'];
$mother_name=$_POST['mother_name'];
$father_occupation=$_POST['father_occupation'];
$mother_occupation=$_POST['mother_occupation'];
$self_desc=$_POST['self_desc'];
$expectation=$_POST['expectation'];
$home_type=$_POST['home_type'];
$house_type=$_POST['house_type'];
$dosam=$_POST['dosam'];
$self_dosam=$_POST['self_dosam'];
$area=$_POST['area'];
$random_no=rand(10000000,99999999);
$file=$_FILES['uploadedfile']['name'];
if(!empty($file))
{	
$target_path = "profile/";
$uploaded_files=$random_no."_".$_FILES['uploadedfile']['name'];
move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path .$random_no."_".$_FILES['uploadedfile']['name']);
}
	$c_date=date("d/m/Y");
	

$find = mysqli_query($con,"SELECT * FROM register where name='$name' and dob='$dob' and fathername='$fathername' and mother_name='$mother_name'")or die(mysqli_error($con));
$row1=mysqli_fetch_array($find);
$use_id=$row1['id'];
$count_find=mysqli_num_rows($find);
if($count_find>0)
{
echo "<script type=text/javascript>alert('Already Registered Profile .kindly upload new profile')
window.location='register.php'
</script>";
}
else
{	
if(!mysqli_query($con,"insert into register(name,gender,profile,refernce,dob,age,tob,p_birth,status1,mobile,email,religion,caste,star,moonsign,education,edu_det,job,job_cmpy,job_loc,skin,height,salary,address,no_of_brothers,bro_married,no_of_sisters,sis_married,falive,malive,fathername,mother_name,father_occupation,mother_occupation,self_desc,expectation,home_type,uploadedfile,c_date,status,dosam,self_dosam,profile_id,area,house_type) values('$name','$rad_gen','$profile','$refernce','$dob','$age','$tob','$p_birth','$status1','$mobile','$email','$religion','$caste','$star','$moonsign','$education','$edu_det','$job','$job_cmpy','$job_loc','$skin','$height','$salary','$address','$no_of_brothers','$bro_married','$no_of_sisters','$sis_married','$falive','$malive','$fathername','$mother_name','$father_occupation','$mother_occupation','$self_desc','$expectation','$home_type','$uploaded_files','$c_date','0','$dosam','$self_dosam','$profile_id','$area','$house_type')"))
{  
		 echo "Error".mysqli_error($con);
}

$to12=$email;
$sub12="Greetings from HAPPY MARRIAGE MATRIMONY";
$msg12='<table width="372"  border="0" cellpadding="0" cellspacing="0" style="border:1px solid; border-color:#0099FF">
 <tr class="fnt">
    <td height="31" colspan="3" bgcolor="#84c8f8" class="fnt" align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold; color:#000000">Greetings From HAPPY MARRIAGE MATRIMONY </td>
  </tr>
  <tr class="fnt">
    <td width="23"  >&nbsp;</td>
    <td width="113" height="27" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666; font-weight:bold;" >Dear Sir/Madam</td>
    <td width="218">&nbsp;</td>
  </tr>
<tr bgcolor="#c8e6fb" class="fnt">
    <td>&nbsp;</td>
    <td height="34" colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666; font-weight:bold;">Thanks for your Registration, we will get back to you soon</td>
  </tr>
<tr  class="fnt">
  <td>&nbsp;</td>
  <td height="37" colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666; font-weight:bold;">
  Do not Reply to this Mail,</td> 
  </tr>
</table>
';
//echo $msg1;exit;
$sender="hmlucky03@gmail.com";
// now we'll build the message headers
       $headers1 = "From: $sender\r\n" .
         "MIME-Version: 1.0\r\n" .
         "Content-Type: multipart/mixed;\r\n" .
         " boundary=\"{$mime_boundary1}\"";
			
      // next, we'll build the message body
      // note that we insert two dashes in front of the
      // MIME boundary when we use it
      $msg12 .= "This is a multi-part message in MIME format.\n\n" . 
                "--{$mime_boundary1}\n" . 
                "Content-Type:text/html; charset=\"iso-8859-1\"\n" . 
               "Content-Transfer-Encoding: 7bit\n\n" . 
         $msg12 . "\n\n";
		 if (@mail($to1, $sub1, $msg1, $headers1))
			$r=1;
      else
			$r=0;
			

$to1=$email;
$sub1="Greetings from HAPPY MARRIAGE MATRIMONY";
$msg1="<table width='372'  border='0' cellpadding='0' cellspacing='0' style='border:1px solid; border-color:#0099FF'>
 <tr class='fnt'>
    <td height='31' colspan='3' bgcolor='#84c8f8' class='fnt' align='center' style='font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold; color:#000000'>Greetings From HAPPY MARRIAGE MATRIMONY </td>
  </tr>
<tr class='fnt'>
    <td width='23'  >&nbsp;</td>
    <td width='113' height='27' style='font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666; font-weight:bold;' >Dear Sir/Madam</td>
    <td width='218'>&nbsp;</td>
  </tr>
  <tr bgcolor='#c8e6fb' class='fnt'>
    <td>&nbsp;</td>
    <td height='34' colspan='2' style='font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666; font-weight:bold;'>Thanks for your Registration, we will get back to you soon</td>
  </tr>
<tr  class='fnt'>
  <td>&nbsp;</td>
  <td height='37' colspan='2' style='font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666; font-weight:bold;'>
  Do not Reply to this Mail,</td> 
  </tr>
</table>
";
//echo $msg1;exit;
$sender="hmlucky03@gmail.com";
// now we'll build the message headers
       $headers = 'From: $sender'."\r\n" .
          'X-Mailer:PHP/'.phpversion();
		  $headers='MIME-Version: 1.0'."\r\n" ;
		 $headers .="Content-Type:text/html;charset=iso-8859-1"."\r\n";
		 
      // next, we'll build the message body
      // note that we insert two dashes in front of the
      // MIME boundary when we use it
		 if (@mail($to1, $sub1, $msg1, $headers))
			$r=1;
      else
			$r=0;
}

echo "<script type=text/javascript>alert('Thank you for your Registration.')
window.location='register.php'
</script>";
    }
elseif($command=='mail_form')
{
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$msg=$_POST['msg'];
$c_date=date('d-m-Y');
//echo "insert into contact(name,email,mobile,msg)values ('$name','$email','$mobile','$msg')";
mysqli_query($con,"insert into contact(name,email,mobile,msg,c_date)values ('$name','$email','$mobile','$msg','$c_date')") or die(mysqli_error($con));


$to="hmlucky03@gmail.com";
 	$from = stripslashes($_POST['email']);
    $mime_boundary="==Multipart_Boundary_x".md5(mt_rand())."x";
    $subject="$name Enquiry Details"; 
 $message ='<table width="771" height="344" border="0" cellpadding="0" cellspacing="0" style="border:1px solid; border-color:#0099FF">
 <tr class="fnt">
    <td height="20" colspan="4" bgcolor="#84c8f8" class="fnt" align="center">Enquiry  Details</td>
  </tr>
  <tr class="fnt">
    <td width="23"  >&nbsp;</td>
    <td width="113" height="37">Name</td>
    <td width="16" align="center" >:</td>
    <td width="218">'.$name.'</td>
  </tr>
  <tr class="fnt">
    <td>&nbsp;</td>
    <td height="44">Email</td>
    <td align="center">:</td>
    <td>'.$email.'</td>
  </tr>
  <tr class="fnt">
  <td>&nbsp;</td>
    <td height="60">Mobile</td>
    <td align="center">:</td>
    <td>'.$mobile.'</td>
  </tr>
  <tr class="fnt">
  <td>&nbsp;</td>
    <td height="121">Message:</td>
    <td align="center">:</td>
    <td>'.$msg.'</td>
  </tr>
  
</table>

';

     // now we'll build the message headers
       $headers = "From: $from\r\n" .
         "MIME-Version: 1.0\r\n" .
         "Content-Type: multipart/mixed;\r\n" .
         " boundary=\"{$mime_boundary}\"";
			
      // next, we'll build the message body
      // note that we insert two dashes in front of the
      // MIME boundary when we use it
      $message .= "This is a multi-part message in MIME format.\n\n" . 
                "--{$mime_boundary}\n" . 
                "Content-Type:text/html; charset=\"iso-8859-1\"\n" . 
               "Content-Transfer-Encoding: 7bit\n\n" . 
         $message . "\n\n";
 
      // now we'll insert a boundary to indicate we're starting the attachment
      // we have to specify the content type, file name, and disposition as
      // an attachment, then add the file content and set another boundary to
      // indicate that the end of the file has been reached
     /* $message .= "--{$mime_boundary}\n" .
         "Content-Type: {$type};\n" .
         " name=\"{$name}\"\n" .
         "--{$mime_boundary}--\n";
 */
     
      if (@mail($to, $subject, $message, $headers))
			$g=1;
      else
			$g=0;
echo "<script type=text/javascript>alert('Enquiry Submited Successfully.Your Enquiry Will be Shortly Process')
window.location='contact.php'
</script>";
}
?>