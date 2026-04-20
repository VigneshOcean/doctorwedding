<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8" />
		<title>Login Page - Happy Marriage</title>
		<meta name="description" content="User login page" />
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
</style>		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
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
</head>
	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1 style="font-size:22px;">
									<i class="icon-heart  green"></i>
									<span class="red">Doctor Wedding </span>
								</h1>
								<h4 class="blue">&copy; www.doctorwedding.com</h4>
							</div>
							<div class="space-6"></div>
							<div class="position-relative">
                            <!-- **********************************login-box Start************************************* -->
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												Please Enter Your Information
											</h4>
											<div class="space-6"></div>
<form name="frm" action="logincheck.php" method="post" enctype="multipart/form-data" onSubmit="return validlogin();">
<input type="hidden" name="command" id="command" value="login" />
<fieldset>
<label class="block clearfix"><span class="block input-icon input-icon-right">
<input type="text" class="form-control" placeholder="Username" name="username" id="username" />
<i class="icon-user"></i></span></label>
<label class="block clearfix"><span class="block input-icon input-icon-right">
<input type="password" class="form-control" placeholder="Password"  name="password" id="password"  />
<i class="icon-lock"></i></span></label>
<div class="space"></div>
<div class="clearfix"><button type="submit" class="width-35 pull-right btn btn-sm btn-primary"><i class="icon-key"></i>Login</button></div>
<div class="space-4"></div>
</fieldset>
</form>
											<div class="social-or-login center">
												<span class="bigger-110">Or Login Using</span>
											</div>
											<div class="social-login center">
												<a class="btn btn-primary">
													<i class="icon-facebook"></i>
												</a>
												<a class="btn btn-info">
													<i class="icon-twitter"></i>
												</a>
												<a class="btn btn-danger">
													<i class="icon-google-plus"></i>
												</a>
											</div>
										</div><!-- /widget-main -->
                                        

										<div class="toolbar clearfix">
											<div>
												<a href="#" onClick="show_box('forgot-box'); return false;" class="forgot-password-link">
													<i class="icon-arrow-left"></i>
													I forgot my password
												</a>
											</div>
<!--<div>
<a href="#" onClick="show_box('signup-box'); return false;" class="user-signup-link">Request for Login<i class="icon-arrow-right"></i></a>
</div>-->
										</div>
									</div><!-- /widget-body -->
								</div>
<!-- **********************************login-box End************************************* -->



<!-- **********************************Forget-box Start************************************* -->
								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="icon-key"></i>
												Retrieve Password
											</h4>
											<div class="space-6"></div>
											<p>
												Enter your email and to receive instructions
											</p>
											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="icon-envelope"></i>
														</span>
													</label>
													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="icon-lightbulb"></i>
															Send Me!
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /widget-main -->
										<div class="toolbar center">
											<a href="#" onClick="show_box('login-box'); return false;" class="back-to-login-link">
												Back to login
												<i class="icon-arrow-right"></i>
											</a>
										</div>
									</div><!-- /widget-body -->
								</div><!-- /forgot-box -->
                                <!-- **********************************Forget-box End************************************* -->

                              
                <div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="icon-group blue"></i>
												Login Request
											</h4>
											<div class="space-6"></div>
											<p> Enter your details to begin: </p>
<form name="frm" action="logincheck1.php" method="post" enctype="multipart/form-data" onSubmit="return validlogin1();">
<input type="hidden" name="command" id="command" value="login" />
<fieldset>
<div class="radio"><label>
<input name="mark_id" id="mark_id" type="radio" class="ace" value="1"  checked/><span class="lbl"> Kamalam</span>			
</label><label>
<input name="mark_id" id="mark_id" type="radio" class="ace" value="2"  /><span class="lbl">Transworld </span></label></div>
<label class="block clearfix"><span class="block input-icon input-icon-right">
<input type="text" class="form-control" placeholder="Username"  name="userid" id="userid"/>
<i class="icon-user"></i></span></label>
<label class="block clearfix"><span class="block input-icon input-icon-right">
<input type="password" class="form-control" placeholder="Password"    name="passid" id="passid"/>
<i class="icon-lock"></i></span></label>
<div class="space-24"></div><div class="clearfix">
<button type="reset" class="width-30 pull-left btn btn-sm"><i class="icon-refresh"></i>Reset</button>
<button type="submit" class="width-65 pull-right btn btn-sm btn-success">Send Request<i class="icon-arrow-right icon-on-right"></i></button>
</div>
</fieldset>
</form>
										</div>
										<div class="toolbar center">
											<a href="#" onClick="show_box('login-box'); return false;" class="back-to-login-link">
												<i class="icon-arrow-left"></i>
												Back to login
											</a>
										</div>
									</div><!-- /widget-body -->
								</div>              
                              
                                
                                                         
							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->
		<!-- basic scripts -->
		<!--[if !IE]> -->
		<script src="../../../../ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<!-- <![endif]-->
		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->
		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
		<!-- <![endif]-->
		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			function show_box(id) {
			 jQuery('.widget-box.visible').removeClass('visible');
			 jQuery('#'+id).addClass('visible');
			}
		</script>
	</body>
<!-- Mirrored from 192.69.216.111/themes/preview/ace/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 12 Nov 2013 11:40:20 GMT -->
</html>