<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'demo_basic';
$port = 3333;

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>