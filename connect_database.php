<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'demo_basic';
$port = 3333;

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    
    $conn = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>