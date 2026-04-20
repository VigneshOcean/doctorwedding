<?php
namespace App\Controllers\Api;

class AuthController extends ApiController {
    public function login() {
        $data = $this->getJsonPayload();
        if (!isset($data['identifier']) || !isset($data['password'])) {
            return $this->jsonResponse(['error' => 'Missing identifier or password'], 400);
        }

        $stmt = $this->db->prepare("SELECT * FROM register WHERE email = :identifier1 OR username = :identifier2 OR mobile = :identifier3");
        $stmt->execute([
            'identifier1' => $data['identifier'],
            'identifier2' => $data['identifier'],
            'identifier3' => $data['identifier']
        ]);
        $user = $stmt->fetch();

        if ($user && $user['password'] == $data['password']) {
            $token = base64_encode($user['id'] . ':' . $user['username']);
            $profileImage = !empty($user['uploadedfile']) ? '/matrimony/profile/' . $user['uploadedfile'] : null;
            return $this->jsonResponse([
                'status' => 'success',
                'message' => 'Login successful',
                'token' => $token,
                'user' => [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'profileImage' => $profileImage
                ]
            ]);
        }

        return $this->jsonResponse(['error' => 'Invalid credentials'], 401);
    }

    public function register() {
        $data = $this->getJsonPayload();
        
        // Basic validation
        $required = ['name', 'mobile', 'gender', 'dob'];
        foreach ($required as $field) {
            if (empty($data[$field])) {
                return $this->jsonResponse(['error' => "Missing required field: $field"], 400);
            }
        }

        // Potential duplicate check (Mirroring save_profile.php concept)
        $name = $data['name'];
        $dob = $data['dob'];
        $fathername = $data['father_name'] ?? '';
        $mother_name = $data['mother_name'] ?? '';

        $stmtCheck = $this->db->prepare("SELECT id FROM register WHERE name = :n AND dob = :d AND fathername = :fn AND mother_name = :mn");
        $stmtCheck->execute([
            'n' => $name,
            'd' => $dob,
            'fn' => $fathername,
            'mn' => $mother_name
        ]);

        if ($stmtCheck->fetch()) {
            return $this->jsonResponse(['error' => 'Profile already registered with these details. Please contact admin.'], 400);
        }

        // Generate 6-digit OTP as per save_profile.php
        $otp = rand(100000, 999999);
        $c_date = date('d/m/Y');
        
        // Map fields from payload to database columns
        $params = [
            'name' => $name,
            'gender' => $data['gender'],
            'profile' => $data['profile'] ?? 'self',
            'refernce' => $data['reference'] ?? 'mobile',
            'dob' => $dob,
            'order_birth' => $data['order_birth'] ?? 0,
            'native_place' => $data['native_place'] ?? '',
            'age' => $data['age'] ?? 0,
            'tob' => $data['tob'] ?? '',
            'p_birth' => $data['p_birth'] ?? '',
            'status1' => $data['marital_status'] ?? '',
            'mobile' => $data['mobile'],
            'email' => $data['email'] ?? '',
            'religion' => $data['religion'] ?? '', 
            'caste' => $data['caste'] ?? '',       
            'star' => $data['star'] ?? '',
            'moonsign' => $data['moonsign'] ?? '',
            'education' => $data['education'] ?? '',
            'edu_det' => $data['education_details'] ?? '',
            'job' => $data['job'] ?? '',
            'job_cmpy' => $data['job_cmpy'] ?? '',
            'job_loc' => $data['job_loc'] ?? '',
            'skin' => $data['skin'] ?? '',
            'height' => $data['height'] ?? '',
            'salary' => $data['salary'] ?? '',
            'address' => $data['address'] ?? '',
            'no_of_brothers' => $data['no_of_brothers'] ?? '',
            'bro_married' => $data['bro_married'] ?? '',
            'no_of_sisters' => $data['no_of_sisters'] ?? '',
            'sis_married' => $data['sis_married'] ?? '',
            'falive' => $data['father_alive'] ?? 'Alive',
            'malive' => $data['mother_alive'] ?? 'Alive',
            'fathername' => $fathername,
            'mother_name' => $mother_name,
            'father_occupation' => $data['father_occupation'] ?? '',
            'mother_occupation' => $data['mother_occupation'] ?? '',
            'self_desc' => $data['self_description'] ?? '',
            'expectation' => $data['expectation'] ?? '',
            'home_type' => $data['home_type'] ?? '',
            'house_type' => $data['house_type'] ?? '',
            'dosam' => $data['dosam'] ?? 'None',
            'self_dosam' => $data['dosam_description'] ?? '',
            'area' => $data['area'] ?? '',
            'password' => '', // Will be generated after OTP verification
            'username' => '', // Will be generated after OTP verification
            'profile_id' => '', // Will be generated after OTP verification
            'status' => '0', // Pending verification
            'otp' => $otp,
            'otp_status' => '0',
            'c_date' => $c_date,
            'wallet' => '0',
            'wallet_validity_start' => '',
            'wallet_validity_end' => '',
            'wallet_validity_star_string' => '',
            'wallet_validity_end_string' => '',
            'uploadedfile' => $data['image_name'] ?? '',
            'horo' => $data['horo_name'] ?? ''
        ];

        $columns = implode(', ', array_keys($params));
        $placeholders = ':' . implode(', :', array_keys($params));
        
        $sql = "INSERT INTO register ($columns) VALUES ($placeholders)";
        $stmt = $this->db->prepare($sql);
        
        try {
            if ($stmt->execute($params)) {
                $reg_id = $this->db->lastInsertId();
                
                // Send OTP SMS as per save_profile.php (Line 134-140)
                $otpMessage = "Happy Marriage Matrimony.Your OTP is :".$otp." Kindly use : www.hmmatrimony.com -HMMATR";
                $this->sendSms($data['mobile'], $otpMessage, "1207162823560830391");
                
                return $this->jsonResponse([
                    'status' => 'success',
                    'message' => 'Registration successful. OTP sent to your mobile.',
                    'reg_id' => $reg_id,
                    'mobile' => $data['mobile'],
                    'otp_simulated' => $otp 
                ]);
            }
        } catch (\Exception $e) {
            return $this->jsonResponse(['error' => 'Registration failed: ' . $e->getMessage()], 500);
        }

        return $this->jsonResponse(['error' => 'Registration failed'], 500);
    }

