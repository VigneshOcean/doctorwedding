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
$f=mysqli_query($con,"select * from  admin where id='$id'");
$row_f=mysqli_fetch_array($f);
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8" />
<title>Happy Marriage:Change Password</title>
<meta name="description" content="Static &amp; Dynamic Tables" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
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
function valid()
{
	var x=document.getElementById("c_pass").value;
	if(x=="null" || x=="")
	{
	alert("Please Enter Current Password");
	return false; 
	}
	var y=document.getElementById("n_pass").value;
	if(y=="null" || y=="")
	{
	alert("Please Enter New Password to set");
	return false; 
	}
	var z=document.getElementById("r_pass").value;
	if(z=="null" || z=="")
	{
	alert("Please Enter Confirmation Password");
	return false; 
	}
return true;
}
</script>
<script language="javascript">
function pswcheck()
{
var psw=document.getElementById("n_pass").value;
var rpsw=document.getElementById("r_pass").value;
if(psw!=rpsw)
{
alert("password Mismatch");
document.getElementById("n_pass").value="";
document.getElementById("r_pass").value="";
document.getElementById("n_pass").focus();
}
}
</script>
<script language="javascript">
var xmlhttp
function cpswcheck(str)
{
if (str.length==0)
  {
  document.getElementById("cp").innerHTML="";
  return;
  }
xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Your browser does not support XMLHTTP!");
  return;
  }
var url="pass_check.php";
url=url+"?q="+str;
//alert(url);
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChanged_unameck;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}
function stateChanged_unameck()
{
if (xmlhttp.readyState==4)
  {
  document.getElementById("cp").innerHTML=xmlhttp.responseText;
  if(xmlhttp.responseText=="Password Incorrect")
  {
  document.getElementById("c_pass").value="";
  }
  else
  {
  }
  }
}
function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
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
							<h1>Change Password</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								 <!-- /row -->
<form class="form-horizontal"  name="frm" action="save.php" method="post" enctype="multipart/form-data" onSubmit="return valid();">  
<input type="hidden" name="command" id="command" value="change_password" />
<input type="hidden" name="tab_id" id="tab_id" value="<?php echo $row_f['id']; ?>" />
<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-6">Current Password</label>
<div class="col-sm-9"><input type="password" id="c_pass" name="c_pass"  placeholder="Current Password" class="col-xs-10 col-sm-5" onBlur="cpswcheck(this.value);"  /><div id="cp" class="cp"></div></div></div>
<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-6">New Password</label>
<div class="col-sm-9"><input type="password" id="n_pass" name="n_pass"  placeholder="New Password" class="col-xs-10 col-sm-5"  /></div></div>
<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-6">Confirmation Password</label>
<div class="col-sm-9"><input type="password" id="r_pass" name="r_pass"  placeholder="Confirmation Password" class="col-xs-10 col-sm-5" onBlur="pswcheck();"   /></div></div>

<div class="clearfix form-actions"><div class="col-md-offset-3 col-md-9">
<button class="btn btn-info" type="submit"><i class="icon-ok bigger-110"></i>Update</button>	
<button class="btn" type="reset"><i class="icon-undo bigger-110"></i>Cancel</button>
</div></div>
</form>	
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
		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<!-- inline scripts related to this page -->
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
	</body>
</html>
<?php
}
?>