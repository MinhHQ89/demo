<?php
$host = 'localhost';
$user = 'root';
$password = '@Root123456789';
$database = 'demo_basic';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>