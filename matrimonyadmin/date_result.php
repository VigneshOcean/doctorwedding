<?php
include("../include/connect.php");
session_start();
$id=$_SESSION['id'];
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '1');
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
<title>Happy Marriage:Search Result</title>
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
function validlogin()
{
var x=document.getElementById("caste").value;
if(x=="null" || x=="")
{
alert("Please Select Caste Name");
return false; 
}
var y=document.getElementById("subcaste").value;
if(y=="null" || y=="")
{
alert("Please Enter Subcaste Name");
return false; 
}
return true;
}
</script>
<style type="text/css">
.paginate {
font-family:Arial, Helvetica, sans-serif;
	padding: 3px;
	margin: 3px;
}

.paginate a {
	padding:2px 5px 2px 5px;
	margin:2px;
	border:1px solid #999;
	text-decoration:none;
	color: #0099FF;
}
.paginate a:hover, .paginate a:active {
	border: 1px solid #999;
	color: #3300CC;
}
.paginate span.current {
    margin: 2px;
	padding: 2px 5px 2px 5px;
		border: 1px solid #999;
		
		font-weight: bold;
		background-color: #999;
		color: #FFF;
	}
	.paginate span.disabled {
		padding:2px 5px 2px 5px;
		margin:2px;
		border:1px solid #eee;
		color:#DDD;
	}
.searching_jo
{
  background: none repeat scroll 0 0 #FFFFCC;
    border: 1px solid #006699;
    border-radius: 10px 10px 10px 10px;
    margin-bottom: 5px;
    margin-left: 38px;
    padding: 5px;
    width: 813px;
}


</style>
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

<div class="page-header"><h1>Search Results</h1></div>   








<div class="row"><div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<?php
$from_date=$_SESSION['from_date1'];
$to_date=$_SESSION['to_date1'];
if($from_date=='' && $to_date=='')
{
$aa="";
}
if($from_date!='' && $to_date=='')
{
$aa=" where  enquiry_date>='".mysqli_real_escape_string($con,$from_date)."'";
}
if($from_date=='' && $to_date!='')
{
$aa=" where  enquiry_date<='".mysqli_real_escape_string($con,$to_date)."'";
}
if($from_date!='' && $to_date!='')
{
$aa=" where  enquiry_date>='".mysqli_real_escape_string($con,$from_date)."' and enquiry_date<='".mysqli_real_escape_string($con,$to_date)."'";
}
?>
<?php
   $tableName="register";
   $targetpage = "date_result.php"; 	
	$limit = 20; 
	//echo "SELECT COUNT(*) as num FROM $tableName";
	//echo "SELECT COUNT(*) as num FROM $tableName ORDER BY id DESC";
	$query = "SELECT COUNT(*) as num FROM $tableName ".$aa;
	$res = mysqli_query($con,$query);
	if($res) {
		$total_pages_row = mysqli_fetch_array($res);
		$total_pages = $total_pages_row['num'];
	} else {
		$total_pages = 0;
	}
	//echo $total_pages;
	$stages = 3;
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	if($page < 1) { $page = 1; }
	$start = ($page - 1) * $limit; 
    // Get page data
	//echo "SELECT * FROM $tableName LIMIT $start, $limit";exit;
	$query1 = "SELECT * FROM $tableName ".$aa." order by valid_status desc LIMIT $start, $limit";
	$result = mysqli_query($con,$query1);
	// Initial page num setup
	$prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = $limit > 0 ? ceil($total_pages/$limit) : 0;		
	$LastPagem1 = $lastpage - 1;					
	
	$paginate = '';
	if($lastpage > 1)
	{	
    $paginate .= "<div class='paginate'>";
        if ($page > 1)
		{
			$query1 = "SELECT * FROM $tableName  ".$aa." order by valid_status desc LIMIT $start, $limit";
				$result = mysqli_query($con,$query1);
			$paginate.= "<a href='$targetpage?page=$prev'>previous</a>";
		}else{
			$paginate.= "<span class='disabled'>previous</span>";	}

		// Pages	
		if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
			//echo $counter;
				if ($counter == $page)
				{
					$paginate.= "<span class='current'>$counter</span>";
				}else{
				$query1 = "SELECT * FROM $tableName  ".$aa."  order by valid_status desc LIMIT $start, $limit";
				$result = mysqli_query($con,$query1);
					$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
			}
		}
		elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
		{
			// Beginning only hide later pages
			if($page < 1 + ($stages * 2))		
			{
				for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
			}
			// Middle hide some front and some back
			elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
			{
				$paginate.= "<a href='$targetpage?page=1'>1</a>";
				$paginate.= "<a href='$targetpage?page=2'>2</a>";
				$paginate.= "...";
				for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
			}
			// End only hide early pages
			else
			{
				$paginate.= "<a href='$targetpage?page=1'>1</a>";
				$paginate.= "<a href='$targetpage?page=2'>2</a>";
				$paginate.= "...";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
				}
			}
		}
		// Next
		if ($page < $counter - 1)
		{ 
		$query1 = "SELECT * FROM $tableName  ".$aa."  order by valid_status desc  LIMIT $start, $limit";
				$result = mysqli_query($con,$query1);
			$paginate.= "<a href='$targetpage?page=$next'>next</a>";
		}else{
			$paginate.= "<span class='disabled'>next</span>";
			}
		$paginate.= "</div>";		
	
}
 //echo $total_pages.' Results';
 // pagination
 echo $paginate;
