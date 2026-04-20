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
$userid=$_REQUEST['userid'];
$a=mysqli_query($con,"select * from register where id='$userid'")or die(mysqli_error());
$usprod=mysqli_fetch_array($a);
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8" />
<title>Happy Marriage:Edit Profile</title>
<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.css" />
		<link rel="stylesheet" href="assets/css/datepicker.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.css" />
		<link rel="stylesheet" href="assets/css/colorpicker.css" />
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
  function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	
		{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		return xmlhttp;
	}
//Function for Displaying cities
function getcity(title)
{
 var strURL="getinfo.php?title="+title;
   var req = getXMLHTTP();
   if (req)
   {
     req.onreadystatechange = function()
     {
      if (req.readyState == 4)
      {
  // only if "OK"
  if (req.status == 200)
         {
		  alert(req.responseText);
     document.getElementById('subcaste').innerHTML=req.responseText;
  } else {
       alert("There was a problem while using XMLHTTP:\n" + req.statusText);
  }
       }
      }
   req.open("GET", strURL, true);
   req.send(null);
   } 
}


//Function for Displaying and hiding.....
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
						
<div class="page-header"><h1>Edit Profile</h1></div>      
<div class="row"><div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

<form name="upload" method="post" action="updat_profile.php" enctype= "multipart/form-data" onSubmit="return validlogin();">
<input type="hidden" name="command" id="command" value="update_profile" />
<input type="hidden" name="userid" id="userid" value="<?php echo $userid; ?>" />
<?php
$gender=$usprod['gender'];
$caste=$usprod['religion'];
$subcaste=$usprod['caste'];
$govt_job=$usprod['govt_job'];
?>
<table width="100%" cellpadding="5" cellspacing="5">
<tr>
<td width="18%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Name</span></td>
<td width="1%">:</td>
<td width="25%"><input class="col-xs-10 col-sm-12" type="text" placeholder="Name" value="<?php echo $usprod['name']; ?>" name="name" id="name"></span></td>
<td width="20%" align="right"></td>
<td width="1%"></td>
<td width="35%">
</td>
</tr>

<tr>
<td width="18%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Govt Job</span></td>
<td width="1%">:</td>
<td width="25%">
<label><input  id="govt_job" type="radio" value="Yes" name="govt_job" class="ace" <?php if($govt_job=='Yes') { ?> checked <?php } ?>/><span class="lbl">Yes</span></label>
<label><input  id="govt_job" type="radio" value="No" name="govt_job" class="ace" <?php if($govt_job=='No') { ?> checked <?php } ?> /><span class="lbl">No</span></label>
</td>
<td width="20%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Gender</span></td>
<td width="1%">:</td>
<td width="35%">
<label><input  id="gender" type="radio" value="male" name="gender" class="ace" <?php if($gender=='male') { ?> checked <?php } ?>/><span class="lbl">Male</span></label>
<label><input  id="gender" type="radio" value="female" name="gender" class="ace" <?php if($gender=='female') { ?> checked <?php } ?> /><span class="lbl">Female</span></label>
</td>
</tr>

