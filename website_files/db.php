<?php
$servername = getenv('DB_HOST'); // For Render to be compatible with to access the database
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