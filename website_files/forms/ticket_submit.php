<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UMBC Lost & Found Ticket Submission</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="https://umbc.edu/wp-content/uploads/2022/02/umbc-primary-logo-250x58.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
            <a class="nav-link" href="/index.php">Return to homepage</a>
      </div>
    </div>
  </div>
</nav>

    <div class="row" style="margin-top: 10px; text-align: center;">
        <h2>Your ticket has been successfully recorded! <br><br></h2>
        <a href=""><img src="pngwing.com.png" width="400" height="400" alt="ticket submit success"></a>
    </div>

</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('db', 'UMBCstudent', 'bongocat123', 'main_project_db');

    // Fetching variables
    $confirm = $_POST["confirmation"];
    $t_type = $_POST["tickettype"];
    $submit_date = $_POST["submitdate"];

    // Inserting data into database table ticket
    $stmt = $conn->prepare("INSERT INTO ticket (confirmation, ticket_type, submitted) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $confirm, $t_type, $submit_date);
    
    if($stmt->execute()) {
        echo "<div class='text-center mt-3'>
        <a href='admin_dashboard.html' class='btn btn-success btn-lg'>View Ticket in Admin Dashboard!</a>
      </div>";

        echo "<div class='text-center mt-3'>
        <a href='dashboard.html' class='btn btn-primary btn-lg'>Submit Another Ticket</a>
      </div>";
    }
    else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>