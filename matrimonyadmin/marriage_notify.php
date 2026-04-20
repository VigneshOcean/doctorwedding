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
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8" />
<title>Happy Marriage:Marraige Notification</title>
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
var x=document.getElementById("caste").value;
if(x=="null" || x=="")
{
alert("Please Enter Caste Name");
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
						<!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								 <!-- /row -->
<?php 
//echo "select * from  product where mf_name='$mf_name' order by pro_name asc";
$e=mysqli_query($con,"select * from  marriage_notification where to_id IS NOT NULL and to_id <> '' order by id desc");
$count_e=mysqli_num_rows($e);
?>					
<!--**************Lower Content Start**************-->
<div class="row">
<div class="col-xs-12">
<div class="table-responsive">
<div class="page-header"><h1>Marraige fixed Notification</h1></div>
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>S.No</th>
<th>Sender Name / ID / Mobile</th>
<th>Reported About / ID / Mobile</th>
<th>Reported on</th>
<th>IP Address</th>
<th>Action</th>
<th></th>
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
$e_id=$row_e['id'];
$sender_id=$row_e['sender_id'];
$to_id=$row_e['to_id'];
$e1=mysqli_query($con,"select * from  register where id='$sender_id'");
$row_e1=mysqli_fetch_array($e1);
$e11=mysqli_query($con,"select * from  register where id='$to_id'");
$row_e11=mysqli_fetch_array($e11);
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row_e1['name']; ?> / <?php echo $row_e1['username']; ?> / <?php echo $row_e1['mobile']; ?></td>
<td><?php echo $row_e11['name']; ?> / <?php echo $row_e11['username']; ?> / <?php echo $row_e11['mobile']; ?></td>
<td><?php echo $row_e['c_date']; ?></td>
<td><?php echo $row_e['ip_addr']; ?></td>
<td></td>
<td></td>
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