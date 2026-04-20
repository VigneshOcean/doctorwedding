<?php
namespace App\Controllers\Api;

use App\Helpers\AvatarHelper;

class MemberController extends ApiController {
    
    // Helper function to map DB row to the requested API structure
    private function mapMemberData($member) {
        return [
            'id' => (string)$member['id'],
            'userid' => $member['username'] ?? null,
            'name' => $member['name'],
            'age' => (int)$member['age'],
            'gender' => $member['gender'],
            'height' => (string)$member['height'],
            'profession' => (string)$member['job'],
            'education' => (string)$member['education'],
            'education_details' => (string)($member['edu_det'] ?? ''),
            'location' => (string)$member['native_place'],
            'about' => (string)$member['self_desc'],
            'profileImage' => AvatarHelper::getAvatar($member['gender'], '/'),
            'religion' => (string)$member['religion'],
            'horoscopeImage' => !empty($member['horo']) ? '/matrimonyadmin/horo/' . $member['horo'] : null,
            'dateOfBirth' => (string)$member['dob'],
            'timeOfBirth' => (string)$member['tob'],
            'star' => (string)$member['star'],
            'moonsign' => (string)$member['moonsign'],
            'salary' => (string)$member['salary'],
            // Optional fields from join tables
            'likedAt' => isset($member['liked_at']) ? $member['liked_at'] : null,
            'interestStatus' => isset($member['send_interest']) ? ($member['send_interest'] == 'yes' ? 'Accepted' : 'Pending') : null,
            'contactValidUntil' => isset($member['valid_to']) ? $member['valid_to'] : null
        ];
    }

