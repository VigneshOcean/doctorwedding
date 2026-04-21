<?php include("include/connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Adidravidar Matrimony</title>
    <link rel="stylesheet" href="css/modern-design.css">
    <!-- Header included later but we need dependencies here for early scripts if any -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background: #f4f7f6; }
        .contact-container { max-width: 1100px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .section-title { font-family: 'Playfair Display', serif; color: #333; font-weight: 700; margin-bottom: 25px; border-bottom: 2px solid #07642f; display: inline-block; padding-bottom: 5px; }
        .contact-card { background: #f8fcf5; border: 1px solid #e1eed9; border-radius: 12px; padding: 20px; height: 100%; transition: 0.3s; }
        .contact-card:hover { transform: translateY(-5px); box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .contact-card h5 { color: #07642f; font-weight: 700; margin-bottom: 15px; }
        .bank-details-card { background: #fff; border: 1px solid #eee; border-radius: 12px; padding: 20px; margin-bottom: 20px; }
        .bank-details-card h6 { background: #07642f; color: #fff; padding: 8px 15px; border-radius: 6px; margin-bottom: 15px; font-weight: 600; }
        .bank-info-item { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px dashed #eee; font-size: 14px; }
        .bank-info-item:last-child { border-bottom: none; }
        .bank-info-label { color: #666; font-weight: 500; }
        .bank-info-value { color: #333; font-weight: 600; text-align: right; }
        .form-label { font-weight: 600; font-size: 14px; color: #555; }
        .form-control { border-radius: 8px; padding: 12px; border: 1px solid #ddd; }
        .btn-submit { background: #07642f; border: none; padding: 12px 30px; border-radius: 8px; font-weight: 700; transition: 0.3s; }
        .btn-submit:hover { background: #07642f; transform: scale(1.02); }
        .video-wrapper { border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.1); margin: 30px 0; }
    </style>
</head>
<body>

<?php include("include/header.php"); ?>

<div class="contact-container">
    <h1 class="section-title">Contact Us</h1>

    <div class="row g-4 mb-5">
        <!-- Registered Branch -->
        <div class="col-md-6">
            <div class="contact-card">
                <h5><i class="bi bi-geo-alt-fill me-2"></i>Registered Branch</h5>
                <p class="mb-0 text-muted" style="line-height: 1.8;">
                    28/49, South Usman Road,<br>
                    T Nagar, Chennai - 600 017<br>
                    <strong>Landmark:</strong> Between Paragon and Shree Leathers, Near Bus Depot.
                </p>
            </div>
        </div>
        <!-- Contact Details -->
        <div class="col-md-6">
            <div class="contact-card">
                <h5><i class="bi bi-telephone-inbound-fill me-2"></i>Direct Contact</h5>
                <div class="mb-2">
                    <span class="text-muted small d-block">Mobile Numbers:</span>
                    <span class="fw-bold">7338821446</span>
                </div>
                <div>
                    <span class="text-muted small d-block">Support Email:</span>
                    <span class="fw-bold text-success">doctorwedding2026@gmail.com</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-5 justify-content-center">
        <!-- Form and Video Column -->
        <div class="col-lg-7">
            <div class="video-wrapper">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.996174624!2d80.2312!3d13.0416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526659d87e3e!2s28%2F49%2C%20South%20Usman%20Rd%2C%20T.%20Nagar%2C%20Chennai%2C%20Tamil%20Nadu%20600017!5e0!3m2!1sen!2sin!4v1710400000000!5m2!1sen!2sin" title="Google Map" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            <div class="message-form-section mt-5">
                <h3 class="mb-4 fw-bold">Send Your Message</h3>
                <form id="contactForm" action="save.php" method="post" onsubmit="return validateForm();">
                    <input type="hidden" name="command" value="mail_form">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile number" required onkeypress="return onlyNumbers(event)">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="email@example.com" onblur="validateEmail(this.value)">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Your Message <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="msg" id="msg" rows="5" placeholder="How can we help you?" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-green px-5">Send Message <i class="bi bi-send ms-2"></i></button>
                            <button type="reset" class="btn btn-outline-secondary ms-2" style="border-radius: 8px; padding: 12px 20px;">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bank Details Column -->
        <!-- <div class="col-lg-5">
            <h4 class="mb-4 fw-bold">Bank Payment Details</h4> -->
            
            <!-- Indian Bank -->
            <!-- <div class="bank-details-card shadow-sm">
                <h6>Indian Bank Details</h6>
                <div class="bank-info-item">
                    <span class="bank-info-label"><i class="bi bi-caret-right-fill text-primary me-2"></i>Account Holder Name</span>
                    <span class="bank-info-value">P.Mani</span>
                </div>
                <div class="bank-info-item">
                    <span class="bank-info-label"><i class="bi bi-caret-right-fill text-primary me-2"></i>Bank Name</span>
                    <span class="bank-info-value">Indian Bank</span>
                </div>
                <div class="bank-info-item">
                    <span class="bank-info-label"><i class="bi bi-caret-right-fill text-primary me-2"></i>Account Number</span>
                    <span class="bank-info-value">428197570</span>
                </div>
                <div class="bank-info-item">
                    <span class="bank-info-label"><i class="bi bi-caret-right-fill text-primary me-2"></i>IFSC Code</span>
                    <span class="bank-info-value">IDIB000T115</span>
                </div>
                <div class="bank-info-item">
                    <span class="bank-info-label"><i class="bi bi-caret-right-fill text-primary me-2"></i>Branch Name</span>
                    <span class="bank-info-value">T.Nagar, Chennai</span>
                </div>
            </div> -->

            <!-- Axis Bank -->
            <!-- <div class="bank-details-card shadow-sm">
                <h6>Axis Bank Details</h6>
                <div class="bank-info-item">
                    <span class="bank-info-label"><i class="bi bi-caret-right-fill text-primary me-2"></i>Account Holder Name</span>
                    <span class="bank-info-value">Happy Marriage Matrimony</span>
                </div>
                <div class="bank-info-item">
                    <span class="bank-info-label"><i class="bi bi-caret-right-fill text-primary me-2"></i>Bank Name</span>
                    <span class="bank-info-value">Axis Bank</span>
                </div>
                <div class="bank-info-item">
                    <span class="bank-info-label"><i class="bi bi-caret-right-fill text-primary me-2"></i>Account Number</span>
                    <span class="bank-info-value">9140 2003 9993 724</span>
                </div>
                <div class="bank-info-item">
                    <span class="bank-info-label"><i class="bi bi-caret-right-fill text-primary me-2"></i>IFSC Code</span>
                    <span class="bank-info-value">UTIB0001594</span>
                </div>
                <div class="bank-info-item">
                    <span class="bank-info-label"><i class="bi bi-caret-right-fill text-primary me-2"></i>Branch Name</span>
                    <span class="bank-info-value">Venkat Narayana Road, T.Nagar</span>
                </div>
                <div class="bank-info-item">
                    <span class="bank-info-label"><i class="bi bi-caret-right-fill text-primary me-2"></i>Branch Code</span>
                    <span class="bank-info-value">001594</span>
                </div> -->
            </div>
        </div>
    </div>
</div>

<script>
    function onlyNumbers(event) {
        var charCode = event.which || event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
        return true;
    }

    function validateEmail(email) {
        if (!email) return true;
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!re.test(email)) {
            alert("Please enter a valid email address");
            document.getElementById("email").value = '';
            return false;
        }
        return true;
    }

    function validateForm() {
        var name = document.getElementById("name").value;
        var mobile = document.getElementById("mobile").value;
        var msg = document.getElementById("msg").value;
        
        if (!name.trim()) { alert("Please Enter Your Name"); return false; }
        if (!mobile.trim()) { alert("Please Enter Your Mobile Number"); return false; }
        if (!msg.trim()) { alert("Please Enter Your Message"); return false; }
        return true;
    }
</script>

<?php include("include/footer.php"); ?>

</body>
</html>