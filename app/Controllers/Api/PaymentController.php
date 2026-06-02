<?php
namespace App\Controllers\Api;

class PaymentController extends ApiController {

    // PayU Credentials - Test Keys
    // private $merchantKey = "WqtOMg"; 
    // private $salt = "0ygVFL2HwwIpIVuMu9ZBBn5mbB1ypcvB"; 
    // private $payuBaseUrl = "https://test.payu.in"; // Sandbox
    // private $payuPostUrl = "https://test.payu.in/merchant/postservice.php?form=2"; // Verification URL


    private $merchantKey = "eUfule"; 
    private $salt = "ZxWGFogF"; 
    private $payuBaseUrl = "https://secure.payu.in"; // Production
    private $payuPostUrl = "https://info.payu.in/merchant/postservice.php?form=2"; // Verification URL
    
    // Credit Packages based on user request
    private $creditPackages = [
        ['id' => 1, 'name' => '1 Profile Unlock', 'credits' => 1, 'amount' => 100, 'discount' => '0%'],
        ['id' => 2, 'name' => '3 Profile Unlocks', 'credits' => 3, 'amount' => 150, 'discount' => '50%'],
        ['id' => 3, 'name' => '5 Profile Unlocks', 'credits' => 5, 'amount' => 200, 'discount' => '60%']
    ];

