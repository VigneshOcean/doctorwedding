<?php include("../include/connect.php");
session_start();
$id=$_SESSION['id'];
if(!isset($_SESSION['id']))
{
echo "<script type=text/javascript>window.location='index.php?err';</script>";
}
else
{
if(isset($_POST['submit']))
{
$userid=$_POST['userid'];
$_SESSION['userid']=$userid;
}
$uu=mysqli_query($con, "select * from register where id='$id'");
$row_uu=mysqli_fetch_array($uu);
$uu_caste=$row_uu['religion'];
$valid_string=$row_uu['valid_string'];
$mydob=$row_uu['dob'];
$mygender=$row_uu['gender'];
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
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
   <!----------------- Fancy box ------------------->
   <script language="JavaScript" type="text/javascript">
 var xmlHttp
function getssts(str1) {
//alert(str1);
/* $('#imgLoader').show();*/
 document.getElementById("imgLoader").style.display = "block";
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
 //alert(str1);
 var url="get_like.php";
 url=url+"?h="+str1;
 url=url+"&sid="+Math.random();
 xmlHttp.onreadystatechange=stateChangedga;
 xmlHttp.open("GET",url,true);
 xmlHttp.send(null);
}
function stateChangedga() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 {
 //alert(xmlHttp.responseText);
  var a=xmlHttp.responseText;
	window.location='id_search.php';
    document.getElementById("ba").innerHTML=xmlHttp.responseText;
	document.getElementById("imgLoader").style.display = "none";
  } 
} 
function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
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

<script language="JavaScript" type="text/javascript">
 var xmlHttp
function getssts1(str1) {
//alert(str1);
document.getElementById("imgLoader").style.display = "block";
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
 //alert(str1);
 var url="get_unlike.php";
 url=url+"?h="+str1;
 url=url+"&sid="+Math.random();
 xmlHttp.onreadystatechange=stateChangedga1;
 xmlHttp.open("GET",url,true);
 xmlHttp.send(null);
}
function stateChangedga1() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 {
 //alert(xmlHttp.responseText);
  var a=xmlHttp.responseText;
	window.location='id_search.php';
    document.getElementById("ba").innerHTML=xmlHttp.responseText;
	document.getElementById("imgLoader").style.display = "none";
  } 
} 
function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
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
<div class="col-sm-3"><input  id="userid" class="col-xs-10 col-sm-12" type="text"  name="userid" ></div>
<div class="col-sm-3" style="float:left;"><button class="btn btn-info" type="submit" name="submit" id="submit">Search</button></div>
</div>
<div class="space-4"></div>

</form>
</div><!-- /.col -->
<script language="JavaScript" type="text/javascript">
 var xmlHttp
function marriage_notify(sender_id,to_id) {
	if (confirm("Are you sure you want to update profile as marriage fixed!") == true) 
	{
	 document.getElementById("imgLoader").style.display = "block";
       //alert(str1);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
 var url="marriage_notify.php";
 url=url+"?to_id="+to_id+"&sender_id="+sender_id;
 url=url+"&sid="+Math.random();
  xmlHttp.onreadystatechange=stateChangedga1111;
 xmlHttp.open("GET",url,true);
 xmlHttp.send(null);
    } 


}

function stateChangedga1111() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 {
 alert('Thanks for your information.Admin will delete this profile soon once verified');
  var a=xmlHttp.responseText;
	window.location='id_search.php';
    document.getElementById("ba").innerHTML=xmlHttp.responseText;
		document.getElementById("imgLoader").style.display = "none";
  } 
} 
function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
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
    <script>