<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Date of Birth</span></td>
<td>:</td>
<td>
<input id="id-date-picker-1"  name="dob" class="form-control date-picker" type="text" data-date-format="dd/mm/yyyy" value="<?php echo $usprod['dob']; ?>" >
<!--<span class="input-group-addon"  style="width:35px; height:34px;" ><i class="icon-calendar bigger-110"></i></span>-->
</td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Age</span></td>
<td>:</td>
<td><input class="col-xs-10 col-sm-8" type="text" placeholder="Age" value="<?php echo $usprod['age']; ?>" name="age" id="age"></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Time of Birth</span></td>
<td>:</td>
<td><input class="col-xs-10 col-sm-12" type="text" placeholder="Time of Birth" value="<?php echo $usprod['tob']; ?>" name="tob" id="tob"></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Place of Birth</span></td>
<td>:</td>
<td><input class="col-xs-10 col-sm-8" type="text" placeholder="Place of Birth" value="<?php echo $usprod['p_birth']; ?>" name="p_birth" id="p_birth"></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Mobile</span></td>
<td>:</td>
<td><input class="col-xs-10 col-sm-12" type="text" placeholder="Mobile Number" value="<?php echo $usprod['mobile']; ?>" name="mobile" id="mobile"></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Email</span></td>
<td>:</td>
<td><input class="col-xs-10 col-sm-8" type="text" placeholder="Email" value="<?php echo $usprod['email']; ?>" name="email" id="email"></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Residencial Area</span></td>
<td>:</td>
<td><input class="col-xs-10 col-sm-12" type="text" placeholder="Residencial Area" value="<?php echo $usprod['area']; ?>" name="area" id="area"></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Home Type</span></td>
<td>:</td>
<td>
<div class="col-sm-9">
<select class="width-80 chosen-select"  name="home_type" id="home_type" data-placeholder="Select Home Type..."   >
<option value=""   <?php if($usprod['home_type']==''){?>selected="selected";<?php }?>>--Select--</option>
<option value="highclass"   <?php if($usprod['home_type']=='highclass'){?>selected="selected";<?php }?>>High Class</option>
<option value="middleclass"  <?php if($usprod['home_type']=='middleclass'){?>selected="selected";<?php }?>>Middle Class</option>
<option value="upperclass"   <?php if($usprod['home_type']=='upperclass'){?>selected="selected";<?php }?>>Upper Class</option>
<option value="uppermiddleclass"  <?php if($usprod['home_type']=='uppermiddleclass'){?>selected="selected";<?php }?>>Upper middle Class</option>
</select></div>
</td>
</tr>
<?php
$caste1=$usprod['religion'];
$subcaste1=$usprod['caste'];
$star=$usprod['star'];
$education=$usprod['education'];
$no_of_brothers=$usprod['no_of_brothers'];
$no_of_sisters=$usprod['no_of_sisters'];
$bro_married=$usprod['no_of_sisters'];
$sis_married=$usprod['sis_married'];
?>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Caste</span></td>
<td>:</td>
<td>
<div class="col-sm-12">
<select class="width-80 chosen-select"  name="caste" id="caste" data-placeholder="Select Caste Name..."  style="width:250px;"   >
<option value="">--Select Caste Name--</option>
<?php
$man=mysqli_query($con,"select * from caste where temp_id=1 order by caste asc");
while($man1=mysqli_fetch_array($man))
 {
 $c_id=$man1['id'];
 ?>
<option value="<?php echo $man1['id']; ?>" <?php if($c_id==$caste1) { ?> selected<?php } ?>><?php echo ucwords($man1['caste']); ?></option>
<?php
}
?>
</select></div></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Sub Caste</span></td>
<td>:</td>
<td><div class="col-sm-9">
<select  class="width-80 chosen-select"  name="subcaste" id="subcaste" data-placeholder="Select Sub Caste Name..." style="width:250px;" >
<option value="">--Select SubCaste Name--</option>
<?php
$subcaste = mysqli_query($con,"select * from subcaste order by subcaste asc");
while($subcaste_row=mysqli_fetch_array($subcaste))
{
$s_id=$subcaste_row['id'];
?>
<option value="<?php echo $subcaste_row['id']; ?>" <?php if($s_id==$subcaste1) { ?> selected<?php } ?>><?php echo ucwords($subcaste_row['subcaste']); ?></option>
<?php
}
?>
</select></div></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Star</span></td>
<td>:</td>
<td>
<div class="col-sm-12">
<select class="width-80 chosen-select"  name="star" id="star" data-placeholder="Select Star Name..."   >
<option value="">--Select Star--</option>
<option value="ANUSHAM" <?php if($usprod['star']=='ANUSHAM'){?>selected="selected";<?php }?>>ANUSHAM</option>
<option value="ASWINI" <?php if($usprod['star']=='ASWINI'){?>selected="selected";<?php }?>>ASWINI</option>
<option value="AVITTAM" <?php if($usprod['star']=='AVITTAM'){?>selected="selected";<?php }?>>AVITTAM</option>
<option value="AYILYAM" <?php if($usprod['star']=='AYILYAM'){?>selected="selected";<?php }?>>AYILYAM</option>
<option value="BHARANI" <?php if($usprod['star']=='BHARANI'){?>selected="selected";<?php }?>>BHARANI</option>
<option value="CHITHIRAI" <?php if($usprod['star']=='CHITHIRAI'){?>selected="selected";<?php }?>>CHITHIRAI</option>
<option value="HASTHAM" <?php if($usprod['star']=='HASTHAM'){?>selected="selected";<?php }?>>HASTHAM</option>
<option value="KETTAI" <?php if($usprod['star']=='KETTAI'){?>selected="selected";<?php }?>>KETTAI</option>
<option value="KRITHIGAI" <?php if($usprod['star']=='KRITHIGAI'){?>selected="selected";<?php }?>>KRITHIGAI</option>
<option value="MAHAM" <?php if($usprod['star']=='MAHAM'){?>selected="selected";<?php }?>>MAHAM</option>
<option value="MOOLAM" <?php if($usprod['star']=='MOOLAM'){?>selected="selected";<?php }?>>MOOLAM</option>
<option value="MRIGASIRISHAM" <?php if($usprod['star']=='MRIGASIRISHAM'){?>selected="selected";<?php }?>>MRIGASIRISHAM</option>
<option value="POOSAM" <?php if($usprod['star']=='POOSAM'){?>selected="selected";<?php }?>>POOSAM</option>
<option value="PUNARPUSAM" <?php if($usprod['star']=='PUNARPUSAM'){?>selected="selected";<?php }?>>PUNARPUSAM</option>
<option value="PURADAM" <?php if($usprod['star']=='PURADAM'){?>selected="selected";<?php }?>>PURADAM</option>
<option value="PURAM" <?php if($usprod['star']=='PURAM'){?>selected="selected";<?php }?>>PURAM</option>
<option value="PURATATHI" <?php if($usprod['star']=='PURATATHI'){?>selected="selected";<?php }?>>PURATATHI</option>
<option value="REVATHI" <?php if($usprod['star']=='REVATHI'){?>selected="selected";<?php }?>>REVATHI</option>
<option value="ROHINI" <?php if($usprod['star']=='ROHINI'){?>selected="selected";<?php }?>>ROHINI</option>
<option value="SADAYAM" <?php if($usprod['star']=='SADAYAM'){?>selected="selected";<?php }?>>SADAYAM</option>
<option value="SWATHI" <?php if($usprod['star']=='SWATHI'){?>selected="selected";<?php }?>>SWATHI</option>
 <option value="THIRUVADIRAI" <?php if($usprod['star']=='THIRUVADIRAI'){?>selected="selected";<?php }?>>THIRUVADIRAI</option>
<option value="THIRUVONAM" <?php if($usprod['star']=='THIRUVONAM'){?>selected="selected";<?php }?>>THIRUVONAM</option>
 <option value="UTHRADAM" <?php if($usprod['star']=='UTHRADAM'){?>selected="selected";<?php }?>>UTHRADAM</option>
