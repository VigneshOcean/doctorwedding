<?php
include('../include/connect.php');
$user_id=$_REQUEST['user_id'];
if(isset($_REQUEST['userid']))
{
 $userid=$_REQUEST['userid'];
//  mysqli_query($con, "update register set print_count=print_count+1 where id='".$userid."' ");
}
$prod=mysqli_query($con,"select * from register where id='$user_id'");
$usprod=mysqli_fetch_array($prod);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adidravidar matrimony [www.doctorwedding.com]</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./jquery/html2canvas.js">
</script>
<script>
$(document).ready(function(){
    var getCanvas; // global variable
    html2canvas($("#html-content-holder")[0]).then((canvas) => {
        console.log("Preview completed... ");
        $("#previewImage").append(canvas);
        getCanvas = canvas;
        var imgageData = getCanvas.toDataURL("image/png");
        // Now browser starts downloading it instead of just showing it
        var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
        $("#btn-Convert-Html2Image").attr("download", "download.png").attr("href", newData);
        // $( ".btn-Convert-Html2Image" ).click();
        // $( ".btn-Convert-Html2Image" ).trigger( "click" );
    });
});
</script>
<style>
    a:link, a:visited {
  background-color: white;
  color: black;
  border: 2px solid green;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
a:hover, a:active {
  background-color: green;
  color: white;
}
</style>
<body>
<!--    <div id="html-content-holder" style="background-color: #F0F0F1; color: #00cc65; width: 500px;-->
<!--        padding-left: 25px; padding-top: 10px;">-->
<!--Place any code here-->
<!--    </div>-->
    <!--<input id="btn-Preview-Image" type="button" value="Preview"/>-->
    <!--<a id="btn-Convert-Html2Image" href="#">Download</a>-->
    <a  id="btn-Convert-Html2Image" class="btn btn-primary btn-sm active btn-Convert-Html2Image" role="button" aria-pressed="true">Download as Image</a>
    <br/>
    <h3>Preview :</h3>

<div id="html-content-holder" >    
<table width="100%" cellpadding="5" cellspacing="5">
<tr>
    <td colspan="6" align="center" style="font-weight: bold; font-size: 20px;">
        HM Matrimony
    </td>
</tr>
<tr>
    <td colspan="6" align="center" style="font-size: 16px;">
        28/49,South usman road,T Nagar,Chennai-600 017 &nbsp;&nbsp;&nbsp;&nbsp; Mobile No      :+91 90940 10909 / 044 4386 3901
    </td>
</tr>

<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;"></span></td>
<td></td>
<td><span style="font-size:14px;"></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">User Id</span></td>
<td>:</td>
<td style="font-size: 16px; font-weight: bold;"><?php echo $usprod['username']; ?></td>
</tr>
<tr>
<td width="23%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Name</span></td>
<td width="1%">:</td>
<td width="25%"><span style="font-size:14px;"><?php echo  ucwords($usprod['name']); ?></span></td>
<td width="23%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Phone</span></td>
<td width="1%">:</td>
<td width="25%">***</td>
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
$caste1=$usprod['religion'];
$man=mysqli_query($con,"select * from caste where id='$caste1'");
$man11=mysqli_fetch_array($man);
$subcaste11=$usprod['caste'];
$man112=mysqli_query($con,"select * from subcaste where id='$subcaste11'");
$man111=mysqli_fetch_array($man112);
?>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Caste</span></td>
<td>:</td>
<td><span style=" font-size:14px;"><?php echo ucwords($man11['caste']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Sub Caste</span></td>
<td>:</td>
<td><?php echo ucwords($man111['subcaste']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Star</span></td>
<td>:</td>
<td><span style="font-size:14px;"><?php echo ucwords($usprod['star']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Moonsign</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['moonsign']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Education</span></td>
<td>:</td>
<td><span style="font-size:14px;"><?php echo ucwords($usprod['education']); ?>
<?php if($usprod['edu_det']!='') { ?> [<?php echo ucwords($usprod['edu_det']); ?>]<?php } ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Home type</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['house_type']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Company Name</span></td>
<td>:</td>
<td><span style="font-size:14px;"><?php echo ucwords($usprod['job_cmpy']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Job Details</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['job']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Job Location</span></td>
<td>:</td>
<td><span style=" font-size:14px;"><?php echo ucwords($usprod['job_loc']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Salary</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['salary']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Skin Color</span></td>
<td>:</td>
<td><span style="font-size:14px;"><?php echo ucwords($usprod['skin']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Height</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['height']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Father's Name</span></td>
<td>:</td>
<td><span style="font-size:14px;"><?php echo ucwords($usprod['fathername']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Father's Occupation</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['father_occupation']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Mother's Name</span></td>
<td>:</td>
<td><span style=" font-size:14px;"><?php echo ucwords($usprod['mother_name']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Mother's Occupation</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['mother_occupation']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Number of brothers</span></td>
<td>:</td>
<td><span style="font-size:14px;"><?php echo ucwords($usprod['no_of_brothers']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Number of Sisters</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['no_of_sisters']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Married brothers</span></td>
<td>:</td>
<td><span style=" font-size:14px;"><?php echo ucwords($usprod['bro_married']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Married Sisters</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['sis_married']); ?></td>
</tr>

<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Expectation</span></td>
<td>:</td>
<td colspan="4"><span style="font-size:14px;"><?php echo ucwords($usprod['expectation']); ?></span></td>
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
<?php
$uploadedfile=$usprod['uploadedfile'];
if($uploadedfile!='')
{
?>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Profile Picture</span></td>
<td>:</td>
<td colspan="4">
<?php if($usprod['uploadedfile']=='') { echo '<span style="color:#FF0000; font-weight:bold;">Picture not found</span>'; } else { ?>
<img src="http://hmmatrimony.com/profile/<?php echo $usprod['uploadedfile']; ?>" height="300" width="300" />
<?php } ?>
</td>
</tr>
<?php
}
?>
</table>
</div>
</body>
</html>