    public function verifyOtp() {
        $data = $this->getJsonPayload();
        $reg_id = $data['reg_id'] ?? null;
        $otp = $data['otp'] ?? null;

        if (!$reg_id || !$otp) {
            return $this->jsonResponse(['error' => 'Missing registration ID or OTP'], 400);
        }

        $stmt = $this->db->prepare("SELECT * FROM register WHERE id = :id");
        $stmt->execute(['id' => $reg_id]);
        $user = $stmt->fetch();

        if (!$user) {
            return $this->jsonResponse(['error' => 'Profile not found'], 404);
        }

        if ($user['otp'] == $otp) {
            $rand_no = rand(100000, 999999);
            $username = 'HM' . $rand_no;
            $password = (string)rand(10000, 99999); 

            $stmtUpdate = $this->db->prepare("
                UPDATE register 
                SET otp_status = '1', status = '1', username = :username, password = :password, profile_id = :profile_id 
                WHERE id = :id
            ");
            
            $stmtUpdate->execute([
                'username' => $username,
                'password' => $password,
                'profile_id' => $username,
                'id' => $reg_id
            ]);

            // Send Credentials SMS as per save_profile.php (Line 22-28)
            $credMessage = "Thanks for registration with Happy Marriage Matrimony.Username:".$username." and Password: ".$password." -HMMATR";
            $this->sendSms($user['mobile'], $credMessage, "1207162823556605196");

            $token = base64_encode($reg_id . ':' . $username);

            return $this->jsonResponse([
                'status' => 'success',
                'message' => 'Mobile number verified successfully. Credentials sent.',
                'token' => $token,
                'credentials' => [
                    'username' => $username,
                    'password' => $password
                ],
                'user' => [
                    'id' => $reg_id,
                    'name' => $user['name'],
                    'username' => $username
                ]
            ]);
        }

        return $this->jsonResponse(['error' => 'Invalid OTP'], 401);
    }
}
