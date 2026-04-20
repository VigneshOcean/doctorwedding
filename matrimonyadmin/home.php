<?php
include("../include/connect.php");
session_start();
$id=$_SESSION['id'];
if(!isset($_SESSION['id']))
{
echo "<script type=text/javascript>window.location='../index.php?err';</script>";
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Dashboard - Home</title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
<link rel="stylesheet" href="assets/css/ace.min.css" />
<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
<script src="assets/js/ace-extra.min.js"></script>
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
</head>
<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
			<?php include("include/header.php"); ?>
		</div>
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>
				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>
<!--*****************Not Need for this project*****************************-->
					<!--<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>
							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>
							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>
							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>
						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>
							<span class="btn btn-info"></span>
							<span class="btn btn-warning"></span>
							<span class="btn btn-danger"></span>
						</div>
					</div>-->
<!--*****************Not Need for this project*****************************-->
				<?php include("include/menu.php"); ?>
					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>
				<div class="main-content">
                    <!--<p>Your Location: <span id="location"></span></p>-->
					<div class="page-content">
						<div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="icon-double-angle-right"></i>
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<div class="alert alert-block alert-success">
<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
<i class="icon-ok green"></i>Welcome to<strong class="green"> Doctor Wedding</strong> !</div>
<div class="row">
<div class="space-6"></div>
<div class="col-sm-7 infobox-container">
<?php
$a=mysqli_query($con,"select * from register");
$count_a=mysqli_num_rows($a);
?>
<div class="infobox infobox-red">
<div class="infobox-icon"><i class="icon-group"></i></div>
<div class="infobox-data"><span class="infobox-data-number"><?php echo  $count_a; ?></span>
<div class="infobox-content" style="color:#DD6566; font-weight:bold;">Total Profiles</div></div>
<!--<div class="stat stat-success">8%</div>-->
</div>
<?php 
$a1=mysqli_query($con,"select * from register where gender='male'");
$count_a1=mysqli_num_rows($a1);
?>
<div class="infobox infobox-blue">
<div class="infobox-icon"><i class="icon-circle-blank"></i></div>
<div class="infobox-data"><span class="infobox-data-number"><?php echo  $count_a1; ?></span>
<div class="infobox-content" style="color:#8CC2E6; font-weight:bold;">Male Profiles</div></div>
</div>
<?php 
$a2=mysqli_query($con,"select * from register where gender='female'");
$count_a2=mysqli_num_rows($a2);
?>										
<div class="infobox infobox-pink">
<div class="infobox-icon"><i class="icon-adjust"></i></div>
<div class="infobox-data"><span class="infobox-data-number"><?php echo  $count_a2; ?></span>
<div class="infobox-content" style="color:#8CC2E6; font-weight:bold;">Female Profiles </div></div>
</div>

<?php
$a3=mysqli_query($con,"select * from caste");
$count_a3=mysqli_num_rows($a3);
?>
<div class="infobox infobox-green">
<div class="infobox-icon"><i class="icon-globe"></i></div>
<div class="infobox-data"><span class="infobox-data-number"><?php echo  $count_a3; ?></span>
<div class="infobox-content" style="color:#AEC95B; font-weight:bold;">No of Caste</div></div>
<!--<div class="stat stat-success">8%</div>-->
</div>

<?php 
$a4=mysqli_query($con,"select * from subcaste");
$count_a4=mysqli_num_rows($a4);
?>
<div class="infobox infobox-orange2">
<div class="infobox-icon"><i class="icon-download-alt"></i></div>
<div class="infobox-data"><span class="infobox-data-number"><?php echo $count_a4; ?></span>
<div class="infobox-content" style="color:#F9A882; font-weight:bold;">No of Sub-Caste</div></div>
</div>

<?php 
$a5=mysqli_query($con,"select * from education");
$count_a5=mysqli_num_rows($a5);
?>										
<div class="infobox infobox-blue2">
<div class="infobox-icon"><i class="icon-certificate"></i></div>
<div class="infobox-data"><span class="infobox-data-number"><?php echo $count_a5; ?></span>
<div class="infobox-content" style="color:#619CCE; font-weight:bold;">Education  List</div></div>
</div>
<?php
$a6=mysqli_query($con,"select *  from contact");
$count_a6=mysqli_num_rows($a6);
?>
<div class="infobox infobox-red">
<div class="infobox-icon"><i class="icon-bell-alt"></i></div>
<div class="infobox-data"><span class="infobox-data-number"><?php echo  $count_a6; ?></span>
<div class="infobox-content" style="color:#DD6566; font-weight:bold;">Enquiry List</div></div>
<!--<div class="stat stat-success">8%</div>-->
</div>

</div>
<div class="vspace-sm"></div>
<!--*****************Pie Chart Start*****************************-->
<div class="col-sm-5">
</div>
<!--**************Pie Chart End*********************-->
</div><!-- /row -->
<div class="hr hr32 hr-dotted"></div>
                                

</div></div></div></div>
</div><a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
</script>
<script type="text/javascript">
if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script>
$(document).ready(function(){
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showLocation);
    }else{ 
        $('#location').html('Geolocation is not supported by this browser.');
    }
});
function showLocation(position){
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    $.ajax({
        type:'POST',
        url:'getLocation.php',
        data:'latitude='+latitude+'&longitude='+longitude,
        success:function(msg){
            if(msg){
               $("#location").html(msg);
            }else{
                $("#location").html('Not Available');
            }
        }
    });
}
</script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/typeahead-bs2.min.js"></script>
<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
	</body>
</html>
<?php } ?>