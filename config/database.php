<?php
$host = 'localhost';
$db_name = 'todo_app';
$username = 'root';
$password = '';

$mysqli = new mysqli($host, $username, $password, $db_name);

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}
?>
