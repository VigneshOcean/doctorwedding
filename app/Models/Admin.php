<?php
namespace App\Models;

use Config\Database;

class Admin {
    private $db;

    public function __construct() {
        // Use the new PDO Database connection
        $this->db = Database::getInstance()->getConnection();
    }

    // Function to check admin credentials
    public function login($username, $password) {
        // Using Prepared Statement to prevent SQL Injection
        // Table `admin` with fields `username` and `password`
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");
        
        // Execute with safe bound parameters
        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);

        $admin = $stmt->fetch();

        // Return the admin record if found, otherwise return false
        if ($admin) {
            return $admin;
        }

        return false;
    }
}