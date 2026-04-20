<?php
include("../include/connect.php");
session_start();
$id=$_SESSION['id'];
if(!isset($_SESSION['id']))
{
echo "<script type=text/javascript>window.location='index.php?err';</script>";
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8" />
<title>Happy Marriage:UserId Search</title>
<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.custom.min.css" />
<style type="text/css">
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  src: local('Open Sans Light'), local('OpenSans-Light'), url(font_1.woff) format('woff');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(font_2.woff) format('woff');
}
</style>
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<script src="assets/js/ace-extra.min.js"></script>
<script type="text/javascript">
function validlogin()
{
var x=document.getElementById("userid").value;
if(x=="null" || x=="")
{
alert("Please Enter Userid");
return false; 
}
return true;
}
</script>
<!------------------ Fancy box ------------------->

	<!-- Add jQuery library -->
	<script type="text/javascript" src="fancyBox/lib/jquery-1.8.2.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="fancyBox/source/jquery.fancybox.js?v=2.1.1"></script>
	<link rel="stylesheet" type="text/css" href="fancyBox/source/jquery.fancybox.css?v=2.1.1" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.4" />
	<script type="text/javascript" src="fancyBox/source/helpers/jquery.fancybox-buttons.js?v=1.0.4"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.4"></script>

	<script type="text/javascript">
		$(document).ready(function() {
		$('.fancybox').fancybox();
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});
	$(".fancybox-effects-d").fancybox({
				padding: 0,
				openEffect : 'elastic',
				openSpeed  : 150,
				closeEffect : 'elastic',
				closeSpeed  : 150,
				closeClick : true,
				helpers : {
					overlay : null
				}
			});
			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});
			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',
					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});
$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
					}
						}
});
});
});
	</script>
<script language="JavaScript" type="text/javascript">
 var xmlHttp
function activate(str1) {
//alert(str1);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
 //alert(str1);
var url="get_status.php";
 url=url+"?h="+str1;
 url=url+"&sid="+Math.random();
 xmlHttp.onreadystatechange=stateChangedga;
 xmlHttp.open("GET",url,true);
 xmlHttp.send(null);
}
function stateChangedga() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 {
 if(xmlHttp.responseText=='')
 {
}
else
{
 alert('Please type this New Id to get information:'+xmlHttp.responseText);
}
	// document.getElementById("ba").value=xmlHttp.responseText;
	window.location='id_search.php';
    
} 
} 
function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
}
return xmlHttp;
}
</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
   <!----------------- Fancy box ------------------->
</head>
<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
			<?php include("include/header.php"); ?><!-- /.container -->
		</div>
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>				</a>
				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>
					<!-- #sidebar-shortcuts -->
					<?php include('include/menu.php'); ?><!-- /.nav-list -->
					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>					</div>
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>
				<div class="main-content">

					<div class="page-content">
						<!-- /.page-header -->
						
<div class="page-header"><h1>Userid Search</h1></div>      
<div class="row"><div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" role="form" action="id_search.php" method="post" enctype="multipart/form-data"  onSubmit="return validlogin();">

<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Userid : </label>
<div class="col-sm-9"><input  id="userid" class="col-xs-10 col-sm-5" type="text"  name="userid" ></div></div>
<div class="space-4"></div>


<div class="clearfix form-actions"><div class="col-md-offset-3 col-md-9">
<button class="btn btn-info" type="submit" name="submit" id="submit"><i class="icon-search  bigger-110"></i>Search</button>
<!--<button class="btn" type="reset"><i class="icon-undo bigger-110"></i>Reset</button>-->
</div></div>
</form>
</div><!-- /.col -->
</div> 
<?php

if(isset($_POST['userid'])) { $userid=$_POST['userid']; $_SESSION['userid']=$userid; $userid=$_SESSION['userid'];  }
else { if(isset($_SESSION['userid'])) {  $userid=$_SESSION['userid']; } else { $userid=''; }   }


