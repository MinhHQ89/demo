<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'demo_basic';
$port = 3333;

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4";    
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>