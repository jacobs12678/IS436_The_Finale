<?php
// COMPLETE NO CHANGE!
$servername = "db"; // Same name from docker-compose.yml here! (DON'T CHANGE!!!)
$username = "UMBCstudent";
$password = "bongocat123";
$database = "main_project_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to the database";
?>