<option value="UTHRAM" <?php if($usprod['star']=='UTHRAM'){?>selected="selected";<?php }?>>UTHRAM</option>
<option value="UTHRATADHI" <?php if($usprod['star']=='UTHRATADHI'){?>selected="selected";<?php }?>>UTHRATADHI</option>
<option value="VISAKAM" <?php if($usprod['star']=='VISAKAM'){?>selected="selected";<?php }?>>VISAKAM</option>
</select></div>
</td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Moonsign</span></td>
<td>:</td>
<td>
<div class="col-sm-9">
<select class="width-80 chosen-select"  name="moonsign" id="moonsign" data-placeholder="Select Moonsign Name..."   >
<option value="">--Select Moonsign--</option>
<option value="Mesh (Aries)" <?php if($usprod['moonsign']=='Mesh (Aries)'){?>selected="selected";<?php }?>>Mesh (Aries)</option>
<option value="Vrishabh (Taurus)" <?php if($usprod['moonsign']=='Vrishabh (Taurus)'){?>selected="selected";<?php }?>>Vrishabh (Taurus)</option>
<option value="Mithun (Gemini)" <?php if($usprod['moonsign']=='Mithun (Gemini)'){?>selected="selected";<?php }?>>Mithun (Gemini)</option>
<option value="Karka (Cancer)" <?php if($usprod['moonsign']=='Karka (Cancer)'){?>selected="selected";<?php }?>>Karka (Cancer)</option>
<option value="Simha (Leo)" <?php if($usprod['moonsign']=='Simha (Leo)'){?>selected="selected";<?php }?>>Simha (Leo)</option> 
<option value="Kanya (Virgo)" <?php if($usprod['moonsign']=='Kanya (Virgo)'){?>selected="selected";<?php }?>>Kanya (Virgo)</option>
<option value="Tula (Libra)" <?php if($usprod['moonsign']=='Tula (Libra)'){?>selected="selected";<?php }?>>Tula (Libra)</option>
<option value="Vrischika (Scorpio)" <?php if($usprod['moonsign']=='Vrischika (Scorpio)'){?>selected="selected";<?php }?>>Vrischika (Scorpio)</option>
<option value="Dhanu (Sagittarious)" <?php if($usprod['moonsign']=='Dhanu (Sagittarious)'){?>selected="selected";<?php }?>>Dhanu (Sagittarious)</option>
<option value="Makar (Capricorn)" <?php if($usprod['moonsign']=='Makar (Capricorn)'){?>selected="selected";<?php }?>>Makar (Capricorn)</option>
<option value="Kumbha (Aquarious)" <?php if($usprod['moonsign']=='Kumbha (Aquarious)'){?>selected="selected";<?php }?>>Kumbha (Aquarious)</option>
<option value="Meen (Pisces)" <?php if($usprod['moonsign']=='Meen (Pisces)'){?>selected="selected";<?php }?>>Meen (Pisces)</option>
</select></div>
</td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Education</span></td>
<td>:</td>
<td>
<div class="col-sm-12">
<select class="width-80 chosen-select"  name="education" id="education" data-placeholder="Select Education Name..."  style="width:250px;"   >
<option value="">--Select Education Name--</option>
<?php
$man12=mysqli_query($con,"select * from education where temp_id=1 order by education asc");
while($man123=mysqli_fetch_array($man12))
 {
 $e_id=$man123['education'];
 ?>
<option value="<?php echo $man123['education']; ?>" <?php if($e_id==$education) { ?> selected<?php } ?>><?php echo ucwords($man123['education']); ?></option>
<?php
}
?>
</select></div></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Education in details</span></td>
<td>:</td>
<td><input id="edu_det" class="col-xs-10 col-sm-8" type="text" name="edu_det" value="<?php echo $usprod['edu_det']; ?>" placeholder="Education in details"></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Father's Name</span></td>
<td>:</td>
<td><input id="fathername" class="col-xs-10 col-sm-10" type="text" name="fathername" value="<?php echo $usprod['fathername']; ?>" placeholder="Father Name"></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Father's Occupation</span></td>
<td>:</td>
<td><input id="father_occupation" class="col-xs-10 col-sm-8" type="text" name="father_occupation" value="<?php echo $usprod['father_occupation']; ?>" placeholder="Father Occupation"></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Mother's Name</span></td>
<td>:</td>
<td><input id="mother_name" class="col-xs-10 col-sm-10" type="text" name="mother_name" value="<?php echo $usprod['mother_name']; ?>" placeholder="Mother Name"></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Mother's Occupation</span></td>
<td>:</td>
<td><input id="mother_occupation" class="col-xs-10 col-sm-8" type="text" name="mother_occupation" value="<?php echo $usprod['mother_occupation']; ?>" placeholder="Mother Occupation"></td>
</tr>




<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Number of younger brothers</span></td>
<td>:</td>
<td><div class="col-sm-12">
<select class="width-80 chosen-select"  name="no_of_young_brothers" id="no_of_young_brothers" data-placeholder="Select Number of younger brothers..."  style="width:250px;"   >
<option value="">Not Applicable</option>
<option value="0" <?php if($usprod['no_youngerbrother']=='0'){?>selected="selected";<?php }?>>0</option>
<option value="1"  <?php if($usprod['no_youngerbrother']=='1'){?>selected="selected";<?php }?>>1</option>
<option value="2"  <?php if($usprod['no_youngerbrother']=='2'){?>selected="selected";<?php }?>>2</option>
<option value="3"  <?php if($usprod['no_youngerbrother']=='3'){?>selected="selected";<?php }?>>3</option>
<option value="4"  <?php if($usprod['no_youngerbrother']=='4'){?>selected="selected";<?php }?>>4</option>
<option value="4 +"  <?php if($usprod['no_youngerbrother']=='4 +'){?>selected="selected";<?php }?>>4 +</option>
</select></div></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Married younger brothers</span></td>
<td>:</td>
<td><div class="col-sm-12">
<select class="width-80 chosen-select"  name="young_bro_married" id="young_bro_married" data-placeholder="Select Younger Married Brothers..."  style="width:250px;"   >
<option value="">Not Applicable</option>
<option value="No married brother"  <?php if($usprod['married_youngerbrother']=='No married brother'){?>selected="selected";<?php }?>>No married brother</option>
<option value="One married brother" <?php if($usprod['married_youngerbrother']=='One married brother'){?>selected="selected";<?php }?>>One married brother</option>
<option value="Two married brother" <?php if($usprod['married_youngerbrother']=='Two married brother'){?>selected="selected";<?php }?>>Two married brother</option>
<option value="Three married brother" <?php if($usprod['married_youngerbrother']=='Three married brother'){?>selected="selected";<?php }?>>Three married brother</option>
<option value="Four married brother" <?php if($usprod['married_youngerbrother']=='Four married brother'){?>selected="selected";<?php }?>>Four married brothers</option>
<option value="Above four married brother" <?php if($usprod['married_youngerbrother']=='Above four married brother'){?>selected="selected";<?php }?>>Above four married brother</option>
</select></div></td>
</tr>

