<?php
include("include/connect.php");
$res = mysqli_query($con, "SELECT DISTINCT gender FROM register");
while($row = mysqli_fetch_assoc($res)) {
    echo $row['gender'] . "\n";
}
?>
