<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        if (isset($_GET['id'])) {
            require 'todos/read_single.php';
        } else {
            require 'todos/read.php';
        }
        break;
    case 'POST':
        if (isset($_GET['action']) && $_GET['action'] == 'create') {
            require 'todos/create.php';
        } elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
            require 'todos/update.php';
        } elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
            require 'todos/delete.php';
        }
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
?>

