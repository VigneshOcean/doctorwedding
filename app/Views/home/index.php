<?php
// Initialize HTML header... you can extract this into a Layout later in MVC
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; background: #fdfdfd; padding: 20px; }
        .hero { background: #e3f2fd; padding: 40px; border-radius: 8px; text-align: center; }
        h1 { color: #1565c0; }
        p { color: #333; font-size: 1.2rem; }
    </style>
</head>
<body>
    <div class="hero">
        <h1>Welcome!</h1>
        <p><?= htmlspecialchars($message) ?></p>
        <p>This page is being rendered by <b>HomeController</b>, utilizing the new <b>MVC Architecture</b>.</p>
        
        <div style="margin-top: 30px;">
            <a href="index_legacy.php" style="background:#1565c0;color:white;padding:10px 20px;text-decoration:none;border-radius:5px;">Go to Old Core PHP Index</a>
        </div>
    </div>
</body>
</html>