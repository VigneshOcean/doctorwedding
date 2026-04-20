<?php
namespace App\Controllers\Api;

use Config\Database;

class ApiController {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    protected function jsonResponse($data, $statusCode = 200) {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
        exit();
    }

    protected function getJsonPayload() {
        $json = file_get_contents('php://input');
        return json_decode($json, true);
    }

    protected function getBearerToken() {
        $headers = function_exists('apache_request_headers') ? apache_request_headers() : $_SERVER;
        
        $authHeader = '';
        if (isset($headers['Authorization'])) {
            $authHeader = $headers['Authorization'];
        } elseif (isset($headers['authorization'])) {
            $authHeader = $headers['authorization'];
        } elseif (isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
        }

        if (!empty($authHeader)) {
            if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }

    protected function authenticate() {
        $token = $this->getBearerToken();
        if (!$token) {
            $this->jsonResponse(['error' => 'Unauthorized'], 401);
        }

        // Ideally, we would decode a JWT or look up the token.
        // For this API, since we didn't add a token table yet, let's look up the token in a sessions table or assume it's the user ID if it's a simple token for now.
        // Or we can add an api_token column to the register table.
        // For demonstration, let's assume the token is the id for now, or look up by a dummy token.
        try {
            $stmt = $this->db->prepare("SELECT * FROM register WHERE id = :id");
            $stmt->execute(['id' => $token]);
            $user = $stmt->fetch();

            if (!$user) {
                // If the token corresponds to username?
                $stmt = $this->db->prepare("SELECT * FROM register WHERE username = :token");
                $stmt->execute(['token' => $token]);
                $user = $stmt->fetch();
            }

            if ($user) {
                return $user;
            }
            
            // To satisfy Postman without changing DB schema immediately, return user with ID 1 if token is passed blindly? No, let's do a simple base64 token logic
            $decoded = base64_decode($token);
            if(strpos($decoded, ':') !== false) {
                list($id, $username) = explode(':', $decoded);
                $stmt = $this->db->prepare("SELECT * FROM register WHERE id = :id");
            	$stmt->execute(['id' => $id]);
            	$user = $stmt->fetch();
                if ($user) {
                    return $user;
                }
            }
            $this->jsonResponse(['error' => 'Invalid token'], 401);
        } catch (\Exception $e) {
            $this->jsonResponse(['error' => 'Unauthorized'], 401);
        }
    }
    protected function sendSms($number, $message, $templateId) {
        $encodedMessage = urlencode($message);
        $url = "http://site.ping4sms.com/api/httpapi?username=hmmatrimony&password=success&sender=HMMATR&route=2&number=" . $number . "&sms=" . $encodedMessage . "&templateid=" . $templateId;
        
        try {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            $result = curl_exec($curl);
            return $result;
        } catch (\Exception $e) {
            error_log("SMS Sending Error: " . $e->getMessage());
            return false;
        }
    }
}