<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Number of Elder brothers</span></td>
<td>:</td>
<td><div class="col-sm-12">
<select class="width-80 chosen-select"  name="no_of_elder_brothers" id="no_of_elder_brothers" data-placeholder="Select Number of elder brothers..."  style="width:250px;"   >
<option value="">Not Applicable/option>
<option value="0" <?php if($usprod['no_elderbrother']=='0'){?>selected="selected";<?php }?>>0</option>
<option value="1"  <?php if($usprod['no_elderbrother']=='1'){?>selected="selected";<?php }?>>1</option>
<option value="2"  <?php if($usprod['no_elderbrother']=='2'){?>selected="selected";<?php }?>>2</option>
<option value="3"  <?php if($usprod['no_elderbrother']=='3'){?>selected="selected";<?php }?>>3</option>
<option value="4"  <?php if($usprod['no_elderbrother']=='4'){?>selected="selected";<?php }?>>4</option>
<option value="4 +"  <?php if($usprod['no_elderbrother']=='4 +'){?>selected="selected";<?php }?>>4 +</option>
</select></div></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Married elder brothers</span></td>
<td>:</td>
<td><div class="col-sm-12">
<select class="width-80 chosen-select"  name="elder_bro_married" id="elder_bro_married" data-placeholder="Select elder Married Brothers..."  style="width:250px;"   >
<option value="">Not Applicable</option>
<option value="No married brother"  <?php if($usprod['married_elderbrother']=='No married brother'){?>selected="selected";<?php }?>>No married brother</option>
<option value="One married brother" <?php if($usprod['married_elderbrother']=='One married brother'){?>selected="selected";<?php }?>>One married brother</option>
<option value="Two married brother" <?php if($usprod['married_elderbrother']=='Two married brother'){?>selected="selected";<?php }?>>Two married brother</option>
<option value="Three married brother" <?php if($usprod['married_elderbrother']=='Three married brother'){?>selected="selected";<?php }?>>Three married brother</option>
<option value="Four married brother" <?php if($usprod['married_elderbrother']=='Four married brother'){?>selected="selected";<?php }?>>Four married brothers</option>
<option value="Above four married brother" <?php if($usprod['married_elderbrother']=='Above four married brother'){?>selected="selected";<?php }?>>Above four married brother</option>
</select></div></td>
</tr>

<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Number of younger Sister</span></td>
<td>:</td>
<td><div class="col-sm-12">
<select class="width-80 chosen-select"  name="no_of_young_sister" id="no_of_young_sister" data-placeholder="Select Number of younger Sister..."  style="width:250px;"   >
<option value="">Not Applicable</option>
<option value="0" <?php if($usprod['no_youngersister']=='0'){?>selected="selected";<?php }?>>0</option>
<option value="1"  <?php if($usprod['no_youngersister']=='1'){?>selected="selected";<?php }?>>1</option>
<option value="2"  <?php if($usprod['no_youngersister']=='2'){?>selected="selected";<?php }?>>2</option>
<option value="3"  <?php if($usprod['no_youngersister']=='3'){?>selected="selected";<?php }?>>3</option>
<option value="4"  <?php if($usprod['no_youngersister']=='4'){?>selected="selected";<?php }?>>4</option>
<option value="4 +"  <?php if($usprod['no_youngersister']=='4 +'){?>selected="selected";<?php }?>>4 +</option>
</select></div></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Married younger Sister</span></td>
<td>:</td>
<td><div class="col-sm-12">
<select class="width-80 chosen-select"  name="young_sis_married" id="young_sis_married" data-placeholder="Select Younger Married Sister..."  style="width:250px;"   >
<option value="">Not Applicable</option>
<option value="No married sister"   <?php if($usprod['married_youngersister']=='No married sister'){?>selected="selected";<?php }?>>No married sister</option>
<option value="One married sister"  <?php if($usprod['married_youngersister']=='One married sister'){?>selected="selected";<?php }?>>One married sister</option>
<option value="Two married sisters"  <?php if($usprod['married_youngersister']=='Two married sisters'){?>selected="selected";<?php }?>>Two married sisters</option>
<option value="Three married sisters"  <?php if($usprod['married_youngersister']=='Three married sisters'){?>selected="selected";<?php }?>>Three married sisters</option>
<option value="Four married sisters"  <?php if($usprod['married_youngersister']=='Four married sisters'){?>selected="selected";<?php }?>>Four married sistes</option>
<option value="Above four married sisters"  <?php if($usprod['married_youngersister']=='Above four married sisters'){?>selected="selected";<?php }?>>Above four married sisters</option>
</select></div></td>
</tr>

<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Number of Elder Sister</span></td>
<td>:</td>
<td><div class="col-sm-12">
<select class="width-80 chosen-select"  name="no_of_elder_sister" id="no_of_elder_sister" data-placeholder="Select Number of elder Sister..."  style="width:250px;"   >
<option value="">Not Applicable</option>
<option value="0" <?php if($usprod['no_eldersister']=='0'){?>selected="selected";<?php }?>>0</option>
<option value="1"  <?php if($usprod['no_eldersister']=='1'){?>selected="selected";<?php }?>>1</option>
<option value="2"  <?php if($usprod['no_eldersister']=='2'){?>selected="selected";<?php }?>>2</option>
<option value="3"  <?php if($usprod['no_eldersister']=='3'){?>selected="selected";<?php }?>>3</option>
<option value="4"  <?php if($usprod['no_eldersister']=='4'){?>selected="selected";<?php }?>>4</option>
<option value="4 +"  <?php if($usprod['no_eldersister']=='4 +'){?>selected="selected";<?php }?>>4 +</option>
</select></div></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Married elder Sister</span></td>
<td>:</td>
<td><div class="col-sm-12">
<select class="width-80 chosen-select"  name="elder_sis_married" id="elder_sis_married" data-placeholder="Select elder Married Sister..."  style="width:250px;"   >
<option value="">Not Applicable</option>
<option value="No married sister"   <?php if($usprod['married_eldersister']=='No married sister'){?>selected="selected";<?php }?>>No married sister</option>
<option value="One married sister"  <?php if($usprod['married_eldersister']=='One married sister'){?>selected="selected";<?php }?>>One married sister</option>
<option value="Two married sisters"  <?php if($usprod['married_eldersister']=='Two married sisters'){?>selected="selected";<?php }?>>Two married sisters</option>
<option value="Three married sisters"  <?php if($usprod['married_eldersister']=='Three married sisters'){?>selected="selected";<?php }?>>Three married sisters</option>
<option value="Four married sisters"  <?php if($usprod['married_eldersister']=='Four married sisters'){?>selected="selected";<?php }?>>Four married sistes</option>
<option value="Above four married sisters"  <?php if($usprod['elder_sis_married']=='Above four married sisters'){?>selected="selected";<?php }?>>Above four married sisters</option>
</select></div></td>
</tr>



