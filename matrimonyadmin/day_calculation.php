<?php
include("../include/connect.php");
error_reporting(0);
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 15000);
session_start();
if(!isset($_SESSION['id'])){
    echo "<script type='text/javascript'>window.location='index.php?err';</script>";
} else {
    function get_age($birth_date) {
        if (empty($birth_date)) return 0;
        try {
            $dob = new DateTime($birth_date);
            $now = new DateTime();
            $diff = $now->diff($dob);
            return $diff->y;
        } catch (Exception $e) {
            return 0;
        }
    }
    $mani1 = mysqli_query($con, "SELECT id, dob FROM register WHERE dob != ''");
    while($row_mani1 = mysqli_fetch_array($mani1)){
        $d_id = $row_mani1['id'];
        $ddb = trim($row_mani1['dob']);
        $agge1 = '';
        if (strpos($ddb, '/') !== false) {
            $ddb1 = explode('/', $ddb);
            if (count($ddb1) == 3) {
                // Assuming DD/MM/YYYY
                $agge1 = $ddb1[2].'-'.$ddb1[1].'-'.$ddb1[0];
            }
        } elseif (strpos($ddb, '-') !== false) {
            $ddb1 = explode('-', $ddb);
            if (count($ddb1) == 3) {
                if (strlen($ddb1[0]) == 4) { // YYYY-MM-DD
                    $agge1 = $ddb;
                } else { // DD-MM-YYYY
                    $agge1 = $ddb1[2].'-'.$ddb1[1].'-'.$ddb1[0];
                }
            }
        }
        if (!empty($agge1)) {
            $aa = get_age($agge1);
            mysqli_query($con, "UPDATE register SET age='$aa' WHERE id='$d_id'");
        }
    }
    echo "<script type='text/javascript'>alert('Age Updated Successfully!');window.location='home.php';</script>";
}
?>