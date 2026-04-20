<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Admin;

class LoginController extends Controller {

    public function index() {
        // Start session if not started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if admin is already logged in
        if (isset($_SESSION['id'])) {
            $this->redirect('/matrimonyadmin/home.php'); // Redirect to old specific dashboard or MVC one later
        }

        // Show the login View
        $this->view('admin/login');
    }

    public function authenticate() {
        // Start session if not started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if data is posted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                 $this->view('admin/login', ['error' => 'Please fill in both fields.']);
                 return;
            }

            // Call Admin model
            $adminModel = new Admin();
            
            // Note: Secure PDO prevents SQL Injection
            $admin = $adminModel->login($username, $password);

            if ($admin) {
                // Successful Login
                $_SESSION['id'] = $admin['id'];
                
                // For now, redirect to the old backend home.php to ensure everything else works
                $this->redirect('/Matrimony/public_html/matrimonyadmin/home.php');
            } else {
                // Failed Login
                $this->view('admin/login', [
                    'error' => 'Invalid Username or Password.',
                    'username' => htmlspecialchars($username)
                ]);
            }
        }
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Destroy session safely
        session_unset();
        session_destroy();

        $this->redirect('/admin/login');
    }
}