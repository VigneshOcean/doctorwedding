<?php
include("include/connect.php");
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', '1');
ini_set('error_log', dirname(__FILE__).'/php_error.log');

$command = isset($_POST['command']) ? $_POST['command'] : '';

if ($command == "register") {
    // LOG TABLE STRUCTURE ONCE TO DEBUG DIFF BETWEEN LOCAL AND LIVE
    $res = mysqli_query($con, "DESCRIBE register");
    $cols = [];
    while($row = mysqli_fetch_assoc($res)) { $cols[] = $row['Field'] . "(" . $row['Type'] . ")"; }
    error_log("LIVE TABLE STRUCTURE: " . implode(", ", $cols));

    try {
        // Sanitize and collect all POST data
        $name = mysqli_real_escape_string($con, $_POST['name'] ?? '');
        $rad_gen = mysqli_real_escape_string($con, $_POST['gender_type'] ?? '');
        $profile = mysqli_real_escape_string($con, $_POST['profile'] ?? '');
        $refernce = mysqli_real_escape_string($con, $_POST['refernce'] ?? '');
        $dob = mysqli_real_escape_string($con, $_POST['dob'] ?? '');
        $age = mysqli_real_escape_string($con, $_POST['age'] ?? '');
        $tob = mysqli_real_escape_string($con, $_POST['birthtime'] ?? '');
        $p_birth = mysqli_real_escape_string($con, $_POST['p_birth'] ?? '');
        $status1 = mysqli_real_escape_string($con, $_POST['status1'] ?? '');
        $house_type = mysqli_real_escape_string($con, $_POST['house_type'] ?? '');
        $mobile = mysqli_real_escape_string($con, $_POST['mobile'] ?? '');
        $email = mysqli_real_escape_string($con, $_POST['email'] ?? '');
        $religion = mysqli_real_escape_string($con, $_POST['religion'] ?? '');
        $caste = mysqli_real_escape_string($con, $_POST['caste'] ?? '');
        $star = mysqli_real_escape_string($con, $_POST['star'] ?? '');
        $moonsign = mysqli_real_escape_string($con, $_POST['moonsign'] ?? '');
        $education = mysqli_real_escape_string($con, $_POST['education'] ?? '');
        $edu_det = mysqli_real_escape_string($con, $_POST['edu_det'] ?? '');
        $job = mysqli_real_escape_string($con, $_POST['job'] ?? '');
        $job_cmpy = mysqli_real_escape_string($con, $_POST['job_cmpy'] ?? '');
        $job_loc = mysqli_real_escape_string($con, $_POST['job_loc'] ?? '');
        $skin = mysqli_real_escape_string($con, $_POST['skin'] ?? '');
        $height = mysqli_real_escape_string($con, $_POST['height'] ?? '');
        $salary = mysqli_real_escape_string($con, $_POST['salary'] ?? '');
        $address = mysqli_real_escape_string($con, $_POST['address'] ?? '');
        $no_of_brothers = mysqli_real_escape_string($con, $_POST['no_of_brothers'] ?? '');
        $bro_married = mysqli_real_escape_string($con, $_POST['bro_married'] ?? '');
        $no_of_sisters = mysqli_real_escape_string($con, $_POST['no_of_sisters'] ?? '');
        $sis_married = mysqli_real_escape_string($con, $_POST['sis_married'] ?? '');
        $falive = mysqli_real_escape_string($con, $_POST['falive'] ?? '');
        $malive = mysqli_real_escape_string($con, $_POST['malive'] ?? '');
        $fathername = mysqli_real_escape_string($con, $_POST['fathername'] ?? '');
        $mother_name = mysqli_real_escape_string($con, $_POST['mother_name'] ?? '');
        $father_occupation = mysqli_real_escape_string($con, $_POST['father_occupation'] ?? '');
        $mother_occupation = mysqli_real_escape_string($con, $_POST['mother_occupation'] ?? '');
        $self_desc = mysqli_real_escape_string($con, $_POST['self_desc'] ?? '');
        $expectation = mysqli_real_escape_string($con, $_POST['expectation'] ?? '');
        $home_type = mysqli_real_escape_string($con, $_POST['home_type'] ?? '');
        $dosam = mysqli_real_escape_string($con, $_POST['dosam'] ?? '');
        $self_dosam = mysqli_real_escape_string($con, $_POST['self_dosam'] ?? '');
        $area = mysqli_real_escape_string($con, $_POST['area'] ?? '');

        $random_no = rand(1000000, 9999999);
        $profile_id = "DW" . $random_no; 
        
        $uploaded_files = "";
        $file = $_FILES['uploadedfile']['name'] ?? '';
        if (!empty($file)) {
            $target_path = "profile/";
            if (!is_dir($target_path)) {
                mkdir($target_path, 0777, true);
            }
            $uploaded_files = $random_no . "_" . $file;
            move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path . $uploaded_files);
        }
        
        $c_date = date("d/m/Y");

        // Duplicate check
        $find = mysqli_query($con, "SELECT id FROM register WHERE name='$name' AND dob='$dob' AND fathername='$fathername' AND mother_name='$mother_name' LIMIT 1");
        if ($find && mysqli_num_rows($find) > 0) {
            echo "<script>alert('Already Registered Profile. Kindly use login.'); window.location='register.php';</script>";
            exit;
        }

        // DYNAMICALY BUILD INSERT QUERY TO AVOID SCHEMA MISMATCH
        $data = [
            'name' => $name, 'gender' => $rad_gen, 'profile' => $profile, 'refernce' => $refernce,
            'dob' => $dob, 'age' => $age, 'tob' => $tob, 'p_birth' => $p_birth, 'status1' => $status1,
            'house_type' => $house_type, 'mobile' => $mobile, 'email' => $email, 'religion' => $religion,
            'caste' => $caste, 'star' => $star, 'moonsign' => $moonsign, 'education' => $education,
            'edu_det' => $edu_det, 'job' => $job, 'job_cmpy' => $job_cmpy, 'job_loc' => $job_loc,
            'skin' => $skin, 'height' => $height, 'salary' => $salary, 'address' => $address,
            'no_of_brothers' => $no_of_brothers, 'bro_married' => $bro_married, 'no_of_sisters' => $no_of_sisters,
            'sis_married' => $sis_married, 'falive' => $falive, 'malive' => $malive, 'fathername' => $fathername,
            'mother_name' => $mother_name, 'father_occupation' => $father_occupation, 'mother_occupation' => $mother_occupation,
            'self_desc' => $self_desc, 'expectation' => $expectation, 'home_type' => $home_type,
            'uploadedfile' => $uploaded_files, 'c_date' => $c_date, 'status' => '0', 'dosam' => $dosam,
            'self_dosam' => $self_dosam, 'profile_id' => $profile_id, 'area' => $area
        ];

        // Filter data based on actual columns in the table
        $table_cols_res = mysqli_query($con, "SHOW COLUMNS FROM register");
        $table_cols = [];
        while($c = mysqli_fetch_assoc($table_cols_res)) { $table_cols[] = $c['Field']; }
        
        $final_data = [];
        foreach($data as $key => $val) {
            if (in_array($key, $table_cols)) { $final_data[$key] = "'$val'"; }
        }
        
        // Add defaults for required columns that were missing
        $required_missing = [
            'wallet_validity_start' => "''", 'wallet_validity_end' => "''",
            'wallet_validity_star_string' => "''", 'wallet_validity_end_string' => "''",
            'wallet' => "'0'", 'login_status' => "0", 'otp_status' => "0", 
            'print_count' => "0", 'premium_customer' => "0", 'govt_job' => "'No'"
        ];
        foreach($required_missing as $key => $val) {
            if (in_array($key, $table_cols) && !isset($final_data[$key])) {
                $final_data[$key] = $val;
            }
        }

        $fields = implode(", ", array_keys($final_data));
        $values = implode(", ", array_values($final_data));
        $query = "INSERT INTO register ($fields) VALUES ($values)";

        if (!mysqli_query($con, $query)) {
            $error = mysqli_error($con);
            error_log("DB INSERT ERROR: " . $error);
            die("Database Error: " . $error);
        }

        // Success Alert and Redirect
        // Store user info in session for auto-filling payment form
        $_SESSION['reg_name'] = $_POST['name'] ?? '';
        $_SESSION['reg_email'] = $_POST['email'] ?? '';
        $_SESSION['reg_mobile'] = $_POST['mobile'] ?? '';

        echo "<script>alert('Thank you for your Registration. Your Profile ID is $profile_id'); window.location='plans.php';</script>";
        exit;
    } catch (Exception $e) {
        error_log("PHP EXCEPTION: " . $e->getMessage());
        die("An error occurred: " . $e->getMessage());
    }

} elseif ($command == 'mail_form') {
    $name = mysqli_real_escape_string($con, $_POST['name'] ?? '');
    $email = mysqli_real_escape_string($con, $_POST['email'] ?? '');
    $mobile = mysqli_real_escape_string($con, $_POST['mobile'] ?? '');
    $msg = mysqli_real_escape_string($con, $_POST['msg'] ?? '');
    $c_date = date('d-m-Y');
    mysqli_query($con, "INSERT INTO contact(name,email,mobile,msg,c_date) VALUES ('$name','$email','$mobile','$msg','$c_date')");
    echo "<script>alert('Enquiry Submitted Successfully.'); window.location='contact.php';</script>";
}
?>
