<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Optional: Database update to track logout
try {
    include("../include/connect.php");
    if (isset($con) && $con instanceof mysqli && !empty($_SESSION['id'])) {
        $id = $_SESSION['id'];
        date_default_timezone_set('Asia/Kolkata');
        $current_date = date('Y-m-d H:i:s');
        @mysqli_query($con, "UPDATE register SET last_logout='$current_date', login_status='0' WHERE id='$id'");
    }
} catch (Exception $e) {
    // Ignore DB errors for logout
}

// Clear Session
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();

// Redirect back to home
if (!headers_sent()) {
    header("Location: ../index.php");
    exit;
} else {
    echo '<script type="text/javascript">window.location.href="../index.php";</script>';
    echo '<noscript><meta http-equiv="refresh" content="0;url=../index.php"></noscript>';
    echo 'Logout successful. <a href="../index.php">Click here if not redirected automatically.</a>';
    exit;
}
?>