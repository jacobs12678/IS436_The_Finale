<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Part of Docker Container ID as hostname (since we don't have a custom hostname)
$host = 'aae7e2834b4e';
$username = "UMBCstudent";       
$password = "bongocat123";  
$dbname = "main_project_db";  

$charset = 'utf8mb4';
// data source name
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
// PDO (PHP Data Objects)
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
?>
