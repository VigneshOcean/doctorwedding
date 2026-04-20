<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hmmattdk_matrimonialdb";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("DB Connection Failed: " . mysqli_connect_error());
}

$target_num = "544806";
$query = "SELECT id, username, profile_id, name, status FROM register WHERE username LIKE '%$target_num%' OR profile_id LIKE '%$target_num%' OR id = '$target_num'";
echo "Searching for $target_num in key columns..." . PHP_EOL;

$res = mysqli_query($con, $query);
if($res && mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)) {
        print_r($row);
        echo PHP_EOL;
    }
} else {
    echo "No match for numbers $target_num." . PHP_EOL;
}

echo PHP_EOL . "Searching for profiles with HM prefix..." . PHP_EOL;
$res2 = mysqli_query($con, "SELECT id, username, name FROM register WHERE username LIKE 'HM%' ORDER BY id DESC LIMIT 10");
while($row2 = mysqli_fetch_assoc($res2)) {
    print_r($row2);
    echo PHP_EOL;
}
?>
