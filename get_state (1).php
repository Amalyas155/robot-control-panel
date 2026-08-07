<?php
header('Content-Type: application/json; charset=utf-8');

include "db.php";

$result = $conn->query(
    "SELECT command, voice_text, updated_at
     FROM robot_state
     WHERE id = 1"
);

if ($result && $row = $result->fetch_assoc()) {
    echo json_encode($row, JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Robot data was not found"
    ], JSON_UNESCAPED_UNICODE);
}

$conn->close();
?>
