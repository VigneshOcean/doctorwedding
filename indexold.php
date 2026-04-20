<?php 
include("include/connect.php");
if(isset($_POST['submit']))
{
$command=$_POST['command'];
$gender=$_POST['gender'];
$from_age=$_POST['age1'];
$to_age=$_POST['age2'];
$caste=$_POST['caste'];
$education=$_POST['education'];
$photo=$_POST['photo'];
session_start();
$_SESSION['gender']=$gender;
$_SESSION['from_age']=$from_age;
$_SESSION['to_age']=$to_age;
$_SESSION['caste']=$caste;
$_SESSION['education']=$education;
$_SESSION['command']=$command;
$_SESSION['photo']=$photo;
echo "<script language='javascript'>window.location='search_result.php';</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("include/title.php"); ?>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/index_js.js"></script>
<link type="text/css" rel="stylesheet" href="css/header-footer.css" />
<link type="text/css" rel="stylesheet" href="css/mi.css" />
<link type="text/css" rel="stylesheet" href="css/common-new.css" />
<style>
span.blink {
    text-decoration: blink ! important;
}
</style>
<!--<link type="text/css" rel="stylesheet" href="css/price_style.css" />-->
<script type="text/javascript">
  function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	
		{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		return xmlhttp;
	}
//Function for Displaying cities
function valid()
{
 var strURL="valid_exp.php";
  //alert(strURL);
   var req = getXMLHTTP();
   if (req)
   {
     req.onreadystatechange = function()
     {
      if (req.readyState == 4)
      {
  // only if "OK"
  if (req.status == 200)
         {
		// alert(req.responseText);
     document.getElementById('locality').innerHTML=req.responseText;
  } else {
      // alert("There was a problem while using XMLHTTP:\n" + req.statusText);
  }
       }
      }
   req.open("GET", strURL, true);
   req.send(null);
   } 
}
</script>
<style>
.blink_me {
  -webkit-animation-name: blink; 
-webkit-animation-iteration-count: infinite; 
-webkit-animation-timing-function: cubic-bezier(1.0,0,0,1.0);
-webkit-animation-duration: 1s;
}
</style>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body class="back"  onLoad="valid();">
<div id="body"><!--body id start-->
<?php include("include/header.php"); ?>
<br />

<div>
<div class="topnav" id="myTopnav" style="text-align: center">
  <a  href="index.php" title="Home">Home</a>
<a  href="about.php" title="Who we are">About Us</a>
<a  href="search_result.php" title="Find Partner">Advance Search</a>
<a  href="userid_search.php" title="Find Partner">Userid Search</a>
<a  href="login.php" title="Login">Login</a>
<a  href="register_user.php" title="Register Now">Register Now</a>
<a  href="contact.php" title="Feel free to ask us">Contact us</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
 <?php include("include/menu.php"); ?>
<p class="cb"></p>	
	<!--[if IE]><script src="http://static.matrimonialsindia.com/js/lt.ie8.js"></script><![endif]-->
<script  type="text/javascript">
$(document).ready(function () {
	agelimit('F');	
})
</script>

<script type="text/javascript">
function validlogin()
{
var x=document.getElementById("username").value;
if(x=="null" || x=="")
{
alert("Please Enter Username");
return false; 
}
var y=document.getElementById("password").value;
if(y=="null" || y=="")
{
alert("Please Enter Password");
return false; 
}
return true;
}
</script>
<div class="r" style="width:500px; float:right;">
<span style="color:#003300; font-weight:bold; text-align:center;">Paid customer login</span>
	<form name="form3" method="post" action="login/logincheck.php" onSubmit="return validlogin();">
    <input type="hidden" name="command" id="command" value="login" />
	<div class="login"><b></b><p>
	<span>LOGIN</span>

	<input name="username" id="username" type="text" value="" />
    <input name="password" id="password" type="password" value=""  />
    <input type="submit" class="bt" value="GO" />
	</p> <i></i></div>
	</form>
</div>
<br />
<?php
if(isset($_REQUEST['failure']))
{
?>
<div style="background:#FF8484; color:#FF0000; font-weight:bold; font-size:14px;">
<span>Payment failed due to some reasons</span>
</div>
<?php
}
if(isset($_REQUEST['sucess']))
{
?>
<div style="background:#95FFAF; color:#009900; font-weight:bold; font-size:14px;">
<span>Payment Successfull</span>
</div>
<?php
}
?>
<table width="100%" align="center">
<tr>
<td>
<form name="topsearch" id="topsearch" method="post" action="index.php">
<input type="hidden" name="command" id="command" value="searchby">
<div class="qs">
<br />
<p class="qst"><i></i><span class="blink_me">Free Search</span><b></b></p>
<p class="cb"></p>
<div class="qst_b">

<p class="l">Looking for</p>
<p class="r"><input name="gender" type="radio" value="female" checked="checked" onClick="agelimit(this.value);"/> Bride <input class="vam" name="gender" type="radio" value="male"  onClick="agelimit(this.value);">Groom</p>
<br clear="all" />
<p class="l">Age</p>
<p class="r"><select name="age1" id="age1">
<?php
for($i=18;$i<=60;$i++)
{
?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select><span class="ml10px">to</span> <select class="ml10px" id="age2" name="age2"><?php
for($i=18;$i<=60;$i++)
{
?>
<option value="<?php echo $i; ?>"  <?php if($i==40) { ?>selected<?php } ?> ><?php echo $i; ?></option>
<?php
}
?></select></p>
<br clear="all" />
<p class="l">Caste</p>
<p class="r"><select class="w"  name="caste" id="caste"  onchange="getcity(this.value);">
<option value="">--Select--</option>
<?php
$man=mysqli_query($con, "select * from caste where temp_id=1 order by caste asc");
while($man1=mysqli_fetch_array($man))
 {
 ?>
<option value="<?php echo $man1['id']; ?>"><?php echo ucwords($man1['caste']); ?></option>
<?php
}
?>
</select></p>
<br clear="all" />

<p class="l">Education</p>
<p class="r"><select class="w"  name="education" id="education">
<option value="">Select</option>
<?php 
$kal=mysqli_query($con, "select * from education where temp_id=1 order by id desc");
while($kal11=mysqli_fetch_array($kal))
{
?>
<option value="<?php echo $kal11['education']; ?>"><?php echo $kal11['education']; ?></option>
<?php
}
?>
</select></p>
<br clear="all" />
<p class="l">Photo</p>
<p class="r">
<input name="photo" type="radio" value="0"/> Without photo 
<input class="vam" name="photo" type="radio" value="1"  >With photo
<input class="vam" name="photo" type="radio" value="2"  checked="checked"  >All
</p>
<br clear="all" />

<p class="r">
<input type="submit" name="submit" id="submit" class="bt" value="Search Profiles" /></p>
<p class="cb"></p>
<p class="hr"></p>
<br />
<p class="pis"><a href="govt_search.php">Govt Search</a></p>
<p class="cb"></p>
</div>
<p class="qsb"><i></i><b></b></p>
</div>
</form>
</td>
<td>
<img class="bdr" src="images-mi/adhi.PNG" />
</td>
<td>
<?php
$aaaaa=mysqli_query($con, "select * from news where id='2'");
$row_aaaaa=mysqli_fetch_array($aaaaa);
?>
<div class="qs">
<br />
<p class="qst"><i></i><span>News and Events</span><b></b></p>
<p class="cb"></p>
<div class="qst_b">
<span class="blink" style="color:#006600; font-weight:700;">ஆதிதிராவிடர் திருமண தகவல் மைய இனையதளத்திற்கு �
ன்புடன் வரவேற்கிறோம்</span><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span style="color:red;">வேறு மையத்திலிருந்து கொரியர் �
னுப்பி பணம் பெற முயன்றால் ஏமாறவேண்டாம் </span>
</div>
<p class="qsb"><i></i><b></b></p>
</div>
</td></tr>
</table>
<!--<p class="hbg_b"><span></span><b class="sc">Secure &amp; Confidential</b><b class="vp">Verified Profile</b><b class="db">Direct Benefits</b><b class="rp">Receive Proposal</b><i></i></p>-->
<p class="cb"></p>
</div>
<p class="cb"></p>
<br class="lh1em" />

<p class="cb"></p>
<br />

<link rel="stylesheet" href="css/pricing-tables.css">
<table class="pricing-table" align="center">
	<thead>
		<tr class="plan">
			<td class="green">
				<h2>Silver</h2>
				<!--<em>Great for small business</em>-->
			</td>
			<td class="orange">
				<h2>Gold</h2>
				<!--<em>Great for small business</em>-->
			</td>
			<td class="green">
				<h2>Platinum</h2>
				<!--<em>Great for small business</em>-->
			</td>
		</tr>
		<tr class="price">
			<td class="green">
				<p><span>Rs </span><span>1500</span></p>
				<span>Per 6 months</span>
				<a href="paynow.php?plan_id=1">Join</a>
			</td>
			<td class="orange">
				<p><span>Rs </span><span>2000</span></p>
				<span>Per 1 Year</span>
				<a href="paynow.php?plan_id=2">Join</a>
			</td>
			<td class="green">
				<p><span>Rs </span><span>4000</span></p>
				<span>Upto marriage</span>
				<a href="paynow.php?plan_id=3">Join</a>
			</td>
		</tr>
	</thead>
	<tbody>
		<tr class="clock-icon">
			<td>Unlimited Profiles</td>
			<td>Unlimited Profiles</td>
			<td>Unlimited Profiles</td>
		</tr>
		<tr class="basket-icon">
			<td>Online and Offline services</td>
			<td>Online and Offline services</td>
			<td>Online and Offline services</td>
		</tr>
		<!--<tr class="star-icon">
			<td>100GB Storage</td>
			<td>200GB Storage</td>
			<td>500GB Storage</td>
		</tr>-->
		<tr class="heart-icon">
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td></td>
			<td>

			</td>
			<td></td>
		</tr>
	</tfoot>
</table>
<br><br>
<br /><?php include("include/footer.php"); ?>
</div>
</div>
 </body>
 <?php
 if(isset($_REQUEST['show_payment']))
 {
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
 <script>
$( document ).ready(function() 
{
	 $('html, body').animate({scrollTop:$(document).height()}, 'slow');
    return false;
});
</script>
<?php
}
?>
</html>