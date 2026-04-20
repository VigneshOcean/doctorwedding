<?php
include("../include/connect.php");
$res = mysqli_query($con, "SELECT * FROM register LIMIT 5");
while($row = mysqli_fetch_assoc($res)) {
    print_r($row);
    echo "\n-------------------\n";
}
?>