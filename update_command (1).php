<?php
header('Content-Type: application/json; charset=utf-8');

include "db.php";

$map = [
    "forward"  => "f",
    "backward" => "b",
    "left"     => "l",
    "right"    => "r",
    "stop"     => "s"
];

$button = strtolower(trim($_POST["command"] ?? ""));
$voiceText = trim($_POST["voice_text"] ?? "");

if ($voiceText === "" && $button !== "") {
    $voiceText = $button;
}

if ($button === "" && $voiceText !== "") {
    $stmt = $conn->prepare(
        "UPDATE robot_state SET voice_text = ? WHERE id = 1"
    );
    $stmt->bind_param("s", $voiceText);
    $stmt->execute();

    echo json_encode([
        "status" => "success",
        "recognized" => false,
        "voice_text" => $voiceText
    ], JSON_UNESCAPED_UNICODE);

    $stmt->close();
    $conn->close();
    exit;
}

if (!array_key_exists($button, $map)) {
    echo json_encode([
        "status" => "error",
        "message" => "Unknown command"
    ], JSON_UNESCAPED_UNICODE);

    $conn->close();
    exit;
}

$letter = $map[$button];

$stmt = $conn->prepare(
    "UPDATE robot_state
     SET command = ?, voice_text = ?
     WHERE id = 1"
);

$stmt->bind_param("ss", $letter, $voiceText);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "recognized" => true,
        "button" => $button,
        "stored_as" => $letter,
        "voice_text" => $voiceText
    ], JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "The table could not be updated"
    ], JSON_UNESCAPED_UNICODE);
}

$stmt->close();
$conn->close();
?>
