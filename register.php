<?php include("include/connect.php"); ?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php include("include/title.php"); ?>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/register.js"></script>
	<script type="text/javascript" src="js/form-field-tooltip.js"></script>
	<script type="text/javascript" src="js/rounded-corners.js"></script>
	<link type="text/css" rel="stylesheet" href="css/header-footer.css" />
	<link type="text/css" rel="stylesheet" href="css/form-field-tooltip.css" />
	<link type="text/css" rel="stylesheet" href="css/common.css" />
</head>

<body class="back">
	<?php include("include/header.php"); ?>

	<div class="container my-5">
		<div class="registration-wrapper shadow-sm bg-white p-4 rounded-3" style="border-top: 5px solid #07642f;">
			<div class="plr">
				<style>
					.error {
						color: #f00;
						font-size: 11px;
						display: none;
					}
				</style>
				<script language="javascript">
					function profile_add_disp(obj) {
						if (obj == "Self" || obj == "") {
							$('#addedfrm').html('Basic Information')
							$('#conperson').hide()
						}
						else {
							$('#addedfrm').html("Basic Information Of Your " + obj)
							$('#conperson').show()
						}
					}
					function isNumberKey(evt) {
						var charCode = (evt.which) ? evt.which : event.keyCode
						if (charCode > 31 && (charCode < 48 || charCode > 57))
							return false;
						return true;
					}
				</SCRIPT>
				<script type="text/javascript">
					var xmlHttp;
					function dynshowHint(str, sitename, geturl, element_name) {
						xmlHttp = GetXmlHttpObject();
						if (xmlHttp == null) {
							alert("Browser does not support HTTP Request");
							return;
						}
						document.getElementById(element_name).innerHTML = '<img src="images/loading.gif">';
						var url = sitename + geturl;
						url = url + "&q=" + str;
						url = url + "&sid=" + Math.random();
						xmlHttp.onreadystatechange =
							function dynstateChanged() {
								if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
									document.getElementById(element_name).innerHTML = xmlHttp.responseText;
									if (xmlHttp.responseText.length > 4) {
										document.getElementById(element_name).innerHTML = xmlHttp.responseText;
										if (element_name == 'namedisp') {
											document.getElementById('username').focus();
										}
										return false;
									}
								}
							};
						xmlHttp.open("GET/index.html", url, true);
						xmlHttp.send(null)
					}
					function GetXmlHttpObject() {
						var objXMLHttp = null;
						if (window.XMLHttpRequest) {
							objXMLHttp = new XMLHttpRequest();
						}
						else if (window.ActiveXObject) {
							objXMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						return (objXMLHttp);
					} 
				</script>
				<script type="text/javascript">
					function getXMLHTTP() { //fuction to return the xml http object
						var xmlhttp = false;
						try {
							xmlhttp = new XMLHttpRequest();
						}
						catch (e) {
							try {
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							catch (e) {
								try {
									xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
								}
								catch (e1) {
									xmlhttp = false;
								}
							}
						}
						return xmlhttp;
					}
					//Function for Displaying cities
					function getcity(title) {
						//alert('hai');
						//alert(title);
						var strURL = "getinfo.php?title=" + title;
						//alert(strURL);
						var req = getXMLHTTP();
						if (req) {
							req.onreadystatechange = function () {
								if (req.readyState == 4) {
									// only if "OK"
									if (req.status == 200) {
										document.getElementById('caste').innerHTML = req.responseText;
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
					function onlyNumbers(event) {
						var e = event || evt; // for trans-browser compatibility
						var charCode = e.which || e.keyCode;
						if (charCode > 31 && (charCode < 48 || charCode > 57))
							return false;
						return true;
					}
					function validate_Email(email) {
						var x = document.getElementById("email").value;
						//alert(x);exit;
						//var x=document.forms["registerform"]["email"].value;
						var atpos = x.indexOf("@");
						var dotpos = x.lastIndexOf(".");
						if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
							alert("Not a valid e-mail address");
							document.getElementById("email").value = '';
							return false;
						}
						return true;
					}
				</script>
				<script type="text/javascript">
					function validateForm() {
						var x = document.getElementById("name").value;
						if (x == "null" || x == "") {
							alert("Please Enter Your Name");
							return false;
						}
						var x = document.getElementById("dob").value;
						if (x == "null" || x == "") {
							alert("Please Enter Date of birth");
							return false;
						}
						var x = document.getElementById("self_desc").value;
						if (x == "null" || x == "") {
							alert("Please Tell About Yourself");
							return false;
						}
						if ((document.frm.rad_gen[0].checked == false) && (document.frm.rad_gen[1].checked == false)) {
							alert("Please choose your gender");
							document.frm.rad_gen[0].focus();
							return false;
						}

						var x = document.forms["frm"]["caste"].selectedIndex;
						if (x == "null" || x == "") {
							alert("Please Select Caste");
							document.frm.caste.focus();
							return false;
						}

						var x = document.forms["frm"]["star"].selectedIndex;
						if (x == "null" || x == "") {
							alert("Please Select Star");
							document.frm.star.focus();
							return false;
						}
						var x = document.forms["frm"]["moonsign"].selectedIndex;
						if (x == "null" || x == "") {
							alert("Please Select moonsign");
							document.frm.moonsign.focus();
							return false;
						}


						return true;
					}
				</script>
				<script type="text/javascript">
					function validateForm() {
						//alert("{fdfd");
						var x = document.getElementById("name").value;
						if (x == "null" || x == "") {
							alert("Please Enter Your Name");
							return false;
						}
						var z = document.getElementById("dob").value;
						if (z == "null" || z == "") {
							alert("Please Enter Date of Birth");
							return false;
						}
						var y = document.getElementById("mobile").value;
						if (y == "null" || y == "") {
							alert("Please Enter Your Mobile Number");
							return false;
						}
						/*var a=document.getElementById("email").value;
						if(a=="null" || a=="")
						{
						alert("Please Enter Your Email Id");
						return false; 
						}*/
						var b = document.getElementById("religion").value;
						if (b == "null" || b == "") {
							alert("Please select Caste");
							return false;
						}
						/*var c=document.getElementById("salary").value;
						if(c=="null" || c=="")
						{
						alert("Please Enter Salary");
						return false; 
						}*/

						return true;
					}
				</script>
				<div class="plr">


					<style type="text/css">
						.w90 {
							width: 50%;
						}
					</style>
					<p class="amem uu">Already a Member? <a href="login.php">Click Here</a></p>
					<div class="bdr">
						<p class="jn_g2 p10px"><b>Account Information</b> (* Mandatory Fields)</p>
						<div class="p10px gray joinNow"><br />
							<form name="registerForm" id="registerForm" action="save_user.php" method="post"
								enctype="multipart/form-data" onSubmit="return validateForm();">
								<input id="command" type="hidden" name="command" value="register" />
								<table width="98%" border="0" cellspacing="0" cellpadding="0">
									<tr valign="top">
										<td class="bdrR w66">
											<h1 class="p5px10px mb15px bdrBd mr20px">Personal Information</h1>

											<table style="font-size:15px;" width="100%" border="0" cellpadding="0"
												cellspacing="0">
												<tr>
													<td class="p5px10px">Name/ <font face="Latha" size="-3">பெயர்</font>
														<span class="star">*</span></td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<input type="text" class="input w90" style="padding:3px;"
															name="name" id="name" value=""
															tooltipText="Plz specify the name for whom u r searching a match." />
														<p class="error" id="name_error"></p>
													</td>
												</tr>
												<tr>
													<td class="p5px10px">Gender/ <font face="Latha" size="-3">பாலினம்
														</font> <span class="star">*</span></td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px"><input name="gender_type" type="radio"
															class="vam" value="male" checked="checked">Male &nbsp;
														<input class="vam" name="gender_type" type="radio"
															value="female" />Female
													</td>
												</tr>

												<tr>
													<td width="35%" class="p5px10px">Profile Created for </td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select name="profile" id="profile" class="input"
															style="width:290px;">
															<option value="self">Myself</option>
															<option value="parents">Parents</option>
															<option value="friends">Friends</option>
															<option value="admin">Admin</option>
														</select>
														<p class="error" id="profile_error"></p>
													</td>
												</tr>


												<tr>
													<td width="35%" class="p5px10px"> Reference by </td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select name="refernce" id="refernce" class="input"
															style="width:290px;">
															<option value="newspaper">Newspaper Advertisement</option>
															<option value="direct">Direct Contact</option>
															<option value="friends">Friends</option>
														</select>
													</td>
												</tr>
												<tr>
													<td class="p5px10px">DOB/ <font face="Latha" size="-3">பிறந்த நாள்
														</font> <span class="star">*</span></td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<input type="text" class="input w90" style="padding:3px;"
															name="dob" id="dob" value=""
															tooltipText="Plz specify the Date of birth in this format(ie.01/12/1990)" />
														<p class="error" id="dob_error"></p>
													</td>
												</tr>
												<tr>
													<td class="p5px10px">TOB/ <font face="Latha" size="-3">பிறந்த நேரம்
														</font>
													</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<input type="text" class="input w90" style="padding:3px;"
															name="birthtime" id="birthtime" value=""
															tooltipText="Plz specify the Time of birth in this format(Eg:07:05AM,08:50PM)" />
													</td>
												</tr>
												<tr>
													<td class="p5px10px">Place of Birth</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<input type="text" class="input w90" style="padding:3px;"
															name="p_birth" id="p_birth" value=""
															tooltipText="Plz specify the Place of birth" />
														<p class="error" id="dob_error"></p>
													</td>
												</tr>

												<tr>
													<td class="p5px10px">Age</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<input type="text" class="input w90" style="padding:3px;"
															name="age" id="age" value=""
															tooltipText="Plz specify Age" />
														<p class="error" id="dob_error"></p>
													</td>
												</tr>
												<tr>
													<td width="35%" class="p5px10px">House</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select name="house_type" id="house_type" class="input"
															style="width:290px;">
															<option value="">-Select-</option>
															<option value="Own">Own</option>
															<option value="Rent">Rent</option>
															<option value="Lease">Lease</option>
														</select>
													</td>
												</tr>

												<tr>
													<td width="35%" class="p5px10px">Home Type </td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select name="home_type" id="home_type" class="input"
															style="width:290px;">
															<option value="">-Select-</option>
															<option value="highclass">High Class</option>
															<option value="middleclass">Middle Class</option>
															<option value="upperclass">Upper Class</option>
															<option value="uppermiddleclass">Upper middle Class</option>
														</select>
													</td>
												</tr>
												<tr>
													<td valign="top" class="p5px10px"> Attach Your Photograph</td>
													<td valign="top" class="p5px gray b">:</td>
													<td class="p5px10px">
														<input type="file" class="input" size="30" name="uploadedfile"
															id="uploadedfile" />
														<p class="xxsmall">Images in .jpeg/.jpg & .gif format &amp;
															under 2 MB in size can be uploaded.</p>
														<p class="xxsmall">A photo can tell thousand things without
															talking, It's the perfect way to attract more profile </p>
													</td>
												</tr>
												<tr>
													<td width="35%" class="p5px10px">Caste </td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select name="religion" id="religion" class="input"
															style="width:290px;" onchange="getcity(this.value);">
															<option value="">--select--</option>
															<?php
															$caste = mysqli_query($con, "select * from caste");
															while ($caste_row = mysqli_fetch_array($caste)) {
																?>
																<option value="<?php echo $caste_row['id']; ?>">
																	<?php echo $caste_row['caste']; ?></option>
															<?php
															}
															?>
														</select>
														<p class="error" id="profile_error"></p>
													</td>
												</tr>
												<tr>
													<td width="35%" class="p5px10px">Sub Caste </td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select id="caste" name="caste" class="input"
															style="width:290px;">
															<option value="">--select--</option>
														</select>
														<p class="error" id="profile_error"></p>
													</td>
												</tr>

												<tr>
													<td width="35%" class="p5px10px">Star(Nakshatra)/ <font face="Latha"
															size="-3">நட்சத்திரம்</font>
													</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select name="star" id="star" class="input"
															style="width:290px;">
															<option value="">--select--</option>
															<option value="ASWINI">ASWINI</option>
															<option value="BHARANI">BHARANI</option>
															<option value="KRITHIGAI">KRITHIGAI</option>
															<option value="ROHINI">ROHINI</option>
															<option value="MRIGASIRISHAM">MRIGASIRISHAM</option>
															<option value="THIRUVADIRAI">THIRUVADIRAI</option>
															<option value="PUNARPUSAM">PUNARPUSAM</option>
															<option value="POOSAM">POOSAM</option>
															<option value="AYILYAM">AYILYAM</option>
															<option value="MAHAM">MAHAM</option>
															<option value="PURAM">PURAM</option>
															<option value="UTHRAM">UTHRAM</option>
															<option value="HASTHAM">HASTHAM</option>
															<option value="CHITHIRAI">CHITHIRAI</option>
															<option value="SWATHI">SWATHI</option>
															<option value="VISAKAM">VISAKAM</option>
															<option value="ANUSHAM">ANUSHAM</option>
															<option value="KETTAI">KETTAI</option>
															<option value="MOOLAM">MOOLAM</option>
															<option value="PURADAM">PURADAM</option>
															<option value="UTHRADAM">UTHRADAM</option>
															<option value="THIRUVONAM">THIRUVONAM</option>
															<option value="AVITTAM">AVITTAM</option>
															<option value="SADAYAM">SADAYAM</option>
															<option value="PURATATHI">PURATATHI</option>
															<option value="UTHRATADHI">UTHRATADHI</option>
															<option value="REVATHI">REVATHI</option>
														</select>
														<p class="error" id="profile_error"></p>
													</td>
												</tr>

												<tr>
													<td width="35%" class="p5px10px">Moonsign/ <font face="Latha"
															size="-3">ராசி்</font>
													</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select name="moonsign" id="moonsign" class="input"
															style="width:290px;">
															<option value="">--select--</option>
															<option value="Mesh (Aries)">Mesh (Aries)</option>
															<option value="Vrishabh (Taurus)">Vrishabh (Taurus)</option>
															<option value="Mithun (Gemini)">Mithun (Gemini)</option>
															<option value="Karka (Cancer)">Karka (Cancer)</option>
															<option value="Simha (Leo)">Simha (Leo)</option>
															<option value="Kanya (Virgo)">Kanya (Virgo)</option>
															<option value="Tula (Libra)">Tula (Libra)</option>
															<option value="Vrischika (Scorpio)">Vrischika (Scorpio)
															</option>
															<option value="Dhanu (Sagittarious)">Dhanu (Sagittarious)
															</option>
															<option value="Makar (Capricorn)">Makar (Capricorn)</option>
															<option value="Kumbha (Aquarious)">Kumbha (Aquarious)
															</option>
															<option value="Meen (Pisces)">Meen (Pisces)</option>
														</select>
														<p class="error" id="profile_error"></p>
													</td>
												</tr>

												<tr>
													<td width="35%" class="p5px10px">Status </td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select name="status1" id="status1" class="input"
															style="width:290px;">
															<option value="">--select--</option>
															<option value="unmarried" selected="selected">Unmarried
															</option>
															<option value="widow">Widow</option>
															<option value="divorce">Divorce</option>
															<option value="awaitingdivorce">Awaiting divorce</option>
														</select>
														<p class="error" id="profile_error"></p>
													</td>
												</tr>

												<tr>
													<td width="35%" class="p5px10px">Skin color </td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select name="skin" id="skin" class="input"
															style="width:290px;">
															<option value="">--select--</option>
															<option value="Very Fair">Very Fair</option>
															<option value="Fair">Fair</option>
															<option value="Wheatish">Wheatish</option>
															<option value="Wheatish Medium">Wheatish Medium</option>
															<option value="Wheatish Brown">Wheatish Brown</option>
															<option value="Dark">Dark</option>
														</select>
														<p class="error" id="profile_error"></p>
													</td>
												</tr>
												<tr>
													<td width="35%" class="p5px10px">Height/ <font face="Latha"
															size="-3">உயரம்</font>
													</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select name="height" id="height" class="input"
															style="width:290px;">
															<option value="">--select Height--</option>
															<option value="below 4ft">below 4ft</option>
															<option value="4 Ft - 121 Cm">4 Ft - 121 Cm</option>
															<option value="4 Ft 1 In - 124 Cm">4 Ft 1 In - 124 Cm
															</option>
															<option value="4 Ft 2 In - 127 Cm">4 Ft 2 In - 127 Cm
															</option>
															<option value="4 Ft 3 In - 129 Cm">4 Ft 3 In - 129 Cm
															</option>
															<option value="4 Ft 4 In - 132 Cm">4 Ft 4 In - 132 Cm
															</option>
															<option value="4 Ft 5 In - 134 Cm">4 Ft 5 In - 134 Cm
															</option>
															<option value="4 Ft 6 In - 137 Cm">4 Ft 6 In - 137 Cm
															</option>
															<option value="4 Ft 7 In - 139 Cm">4 Ft 7 In - 139 Cm
															</option>
															<option value="4 Ft 8 In - 142 Cm">4 Ft 8 In - 142 Cm
															</option>
															<option value="4 Ft 9 In - 144 Cm">4 Ft 9 In - 144 Cm
															</option>
															<option value="4 Ft 10 In - 147 Cm">4 Ft 10 In - 147 Cm
															</option>
															<option value="4 Ft 11 In - 149 Cm">4 Ft 11 In - 149 Cm
															</option>
															<option value="5 Ft - 152 Cm">5 Ft - 152 Cm</option>
															<option value="5 Ft 1 In - 154 Cm">5 Ft 1 In - 154 Cm
															</option>
															<option value="5 Ft 2 In - 157 Cm">5 Ft 2 In - 157 Cm
															</option>
															<option value="5 Ft 3 In - 160 Cm">5 Ft 3 In - 160 Cm
															</option>
															<option value="5 Ft 4 In - 162 Cm">5 Ft 4 In - 162 Cm
															</option>
															<option value="5 Ft 5 In - 165 Cm">5 Ft 5 In - 165 Cm
															</option>
															<option value="5 Ft 6 In - 167 Cm">5 Ft 6 In - 167 Cm
															</option>
															<option value="5 Ft 7 In - 170 Cm">5 Ft 7 In - 170 Cm
															</option>
															<option value="5 Ft 8 In - 172 Cm">5 Ft 8 In - 172 Cm
															</option>
															<option value="5 Ft 9 In - 175 Cm">5 Ft 9 In - 175 Cm
															</option>
															<option value="5 Ft 10 In - 177 Cm">5 Ft 10 In - 177 Cm
															</option>
															<option value="5 Ft 11 In - 180 Cm">5 Ft 11 In - 180 Cm
															</option>
															<option value="6 Ft - 182 Cm">6 Ft - 182 Cm</option>
															<option value="6 Ft 1 In - 185 Cm">6 Ft 1 In - 185 Cm
															</option>
															<option value="6 Ft 2 In - 187 Cm">6 Ft 2 In - 187 Cm
															</option>
															<option value="6 Ft 3 In - 190 Cm">6 Ft 3 In - 190 Cm
															</option>
															<option value="6 Ft 4 In - 193 Cm">6 Ft 4 In - 193 Cm
															</option>
															<option value="6 Ft 5 In - 195 Cm">6 Ft 5 In - 195 Cm
															</option>
															<option value="6 Ft 6 In - 198 Cm">6 Ft 6 In - 198 Cm
															</option>
															<option value="6 Ft 7 In - 200 Cm">6 Ft 7 In - 200 Cm
															</option>
															<option value="6 Ft 8 In - 203 Cm">6 Ft 8 In - 203 Cm
															</option>
															<option value="6 Ft 9 In - 205 Cm">6 Ft 9 In - 205 Cm
															</option>
															<option value="6 Ft 10 In - 208 Cm">6 Ft 10 In - 208 Cm
															</option>
															<option value="6 Ft 11 In - 210 Cm">6 Ft 11 In - 210 Cm
															</option>
															<option value="7 Ft - 213 Cm">7 Ft - 213 Cm</option>
														</select>
														<p class="error" id="profile_error"></p>
													</td>
												</tr>
											</table>

											<br /><br />
											<h1 class="p5px10px mb15px bdrBd mr20px">Contact Information</h1>
											<table style="font-size:15px;" width="100%" border="0" cellpadding="0"
												cellspacing="0">
												<tr valign="top">
													<td class="p5px10px">Mobile Phone <span class="star">*</span> </td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<input style="width:55px; padding:3px;" type="text"
															class="input" name="mobile_cont_code" id="mobile_cont_code"
															onkeypress="return isNumberKey(event)" value="91"
															readonly /> -
														<input type="text" name="mobile" id="mobile" value=""
															class="input w90" style="padding:3px;width:200px;"
															onfocus="event_on_focus('mobile','Mobile No.')"
															onblur="event_on_blur('mobile','Mobile No.')"
															maxlength="30" />
														<p class="error" id="mobile_error"></p>
														<br />
														<p style="font-size:11px;"><b class="red">Note: </b>Please enter
															Valid Mobile No. to activate your profile.</p>
													</td>
												</tr>
												<tr valign="top">
													<td width="35%" class="p5px10px">Email/ <font face="Latha"
															size="-3">மின்னஞ்சல்</font>
													</td>
													<td class="p5px b gray" width="5">:</td>
													<td class="p5px10px"><input type="text" class="input w90"
															name="email" id="email" value=""
															tooltipText="Example abc@yahoo.com <br>Email address will not be shared with anyone. You will receive matches on this email address."
															onblur="return validate_Email(this);" />
														<p class="error" id="username_error"></p>
													</td>
												</tr>

												<tr valign="top">
													<td width="35%" class="p5px10px">Residence </td>
													<td class="p5px b gray" width="5">:</td>
													<td class="p5px10px"><textarea name="address" id="address"
															style="width: 263px; height: 70px;"></textarea>
														<p class="error" id="username_error"></p>
													</td>
												</tr>

											</table>
											<br />
											<br />
											<h1 id="addedfrm" class="p5px10px mb15px bdrBd mr20px">Work Information</h1>
											<table style="font-size:15px;" width="100%" border="0" cellpadding="0"
												cellspacing="0">

												<tr>
													<td width="35%" class="p5px10px">Education/ <font face="Latha"
															size="-3">கல்வி</font>
													</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select name="education" id="education" class="input"
															style="width:290px;">
															<option value="">--select--</option>
															<?php
															$education = mysqli_query($con, "select * from education");
															while ($education_row = mysqli_fetch_array($education)) {
																?>
																<option value="<?php echo $education_row['education']; ?>">
																	<?php echo $education_row['education']; ?></option>
															<?php
															}
															?>
														</select>
														<p class="error" id="profile_error"></p>
													</td>
												</tr>
												<tr>
													<td width="35%" class="p5px10px">Education in details</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px"><input type="text" class="input w90"
															name="edu_det" id="edu_det" value=""
															tooltipText="Enter degree name" />
														<p class="error" id="username_error"></p>
													</td>
												</tr>
												<tr>
													<td width="35%" class="p5px10px">Job/ <font face="Latha" size="-3">
															வேலை</font>
													</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px"><input type="text" class="input w90" name="job"
															id="job" value="" tooltipText="Enter Desgination name" />
														<p class="error" id="username_error"></p>
													</td>
												</tr>

												<tr>
													<td width="35%" class="p5px10px">Company Name</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px"><input type="text" class="input w90"
															name="job_cmpy" id="job_cmpy" value="" />
														<p class="error" id="username_error"></p>
													</td>
												</tr>
												<tr>
													<td width="35%" class="p5px10px">Job location</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px"><input type="text" class="input w90"
															name="job_loc" id="job_loc" value="" />
														<p class="error" id="username_error"></p>
													</td>
												</tr>
												<tr>
													<td width="35%" class="p5px10px">Salary/ <font face="Latha"
															size="-3">சம்பளம்</font>
													</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px"><input type="text" class="input w90"
															name="salary" id="salary" value="" />
														<p class="error" id="username_error"></p>
													</td>
												</tr>
											</table>


											<br /><br />
											<h1 class="p5px10px mb15px bdrBd mr20px">Family Information</h1>
											<table style="font-size:15px;" width="100%" border="0" cellpadding="0"
												cellspacing="0">
												<tr>
													<td class="p5px10px">Father Details</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px"><input name="falive" type="radio" class="vam"
															value="Alive" checked="checked">Alive &nbsp;
														<input class="vam" name="falive" type="radio"
															value="Not Alive" />Not Alive
													</td>
												</tr>
												<tr valign="top">
													<td width="35%" class="p5px10px">Father's Name/ <font face="Latha"
															size="-3">தந்தை பெயர்</font>
													</td>
													<td class="p5px b gray" width="5">:</td>
													<td class="p5px10px"><input type="text" class="input w90"
															name="fathername" id="fathername" value="" />
														<p class="error" id="username_error"></p>
													</td>
												</tr>
												<tr valign="top">
													<td width="35%" class="p5px10px">Father's Occupation/ <font
															face="Latha" size="-3">தந்தை பதவி்</font>
													</td>
													<td class="p5px b gray" width="5">:</td>
													<td class="p5px10px"><input type="text" class="input w90"
															name="father_occupation" id="father_occupation" value="" />
														<p class="error" id="username_error"></p>
													</td>
												</tr>
												<tr>
													<td class="p5px10px">Mother Details</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px"><input name="malive" type="radio" class="vam"
															value="Alive" checked="checked">Alive &nbsp;
														<input class="vam" name="malive" type="radio"
															value="Not Alive" />Not Alive
													</td>
												</tr>
												<tr valign="top">
													<td width="35%" class="p5px10px">Mother's Name/ <font face="Latha"
															size="-3">தாய் பெயர்</font>
													</td>
													<td class="p5px b gray" width="5">:</td>
													<td class="p5px10px"><input type="text" class="input w90"
															name="mother_name" id="mother_name" value="" />
														<p class="error" id="username_error"></p>
													</td>
												</tr>
												<tr valign="top">
													<td width="35%" class="p5px10px">Mother's Occupation/ <font
															face="Latha" size="-3">தாய் பதவி்</font>
													</td>
													<td class="p5px b gray" width="5">:</td>
													<td class="p5px10px"><input type="text" class="input w90"
															name="mother_occupation" id="father_occupation" value="" />
														<p class="error" id="username_error"></p>
													</td>
												</tr>
												<tr>
													<td width="35%" class="p5px10px"> No of Brothers/ <font face="Latha"
															size="-3">சகோதரர்கள் எண்ணிக்கை்</font>
													</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select name="no_of_brothers" id="no_of_brothers" class="input"
															style="width:290px;">
															<option value="">Not Applicable</option>
															<option value="0">0</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="4 +">4 +</option>
														</select>
														<p class="error" id="profile_error"></p>
													</td>
												</tr>
												<tr>
													<td width="35%" class="p5px10px">No of Brothers Married/ <font
															face="Latha" size="-3">திருமணமான சகோதரன் எண்ணிக்கை</font>
													</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select name="bro_married" id="bro_married" class="input"
															style="width:290px;">
															<option value="">Not Applicable</option>
															<option value="No married brother">No married brother
															</option>
															<option value="One married brother">One married brother
															</option>
															<option value="Two married brother">Two married brother
															</option>
															<option value="Three married brother">Three married brother
															</option>
															<option value="Four married brother">Four married brothers
															</option>
															<option value="Above four married brother">Above four
																married brother</option>
														</select>
														<p class="error" id="profile_error"></p>
													</td>
												</tr>
												<tr>
													<td width="35%" class="p5px10px"> No of Sisters/ <font face="Latha"
															size="-3">சகோதரிகள் எண்ணிக்கை</font>
													</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select name="no_of_sisters" id="no_of_sisters" class="input"
															style="width:290px;">
															<option value="">Not Applicable</option>
															<option value="0">0</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="4 +">4 +</option>
														</select>
														<p class="error" id="profile_error"></p>
													</td>
												</tr>
												<tr>
													<td width="35%" class="p5px10px">No of Sisters Married/ <font
															face="Latha" size="-3">திருமணமான சகோதரிகள் எண்ணிக்கை</font>
													</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<select name="sis_married" id="sis_married" class="input"
															style="width:290px;">
															<option value="">Not Applicable</option>
															<option value="No married sister">No married sister</option>
															<option value="One married sister">One married sister
															</option>
															<option value="Two married sisters">Two married sisters
															</option>
															<option value="Three married sisters">Three married sisters
															</option>
															<option value="Four married sisters">Four married sistes
															</option>
															<option value="Above four married sisters">Above four
																married sisters</option>
														</select>
														<p class="error" id="profile_error"></p>
													</td>
												</tr>

											</table>

											<br /><br />
											<h1 class="p5px10px mb15px bdrBd mr20px">Other Information</h1>
											<table style="font-size:15px;" width="100%" border="0" cellpadding="0"
												cellspacing="0">
												<tr valign="top">
													<td width="35%" class="p5px10px">Self Description </td>
													<td class="p5px b gray" width="5">:</td>
													<td class="p5px10px"><textarea name="self_desc" id="self_desc"
															style="width: 263px; height: 70px;"></textarea>
														<p class="error" id="username_error"></p>
													</td>
												</tr>

												<tr valign="top">
													<td width="35%" class="p5px10px">Expectation/ <font face="Latha"
															size="-3">எதிர்பார்த்து இருத்தல்</font>
													</td>
													<td class="p5px b gray" width="5">:</td>
													<td class="p5px10px"><textarea name="expectation" id="expectation"
															style="width: 263px; height: 70px;"></textarea>
														<p class="error" id="username_error"></p>
													</td>
												</tr>

												<tr>
													<td class="p5px10px">Dosam</td>
													<td class="p5px b gray">:</td>
													<td class="p5px10px">
														<input name="dosam" type="radio" class="vam"
															value="sevvai dosam">Sevvai Dosam &nbsp;
														<input class="vam" name="dosam" type="radio"
															value="ragu dosam" />Ragu Dosam&nbsp;
														<input name="dosam" type="radio" class="vam"
															value="sevvai+ragu dosam">Sevvai+Ragu Dosam &nbsp;
														<input class="vam" name="dosam" type="radio" value="none"
															checked="checked" />None&nbsp;
													</td>
												</tr>

												<tr valign="top">
													<td width="35%" class="p5px10px">Description(If any Dosam)</td>
													<td class="p5px b gray" width="5">:</td>
													<td class="p5px10px"><textarea name="self_dosam" id="self_dosam"
															style="width: 263px; height: 70px;"></textarea>
														<p class="error" id="username_error"></p>
													</td>
												</tr>

												<tr valign="top">
													<td width="35%" class="p5px10px">Residence Area</td>
													<td class="p5px b gray" width="5">:</td>
													<td class="p5px10px"><input type="text" class="input w90"
															name="area" id="area" value="" />
														<p class="error" id="username_error"></p>
													</td>
												</tr>

											</table>


										</td>
									</tr>






									<tr valign="top">
										<td class="p20px" style="padding-left:316px;" colspan="2">
											<p> <input class="vam" type="checkbox" name="terms" id="terms"
													checked="checked" /> I agree to the Happy Marriage Matrimony <span
													class="red">
													<a href="#">Terms and Conditions.</a>
													<!--<a href="javascript:openwin('terms.html', 600, 450);">Terms and Conditions.</a>-->
												</span></p>
											<p class="error" id="terms_error"></p>
											<br />
											<div class="rn_btn">
												<input type="hidden" name="id1" value="submit_new">
												<button type="submit"><span
														style="color:#FFFFFF; padding:5px; font-size:16px; font-weight:bold;">Register
														Now</span></button>
											</div>
										</td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>

				<script type="text/javascript">
					var tooltipObj = new DHTMLgoodies_formTooltip();
					tooltipObj.setTooltipPosition('right');
					tooltipObj.setPageBgColor('#f00');
					tooltipObj.setCloseMessage('Exit');
					tooltipObj.initFormFieldTooltip();
				</script>
				<script language="javascript">
					function chk() {
						var a = document.getElementById('marital_status_code').value;
						if (a != "12" && a != "") {
							$('#children').css('display', 'block');
						}
						else {
							$('#children').css('display', 'none');
						}
					}
				</script>

			</div>
		</div>
	</div>

	<?php include("include/footer.php"); ?>
</body>

</html>