<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hmmattdk_matrimonialdb";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("DB Connection Failed: " . mysqli_connect_error());
}

$target_name = "Sridevi";
echo "Searching for '$target_name' in 'name' column..." . PHP_EOL;

$query = "SELECT id, username, profile_id, name, status FROM register WHERE name LIKE '%$target_name%'";
$res = mysqli_query($con, $query);
if($res && mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)) {
        print_r($row);
        echo PHP_EOL;
    }
} else {
    echo "No match for name '$target_name' in the local database." . PHP_EOL;
    
    // Check total count
    $count_res = mysqli_query($con, "SELECT COUNT(*) FROM register");
    $count = mysqli_fetch_array($count_res)[0];
    echo "Total records in 'register' table: $count" . PHP_EOL;
}
?>
