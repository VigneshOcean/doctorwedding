<?php
namespace App\Controllers\Api;

use App\Helpers\AvatarHelper;

class ProfileController extends ApiController {
    public function me() {
        $user = $this->authenticate();
        $id = $user['id'];

        // Fetch detailed profile with caste and religion names
        $stmt = $this->db->prepare("
            SELECT r.*, c.caste as caste_name, s.subcaste as subcaste_name 
            FROM register r 
            LEFT JOIN caste c ON r.religion = c.id 
            LEFT JOIN subcaste s ON r.caste = s.id 
            WHERE r.id = :id
        ");
        $stmt->execute(['id' => $id]);
        $profile = $stmt->fetch();

        if (!$profile) {
            return $this->jsonResponse(['error' => 'Profile not found'], 404);
        }

        // Clean up internal fields
        unset($profile['password']);

        // Structured response for Mobile App
        $data = [
            'userid' => $profile['username'],
            'name' => $profile['name'],
            'mobile' => $profile['mobile'],
            'email' => $profile['email'],
            'dob' => $profile['dob'],
            'tob' => $profile['tob'],
            'age' => $profile['age'],
            'gender' => $profile['gender'],
            'marital_status' => $profile['status1'],
            'p_birth' => $profile['p_birth'],
            'area' => $profile['area'],
            'address' => $profile['address'],
            'home_type' => $profile['home_type'],
            'house_type' => $profile['house_type'],
            'religion_id' => $profile['religion'],
            'religion_name' => $profile['caste_name'],
            'caste_id' => $profile['caste'],
            'caste_name' => $profile['subcaste_name'],
            'star' => $profile['star'],
            'moonsign' => $profile['moonsign'],
            'education' => $profile['education'],
            'education_details' => $profile['edu_det'],
            'job' => $profile['job'],
            'job_cmpy' => $profile['job_cmpy'],
            'job_loc' => $profile['job_loc'],
            'salary' => $profile['salary'],
            'father_name' => $profile['fathername'],
            'father_occupation' => $profile['father_occupation'],
            'father_alive' => $profile['falive'],
            'mother_name' => $profile['mother_name'],
            'mother_occupation' => $profile['mother_occupation'],
            'mother_alive' => $profile['malive'],
            'no_of_brothers' => $profile['no_of_brothers'],
            'no_of_sisters' => $profile['no_of_sisters'],
            'bro_married' => $profile['bro_married'],
            'sis_married' => $profile['sis_married'],
            'skin' => $profile['skin'],
            'height' => $profile['height'],
            'self_desc' => $profile['self_desc'],
            'expectation' => $profile['expectation'],
            'dosam' => $profile['dosam'],
            'self_dosam' => $profile['self_dosam'],
            'profile_image' => AvatarHelper::getAvatar($profile['gender'], '/'),
            'profile_image_2' => null,
            'horoscope_image' => !empty($profile['horo']) ? '/matrimonyadmin/horo/' . $profile['horo'] : null,
            'raasi_grid' => [
                'r1' => $profile['r1'], 'r2' => $profile['r2'], 'r3' => $profile['r3'], 'r4' => $profile['r4'],
                'r5' => $profile['r5'], 'r6' => $profile['r6'], 'r7' => $profile['r7'], 'r8' => $profile['r8'],
                'r9' => $profile['r9'], 'r10' => $profile['r10'], 'r11' => $profile['r11'], 'r12' => $profile['r12']
            ],
            'wallet' => $profile['wallet'],
            'balance' => $profile['wallet'],
            'contactValidUntil' => $profile['valid_for']
        ];

        return $this->jsonResponse(array('profile' => $data));
    }

    public function update() {
        $user = $this->authenticate();
        $payload = $this->getJsonPayload();

        if (empty($payload)) {
            return $this->jsonResponse(['error' => 'No data provided'], 400);
        }

        // Map API keys to DB columns
        $mapping = [
            'name' => 'name',
            'mobile' => 'mobile',
            'email' => 'email',
            'dob' => 'dob',
            'tob' => 'tob',
            'age' => 'age',
            'gender' => 'gender',
            'marital_status' => 'status1',
            'p_birth' => 'p_birth',
            'area' => 'area',
            'address' => 'address',
            'home_type' => 'home_type',
            'house_type' => 'house_type',
            'religion_id' => 'religion',
            'caste_id' => 'caste',
            'star' => 'star',
            'moonsign' => 'moonsign',
            'education' => 'education',
            'education_details' => 'edu_det',
            'job' => 'job',
            'job_cmpy' => 'job_cmpy',
            'job_loc' => 'job_loc',
            'salary' => 'salary',
            'father_name' => 'fathername',
            'father_occupation' => 'father_occupation',
            'father_alive' => 'falive',
            'mother_name' => 'mother_name',
            'mother_occupation' => 'mother_occupation',
            'mother_alive' => 'malive',
            'no_of_brothers' => 'no_of_brothers',
            'no_of_sisters' => 'no_of_sisters',
            'bro_married' => 'bro_married',
            'sis_married' => 'sis_married',
            'skin' => 'skin',
            'height' => 'height',
            'self_desc' => 'self_desc',
            'expectation' => 'expectation',
            'dosam' => 'dosam',
            'self_dosam' => 'self_dosam'
        ];

        $updates = [];
        $params = ['id' => $user['id']];

        foreach ($mapping as $apiKey => $dbCol) {
            if (isset($payload[$apiKey])) {
                $updates[] = "$dbCol = :$apiKey";
                $params[$apiKey] = $payload[$apiKey];
            }
        }

        if (isset($payload['raasi_grid']) && is_array($payload['raasi_grid'])) {
            for ($i = 1; $i <= 12; $i++) {
                $key = "r$i";
                if (isset($payload['raasi_grid'][$key])) {
                    $updates[] = "$key = :$key";
                    $params[$key] = $payload['raasi_grid'][$key];
                }
            }
        }

        if (empty($updates)) {
            return $this->jsonResponse(['error' => 'No valid fields to update'], 400);
        }

        $query = "UPDATE register SET " . implode(', ', $updates) . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        if ($stmt->execute($params)) {
            return $this->jsonResponse(['status' => 'success', 'message' => 'Profile updated successfully']);
        }

        return $this->jsonResponse(['error' => 'Failed to update profile'], 500);
    }

    public function uploadImage() {
        $user = $this->authenticate();

        if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            return $this->jsonResponse(['error' => 'No file uploaded or upload error'], 400);
        }

        $file = $_FILES['file'];
        // Use absolute path relative to the root of the project
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/profile/';
        
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = time() . '_' . basename($file['name']);
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            $stmt = $this->db->prepare("UPDATE register SET uploadedfile = :file WHERE id = :id");
            $stmt->execute([
                'file' => $fileName,
                'id' => $user['id']
            ]);

            return $this->jsonResponse([
                'status' => 'success',
                'message' => 'Image uploaded successfully',
                'image_url' => '/profile/' . $fileName
            ]);
        }