?>
<form enctype="multipart/form-data" method="post" action="goto_search.php" name="frm">
<input id="command" type="hidden" style="width:50px;" name="command" value="date_result.php">
<div align="right">
Goto page no:   
<input id="goto" type="text" style="width:50px;" name="goto">
<input type="submit" value="go" name="submit">
</div>
</form>
    <ul>
<div id="accordion">	
			
			<?php
            $i=1;
			if(mysqli_num_rows($result)>0)
			 {
			while($usprod=mysqli_fetch_array($result)){
			$id=$usprod['id'];
			?>
<div class="row">
<div class="col-xs-12">
<p style="float:right;">
<a href="like_details.php?userid=<?php echo $usprod['id'];?>" target="_blank"  title="Like details" class="btn btn-app btn-danger   btn-xs"><i class="icon-heart  bigger-160"></i>Likes</a>
<a href="sendmail.php?userid=<?php echo $usprod['id'];?>"   title="send contact details to email" target="_blank" class="btn btn-app btn-success   btn-xs"><i class="icon-cloud-upload  bigger-160"></i>Contact</a>
<a href="print_email.php?userid=<?php echo $usprod['id'];?>" title="Print for Email" target="_blank"  class="btn btn-app btn-sm btn-xs"><i class="icon-envelope  bigger-160"></i>Email</a>
<a href="take_snap.php?user_id=<?php echo $usprod['id'];?>" title="Download as Image" target="_blank"  class="btn btn-app btn-purple btn-xs"><i class="icon-download-alt  bigger-160"></i>Download</a>
<a href="sample.php?user_id=<?php echo $usprod['id'];?>" target="_blank"  title="Take Print" class="btn btn-app btn-pink   btn-xs"><i class="icon-print  bigger-160"></i>Print</a>
<a href="validity.php?userid=<?php echo $usprod['id']; ?>"  target="_blank"   title="Set Validity for Profile"  class="btn btn-app btn-purple  btn-xs"><i class="icon-cog bigger-160"></i>Validity</a>
<a href="walletsetup.php?userid=<?php echo $usprod['id']; ?>"  target="_blank"   title="Set Wallet for Profile"  class="btn btn-app  btn-xs" style="background: #4c4ae1 !important;" ><i class="icon-money bigger-160"></i>Wallet</a>
<a href="get_contact_history_list.php?senderid=<?php echo $usprod['id']; ?>"  target="_blank"   title="Contact History"  class="btn btn-app  btn-xs" style="background: #c365cf !important;" ><i class="icon-user bigger-160"></i>Contact</a>
<a href="edit.php?userid=<?php echo $usprod['id']; ?>"  target="_blank" title="Edit Profile"  class="btn btn-app btn-yellow btn-xs"><i class="icon-edit bigger-160"></i>Edit</a>
<a href="delete_profile1.php?id=<?php echo $usprod['id'];?>" onClick="return confirm('Are you sure you want to delete?')" title="Delete Profile" target="_blank" class="btn btn-app btn-danger btn-xs"  style="margin-left: 150px;"><i class="icon-trash bigger-160"></i>Delete</a>
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
<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Profile Picture</span></td>
<td>:</td>
<td colspan="4">
<a href="../profile/<?php echo $usprod['uploadedfile']; ?>" data-fancybox-group="gallery" title="<?php echo  ucwords($usprod['name']); ?>" class="fancybox" >
<img src="../profile/<?php echo $usprod['uploadedfile']; ?>" height="300" width="300" /></a>
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
</table>
<?php
}
}
?>
</div>
</ul>

</div><!-- /.col -->
</div> 
                        
                     	</div><!-- /.page-content -->
				</div><!-- /.main-content -->
				<!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>			</a>		</div><!-- /.main-container -->
<script src="../../../../ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
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