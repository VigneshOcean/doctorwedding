<?php
namespace Config;

class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "matrimony";
    
    private static $instance = null;
    private $conn;

    // Private constructor to prevent multiple instances (Singleton Pattern)
    private function __construct() {
        // Auto-detect environment
        if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1' || strpos($_SERVER['HTTP_HOST'], '192.168.') === 0 || strpos($_SERVER['HTTP_HOST'], '192.168.') !== false) {
            $this->host = "localhost";
            $this->user = "root";
            $this->pass = "";
            $this->dbname = "matrimony";
        } else {
            $this->host = "localhost";
            $this->user = "doctorlifematrim_manikandan";
            $this->pass = "pQZX*iN1v~%)Y;2K";
            $this->dbname = "doctorlifematrim_matrimonialdb";
        }
       

        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=utf8mb4";
            $options = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION, // Throw exceptions on errors
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,       // Fetch associative arrays
                \PDO::ATTR_EMULATE_PREPARES   => false,                   // Disable emulation for real prepared statements
            ];
            
            $this->conn = new \PDO($dsn, $this->user, $this->pass, $options);
            
        } catch(\PDOException $e) {
            // Log the error securely instead of showing it to the user
            error_log("Database Connection Error: " . $e->getMessage());
            die("Database connection failed. Please try again later.");
        }
    }

    // Static method to get the single instance of the class
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Method to get the PDO connection object
    public function getConnection() {
        return $this->conn;
    }

    // Prevent cloning and unserialization
    private function __clone() {}
    public function __wakeup() {}
}
?>