function noaccess(){
    alert('Upgrade your plan, Kindly visit payment link menu to avail this feature');
}
</script>
<?php
if(isset($_SESSION['userid']))
{
?>
<!--style="display:none;"-->
<style>
#imgLoader { background-color: rgba(0, 0, 0, 0.3);    bottom: 0;    display: none;    left: 0;    outline: 0 none;    overflow: hidden;    position: fixed;    right: 0;    top: 0;    z-index: 1050;	}
.new_loader { margin-top:20%; margin-left:40%; }
</style>
<div  id="imgLoader">
 <table width="100%" align="center" style="margin-top:25%;">
 <tr><td width="45%"></td><td width="10%" align="center"> <img src="../images/loading.gif"/></td><td width="45%"></td></tr>
 <tr><td colspan="3" align="center"><span style="color:#FFFFFF; font-weight:bold; font-size:16px;">Please Wait!</span></td></tr>
 </table>
</div>
<?php
$userid1=$_SESSION['userid'];
if($mygender=='male'){
$condition=" and STR_TO_DATE(dob,'%d/%m/%Y')>=STR_TO_DATE('".$mydob."','%d/%m/%Y')";    
} else {
    $condition=" and STR_TO_DATE(dob,'%d/%m/%Y')<=STR_TO_DATE('".$mydob."','%d/%m/%Y')";
}
$result=mysqli_query($con, "select * from register where  username='$userid1' and gender!='$gender1' and religion='$uu_caste' and id!='$id' and status='1'  ".$condition)or die(mysqli_error($con));
$num_result=mysqli_num_rows($result);
if($num_result>0)
{
while($usprod=mysqli_fetch_array($result))
{
$pp_id=$usprod['id'];
$uu=mysqli_query($con, "select * from likes where sender_id='$id' and to_id='$pp_id'");   
$count_uu=mysqli_num_rows($uu);
if($count_uu>0)
{  
?>
<div style="float:left;"><a class="btn btn-app btn-danger btn-xs" href="javascript:void(0)" onClick="getssts1(<?php echo $usprod['id']; ?>)"><i class="icon-heart-empty  bigger-160"></i>Your Request sent</a></div>  
<?php
}
else
{
?>
<div style="float:left;">
<span style="color:#009933; font-weight:bold;">விருப்பம் தெரிவிக்க :</span>
<a class="btn btn-app btn-yellow btn-xs" href="javascript:void(0)" <?php if($valid_string==''){ echo 'title="Upgrade your plan to avail this feature" onClick="noaccess()" ';   } else { ?> onClick="getssts(<?php echo $usprod['id']; ?>)" <?php } ?> ><i class="icon-heart bigger-160"></i>Like</a></div> 
<?php
}
?> 
<?php
$aa=mysqli_query($con, "select * from marriage_notification where sender_id='$id' and to_id='$pp_id'");
$count_aa=mysqli_num_rows($aa);
if($count_aa=='0')
{
?>
<div style="float:right;">
<span style="color:#009933; font-weight:bold;">திருமணம் முடிந்தது என �
றிவிக்க :</span>
<a  onclick="marriage_notify(<?php echo $id; ?>,<?php echo $pp_id; ?>)" class="btn btn-app btn-danger btn-xs" href="javascript:void(0)" >
<i class="icon-exclamation-sign"></i>Notify us</a></div>  
<?php
}
?>    
<?php
$caste1=$usprod['religion'];
$man=mysqli_query($con, "select * from caste where id='$caste1'");
$man11=mysqli_fetch_array($man);
$subcaste11=$usprod['caste'];
$man112=mysqli_query($con, "select * from subcaste where id='$subcaste11'");
$man111=mysqli_fetch_array($man112);
if($uu_caste==$caste1)
{
?>        
<table width="100%" cellpadding="5" cellspacing="5">

<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;"></span></td>
<td></td>
<td></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Userid</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['username']); ?></span></td>
</tr>

<tr>
<td width="18%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Name</span></td>
<td width="1%">:</td>
<td width="25%"><span style="color:#FF0000; font-size:14px;"><?php echo  ucwords($usprod['name']); ?></span></td>
<td width="20%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Gender</span></td>
<td width="1%">:</td>
<td width="35%"><span style="color:#FF0000; font-size:14px;"><?php echo  ucwords($usprod['gender']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Date of Birth</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo $usprod['dob']; ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Age</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo $usprod['age']; ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Time of Birth</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo $usprod['tob']; ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Place of Birth</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['p_birth']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Mobile</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php if($valid_string!='') { echo $usprod['mobile']; } else { echo '******'; }  ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Email</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php if($valid_string!='') { echo $usprod['email']; } else { echo '******'; }  ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Home Type</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo $usprod['home_type']; ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">House</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo $usprod['house_type']; ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Caste</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($man11['caste']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Sub Caste</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($man111['subcaste']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Star</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['star']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Moonsign</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['moonsign']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Education</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;">
<?php if($usprod['edu_det']!='') { ?> <?php echo ucwords($usprod['edu_det']); ?><?php } ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;"></span></td>
<td></td>
<td><span style="color:#FF0000; font-size:14px;"></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Father's Name</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['fathername']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Father's Occupation</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['father_occupation']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Mother's Name</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['mother_name']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Mother's Occupation</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['mother_occupation']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Number of brothers</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['no_of_brothers']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Number of Sisters</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['no_of_sisters']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Married brothers</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['bro_married']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Married Sisters</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['sis_married']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Skin Color</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['skin']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Height</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['height']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Company Name</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['job_cmpy']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Job Details</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['job']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Job Location</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['job_loc']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Salary</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['salary']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Address</span></td>
<td>:</td>
<td colspan="4"><span style="color:#FF0000; font-size:14px;"><?php if($valid_string!='') { echo ucwords($usprod['address']); } else { echo '******'; }  ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Self Description</span></td>
<td>:</td>
<td colspan="4"><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['self_desc']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Expectation</span></td>
<td>:</td>
<td colspan="4"><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['expectation']); ?></span></td>
</tr>
<?php
if($usprod['uploadedfile']!='')
{
?>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Profile Picture 1</span></td>
<td>:</td>
<td colspan="4">
<a href="../profile/<?php echo $usprod['uploadedfile']; ?>" data-fancybox-group="gallery" title="<?php echo  ucwords($usprod['name']); ?>" class="fancybox" >
<img src="../profile/<?php echo $usprod['uploadedfile']; ?>" height="300" width="300" /></a>
</td>
</tr>
<?php
}
else
{
?>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Profile Picture 1</span></td>
<td>:</td>
<td colspan="4">
<span style="color:#FF0000; font-weight:bold;">Profile Picture not yet uploaded</span>
</td>
</tr>
<?php
}
if($usprod['second_upload']!='')
{
?>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Profile Picture 2</span></td>
<td>:</td>
<td colspan="4">
<a href="../profile/<?php echo $usprod['second_upload']; ?>" data-fancybox-group="gallery" title="<?php echo  ucwords($usprod['name']); ?>" class="fancybox" >
<img src="../profile/<?php echo $usprod['second_upload']; ?>" height="300" width="300" /></a>
</td>
</tr>
<?php
}
else
{
?>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Profile Picture 2</span></td>
<td>:</td>
<td colspan="4">
<span style="color:#FF0000; font-weight:bold;">Profile Picture not yet uploaded</span>
</td>
</tr>
<?php
}
$horo=$usprod['horo'];
if($valid_string!='') 
{
if($horo!='')
{
?>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Horoscope</span></td>
<td>:</td>
<td colspan="4">
<a href="../matrimonyadmin/horo/<?php echo $usprod['horo']; ?>" data-fancybox-group="gallery" title="<?php echo  ucwords($usprod['name']); ?>" class="fancybox" >
<img src="../matrimonyadmin/horo/<?php echo $usprod['horo']; ?>"  height="300" width="500" /></a>
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
<td colspan='3'></td>
<td colspan="3">
<a href="../matrimonyadmin/simpleprint.php?user_id=<?php echo $usprod['id'];  ?>&userid=<?php echo $id; ?> " target="_blank"><span style="color:#FF0000; font-weight:bold;">Print Profile</span></a>
</td>
</tr>
<?php
}
?>

</table>
<?php
}
else
{
?>
<table width="100%" cellpadding="5" cellspacing="5">
<tr>
<td width="18%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Name</span></td>
<td width="1%">:</td>
<td width="25%"><span style="color:#FF0000; font-size:14px;"><?php echo  ucwords($usprod['name']); ?></span></td>
<td width="20%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Gender</span></td>
<td width="1%">:</td>
<td width="35%"><span style="color:#FF0000; font-size:14px;"><?php echo  ucwords($usprod['gender']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Date of Birth--Age</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo $usprod['dob']; ?>--<?php echo $usprod['age']; ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Time of Birth</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo $usprod['tob']; ?></span></td>
</tr>

<?php
$caste1=$usprod['religion'];
$man=mysqli_query($con, "select * from caste where id='$caste1'");
$man11=mysqli_fetch_array($man);
$subcaste11=$usprod['caste'];
$man112=mysqli_query($con, "select * from subcaste where id='$subcaste11'");
$man111=mysqli_fetch_array($man112);
?>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Caste</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($man11['caste']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Sub Caste</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($man111['subcaste']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Star</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['star']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Moonsign</span></td>
<td>:</td>
<td><?php echo ucwords($usprod['moonsign']); ?></span></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Job Details</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['job']); ?></span></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Salary</span></td>
<td>:</td>
<td><span style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['salary']); ?></span></td>
</tr>

<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Profile Picture</span></td>
<td>:</td>
<td colspan="4">
<a href="../profile/<?php echo $usprod['uploadedfile']; ?>" data-fancybox-group="gallery" title="<?php echo  ucwords($usprod['name']); ?>" class="fancybox" >
<img src="../profile/<?php echo $usprod['uploadedfile']; ?>" height="300" width="300" /></a>
</td>
</tr>

</table>
<?php
}
?>




<?php
}
}
else
{
?>
<span style="color:#FF0000; font-weight:bold; font-size:18px;">You are searching for same gender or diffrent caste.Please try with userid of opposite gender or same caste.</span>
<?php
}
}
?>
</div> 
                        
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