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
<head><meta charset="utf-8" />
<title>Happy Marriage:Likes details</title>
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

					<?php include('include/menu.php'); ?>
					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>					</div>
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>
				<div class="main-content">

					<div class="page-content">
						<div class="page-header">
							<h1>Likes Details</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
	<style>
#imgLoader { background-color: rgba(0, 0, 0, 0.3);    bottom: 0;    display: none;    left: 0;    outline: 0 none;    overflow: hidden;    position: fixed;    right: 0;    top: 0;    z-index: 1050;	}
.new_loader { margin-top:20%; margin-left:40%; }
</style>							 <!-- /row -->
<div  id="imgLoader">
 <table width="100%" align="center" style="margin-top:25%;">
 <tr><td width="45%"></td><td width="10%" align="center"> <img src="../images/loading.gif"/></td><td width="45%"></td></tr>
 <tr><td colspan="3" align="center"><span style="color:#FFFFFF; font-weight:bold; font-size:16px;">Please Wait!</span></td></tr>
 </table>
</div>
<?php 
//echo "select * from likes where to_id='$id' order by id desc";
$e=mysqli_query($con,"select * from likes where to_id='$id' order by id desc");
$count_e=mysqli_num_rows($e);
?>					
<!--**************Lower Content Start**************-->
<div class="row">
<div class="col-xs-12">
<div class="table-responsive">
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Name</th>
<th>User Id</th>
<th>Caste</th>
<th>Subcaste</th>
<th>Job Details</th>
<th>Salary</th>
<th>Liked On</th>
<th>Send Interest</th>
<th>Delete </th>
</tr>
</thead>
<?php
if($count_e>0)
{
?>
<tbody>
<?php
$i=1;
while($row_e=mysqli_fetch_array($e))
{
$e_id=$row_e['sender_id'];
$send_interest=$row_e['send_interest'];
$iu=mysqli_query($con,"select * from  register where id='$e_id'");
$row_iu=mysqli_fetch_array($iu);
$religion=$row_iu['religion'];
$caste=$row_iu['caste'];
$e1=mysqli_query($con,"select * from  caste where id='$religion'");
$row_e1=mysqli_fetch_array($e1);
$e11=mysqli_query($con,"select * from  subcaste where id='$caste'");
$row_e11=mysqli_fetch_array($e11);
?>
<tr>
<td><?php echo ucwords($row_iu['name']); ?></td>
<td><a href="full_view.php?userid=<?php echo $e_id; ?>"><?php echo $row_iu['username']; ?></a></td>
<td><?php echo ucwords($row_e1['caste']); ?></td>
<td><?php echo ucwords($row_e11['subcaste']); ?></td>
<td><?php echo ucwords($row_iu['job']); ?></td>
<td><?php echo ucwords($row_iu['salary']); ?></td>
<td><?php echo $row_e['c_date']; ?></td>
<td align="center">
<?php
if($send_interest=='yes')
{  
?>
<a class="btn btn-app btn-success btn-xs" href="javascript:void(0)" onClick="respond_like(<?php echo $row_e['id']; ?>,'unlike')"><i class="icon-heart-empty  bigger-160"></i>Unlike</a>
<div class="ajax_div_response"></div>
<?php
}
else
{
?>
<a   class="btn btn-app btn-yellow btn-xs"  href="javascript:void(0)" onClick="respond_like(<?php echo $row_e['id']; ?>,'like')" ><i class="icon-heart bigger-160"></i>Like</a>
<div class="ajax_div_response"></div>
<?php
}
?> 
</td>
<td>
<a href="delete.php?delid=<?php echo $row_e['id'];?>&com=likes"  onClick="return confirm('Are you sure you want to delete this like details?')"   title="Delete Like" class="icon-2 info-tooltip">
<button class="btn btn-sm btn-danger"><i class="icon-trash  bigger-110"></i><span class="bigger-110 no-text-shadow">Delete Like details</span></button></a>
</td>
</tr>	
<?php
$i++;
}
?>											
</tbody>
<?php
}
?>
</table>
</div>
</div>
</div>
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
 <script language="JavaScript" type="text/javascript">
 var xmlHttp
function respond_like(unique_id,status) {
 document.getElementById("imgLoader").style.display = "block";
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
 //alert(str1);
 var url="reply_likes.php";
 url=url+"?status="+status+"&unique_id="+unique_id;
 url=url+"&sid="+Math.random();
 xmlHttp.onreadystatechange=stateChangedga;
 xmlHttp.open("GET",url,true);
 xmlHttp.send(null);
}
function stateChangedga() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 {
 //alert(xmlHttp.responseText);
  var a=xmlHttp.responseText;
	window.location='likes.php';
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
       
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
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