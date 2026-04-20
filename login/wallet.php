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
$f=mysqli_query($con,"select * from  admin where id='$id'");
$row_f=mysqli_fetch_array($f);
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8" />
<title>Happy Marriage:Wallet</title>
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
							<h1>Wallet</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php
$prod=mysqli_query($con,"select* from register where id='$id'");
$usprod=mysqli_fetch_array($prod);         
   $e=mysqli_query($con,"select * from wallet_history where user_id='$id' order by id desc");
$count_e=mysqli_num_rows($e);
?>  
	
 	<?php
if(isset($walet_validity_mess))
{
?>
<div class="alert alert-block alert-danger"><button class="close" data-dismiss="alert" type="button">
<i class="icon-remove"></i></button><i class="icon-remove red"></i>
<strong class="red"><?php if($walet_validity_mess=='0') { echo 'Your Wallet going to Expiry'; } if($walet_validity_mess=='1') {  echo 'Wallet already Expired'; } ?></strong>!</div>
	<?php } ?>
<h2> Wallet Balance - <?php if($walet_validity_mess!=1) { echo  $usprod['wallet']; } else { echo 0;} ?> (₹) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a   class="btn btn-success" href="https://hmmatrimony.com/paynow.php?plan_id=7">
<i class="icon-money"></i>Add Balance</a></h2>
<table style="font-size:18px;">
<tr>
<td>Current Wallet Added on :</td><td> <?php echo $riw_ghj['wallet_validity_start']; ?></td>
</tr>
<tr>
<td>Wallet Expiry date :</td><td> <?php echo $riw_ghj['wallet_validity_end']; ?></td>
</tr>
<tr>
<td>
<h3>Available Wallet Options</h3></br>
          <ul>
                <li><b> 1000</b> (15 Days - 20 Contacts)</li>
                <!--<li><b> 600</b> (30 Days - 20 Contacts)</li>-->
                <!--<li><b> 1000</b>(45 Days - 33 Contacts)</li>-->
                 <li><b> 2000</b>(6 Month - Unlimited Contacts - Only Renewal)</li>
                <li><b> 3000</b>(6 Month - Unlimited Contacts - New Registartion) </li>
          </ul>
</td>
</tr>

</table>
  
								
	
 	 
 
  

</br>

<!--<div class="row">

	<h3>Wallet History</h3>
<div class="col-xs-12">
<div class="table-responsive">
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>S.No</th>
<th>Wallet Amount (₹)</th>
<th>Valid From</th>
<th>Valid To</th>
<th>Status</th>
 
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
?>
<tr>
    <td><?php echo $i; ?></td>
<td><?php echo $row_e['amount']; ?> (₹)</td>
<td><?php echo $row_e['valid_from']; ?></td>
<td><?php echo $row_e['valid_to']; ?></td>
<td><?php 
$curent_date=strtotime(date('d-m-Y'));
$wallet_valid=$riw_ghj['wallet_validity_end'];
$wallet_valid_string = strtotime($wallet_valid);

if($wallet_valid_string>$curent_date)
{
//Valid string greater than current date
$diff_bet_wallet=$wallet_valid_string-$curent_date;
if($diff_bet_wallet<=604800)
{
echo "Active";
}
}
else
{
echo "Expired";
}

  ?></td>
  
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
</div>-->




















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

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<!-- inline scripts related to this page -->
		
	</body>
</html>
<?php
}
?>