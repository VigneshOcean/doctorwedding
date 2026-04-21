<?php
// Ensure dependencies are available for the modern footer
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    .footer-heading {
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 25px;
        font-family: 'Playfair Display', serif;
        font-size: 20px;
        font-weight: 600;
        color: #fff !important;
        display: block;
    }
    .footer-heading::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 2px;
        background: #68ad00;
    }
    .footer-nav-link {
        color: #ccc !important;
        text-decoration: none !important;
        transition: 0.3s;
        display: inline-block;
        font-size: 15px;
    }
    .footer-nav-link:hover {
        color: #68ad00 !important;
        padding-left: 5px;
    }
    .social-link {
        width: 38px;
        height: 38px;
        display: flex !important;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        color: #fff !important;
        transition: 0.3s;
        text-decoration: none !important;
    }
    .social-link:hover {
        background: #68ad00;
        transform: translateY(-3px);
    }
    .contact-details .bi {
        font-size: 18px;
        color: #68ad00 !important;
    }
    .footer-logo {
        height: 90px;
        width: auto;
        transition: transform 0.3s ease;
    }
    .footer-logo:hover {
        transform: scale(1.05);
    }
</style>

<footer class="footer py-5" style="background: #000; color: #fff; font-family: 'Inter', sans-serif;">
    <div class="container-fluid px-lg-5">
        <div class="row g-4 footer-container">
            <!-- Column 1: Logo & Social -->
            <div class="col-lg-4 col-md-6 footer-box">
                <img src="image/footerlogo.svg" class="footer-logo mb-4" alt="Footer Logo">
                <p style="color: #ccc !important; font-size: 15px; line-height: 1.7; margin-bottom: 20px;">
                    Trusted matrimony service helping lakhs of people find their perfect life partner across India.
                </p>
                <div class="social-icons d-flex gap-3 mt-4">
                    <a href="#" target="_blank" class="social-link">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" target="_blank" class="social-link">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="col-lg-3 col-md-6 footer-box ps-lg-5">
                <h4 class="footer-heading">Quick Links</h4>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="index.php" class="footer-nav-link">Home</a></li>
                    <li class="mb-2"><a href="about.php" class="footer-nav-link">About Us</a></li>
                    <li class="mb-2"><a href="search_result.php" class="footer-nav-link">Search Profiles</a></li>
                    <li class="mb-2"><a href="plans.php" class="footer-nav-link">Payment</a></li>
                    <li class="mb-2"><a href="privacy.php" class="footer-nav-link">Privacy Policy</a></li>
                    <li class="mb-2"><a href="terms.php" class="footer-nav-link">Terms & Conditions</a></li>
                    <li class="mb-2"><a href="child_safety_policy.php" class="footer-nav-link">Child Safety Policy</a></li>
                    <li class="mb-2"><a href="contact.php" class="footer-nav-link">Contact Us</a></li>
                </ul>
            </div>

            <!-- Column 3: Contact Info -->
            <div class="col-lg-5 col-md-12 footer-box">
                <h4 class="footer-heading">Contact Info</h4>
                <div class="contact-details">
                    <div class="d-flex align-items-center mb-3">
                        <div class="contact-icon me-3">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <p class="mb-0" style="color: #ccc !important; font-size: 15px;">7338821446</p>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="contact-icon me-3">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <p class="mb-0" style="color: #ccc !important; font-size: 15px;">doctorwedding2026@gmail.com</p>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <div class="contact-icon me-3 mt-1">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <p class="mb-0" style="color: #ccc !important; font-size: 15px; line-height: 1.6;">
                           28/49 South Usman Road, <br>
                            T Nagar, Chennai - 600017<br>
                            Landmark: Between Paragon and Shree Leathers, Near Bus Depot.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <hr class="my-4" style="border-top: 1px solid rgb(255 255 255 / 20%);">
        
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0 copyright-text" style="color: #888; font-size: 14px;">© 2026 DOCTOR WEDDING. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0 copyright-text" style="color: #888; font-size: 14px;">
                    Developed & Maintained By <a href="https://www.oceansoftwares.com" target="_blank" style="color: #ccc; text-decoration: none;">Ocean Softwares</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