<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Number of brothers</span></td>
<td>:</td>
<td><div class="col-sm-12">
<select class="width-80 chosen-select"  name="no_of_brothers" id="no_of_brothers" data-placeholder="Select Number of brothers..."  style="width:250px;"   >
<option value="">Not Applicable</option>
<option value="0" <?php if($usprod['no_of_brothers']=='0'){?>selected="selected";<?php }?>>0</option>
<option value="1"  <?php if($usprod['no_of_brothers']=='1'){?>selected="selected";<?php }?>>1</option>
<option value="2"  <?php if($usprod['no_of_brothers']=='2'){?>selected="selected";<?php }?>>2</option>
<option value="3"  <?php if($usprod['no_of_brothers']=='3'){?>selected="selected";<?php }?>>3</option>
<option value="4"  <?php if($usprod['no_of_brothers']=='4'){?>selected="selected";<?php }?>>4</option>
<option value="4 +"  <?php if($usprod['no_of_brothers']=='4 +'){?>selected="selected";<?php }?>>4 +</option>
</select></div></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Number of Sisters</span></td>
<td>:</td>
<td><div class="col-sm-9">
<select class="width-80 chosen-select"  name="no_of_sisters" id="no_of_sisters" data-placeholder="Select Number of Sisters..."  style="width:250px;"   >
<option value="">Not Applicable</option>
<option value="0" <?php if($usprod['no_of_sisters']=='0'){?>selected="selected";<?php }?>>0</option>
<option value="1"  <?php if($usprod['no_of_sisters']=='1'){?>selected="selected";<?php }?>>1</option>
<option value="2"  <?php if($usprod['no_of_sisters']=='2'){?>selected="selected";<?php }?>>2</option>
<option value="3"  <?php if($usprod['no_of_sisters']=='3'){?>selected="selected";<?php }?>>3</option>
<option value="4"  <?php if($usprod['no_of_sisters']=='4'){?>selected="selected";<?php }?>>4</option>
<option value="4 +"  <?php if($usprod['no_of_sisters']=='4 +'){?>selected="selected";<?php }?>>4 +</option>
</select></div></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Married brothers</span></td>
<td>:</td>
<td>
<div class="col-sm-12">
<select class="width-80 chosen-select"  name="bro_married" id="bro_married" data-placeholder="Select Married Brothers..."  style="width:250px;"   >
<option value="">Not Applicable</option>
<option value="No married brother"  <?php if($usprod['bro_married']=='No married brother'){?>selected="selected";<?php }?>>No married brother</option>
<option value="One married brother" <?php if($usprod['bro_married']=='One married brother'){?>selected="selected";<?php }?>>One married brother</option>
<option value="Two married brother" <?php if($usprod['bro_married']=='Two married brother'){?>selected="selected";<?php }?>>Two married brother</option>
<option value="Three married brother" <?php if($usprod['bro_married']=='Three married brother'){?>selected="selected";<?php }?>>Three married brother</option>
<option value="Four married brother" <?php if($usprod['bro_married']=='Four married brother'){?>selected="selected";<?php }?>>Four married brothers</option>
<option value="Above four married brother" <?php if($usprod['bro_married']=='Above four married brother'){?>selected="selected";<?php }?>>Above four married brother</option>
</select></div></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Married Sisters</span></td>
<td>:</td>
<td>
<div class="col-sm-9">
<select class="width-80 chosen-select"  name="sis_married" id="sis_married" data-placeholder="Select Married Sisters..."  style="width:250px;"   >
<option value="">Not Applicable</option>
<option value="No married sister"   <?php if($usprod['sis_married']=='No married sister'){?>selected="selected";<?php }?>>No married sister</option>
<option value="One married sister"  <?php if($usprod['sis_married']=='One married sister'){?>selected="selected";<?php }?>>One married sister</option>
<option value="Two married sisters"  <?php if($usprod['sis_married']=='Two married sisters'){?>selected="selected";<?php }?>>Two married sisters</option>
<option value="Three married sisters"  <?php if($usprod['sis_married']=='Three married sisters'){?>selected="selected";<?php }?>>Three married sisters</option>
<option value="Four married sisters"  <?php if($usprod['sis_married']=='Four married sisters'){?>selected="selected";<?php }?>>Four married sistes</option>
<option value="Above four married sisters"  <?php if($usprod['sis_married']=='Above four married sisters'){?>selected="selected";<?php }?>>Above four married sisters</option>
</select></div></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Skin Color</span></td>
<td>:</td>
<td><div class="col-sm-12">
<select class="width-80 chosen-select"  name="skin" id="skin" data-placeholder="Select Skin Color..."  style="width:250px;"   >
<option value="">- Select -</option>
<option value="Very Fair" <?php if($usprod['skin']=='Very Fair'){?>selected="selected";<?php }?>>Very Fair</option>
<option value="Fair" <?php if($usprod['skin']=='Fair'){?>selected="selected";<?php }?>>Fair</option>
<option value="Wheatish" <?php if($usprod['skin']=='Wheatish'){?>selected="selected";<?php }?>>Wheatish</option>
<option value="Wheatish Medium" <?php if($usprod['skin']=='Wheatish Medium'){?>selected="selected";<?php }?>>Wheatish Medium</option>
<option value="Wheatish Brown" <?php if($usprod['skin']=='Wheatish Brown'){?>selected="selected";<?php }?>>Wheatish Brown</option>
<option value="Dark" <?php if($usprod['skin']=='Dark'){?>selected="selected";<?php }?>>Dark</option>
</select></div></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Height</span></td>
<td>:</td>
<td><div class="col-sm-9">
<select class="width-80 chosen-select"  name="height" id="height" data-placeholder="Select Height..."  style="width:250px;"   >
<option  value="0"  <?php if($usprod['height']=='0'){?>selected="selected";<?php }?>> Select Height </option>
<option value="below 4ft"  <?php if($usprod['height']=='below 4ft'){?>selected="selected";<?php }?>>below 4ft</option>
<option value="4 Ft - 121 Cm"  <?php if($usprod['height']=='below'){?>selected="selected";<?php }?>>4 Ft - 121 Cm</option>
<option value="4 Ft 1 In - 124 Cm"  <?php if($usprod['height']=='4 Ft 1 In - 124 Cm'){?>selected="selected";<?php }?>>4 Ft 1 In - 124 Cm</option>
<option value="4 Ft 2 In - 127 Cm"  <?php if($usprod['height']=='4 Ft 2 In - 127 Cm'){?>selected="selected";<?php }?>>4 Ft 2 In - 127 Cm</option>
<option value="4 Ft 3 In - 129 Cm"  <?php if($usprod['height']=='4 Ft 3 In - 129 Cm'){?>selected="selected";<?php }?>>4 Ft 3 In - 129 Cm</option>
<option value="4 Ft 4 In - 132 Cm"  <?php if($usprod['height']=='4 Ft 4 In - 132 Cm'){?>selected="selected";<?php }?>>4 Ft 4 In - 132 Cm</option>
<option value="4 Ft 5 In - 134 Cm"  <?php if($usprod['height']=='4 Ft 5 In - 134 Cm'){?>selected="selected";<?php }?>>4 Ft 5 In - 134 Cm</option>
<option value="4 Ft 6 In - 137 Cm" <?php if($usprod['height']=='4 Ft 6 In - 137 Cm'){?>selected="selected";<?php }?>>4 Ft 6 In - 137 Cm</option>
<option value="4 Ft 7 In - 139 Cm" <?php if($usprod['height']=='4 Ft 7 In - 139 Cm'){?>selected="selected";<?php }?>>4 Ft 7 In - 139 Cm</option>
<option value="4 Ft 8 In - 142 Cm" <?php if($usprod['height']=='4 Ft 8 In - 142 Cm'){?>selected="selected";<?php }?>>4 Ft 8 In - 142 Cm</option>
<option value="4 Ft 9 In - 144 Cm" <?php if($usprod['height']=='4 Ft 9 In - 144 Cm'){?>selected="selected";<?php }?>>4 Ft 9 In - 144 Cm</option>
<option value="4 Ft 10 In - 147 Cm" <?php if($usprod['height']=='4 Ft 10 In - 147 Cm'){?>selected="selected";<?php }?>>4 Ft 10 In - 147 Cm</option>
<option value="4 Ft 11 In - 149 Cm" <?php if($usprod['height']=='4 Ft 11 In - 149 Cm'){?>selected="selected";<?php }?>>4 Ft 11 In - 149 Cm</option>
<option value="5 Ft - 152 Cm" <?php if($usprod['height']=='5 Ft - 152 Cm'){?>selected="selected";<?php }?>>5 Ft - 152 Cm</option>
<option value="5 Ft 1 In - 154 Cm" <?php if($usprod['height']=='5 Ft 1 In - 154 Cm'){?>selected="selected";<?php }?>>5 Ft 1 In - 154 Cm</option>
<option value="5 Ft 2 In - 157 Cm" <?php if($usprod['height']=='5 Ft 2 In - 157 Cm'){?>selected="selected";<?php }?>>5 Ft 2 In - 157 Cm</option>
<option value="5 Ft 3 In - 160 Cm" <?php if($usprod['height']=='5 Ft 3 In - 160 Cm'){?>selected="selected";<?php }?>>5 Ft 3 In - 160 Cm</option>
<option value="5 Ft 4 In - 162 Cm" <?php if($usprod['height']=='5 Ft 4 In - 162 Cm'){?>selected="selected";<?php }?>>5 Ft 4 In - 162 Cm</option>
<option value="5 Ft 5 In - 165 Cm" <?php if($usprod['height']=='5 Ft 5 In - 165 Cm'){?>selected="selected";<?php }?>>5 Ft 5 In - 165 Cm</option>
<option value="5 Ft 6 In - 167 Cm" <?php if($usprod['height']=='5 Ft 6 In - 167 Cm'){?>selected="selected";<?php }?>>5 Ft 6 In - 167 Cm</option>
<option value="5 Ft 7 In - 170 Cm" <?php if($usprod['height']=='5 Ft 7 In - 170 Cm'){?>selected="selected";<?php }?>>5 Ft 7 In - 170 Cm</option>
<option value="5 Ft 8 In - 172 Cm" <?php if($usprod['height']=='5 Ft 8 In - 172 Cm'){?>selected="selected";<?php }?>>5 Ft 8 In - 172 Cm</option>
<option value="5 Ft 9 In - 175 Cm" <?php if($usprod['height']=='5 Ft 9 In - 175 Cm'){?>selected="selected";<?php }?>>5 Ft 9 In - 175 Cm</option>
<option value="5 Ft 10 In - 177 Cm" <?php if($usprod['height']=='5 Ft 10 In - 177 Cm'){?>selected="selected";<?php }?>>5 Ft 10 In - 177 Cm</option>
<option value="5 Ft 11 In - 180 Cm" <?php if($usprod['height']=='5 Ft 11 In - 180 Cm'){?>selected="selected";<?php }?>>5 Ft 11 In - 180 Cm</option>
<option value="6 Ft - 182 Cm" <?php if($usprod['height']=='6 Ft - 182 Cm'){?>selected="selected";<?php }?>>6 Ft - 182 Cm</option>
<option value="6 Ft 1 In - 185 Cm" <?php if($usprod['height']=='6 Ft 1 In - 185 Cm'){?>selected="selected";<?php }?>>6 Ft 1 In - 185 Cm</option>
<option value="6 Ft 2 In - 187 Cm" <?php if($usprod['height']=='6 Ft 2 In - 187 Cm'){?>selected="selected";<?php }?>>6 Ft 2 In - 187 Cm</option>
<option value="6 Ft 3 In - 190 Cm" <?php if($usprod['height']=='6 Ft 3 In - 190 Cm'){?>selected="selected";<?php }?>>6 Ft 3 In - 190 Cm</option>
<option value="6 Ft 4 In - 193 Cm" <?php if($usprod['height']=='6 Ft 4 In - 193 Cm'){?>selected="selected";<?php }?>>6 Ft 4 In - 193 Cm</option>
<option value="6 Ft 5 In - 195 Cm" <?php if($usprod['height']=='6 Ft 5 In - 195 Cm'){?>selected="selected";<?php }?>>6 Ft 5 In - 195 Cm</option>
<option value="6 Ft 6 In - 198 Cm" <?php if($usprod['height']=='6 Ft 6 In - 198 Cm'){?>selected="selected";<?php }?>>6 Ft 6 In - 198 Cm</option>
<option value="6 Ft 7 In - 200 Cm" <?php if($usprod['height']=='6 Ft 7 In - 200 Cm'){?>selected="selected";<?php }?>>6 Ft 7 In - 200 Cm</option>
<option value="6 Ft 8 In - 203 Cm" <?php if($usprod['height']=='6 Ft 8 In - 203 Cm'){?>selected="selected";<?php }?>>6 Ft 8 In - 203 Cm</option>
<option value="6 Ft 9 In - 205 Cm" <?php if($usprod['height']=='6 Ft 9 In - 205 Cm'){?>selected="selected";<?php }?>>6 Ft 9 In - 205 Cm</option>
<option value="6 Ft 10 In - 208 Cm" <?php if($usprod['height']=='6 Ft 10 In - 208 Cm'){?>selected="selected";<?php }?>>6 Ft 10 In - 208 Cm</option>
<option value="6 Ft 11 In - 210 Cm" <?php if($usprod['height']=='6 Ft 11 In - 210 Cm'){?>selected="selected";<?php }?>>6 Ft 11 In - 210 Cm</option>
<option value="7 Ft - 213 Cm" <?php if($usprod['height']=='7 Ft - 213 Cm'){?>selected="selected";<?php }?>>7 Ft - 213 Cm</option>
</select></div></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Company Name</span></td>
<td>:</td>
<td><input id="job_cmpy" class="col-xs-10 col-sm-12" type="text" name="job_cmpy" value="<?php echo $usprod['job_cmpy']; ?>" placeholder="Company Name">
</td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Job Details</span></td>
<td>:</td>
<td><input id="job" class="col-xs-10 col-sm-10" type="text" name="job" value="<?php echo $usprod['job']; ?>" placeholder="Job Details"></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Job Location</span></td>
<td>:</td>
<td><input id="job_loc" class="col-xs-10 col-sm-12" type="text" name="job_loc" value="<?php echo $usprod['job_loc']; ?>" placeholder="Job Location"></td>
<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Salary</span></td>
<td>:</td>
<td><input id="salary" class="col-xs-10 col-sm-10" type="text" name="salary" value="<?php echo $usprod['salary']; ?>" placeholder="Salary"></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Address</span></td>
<td>:</td>
<td colspan="4"><textarea name="addr" id="addr" style="width: 562px; height: 127px; resize:none;"><?php echo $usprod['address']; ?></textarea></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Self Description</span></td>
<td>:</td>
<td colspan="4"><textarea name="self_desc" id="self_desc" style="width: 562px; height: 127px; resize:none;"><?php echo $usprod['self_desc']; ?></textarea></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Expectation</span></td>
<td>:</td>
<td colspan="4"><textarea name="expectation" id="expectation" style="width: 562px; height: 127px; resize:none;"><?php echo $usprod['expectation']; ?></textarea></td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Dosam</span></td>
<td>:</td>
<td colspan="4">
<label><input  id="dosam" type="radio" value="sevvai dosam" name="dosam" class="ace" <?php if($usprod['dosam']=='sevvai dosam') { ?> checked="checked" <?php } ?>/>
<span class="lbl">Sevvai Dosam</span></label>
<label><input  id="dosam" type="radio" value="ragu dosam" name="dosam" class="ace" <?php if($usprod['dosam']=='ragu dosam') { ?>checked="checked" <?php } ?> />
<span class="lbl">Ragu Dosam</span></label>
<label><input  id="dosam" type="radio" value="sevvai+ragu dosam" name="dosam" class="ace" <?php if($usprod['dosam']=='sevvai+ragu dosam') { ?>checked="checked" <?php } ?> />
<span class="lbl">Sevvai+Ragu Dosam</span></label>
<label><input  id="dosam" type="radio" value="none" name="dosam" class="ace" <?php if($usprod['dosam']=='none') { ?>checked="checked" <?php } ?> />
<span class="lbl">None</span></label>
</td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Description(if any dosam)</span></td>
<td>:</td>
<td colspan="4"><textarea name="self_dosam" id="self_dosam" style="width: 562px; height: 127px; resize:none;"><?php echo $usprod['self_dosam']; ?></textarea></td>
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
<?php
$uploadedfile=$usprod['uploadedfile'];
if($uploadedfile!='')
{
?>
<a href="../profile/<?php echo $usprod['uploadedfile']; ?>" data-fancybox-group="gallery" title="<?php echo  ucwords($usprod['name']); ?>" class="fancybox" >
<img src="../profile/<?php echo $usprod['uploadedfile']; ?>" height="300" width="300" /></a>
<a href="delete_photo.php?userid=<?php echo  $usprod['id']; ?>&photo_no=1&photo_name=<?php echo $usprod['uploadedfile'];  ?>" onClick="return confirm('Are you sure you want to delete?')">Delete Photo</a>
<?php } else { ?>
<span style="color:#FF0000; font-weight:bold; font-size:14px;">Profile picture not yet uploaded</span>
<?php } ?>
<input type="hidden" name="picture" id="picture" value="<?php echo $usprod['uploadedfile']; ?>" />
<input name="image1"  type="file"  id="image1"  />To Change Profile Picture
</td>
</tr>

