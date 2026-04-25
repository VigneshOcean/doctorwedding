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
				$ar=mysqli_query($con,"select * from register where id='$id'");
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
<span style="color:#009933; font-weight:bold;">	<?php echo $username; ?> திருமணம் முடிந்தது என அறிவிக்க :</span>
<a  onclick="marriage_notify(<?php echo $id; ?>)" class="btn btn-danger" href="javascript:void(0)" >
<i class="icon-exclamation-sign"></i>Notify us</a>
</div>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<div class="alert alert-block alert-success">
<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
<i class="icon-ok green"></i>Welcome to<strong class="green">  Doctor Wedding</strong> !
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
    <div class="infobox infobox-green" style="width: 500px; height:auto;">
  <div class="infobox-data">
    <div class="infobox-content" style="color:red; font-weight:bold;">
      <span class="blinking">முக்கிய அறிவிப்பு :  </span><br/>
        நமக்கு வேறு எங்கும் கிளைகள் கிடையாது.<br/>
        கொரியர் அனுப்பி பணம் பெற முயன்றால் ஏமாற வேண்டாம் <br/>
    For Security reason, We have introduced wallet for your profile. Contact admin for upgrading your wallet balance.
    </div>
  </div>
</div>
    <div class="space-6"></div>
    <div class="col-sm-12" style="background: #e5e5e5;z-index: 100;">
        <div class="space-6"></div>
        <form class="form-horizontal" role="form" action="advance_search.php" method="post" enctype="multipart/form-data"  onSubmit="return validlogin();">
            <?php
$rr=mysqli_query($con,"select * from register where id='$id'");
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
$kal=mysqli_query($con,"select * from education  order by id desc");
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
if($rr_gender=='male')
{
    $tag ='Female';
    $a=mysqli_query($con,"select * from register where gender ='female' ");
}else{
      $tag ='Male';
      $a=mysqli_query($con,"select * from register where gender ='male' ");
}
$count_a=mysqli_num_rows($a);
?>
<div class="infobox infobox-red">
<div class="infobox-icon"><i class="icon-group"></i></div>
<div class="infobox-data"><span class="infobox-data-number"><?php echo  $count_a; ?></span>
<div class="infobox-content" style="color:#DD6566; font-weight:bold;"><a href="advance_search.php">Total <?php echo $tag; ?> Profiles</a></div></div>
<!--<div class="stat stat-success">8%</div>-->
</div>
<?php 
$a1=mysqli_query($con,"select * from register where gender='male'");
$count_a1=mysqli_num_rows($a1);
?>
<!--<div class="infobox infobox-blue">
<div class="infobox-icon"><i class="icon-circle-blank"></i></div>
<div class="infobox-data"><span class="infobox-data-number"><?php echo  $count_a1; ?></span>
<div class="infobox-content" style="color:#8CC2E6; font-weight:bold;"><a href="advance_search.php">Male Profiles</a></div></div>
</div>-->
<?php 
$a2=mysqli_query($con,"select * from register where gender='female'");
$count_a2=mysqli_num_rows($a2);
?>										
<!--<div class="infobox infobox-pink">
<div class="infobox-icon"><i class="icon-adjust"></i></div>
<div class="infobox-data"><span class="infobox-data-number"><?php echo  $count_a2; ?></span>
<div class="infobox-content" style="color:#8CC2E6; font-weight:bold;"><a href="advance_search.php">Female Profiles </a></div></div>
</div>-->

<?php
$a3=mysqli_query($con,"select * from likes where to_id='$id'")or die(mysqli_error());
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
<!--      <span class="blinking">à®
à®©à¯à®ªà®¾à®© à®µà®¾à®Ÿà®¿à®•à¯à®•à¯ˆà®¯à®¾à®³à®°à¯à®•à®³à¯‡ !!</span><br/>-->
<!--        01-07-2019 à®
à®©à¯à®±à¯ à®®à¯à®¤à®²à¯ à®ªà®¤à®¿à®µà¯ à®•à®Ÿà¯à®Ÿà®£à®®à¯ à®‰à®¯à®°à®µà®¿à®°à¯à®ªà¯à®ªà®¤à®¾à®²à¯<br/>-->
<!--        à®¤à®±à¯à®ªà¯‹à®¤à¯ à®‡à®°à¯à®•à¯à®•à¯à®®à¯ à®•à®Ÿà¯à®Ÿà®£à®¤à¯à®¤à®¿à®²à¯‡ Registration à®®à®±à¯à®±à¯à®®à¯ Renewal  à®šà¯†à®¯à¯à®¤à¯à®•à¯Šà®³à¯à®³à¯à®®à®¾à®±à¯ à®•à¯‡à®Ÿà¯à®Ÿà¯à®•à¯à®•à¯Šà®³à¯à®•à®¿à®±à¯‹à®®à¯  <br/> -->
<!--    </div>-->
<!--  <table width='100%' border="1" style="color:#006600 !important;">-->
<!--      <tr><td width='35%' style='font-weight:bold;'>Existing Plan</td><td  width='35%' style='font-weight:bold;'>New Plan</td><td  width='30%' style='font-weight:bold;'>Renewal</td></tr>-->
<!--      <tr><td>Rs1500 for 6months</td><td>Rs2000 for 6months</td><td>Rs1500 for 6months</td></tr>-->
<!--      <tr><td>Rs2000 for 1Year</td><td>Rs3000 for 1Year</td><td>Rs2000 for 1Year</td></tr>-->
<!--  </table>-->
  