        return $this->jsonResponse([
            'error' => 'Failed to move uploaded file',
            'target_dir' => $uploadDir,
            'is_writable' => is_writable($uploadDir)
        ], 500);
    }

    public function uploadHoroscope() {
        $user = $this->authenticate();

        if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            return $this->jsonResponse(['error' => 'No file uploaded or upload error'], 400);
        }

        $file = $_FILES['file'];
        // Use absolute path relative to the root of the project for horoscope folder
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/matrimonyadmin/horo/';
        
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = time() . '_' . basename($file['name']);
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            $stmt = $this->db->prepare("UPDATE register SET horo = :file WHERE id = :id");
            $stmt->execute([
                'file' => $fileName,
                'id' => $user['id']
            ]);

            return $this->jsonResponse([
                'status' => 'success',
                'message' => 'Horoscope uploaded successfully',
                'image_url' => '/matrimonyadmin/horo/' . $fileName
            ]);
        }

        return $this->jsonResponse([
            'error' => 'Failed to move uploaded file',
            'target_dir' => $uploadDir,
            'is_writable' => is_writable($uploadDir)
        ], 500);
    }

    public function deleteAccount() {
        $user = $this->authenticate();
        $id = $user['id'];

        // We can either do a hard delete or a soft delete.
        // Given the requirement "permanently deleted within 15 days", 
        // we'll set the status to '0' (inactive) and record the deletion request date.
        
        $c_date = date('Y-m-d');
        $stmt = $this->db->prepare("UPDATE register SET status = '0', delete_requested_at = :d WHERE id = :id");
        
        try {
            if ($stmt->execute(['d' => $c_date, 'id' => $id])) {
                return $this->jsonResponse(['status' => 'success', 'message' => 'Account deletion request submitted. Your account will be permanently deleted within 7 days.']);
            }
        } catch (\PDOException $e) {
            // If delete_requested_at column doesn't exist, just update status
            $stmt = $this->db->prepare("UPDATE register SET status = '0' WHERE id = :id");
            if ($stmt->execute(['id' => $id])) {
                return $this->jsonResponse(['status' => 'success', 'message' => 'Account deactivated and scheduled for deletion.']);
            }
        }

        return $this->jsonResponse(['error' => 'Failed to delete account'], 500);
    }
}
