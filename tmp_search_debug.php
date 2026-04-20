<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hmmattdk_matrimonialdb";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("DB Connection Failed: " . mysqli_connect_error());
}

$target_id = "HM544806";
$res = mysqli_query($con, "SELECT * FROM register LIMIT 1");
if($res) {
    $columns = mysqli_fetch_fields($res);
    $column_names = [];
    foreach($columns as $col) {
        $column_names[] = $col->name;
    }
    
    echo "Columns: " . implode(", ", $column_names) . PHP_EOL . PHP_EOL;
    
    $where_parts = [];
    foreach($column_names as $col) {
        $search_val = mysqli_real_escape_string($con, $target_id);
        $where_parts[] = "$col LIKE '%$search_val%'";
    }
    
    $query = "SELECT * FROM register WHERE " . implode(" OR ", $where_parts);
    echo "Running Query: $query " . PHP_EOL . PHP_EOL;
    
    $search_res = mysqli_query($con, $query);
    if(mysqli_num_rows($search_res) > 0) {
        while($row = mysqli_fetch_assoc($search_res)) {
            echo "Found Profile: " . PHP_EOL;
            print_r($row);
            echo PHP_EOL . "---" . PHP_EOL;
        }
    } else {
        echo "No profile found with $target_id in ANY column." . PHP_EOL;
        
        // Show last 5 registered users
        echo PHP_EOL . "Last 5 users:" . PHP_EOL;
        $last_users = mysqli_query($con, "SELECT id, username, profile_id, name FROM register ORDER BY id DESC LIMIT 5");
        while($lrow = mysqli_fetch_assoc($last_users)) {
            print_r($lrow);
            echo PHP_EOL;
        }
    }
} else {
    echo "Error describing table: " . mysqli_error($con);
}
?>
