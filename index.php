<?php
// ========== MODERN ENTRY POINT (Front Controller) ==========

// Enable all error reporting during development/troubleshooting
// (You may set display_errors to 0 on a production server once everything is fixed)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. Require Composer Autoloader
if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    die("<h1>Fatal Error: Missing Autoloader</h1><p>It seems the 'vendor' folder or 'vendor/autoload.php' is missing. Please run <code>composer install</code> on your server or upload the vendor directory.</p>");
}
require_once __DIR__ . '/vendor/autoload.php';

// 2. Import Router
use App\Core\Router;

// 3. Initialize Router
$router = new Router();

// ==========================================
// ========== DEFINE YOUR ROUTES ============
// ==========================================

// GET route for testing the new MVC
$router->get('/mvc/welcome', [App\Controllers\HomeController::class, 'index']);

// Default Route (Home Page)
$router->get('/', function () {
    require_once __DIR__ . '/index_legacy.php';
});
$router->get('/index.php', function () {
    require_once __DIR__ . '/index_legacy.php';
});

// Routes for the completely new About Us Page
$router->get('/about.php', [App\Controllers\AboutController::class, 'index']);
$router->get('/about', [App\Controllers\AboutController::class, 'index']);
$router->get('/terms', function () {
    require_once __DIR__ . '/terms.php';
});
$router->get('/privacy', function () {
    require_once __DIR__ . '/privacy.php';
});

// Routes for Admin Panel MVC Login
$router->get('/matrimonyadmin/index.php', [App\Controllers\Admin\LoginController::class, 'index']);
$router->get('/admin/login', [App\Controllers\Admin\LoginController::class, 'index']);
$router->post('/admin/authenticate', [App\Controllers\Admin\LoginController::class, 'authenticate']);
$router->get('/admin/logout', [App\Controllers\Admin\LoginController::class, 'logout']);

// Example route for a specific page (e.g., /about)
// $router->get('/about', [App\Controllers\PageController::class, 'about']);

// ==========================================
// ============ API ROUTES ==================
// ==========================================
$router->post('/api/v1/auth/login', [App\Controllers\Api\AuthController::class, 'login']);
$router->post('/api/v1/auth/register', [App\Controllers\Api\AuthController::class, 'register']);
$router->post('/api/v1/auth/verify-otp', [App\Controllers\Api\AuthController::class, 'verifyOtp']);
$router->get('/api/v1/members/search', [App\Controllers\Api\MemberController::class, 'search']);
$router->get('/api/v1/members/likes', [App\Controllers\Api\MemberController::class, 'likes']);
$router->get('/api/v1/members/shortlist', [App\Controllers\Api\MemberController::class, 'shortlist']);
$router->get('/api/v1/members/contacts', [App\Controllers\Api\MemberController::class, 'contacts']);
$router->get('/api/v1/members', [App\Controllers\Api\MemberController::class, 'index']);
$router->get('/api/v1/members/{id}', [App\Controllers\Api\MemberController::class, 'show']);
$router->post('/api/v1/members/{id}/like', [App\Controllers\Api\MemberController::class, 'toggleLike']);
$router->post('/api/v1/members/unlock-contact', [App\Controllers\Api\MemberController::class, 'unlockContact']);
$router->post('/api/v1/members/notify-marriage', [App\Controllers\Api\MemberController::class, 'notifyMarriage']);
$router->get('/api/v1/profile/me', [App\Controllers\Api\ProfileController::class, 'me']);
$router->put('/api/v1/profile/me', [App\Controllers\Api\ProfileController::class, 'update']);
$router->post('/api/v1/profile/upload-image', [App\Controllers\Api\ProfileController::class, 'uploadImage']);
$router->post('/api/v1/profile/upload-horoscope', [App\Controllers\Api\ProfileController::class, 'uploadHoroscope']);
$router->post('/api/v1/members/{id}/block', [App\Controllers\Api\MemberController::class, 'block']);
$router->post('/api/v1/members/{id}/report', [App\Controllers\Api\MemberController::class, 'report']);
$router->get('/api/v1/metadata/education', [App\Controllers\Api\MetadataController::class, 'getEducation']);
$router->get('/api/v1/metadata/castes', [App\Controllers\Api\MetadataController::class, 'getCastes']);
$router->get('/api/v1/metadata/castes/{id}/subcastes', [App\Controllers\Api\MetadataController::class, 'getSubcastes']);

$router->post('/api/v1/profile/delete-account', [App\Controllers\Api\ProfileController::class, 'deleteAccount']);
// ==========================================

// Get current URI and HTTP Method
$uri = $_SERVER['REQUEST_URI'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'];


// Dispatch the request
$router->dispatch($uri, $method);