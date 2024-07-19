<?php
require_once '../Config/database.php';

$id = $_GET['id'];

$query = "SELECT * FROM todos WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $row['completed'] = (bool)$row['completed'];
        echo json_encode($row);
    } else {
        echo json_encode(["message" => "Todo not found"]);
    }
} else {
    echo json_encode(["message" => "Failed to fetch todo"]);
}

$stmt->close();
$mysqli->close();
?>
