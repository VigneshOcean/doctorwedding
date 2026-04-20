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
error_reporting(0);
if(isset($_POST['submit']))
{
$gender=$_POST['gender'];
$caste=$_POST['caste'];
if(isset($_POST['subcaste'])) { $subcaste=$_POST['subcaste']; $_SESSION['subcaste']=$subcaste; }
$from_age=$_POST['from_age'];
$to_age=$_POST['to_age'];
$education=$_POST['education'];
$education=implode(',',$education);
$dosam=$_POST['dosam'];
$from_date=$_POST['from_date'];
$to_date=$_POST['to_date'];
$photo1=$_POST['photo1'];

$reg=mysqli_query($con, "select * from register where id='$id'");
$row_reg=mysqli_fetch_array($reg);
$his_age=$row_reg['age'];
if($his_age!='')
{
  $plus_age=$row_reg['age']+10;
  $minus_age=$row_reg['age']-10;
  if($row_reg['gender']=='male')
  {
    if($from_age<$minus_age)
    {
      $from_age=$minus_age;
    }
    if($to_age>$his_age)
    {
      $to_age=$his_age;
    }
  }
  if($row_reg['gender']=='female')
  {
     if($from_age<$his_age)
     {
       $from_age=$his_age;
     }
     if($to_age>$plus_age)
     {
       $to_age=$plus_age;
     }
  }
}


$_SESSION['gender']=$gender;
$_SESSION['caste']=$caste;
$_SESSION['from_age']=$from_age;
$_SESSION['to_age']=$to_age;
$_SESSION['education']=$education;
$_SESSION['dosam']=$dosam;
$_SESSION['from_date']=$from_date;
$_SESSION['to_date']=$to_date;
$_SESSION['photo1']=$photo1;
echo "<script language='javascript'>window.location='search_result.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8" />
<title>Happy Marriage:Advance Search</title>
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
function getcity(title)
{
var own_caste=document.getElementById("cat").value;
document.getElementById('subcaste').innerHTML='';
 var strURL="getinfo.php?title="+title;
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
	if(title!=own_caste)
	{
     document.getElementById('subcaste').innerHTML=req.responseText;
	 }
	 else
	 {
	  document.getElementById('subcaste').innerHTML='';
	 }
  } else {
       alert("There was a problem while using XMLHTTP:\n" + req.statusText);
  }
       }
      }
   req.open("GET", strURL, true);
   req.send(null);
   } 
}


//Function for Displaying and hiding.....
</script>
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
						
<div class="page-header"><h1>Advance Search</h1></div>      
<div class="row"><div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" role="form" action="advance_search.php" method="post" enctype="multipart/form-data"  onSubmit="return validlogin();">
<input type="hidden" name="cat" id="cat" value="<?php echo $riw_ghj['religion']; ?>" />
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
<?php
if($rr_religion=='21')
{
?>

<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sub Caste :</label>
<div class="col-sm-9"  style="width:350px;">
<div>
<select  class="width-80 chosen-select"   name="subcaste" id="subcaste" data-placeholder="Select Subcaste Name...">
<option value="">--Select Subcaste Name--</option>
<?php 
$kal=mysqli_query($con, "select * from subcaste  where caste='21' order by subcaste asc");
while($kal11=mysqli_fetch_array($kal))
{
?>
<option value="<?php echo $kal11['id']; ?>"><?php echo $kal11['subcaste']; ?></option>
<?php
}
?>
</select>
</div>
</div></div>

<div class="space-4"></div>
<?php
}
?>
<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Age Between :</label>
<div class="col-sm-9"  style="width:350px;">
<div>
<input class="col-xs-10 col-sm-5 mobilevalidation" type="text" placeholder="From age*" value="18" maxlength="2" name="from_age" id="from_age">
<input class="col-xs-10 col-sm-5 mobilevalidation" type="text" placeholder="To age*" value="40"  maxlength="2" id="to_age" name="to_age">
<!--<select class="width-80 chosen-select"  name="age" id="age" data-placeholder="Select Age Level..." >
<option value="">Any</option>
<option value="1">18-19</option>
<option value="2">20-29</option>
<option value="3">30-39</option>
<option value="4">40-49</option>
<option value="5">50-59</option>
</select>-->
</div>
</div></div>
<div class="space-4"></div>

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
</div></div>
<div class="space-4"></div>




<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Photo Selection :</label>
<div class="col-sm-9">
<div class="radio">
<label><input  id="photo1" type="radio" value="0" name="photo1" class="ace" /><span class="lbl">With Photo</span></label>
<label><input   id="photo1" type="radio" value="1" name="photo1" class="ace" /><span class="lbl">Without Photo</span></label>
<label><input id="photo1" type="radio" value="2" name="photo1" class="ace" checked /><span class="lbl">All</span></label>
</div>
</div></div>
<div class="space-4"></div>


<div class="clearfix form-actions"><div class="col-md-offset-3 col-md-9">
<button class="btn btn-info" type="submit" name="submit" id="submit"><i class="icon-search  bigger-110"></i>Search</button>
<!--<button class="btn" type="reset"><i class="icon-undo bigger-110"></i>Reset</button>-->
</div></div>
</form>
</div><!-- /.col -->
</div> 
                        
                     	</div><!-- /.page-content -->
				</div><!-- /.main-content -->
				<!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>			</a>		</div><!-- /.main-container -->
<script
  src="https://code.jquery.com/jquery-2.0.3.js"
  integrity="sha256-lCf+LfUffUxr81+W0ZFpcU0LQyuZ3Bj0F2DQNCxTgSI="
  crossorigin="anonymous"></script>
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
		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>
	
        <script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $(".mobilevalidation").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
               return false;
    }
   });
});
			jQuery(function($) {
			$(".chosen-select").chosen(); 
				$('#chosen-multiple-style').on('click', function(e){
					var target = $(e.target).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
					 else $('#form-field-select-4').removeClass('tag-input-style');
				});
			
			});
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
	</body>
</html>
<?php
}
?>