<!--   <div class="infobox-data">-->
<!--    <div class="infobox-content" style="color:red; font-weight:bold;">-->
<!--        à®¤à¯Šà®Ÿà®°à¯à®ªà¯à®•à¯à®•à¯ : 7338821446<br/>-->
<!--        Renewal à®¤à¯Šà®Ÿà®°à¯à®ªà®¾à®© à®šà®¨à¯à®¤à¯‡à®•à®™à¯à®•à®³à¯à®•à¯à®•à¯ à®¤à¯Šà®Ÿà®°à¯à®• : 97108 40909-->
<!--      </div>-->
<!--  </div> -->
  
<!--  </div>-->
<!--</div>  -->
 
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
 <p>   	<?php echo $username; ?> உங்களுக்கு திருமணம் முடித்திருந்தால் தெரியப்படுத்தவும் </p>
 </p><a  onclick="marriage_notify(<?php echo $id; ?>)" class="btn btn-danger" href="javascript:void(0)" >
<i class="icon-exclamation-sign"></i>Notify us</a>
</div>
</div>
</div>
<div class="vspace-sm"></div>
<!--*****************Pie Chart Start*****************************-->
<div class="col-sm-6">
<iframe height="315" src="https://www.youtube-nocookie.com/embed/-b9IfZM8GNQ?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

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
$a3121=mysqli_query($con,"select * from register where id='$reg_id'")or die(mysqli_error());
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


<div class="row"><div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
<?php
$gender=$row_rr['gender'];
$caste=$row_rr['caste'];
$subcaste=$row_rr['subcaste'];
$profileage =$row_rr['age'];
$education=$row_rr['education'];
$dosam=$row_rr['dosam'];
$condition=' id!=""';
//  if($profileage!='' &&  $row_rr['gender']=='male')
//  { $listage = ($profileage-7); 
//   $condition=" age >=".$listage." and  age <=".$profileage." and ";
//  }else{
//      $listage = ($profileage+7); 
//   $condition=" age <=".$listage." and  age >=".$profileage." and ";
//  }
    if($profileage!='')
    {
        $plus_age=$row_rr['age']+7;
        $minus_age=$row_rr['age']-7;
        if($row_rr['gender']=='male')
        {
            $condition.=' and age>="'.$minus_age.'" and age<="'.$profileage.'"';
        }
        if($row_reg['gender']=='female')
        {
            $condition.=' and age<="'.$plus_age.'" and age>="'.$profileage.'"';
        }
    }
  
if($rr_gender=='male')
{
   $condition.=' and gender="female"';
}else{
     $condition.=' and gender="male"';
}
if($rr_religion == 15){
    if($education != "DOCTOR"){
         $condition .=' and education != "DOCTOR"';
    }
}
  $condition .=' and religion="'.$rr_religion.'" and status="1" ';
echo $condition; 
 ?>

<form enctype="multipart/form-data" method="post" action="goto_search.php" name="frm">
<input id="command" type="hidden" style="width:50px;" name="command" value="search_result.php">
</form>
<?php
  //echo "select * from register where ".$condition."  and uploadedfile!='' and (religion='$caste') ORDER BY rand() limit 0,25 ";
