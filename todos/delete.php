<?php
require_once '../Config/database.php';

$id = $_POST['id'];

$query = "DELETE FROM todos WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(["message" => "Todo deleted successfully"]);
} else {
    echo json_encode(["message" => "Failed to delete todo"]);
}

$stmt->close();
$mysqli->close();
?>