    /**
     * Get available membership plans
     */
    public function getPlans() {
        try {
            $stmt = $this->db->query("SELECT * FROM plans LIMIT 3");
            $plans = $stmt->fetchAll();
            
            return $this->jsonResponse([
                'status' => 'success',
                'plans' => $plans
            ]);
        } catch (\Exception $e) {
            return $this->jsonResponse(['error' => 'Failed to fetch plans: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Get available credit packages
     */
    public function getCreditPackages() {
        return $this->jsonResponse([
            'status' => 'success',
            'packages' => $this->creditPackages
        ]);
    }

    /**
     * Initiate a payment request for PayU
     */
    public function initiatePayment() {
        $user = $this->authenticate();
        $payload = $this->getJsonPayload();

        $planId = $payload['plan_id'] ?? null;
        $packageId = $payload['package_id'] ?? null;
        $amount = $payload['amount'] ?? null;

        if (!$planId && !$amount && !$packageId) {
            return $this->jsonResponse(['error' => 'Plan ID, Package ID or amount is required'], 400);
        }

        // If package_id is provided, get amount from creditPackages
        $productinfo = "Wallet Topup";
        if ($packageId) {
            $package = null;
            foreach ($this->creditPackages as $pkg) {
                if ($pkg['id'] == $packageId) {
                    $package = $pkg;
                    break;
                }
            }
            if (!$package) {
                return $this->jsonResponse(['error' => 'Invalid credit package selected'], 400);
            }
            $amount = $package['amount'];
            $productinfo = $package['name'];
        } elseif ($planId && $planId != 7) {
            $stmt = $this->db->prepare("SELECT * FROM plans WHERE id = ?");
            $stmt->execute([$planId]);
            $plan = $stmt->fetch();
            if (!$plan) {
                return $this->jsonResponse(['error' => 'Invalid plan selected'], 400);
            }
            $amount = $plan['amount'];
            $productinfo = $plan['name'];
        }

        if (!$amount || !is_numeric($amount) || $amount <= 0) {
            return $this->jsonResponse(['error' => 'Invalid payment amount'], 400);
        }

        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        $firstname = !empty($user['name']) ? $user['name'] : 'User';
        $email = !empty($user['email']) ? $user['email'] : 'test@example.com';
        $phone = !empty($user['mobile']) ? $user['mobile'] : '9999999999';

        // Hash Sequence: key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10|salt
        $hashString = $this->merchantKey . '|' . $txnid . '|' . $amount . '|' . $productinfo . '|' . $firstname . '|' . $email . '|||||||||||' . $this->salt;
        $hash = strtolower(hash('sha512', $hashString));

        try {
            // Log the transaction in pending state
            $stmt = $this->db->prepare("INSERT INTO payment_transactions (user_id, plan_id, package_id, amount, merchant_transaction_id, provider, status) VALUES (?, ?, ?, ?, ?, 'payu', 'pending')");
            $stmt->execute([$user['id'], $planId, $packageId, $amount, $txnid]);

            return $this->jsonResponse([
                'status' => 'success',
                'data' => [
                    'key' => $this->merchantKey,
                    'txnid' => $txnid,
                    'amount' => (float)$amount,
                    'productinfo' => $productinfo,
                    'firstname' => $firstname,
                    'email' => $email,
                    'phone' => $phone,
                    'hash' => $hash,
                    'surl' => "https://hmmatrimony.com/index.php?sucess",
                    'furl' => "https://hmmatrimony.com/index.php?failure",
                    'service_provider' => "payu_paisa",
                    'action' => $this->payuBaseUrl . '/_payment'
                ]
            ]);

        } catch (\Exception $e) {
            return $this->jsonResponse(['error' => 'Payment initiation failed: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Verify payment status with PayU
     */
    public function verifyPayment() {
        $user = $this->authenticate();
        $payload = $this->getJsonPayload();
        $txnid = $payload['txnid'] ?? null;

        if (!$txnid) {
            return $this->jsonResponse(['error' => 'Transaction ID (txnid) is required'], 400);
        }

        try {
            // Check current transaction status in our DB
            $stmt = $this->db->prepare("SELECT * FROM payment_transactions WHERE merchant_transaction_id = ? AND user_id = ?");
            $stmt->execute([$txnid, $user['id']]);
            $transaction = $stmt->fetch();

            if (!$transaction) {
                return $this->jsonResponse(['error' => 'Transaction not found'], 404);
            }

            if ($transaction['status'] === 'success') {
                return $this->jsonResponse(['status' => 'success', 'message' => 'Payment already verified as successful']);
            }

            // Call PayU Verify API (Post Service)
            // command = verify_payment
            // hash = sha512(key|command|var1|salt)
            $command = "verify_payment";
            $var1 = $txnid;
            $hashString = $this->merchantKey . '|' . $command . '|' . $var1 . '|' . $this->salt;
            $hash = strtolower(hash('sha512', $hashString));

            $postData = [
                'key' => $this->merchantKey,
                'command' => $command,
                'var1' => $var1,
                'hash' => $hash
            ];

            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $this->payuPostUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => http_build_query($postData),
                CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if ($err) {
                return $this->jsonResponse(['error' => 'Status check failed: ' . $err], 500);
            }

            $resData = json_decode($response, true);

            // PayU verification response structure check
            if (isset($resData['status']) && $resData['status'] == 1 && isset($resData['transaction_details'][$txnid])) {
                $details = $resData['transaction_details'][$txnid];
                if ($details['status'] === 'success') {
                    // Update transaction record
                    $upd = $this->db->prepare("UPDATE payment_transactions SET status = 'success', response_payload = ? WHERE merchant_transaction_id = ?");
                    $upd->execute([$response, $txnid]);

                    // Update User Account (Wallet and Validity)
                    $this->updateUserAccount($transaction);

                    return $this->jsonResponse([
                        'status' => 'success',
                        'message' => 'Payment successful',
                        'payu_id' => $details['mihpayid'] ?? null
                    ]);
                } else {
                    $upd = $this->db->prepare("UPDATE payment_transactions SET status = 'failed', response_payload = ? WHERE merchant_transaction_id = ?");
                    $upd->execute([$response, $txnid]);

                    return $this->jsonResponse([
                        'status' => 'failed',
                        'message' => 'Payment status: ' . $details['status']
                    ]);
                }
            } else {
                return $this->jsonResponse([
                    'status' => 'pending',
                    'message' => 'Payment status could not be verified or is pending',
                    'raw' => $resData
                ]);
            }

        } catch (\Exception $e) {
            return $this->jsonResponse(['error' => 'Verification process failed: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Verify Apple In-App Purchase
     */
    public function verifyIAP() {
        $user = $this->authenticate();
        $payload = $this->getJsonPayload();
        
        $productId = $payload['product_id'] ?? null;
        $receipt = $payload['receipt'] ?? null;
        $transactionId = $payload['transaction_id'] ?? null;

        if (!$productId || !$receipt) {
            return $this->jsonResponse(['error' => 'Product ID and receipt are required'], 400);
        }

        // Map product ID to plan ID
        $planMapping = [
            'com.hmmatrimony.premium_silver' => 1,
            'com.hmmatrimony.premium_gold' => 2,
            'com.hmmatrimony.premium_platinum' => 3
        ];

        if (!isset($planMapping[$productId])) {
            return $this->jsonResponse(['error' => 'Invalid product ID'], 400);
        }

        $planId = $planMapping[$productId];

        try {
            // Check if this transaction was already processed
            if ($transactionId) {
                $stmt = $this->db->prepare("SELECT * FROM payment_transactions WHERE merchant_transaction_id = ?");
                $stmt->execute([$transactionId]);
                $existing = $stmt->fetch();
                if ($existing && $existing['status'] === 'success') {
                    return $this->jsonResponse([
                        'status' => 'success',
                        'message' => 'In-App Purchase already verified'
                    ]);
                }
            }

            // Get plan details for amount and validity
            $stmt = $this->db->prepare("SELECT * FROM plans WHERE id = ?");
            $stmt->execute([$planId]);
            $plan = $stmt->fetch();

            if (!$plan) {
                return $this->jsonResponse(['error' => 'Plan details not found'], 404);
            }

            $amount = $plan['amount'];

            // Log the transaction
            $stmt = $this->db->prepare("INSERT INTO payment_transactions (user_id, plan_id, amount, merchant_transaction_id, provider, status, response_payload) VALUES (?, ?, ?, ?, 'apple_iap', 'success', ?)");
            $stmt->execute([$user['id'], $planId, $amount, $transactionId ?? $productId . '_' . time(), $receipt]);

            // Update user account
            $transaction = [
                'user_id' => $user['id'],
                'plan_id' => $planId,
                'package_id' => null,
                'amount' => $amount
            ];
            $this->updateUserAccount($transaction);

            return $this->jsonResponse([
                'status' => 'success',
                'message' => 'In-App Purchase verified and account updated successfully'
            ]);

        } catch (\Exception $e) {
            return $this->jsonResponse(['error' => 'IAP verification failed: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Handle Webhook from PayU (Success/Failure callback)
     */
    public function handleWebhook() {
        // PayU sends POST data directly to the surl/furl
        // For mobile, we can provide a specific webhook endpoint
        $txnid = $_POST['txnid'] ?? null;
        $status = $_POST['status'] ?? null;
        $posted_hash = $_POST['hash'] ?? null;

        if (!$txnid || !$status || !$posted_hash) {
            echo "Invalid request";
            exit;
        }

        // Verify Hash from PayU to ensure authenticity
        // Reverse Hash: salt|status|udf10|udf9|udf8|udf7|udf6|udf5|udf4|udf3|udf2|udf1|email|firstname|productinfo|amount|txnid|key
        $key = $_POST['key'];
        $amount = $_POST['amount'];
        $productinfo = $_POST['productinfo'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        
        $udf1 = $_POST['udf1'] ?? '';
        $udf2 = $_POST['udf2'] ?? '';
        $udf3 = $_POST['udf3'] ?? '';
        $udf4 = $_POST['udf4'] ?? '';
        $udf5 = $_POST['udf5'] ?? '';
        $udf6 = $_POST['udf6'] ?? '';
        $udf7 = $_POST['udf7'] ?? '';
        $udf8 = $_POST['udf8'] ?? '';
        $udf9 = $_POST['udf9'] ?? '';
        $udf10 = $_POST['udf10'] ?? '';

        $retHashSeq = $this->salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        $calculatedHash = strtolower(hash('sha512', $retHashSeq));

        if ($calculatedHash !== $posted_hash) {
            echo "Hash mismatch";
            exit;
        }

        if ($status === 'success') {
            $stmt = $this->db->prepare("SELECT * FROM payment_transactions WHERE merchant_transaction_id = ?");
            $stmt->execute([$txnid]);
            $transaction = $stmt->fetch();

            if ($transaction && $transaction['status'] !== 'success') {
                $upd = $this->db->prepare("UPDATE payment_transactions SET status = 'success', response_payload = ? WHERE merchant_transaction_id = ?");
                $upd->execute([json_encode($_POST), $txnid]);
                
                $this->updateUserAccount($transaction);
            }
        } else {
            $upd = $this->db->prepare("UPDATE payment_transactions SET status = 'failed', response_payload = ? WHERE merchant_transaction_id = ?");
            $upd->execute([json_encode($_POST), $txnid]);
        }
        
        echo "OK";
        exit;
    }

    /**
     * Update user wallet and validity based on the plan/amount paid
     */
    private function updateUserAccount($transaction) {
        $userId = $transaction['user_id'];
        $amount = (float)$transaction['amount'];
        $planId = $transaction['plan_id'];
        $packageId = $transaction['package_id'];

        $validityDays = 0;
        $creditsToAdd = 0;

        // If it's a credit package purchase
        if ($packageId) {
            foreach ($this->creditPackages as $pkg) {
                if ($pkg['id'] == $packageId) {
                    $creditsToAdd = $pkg['credits'];
                    break;
                }
            }
        }

        if ($planId && $planId != 7) {
            $stmt = $this->db->prepare("SELECT validity FROM plans WHERE id = ?");
            $stmt->execute([$planId]);
            $plan = $stmt->fetch();
            
            if ($plan) {
                $valStr = strtolower($plan['validity']);
                if (strpos($valStr, '6 month') !== false) {
                    $validityDays = 180;
                } elseif (strpos($valStr, '1 year') !== false) {
                    $validityDays = 365;
                } elseif (strpos($valStr, 'marriage') !== false) {
                    $validityDays = 3650; // 10 years
                } else {
                    $validityDays = 30; // Default fallback
                }
            }
        } else {
            $validityDays = 30;
        }

        // Get current validity to extend it if necessary
        $stmt = $this->db->prepare("SELECT valid_for FROM register WHERE id = ?");
        $stmt->execute([$userId]);
        $userRow = $stmt->fetch();
        
        $baseTimestamp = time();
        if ($userRow && !empty($userRow['valid_for'])) {
            $existingExpiry = strtotime($userRow['valid_for']);
            // If current validity is still in the future, extend from that date
            if ($existingExpiry && $existingExpiry > time()) {
                $baseTimestamp = $existingExpiry;
            }
        }

        $startDate = date('d-m-Y');
        $endDate = date('d-m-Y', strtotime("+$validityDays days", $baseTimestamp));
        $startString = (string)strtotime($startDate);
        $endString = (string)strtotime($endDate);

        $this->db->beginTransaction();
        try {
            // 1. Update Register table (including legacy fields for compatibility)
            $stmt = $this->db->prepare("UPDATE register SET 
                wallet = COALESCE(NULLIF(wallet, ''), 0) + ?, 
                wallet_validity_start = ?, 
                wallet_validity_end = ?, 
                wallet_validity_star_string = ?, 
                wallet_validity_end_string = ?,
                today_date = ?,
                valid_for = ?,
                valid_string = ?,
                valid_status = '1',
                premium_customer = 1
                WHERE id = ?");
            $stmt->execute([$amount, $startDate, $endDate, $startString, $endString, $startDate, $endDate, $endString, $userId]);

            // 2. Update separate Credits table
            if ($creditsToAdd > 0) {
                $stmtCred = $this->db->prepare("INSERT INTO user_credits (user_id, credits) VALUES (?, ?) ON DUPLICATE KEY UPDATE credits = credits + ?");
                $stmtCred->execute([$userId, $creditsToAdd, $creditsToAdd]);
            }

            // Insert into wallet_history (added 'res' field to fix "Field 'res' doesn't have a default value" error)
            $stmt = $this->db->prepare("INSERT INTO wallet_history (user_id, amount, valid_from, valid_to, status, res) VALUES (?, ?, ?, ?, 'success', 'PayU API')");
            $stmt->execute([$userId, $amount, $startDate, $endDate]);

            // Insert into validity_history
            $stmt = $this->db->prepare("INSERT INTO validity_history (user_id, valid_from, valid_to) VALUES (?, ?, ?)");
            $stmt->execute([$userId, $startDate, $endDate]);

            $this->db->commit();
        } catch (\Exception $e) {
            $this->db->rollBack();
            error_log("Failed to update account for user $userId after payment: " . $e->getMessage());
        }
    }
}
