<?php
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '1');
include("../include/connect.php");
session_start();
$id=$_SESSION['id'];
if(!isset($_SESSION['id']))
{
echo "<script type=text/javascript>window.location='index.php?err';</script>";
}
else
{
ini_set('upload_max_filesize', '20M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 900);
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8" />
<title>Happy Marriage:Waiting for renewal Wallet</title>
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
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<script src="assets/js/ace-extra.min.js"></script>
       <script language="JavaScript" type="text/javascript">
 var xmlHttp
function getssts(str1) {
//alert(str1);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
 //alert(str1);
var url="get_status.php";
 url=url+"?h="+str1;
 url=url+"&sid="+Math.random();
 xmlHttp.onreadystatechange=stateChangedga;
 xmlHttp.open("GET",url,true);
 xmlHttp.send(null);
}
function stateChangedga() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 {
	window.location='wallet_history.php';
    document.getElementById("ba").innerHTML=xmlHttp.responseText;
} 
} 
function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
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
							<h1>Wallet History</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								 <!-- /row -->
<?php
   $current_date_string=strtotime(date('d-m-Y'));
   $nex_week_string=$current_date_string+1209600;
   
   $tableName="register";
   $targetpage = "wallet_history.php"; 	
	$limit = 10; 
	$query = "SELECT COUNT(*) as num FROM $tableName where wallet_validity_end_string!=''    order by  wallet_validity_star_string desc";
	$res = mysqli_query($con,$query);
	if($res) {
		$total_pages_row = mysqli_fetch_array($res);
		$total_pages = $total_pages_row['num'];
	} else {
		$total_pages = 0;
	}
 	$query1 = "SELECT * FROM $tableName where wallet_validity_end_string!='' order by  wallet_validity_star_string desc";
	$result = mysqli_query($con,$query1);
	
/*	//echo $total_pages;
	$stages = 3;
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	if($page < 1) { $page = 1; }
	//echo $page;
	if($page)
	{
		$start = ($page - 1) * $limit; 
		//echo $start;
	}
	else
	{
		$start = 0;	
		}*/	
    // Get page data
	//echo "SELECT * FROM $tableName LIMIT $start, $limit";exit;
//	$query1 = "SELECT * FROM $tableName where wallet_validity_end_string!='' order by  wallet_validity_star_string desc LIMIT $start, $limit";
//	$result = mysqli_query($con, $query1);
		
	
	// Initial page num setup
/*	if ($page == 0){$page = 1;}
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
			$query1 = "SELECT * FROM $tableName  where wallet_validity_end_string!='' order by  wallet_validity_star_string desc LIMIT $start, $limit";
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
				$query1 = "SELECT * FROM $tableName  where wallet_validity_end_string!='' order by  wallet_validity_star_string desc LIMIT $start, $limit";
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
		$query1 = "SELECT * FROM $tableName where wallet_validity_end_string!='' order by  wallet_validity_star_string desc LIMIT $start, $limit";
				$result = mysqli_query($con, $query1);
			$paginate.= "<a href='$targetpage?page=$next'>next</a>";
		}else{
			$paginate.= "<span class='disabled'>next</span>";
			}
		$paginate.= "</div>";		
	
}
 //echo $paginate;
 //echo $query1; */
?>
<!--<form enctype="multipart/form-data" method="post" action="goto_search.php" name="frm">
<input id="command" type="hidden" style="width:50px;" name="command" value="wallet_history.php">
<div align="right">
Goto page no:   
<input id="goto" type="text" style="width:50px;" name="goto">
<input type="submit" value="go" name="submit">
</div>
</form>-->
	<span style="font-weight:bold; color:#006600; margin-left:10%; font-size:18px;">Total number of records : <?php echo $total_pages; ?> Wallets </span>			
<!--**************Lower Content Start**************-->
<div class="row">
<div class="col-xs-12">
<div class="table-responsive">
<table id="example" class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>User Name</th>
<th>User ID</th>
 <th>Mobile Number</th>
<th>Wallet Amount</th>
<th>Wallet Balance</th>
<th>From Date</th>
<th>Expiry date</th>
<th>Action</th>
<!--<th>Delete</th>-->
</tr>
</thead><tbody>
<?php
$i=1;
if(mysqli_num_rows($result)>0)
{
while($row_e=mysqli_fetch_array($result))
{
$e_id=$row_e['id'];
$religion=$row_e['religion'];
$caste=$row_e['caste'];
$e1=mysqli_query($con,"select * from  caste where id='$religion'");
$row_e1=mysqli_fetch_array($e1);
$e11=mysqli_query($con,"select * from  subcaste where id='$caste'");
$row_e11=mysqli_fetch_array($e11);
 //echo "select * from wallet_history where user_id='$e_id' order by id desc limit 1";
$w1=mysqli_query($con,"select * from wallet_history where user_id='$e_id' order by id desc limit 1");
$w11=mysqli_fetch_array($w1);

?>
<tr>
<td><?php echo ucwords($row_e['name']); ?></td>
<td><?php echo $row_e['username']; ?></td>
<td><?php echo $row_e['mobile']; ?></td>
<td><?php echo $w11['amount']; ?></td>
<td><?php echo $row_e['wallet']; ?></td>
<td><?php echo $row_e['wallet_validity_start']; ?></td>
<!--
<td><?php echo $row_e['dob']; ?>/<?php echo $row_e['age']; ?></td>
<td><?php echo ucwords($row_e1['caste']); ?>/<?php echo ucwords($row_e11['subcaste']); ?></td>-->
<td><?php echo $row_e['wallet_validity_end']; ?></td>
<td>
<!--
<a  href="edit.php?userid=<?php  echo $e_id;  ?>" target="_blank" title="View and Upload Horoscope" >
<button class="btn btn-xs btn-info"><i class="icon-edit bigger-120"></i></button>
</a>
<a href="validity.php?userid=<?php echo $e_id; ?>" target="_blank"  title="Set validity">
<button class="btn btn-xs btn-warning"><i class="icon-flag bigger-120"></i></button>
</a>-->
<a href="walletsetup.php?userid=<?php echo $e_id; ?>" target="_blank"  title="Set Wallet">
<button class="btn btn-xs btn-purple"><i class="icon-money bigger-120"></i></button>
</a>
</td>
<!--<td>
<a href="delete_profile.php?id=<?php echo $e_id; ?>&pagename=wallet_history.php" onClick="return confirm('Are you sure you want to delete?')" title="Delete Profile">
<button class="btn btn-xs btn-danger"><i class="icon-trash bigger-120"></i></button> 
</a>
</td>-->
</tr>	
<?php
$i++;
}
}
?>											
</tbody>
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
	$(document).ready( function() {
    $('#example').dataTable({
        "aaSorting": []
    });
})
		
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