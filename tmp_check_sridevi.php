<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hmmattdk_matrimonialdb";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("DB Connection Failed: " . mysqli_connect_error());
}

echo "Checking the two Sridevis found earlier..." . PHP_EOL;
$res = mysqli_query($con, "SELECT id, username, profile_id, name, age, gender FROM register WHERE name = 'Sridevi'");
while($row = mysqli_fetch_assoc($res)) {
    print_r($row);
    echo PHP_EOL;
}
?>