<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Profile Picture 2</span></td>
<td>:</td>
<td colspan="4">
<?php
$second_upload=$usprod['second_upload'];
if($second_upload!='')
{
?>
<a href="../profile/<?php echo $usprod['second_upload']; ?>" data-fancybox-group="gallery" title="<?php echo  ucwords($usprod['name']); ?>" class="fancybox" >
<img src="../profile/<?php echo $usprod['second_upload']; ?>" height="300" width="300" /></a>
<a href="delete_photo.php?userid=<?php echo  $usprod['id']; ?>&photo_no=2&photo_name=<?php echo $usprod['second_upload'];  ?>" onClick="return confirm('Are you sure you want to delete?')">Delete Photo</a>
<?php } else { ?>
<span style="color:#FF0000; font-weight:bold; font-size:14px;">Profile picture not yet uploaded</span>
<?php } ?>
<input type="hidden" name="picture2" id="picture2" value="<?php echo $usprod['second_upload']; ?>" />
<input name="image3"  type="file"  id="image3"  />To Change Profile Picture
</td>
</tr>

<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Horoscope</span></td>
<td>:</td>
<td colspan="4">
<?php
$horo=$usprod['horo'];
if($horo!='')
{
?>
<a href="horo/<?php echo $usprod['horo']; ?>" data-fancybox-group="gallery" title="<?php echo  ucwords($usprod['name']); ?>" class="fancybox" >
<img src="horo/<?php echo $usprod['horo']; ?>" height="300" width="500" /></a>
<?php } else { ?>
<span style="color:#FF0000; font-weight:bold;">Horoscope not yet uploaded</span>
<?php
}
?>
<input type="hidden" name="horo" id="horo" value="<?php echo $usprod['horo']; ?>" />
<input name="image2"  type="file"  id="image2"  />To Change Horoscope
</td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Horoscope</span></td>
<td>:</td>
<td colspan="4">

