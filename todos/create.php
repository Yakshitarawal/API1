<?php
require_once '../Config/database.php';

$title = $_POST['title'];
$completed = isset($_POST['completed']) ? (int)$_POST['completed'] : 0;

$query = "INSERT INTO todos (title, completed) VALUES (?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("si", $title, $completed);

if ($stmt->execute()) {
    echo json_encode(["id" => $stmt->insert_id, "title" => $title, "completed" => (bool)$completed]);
} else {
    echo json_encode(["message" => "Failed to create todo"]);
}

$stmt->close();
$mysqli->close();
?>
