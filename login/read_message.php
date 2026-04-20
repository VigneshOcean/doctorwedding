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
$c_id12=$_REQUEST['c_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8" />
<title>Happy Marriage:Read Message</title>
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

<div class="page-header">
<h1>Message Details</h1>
<div align="right"> 
<a href="inbox.php"  title="Backtomailbox" class="icon-2 info-tooltip">
<button class="btn btn-sm btn-danger"><span class="bigger-110 no-text-shadow">Back to mailbox</span></button>
</a>
</div>
</div>   

<div class="row"><div class="col-xs-12">
<?php
$prod=mysqli_query($con, "select* from message where id='$c_id12'");
$usprod=mysqli_fetch_array($prod);         
?>            
<table width="100%" cellpadding="5" cellspacing="5">
<tr>
<td width="18%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Subject</span></td>
<td width="1%">:</td>
<td width="75%"><span style="color:#FF0000; font-size:14px;"><?php echo  ucwords($usprod['subject']); ?></span></td>
</tr>
<tr>
<td width="18%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Message</span></td>
<td width="1%">:</td>
<td width="75%"><span style="color:#FF0000; font-size:14px;"><?php echo  ucwords($usprod['message']); ?></span></td>
</tr>
</table>


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