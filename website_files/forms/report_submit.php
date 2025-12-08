<?php
var_dump($_POST);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('db', 'UMBCstudent', 'bongocat123', 'main_project_db');

    // Fetching variables
    $item_n = $_POST["nitem"];
    $item_loc = $_POST["itemloc"];
    $item_t = $_POST["itemtype"];
    $item_d = $_POST["itemdesc"];
    $registry = $_POST["rdate"];

    // Inserting data into database table ticket
    $stmt = $conn->prepare("INSERT INTO submitlog (item_name, item_location, item_type, item_desc, registered_item) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $item_n, $item_loc, $item_t, $item_d, $registry);
    
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