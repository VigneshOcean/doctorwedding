<?php
include("../include/connect.php");
session_start();
$id=$_SESSION['id'];
$username="";
if(!isset($_SESSION['id']))
{
echo "<script type=text/javascript>window.location='../index.php?err';</script>";
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
				<?php include("include/menu.php");
				$ar=mysqli_query($con, "select * from register where id='$id'");
$ar1=mysqli_fetch_array($ar);
$username=$ar1['name'];
?>
					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>
				<div class="main-content">

					<div class="page-content">
						<div class="page-header" style="
    display: flex;                  
    flex-direction: row;            
    flex-wrap: nowrap;              
    justify-content: space-between; 
">
						    <div>
							<h1>
								Dashboard
								<small>
									<i class="icon-double-angle-right"></i>
								</small>
							</h1>
							</div>
							<div style="   display: none;">
<span style="color:#009933; font-weight:bold;">	<?php echo $username; ?> 
 திருமணம் முடிந்தது என �
றிவிக்க :</span>
<a  onclick="marriage_notify(<?php echo $id; ?>)" class="btn btn-danger" href="javascript:void(0)" >
<i class="icon-exclamation-sign"></i>Notify us</a>
</div>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<div class="alert alert-block alert-success">
<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
<i class="icon-ok green"></i>Welcome to<strong class="green">  Adi Dravidar Matrimony</strong> !
<br>
<?php
if(isset($riw_ghj['valid_for']) && $riw_ghj['valid_for']!='')
{
?>
<strong class="green"> Your Profile going to Expiry on <?php echo $riw_ghj['valid_for']; ?></strong>
<?php
}
?>
</div>



<div class="row">
<div class="space-6"></div>
<div class="col-sm-6" style="z-index: 100;">
    <div class="space-6"></div>
    <div class="col-sm-12" style="background: #e5e5e5;z-index: 100;">
        <div class="space-6"></div>
        <form class="form-horizontal" role="form" action="advance_search.php" method="post" enctype="multipart/form-data"  onSubmit="return validlogin();">
            <?php
$rr=mysqli_query($con, "select * from register where id='$id'");
$row_rr=mysqli_fetch_array($rr);
$rr_gender=$row_rr['gender'];
$rr_religion=$row_rr['religion'];
if($rr_gender=='male')
{
?><input type="hidden" name="gender" id="gender" value="female" />
<?php
}
if($rr_gender=='female')
{
?><input type="hidden" name="gender" id="gender" value="male" />
<?php
}
?>
<input type="hidden" name="dosam" id="dosam" value="1" />
<div class="space-4"></div>
<input type="hidden" name="caste" id="caste" value="<?php echo $rr_religion; ?>" />
            <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Age Between :</label>
              <div class="col-sm-9"  style="width:350px;">
                <div>
                   <input class="col-xs-10 col-sm-5 mobilevalidation" type="text" placeholder="From age*" value="18" maxlength="2" name="from_age" id="from_age">
                   <input class="col-xs-10 col-sm-5 mobilevalidation" type="text" placeholder="To age*" value="40"  maxlength="2" id="to_age" name="to_age">
                </div>
              </div>
            </div>
            <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Education :</label>
<div class="col-sm-9"  style="width:350px;">
<div>
<select multiple="multiple" name="education[]" id="education" class="form-control" data-placeholder="Select Education Name...">
<?php 
$kal=mysqli_query($con, "select * from education  order by id desc");
while($kal11=mysqli_fetch_array($kal))
{
?>
<option value="<?php echo $kal11['education']; ?>"><?php echo $kal11['education']; ?></option>
<?php
}
?>
</select>
</div>
</div>
</div>

<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Photo Selection :</label>
<div class="col-sm-9">
<div class="radio">
<label><input  id="photo1" type="radio" value="0" name="photo1" class="ace" /><span class="lbl">With Photo</span></label>
<label><input   id="photo1" type="radio" value="1" name="photo1" class="ace" /><span class="lbl">Without Photo</span></label>
<label><input id="photo1" type="radio" value="2" name="photo1" class="ace" checked /><span class="lbl">All</span></label>
</div>
</div>
</div>
<div class="clearfix " style="padding: 19px 20px 20px;"><div class="pull-right">
<button class="btn btn-info" type="submit" name="submit" id="submit"><i class="icon-search  bigger-110"></i>Search</button>
<!--<button class="btn" type="reset"><i class="icon-undo bigger-110"></i>Reset</button>-->
</div>
</div>
        </form>
    </div>  
    <div class="space-6"></div>
    <div class="space-6"></div>
<div class="col-sm-12 infobox-container">
    <div class="space-6"></div>
<?php
$a=mysqli_query($con, "select * from register");
$count_a=mysqli_num_rows($a);
?>
<div class="infobox infobox-red">
<div class="infobox-icon"><i class="icon-group"></i></div>
<div class="infobox-data"><span class="infobox-data-number"><?php echo  $count_a; ?></span>
<div class="infobox-content" style="color:#DD6566; font-weight:bold;"><a href="advance_search.php">Total Profiles</a></div></div>
<!--<div class="stat stat-success">8%</div>-->
</div>
<?php 
$a1=mysqli_query($con, "select * from register where gender='male'");
$count_a1=mysqli_num_rows($a1);
?>
<div class="infobox infobox-blue">
<div class="infobox-icon"><i class="icon-circle-blank"></i></div>
<div class="infobox-data"><span class="infobox-data-number"><?php echo  $count_a1; ?></span>
<div class="infobox-content" style="color:#8CC2E6; font-weight:bold;"><a href="advance_search.php">Male Profiles</a></div></div>
</div>
<?php 
$a2=mysqli_query($con, "select * from register where gender='female'");
$count_a2=mysqli_num_rows($a2);
?>										
<div class="infobox infobox-pink">
<div class="infobox-icon"><i class="icon-adjust"></i></div>
<div class="infobox-data"><span class="infobox-data-number"><?php echo  $count_a2; ?></span>
<div class="infobox-content" style="color:#8CC2E6; font-weight:bold;"><a href="advance_search.php">Female Profiles </a></div></div>
</div>

<?php
$a3=mysqli_query($con, "select * from likes where to_id='$id'")or die(mysqli_error($con));
$count_a3=mysqli_num_rows($a3);
?>
<div class="infobox infobox-green">
<div class="infobox-icon"><i class="icon-heart-empty"></i></div>
<div class="infobox-data"><span class="infobox-data-number"><?php echo  $count_a3; ?></span>
<div class="infobox-content" style="color:#AEC95B; font-weight:bold;"><a href="likes.php">Likes</a></div></div>
<!--<div class="stat stat-success">8%</div>-->
</div>

<!--<div class="infobox infobox-green" style="width: 500px; height:auto;">-->
<!--  <div class="infobox-data">-->
<!--    <div class="infobox-content" style="color:red; font-weight:bold;">-->
<!--      <span class="blinking">�
ன்பான வாடிக்கையாளர்களே !!</span><br/>-->
<!--        01-07-2019 �
ன்று முதல் பதிவு கட்டணம் உயரவிருப்பதால்<br/>-->
<!--        தற்போது இருக்கும் கட்டணத்திலே Registration மற்றும் Renewal  செய்துகொள்ளுமாறு கேட்டுக்கொள்கிறோம்  <br/> -->
<!--    </div>-->
<!--  <table width='100%' border="1" style="color:#006600 !important;">-->
<!--      <tr><td width='35%' style='font-weight:bold;'>Existing Plan</td><td  width='35%' style='font-weight:bold;'>New Plan</td><td  width='30%' style='font-weight:bold;'>Renewal</td></tr>-->
<!--      <tr><td>Rs1500 for 6months</td><td>Rs2000 for 6months</td><td>Rs1500 for 6months</td></tr>-->
<!--      <tr><td>Rs2000 for 1Year</td><td>Rs3000 for 1Year</td><td>Rs2000 for 1Year</td></tr>-->
<!--  </table>-->
  
<!--   <div class="infobox-data">-->
<!--    <div class="infobox-content" style="color:red; font-weight:bold;">-->
<!--        தொடர்புக்கு : 044 4386 3901<br/>-->
<!--        Renewal தொடர்பான சந்தேகங்களுக்கு தொடர்க : 97108 40909-->
<!--      </div>-->
<!--  </div> -->
  
<!--  </div>-->
<!--</div>  -->
<div class="infobox infobox-green" style="width: 500px; height:auto;">
  <div class="infobox-data">
    <div class="infobox-content" style="color:red; font-weight:bold;">
      <span class="blinking">முக்கிய �
றிவிப்பு :  </span><br/>
        நமக்கு வேறு எங்கும் கிளைகள் கிடையாது.<br/>
        கொரியர் �
னுப்பி பணம் பெற முயன்றால் ஏமாற வேண்டாம் <br/>      
    </div>
  </div>
</div>  
<style>
.blinking{
    animation:blinkingText 0.8s infinite;
}
@keyframes blinkingText{
  50% {
    opacity: 0;
  }
}
</style>
</div>
<div class="col-sm-12">
<div class="space-6"></div>
<div style=" ">
<span style="color:#009933; font-weight:bold;display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: space-between;">
 <p>   	<?php echo $username; ?> உங்களுக்கு திருமணம் முடித்தால் தெரியப்படுத்தவும்
 </p><a  onclick="marriage_notify(<?php echo $id; ?>)" class="btn btn-danger" href="javascript:void(0)" >
<i class="icon-exclamation-sign"></i>Notify us</a>
</div>
</div>
</div>
<div class="vspace-sm"></div>
<!--*****************Pie Chart Start*****************************-->
<div class="col-sm-6">

<div>
<?php  if($count_a3>0) { ?>
<h3>Likes Details(Who liked you!!)</h3>
<?php  } ?>
<!--<marquee style="height:500px; cursor:pointer;" direction="up"  onmouseover="javascript:this.setAttribute('scrollamount','0');" onMouseOut="javascript:this.setAttribute('scrollamount','5');">-->
<!--onMouseOver="this.stop();" onMouseOut="this.start();"-->
<!--onMouseover="this.scrollAmount=0" onMouseout="this.scrollAmount=1"-->
<marquee direction="up"  onMouseOver="this.setAttribute('scrollamount', 0, 0);" OnMouseOut="this.setAttribute('scrollamount', 4, 0);" style="height:500px; cursor:pointer;" >
<?php
while($row_a3=mysqli_fetch_array($a3))
{
$reg_id=$row_a3['sender_id'];
$a3121=mysqli_query($con, "select * from register where id='$reg_id'")or die(mysqli_error($con));
$row_a3121=mysqli_fetch_array($a3121);
?>
<table width="100%">
<tr><td rowspan="4"><img src="../profile/<?php echo $row_a3121['uploadedfile']; ?>" height="200" width="200" /></td>
<td>Name / Id :</td><td><?php echo $row_a3121['name']; ?> / <?php echo $row_a3121['username']; ?></td></tr>
<!--<tr><td>Date of birth[Age] :</td><td><?php echo $row_a3121['dob']; ?>[<?php echo $row_a3121['age']; ?>]</td></tr>-->
<tr><td>Age :</td><td><?php echo $row_a3121['age']; ?></td></tr>
<tr><td>Location :</td><td><?php echo $row_a3121['area']; ?></td></tr>
<!--<tr><td>Education details :</td><td><?php echo $row_a3121['education']; ?> / <?php echo $row_a3121['edu_det']; ?></td></tr>-->
<!--<tr><td>Job / Salary :</td><td><?php echo $row_a3121['job']; ?> / <?php echo $row_a3121['salary']; ?></td></tr>-->
</table>
<hr>
<?php
}
?>
</marquee>
</div>

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
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script type="text/javascript">
function validlogin()
{
var x=document.getElementById("from_age").value;
if(x=="null" || x=="")
{
alert("Please Enter Age Range");
return false; 
}
var x=document.getElementById("to_age").value;
if(x=="null" || x=="")
{
alert("Please Enter Age Range");
return false; 
}
return true;
}
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.10/css/bootstrap-multiselect.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.10/js/bootstrap-multiselect.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.10/js/bootstrap-multiselect.min.js"></script>
		<script type="text/javascript">
    $(document).ready(function() {
        $('#education').multiselect();
    });
</script>
<style>
.btn-group>.btn>.caret {
    margin-top: 0 !important;
    margin-left: 1px;
    border-width: 0px !important;
    border-top-color: #FFF;
}
</style>
<script language="JavaScript" type="text/javascript">
 var xmlHttp
function marriage_notify(sender_id) {
	if (confirm("Are you sure you want to update profile as marriage fixed!") == true) 
	{
	// document.getElementById("imgLoader").style.display = "block";
       //alert(str1);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
 var url="marriage_notify.php";
 url=url+"?common_update=1&sender_id="+sender_id;
 url=url+"&sid="+Math.random();
  xmlHttp.onreadystatechange=stateChangedga1111;
 xmlHttp.open("GET",url,true);
 xmlHttp.send(null);
    } 


}
function stateChangedga1111() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 {
 alert('Thanks for your information.Admin will delete this profile soon once verified');
  var a=xmlHttp.responseText;
//	window.location='full_view.php?userid=<?php echo $userid; ?>';
  //  document.getElementById("ba").innerHTML=xmlHttp.responseText;
		//document.getElementById("imgLoader").style.display = "none";
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
	</body>
</html>
<?php } ?>