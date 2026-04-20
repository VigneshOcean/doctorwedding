<?php
if (!ini_get('date.timezone')) {
    date_default_timezone_set('Asia/Kolkata'); // Correct timezone
}

include("include/connect.php");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

echo 'Cron Ran at ' . date("Y-m-d H:i:s") . "\n";

$date = date("d-m-Y");
$curr_date = strtotime($date . "-1 days");

$sql = "SELECT * FROM register WHERE valid_for != ''";
$result = mysqli_query($con, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $valid_for = strtotime($row['valid_for']);
        $valid_string = $row['valid_string'] + 86400; // Adding 1 day (in seconds)
        $u_id = $row['id'];

        if ($curr_date > $valid_string) {
            $update_sql = "UPDATE register 
                           SET today_date = '', valid_for = '', valid_string = '', valid_status = '' 
                           WHERE id = ?";
            $stmt = mysqli_prepare($con, $update_sql);
            mysqli_stmt_bind_param($stmt, "i", $u_id);
            
            if (mysqli_stmt_execute($stmt)) {
                echo "Profile updated for ID: $u_id\n";
            } else {
                echo "Error updating profile for ID: $u_id - " . mysqli_error($con) . "\n";
            }

            mysqli_stmt_close($stmt);
        }
    }
} else {
    echo "Error fetching data: " . mysqli_error($con);
}

mysqli_close($con);
?>