    // Detailed mapping for full profile view
    private function mapDetailedMemberData($profile) {
        return [
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
            'religion_name' => $profile['caste_name'] ?? null,
            'caste_id' => $profile['caste'],
            'caste_name' => $profile['subcaste_name'] ?? null,
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
            ]
        ];
    }

    public function index() {
        $user = $this->authenticate();
        $oppositeGender = (strtolower($user['gender']) == 'male') ? 'female' : 'male';
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 20;
        $offset = ($page - 1) * $limit;

        $currentAge = (int)$user['age'];
        $minAge = $currentAge - 7;
        $maxAge = $currentAge + 7;

        $query = "SELECT id, username, name, age, gender, height, job, education, edu_det, native_place, self_desc, uploadedfile, religion, horo, dob, tob, star, moonsign, salary 
                  FROM register 
                  WHERE LOWER(gender) = :gender 
                  AND status = '1'
                  AND id != :my_id
                  AND id NOT IN (SELECT to_id FROM blocked_users WHERE sender_id = :my_id2)
                  AND id NOT IN (SELECT sender_id FROM blocked_users WHERE to_id = :my_id3)
                  AND id NOT IN (SELECT to_id FROM reported_users WHERE sender_id = :my_id4)";
        
        $params = [
            'gender' => $oppositeGender,
            'min_age' => $minAge,
            'max_age' => $maxAge,
            'my_id' => $user['id'],
            'my_id2' => $user['id'],
            'my_id3' => $user['id'],
            'my_id4' => $user['id']
        ];

        $query .= " AND age >= :min_age AND age <= :max_age";

        // Education constraint from search_result.php
        if (!empty($user['education']) && strtoupper($user['education']) !== 'DOCTOR') {
            $query .= " AND education != 'DOCTOR'";
        }

        // DOB constraint from search_result.php
        if (!empty($user['dob'])) {
            $myDob = $user['dob'];
            $myGender = strtolower($user['gender'] ?? '');
            if ($myGender === 'male') {
                $query .= " AND STR_TO_DATE(REPLACE(dob, '-', '/'), '%d/%m/%Y') >= STR_TO_DATE(REPLACE(:my_dob, '-', '/'), '%d/%m/%Y')";
            } else {
                $query .= " AND STR_TO_DATE(REPLACE(dob, '-', '/'), '%d/%m/%Y') <= STR_TO_DATE(REPLACE(:my_dob, '-', '/'), '%d/%m/%Y')";
            }
            $params['my_dob'] = $myDob;
        }

        $query .= " ORDER BY id DESC LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($query);
        foreach ($params as $key => $val) {
            $stmt->bindValue(':' . $key, $val);
        }
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        
        $members = $stmt->fetchAll();
        $formattedMembers = array_map([$this, 'mapMemberData'], $members);
        
        return $this->jsonResponse(array('members' => $formattedMembers, 'page' => $page, 'limit' => $limit));
    }

    public function show($id) {
        $user = $this->authenticate();
        $myId = $user['id'];

        $stmt = $this->db->prepare("
            SELECT r.*, c.caste as caste_name, s.subcaste as subcaste_name 
            FROM register r 
            LEFT JOIN caste c ON r.religion = c.id 
            LEFT JOIN subcaste s ON r.caste = s.id 
            WHERE r.username = :id1 OR r.id = :id2
        ");
        $stmt->execute(['id1' => $id, 'id2' => $id]);
        $member = $stmt->fetch();

        if ($member) {
            $targetId = $member['id'];

            // Check if liked
            $stmtLike = $this->db->prepare("SELECT 1 FROM likes WHERE sender_id = :s AND to_id = :t LIMIT 1");
            $stmtLike->execute(['s' => $myId, 't' => $targetId]);
            $isLiked = (bool)$stmtLike->fetch();

            // Check if contact unlocked
            $stmtContact = $this->db->prepare("SELECT 1 FROM getcontact_history WHERE sender_id = :s AND to_id = :t AND CURDATE() BETWEEN valid_from AND valid_to LIMIT 1");
            $stmtContact->execute(['s' => $myId, 't' => $targetId]);
            $isContactUnlocked = (bool)$stmtContact->fetch();

            $memberData = $this->mapDetailedMemberData($member);
            $memberData['is_liked'] = $isLiked;
            $memberData['is_contact_unlocked'] = $isContactUnlocked;

            // Mask contact info if not unlocked
            if (!$isContactUnlocked) {
                $memberData['mobile'] = '******';
                $memberData['email'] = '******';
                $memberData['address'] = '******';
            }

            return $this->jsonResponse(array('member' => $memberData));
        }

        return $this->jsonResponse(['error' => 'Member not found'], 404);
    }

    public function search() {
        $user = $this->authenticate();
        $oppositeGender = (strtolower($user['gender']) == 'male') ? 'female' : 'male';

        $query = "SELECT id, username, name, age, gender, height, job, education, edu_det, native_place, self_desc, uploadedfile, religion, horo, dob, tob, star, moonsign, salary 
                  FROM register 
                  WHERE LOWER(gender) = :gender 
                  AND status = '1'
                  AND id != :my_id
                  AND id NOT IN (SELECT to_id FROM blocked_users WHERE sender_id = :my_id2)
                  AND id NOT IN (SELECT sender_id FROM blocked_users WHERE to_id = :my_id3)
                  AND id NOT IN (SELECT to_id FROM reported_users WHERE sender_id = :my_id4)";
        $params = [
            'gender' => $oppositeGender,
            'my_id' => $user['id'],
            'my_id2' => $user['id'],
            'my_id3' => $user['id'],
            'my_id4' => $user['id']
        ];

        if (!empty($_GET['profile_id'])) {
            $query .= " AND (profile_id = :profile_id OR username = :profile_id)";
            $params['profile_id'] = $_GET['profile_id'];
        }

        if (!empty($_GET['religion'])) {
            $query .= " AND religion = :religion";
            $params['religion'] = $_GET['religion'];
        }

        if (!empty($_GET['caste'])) {
            $query .= " AND caste = :caste";
            $params['caste'] = $_GET['caste'];
        }

        if (!empty($_GET['dosam'])) {
            $query .= " AND dosam = :dosam";
            $params['dosam'] = $_GET['dosam'];
        }

        if (!empty($_GET['from_date'])) {
            $query .= " AND c_date >= :from_date";
            $params['from_date'] = $_GET['from_date'];
        }

        if (!empty($_GET['to_date'])) {
            $query .= " AND c_date <= :to_date";
            $params['to_date'] = $_GET['to_date'];
        }

        if (!empty($_GET['location'])) {
            $query .= " AND (native_place LIKE :location OR area LIKE :location)";
            $params['location'] = '%' . $_GET['location'] . '%';
        }

        $currentAge = (int)$user['age'];
        $minAgeLimit = $currentAge - 7;
        $maxAgeLimit = $currentAge + 7;

        $query .= " AND age >= :min_age_limit AND age <= :max_age_limit";
        $params['min_age_limit'] = $minAgeLimit;
        $params['max_age_limit'] = $maxAgeLimit;

        if (!empty($_GET['min_age'])) {
            $query .= " AND age >= :min_age";
            $params['min_age'] = $_GET['min_age'];
        }

        if (!empty($_GET['max_age'])) {
            $query .= " AND age <= :max_age";
            $params['max_age'] = $_GET['max_age'];
        }

        // Education constraint from search_result.php
        if (!empty($user['education']) && strtoupper($user['education']) !== 'DOCTOR') {
            $query .= " AND education != 'DOCTOR'";
        }

        // DOB constraint from search_result.php
        if (!empty($user['dob'])) {
            $myDob = $user['dob'];
            $myGender = strtolower($user['gender'] ?? '');
            if ($myGender === 'male') {
                $query .= " AND STR_TO_DATE(REPLACE(dob, '-', '/'), '%d/%m/%Y') >= STR_TO_DATE(REPLACE(:my_dob, '-', '/'), '%d/%m/%Y')";
            } else {
                $query .= " AND STR_TO_DATE(REPLACE(dob, '-', '/'), '%d/%m/%Y') <= STR_TO_DATE(REPLACE(:my_dob, '-', '/'), '%d/%m/%Y')";
            }
            $params['my_dob'] = $myDob;
        }

        if (!empty($_GET['education']) && strtolower($_GET['education']) !== 'all') {
            $edu = $_GET['education'];
            if (strpos($edu, ',') !== false) {
                $eduArray = explode(',', $edu);
                $placeholders = [];
                foreach ($eduArray as $i => $e) {
                    $key = 'edu_' . $i;
                    $placeholders[] = ':' . $key;
                    $params[$key] = trim($e);
                }
                $query .= " AND education IN (" . implode(',', $placeholders) . ")";
            } else {
                $query .= " AND education = :education";
                $params['education'] = $edu;
            }
        }

        if (!empty($_GET['photo_selection'])) {
            if ($_GET['photo_selection'] === 'with_photo') {
                $query .= " AND uploadedfile != '' AND uploadedfile IS NOT NULL";
            } elseif ($_GET['photo_selection'] === 'without_photo') {
                $query .= " AND (uploadedfile = '' OR uploadedfile IS NULL)";
            }
        }

        if (isset($_GET['isgovt']) && ($_GET['isgovt'] === 'true' || $_GET['isgovt'] === '1')) {
            $query .= " AND govt_job = 'Yes'";
        }

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limitVal = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
        $offset = ($page - 1) * $limitVal;

        $query .= " ORDER BY id DESC LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($query);
        foreach ($params as $key => $val) {
            $stmt->bindValue(':' . $key, $val);
        }
        $stmt->bindValue(':limit', $limitVal, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();

        $members = $stmt->fetchAll();
        
        $formattedMembers = array_map([$this, 'mapMemberData'], $members);

        return $this->jsonResponse(array(
            'members' => $formattedMembers,
            'page' => $page,
            'limit' => $limitVal
        ));
    }

    public function likes() {
        $user = $this->authenticate();
        $id = $user['id'];

        // Members who liked the current user (Who liked me)
        $stmt1 = $this->db->prepare("
            SELECT r.*, l.c_date as liked_at, l.send_interest 
            FROM register r 
            JOIN likes l ON r.id = l.sender_id 
            WHERE l.to_id = :id 
            AND r.id NOT IN (SELECT to_id FROM blocked_users WHERE sender_id = :id2)
            AND r.id NOT IN (SELECT sender_id FROM blocked_users WHERE to_id = :id3)
            AND r.id NOT IN (SELECT to_id FROM reported_users WHERE sender_id = :id4)
            ORDER BY l.id DESC
        ");
        $stmt1->execute(['id' => $id, 'id2' => $id, 'id3' => $id, 'id4' => $id]);
        $whoLikedMe = $stmt1->fetchAll();
        
        // Members current user liked (I liked)
        $stmt2 = $this->db->prepare("
            SELECT r.*, l.c_date as liked_at, l.send_interest 
            FROM register r 
            JOIN likes l ON r.id = l.to_id 
            WHERE l.sender_id = :id 
            AND r.id NOT IN (SELECT to_id FROM blocked_users WHERE sender_id = :id2)
            AND r.id NOT IN (SELECT sender_id FROM blocked_users WHERE to_id = :id3)
            AND r.id NOT IN (SELECT to_id FROM reported_users WHERE sender_id = :id4)
            ORDER BY l.id DESC
        ");
        $stmt2->execute(['id' => $id, 'id2' => $id, 'id3' => $id, 'id4' => $id]);
        $iLiked = $stmt2->fetchAll();

        return $this->jsonResponse(array(
            'who_liked_me' => array_map([$this, 'mapMemberData'], $whoLikedMe),
            'i_liked' => array_map([$this, 'mapMemberData'], $iLiked)
        ));
    }

    public function shortlist() {
        $user = $this->authenticate();
        $id = $user['id'];

        // Members the current user liked (current user is sender_id) - based on like_response.php
        $stmt = $this->db->prepare("
            SELECT r.*, l.c_date as liked_at, l.send_interest 
            FROM register r 
            JOIN likes l ON r.id = l.to_id 
            WHERE l.sender_id = :id 
            AND r.id NOT IN (SELECT to_id FROM blocked_users WHERE sender_id = :id2)
            AND r.id NOT IN (SELECT sender_id FROM blocked_users WHERE to_id = :id3)
            AND r.id NOT IN (SELECT to_id FROM reported_users WHERE sender_id = :id4)
            ORDER BY l.id DESC
        ");
        $stmt->execute(['id' => $id, 'id2' => $id, 'id3' => $id, 'id4' => $id]);
        $members = $stmt->fetchAll();
        
        $formattedMembers = array_map([$this, 'mapMemberData'], $members);
        return $this->jsonResponse(array('members' => $formattedMembers));
    }

    public function contacts() {
        $user = $this->authenticate();
        $id = $user['id'];

        // Members whose contact the current user unlocked - based on get_contact_history.php
        $stmt = $this->db->prepare("
            SELECT r.*, g.c_date as unlocked_at, g.valid_to 
            FROM register r 
            JOIN getcontact_history g ON r.id = g.to_id 
            WHERE g.sender_id = :id 
            AND CURDATE() BETWEEN g.valid_from AND g.valid_to 
            AND r.id NOT IN (SELECT to_id FROM blocked_users WHERE sender_id = :id2)
            AND r.id NOT IN (SELECT sender_id FROM blocked_users WHERE to_id = :id3)
            AND r.id NOT IN (SELECT to_id FROM reported_users WHERE sender_id = :id4)
            ORDER BY g.id DESC
        ");
        $stmt->execute(['id' => $id, 'id2' => $id, 'id3' => $id, 'id4' => $id]);
        $members = $stmt->fetchAll();
        
        $formattedMembers = array_map([$this, 'mapMemberData'], $members);
        return $this->jsonResponse(array('members' => $formattedMembers));
    }

    public function toggleLike($id) {
        $user = $this->authenticate();
        $senderId = $user['id'];

        // Resolve numeric ID if username was provided
        $stmtMember = $this->db->prepare("SELECT id FROM register WHERE id = :id1 OR username = :id2");
        $stmtMember->execute(['id1' => $id, 'id2' => $id]);
        $target = $stmtMember->fetch();

        if (!$target) {
            return $this->jsonResponse(['error' => 'Member not found'], 404);
        }
        $targetId = $target['id'];

        // Check if already liked
        $stmt = $this->db->prepare("SELECT id FROM likes WHERE sender_id = :s AND to_id = :t");
        $stmt->execute(['s' => $senderId, 't' => $targetId]);
        $existing = $stmt->fetch();

        if ($existing) {
            // Unlike
            $del = $this->db->prepare("DELETE FROM likes WHERE sender_id = :s AND to_id = :t");
            $del->execute(['s' => $senderId, 't' => $targetId]);
            return $this->jsonResponse(['status' => 'success', 'message' => 'Profile unliked', 'liked' => false]);
        } else {
            // Like
            $c_date = date('Y-m-d');
            date_default_timezone_set('Asia/Kolkata');
            $c_time = date('H:i:s A');
            $ip = $_SERVER['REMOTE_ADDR'];

            $ins = $this->db->prepare("INSERT INTO likes (sender_id, to_id, c_date, c_time, ip_add) VALUES (:s, :t, :d, :tm, :ip)");
            $ins->execute(['s' => $senderId, 't' => $targetId, 'd' => $c_date, 'tm' => $c_time, 'ip' => $ip]);
            
            return $this->jsonResponse(['status' => 'success', 'message' => 'Profile liked', 'liked' => true]);
        }
    }

    public function unlockContact() {
        $user = $this->authenticate();
        $senderId = $user['id'];
        $payload = $this->getJsonPayload();
        
        $idOrUsername = $payload['target_id'] ?? null;
        if (!$idOrUsername) {
            return $this->jsonResponse(['error' => 'Target member ID required'], 400);
        }

        // Resolve numeric targetId
        $stmtMember = $this->db->prepare("SELECT id FROM register WHERE id = :id1 OR username = :id2");
        $stmtMember->execute(['id1' => $idOrUsername, 'id2' => $idOrUsername]);
        $targetRecord = $stmtMember->fetch();
        if (!$targetRecord) {
            return $this->jsonResponse(['error' => 'Member not found'], 404);
        }
        $targetId = $targetRecord['id'];

        // Fetch user wallet and target education cost
        $stmt = $this->db->prepare("
            SELECT r.wallet, target.education, e.cost 
            FROM register r 
            CROSS JOIN register target ON target.id = :t 
            LEFT JOIN education e ON target.education = e.education
            WHERE r.id = :s
        ");
        $stmt->execute(['s' => $senderId, 't' => $targetId]);
        $data = $stmt->fetch();

        if (!$data) {
            return $this->jsonResponse(['error' => 'Data not found'], 404);
        }

        $wallet = (float)$data['wallet'];
        $cost = (float)$data['cost'];

        if ($wallet < $cost) {
            return $this->jsonResponse(['error' => 'Insufficient balance. Contact cost: ' . $cost], 402);
        }

        // Proceed with unlock
        $c_date = date('Y-m-d');
        $valid_to = date("Y-m-d", strtotime(" +1 months"));
        date_default_timezone_set('Asia/Kolkata');
        $c_time = date('H:i:s A');
        $ip = $_SERVER['REMOTE_ADDR'];

        $this->db->beginTransaction();
        try {
            // Insert history
            $ins = $this->db->prepare("INSERT INTO getcontact_history (sender_id, to_id, c_date, c_time, ip_add, cost, valid_from, valid_to) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $ins->execute([$senderId, $targetId, $c_date, $c_time, $ip, $cost, $c_date, $valid_to]);

            // Deduct balance
            $upd = $this->db->prepare("UPDATE register SET wallet = wallet - ? WHERE id = ?");
            $upd->execute([$cost, $senderId]);

            $this->db->commit();
            
            // Fetch the unlocked contact details
            $memberStmt = $this->db->prepare("SELECT mobile, email, address FROM register WHERE id = ?");
            $memberStmt->execute([$targetId]);
            $contact = $memberStmt->fetch();

            return $this->jsonResponse([
                'status' => 'success', 
                'message' => 'Contact unlocked successfully',
                'contact' => $contact
            ]);
        } catch (\Exception $e) {
            $this->db->rollBack();
            return $this->jsonResponse(['error' => 'Transaction failed: ' . $e->getMessage()], 500);
        }
    }

    public function notifyMarriage() {
        $user = $this->authenticate();
        $senderId = $user['id'];
        $payload = $this->getJsonPayload();
        
        $targetIdOrUsername = $payload['target_id'] ?? null;
        $targetId = null;

        if ($targetIdOrUsername) {
            // Resolve numeric targetId
            $stmtMember = $this->db->prepare("SELECT id FROM register WHERE id = :id1 OR username = :id2");
            $stmtMember->execute(['id1' => $targetIdOrUsername, 'id2' => $targetIdOrUsername]);
            $targetRecord = $stmtMember->fetch();
            $targetId = $targetRecord ? $targetRecord['id'] : null;
        }

        $ip = $_SERVER['REMOTE_ADDR'];

        $stmt = $this->db->prepare("INSERT INTO marriage_notification (sender_id, to_id, ip_addr) VALUES (?, ?, ?)");
        if ($stmt->execute([$senderId, $targetId, $ip])) {
            return $this->jsonResponse(['status' => 'success', 'message' => 'Notification received. Admin will verify and update']);
        }

        return $this->jsonResponse(['error' => 'Failed to send notification'], 500);
    }

    public function block($id) {
        $user = $this->authenticate();
        $senderId = $user['id'];

        // Resolve numeric ID
        $stmtMember = $this->db->prepare("SELECT id FROM register WHERE id = :id1 OR username = :id2");
        $stmtMember->execute(['id1' => $id, 'id2' => $id]);
        $target = $stmtMember->fetch();

        if (!$target) {
            return $this->jsonResponse(['error' => 'Member not found'], 404);
        }
        $targetId = $target['id'];

        if ($senderId == $targetId) {
            return $this->jsonResponse(['error' => 'You cannot block yourself'], 400);
        }

        // Check if already blocked
        $stmt = $this->db->prepare("SELECT id FROM blocked_users WHERE sender_id = :s AND to_id = :t");
        $stmt->execute(['s' => $senderId, 't' => $targetId]);
        $existing = $stmt->fetch();

        if ($existing) {
            // Unblock
            $del = $this->db->prepare("DELETE FROM blocked_users WHERE sender_id = :s AND to_id = :t");
            $del->execute(['s' => $senderId, 't' => $targetId]);
            return $this->jsonResponse(['status' => 'success', 'message' => 'Profile unblocked', 'blocked' => false]);
        } else {
            // Block
            $c_date = date('Y-m-d');
            date_default_timezone_set('Asia/Kolkata');
            $c_time = date('H:i:s A');
            $ip = $_SERVER['REMOTE_ADDR'];

            $ins = $this->db->prepare("INSERT INTO blocked_users (sender_id, to_id, c_date, c_time, ip_add) VALUES (:s, :t, :d, :tm, :ip)");
            $ins->execute(['s' => $senderId, 't' => $targetId, 'd' => $c_date, 'tm' => $c_time, 'ip' => $ip]);
            
            return $this->jsonResponse(['status' => 'success', 'message' => 'Profile blocked', 'blocked' => true]);
        }
    }

    public function report($id) {
        $user = $this->authenticate();
        $senderId = $user['id'];
        $payload = $this->getJsonPayload();
        $reason = $payload['reason'] ?? 'No reason provided';

        // Resolve numeric ID
        $stmtMember = $this->db->prepare("SELECT id FROM register WHERE id = :id1 OR username = :id2");
        $stmtMember->execute(['id1' => $id, 'id2' => $id]);
        $target = $stmtMember->fetch();

        if (!$target) {
            return $this->jsonResponse(['error' => 'Member not found'], 404);
        }
        $targetId = $target['id'];

        if ($senderId == $targetId) {
            return $this->jsonResponse(['error' => 'You cannot report yourself'], 400);
        }

        $c_date = date('Y-m-d');
        date_default_timezone_set('Asia/Kolkata');
        $c_time = date('H:i:s A');
        $ip = $_SERVER['REMOTE_ADDR'];

        $ins = $this->db->prepare("INSERT INTO reported_users (sender_id, to_id, reason, c_date, c_time, ip_add) VALUES (:s, :t, :r, :d, :tm, :ip)");
        $ins->execute(['s' => $senderId, 't' => $targetId, 'r' => $reason, 'd' => $c_date, 'tm' => $c_time, 'ip' => $ip]);
        
        return $this->jsonResponse(['status' => 'success', 'message' => 'User reported successfully']);
    }
}
