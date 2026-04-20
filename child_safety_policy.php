<?php include("include/connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Safety Policy - Adidravidar Matrimony</title>
    <link rel="stylesheet" href="css/modern-design.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #fdfdfd;
            color: #444;
        }

        .page-container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.05);
            border: 1px solid #f0f0f0;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            color: #1b2e1b;
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 32px;
        }

        .subtitle {
            color: #888;
            font-size: 14px;
            margin-bottom: 30px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            display: block;
        }

        .policy-section {
            margin-bottom: 30px;
        }

        .policy-section h3 {
            font-size: 20px;
            font-weight: 700;
            color: #07642f;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .policy-section h3 span {
            background: #07642f;
            color: #fff;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .policy-section p {
            line-height: 1.8;
            font-size: 15px;
            margin-bottom: 15px;
        }

        .policy-list {
            list-style: none;
            padding-left: 20px;
        }

        .policy-list li {
            position: relative;
            margin-bottom: 12px;
            line-height: 1.6;
            font-size: 15px;
            padding-left: 25px;
        }

        .policy-list li::before {
            content: "\F26A";
            font-family: "bootstrap-icons";
            position: absolute;
            left: 0;
            color: #07642f;
            font-weight: bold;
        }

        .warning-box {
            background: #f8fcf5;
            border-left: 4px solid #07642f;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            color: #555;
            font-style: italic;
        }

        .contact-info-footer {
            background: #f8f8f8;
            padding: 25px;
            border-radius: 12px;
            margin-top: 40px;
            border: 1px solid #eee;
        }

        .contact-info-footer h4 {
            color: #1b2e1b;
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .contact-info-footer p {
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
            display: flex;
            align-items: center;
        }

        .contact-info-footer i {
            color: #07642f;
            margin-right: 10px;
            width: 20px;
        }
    </style>
</head>

<body>

    <?php include("include/header.php"); ?>

    <div class="container">
        <div class="page-container">
            <h1 class="section-title">Child Safety Policy</h1>
            <span class="subtitle">Effective Date: June 2025 | HM Matrimony is committed to maintaining a safe,
                responsible, and trusted matrimonial platform exclusively for adults.</span>

            <div class="policy-section">
                <h3><span>1</span> Minimum Age Requirement</h3>
                <p>HM Matrimony is strictly a platform for adults. Registration and use of our services is permitted
                    only for individuals who are:</p>
                <ul class="policy-list">
                    <li>18 years of age or older (as per the legal marriageable age in India)</li>
                    <li>Able to provide valid government-issued age proof: Aadhaar Card, PAN Card, Birth Certificate, or
                        Passport</li>
                </ul>
                <div class="warning-box">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Any profile found to belong to a person under
                    18 years will be immediately removed without notice.
                </div>
            </div>

            <div class="policy-section">
                <h3><span>2</span> Age Verification</h3>
                <ul class="policy-list">
                    <li>All members must submit a valid government ID showing date of birth at the time of registration.
                    </li>
                    <li>Our team reserves the right to request additional age proof at any stage of membership.</li>
                    <li>Providing false age information is a violation of these Terms and may result in permanent
                        account ban and legal action.</li>
                </ul>
            </div>

            <div class="policy-section">
                <h3><span>3</span> Prohibition of Minor-Related Content</h3>
                <ul class="policy-list">
                    <li>No profile, photo, or content involving a person under 18 years of age is permitted on this
                        platform.</li>
                    <li>Members must not attempt to register on behalf of a minor under any circumstances.</li>
                    <li>Photos of children must not be uploaded as profile pictures or in any section of the profile.
                    </li>
                </ul>
            </div>

            <div class="policy-section">
                <h3><span>4</span> Reporting Underage Profiles</h3>
                <p>If you come across a profile that appears to belong to a minor, please report it immediately:</p>
                <ul class="policy-list">
                    <li><strong>Email:</strong> hmlucky03@gmail.com with the profile ID and your concern.</li>
                    <li><strong>Phone:</strong> 044 4386 3901 or +91 90940 10909.</li>
                    <li><strong>Visit:</strong> 28/49, South Usman Road, T Nagar, Chennai - 600 017.</li>
                </ul>
                <p class="mt-3 small text-muted">This contact is actively monitored to handle child safety concerns and
                    ensure compliance with child protection laws.</p>
                <p class="mt-3 small text-muted">If you come across a profile that appears to belong to a minor, please
                    report it immediately:</p>
                <ul class="policy-list">
                    <li>Email: hmlucky03@gmail.com with the profile ID and your concern</li>
                </ul>
                <p class="mt-3 small text-muted">All reports will be reviewed within 24 hours and appropriate action
                    will be taken promptly.</p>
            </div>

            <div class="policy-section">
                <h3><span>5</span> Protection from Exploitation</h3>
                <ul class="policy-list">
                    <li>HM Matrimony does not permit any form of child exploitation, grooming, or abuse on this
                        platform.</li>
                    <li>Any member found attempting to contact or exploit a minor will be immediately banned and
                        reported to the Tamil Nadu Police Cybercrime Division.</li>
                    <li>We cooperate fully with law enforcement agencies in all child safety investigations.</li>
                </ul>
            </div>

            <div class="policy-section">
                <h3><span>6</span> Parental Responsibility</h3>
                <p>Parents and guardians are advised to monitor their children's internet activity. HM Matrimony is not
                    designed for or accessible to minors, but we encourage responsible digital parenting to ensure
                    children do not access adult matrimonial platforms.</p>
            </div>

            <div class="policy-section">
                <h3><span>7</span> Legal Compliance</h3>
                <p>This policy is in compliance with the Protection of Children from Sexual Offences (POCSO) Act, 2012,
                    the Information Technology Act, 2000, and all applicable Indian child protection laws. Violations
                    will be reported to the National Commission for Protection of Child Rights (NCPCR) and law
                    enforcement.</p>
            </div>

            <div class="contact-info-footer">
                <h4>Safety Concerns?</h4>
                <p><i class="bi bi-envelope"></i> Email: hmlucky03@gmail.com</p>
                <p><i class="bi bi-telephone"></i> Phone: 044 4386 3901</p>
                <p><i class="bi bi-geo-alt"></i> 28/49, South Usman Road, T Nagar, Chennai - 600017</p>
            </div>
        </div>
    </div>

    <?php include("include/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>