<?php
include("../include/connect.php");
session_start();
$id=$_SESSION['id'];
error_reporting(0);
if(!isset($_SESSION['id']))
{
echo "<script type=text/javascript>window.location='../index.php?err';</script>";
}
else
{
error_reporting(0);
$uu=mysqli_query($con, "select * from register where id='$id'");
$row_uu=mysqli_fetch_array($uu);
$uu_caste=$row_uu['religion'];
$education_mine=$row_uu['education'];
$valid_string=$row_uu['valid_string'];
$mydob=$row_uu['dob'];
$mygender=$row_uu['gender'];
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
$gender=$_SESSION['gender'];
$from_age=$_SESSION['from_age'];
$to_age=$_SESSION['to_age'];
$education=$_SESSION['education'];
$photo1=$_SESSION['photo1'];

$condition=' where id!=""  and status="1" and govt_job="Yes" ';

if(isset($gender) && $gender!='')
{
   $condition.=' and gender="'.$gender.'" ';
}
if(isset($from_age) && $from_age!='')
{
   $condition.=' and age>="'.$from_age.'" ';
}
if(isset($to_age) && $to_age!='')
{
   $condition.=' and age<="'.$to_age.'" ';
}
if(isset($photo1) && $photo1!='')
{
   if($photo1=='1')
   {
      $condition.=' and uploadedfile="" ';
   }
   if($photo1=='0')
   {
      $condition.=' and uploadedfile!="" ';
   }   
}
//$condition.=" and STR_TO_DATE(dob,'%d/%m/%Y')>=STR_TO_DATE('".$mydob."','%d/%m/%Y')";
//echo $aa;
if($mygender=='male'){
$condition.=" and STR_TO_DATE(dob,'%d/%m/%Y')>=STR_TO_DATE('".$mydob."','%d/%m/%Y')";    
} else {
    $condition.=" and STR_TO_DATE(dob,'%d/%m/%Y')<=STR_TO_DATE('".$mydob."','%d/%m/%Y')";
}
?>
<?php
   $tableName="register";
   $targetpage = "govt_result.php"; 	
	$limit = 1; 
	//echo "SELECT COUNT(*) as num FROM $tableName";
	//echo "SELECT COUNT(*) as num FROM $tableName ORDER BY id DESC";
	$query = "SELECT COUNT(*) as num FROM $tableName ".$condition;
	$total_pages = mysqli_fetch_array(mysqli_query($con, $query));
	//print_r($total_pages);
	$total_pages = $total_pages[num];
	//echo $total_pages;
	$stages = 3;
	$page = mysqli_real_escape_string($con, $_GET['page']);
	//echo $page;
	if($page)
	{
		$start = ($page - 1) * $limit; 
		//echo $start;
	}
	else
	{
		$start = 0;	
		}	
    // Get page data
	//echo "SELECT * FROM $tableName ".$aa." LIMIT $start, $limit";
	$query1 = "SELECT * FROM $tableName ".$condition." LIMIT $start, $limit";
	$result = mysqli_query($con, $query1);
	//echo $query1;
	// Initial page num setup
	if ($page == 0){$page = 1;}
	$prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;					
	
	$paginate = '';
	if($lastpage > 1)
	{	
    $paginate .= "<div class='paginate'>";
        if ($page > 1)
		{
			$query1 = "SELECT * FROM $tableName  ".$condition."  LIMIT $start, $limit";
				$result = mysqli_query($con, $query1);
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
				$query1 = "SELECT * FROM $tableName  ".$condition." LIMIT $start, $limit";
				$result = mysqli_query($con, $query1);
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
		$query1 = "SELECT * FROM $tableName  ".$condition."  LIMIT $start, $limit";
				$result = mysqli_query($con, $query1);
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

<span style="font-weight:bold; color:#006600; margin-left:10%; font-size:18px;">Total number of records as per your search : <?php echo $total_pages; ?> Profiles </span>
<ul>
<div id="accordion">	
<?php
$i=1;
if(mysqli_num_rows($result)>0)
{
while($usprod=mysqli_fetch_array($result))
{
$id=$usprod['id'];
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
}
?>
</div>
</ul>
<?php  echo $paginate; ?>

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
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<!-- inline scripts related to this page -->
		
		
	</body>
</html>
<?php
}
?>