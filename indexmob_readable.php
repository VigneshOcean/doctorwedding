<?php
include("include/connect.php");
?>
<script type="text/javascript">
  if (screen.width >= 700) {
    document.location = "index.php";
  } else {
    document.location = "indexmob.php";
  }
</script>
<?php
if (isset($_POST['submit'])) {
  $command = $_POST['command'];
  $gender = $_POST['gender'];
  $from_age = $_POST['age1'];
  $to_age = $_POST['age2'];
  $caste = $_POST['caste'];
  $education = $_POST['education'];
  $photo = $_POST['photo'];
  session_start();
  $_SESSION['gender'] = $gender;
  $_SESSION['from_age'] = $from_age;
  $_SESSION['to_age'] = $to_age;
  $_SESSION['caste'] = $caste;
  $_SESSION['education'] = $education;
  $_SESSION['command'] = $command;
  $_SESSION['photo'] = $photo;
  echo "<script language='javascript'>window.location='search_result.php';</script>";
}
?>
<!doctype html>
<html lang="en">
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php include("include/title.php"); ?>
  <!-- Fonts Online -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <!-- Style Sheet -->
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/main-style.css">
  <link rel="stylesheet" href="css/style.css">

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
    function valid() {
      var strURL = "valid_exp.php";
      //alert(strURL);
      var req = getXMLHTTP();
      if (req) {
        req.onreadystatechange = function () {
          if (req.readyState == 4) {
            // only if "OK"
            if (req.status == 200) {
              // alert(req.responseText);
              document.getElementById('locality').innerHTML = req.responseText;
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
  <script type="text/javascript">
    function validlogin() {
      var x = document.getElementById("username").value;
      if (x == "null" || x == "") {
        alert("Please Enter Username");
        return false;
      }
      var y = document.getElementById("password").value;
      if (y == "null" || y == "") {
        alert("Please Enter Password");
        return false;
      }
      return true;
    }
  </script>
  <style type="text/css">
    .banr-head .login-sec .uou-tabs form {
      padding: 4px;
    }

    .uou-block-11a {
      position: absolute;
      top: 0;
      right: 0;
      width: 130px;
      background: #333333;
      padding: 10px 9px 45px 10px;
      z-index: 1;
      color: #8c8c8c;
    }

    nav.main-nav ul li a {
      font-size: 13px;
    }

    < !--

    /* @group Blink */
    .blinker {
      -webkit-animation: blink .75s linear infinite;
      -moz-animation: blink .75s linear infinite;
      -ms-animation: blink .75s linear infinite;
      -o-animation: blink .75s linear infinite;
      animation: blink .75s linear infinite;
      font-weight: bold;
      color: #f104e7;
    }

    @-webkit-keyframes blink {
      0% {
        opacity: 1;
      }

      50% {
        opacity: 1;
      }

      50.01% {
        opacity: 0;
      }

      100% {
        opacity: 0;
      }
    }

    @-moz-keyframes blink {
      0% {
        opacity: 1;
      }

      50% {
        opacity: 1;
      }

      50.01% {
        opacity: 0;
      }

      100% {
        opacity: 0;
      }
    }

    @-ms-keyframes blink {
      0% {
        opacity: 1;
      }

      50% {
        opacity: 1;
      }

      50.01% {
        opacity: 0;
      }

      100% {
        opacity: 0;
      }
    }

    @-o-keyframes blink {
      0% {
        opacity: 1;
      }

      50% {
        opacity: 1;
      }

      50.01% {
        opacity: 0;
      }

      100% {
        opacity: 0;
      }
    }

    @keyframes blink {
      0% {
        opacity: 1;
      }

      50% {
        opacity: 1;
      }

      50.01% {
        opacity: 0;
      }

      100% {
        opacity: 0;
      }
    }

    /* @end */
    -->
  </style>
</head>

<body>
  <div id="main-wrapper">
    <!-- Top Toolbar -->
    <div class="toolbar">
      <div class="uou-block-1a blog">
        <div class="container">
          <ul class="social">
            <li><a href="#" class="fa fa-facebook"></a></li>
            <li><a href="#" class="fa fa-twitter"></a></li>
            <li><a href="#" class="fa fa-google-plus"></a></li>
          </ul>
          <ul class="authentication pt10"><img alt="Phone " width="19" height="15" class="vam"
              src="images/icon_receiver.gif"> Call Us : <b>044 4386 3901</b>
          </ul>
        </div>
      </div>
      <!-- end .uou-block-1a -->
    </div>
    <!-- end toolbar -->
    <div class="box-shadow-for-ui">
      <div class="uou-block-2b">
        <div class="container"> <a href="#" class="logo"><img src="images/logo.png" alt=""></a>
        </div>
      </div>
      <!-- end .uou-block-2b -->
    </div>
    <!-- HOME PRO-->
    <div class="home-pro">
      <!-- PRO BANNER HEAD -->
      <div class="banr-head">
        <div class="container">
          <div class="row">
            <!-- CONTENT -->
            <div class="col-sm-7">
              <!--            <div class="text-area">
              <div class="position-center-center col-md-10">
                <h1> Here comes the social networking platform that you’ve been waiting for</h1>
                <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue conseqaut nibbhi ellit ipsum consectetur. </h6>
              </div>
            </div> -->
            </div>
            <!-- FORM SECTION -->
            <div class="col-sm-5">
              <div class="row">
                <div class="col-xs-8">
                  <div class="login-sec">
                    <!-- TABS -->
                    <div class="uou-tabs">
                      <!-- REGISTER -->
                      <div class="content">
                        <h5 class="text-center alert-info" style="color:#fff;font-size: 18px; line-height: 30px;">Paid
                          customer login</h5>
                        <!-- LOGIN -->
                        <div id="log-in" class="active">
                          <form name="form3" method="post" action="login/logincheck.php"
                            onSubmit="return validlogin();">
                            <input type="hidden" name="command" id="command" value="login" />
                            <input name="username" id="username" placeholder="User Id" type="text" value="" />
                            <input name="password" id="password" placeholder="Password" type="password" value="" />
                            <input type="submit" value="GO" /> <a class="btn btn-transparent-primary btn1" <a=""
                              href="register_user.php"><span style="color: #fff; ">New Register</span></a>
                          </form>
                        </div>
                        <?php
                        if (isset($_REQUEST['failure'])) {
                          ?>
                          <div style="background:#FF8484; color:#FF0000; font-weight:bold; font-size:14px;">
                            <span>Payment failed due to some reasons</span>
                          </div>
                          <?php
                        }
                        if (isset($_REQUEST['sucess'])) {
                          ?>
                          <div style="background:#95FFAF; color:#009900; font-weight:bold; font-size:14px;">
                            <span>Payment Successfull</span>
                          </div>
                          <?php
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-4 uou-block-11a">
                  <?php include("include/mobilemenu.php"); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="demo-section" style="padding:40px 0px;">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="profile-company-content" style="padding: 0px">
                <div class="sidebar cmtsrccss" id="freesearch">
                  <div class="sidebar-information">
                    <ul class="single-category">
                      <form name="topsearch" id="topsearch" method="post" action="index.php">
                        <input type="hidden" name="command" id="command" value="searchby">
                        <li class="row">
                          <h6 class="title col-xs-4">Looking for</h6>
                          <span class="subtitle col-xs-8">
                            <input name="gender" type="radio" value="female" checked="checked"
                              onClick="agelimit(this.value);" /> Bride
                            <input class="vam" name="gender" type="radio" value="male"
                              onClick="agelimit(this.value);">Groom</span>
                        </li>
                        <li class="row">
                          <h6 class="title col-xs-4">Age</h6>
                          <span class="subtitle col-xs-8">
                            <div class="row">
                              <span class="col-xs-4"><select name="age1" id="age1">
                                  <?php
                                  for ($i = 18; $i <= 60; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php
                                  }
                                  ?>
                                </select>
                              </span>
                              <span span class="col-xs-4 text-center">to</span>
                              <span span class="col-xs-4">
                                <select class="ml10px" id="age2" name="age2"><?php
                                for ($i = 18; $i <= 60; $i++) {
                                  ?>
                                    <option value="<?php echo $i; ?>" <?php if ($i == 40) { ?>selected<?php } ?>>
                                      <?php echo $i; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                              </span>
                            </div>
                          </span>
                        </li>
                        <li class="row">
                          <h6 class="title col-xs-4">Caste</h6>
                          <span class="subtitle col-xs-8"><select class="w" name="caste" id="caste"
                              onchange="getcity(this.value);">
                              <option value="">--Select--</option>
                              <?php
                              $man = mysqli_query($con, "select * from caste where temp_id=1 order by caste asc");
                              while ($man1 = mysqli_fetch_array($man)) {
                                ?>
                                <option value="<?php echo $man1['id']; ?>"><?php echo ucwords($man1['caste']); ?></option>
                                <?php
                              }
                              ?>
                            </select></span>
                        </li>
                        <li class="row">
                          <h6 class="title col-xs-4">Education</h6>
                          <span class="subtitle col-xs-8">
                            <select class="w" name="education" id="education">
                              <option value="">Select</option>
                              <?php
                              $kal = mysqli_query($con, "select * from education where temp_id=1 order by id desc");
                              while ($kal11 = mysqli_fetch_array($kal)) {
                                ?>
                                <option value="<?php echo $kal11['education']; ?>"><?php echo $kal11['education']; ?>
                                </option>
                                <?php
                              }
                              ?>
                            </select></span>
                        </li>
                        <li class="row">
                          <h6 class="title col-xs-4">Photo</h6>
                          <span class="subtitle col-xs-8"><input name="photo" type="radio" value="0" /> Without photo
                            <input class="vam" name="photo" type="radio" value="1">With photo
                            <input class="vam" name="photo" type="radio" value="2" checked="checked">All</span>
                        </li>
                        <li class="row">
                          <span class="col-xs-4"></span>
                          <span class="subtitle col-xs-8">
                            <input type="submit" name="submit" id="submit" class="btn mb10 mt10 btn-small btn-primary"
                              value="Search Profiles" /></span>
                        <li class="row">
                          <span class="col-xs-4"></span>
                          <span class="subtitle col-xs-8">
                            <a href="govt_search.php">Govt Search</a></span>
                        </li>
                        </li>
                      </form>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

    </div>
  </div>
  <section class="demo-section">
    <div class="contaniner">
      <div class="row profile-main" id="Payment" style="text-align: center;">
        <h4>Choose your plan</h4>
        <div class="col-xs-4">
          <div class="col-sm-12 mt15 mb15 pr0"><span class="price-plancss">RS 3000 / </span><br><span
              class="price-plancss2"> 6 MONTHS</span><br>
            <a class="btn btn-transparent-primary  btn1" style="font-size: 10px;" href="paynow.php?plan_id=1">Join
              Now</a>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="col-sm-12 mt15 mb15 pr0 "><span class="price-plancss" ">RS 4000 /</span></span> <br><span class="
              price-plancss2">1 YEAR</span><br>
            <a class="btn btn-transparent-primary  btn1" style="font-size: 10px;" href="paynow.php?plan_id=2">Join
              Now</a>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="col-sm-12 mt15 mb15 pr0 "><span class="price-plancss" ">RS 7000 /</span> <br><span class="
              price-plancss2">UPTO MARRIAGE</span><br>
            <a class="btn btn-transparent-primary  btn1" style="font-size: 10px;" href="paynow.php?plan_id=3">Join
              Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="demo-section" style="padding:40px 0px;">
    <div class="container">
      <div class="row">
        <div class="col-sm-8" id="newsevents">
          <?php
          //                 $result=mysqli_query($con, "select * from news");
//               $row_aaaaa=mysqli_fetch_array($aaaaa);
//                 while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
//     printf( $row["descrip"]);
// }
          ?>
          <div class="profile-main pb40 pt10 pl10 pr10">
            <h4>News and Events</h4>
            <?php
            //echo "select * from  product where mf_name='$mf_name' order by pro_name asc";
            $e122 = mysqli_query($con, "select * from  news where id='2'") or die(mysqli_error());
            $row_e122 = mysqli_fetch_array($e122);
            ?>
            <p class="tab blink"><?php echo $row_e122['news_heading']; ?></p>
            <div class="qst_b">
              <span class="blink" style="color:#006600; font-weight:700;">
                <!--<p class="tab blinker">**புதிய**</p>
ஆதிதிராவிடர் திருமண தகவல் மைய இணையதளத்த்திற்கு �
ன்புடன் வரவேற்கிறோம்</span/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="color:red;">எங்களுக்கு வேறு எங்கும் கிளைகள் கிடையாது  </span>
-->
                <?php echo $row_e122['descrip']; ?>
            </div>
            <p class="qsb"><i></i><b></b></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer -->
  <div class="uou-block-4e">
    <div class="container" id="contact-info">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <h5>Registered Branch</h5>
          <!--         <a href="#" class="logo"><img src="images/logo.png" alt=""></a> -->
          <ul class="contact-info has-bg-image contain" data-bg-image="images/footer-map-bg.png">
            <li> <i class="fa fa-map-marker"></i>
              <address>
                28/49,South usman road,</br>
                T Nagar,Chennai-600 017 </br>
                Landmark : Between tatadocomo and Shree Leathers</br>
              </address>
            </li>
            </li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6">
          <h5>Contact details</h5>
          <ul class="contact-info has-bg-image contain" data-bg-image="images/footer-map-bg.png">
            <li> <i class="fa fa-mobile"></i> <a href="tel:#">+91 90940 10909 / 7299234446</a> </li>
            <li> <i class="fa fa-phone"></i> <a href="tel:#">044 4386 3901</a> </li>
            <li> <i class="fa fa-envelope"></i> <a href="mailto:#">hmlucky03@gmail.com</a> </li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6">
          <h5>QR code</h5>
          <img src="img/qrcode.png" width="120px" alt="">
        </div>
        <div class="col-md-3 col-sm-6">
          <h5>Follow Us</h5>
          <a href="#" rel="nofollow" title="Follow Matrimonials India On Twitter" target="_blank"><img class="vam ml5px"
              alt="Twitter" width="25" height="25" src="images/twitter.png"></a>
          <a href="https://www.facebook.com/AdiDravidarMatrimonyHappyMarriage" rel="nofollow"
            title="Like Matrimonials India On Facebook" target="_blank"><img class="vam ml5px" alt="Facebook" width="25"
              height="25" src="images/facebook.png"></a>
          <a href="#" rel="nofollow" title="View Matrimonials India Blog" target="_blank"><img class="vam ml5px"
              alt="Blog " width="25" height="25" src="images/blog.png"></a>
        </div>
      </div>
    </div>
  </div>
  <a class="scrollToTop btn btn-transparent-primary" href="#">Home</a>
  <!-- end .uou-block-4e -->
  <div class="uou-block-4a secondary dark">
    <div class="container">
      <ul class="links">
        <li><a href="#">Web Design by Ocean Softwares</a></li>
      </ul>
      <p>Copyright &copy; 2018 <a href="#">www.hmmatrimony.com - only for Adidravidar</a>. All Rights reserved.</p>
    </div>
  </div>
  <!-- end .uou-block-4a -->
  <div class="uou-block-11a">
    <h5 class="title">Menu</h5>
    <a href="#" class="mobile-sidebar-close">&times;</a>
    <?php include("include/mobilemenu.php"); ?>
    <hr>
  </div>
  <!-- Scripts -->
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script src="js/js/jquery-2.1.3.min.js"></script>
  <script src="js/js/bootstrap.js"></script>
  <script src="js/js/plugins/superfish.min.js"></script>
  <script src="js/js/jquery.ui.min.js"></script>
  <script src="js/js/plugins/rangeslider.min.js"></script>
  <script src="js/js/plugins/jquery.flexslider-min.js"></script>
  <script src="js/js/uou-accordions.js"></script>
  <script src="js/js/uou-tabs.js"></script>
  <script src="js/js/plugins/select2.min.js"></script>
  <script src="js/js/owl.carousel.min.js"></script>
  <script src="js/js/gmap3.min.js"></script>
  <script src="js/js/scripts.js"></script>
  <script>
    $(document).ready(function () {
      //Check to see if the window is top if not then display button
      $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
          $('.scrollToTop').fadeIn();
        } else {
          $('.scrollToTop').fadeOut();
        }
      });
      //Click event to scroll to top
      $('.scrollToTop').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
      });
    });
  </script>
  </div>
  <style>
    p.tab.blink {
      animation: blink .75s linear infinite;
      font-weight: bold;
      color: #f104e7;
    }
  </style>
</body>

</html>