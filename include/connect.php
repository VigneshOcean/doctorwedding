<?php
// Suppress notices/warnings but keep fatal errors visible for debugging
error_reporting(0);
ini_set('display_errors', '0');

@ob_start();

// Auto-detect environment
if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1' || strpos($_SERVER['HTTP_HOST'], '192.168.') === 0 || strpos($_SERVER['HTTP_HOST'], '192.168.') !== false) {
    $servername = "localhost";
    $username = "root";
    $password = "";
} else {
    $servername = "localhost";
    $username = "hmmattdk_testuser";
    $password = "Micandmac@12";
}
$dbname = "matrimony";

// Direct connect with database
$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("DB Connection Failed: " . mysqli_connect_error());
}

// Set charset
mysqli_set_charset($con, "utf8");

/**
 * Standardized Avatar Helper
 * Always returns gender-based avatar based on input gender
 * Supports optional path prefix (e.g., '../') for files in subdirectories
 */
function get_avatar($gender, $prefix = '')
{
    $g = strtolower(trim($gender));
    if ($g == "male" || $g == "groom") {
        return $prefix . "images/male_avatar.png";
    } else {
        return $prefix . "images/female_avatar.png";
    }
}
?>