<table width="296" height="106" style="margin-left:20px; border:solid 1px #000000;">
<tr  style="border:solid 1px #000000;">
<td width="70" style="border:solid 1px #000000;"><input type="text" name="r1" id="r1" style="width:60px; margin-left:5px;" value="<?php echo $usprod['r1']; ?>" /></td>
<td width="65" style="border:solid 1px #000000;"><input type="text" name="r2" id="r2" style="width:55px; margin-left:5px;" value="<?php echo $usprod['r2']; ?>" /></td>
<td width="65" style="border:solid 1px #000000;"><input type="text" name="r3" id="r3" style="width:55px; margin-left:5px;" value="<?php echo $usprod['r3']; ?>" /></td>
<td width="76" style="border:solid 1px #000000;"><input type="text" name="r4" id="r4" style="width:66px; margin-left:5px;" value="<?php echo $usprod['r4']; ?>" /></td>
</tr>
<tr>
<td style="border:solid 1px #000000;"><input type="text" name="r5" id="r5" style="width:60px; margin-left:5px;" value="<?php echo $usprod['r5']; ?>" /></td>
<td colspan="2" rowspan="2"><p style="margin-left:50px; font-weight:bold;">Raasi</p></td>
<td style="border:solid 1px #000000;"><input type="text" name="r6" id="r6" style="width:66px; margin-left:5px;" value="<?php echo $usprod['r6']; ?>" /></td>
</tr>
<tr>
<td style="border:solid 1px #000000;"><input type="text" name="r7" id="r7" style="width:60px; margin-left:5px;" value="<?php echo $usprod['r7']; ?>" /></td>
<td style="border:solid 1px #000000;"><input type="text" name="r8" id="r8" style="width:66px; margin-left:5px;" value="<?php echo $usprod['r8']; ?>" /></td>
</tr>
<tr  style="border:solid 1px #000000;">
<td width="70" style="border:solid 1px #000000;"><input type="text" name="r9" id="r9" style="width:60px; margin-left:5px;" value="<?php echo $usprod['r9']; ?>" /></td>
<td width="65" style="border:solid 1px #000000;"><input type="text" name="r10" id="r10" style="width:55px; margin-left:5px;" value="<?php echo $usprod['r10']; ?>" /></td>
<td width="65" style="border:solid 1px #000000;"><input type="text" name="r11" id="r11" style="width:55px; margin-left:5px;" value="<?php echo $usprod['r11']; ?>" /></td>
<td width="76" style="border:solid 1px #000000;"><input type="text" name="r12" id="r12" style="width:66px; margin-left:5px;" value="<?php echo $usprod['r12']; ?>" /></td>
</tr>
</table>
</td>
</tr>
<?php $p_select=$usprod['p_select']; ?>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Select Profile</span></td>
<td>:</td>
<td colspan="4">
<div class="checkbox">
<label><input class="ace" type="checkbox" name="p_select" id="p_select" value="1" <?php if($p_select=='1') {  ?> checked <?php } ?>><span class="lbl"> Select</span></label>
</div>
</td>
</tr>
<?php $premium_customer=$usprod['premium_customer']; ?>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Premium Customer</span></td>
<td>:</td>
<td colspan="4">
<div class="checkbox">
<label><input class="ace" type="checkbox" name="premium_customer" id="premium_customer" value="1" <?php if($premium_customer=='1') {  ?> checked <?php } ?>><span class="lbl"> Select</span></label>
</div>
</td>
</tr>
<tr>
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;"></span></td>
<td></td>
<td colspan="4">
<span class="input-group-btn">
<button type="submit" name="submit" id="submit" class="btn btn-purple btn-sm">Save Changes<i class="icon-save  icon-on-right bigger-110"></i></button>
</span>
</td>
</tr>
</table>

