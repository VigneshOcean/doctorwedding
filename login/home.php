<?php
include("../include/connect.php");
session_start();
$id = $_SESSION['id'];
error_reporting(0);
if (!isset($_SESSION['id'])) {
	echo "<script type=text/javascript>window.location='../index.php?err';</script>";
} else {
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<title>Happy Marriage:Profile details</title>
		<meta name="description" content="Common form elements and layouts" />
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
		<!------------------ Fancy box ------------------->
	<!-- Add jQuery library -->
		<script type="text/javascript" src="fancyBox/lib/jquery-1.8.2.min.js"></script>
		<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
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

						<div class="page-header" style="
	display: flex;                  
	flex-direction: row;            
	flex-wrap: nowrap;              
	justify-content: space-between; 
">
							<div>
								<h1>Profile Details</h1>
							</div>
							<div style=" ">
								<span style="color:#009933; font-weight:bold;"> <?php echo $username; ?> உங்களுக்கு திருமணம்
									முடித்தால் தெரியப்படுத்தவும்
									<a onclick="marriage_notify(<?php echo $id; ?>)" class="btn btn-danger"
										href="javascript:void(0)">
										<i class="icon-exclamation-sign"></i>Notify us</a>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<?php
								$prod = mysqli_query($con, "select* from register where id='$id'");
								$usprod = mysqli_fetch_array($prod);
								?>
								<table width="100%" cellpadding="5" cellspacing="5">
									<tr>
										<td width="18%" align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Name</span></td>
										<td width="1%">:</td>
										<td width="25%"><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['name']); ?></span>
										</td>
										<td width="20%" align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Gender</span></td>
										<td width="1%">:</td>
										<td width="35%"><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['gender']); ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Date of
												Birth</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo $usprod['dob']; ?></span>
										</td>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Age</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo $usprod['age']; ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Time of
												Birth</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo $usprod['tob']; ?></span>
										</td>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Place of
												Birth</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['p_birth']); ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Mobile</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo $usprod['mobile']; ?></span>
										</td>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Email</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo $usprod['email']; ?></span>
										</td>
									</tr>

									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Home Type</span>
										</td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo $usprod['home_type']; ?></span>
										</td>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">House</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo $usprod['house_type']; ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Residencial
												Area</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo $usprod['area']; ?></span>
										</td>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;"></span></td>
										<td></td>
										<td></td>
									</tr>
									<?php
									$caste1 = $usprod['religion'];
									$man = mysqli_query($con, "select * from caste where id='$caste1'");
									$man11 = mysqli_fetch_array($man);
									$subcaste11 = $usprod['caste'];
									$man112 = mysqli_query($con, "select * from subcaste where id='$subcaste11'");
									$man111 = mysqli_fetch_array($man112);
									?>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Caste</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($man11['caste']); ?></span>
										</td>
										<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Sub
												Caste</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($man111['subcaste']); ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Star</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['star']); ?></span>
										</td>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Moonsign</span>
										</td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['moonsign']); ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Education</span>
										</td>
										<td>:</td>
										<td><span style="color:#FF0000; font-size:14px;">
												<?php if ($usprod['edu_det'] != '') { ?>
													<?php echo ucwords($usprod['edu_det']); ?>	<?php } ?></span></td>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;"></span></td>
										<td></td>
										<td><span style="color:#FF0000; font-size:14px;"></span></td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Father's
												Name</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['fathername']); ?></span>
										</td>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Father's
												Occupation</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['father_occupation']); ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Mother's
												Name</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['mother_name']); ?></span>
										</td>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Mother's
												Occupation</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['mother_occupation']); ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Number of
												brothers</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['no_of_brothers']); ?></span>
										</td>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Number of
												Sisters</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['no_of_sisters']); ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Married
												brothers</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['bro_married']); ?></span>
										</td>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Married
												Sisters</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['sis_married']); ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Skin Color</span>
										</td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['skin']); ?></span>
										</td>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Height</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['height']); ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Company Name</span>
										</td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['job_cmpy']); ?></span>
										</td>
										<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Job
												Details</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['job']); ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span style="color:#0033FF; font-weight:bold; font-size:14px;">Job
												Location</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['job_loc']); ?></span>
										</td>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Salary</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['salary']); ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Address</span></td>
										<td>:</td>
										<td colspan="4"><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['address']); ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Self
												Description</span></td>
										<td>:</td>
										<td colspan="4"><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['self_desc']); ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Userid</span></td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['username']); ?></span>
										</td>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Password</span>
										</td>
										<td>:</td>
										<td><span
												style="color:#FF0000; font-size:14px;"><?php echo ucwords($usprod['password']); ?></span>
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Profile Picture
												1</span></td>
										<td>:</td>
										<td colspan="4">
											<?php
											$gender_h = $usprod['gender'];
											$g_lower_h = strtolower(trim($gender_h));
											if ($g_lower_h == 'male' || $g_lower_h == 'groom') {
												$default_avatar_p = "../images/male_avatar.png";
											} else {
												$default_avatar_p = "../images/female_avatar.png";
											}

											$profile_img_p = $default_avatar_p;
											if (isset($usprod['uploadedfile']) && strlen(trim($usprod['uploadedfile'])) > 0) {
												$file_path_p = "../profile/" . trim($usprod['uploadedfile']);
												if (file_exists($file_path_p)) {
													$profile_img_p = $file_path_p;
												}
											}
											?>
											<img src="<?php echo $profile_img_p; ?>" height="300" width="300"
												style="object-fit: contain; border-radius: 10px;" />
										</td>
									</tr>
									<tr>
										<td align="right"><span
												style="color:#0033FF; font-weight:bold; font-size:14px;">Profile Picture
												2</span></td>
										<td>:</td>
										<td colspan="4">
											<?php
											if ($usprod['second_upload'] != '') {
												?>
												<a href="../profile/<?php echo $usprod['second_upload']; ?>"
													data-fancybox-group="gallery"
													title="<?php echo ucwords($usprod['name']); ?>" class="fancybox">
													<img src="../profile/<?php echo $usprod['second_upload']; ?>" height="300"
														width="300" /></a>
												<?php
											} else {
												?>
												<span style="color:#FF0000; font-weight:bold;">Profile Picture not yet
													uploaded</span>
												<?php
											}
											?>
										</td>
									</tr>
									<?php
									$horo = $usprod['horo'];
									if ($horo != '') {
										?>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Horoscope</span>
											</td>
											<td>:</td>
											<td colspan="4">
												<a href="../matrimonyadmin/horo/<?php echo $usprod['horo']; ?>"
													data-fancybox-group="gallery"
													title="<?php echo ucwords($usprod['name']); ?>" class="fancybox">
													<img src="../matrimonyadmin/horo/<?php echo $usprod['horo']; ?>"
														height="300" width="500" /></a>
											</td>
										</tr>
										<?php
									} else {
										?>
										<tr>
											<td align="right"><span
													style="color:#0033FF; font-weight:bold; font-size:14px;">Horoscope</span>
											</td>
											<td>:</td>
											<td colspan="4">
												<span style="color:#FF0000; font-weight:bold;">Horoscope not yet uploaded</span>
											</td>
										</tr>
										<?php
									}
									?>
								</table>


							</div><!-- /.col -->
						</div>

					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
				<!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i> </a>
		</div><!-- /.main-container -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
		</script>
		<script type="text/javascript">
			if ("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
		</script>

		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<!-- inline scripts related to this page -->
		<script language="JavaScript" type="text/javascript">
			var xmlHttp
			function marriage_notify(sender_id) {
				if (confirm("Are you sure you want to update profile as marriage fixed!") == true) {
					// document.getElementById("imgLoader").style.display = "block";
					//alert(str1);
					xmlHttp = GetXmlHttpObject()
					if (xmlHttp == null) {
						alert("Browser does not support HTTP Request")
						return
					}
					var url = "marriage_notify.php";
					url = url + "?common_update=1&sender_id=" + sender_id;
					url = url + "&sid=" + Math.random();
					xmlHttp.onreadystatechange = stateChangedga1111;
					xmlHttp.open("GET", url, true);
					xmlHttp.send(null);
				}


			}
			function stateChangedga1111() {
				if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
					alert('Thanks for your information.Admin will delete this profile soon once verified');
					var a = xmlHttp.responseText;
					//	window.location='full_view.php?userid=<?php echo $userid; ?>';
					//  document.getElementById("ba").innerHTML=xmlHttp.responseText;
					//document.getElementById("imgLoader").style.display = "none";
				}
			}
			function GetXmlHttpObject() {
				var xmlHttp = null;
				try {
					// Firefox, Opera 8.0+, Safari
					xmlHttp = new XMLHttpRequest();
				}
				catch (e) {
					//Internet Explorer
					try {
						xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
					}
					catch (e) {
						xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				}
				return xmlHttp;
			}


		</script>
	</body>

	</html>
	<?php
}
?>