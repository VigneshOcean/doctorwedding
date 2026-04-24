<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <!-- Use modern-design.css -->
    <link rel="stylesheet" href="css/modern-design.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@400;500;600;700&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- nav bar section -->
    <?php include(__DIR__ . "/../../../include/header.php"); ?>

    <!-- About Banner Section -->
    <section class="about-us-banner">
        <div class="aboutus-child">
            <div class="about-us-heading">
                <h1>About <span>Our <br>Matrimony</span></h1>
                <p>We help individuals and families find meaningful and lifelong relationships. Our platform connects compatible matches with trust, privacy, and care.</p>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="our-story">
        <div class="our-story-heading" data-aos="fade-up">
            <h1>Our <span>Story</span></h1>
            <p>Our matrimony platform was created with the idea of helping people find genuine and meaningful relationships. We understand that marriage is one of the most important decisions in life, and it should be built on trust, compatibility, and shared values. Our goal is to provide a platform where individuals and families can connect with confidence and find the right life partner.</p>
        </div>
    </section>

    <!-- Our Mission Section -->
    <section class="mission-section-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="aboutus-mission-section">
                        <h2>Our <span>Mission</span></h2>
                        <p>Our mission is to create a trusted platform where individuals can find their ideal life partner with confidence. We focus on providing a secure, user-friendly, and reliable matchmaking experience. By maintaining verified profiles and strong privacy protection, we help people build genuine connections that lead to happy and lasting marriages.</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="mission-section-image">
                        <img src="image/ourmission.png" alt="Our Mission">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="about-stats-section">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="about-stats-box text-center">
                        <div class="stats-icon-wrapper icon-blue">
                            <img src="image/Registered Members Icon.png" alt="" style="width: 80px;">
                        </div>
                         <h2 class="stat-counter" data-target="10000">0</h2>
                        <p>Registered Members</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="about-stats-box text-center">
                        <div class="stats-icon-wrapper icon-red">
                            <img src="image/Successful Matches Icon.png" alt="" style="width: 80px;">
                        </div>
                         <h2 class="stat-counter" data-target="2000">0</h2>
                        <p>Successful Matches</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="about-stats-box text-center">
                        <div class="stats-icon-wrapper icon-teal">
                            <img src="image/Users from Cities Icon.png" alt="" style="width: 80px;">
                        </div>
                         <h2 class="stat-counter" data-target="20">0</h2>
                        <p>Users from Cities</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="why-choose-us-image">
                        <img src="image/Why Choose Us Section.svg" alt="Why Choose Us">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="why-choose-us-section ps-lg-5">
                        <h2>Why <span>Choose Us</span></h2>
                        <div class="why-choose-us-list mt-4">
                            <ul class="list-unstyled">
                                <li class="mb-3"><i class="bi bi-check-circle-fill me-2"></i> Verified Profiles</li>
                                <li class="mb-3"><i class="bi bi-check-circle-fill me-2"></i> Privacy Protection</li>
                                <li class="mb-3"><i class="bi bi-check-circle-fill me-2"></i> Advanced Matchmaking</li>
                                <li class="mb-3"><i class="bi bi-check-circle-fill me-2"></i> Dedicated Support</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <?php include(__DIR__ . "/../../../include/footer.php"); ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
        
        // Counter Animation Logic
        const counters = document.querySelectorAll('.stat-counter');
        const speed = 200; // The higher the slower

        const startCounting = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const updateCount = () => {
                        const target = +counter.getAttribute('data-target');
                        const count = +counter.innerText.replace(/,/g, '').replace('+', '');
                        const inc = target / speed;

                        if (count < target) {
                            const newCount = Math.ceil(count + inc);
                            counter.innerText = newCount.toLocaleString() + '+';
                            setTimeout(updateCount, 1);
                        } else {
                            counter.innerText = target.toLocaleString() + '+';
                        }
                    };
                    updateCount();
                    observer.unobserve(counter);
                }
            });
        };

        const observerOptions = {
            threshold: 0.5
        };

        const counterObserver = new IntersectionObserver(startCounting, observerOptions);
        counters.forEach(counter => counterObserver.observe(counter));
    </script>
</body>
</html>