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

if(isset($_POST['submit']))
{
$gender=$_POST['gender'];
$caste=$_POST['caste'];
$subcaste=$_POST['subcaste'];
$from_age=$_POST['from_age'];
$to_age=$_POST['to_age'];
$education=$_POST['education'];
$dosam=$_POST['dosam'];
$from_date=$_POST['from_date'];
$to_date=$_POST['to_date'];
$photo1=$_POST['photo1'];
$govt_job=$_POST['govt_job'];
$_SESSION['gender']=$gender;
$_SESSION['caste']=$caste;
$_SESSION['subcaste']=$subcaste;
$_SESSION['from_age']=$from_age;
$_SESSION['to_age']=$to_age;
$_SESSION['education']=$education;
$_SESSION['dosam']=$dosam;
$_SESSION['from_date']=$from_date;
$_SESSION['to_date']=$to_date;
$_SESSION['photo1']=$photo1;
$_SESSION['govt_job']=$govt_job;
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
		<link rel="stylesheet" href="assets/css/datepicker.css" />
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
     document.getElementById('subcaste').innerHTML=req.responseText;
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

<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Looking For :</label>
<div class="col-sm-9">
<div class="radio">
<label><input  id="gender" type="radio" value="male" name="gender" class="ace" checked /><span class="lbl">Groom</span></label>
<label><input  id="gender" type="radio" value="female" name="gender" class="ace" /><span class="lbl">Bride</span></label>
</div>
</div></div>
<div class="space-4"></div>
<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Government Job :</label>
<div class="col-sm-9">
<div class="radio">
<label><input  id="govt_job" type="radio" value="Yes" name="govt_job" class="ace" checked /><span class="lbl">Yes</span></label>
<label><input  id="govt_job" type="radio" value="No" name="govt_job" class="ace" /><span class="lbl">No</span></label>
</div>
</div></div>
<div class="space-4"></div>

<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Caste :</label>
<div class="col-sm-9"  style="width:350px;">
<div>
<select class="width-80 chosen-select"  name="caste" id="caste" data-placeholder="Select Caste Name..."  onchange="getcity(this.value);">
<option value="">--Select Caste Name--</option>
<?php
$man=mysqli_query($con,"select * from caste  order by caste asc");
while($man1=mysqli_fetch_array($man))
 {
 ?>
<option value="<?php echo $man1['id']; ?>"><?php echo ucwords($man1['caste']); ?></option>
<?php
}
?>
</select>
</div>
</div></div>
<div class="space-4"></div>

<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sub Caste :</label>
<div class="col-sm-9"  style="width:305px;">
<div id="subcaste"></div>
</div></div>
<div class="space-4"></div>

<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Age Between :</label>
<div class="col-sm-9"  style="width:350px;">
<div>
<input class="col-xs-10 col-sm-5" type="text" placeholder="From age*" value="0" name="from_age" id="from_age">
<input class="col-xs-10 col-sm-5" type="text" placeholder="To age*" value="100" id="to_age" name="to_age">
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
<select class="width-80 chosen-select"  name="education" id="education" data-placeholder="Select Education Name...">
<option value="">--Select Education Name--</option>
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
</div></div>
<div class="space-4"></div>

<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Dosam :</label>
<div class="col-sm-9">
<div class="radio">
<label><input  id="dosam" type="radio" value="sevvai dosam" name="dosam" class="ace" /><span class="lbl">Sevvai Dosam</span></label>
<label><input   id="dosam" type="radio" value="ragu dosam" name="dosam" class="ace" /><span class="lbl">Ragu Dosam</span></label>
<label><input id="dosam" type="radio" value="sevvai+ragu dosam" name="dosam" class="ace" /><span class="lbl">Sevvai+Ragu Dosam</span></label>
<label><input   id="dosam" type="radio" value="none" name="dosam" class="ace" /><span class="lbl">None</span></label>
<label><input  id="dosam" type="radio" value="1" name="dosam" class="ace" checked /><span class="lbl">Does not matter</span></label>
</div>
</div></div>
<div class="space-4"></div>

<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1"> From Date : </label>
<div class="col-sm-9">
<input id="id-date-picker-1"  name="from_date" class="form-control date-picker" type="text" data-date-format="dd/mm/yyyy" style="width:240px; float:left;" >
<span class="input-group-addon"  style="width:35px; height:34px;" ><i class="icon-calendar bigger-110"></i></span>
</div></div>
<div class="space-4"></div>

<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1"> To Date : </label>
<div class="col-sm-9"><input id="id-date-picker-1" name="to_date" class="form-control date-picker" type="text" data-date-format="dd/mm/yyyy" style="width:240px; float:left;" ><span class="input-group-addon"  style="width:35px; height:34px;" >
<i class="icon-calendar bigger-110"></i>
</span></div></div>
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
		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/date-time/moment.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/jquery.autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>
		<script type="text/javascript">
			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
				$(".chosen-select").chosen(); 
				$('#chosen-multiple-style').on('click', function(e){
					var target = $(e.target).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
					 else $('#form-field-select-4').removeClass('tag-input-style');
				});
			
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
				$('textarea[class*=autosize]').autosize({append: "\n"});
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).val('.'+sizing[val]);
					}
				});
				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
				
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1]+"";
						if(! ui.handle.firstChild ) {
							$(ui.handle).append("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>");
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('a').on('blur', function(){
					$(this.firstChild).hide();
				});
				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				$( "#eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
					});
				});
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				$('#id-input-file-3').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-cloud-upload',
					droppable:true,
					thumbnail:'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}

				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
			
				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var before_change
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "icon-picture";
						before_change = function(files, dropped) {
							var allowed_files = [];
							for(var i = 0 ; i < files.length; i++) {
								var file = files[i];
								if(typeof file === "string") {
									//IE8 and browsers that don't support File Object
									if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
								}
								else {
									var type = $.trim(file.type);
									if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
											|| ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for android's default browser which gives an empty string for file.type
										) continue;//not an image so don't keep this file
								}
								allowed_files.push(file);
							}
							if(allowed_files.length == 0) return false;
							return allowed_files;
						}
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "icon-cloud-upload";
						before_change = function(files, dropped) {
							return files;
						}
					}
					var file_input = $('#id-input-file-3');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});
			
			
				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.on('change', function(){
					//alert(this.value)
				});
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'icon-caret-up', icon_down:'icon-caret-down'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'icon-plus smaller-75', icon_down:'icon-minus smaller-75', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
			
				$('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				$('input[name=date-range-picker]').daterangepicker().prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				$('#colorpicker1').colorpicker();
				$('#simple-colorpicker-1').ace_colorpicker();
				
				$(".knob").knob();
				
				//we could just set the data-provide="tag" of the element inside HTML, but IE8 fails!
				var tag_input = $('#form-field-tags');
				if(! ( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase())) ) 
				{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.variable_US_STATES,//defined in ace.js >> ace.enable_search_ahead
					  }
					);
				}
				else {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//$('#form-field-tags').autosize({append: "\n"});
				}
				
			
				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					$(this).find('.chosen-container').each(function(){
						$(this).find('a:first-child').css('width' , '210px');
						$(this).find('.chosen-drop').css('width' , '210px');
						$(this).find('.chosen-search input').css('width' , '200px');
					});
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/
			});
		</script>
	</body>
</html>
<?php
}
?>