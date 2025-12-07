<?php
var_dump($_POST);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('db', 'UMBCstudent', 'bongocat123', 'main_project_db');

    // Fetching variables
    $delete = $_POST["ticketdelete"];

    // Inserting data into database table ticket
    $stmt = $conn->prepare("DELETE FROM ticket WHERE t_id = ?");
    $stmt->bind_param($delete, "sss","sss", "MM-DD-YYYY");
    
    if($stmt->execute()) {
        echo "Data deleted successfully!";
    }
    else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>