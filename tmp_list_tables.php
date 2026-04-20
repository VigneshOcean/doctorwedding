<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hmmattdk_matrimonialdb";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("DB Connection Failed: " . mysqli_connect_error());
}

echo "Tables in database:" . PHP_EOL;
$res = mysqli_query($con, "SHOW TABLES");
while($row = mysqli_fetch_array($res)) {
    echo $row[0] . PHP_EOL;
}
?>
