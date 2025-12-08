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
      </div>
    </div>
  </div>
</nav>

    <div class="row" style="margin-top: 10px; text-align: center;">
        <h2>Your lost item has been successfully reported! <br><br></h2>
        <a href=""><img src="pngwing.com.png" width="400" height="400" alt="ticket submit success"></a>
    </div>

</body>
</html>

<?php

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
    echo "<div class='text-center mt-3'>
        <a href='report_dashboard.html' class='btn btn-success btn-lg'>View Reported Item in Dashboard!</a>
      </div>";

    echo "<div class='text-center mt-3'>
        <a href='/index.php' class='btn btn-primary btn-lg'>Go back to homepage</a>
      </div>";

    }
    else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>