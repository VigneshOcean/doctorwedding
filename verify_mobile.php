<?php
if(isset($_GET['mobile_no']) && $_GET['mobile_no']!='' && isset($_GET['reg_id']) && $_GET['reg_id']!='')
{
    $mobile_no=$_GET['mobile_no'];
    $reg_id=$_GET['reg_id'];
}
else
{
     echo "<script type=\"text/javascript\">
        alert('Invalid Parameter, Please contact admin');
        window.location='index.php';
        </script>";
     exit;
}
include("include/connect.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Verification - Adidravidar Matrimony</title>
    <link rel="stylesheet" href="css/modern-design.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background: #f4f7f6; }
        .verify-container { max-width: 600px; margin: 80px auto; background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); border-top: 5px solid #07642f; }
        .section-title { font-family: 'Playfair Display', serif; color: #333; font-weight: 700; margin-bottom: 20px; text-align: center; }
        .form-control { border-radius: 10px; padding: 15px; border: 1px solid #ddd; font-size: 18px; text-align: center; letter-spacing: 5px; font-weight: 700; }
        .btn-verify { background: #07642f; color: #fff; border: none; padding: 15px; border-radius: 10px; font-weight: 700; font-size: 16px; transition: 0.3s; width: 100%; transition: 0.3s; }
        .btn-verify:hover { background: #07642f; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(104, 159, 56, 0.3); }
        .mobile-display { background: #f8fcf5; color: #07642f; padding: 10px 20px; border-radius: 30px; display: inline-block; font-weight: 600; margin-bottom: 30px; }
    </style>
</head>
<body>

<?php include("include/header.php"); ?>

<div class="verify-container text-center">
    <div class="mb-4">
        <i class="bi bi-shield-check text-success" style="font-size: 3rem;"></i>
    </div>
    <h2 class="section-title">Mobile Verification</h2>
    <p class="text-muted mb-4">An OTP has been sent to your mobile number</p>
    <div class="mobile-display">
        <i class="bi bi-phone me-2"></i>+91 <?php echo htmlspecialchars($mobile_no); ?>
    </div>

    <form name="registerForm" id="registerForm" action="save_profile.php" method="post" onsubmit="return validateForm();">
        <input type="hidden" name="command" value="verify" />
        <input type="hidden" name="mobile_no" value="<?php echo htmlspecialchars($mobile_no); ?>" />
        <input type="hidden" name="reg_id" value="<?php echo htmlspecialchars($reg_id); ?>" />
        
        <div class="mb-4">
            <label class="form-label fw-bold text-dark mb-2">Enter 6-Digit OTP</label>
            <input type="text" class="form-control" name="otp" id="otp" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;" maxlength="6" required onkeypress="return isNumberKey(event)">
        </div>

        <button type="submit" class="btn btn-verify">Verify & Complete Registration<i class="bi bi-arrow-right ms-2"></i></button>
        
        <div class="mt-4">
            <p class="small text-muted mb-0">Didn't receive the code?</p>
            <a href="#" class="text-success fw-bold text-decoration-none small">Resend OTP</a>
        </div>
    </form>
</div>

<script>
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
    return true;
}

function validateForm() {
    var otp = document.getElementById("otp").value;
    if(!otp.trim() || otp.length < 4) {
        alert("Please enter a valid OTP");
        return false;
    }
    return true;
}
</script>

<?php include("include/footer.php"); ?>

</body>
</html>