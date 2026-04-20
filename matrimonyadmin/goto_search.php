<?php

include("../include/connect.php");

$goto=$_POST['goto'];

$command=$_POST['command'];

echo "<script type='text/javascript'>window.location.href='$command?page=$goto';</script>";



?>