$aa=mysqli_query($con,"select * from register where ".$condition."  and uploadedfile!=''   ORDER BY rand()  limit 0,25 ");
//echo "select * from register where ".$condition."  and uploadedfile!=''   ORDER BY rand()  limit 0,25 ";
if(mysqli_num_rows($aa)>0)
{
while($bb=mysqli_fetch_array($aa))
{
    $temp_id=$bb['id'];
?>
<table style="border:#006699 solid 2px; margin-top:10px; margin-left:10px;" width="100%">
  <tbody><tr>
  <td rowspan="6" width="16%">
    <a href="../profile/<?php echo $bb['uploadedfile']; ?>" data-fancybox-group="gallery" title="<?php echo $bb['name']; ?>" class="fancybox">
<img src="../profile/<?php echo $bb['uploadedfile']; ?>" width="200" height="200"></a> </td>
  <td width="18%" height="33" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Name</span></td>
  <td width="1%">:</td>
  <td width="23%"><span style="color:#FF0000; font-size:14px;"><?php echo $bb['name']; ?></span></td>
  <td width="18%" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">UserId</span></td>
  <td width="1%">:</td>
   <td width="23%"><span style="color:#FF0000; font-size:14px;"><?php echo $bb['username']; ?></span></td>
  </tr>
  <tr>
  <td height="34" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Date of Birth---Age</span></td>
  <td>:</td>
  <td><span style="color:#FF0000; font-size:14px;"><?php echo $bb['dob']; ?>---<?php echo $bb['age']; ?></span></td>
  <td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Time of Birth</span></td>
  <td>:</td>
   <td><span style="color:#FF0000; font-size:14px;"><?php echo $bb['tob']; ?></span></td>
  </tr>
  <tr>
  <td height="34" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Education</span></td>
  <td>:</td>
  <td><span style="color:#FF0000; font-size:14px;"><?php echo $bb['education']; ?>  </span></td>
  <td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Residential Address</span></td>
  <td>:</td>
   <td><span style="color:#FF0000; font-size:14px;">
       <?php if($valid_string!='') { echo $bb['address']; } else { echo '******'; }  ?>
       </span></td>
  </tr>
  <tr>
  <td height="32" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Star</span></td>
  <td>:</td>
  <td><span style="color:#FF0000; font-size:14px;"><?php echo  ucwords($bb['star']); ?></span></td>
  <td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Moonsign</span></td>
  <td>:</td>
   <td><span style="color:#FF0000; font-size:14px;"><?php echo  ucwords($bb['moonsign']); ?></span></td>
  </tr>
  <tr>
  <td height="30" align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Job Details</span></td>
  <td>:</td>
  <td><span style="color:#FF0000; font-size:14px;"><?php echo  ucwords($bb['job']); ?></span></td>
  <td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Salary</span></td>
  <td>:</td>
   <td><span style="color:#FF0000; font-size:14px;"><?php echo  ucwords($bb['salary']); ?></span></td>
  </tr>
  
  <tr>
  <td colspan="6" align="center">
  <a href="full_view.php?userid=<?php echo $temp_id; ?>"><button class="btn btn-minier btn-yellow">Click here to view more..</button></a></td>
  </tr>
  </tbody>
  </table>
<?php
}
}
?>

</div><!-- /.col -->
</div> 

 <br> <!--<a class="btn btn-info" style="float: right;" href="advance_search.php"><i class="bigger-110"></i>Search More...</a>-->
 <a class="btn btn-info" style="float: right;" onclick='window.location.reload(true);topFunction();' ><i class="bigger-110"></i>Search More...</a>
<script>

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 500;
  document.documentElement.scrollTop = 500;
}
</script>

















<!--**************Pie Chart End*********************-->

</div><!-- /row -->
<div class="hr hr32 hr-dotted"></div>
                                

</div></div></div></div>
</div><a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div>
	<script type="text/javascript" src="fancyBox/lib/jquery-1.8.2.min.js"></script>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
</script>
<script type="text/javascript">
if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="assets/js/ace-elements.min.js"></script>
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
<!------------------ Fancy box ------------------->

	<!-- Add jQuery library -->


	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="fancyBox/source/jquery.fancybox.js?v=2.1.1"></script>
	<link rel="stylesheet" type="text/css" href="fancyBox/source/jquery.fancybox.css?v=2.1.1" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.4" />
	<script type="text/javascript" src="fancyBox/source/helpers/jquery.fancybox-buttons.js?v=1.0.4"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.4"></script>

	<script type="text/javascript">
		$(document).ready(function() {
		$('.fancybox').fancybox();
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});
	$(".fancybox-effects-d").fancybox({
				padding: 0,
				openEffect : 'elastic',
				openSpeed  : 150,
				closeEffect : 'elastic',
				closeSpeed  : 150,
				closeClick : true,
				helpers : {
					overlay : null
				}
			});
			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});
			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',
					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});
$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
					}
						}
});
});
});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
   <!----------------- Fancy box ------------------->

	</body>
</html>
<?php } ?>

