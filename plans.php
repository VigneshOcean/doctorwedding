<?php
include("include/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Plans - Adidravidar Matrimony</title>
    <link rel="stylesheet" href="css/modern-design.css">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f8faf9; }
        .plans-header { background: linear-gradient(135deg, #07642f 0%, #33691e 100%); color: white; padding: 60px 0; text-align: center; margin-bottom: 50px; }
        .plans-header h1 { font-family: 'Playfair Display', serif; font-size: 3.5rem; font-weight: 700; margin-bottom: 15px; }
        .plans-header p { font-size: 1.1rem; opacity: 0.9; max-width: 600px; margin: 0 auto; }
        
        .pricing-grid { max-width: 1200px; margin: 0 auto 80px auto; padding: 0 20px; }
        .plan-card-modern { 
            background: white; 
            border-radius: 20px; 
            padding: 40px 30px; 
            text-align: center; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
            transition: 0.4s; 
            border: 1px solid #eee; 
            position: relative; 
            overflow: hidden; 
            height: 100%; 
            display: flex; 
            flex-direction: column; 
            justify-content: space-between;
        }
        .plan-card-modern:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(104, 159, 56, 0.15); border-color: #07642f; }
        
        .plan-name { font-size: 1.6rem; font-weight: 700; color: #333; margin-bottom: 15px; }
        .plan-price { font-size: 2.8rem; font-weight: 800; color: #07642f; margin-bottom: 10px; line-height: 1; }
        .plan-price span { font-size: 0.9rem; color: #888; font-weight: 600; display: block; margin-top: 5px; }
        
        .plan-features { list-style: none; padding: 0; margin: 30px 0; flex-grow: 1; text-align: left; }
        .plan-features li { padding: 12px 0; color: #555; border-bottom: 1px solid #f2f2f2; font-size: 14px; display: flex; align-items: center; }
        .plan-features li i { color: #07642f; margin-right: 12px; font-size: 16px; }
        .plan-features li:last-child { border-bottom: none; }
        
        
        .trust-section { background: #eef4ea; padding: 70px 0; border-top: 1px solid #eee; }
        .trust-icon { font-size: 2.8rem; color: #07642f; margin-bottom: 20px; }

        @media (max-width: 768px) {
            .plans-header { padding: 40px 0; margin-bottom: 30px; }
            .plans-header h1 { font-size: 2.2rem; }
            .plans-header p { font-size: 1rem; padding: 0 15px; }
            .pricing-grid { margin-bottom: 40px; }
            .trust-section { padding: 40px 0; }
        }
    </style>
</head>
<body>

<?php include("include/header.php"); ?>

<section class="plans-header">
    <div class="container">
        <h1>Premium Membership</h1>
        <p>Choose the perfect plan to accelerate your search for the ideal life partner. Verified profiles and secure communication await you.</p>
    </div>
</section>

<div class="pricing-grid">
    <div class="row g-4 align-items-stretch justify-content-center">
        <!-- Silver Plan -->
        <div class="col-lg-4 col-md-6 d-flex">
            <div class="plan-card-modern w-100">
                <div>
                    <div class="plan-name">Silver Plan</div>
                    <div class="plan-price" style="font-family: Arial, sans-serif;">₹3,000<span>/6 Months Validity</span></div>
                </div>
                <ul class="plan-features">
                    <li><i class="bi bi-check-circle-fill"></i> 6 Months Validity</li>
                    <li><i class="bi bi-check-circle-fill"></i> Unlimited Views</li>
                    <li><i class="bi bi-check-circle-fill"></i> Unlimited  Contact</li>
                </ul>
                <a href="paynow.php?plan_id=1" class="btn btn-green">Choose Silver</a>
            </div>
        </div>

        <!-- Gold Plan -->
        <div class="col-lg-4 col-md-6 d-flex">
            <div class="plan-card-modern w-100">
                <div>
                    <div class="plan-name">Gold Plan</div>
                    <div class="plan-price">₹4,000<span>/1 Year Validity</span></div>
                </div>
                <ul class="plan-features">
                    <li><i class="bi bi-check-circle-fill"></i> 1 Year Validity</li>
                    <li><i class="bi bi-check-circle-fill"></i> Unlimited Views</li>
                    <li><i class="bi bi-check-circle-fill"></i> Unlimited  Contact</li>
                </ul>
                <a href="paynow.php?plan_id=2" class="btn btn-green">Choose Gold</a>
            </div>
        </div>

        <!-- Platinum Plan -->
        <div class="col-lg-4 col-md-6 d-flex">
            <div class="plan-card-modern w-100">
                <div>
                    <div class="plan-name">Platinum Plan</div>
                    <div class="plan-price">₹7,000<span>/Valid Upto Marriage</span></div>
                </div>
                <ul class="plan-features">
                    <li><i class="bi bi-check-circle-fill"></i> Valid Upto Marriage</li>
                    <li><i class="bi bi-check-circle-fill"></i> Unlimited Views</li>
                    <li><i class="bi bi-check-circle-fill"></i> Unlimited  Contact</li>
                </ul>
                <a href="paynow.php?plan_id=3" class="btn btn-green">Choose Platinum</a>
            </div>
        </div>
    </div>
</div>

<section class="trust-section">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-4">
                <div class="trust-icon"><i class="bi bi-shield-lock-fill"></i></div>
                <h4 class="fw-bold">100% Secure</h4>
                <p class="text-muted small">Your transactions are protected by industry-standard encryption via PayU Secure Gateway.</p>
            </div>
            <div class="col-md-4">
                <div class="trust-icon"><i class="bi bi-person-check-fill"></i></div>
                <h4 class="fw-bold">Verified Matches</h4>
                <p class="text-muted small">We manually verify every profile to ensure a safe and genuine matchmaking experience.</p>
            </div>
            <div class="col-md-4">
                <div class="trust-icon"><i class="bi bi-headset"></i></div>
                <h4 class="fw-bold">Support 24/7</h4>
                <p class="text-muted small">Our dedicated support team is always here to help you throughout your journey.</p>
            </div>
        </div>
    </div>
</section>

<?php include("include/footer.php"); ?>

</body>
</html>
