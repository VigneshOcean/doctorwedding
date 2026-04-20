<?php
// Modern Header Include
$current_page = basename($_SERVER['PHP_SELF']);
$request_uri = $_SERVER['REQUEST_URI'];
?>
<!-- Header Requirements -->
<link rel="stylesheet" href="css/modern-design.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top headerdiv py-2 shadow-sm">
    <div class="container inner d-flex justify-content-between align-items-center">
        <a class="navbar-brand py-0" href="index.php">
            <img src="image/newlogo.svg" class="crtlogo" alt="Logo">
        </a>
        
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto navlinks gap-2 gap-lg-4 align-items-lg-center mt-3 mt-lg-0">
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?php if (($current_page == 'index.php' || $current_page == 'index_legacy.php' || $current_page == '') && (strpos($request_uri, '/about') === false && strpos($request_uri, '/search_result') === false && strpos($request_uri, '/plans') === false && strpos($request_uri, '/contact') === false)) echo 'active'; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link <?php if ($current_page == 'about.php' || strpos($request_uri, '/about') !== false) echo 'active'; ?>">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="search_result.php" class="nav-link <?php if ($current_page == 'search_result.php' || strpos($request_uri, '/search_result') !== false) echo 'active'; ?>">Search Profiles</a>
                </li>
                <li class="nav-item">
                    <a href="plans.php" class="nav-link <?php if ($current_page == 'plans.php' || $current_page == 'paynow.php' || strpos($request_uri, '/plans') !== false || strpos($request_uri, '/paynow') !== false) echo 'active'; ?>">Payment</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link <?php if ($current_page == 'contact.php' || strpos($request_uri, '/contact') !== false) echo 'active'; ?>">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="register.php" class="nav-link <?php if ($current_page == 'register.php' || strpos($request_uri, '/register') !== false) echo 'active'; ?>">Register</a>
                </li>
                <li class="nav-item mt-2 mt-lg-0">
                    <button class="btn btn-success w-100 rounded-pill px-4 fw-bold shadow-sm" onclick="location.href='login.php'">Login</button>
                </li>
            </ul>
        </div>
    </div>
</nav>