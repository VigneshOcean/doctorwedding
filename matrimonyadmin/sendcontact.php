<?php
include("../include/connect.php");
$command=$_POST['command'];
if($command=="mail")
{
$userid=$_POST['userid'];
$email=$_POST['email'];
$a=mysqli_query($con, "select * from register where id='$userid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$username=$b['username'];
$mobile=$b['mobile'];
$useremail=$b['email'];
$address=$b['address'];

		
		$from="hmlucky03@gmail.com";
	$to = stripslashes($_POST['email']);
    $mime_boundary="==Multipart_Boundary_x".md5(mt_rand())."x";
    $subject="Contact Details from HAPPY MARRIAGE MATRIMONY"; 
  	$message ='<table width="372"  border="0" cellpadding="0" cellspacing="0" style="border:1px solid; border-color:#0099FF">
 <tr class="fnt">
    <td height="31" colspan="3" bgcolor="#84c8f8" class="fnt" align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold; color:#000000">Contact Details</td>
  </tr>
  <tr class="fnt">
    <td width="23"  >&nbsp;</td>
    <td width="113" height="27" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666; font-weight:bold;" >Dear Sir/Madam</td>
    <td width="218">&nbsp;</td>
  </tr>
 <tr class="fnt">
    <td>&nbsp;</td>
    <td  >Name :</td>
    <td height="64" colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666; font-weight:bold; color:#000000;">'.$name.'</td>
  </tr>
  <tr class="fnt">
    <td>&nbsp;</td>
    <td  >UserId :</td>
    <td height="64" colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666; font-weight:bold; color:#000000;">'.$username.'</td>
  </tr>
  
   <tr class="fnt">
    <td>&nbsp;</td>
    <td  >Email :</td>
    <td height="64" colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666; font-weight:bold; color:#000000;">'.$useremail.'</td>
  </tr>
  <tr class="fnt">
    <td>&nbsp;</td>
    <td  >Mobile :</td>
    <td height="64" colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666; font-weight:bold; color:#000000;">'.$mobile.'</td>
  </tr>
   <tr class="fnt">
    <td>&nbsp;</td>
    <td  >Residence :</td>
    <td height="64" colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666; font-weight:bold; color:#000000;">'.$address.'</td>
  </tr>
<tr  class="fnt">
  <td>&nbsp;</td>
  <td height="37" colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666; font-weight:bold;">
  Do not Reply to this Mail,</td> 
  </tr>
</table>';
      $headers = "From: $from\r\n" .
         "MIME-Version: 1.0\r\n" .
         "Content-Type: multipart/mixed;\r\n" .
         " boundary=\"{$mime_boundary}\"";
		$message .= "This is a multi-part message in MIME format.\n\n" . 
                "--{$mime_boundary}\n" . 
                "Content-Type:text/html; charset=\"iso-8859-1\"\n" . 
               "Content-Transfer-Encoding: 7bit\n\n" . 
         $message . "\n\n";
  if (@mail($to, $subject, $message, $headers))
			$g=1;
      else
			$g=0;
			
echo "<script type=text/javascript>alert('Contact Details Sent Successfully')
window.close();
</script>";

}

?>