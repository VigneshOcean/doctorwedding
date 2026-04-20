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
$c_id=$_REQUEST['c_id'];
$e=mysqli_query($con,"select * from  education where id='$c_id'");
$row_e=mysqli_fetch_array($e);
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8" />
<title>Happy Marriage:Edit Education</title>
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
						<div class="page-header">
							<h1>Edit Caste Name</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								 <!-- /row -->
<form name="addcaste" action="save.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="command" id="command" value="edit_education"/>
<input type="hidden" name="c_id" id="c_id" value="<?php echo $c_id; ?>"/>
<div class="col-sm-4">
<div class="widget-box">
<div class="widget-header"><h4>Edit Education Name</h4></div>
<div class="widget-body"><div class="widget-main">

<div><label for="form-field-select-3">Education Name</label><br />
<input type="text" name="education" id="education" value="<?php echo $row_e['education']; ?>" required />
</div>	                    
  <div><label for="form-field-select-3">Amount</label><br />
<input type="text" name="cost" id="cost" value="<?php echo $row_e['cost']; ?>"  required />
</div>	                                          
<div class="space-2"></div>
<hr />
<div class="space-2"></div>

<span class="input-group-btn">
<button type="submit" name="submit" id="submit" class="btn btn-purple btn-sm">Edit Education<i class="icon-edit  icon-on-right bigger-110"></i></button>
&nbsp;&nbsp;&nbsp;
<a href="view_education.php">
<button type="button" name="reset" id="reset" class="btn btn-red btn-sm">Back<i class="icon-refresh  icon-on-right bigger-110"></i></button>
</a>
</span>          
              
</div></div></div>
</div>
</form>
				
<!--**************Lower Content Start**************-->

<!--**************Lower Content End**************-->



								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
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