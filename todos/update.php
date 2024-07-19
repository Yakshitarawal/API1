<?php
require_once '../Config/database.php';

$id = $_POST['id'];
$title = $_POST['title'];
$completed = isset($_POST['completed']) ? (int)$_POST['completed'] : 0;

$query = "UPDATE todos SET title = ?, completed = ? WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("sii", $title, $completed, $id);

if ($stmt->execute()) {
    echo json_encode(["id" => $id, "title" => $title, "completed" => (bool)$completed]);
} else {
    echo json_encode(["message" => "Failed to update todo"]);
}

$stmt->close();
$mysqli->close();
?>
