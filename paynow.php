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
	exit;
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
alert('Please select a membership plan first.');
window.location='index.php';
</script>
<?php
exit;
}

$MERCHANT_KEY = "eUfule";
$SALT = "ZxWGFogF";
$PAYU_BASE_URL = "https://secure.payu.in";
$action = '';
$posted = array();
if(!empty($_POST)) {
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
  }
}
$formError = 0;
if(empty($posted['txnid'])) {
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway - Adidravidar Matrimony</title>
    <link rel="stylesheet" href="css/modern-design.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        var hash = '<?php echo $hash ?>';
        function submitPayuForm() {
            if(hash == '') return;
            document.forms.payuForm.submit();
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; background: #f4f7f6; }
        .payment-container { max-width: 800px; margin: 40px auto; background: #fff; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .section-title { font-family: 'Playfair Display', serif; color: #333; font-weight: 700; margin-bottom: 25px; border-bottom: 2px solid #07642f; display: inline-block; padding-bottom: 5px; }
        .plan-summary-card { background: #f8fcf5; border: 1px solid #e1eed9; border-radius: 12px; padding: 25px; margin-bottom: 30px; }
        .form-label { font-weight: 600; font-size: 14px; color: #555; }
        .form-control { border-radius: 8px; padding: 12px; border: 1px solid #ddd; }
        .radio-group-modern { background: #fff; border: 1px solid #eee; padding: 15px; border-radius: 8px; margin-bottom: 10px; cursor: pointer; transition: 0.2s; }
        .radio-group-modern:hover { border-color: #07642f; background: #fafff5; }
        .form-check-input:checked + .form-check-label { color: #07642f; font-weight: 600; }
    </style>
</head>
<body onload="submitPayuForm()">

<?php include("include/header.php"); ?>

<div class="payment-container">
    <h1 class="section-title">Payment Summary</h1>
    
    <div class="plan-summary-card">
        <div class="row align-items-center">
            <div class="col-8">
                <h5 class="mb-1 fw-bold">Selected Plan: <span class="text-success"><?php echo $name_plan; ?></span></h5>
                <p class="text-muted mb-0">Secure Transaction via PayU</p>
            </div>
            <div class="col-4 text-end">
                <?php if($plan_id != 7) { ?>
                    <h3 class="fw-bold mb-0 text-dark" style="font-family: Arial, sans-serif;">₹<?php echo $amount_plan; ?></h3>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php if($formError) { ?>
        <div class="alert alert-danger">Please fill all mandatory fields to continue.</div>
    <?php } ?>

    <form action="<?php echo $action; ?>" method="post" name="payuForm" onsubmit="return validatePayment();">
        <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
        <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
        <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
        <input type="hidden" name="furl" value="https://hmmatrimony.com/index.php?failure" />
        <input type="hidden" name="surl" value="https://hmmatrimony.com/index.php?sucess" />
        <input type="hidden" name="service_provider" value="payu_paisa" />
        <input type="hidden" name="productinfo" value="<?php echo $name_plan; ?>" />

        <?php if($plan_id == 7) { ?>
            <div class="mb-4">
                <label class="form-label d-block mb-3">Choose Your Renewal/Registration Option:</label>
                
                <div class="form-check radio-group-modern mb-2">
                    <input class="form-check-input" type="radio" name="amount" id="amt1000" value="1000" required onclick="setAmt(1000)">
                    <label class="form-check-label w-100" for="amt1000">
                        ₹1,000 <span class="text-muted float-end small">15 Days - 20 Contacts</span>
                    </label>
                </div>

                <div class="form-check radio-group-modern mb-2">
                    <input class="form-check-input" type="radio" name="amount" id="amt2000" value="2000" onclick="setAmt(2000)">
                    <label class="form-check-label w-100" for="amt2000">
                        ₹2,000 <span class="text-muted float-end small">6 Month - Only Renewal</span>
                    </label>
                </div>

                <div class="form-check radio-group-modern">
                    <input class="form-check-input" type="radio" name="amount" id="amt3000" value="3000" onclick="setAmt(3000)">
                    <label class="form-check-label w-100" for="amt3000">
                        ₹3,000 <span class="text-muted float-end small">6 Month - New Registration</span>
                    </label>
                </div>
            </div>
            <input type="hidden" id="final_amount" name="amount" value="<?php echo $posted['amount']; ?>" />
        <?php } else { ?>
            <input type="hidden" name="amount" value="<?php echo $amount_plan; ?>" />
        <?php } ?>

        <div class="row g-3">
            <div class="col-12">
                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                <input class="form-control" name="firstname" id="firstname" placeholder="Enter your full name" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                <input class="form-control" type="email" name="email" id="email" placeholder="email@example.com" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                <input class="form-control" name="phone" id="phone" placeholder="10-digit mobile" maxlength="10" onkeypress="return numbersonly(event)" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" required>
            </div>
            
            <div class="col-12 mt-5">
                <?php if(!$hash) { ?>
                    <button type="submit" class="btn btn-green w-100 shadow-sm">Proceed to Secure Payment <i class="bi bi-shield-lock-fill ms-2"></i></button>
                    <div class="text-center mt-3">
                        <a href="index.php" class="text-muted text-decoration-none small"><i class="bi bi-arrow-left me-1"></i> Back to Home</a>
                    </div>
                <?php } else { ?>
                    <div class="text-center p-4">
                        <div class="spinner-border text-success mb-3" role="status"></div>
                        <p class="fw-bold">Redirecting to Secure Payment Gateway...</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </form>
</div>

<script>
    function setAmt(val) {
        document.getElementById("final_amount").value = val;
    }

    function numbersonly(e) {
        var unicode = e.charCode ? e.charCode : e.keyCode;
        if (unicode != 8) {
            if (unicode < 48 || unicode > 57) return false;
        }
    }

    function validatePayment() {
        var plan_id = <?php echo $plan_id; ?>;
        var name = document.getElementById("firstname").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        
        if (plan_id == 7) {
            var selected = false;
            var radios = document.getElementsByName('amount');
            for(var i=0; i<radios.length; i++){
                if(radios[i].checked) selected = true;
            }
            if(!selected) { alert("Please select a plan amount"); return false; }
        }

        if(!name.trim()) { alert("Please enter your name"); return false; }
        if(!email.trim() || !email.includes('@')) { alert("Please enter a valid email"); return false; }
        if(!phone.trim() || phone.length < 10) { alert("Please enter a valid 10-digit mobile number"); return false; }
        
        return true;
    }
</script>

<?php include("include/footer.php"); ?>
</body>
</html>