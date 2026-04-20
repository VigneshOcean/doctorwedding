<?php
include("../include/connect.php");
session_start();
$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
	echo "<script type=text/javascript>window.location='../index.php?err';</script>";
} else {
	$a = mysqli_query($con, "select * from register where id='$id'") or die(mysqli_error($con));
	$usprod = mysqli_fetch_array($a);
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<title>Happy Marriage:Edit Profile</title>
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
				var strURL = "getinfo.php?title=" + title;
				var req = getXMLHTTP();
				if (req) {
					req.onreadystatechange = function () {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
								alert(req.responseText);
								document.getElementById('subcaste').innerHTML = req.responseText;
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
		<!------------------ Fancy box ------------------->

	<!-- Add jQuery library -->
		<script type="text/javascript" src="fancyBox/lib/jquery-1.8.2.min.js"></script>

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
			$(document).ready(function () {
				$('.fancybox').fancybox();
				$(".fancybox-effects-a").fancybox({
					helpers: {
						title: {
							type: 'outside'
						},
						overlay: {
							speedOut: 0
						}
					}
				});

				// Disable opening and closing animations, change title type
				$(".fancybox-effects-b").fancybox({
					openEffect: 'none',
					closeEffect: 'none',

					helpers: {
						title: {
							type: 'over'
						}
					}
				});

				// Set custom style, close if clicked, change title type and overlay color
				$(".fancybox-effects-c").fancybox({
					wrapCSS: 'fancybox-custom',
					closeClick: true,

					openEffect: 'none',

					helpers: {
						title: {
							type: 'inside'
						},
						overlay: {
							css: {
								'background': 'rgba(238,238,238,0.85)'
							}
						}
					}
				});
				$(".fancybox-effects-d").fancybox({
					padding: 0,
					openEffect: 'elastic',
					openSpeed: 150,
					closeEffect: 'elastic',
					closeSpeed: 150,
					closeClick: true,
					helpers: {
						overlay: null
					}
				});
				$('.fancybox-buttons').fancybox({
					openEffect: 'none',
					closeEffect: 'none',

					prevEffect: 'none',
					nextEffect: 'none',

					closeBtn: false,
					helpers: {
						title: {
							type: 'inside'
						},
						buttons: {}
					},

					afterLoad: function () {
						this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
					}
				});
				$('.fancybox-thumbs').fancybox({
					prevEffect: 'none',
					nextEffect: 'none',

					closeBtn: false,
					arrows: false,
					nextClick: true,

					helpers: {
						thumbs: {
							width: 50,
							height: 50
						}
					}
				});
				$('.fancybox-media')
					.attr('rel', 'media-gallery')
					.fancybox({
						openEffect: 'none',
						closeEffect: 'none',
						prevEffect: 'none',
						nextEffect: 'none',
						arrows: false,
						helpers: {
							media: {},
							buttons: {}
						}
					});
				$("#fancybox-manual-a").click(function () {
					$.fancybox.open('1_b.jpg');
				});

				$("#fancybox-manual-b").click(function () {
					$.fancybox.open({
						href: 'iframe.html',
						type: 'iframe',
						padding: 5
					});
				});

				$("#fancybox-manual-c").click(function () {
					$.fancybox.open([
						{
							href: '1_b.jpg',
							title: 'My title'
						}, {
							href: '2_b.jpg',
							title: '2nd title'
						}, {
							href: '3_b.jpg'
						}
					], {
						helpers: {
							thumbs: {
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
</head>

<body>
	<div class="navbar navbar-default" id="navbar">
		<script type="text/javascript">
			try { ace.settings.check('navbar', 'fixed') } catch (e) { }
		</script>
		<?php include("include/header.php"); ?><!-- /.container -->
		</div>
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try { ace.settings.check('main-container', 'fixed') } catch (e) { }
			</script>
			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span> </a>
				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try { ace.settings.check('sidebar', 'fixed') } catch (e) { }
					</script>
					<!-- #sidebar-shortcuts -->
					<?php include('include/menu.php'); ?><!-- /.nav-list -->
					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left"
							data-icon2="icon-double-angle-right"></i>
					</div>
					<script type="text/javascript">
						try { ace.settings.check('sidebar', 'collapsed') } catch (e) { }
					</script>
				</div>
				<div class="main-content">

					<div class="page-content">
						<!-- /.page-header -->

						<div class="page-header">
							<h1>Edit Profile</h1>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action="../update_profile.php" method="post"
									enctype="multipart/form-data" onSubmit="return validlogin();">
									<input type="hidden" name="command" id="command" value="update_profile" />
									<input type="hidden" name="userid" id="userid" value="<?php echo $id; ?>" />
									<?php
									$gender = $usprod['gender'];
									$caste = $usprod['religion'];
									$subcaste = $usprod['caste'];
									?>
									<table width="100%" cellpadding="5" cellspacing="5">
										<tr>
											<td width="18%" align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Mobile</span>
											</td>
											<td width="1%">:</td>
											<td width="25%"><input class="col-xs-10 col-sm-12" type="text"
													placeholder="Mobile Number" value="<?php echo $usprod['mobile']; ?>"
													name="mobile" id="mobile"></td>
											<td width="20%" align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Email</span>
											</td>
											<td width="1%">:</td>
											<td width="35%"><input class="col-xs-10 col-sm-8" type="text"
													placeholder="Email" value="<?php echo $usprod['email']; ?>" name="email"
													id="email"></td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Time of
													Birth</span></td>
											<td>:</td>
											<td><input class="col-xs-10 col-sm-12" type="text" placeholder="Time of Birth"
													value="<?php echo $usprod['tob']; ?>" name="tob" id="tob"></td>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Place of
													Birth</span></td>
											<td>:</td>
											<td><input class="col-xs-10 col-sm-8" type="text" placeholder="Place of Birth"
													value="<?php echo $usprod['p_birth']; ?>" name="p_birth" id="p_birth">
											</td>
										</tr>

										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Residencial
													Area</span></td>
											<td>:</td>
											<td><input class="col-xs-10 col-sm-12" type="text"
													placeholder="Residencial Area" value="<?php echo $usprod['area']; ?>"
													name="area" id="area"></td>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Home
													Type</span></td>
											<td>:</td>
											<td>
												<div class="col-sm-9">
													<select class="width-80 chosen-select" name="home_type" id="home_type"
														data-placeholder="Select Home Type...">
														<option value="" <?php if ($usprod['home_type'] == '') { ?>selected="selected" ;<?php } ?>>
															--Select--</option>
														<option value="highclass" <?php if ($usprod['home_type'] == 'highclass') { ?>selected="selected"
																;<?php } ?>>High Class</option>
														<option value="middleclass" <?php if ($usprod['home_type'] == 'middleclass') { ?>selected="selected"
																;<?php } ?>>Middle Class</option>
														<option value="upperclass" <?php if ($usprod['home_type'] == 'upperclass') { ?>selected="selected"
																;<?php } ?>>Upper Class</option>
														<option value="uppermiddleclass" <?php if ($usprod['home_type'] == 'uppermiddleclass') { ?>selected="selected"
																;<?php } ?>>Upper middle Class</option>
													</select>
												</div>
											</td>
										</tr>

										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">House</span>
											</td>
											<td>:</td>
											<td>
												<div class="col-sm-9">
													<select class="width-80 chosen-select" name="house_type" id="house_type"
														data-placeholder="Select House..">
														<option value="" <?php if ($usprod['house_type'] == '') { ?>selected="selected" ;<?php } ?>>
															--Select--</option>
														<option value="Own" <?php if ($usprod['house_type'] == 'Own') { ?>selected="selected" ;<?php } ?>>Own</option>
														<option value="Rent" <?php if ($usprod['house_type'] == 'Rent') { ?>selected="selected" ;<?php } ?>>Rent</option>
														<option value="Lease" <?php if ($usprod['house_type'] == 'Lease') { ?>selected="selected" ;<?php } ?>>Lease</option>
													</select>
												</div>
											</td>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;"></span></td>
											<td></td>
											<td>
											</td>
										</tr>

										<?php
										$caste1 = $usprod['religion'];
										$subcaste1 = $usprod['caste'];
										$star = $usprod['star'];
										$education = $usprod['education'];
										$no_of_brothers = $usprod['no_of_brothers'];
										$no_of_sisters = $usprod['no_of_sisters'];
										$bro_married = $usprod['no_of_sisters'];
										$sis_married = $usprod['sis_married'];
										$man = mysqli_query($con, "select * from caste  where id='$caste1'");
										$man1 = mysqli_fetch_array($man);
										?>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Caste</span>
											</td>
											<td>:</td>
											<td>
												<?php echo ucwords($man1['caste']); ?>
											</td>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Sub
													Caste</span></td>
											<td>:</td>
											<td>
												<div class="col-sm-9">
													<select class="width-80 chosen-select" name="subcaste" id="subcaste"
														data-placeholder="Select Sub Caste Name..." style="width:250px;">
														<option value="">--Select SubCaste Name--</option>
														<?php
														$subcaste = mysqli_query($con, "select * from subcaste   where caste='$caste1' order by subcaste asc");
														while ($subcaste_row = mysqli_fetch_array($subcaste)) {
															$s_id = $subcaste_row['id'];
															?>
															<option value="<?php echo $subcaste_row['id']; ?>" <?php if ($s_id == $subcaste1) { ?> selected<?php } ?>>
																<?php echo ucwords($subcaste_row['subcaste']); ?></option>
															<?php
														}
														?>
													</select>
												</div>
											</td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Star</span>
											</td>
											<td>:</td>
											<td>
												<div class="col-sm-12">
													<select class="width-80 chosen-select" name="star" id="star"
														data-placeholder="Select Star Name...">
														<option value="">--Select Star--</option>
														<option value="ANUSHAM" <?php if ($usprod['star'] == 'ANUSHAM') { ?>selected="selected" ;<?php } ?>>
															ANUSHAM</option>
														<option value="ASWINI" <?php if ($usprod['star'] == 'ASWINI') { ?>selected="selected" ;<?php } ?>>
															ASWINI</option>
														<option value="AVITTAM" <?php if ($usprod['star'] == 'AVITTAM') { ?>selected="selected" ;<?php } ?>>
															AVITTAM</option>
														<option value="AYILYAM" <?php if ($usprod['star'] == 'AYILYAM') { ?>selected="selected" ;<?php } ?>>
															AYILYAM</option>
														<option value="BHARANI" <?php if ($usprod['star'] == 'BHARANI') { ?>selected="selected" ;<?php } ?>>
															BHARANI</option>
														<option value="CHITHIRAI" <?php if ($usprod['star'] == 'CHITHIRAI') { ?>selected="selected" ;<?php } ?>>CHITHIRAI</option>
														<option value="HASTHAM" <?php if ($usprod['star'] == 'HASTHAM') { ?>selected="selected" ;<?php } ?>>
															HASTHAM</option>
														<option value="KETTAI" <?php if ($usprod['star'] == 'KETTAI') { ?>selected="selected" ;<?php } ?>>
															KETTAI</option>
														<option value="KRITHIGAI" <?php if ($usprod['star'] == 'KRITHIGAI') { ?>selected="selected" ;<?php } ?>>KRITHIGAI</option>
														<option value="MAHAM" <?php if ($usprod['star'] == 'MAHAM') { ?>selected="selected" ;<?php } ?>>
															MAHAM</option>
														<option value="MOOLAM" <?php if ($usprod['star'] == 'MOOLAM') { ?>selected="selected" ;<?php } ?>>
															MOOLAM</option>
														<option value="MRIGASIRISHAM" <?php if ($usprod['star'] == 'MRIGASIRISHAM') { ?>selected="selected"
																;<?php } ?>>MRIGASIRISHAM</option>
														<option value="POOSAM" <?php if ($usprod['star'] == 'POOSAM') { ?>selected="selected" ;<?php } ?>>
															POOSAM</option>
														<option value="PUNARPUSAM" <?php if ($usprod['star'] == 'PUNARPUSAM') { ?>selected="selected" ;<?php } ?>>PUNARPUSAM</option>
														<option value="PURADAM" <?php if ($usprod['star'] == 'PURADAM') { ?>selected="selected" ;<?php } ?>>
															PURADAM</option>
														<option value="PURAM" <?php if ($usprod['star'] == 'PURAM') { ?>selected="selected" ;<?php } ?>>
															PURAM</option>
														<option value="PURATATHI" <?php if ($usprod['star'] == 'PURATATHI') { ?>selected="selected" ;<?php } ?>>PURATATHI</option>
														<option value="REVATHI" <?php if ($usprod['star'] == 'REVATHI') { ?>selected="selected" ;<?php } ?>>
															REVATHI</option>
														<option value="ROHINI" <?php if ($usprod['star'] == 'ROHINI') { ?>selected="selected" ;<?php } ?>>
															ROHINI</option>
														<option value="SADAYAM" <?php if ($usprod['star'] == 'SADAYAM') { ?>selected="selected" ;<?php } ?>>
															SADAYAM</option>
														<option value="SWATHI" <?php if ($usprod['star'] == 'SWATHI') { ?>selected="selected" ;<?php } ?>>
															SWATHI</option>
														<option value="THIRUVADIRAI" <?php if ($usprod['star'] == 'THIRUVADIRAI') { ?>selected="selected" ;<?php } ?>>THIRUVADIRAI</option>
														<option value="THIRUVONAM" <?php if ($usprod['star'] == 'THIRUVONAM') { ?>selected="selected" ;<?php } ?>>THIRUVONAM</option>
														<option value="UTHRADAM" <?php if ($usprod['star'] == 'UTHRADAM') { ?>selected="selected" ;<?php } ?>>UTHRADAM</option>
														<option value="UTHRAM" <?php if ($usprod['star'] == 'UTHRAM') { ?>selected="selected" ;<?php } ?>>
															UTHRAM</option>
														<option value="UTHRATADHI" <?php if ($usprod['star'] == 'UTHRATADHI') { ?>selected="selected" ;<?php } ?>>UTHRATADHI</option>
														<option value="VISAKAM" <?php if ($usprod['star'] == 'VISAKAM') { ?>selected="selected" ;<?php } ?>>
															VISAKAM</option>
													</select>
												</div>
											</td>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Moonsign</span>
											</td>
											<td>:</td>
											<td>
												<div class="col-sm-9">
													<select class="width-80 chosen-select" name="moonsign" id="moonsign"
														data-placeholder="Select Moonsign Name...">
														<option value="">--Select Moonsign--</option>
														<option value="Mesh (Aries)" <?php if ($usprod['moonsign'] == 'Mesh (Aries)') { ?>selected="selected" ;<?php } ?>>Mesh (Aries)</option>
														<option value="Vrishabh (Taurus)" <?php if ($usprod['moonsign'] == 'Vrishabh (Taurus)') { ?>selected="selected" ;<?php } ?>>Vrishabh (Taurus)
														</option>
														<option value="Mithun (Gemini)" <?php if ($usprod['moonsign'] == 'Mithun (Gemini)') { ?>selected="selected"
																;<?php } ?>>Mithun (Gemini)</option>
														<option value="Karka (Cancer)" <?php if ($usprod['moonsign'] == 'Karka (Cancer)') { ?>selected="selected" ;<?php } ?>>Karka (Cancer)
														</option>
														<option value="Simha (Leo)" <?php if ($usprod['moonsign'] == 'Simha (Leo)') { ?>selected="selected" ;<?php } ?>>Simha (Leo)</option>
														<option value="Kanya (Virgo)" <?php if ($usprod['moonsign'] == 'Kanya (Virgo)') { ?>selected="selected" ;<?php } ?>>Kanya (Virgo)
														</option>
														<option value="Tula (Libra)" <?php if ($usprod['moonsign'] == 'Tula (Libra)') { ?>selected="selected" ;<?php } ?>>Tula (Libra)</option>
														<option value="Vrischika (Scorpio)" <?php if ($usprod['moonsign'] == 'Vrischika (Scorpio)') { ?>selected="selected" ;<?php } ?>>Vrischika (Scorpio)
														</option>
														<option value="Dhanu (Sagittarious)" <?php if ($usprod['moonsign'] == 'Dhanu (Sagittarious)') { ?>selected="selected" ;<?php } ?>>Dhanu
															(Sagittarious)</option>
														<option value="Makar (Capricorn)" <?php if ($usprod['moonsign'] == 'Makar (Capricorn)') { ?>selected="selected" ;<?php } ?>>Makar (Capricorn)
														</option>
														<option value="Kumbha (Aquarious)" <?php if ($usprod['moonsign'] == 'Kumbha (Aquarious)') { ?>selected="selected" ;<?php } ?>>Kumbha
															(Aquarious)</option>
														<option value="Meen (Pisces)" <?php if ($usprod['moonsign'] == 'Meen (Pisces)') { ?>selected="selected" ;<?php } ?>>Meen (Pisces)
														</option>
													</select>
												</div>
											</td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Education</span>
											</td>
											<td>:</td>
											<td>
												<div class="col-sm-12">
													<select class="width-80 chosen-select" name="education" id="education"
														data-placeholder="Select Education Name..." style="width:250px;">
														<option value="">--Select Education Name--</option>
														<?php
														$man12 = mysqli_query($con, "select * from education where temp_id=1  order by education asc");
														while ($man123 = mysqli_fetch_array($man12)) {
															$e_id = $man123['education'];
															?>
															<option value="<?php echo $man123['education']; ?>" <?php if ($e_id == $education) { ?> selected<?php } ?>>
																<?php echo ucwords($man123['education']); ?></option>
															<?php
														}
														?>
													</select>
												</div>
											</td>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Education in
													details</span></td>
											<td>:</td>
											<td><input id="edu_det" class="col-xs-10 col-sm-8" type="text" name="edu_det"
													value="<?php echo $usprod['edu_det']; ?>"
													placeholder="Education in details"></td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Father's
													Name</span></td>
											<td>:</td>
											<td><input id="fathername" class="col-xs-10 col-sm-10" type="text"
													name="fathername" value="<?php echo $usprod['fathername']; ?>"
													placeholder="Father Name"></td>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Father's
													Occupation</span></td>
											<td>:</td>
											<td><input id="father_occupation" class="col-xs-10 col-sm-8" type="text"
													name="father_occupation"
													value="<?php echo $usprod['father_occupation']; ?>"
													placeholder="Father Occupation"></td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Mother's
													Name</span></td>
											<td>:</td>
											<td><input id="mother_name" class="col-xs-10 col-sm-10" type="text"
													name="mother_name" value="<?php echo $usprod['mother_name']; ?>"
													placeholder="Mother Name"></td>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Mother's
													Occupation</span></td>
											<td>:</td>
											<td><input id="mother_occupation" class="col-xs-10 col-sm-8" type="text"
													name="mother_occupation"
													value="<?php echo $usprod['mother_occupation']; ?>"
													placeholder="Mother Occupation"></td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Number of
													brothers</span></td>
											<td>:</td>
											<td>
												<div class="col-sm-12">
													<select class="width-80 chosen-select" name="no_of_brothers"
														id="no_of_brothers" data-placeholder="Select Number of brothers..."
														style="width:250px;">
														<option value="">Not Applicable</option>
														<option value="0" <?php if ($usprod['no_of_brothers'] == '0') { ?>selected="selected" ;<?php } ?>>0</option>
														<option value="1" <?php if ($usprod['no_of_brothers'] == '1') { ?>selected="selected" ;<?php } ?>>1</option>
														<option value="2" <?php if ($usprod['no_of_brothers'] == '2') { ?>selected="selected" ;<?php } ?>>2</option>
														<option value="3" <?php if ($usprod['no_of_brothers'] == '3') { ?>selected="selected" ;<?php } ?>>3</option>
														<option value="4" <?php if ($usprod['no_of_brothers'] == '4') { ?>selected="selected" ;<?php } ?>>4</option>
														<option value="4 +" <?php if ($usprod['no_of_brothers'] == '4 +') { ?>selected="selected" ;<?php } ?>>4 +</option>
													</select>
												</div>
											</td>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Number of
													Sisters</span></td>
											<td>:</td>
											<td>
												<div class="col-sm-9">
													<select class="width-80 chosen-select" name="no_of_sisters"
														id="no_of_sisters" data-placeholder="Select Number of Sisters..."
														style="width:250px;">
														<option value="">Not Applicable</option>
														<option value="0" <?php if ($usprod['no_of_sisters'] == '0') { ?>selected="selected" ;<?php } ?>>0</option>
														<option value="1" <?php if ($usprod['no_of_sisters'] == '1') { ?>selected="selected" ;<?php } ?>>1</option>
														<option value="2" <?php if ($usprod['no_of_sisters'] == '2') { ?>selected="selected" ;<?php } ?>>2</option>
														<option value="3" <?php if ($usprod['no_of_sisters'] == '3') { ?>selected="selected" ;<?php } ?>>3</option>
														<option value="4" <?php if ($usprod['no_of_sisters'] == '4') { ?>selected="selected" ;<?php } ?>>4</option>
														<option value="4 +" <?php if ($usprod['no_of_sisters'] == '4 +') { ?>selected="selected" ;<?php } ?>>4 +</option>
													</select>
												</div>
											</td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Married
													brothers</span></td>
											<td>:</td>
											<td>
												<div class="col-sm-12">
													<select class="width-80 chosen-select" name="bro_married"
														id="bro_married" data-placeholder="Select Married Brothers..."
														style="width:250px;">
														<option value="">Not Applicable</option>
														<option value="No married brother" <?php if ($usprod['bro_married'] == 'No married brother') { ?>selected="selected" ;<?php } ?>>No married brother
														</option>
														<option value="One married brother" <?php if ($usprod['bro_married'] == 'One married brother') { ?>selected="selected" ;<?php } ?>>One married brother
														</option>
														<option value="Two married brother" <?php if ($usprod['bro_married'] == 'Two married brother') { ?>selected="selected" ;<?php } ?>>Two married brother
														</option>
														<option value="Three married brother" <?php if ($usprod['bro_married'] == 'Three married brother') { ?>selected="selected" ;<?php } ?>>Three married brother
														</option>
														<option value="Four married brother" <?php if ($usprod['bro_married'] == 'Four married brother') { ?>selected="selected" ;<?php } ?>>Four married brothers
														</option>
														<option value="Above four married brother" <?php if ($usprod['bro_married'] == 'Above four married brother') { ?>selected="selected" ;<?php } ?>>Above four married
															brother</option>
													</select>
												</div>
											</td>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Married
													Sisters</span></td>
											<td>:</td>
											<td>
												<div class="col-sm-9">
													<select class="width-80 chosen-select" name="sis_married"
														id="sis_married" data-placeholder="Select Married Sisters..."
														style="width:250px;">
														<option value="">Not Applicable</option>
														<option value="No married sister" <?php if ($usprod['sis_married'] == 'No married sister') { ?>selected="selected" ;<?php } ?>>No married sister
														</option>
														<option value="One married sister" <?php if ($usprod['sis_married'] == 'One married sister') { ?>selected="selected" ;<?php } ?>>One married sister
														</option>
														<option value="Two married sisters" <?php if ($usprod['sis_married'] == 'Two married sisters') { ?>selected="selected" ;<?php } ?>>Two married sisters
														</option>
														<option value="Three married sisters" <?php if ($usprod['sis_married'] == 'Three married sisters') { ?>selected="selected" ;<?php } ?>>Three married sisters
														</option>
														<option value="Four married sisters" <?php if ($usprod['sis_married'] == 'Four married sisters') { ?>selected="selected" ;<?php } ?>>Four married sistes
														</option>
														<option value="Above four married sisters" <?php if ($usprod['sis_married'] == 'Above four married sisters') { ?>selected="selected" ;<?php } ?>>Above four married
															sisters</option>
													</select>
												</div>
											</td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Skin
													Color</span></td>
											<td>:</td>
											<td>
												<div class="col-sm-12">
													<select class="width-80 chosen-select" name="skin" id="skin"
														data-placeholder="Select Skin Color..." style="width:250px;">
														<option value="">- Select -</option>
														<option value="Very Fair" <?php if ($usprod['skin'] == 'Very Fair') { ?>selected="selected" ;<?php } ?>>Very Fair</option>
														<option value="Fair" <?php if ($usprod['skin'] == 'Fair') { ?>selected="selected" ;<?php } ?>>
															Fair</option>
														<option value="Wheatish" <?php if ($usprod['skin'] == 'Wheatish') { ?>selected="selected" ;<?php } ?>>Wheatish</option>
														<option value="Wheatish Medium" <?php if ($usprod['skin'] == 'Wheatish Medium') { ?>selected="selected" ;<?php } ?>>Wheatish Medium
														</option>
														<option value="Wheatish Brown" <?php if ($usprod['skin'] == 'Wheatish Brown') { ?>selected="selected" ;<?php } ?>>Wheatish Brown</option>
														<option value="Dark" <?php if ($usprod['skin'] == 'Dark') { ?>selected="selected" ;<?php } ?>>
															Dark</option>
													</select>
												</div>
											</td>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Height</span>
											</td>
											<td>:</td>
											<td>
												<div class="col-sm-9">
													<select class="width-80 chosen-select" name="height" id="height"
														data-placeholder="Select Height..." style="width:250px;">
														<option value="0" <?php if ($usprod['height'] == '0') { ?>selected="selected" ;<?php } ?>>
															Select Height </option>
														<option value="below 4ft" <?php if ($usprod['height'] == 'below 4ft') { ?>selected="selected" ;<?php } ?>>below 4ft</option>
														<option value="4 Ft - 121 Cm" <?php if ($usprod['height'] == 'below') { ?>selected="selected" ;<?php } ?>>
															4 Ft - 121 Cm</option>
														<option value="4 Ft 1 In - 124 Cm" <?php if ($usprod['height'] == '4 Ft 1 In - 124 Cm') { ?>selected="selected" ;<?php } ?>>4 Ft 1 In - 124
															Cm</option>
														<option value="4 Ft 2 In - 127 Cm" <?php if ($usprod['height'] == '4 Ft 2 In - 127 Cm') { ?>selected="selected" ;<?php } ?>>4 Ft 2 In - 127
															Cm</option>
														<option value="4 Ft 3 In - 129 Cm" <?php if ($usprod['height'] == '4 Ft 3 In - 129 Cm') { ?>selected="selected" ;<?php } ?>>4 Ft 3 In - 129
															Cm</option>
														<option value="4 Ft 4 In - 132 Cm" <?php if ($usprod['height'] == '4 Ft 4 In - 132 Cm') { ?>selected="selected" ;<?php } ?>>4 Ft 4 In - 132
															Cm</option>
														<option value="4 Ft 5 In - 134 Cm" <?php if ($usprod['height'] == '4 Ft 5 In - 134 Cm') { ?>selected="selected" ;<?php } ?>>4 Ft 5 In - 134
															Cm</option>
														<option value="4 Ft 6 In - 137 Cm" <?php if ($usprod['height'] == '4 Ft 6 In - 137 Cm') { ?>selected="selected" ;<?php } ?>>4 Ft 6 In - 137
															Cm</option>
														<option value="4 Ft 7 In - 139 Cm" <?php if ($usprod['height'] == '4 Ft 7 In - 139 Cm') { ?>selected="selected" ;<?php } ?>>4 Ft 7 In - 139
															Cm</option>
														<option value="4 Ft 8 In - 142 Cm" <?php if ($usprod['height'] == '4 Ft 8 In - 142 Cm') { ?>selected="selected" ;<?php } ?>>4 Ft 8 In - 142
															Cm</option>
														<option value="4 Ft 9 In - 144 Cm" <?php if ($usprod['height'] == '4 Ft 9 In - 144 Cm') { ?>selected="selected" ;<?php } ?>>4 Ft 9 In - 144
															Cm</option>
														<option value="4 Ft 10 In - 147 Cm" <?php if ($usprod['height'] == '4 Ft 10 In - 147 Cm') { ?>selected="selected" ;<?php } ?>>4 Ft 10 In
															- 147 Cm</option>
														<option value="4 Ft 11 In - 149 Cm" <?php if ($usprod['height'] == '4 Ft 11 In - 149 Cm') { ?>selected="selected" ;<?php } ?>>4 Ft 11 In
															- 149 Cm</option>
														<option value="5 Ft - 152 Cm" <?php if ($usprod['height'] == '5 Ft - 152 Cm') { ?>selected="selected" ;<?php } ?>>5 Ft - 152 Cm</option>
														<option value="5 Ft 1 In - 154 Cm" <?php if ($usprod['height'] == '5 Ft 1 In - 154 Cm') { ?>selected="selected" ;<?php } ?>>5 Ft 1 In - 154
															Cm</option>
														<option value="5 Ft 2 In - 157 Cm" <?php if ($usprod['height'] == '5 Ft 2 In - 157 Cm') { ?>selected="selected" ;<?php } ?>>5 Ft 2 In - 157
															Cm</option>
														<option value="5 Ft 3 In - 160 Cm" <?php if ($usprod['height'] == '5 Ft 3 In - 160 Cm') { ?>selected="selected" ;<?php } ?>>5 Ft 3 In - 160
															Cm</option>
														<option value="5 Ft 4 In - 162 Cm" <?php if ($usprod['height'] == '5 Ft 4 In - 162 Cm') { ?>selected="selected" ;<?php } ?>>5 Ft 4 In - 162
															Cm</option>
														<option value="5 Ft 5 In - 165 Cm" <?php if ($usprod['height'] == '5 Ft 5 In - 165 Cm') { ?>selected="selected" ;<?php } ?>>5 Ft 5 In - 165
															Cm</option>
														<option value="5 Ft 6 In - 167 Cm" <?php if ($usprod['height'] == '5 Ft 6 In - 167 Cm') { ?>selected="selected" ;<?php } ?>>5 Ft 6 In - 167
															Cm</option>
														<option value="5 Ft 7 In - 170 Cm" <?php if ($usprod['height'] == '5 Ft 7 In - 170 Cm') { ?>selected="selected" ;<?php } ?>>5 Ft 7 In - 170
															Cm</option>
														<option value="5 Ft 8 In - 172 Cm" <?php if ($usprod['height'] == '5 Ft 8 In - 172 Cm') { ?>selected="selected" ;<?php } ?>>5 Ft 8 In - 172
															Cm</option>
														<option value="5 Ft 9 In - 175 Cm" <?php if ($usprod['height'] == '5 Ft 9 In - 175 Cm') { ?>selected="selected" ;<?php } ?>>5 Ft 9 In - 175
															Cm</option>
														<option value="5 Ft 10 In - 177 Cm" <?php if ($usprod['height'] == '5 Ft 10 In - 177 Cm') { ?>selected="selected" ;<?php } ?>>5 Ft 10 In
															- 177 Cm</option>
														<option value="5 Ft 11 In - 180 Cm" <?php if ($usprod['height'] == '5 Ft 11 In - 180 Cm') { ?>selected="selected" ;<?php } ?>>5 Ft 11 In
															- 180 Cm</option>
														<option value="6 Ft - 182 Cm" <?php if ($usprod['height'] == '6 Ft - 182 Cm') { ?>selected="selected" ;<?php } ?>>6 Ft - 182 Cm</option>
														<option value="6 Ft 1 In - 185 Cm" <?php if ($usprod['height'] == '6 Ft 1 In - 185 Cm') { ?>selected="selected" ;<?php } ?>>6 Ft 1 In - 185
															Cm</option>
														<option value="6 Ft 2 In - 187 Cm" <?php if ($usprod['height'] == '6 Ft 2 In - 187 Cm') { ?>selected="selected" ;<?php } ?>>6 Ft 2 In - 187
															Cm</option>
														<option value="6 Ft 3 In - 190 Cm" <?php if ($usprod['height'] == '6 Ft 3 In - 190 Cm') { ?>selected="selected" ;<?php } ?>>6 Ft 3 In - 190
															Cm</option>
														<option value="6 Ft 4 In - 193 Cm" <?php if ($usprod['height'] == '6 Ft 4 In - 193 Cm') { ?>selected="selected" ;<?php } ?>>6 Ft 4 In - 193
															Cm</option>
														<option value="6 Ft 5 In - 195 Cm" <?php if ($usprod['height'] == '6 Ft 5 In - 195 Cm') { ?>selected="selected" ;<?php } ?>>6 Ft 5 In - 195
															Cm</option>
														<option value="6 Ft 6 In - 198 Cm" <?php if ($usprod['height'] == '6 Ft 6 In - 198 Cm') { ?>selected="selected" ;<?php } ?>>6 Ft 6 In - 198
															Cm</option>
														<option value="6 Ft 7 In - 200 Cm" <?php if ($usprod['height'] == '6 Ft 7 In - 200 Cm') { ?>selected="selected" ;<?php } ?>>6 Ft 7 In - 200
															Cm</option>
														<option value="6 Ft 8 In - 203 Cm" <?php if ($usprod['height'] == '6 Ft 8 In - 203 Cm') { ?>selected="selected" ;<?php } ?>>6 Ft 8 In - 203
															Cm</option>
														<option value="6 Ft 9 In - 205 Cm" <?php if ($usprod['height'] == '6 Ft 9 In - 205 Cm') { ?>selected="selected" ;<?php } ?>>6 Ft 9 In - 205
															Cm</option>
														<option value="6 Ft 10 In - 208 Cm" <?php if ($usprod['height'] == '6 Ft 10 In - 208 Cm') { ?>selected="selected" ;<?php } ?>>6 Ft 10 In
															- 208 Cm</option>
														<option value="6 Ft 11 In - 210 Cm" <?php if ($usprod['height'] == '6 Ft 11 In - 210 Cm') { ?>selected="selected" ;<?php } ?>>6 Ft 11 In
															- 210 Cm</option>
														<option value="7 Ft - 213 Cm" <?php if ($usprod['height'] == '7 Ft - 213 Cm') { ?>selected="selected" ;<?php } ?>>7 Ft - 213 Cm</option>
													</select>
												</div>
											</td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Company
													Name</span></td>
											<td>:</td>
											<td><input id="job_cmpy" class="col-xs-10 col-sm-12" type="text" name="job_cmpy"
													value="<?php echo $usprod['job_cmpy']; ?>" placeholder="Company Name">
											</td>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Job
													Details</span></td>
											<td>:</td>
											<td><input id="job" class="col-xs-10 col-sm-10" type="text" name="job"
													value="<?php echo $usprod['job']; ?>" placeholder="Job Details"></td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Job
													Location</span></td>
											<td>:</td>
											<td><input id="job_loc" class="col-xs-10 col-sm-12" type="text" name="job_loc"
													value="<?php echo $usprod['job_loc']; ?>" placeholder="Job Location">
											</td>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Salary</span>
											</td>
											<td>:</td>
											<td><input id="salary" class="col-xs-10 col-sm-10" type="text" name="salary"
													value="<?php echo $usprod['salary']; ?>" placeholder="Salary"></td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Address</span>
											</td>
											<td>:</td>
											<td colspan="4"><textarea name="addr" id="addr"
													style="width: 562px; height: 127px; resize:none;"><?php echo $usprod['address']; ?></textarea>
											</td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Self
													Description</span></td>
											<td>:</td>
											<td colspan="4"><textarea name="self_desc" id="self_desc"
													style="width: 562px; height: 127px; resize:none;"><?php echo $usprod['self_desc']; ?></textarea>
											</td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Expectation</span>
											</td>
											<td>:</td>
											<td colspan="4"><textarea name="expectation" id="expectation"
													style="width: 562px; height: 127px; resize:none;"><?php echo $usprod['expectation']; ?></textarea>
											</td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Dosam</span>
											</td>
											<td>:</td>
											<td colspan="4">
												<label><input id="dosam" type="radio" value="sevvai dosam" name="dosam"
														class="ace" <?php if ($usprod['dosam'] == 'sevvai dosam') { ?>
															checked="checked" <?php } ?> />
													<span class="lbl">Sevvai Dosam</span></label>
												<label><input id="dosam" type="radio" value="ragu dosam" name="dosam"
														class="ace" <?php if ($usprod['dosam'] == 'ragu dosam') { ?>checked="checked" <?php } ?> />
													<span class="lbl">Ragu Dosam</span></label>
												<label><input id="dosam" type="radio" value="sevvai+ragu dosam" name="dosam"
														class="ace" <?php if ($usprod['dosam'] == 'sevvai+ragu dosam') { ?>checked="checked" <?php } ?> />
													<span class="lbl">Sevvai+Ragu Dosam</span></label>
												<label><input id="dosam" type="radio" value="none" name="dosam" class="ace"
														<?php if ($usprod['dosam'] == 'none') { ?>checked="checked" <?php } ?> />
													<span class="lbl">None</span></label>
											</td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Description(if
													any dosam)</span></td>
											<td>:</td>
											<td colspan="4"><textarea name="self_dosam" id="self_dosam"
													style="width: 562px; height: 127px; resize:none;"><?php echo $usprod['self_dosam']; ?></textarea>
											</td>
										</tr>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Userid</span>
											</td>
											<td>:</td>
											<td><span
													style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['username']); ?></span>
											</td>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Password</span>
											</td>
											<td>:</td>
											<td><?php echo ucwords($usprod['password']); ?></td>
										</tr>
										<SCRIPT type="text/javascript">
											function ValidateFileUpload(field_name) {
												var fuData = document.getElementById(field_name);
												var FileUploadPath = fuData.value;
												//To check if user upload any file
												if (FileUploadPath == '') {
													alert("Please upload an image");
												} else {
													var Extension = FileUploadPath.substring(
														FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
													//The file uploaded is an image
													if (Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
														// To Display
														if (fuData.files && fuData.files[0]) {
															var reader = new FileReader();
															reader.onload = function (e) {
																$('#blah').attr('src', e.target.result);
															}
															reader.readAsDataURL(fuData.files[0]);
														}
													}
													//The file upload is NOT an image
													else {
														alert("Photo only allows file types of  PNG, JPG, JPEG ");

													}
												}
											}
										</SCRIPT>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Profile
													Picture</span></td>
											<td>:</td>
											<td colspan="4">
												<?php
												$gender_e = $usprod['gender'];
												$default_avatar_e = ($gender_e == 'male' || $gender_e == 'groom') ? "images/male_avatar.png" : "images/female_avatar.png";
												$profile_img_e = "../" . $default_avatar_e;
												if (isset($usprod['uploadedfile']) && strlen(trim($usprod['uploadedfile'])) > 0) {
													$profile_img_e = "../profile/" . trim($usprod['uploadedfile']);
												}
												?>
												<img src="<?php echo $profile_img_e; ?>" height="300" width="300"
													style="object-fit: contain; border-radius: 10px;" />
	<br>
	<input type="hidden" name="picture" id="picture" value="<?php echo $usprod['uploadedfile']; ?>" />
	<input name="image1"  type="file"  id="image1" onchange="return ValidateFileUpload('image1')"  />To Change Profile Picture
	</td>
	</tr>

	<tr>
	<td  align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Horoscope</span></td>
	<td>:</td>
	<td colspan="4">
	<?php
	$horo = $usprod['horo'];
	if ($horo != '') {
		?>
		<a href="../matrimonyadmin/horo/<?php echo $usprod['horo']; ?>" data-fancybox-group="gallery" title="<?php echo ucwords($usprod['name']); ?>" class="fancybox" >
		<img src="../matrimonyadmin/horo/<?php echo $usprod['horo']; ?>" height="300" width="500" /></a>
	<?php } else { ?>
		<span style="color:#FF0000; font-weight:bold;">Horoscope not yet uploaded</span>
		<?php
	}
	?>
	<input type="hidden" name="horo" id="horo" value="<?php echo $usprod['horo']; ?>" />
	<input name="image2"  type="file"  id="image2" onchange="return ValidateFileUpload('image2')"     />To Change Horoscope
	</td>
	</tr>


	<tr>
	<td  align="right"></td>
	<td></td>
	<td colspan="4">
	<span class="input-group-btn">
	<button type="submit" name="submit" id="submit" class="btn btn-purple btn-sm">Save Changes<i class="icon-save  icon-on-right bigger-110"></i></button>
	</span>
	</td>
	</tr>
	</table>

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
		
			<script type="text/javascript">
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
		</body>
	</html>
	<?php
}
?>