if($userid!='')
{
$result=mysqli_query($con,"select * from register where  username='$userid'")or die(mysqli_error($con));
$num_result=mysqli_num_rows($result);
if($num_result>0)
{
while($usprod=mysqli_fetch_array($result))
{
$id=$usprod['id'];
?>
<div class="row">
<div class="col-xs-12">
<p style="float:right;">
<a href="marriage.php?userid=<?php echo $usprod['id'];?>"   target="_blank"  title="Enquiry details" target="_blank" class="btn btn-app btn-success   btn-xs"><i class="icon-cloud-upload  bigger-160"></i>Enquiry</a>

<a href="like_details.php?userid=<?php echo $usprod['id'];?>" target="_blank"  title="Like details" class="btn btn-app btn-danger   btn-xs"><i class="icon-heart  bigger-160"></i>Likes</a>
<a href="sendmail.php?userid=<?php echo $usprod['id'];?>"   title="send contact details to email" target="_blank" class="btn btn-app btn-success   btn-xs"><i class="icon-cloud-upload  bigger-160"></i>Contact</a>
<a href="print_email.php?userid=<?php echo $usprod['id'];?>" title="Print for Email" target="_blank"  class="btn btn-app btn-sm btn-xs"><i class="icon-envelope  bigger-160"></i>Email</a>
<a href="take_snap.php?user_id=<?php echo $usprod['id'];?>" title="Download as Image" target="_blank"  class="btn btn-app btn-purple btn-xs"><i class="icon-download-alt  bigger-160"></i>Download</a>
<a href="sample.php?user_id=<?php echo $usprod['id'];?>" target="_blank"  title="Take Print" class="btn btn-app btn-pink   btn-xs"><i class="icon-print  bigger-160"></i>Print</a>
<a href="validity.php?userid=<?php echo $usprod['id']; ?>"  target="_blank"   title="Set Validity for Profile"  class="btn btn-app btn-purple  btn-xs"><i class="icon-cog bigger-160"></i>Validity</a>
<a href="walletsetup.php?userid=<?php echo $usprod['id']; ?>"  target="_blank"   title="Set Wallet for Profile"  class="btn btn-app  btn-xs" style="background: #4c4ae1 !important;" ><i class="icon-money bigger-160"></i>Wallet</a>
<a href="get_contact_history_list.php?senderid=<?php echo $usprod['id']; ?>"  target="_blank"   title="Contact History"  class="btn btn-app  btn-xs" style="background: #c365cf !important;" ><i class="icon-user bigger-160"></i>Contact</a>
<a href="edit.php?userid=<?php echo $usprod['id']; ?>"  target="_blank" title="Edit Profile"  class="btn btn-app btn-yellow btn-xs"><i class="icon-edit bigger-160"></i>Edit</a>
<?php 
if($usprod['status']=='1')
{ 
?>
<a href="javascript:void(0)"  onClick="activate(<?php echo $usprod['id']; ?>)" title="Click to deactivate"  class="btn btn-app btn-danger   btn-xs" style="margin-left: 120px;"><i class="icon-unlock  bigger-160"></i>Deactive</a>
<?php
} 
else 
{
?>
<a href="javascript:void(0)"  onClick="activate(<?php echo $usprod['id']; ?>)" title="Click to Activate"  class="btn btn-app btn-success   btn-xs" style="margin-left: 120px;"><i class="icon-lock  bigger-160"></i>Activate</a>
<?php } ?>
<a href="delete_profile1.php?id=<?php echo $usprod['id'];?>" onClick="return confirm('Are you sure you want to delete?')" title="Delete Profile" target="_blank" class="btn btn-app btn-danger btn-xs"  ><i class="icon-trash bigger-160"></i>Delete</a>
</p>
</div>
</div>        
            
            
<table width="100%" cellpadding="5" cellspacing="5">
<tr>
<td colspan="6" align="center"><?php
$valid_for=$usprod['valid_for'];
if($valid_for!='')
{
?>
<span style="color:#009900; font-size:16px; font-weight:bold;">Paid Customer</span>
<?php
}
if($valid_for=='')
{
?>
<span style="color:#FF0000; font-size:16px; font-weight:bold;">Free Customer</span>
<?php
}
?>
</td>
</tr>
<tr>
<td width="18%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Enquired on</span></td>
<td width="1%">:</td>
<td width="25%"><span style="color:#FF0000; font-size:14px;"><?php echo  ucwords($usprod['enquiry_date']); ?>  </span></td>
<td width="20%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Marriage Status</span></td>
<td width="1%">:</td>
<td width="35%"><?php echo  ucwords($usprod['enquiry_status']); ?></td>
</tr>


<tr>
<td width="18%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Name</span></td>
<td width="1%">:</td>
<td width="25%"><span style="color:#FF0000; font-size:14px;"><?php echo  ucwords($usprod['name']); ?></span></td>
<td width="20%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Gender</span></td>
<td width="1%">:</td>
<td width="35%"><?php echo  ucwords($usprod['gender']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Date of Birth</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo $usprod['dob']; ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Age</span></td>
<td>:</td>
<td><?php echo $usprod['age']; ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Time of Birth</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo $usprod['tob']; ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Place of Birth</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['p_birth']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Mobile</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo $usprod['mobile']; ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Email</span></td>
<td>:</td>
<td><?php echo $usprod['email']; ?></td>
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
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($man11['caste']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Sub Caste</span></td>
<td>:</td>
<td><?php echo ucwords($man111['subcaste']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Star</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['star']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Moonsign</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['moonsign']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Education</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['education']); ?>
<?php if($usprod['edu_det']!='') { ?> [<?php echo ucwords($usprod['edu_det']); ?>]<?php } ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Place of birth</span></td>
<td>:</td>
<td><?php echo $usprod['p_birth']; ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Father's Name</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['fathername']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Father's Occupation</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['father_occupation']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Mother's Name</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['mother_name']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Mother's Occupation</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['mother_occupation']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Number of brothers</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['no_of_brothers']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Number of Sisters</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['no_of_sisters']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Married brothers</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['bro_married']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Married Sisters</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['sis_married']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Skin Color</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['skin']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Height</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['height']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Company Name</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['job_cmpy']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Job Details</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['job']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Job Location</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['job_loc']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Salary</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['salary']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Address</span></td>
<td>:</td>
<td colspan="4"><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['address']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Self Description</span></td>
<td>:</td>
<td colspan="4"><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['self_desc']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Userid</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['username']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Password</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['password']); ?></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Profile Picture 1</span></td>
<td>:</td>
<td colspan="4">
<?php if($usprod['uploadedfile']!='') {  ?>
<a href="../profile/<?php echo $usprod['uploadedfile']; ?>" data-fancybox-group="gallery" title="<?php echo  ucwords($usprod['name']); ?>" class="fancybox" >
<img src="../profile/<?php echo $usprod['uploadedfile']; ?>" height="300" width="300" /></a>
<?php } ?>
</td>
</tr>

<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Profile Picture 2</span></td>
<td>:</td>
<td colspan="4">
<?php if($usprod['second_upload']!='') {  ?>
<a href="../profile/<?php echo $usprod['second_upload']; ?>" data-fancybox-group="gallery" title="<?php echo  ucwords($usprod['name']); ?>" class="fancybox" >
<img src="../profile/<?php echo $usprod['second_upload']; ?>" height="300" width="300" /></a>
<?php } ?>
</td>
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
<a href="horo/<?php echo $usprod['horo']; ?>" data-fancybox-group="gallery" title="<?php echo  ucwords($usprod['name']); ?>" class="fancybox" >
<img src="horo/<?php echo $usprod['horo']; ?>" height="300" width="500" /></a>
</td>
</tr>
<?php
}
else
{
?>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Horoscope</span></td>
<td>:</td>
<td colspan="4">
<span style="color:#FF0000; font-weight:bold;">Horoscope not yet uploaded</span>
</td>
</tr>
<?php
}
?>
<tr>
<td width="18%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Enquired on</span></td>
<td width="1%">:</td>
<td width="25%"><span style="color:#FF0000; font-size:14px;"><?php echo  ucwords($usprod['enquiry_date']); ?>  </span></td>
<td width="20%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Marriage Status</span></td>
<td width="1%">:</td>
<td width="35%"><?php echo  ucwords($usprod['enquiry_status']); ?></td>
</tr>
</table>
<?php
}
}

}
?>

                        
                     	</div><!-- /.page-content -->
				</div><!-- /.main-content -->
				<!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>			</a>		</div><!-- /.main-container -->
<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
        
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<!-- inline scripts related to this page -->
		
		
	</body>
</html>
<?php
}
?>