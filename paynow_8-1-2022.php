<?php 
include("include/connect.php");
if(isset($_REQUEST['plan_id']))
{
$plan_id=$_REQUEST['plan_id'];
$plan=mysqli_query($con, "select * from plans where id=$plan_id");
$count_plan=mysqli_num_rows($plan);
	if($count_plan==0)
	{
	?>
	<script type=text/javascript>
	alert('unknown plan,please click on proper plan');
	window.location='index.php';
	</script>
	<?php
	}
	else
	{
		$row_plan=mysqli_fetch_array($plan);
		$amount_plan=$row_plan['amount'];
		$name_plan=$row_plan['name'];
	}
}
else
{
?>
<script type=text/javascript>
alert('unknown plan,please click on proper plan');
window.location='index.php';
</script>
<?php
}
// Merchant key here as provided by Payu
$MERCHANT_KEY = "eUfule";
// Merchant Salt as provided by Payu
$SALT = "ZxWGFogF";
// End point - change to https://secure.payu.in for LIVE mode
//$PAYU_BASE_URL = "https://test.payu.in";
$PAYU_BASE_URL = "https://secure.payu.in";
$action = '';
$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
  }
}
$formError = 0;
if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }
    $hash_string .= $SALT;

    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <script>
    var hash = '<?php echo $hash ?>';
	console.log(hash);
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("include/title.php"); ?>
<script type="text/javascript" src="js/index_js.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/header-footer.css" />
<link type="text/css" rel="stylesheet" href="css/common.css" />
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
</head>
<body class="back"  onload="submitPayuForm()">
	<div id="body"><!--body id start-->
<?php include("include/header.php"); ?>
<br />
<div class="plr">
	<p class="cb"></p>
	<br />
<div class="heading pb5px bdrB mb2px">
<h1>Payment details</h1>
</div>
<p class="tree">&bull;<a href="index.php">Home</a>&bull; Payment gateway</p>
<br />
 <?php if($formError) { ?>
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
<script type="text/javascript">
function validlogin()
{
var x=document.getElementById("firstname").value;
if(x=="null" || x=="")
{
alert("Please Enter Full name");
return false; 
}
var y=document.getElementById("email").value;
if(y=="null" || y=="")
{
alert("Please Enter Email");
return false; 
}
var z=document.getElementById("phone").value;
if(z=="null" || z=="")
{
alert("Please Enter Mobile no");
return false; 
}
return true;
}
	function validate_Email(email) 
{
	var x=document.getElementById("email").value;
	//alert(x);exit;
	//var x=document.forms["registerform"]["email"].value;
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
    alert("Not a valid e-mail address");
	document.getElementById("email").value='';
    return false;
    }
	return true;
}
function numbersonly(e){
    var unicode=e.charCode? e.charCode : e.keyCode
    if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57) //if not a number
            return false //disable key press
    }
}
</script>
<form action="<?php echo $action; ?>" method="post" name="payuForm"  onSubmit="return validlogin();">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <input  type="hidden" name="furl" value="http://hmmatrimony.com/index.php?failure" />
       <input  type="hidden" name="surl" value="http://hmmatrimony.com/index.php?sucess" />
       <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
       <input   type="hidden" name="amount" value="<?php echo $amount_plan; ?>" />
       <input   type="hidden" name="productinfo" value="<?php echo $name_plan; ?>" />
       <table width="50%" align="center" cellpadding="5" cellspacing="5">
       <tr><td colspan="3" align="center"> <span style="font-size:14px; font-weight:bold; color:#F51818;">Please enter below fields</span></td></tr>
       <tr><td><span style="font-weight:bold;">Selected Plan </span></td><td>:</td><td><?php echo $name_plan; ?></td></tr>
       <tr><td><span style="font-weight:bold;">Amount </span></td><td>:</td><td><?php echo $amount_plan; ?></td></tr>
       <tr><td><span style="font-weight:bold;">Full Name *</span></td><td>:</td>
       <td><input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></td></tr>
       <tr><td><span style="font-weight:bold;">Email ID *</span></td><td>:</td>
       <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>"   onblur="return validate_Email(this);"/></td></tr>
       <tr><td><span style="font-weight:bold;">Mobile No *</span></td><td>:</td>
       <td><input  name="phone" id="phone" maxlength="10" onkeypress="return numbersonly(event)" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td></tr>
       <tr><td colspan="3" align="center">
       <?php if(!$hash) { ?>
       <input type="submit" name="submit" id="submit" class="bt" value="Pay Now" style='background: url("images/bg.png") no-repeat scroll 0 -960px transparent;  border: 0 none; cursor:pointer; color: #FFFFFF; font-weight: bold; height: 25px; margin-bottom: 8px; outline: medium none; width: 120px;' />
       <a href="index.php"><input type="button" name="cancel" id="cancel" class="bt" value="Back" style='background: url("images/bg.png") no-repeat scroll 0 -960px transparent;  border: 0 none; cursor:pointer; color: #FFFFFF; font-weight: bold; height: 25px; margin-bottom: 8px; outline: medium none; width: 120px;' /></a>
        <?php } ?>
       </td></tr>
       </table>
    </form>


</div>
<?php include("include/footer.php"); ?>
</div>

 </body>
</html>