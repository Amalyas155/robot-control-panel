<?php

// Copy this file as db.php, then replace the values with your real database details.
$host = "sqlXXX.infinityfree.com";
$user = "if0_XXXXXXXX";
$pass = "YOUR_MYSQL_PASSWORD";
$dbname = "if0_XXXXXXXX_robot_control";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode([
        "status" => "error",
        "message" => "Database connection failed"
    ]));
}

$conn->set_charset("utf8mb4");
?>
