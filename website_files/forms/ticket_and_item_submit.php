<?php
var_dump($_POST);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('db', 'UMBCstudent', 'bongocat123', 'main_project_db');

    // Fetching variables
    $confirm = $_POST["confirmation"];
    $t_type = $_POST["tickettype"];
    $submit_date = $_POST["submitdate"];

    // Inserting data into database table ticket
    $stmt = $conn->prepare("INSERT INTO ticket (confirmation, ticket_type, submitted) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $blogcontent, $submit_date);
    
    if($stmt->execute()) {
        echo "Data inserted successfully!";
    }
    else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>