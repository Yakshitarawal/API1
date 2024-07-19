<?php
require_once '../Config/database.php';

$query = "SELECT * FROM todos";
$result = $mysqli->query($query);

$todos = [];

while ($row = $result->fetch_assoc()) {
    $row['completed'] = (bool)$row['completed'];
    $todos[] = $row;
}

echo json_encode($todos);

$result->close();
$mysqli->close();
?>
