<?php
include("include/connect.php");
$res = mysqli_query($con, "SELECT gender, uploadedfile FROM register LIMIT 20");
echo "Values in DB:\n";
while($row = mysqli_fetch_assoc($res)) {
    echo "Gender: '{$row['gender']}', Photo: '{$row['uploadedfile']}'\n";
}
?>