</form>
</div><!-- /.col -->
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
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<!-- inline scripts related to this page -->
		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/date-time/moment.min.js"></script>
		<script src="assets/js/date-time/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/jquery.autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>
		<script type="text/javascript">
			jQuery(function($) {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null, null, null,
				  { "bSortable": false }
				] } );
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
				});
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
					var off2 = $source.offset();
					var w2 = $source.width();
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
		</script>
        <script type="text/javascript">
			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
				$(".chosen-select").chosen(); 
				$('#chosen-multiple-style').on('click', function(e){
					var target = $(e.target).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
					 else $('#form-field-select-4').removeClass('tag-input-style');
				});
			
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
				$('textarea[class*=autosize]').autosize({append: "\n"});
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).val('.'+sizing[val]);
					}
				});
				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
				
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1]+"";
						if(! ui.handle.firstChild ) {
							$(ui.handle).append("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>");
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('a').on('blur', function(){
					$(this.firstChild).hide();
				});
				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				$( "#eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
					});
				});
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				$('#id-input-file-3').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-cloud-upload',
					droppable:true,
					thumbnail:'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}

				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
			
				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var before_change
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "icon-picture";
						before_change = function(files, dropped) {
							var allowed_files = [];
							for(var i = 0 ; i < files.length; i++) {
								var file = files[i];
								if(typeof file === "string") {
									//IE8 and browsers that don't support File Object
									if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
								}
								else {
									var type = $.trim(file.type);
									if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
											|| ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for android's default browser which gives an empty string for file.type
										) continue;//not an image so don't keep this file
								}
								allowed_files.push(file);
							}
							if(allowed_files.length == 0) return false;
							return allowed_files;
						}
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "icon-cloud-upload";
						before_change = function(files, dropped) {
							return files;
						}
					}
					var file_input = $('#id-input-file-3');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});
			
			
				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.on('change', function(){
					//alert(this.value)
				});
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'icon-caret-up', icon_down:'icon-caret-down'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'icon-plus smaller-75', icon_down:'icon-minus smaller-75', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
			
				$('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				$('input[name=date-range-picker]').daterangepicker().prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				$('#colorpicker1').colorpicker();
				$('#simple-colorpicker-1').ace_colorpicker();
				
				$(".knob").knob();
				
				//we could just set the data-provide="tag" of the element inside HTML, but IE8 fails!
				var tag_input = $('#form-field-tags');
				if(! ( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase())) ) 
				{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.variable_US_STATES,//defined in ace.js >> ace.enable_search_ahead
					  }
					);
				}
				else {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//$('#form-field-tags').autosize({append: "\n"});
				}
				
			
				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					$(this).find('.chosen-container').each(function(){
						$(this).find('a:first-child').css('width' , '210px');
						$(this).find('.chosen-drop').css('width' , '210px');
						$(this).find('.chosen-search input').css('width' , '200px');
					});
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/
			});
		</script>
	</body>
</html>
<?php
}
?>