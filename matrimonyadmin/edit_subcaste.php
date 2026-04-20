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
$e=mysqli_query($con,"select * from  subcaste where id='$c_id'");
$row_e=mysqli_fetch_array($e);
$caste_id=$row_e['caste'];
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8" />
<title>Happy Marriage:Edit SubCaste</title>
<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.css" />
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
							<h1>Edit SubCaste Name</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								 <!-- /row -->
<form name="addcaste" action="save.php" method="post" enctype="multipart/form-data"  onSubmit="return validlogin();">
<input type="hidden" name="command" id="command" value="edit_subcaste"/>
<input type="hidden" name="c_id" id="c_id" value="<?php echo $c_id; ?>"/>
<div class="col-sm-4">
<div class="widget-box">
<div class="widget-header"><h4>Edit SubCaste Name</h4></div>
<div class="widget-body"><div class="widget-main">

<div><label for="form-field-select-3">Select Caste Name</label><br />
<select class="width-80 chosen-select"  name="caste" id="caste" data-placeholder="Select Caste Name...">
<option value="">--Select Caste Name--</option>
<?php
$man=mysqli_query($con,"select * from caste order by caste asc");
while($man1=mysqli_fetch_array($man))
{
$cas=$man1['id'];
?>
<option value="<?php echo $man1['id']; ?>" <?php if($caste_id==$cas) { ?> selected<?php } ?>><?php echo ucwords($man1['caste']); ?></option>
<?php
}
?>
</select>
</div>	                    
<div class="space-2"></div>
<hr />
<div class="space-2"></div>
<div><label for="form-field-select-3">SubCaste Name</label><br />
<input type="text" name="subcaste" id="subcaste" value="<?php echo $row_e['subcaste']; ?>" />
</div>	                    
<div class="space-2"></div>
<hr />
<div class="space-2"></div>

<span class="input-group-btn">
<button type="submit" name="submit" id="submit" class="btn btn-purple btn-sm">Edit SubCaste<i class="icon-edit  icon-on-right bigger-110"></i></button>
&nbsp;&nbsp;&nbsp;
<a href="view_subcaste.php">
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
<script src="../../../../ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
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
		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		
        <script type="text/javascript">
			jQuery(function($) {
			$(".chosen-select").chosen(); 
				$('#chosen-multiple-style').on('click', function(e){
					var target = $(e.target).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
					 else $('#form-field-select-4').removeClass('tag-input-style');
				});
			
		</script>
	</body>
</html>
<?php
}
?>