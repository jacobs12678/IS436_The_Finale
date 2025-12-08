<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $conn = new mysqli('db', 'UMBCstudent', 'bongocat123', 'main_project_db');

  if ($conn->connect_error) {
    die("Connection failed: " . htmlspecialchars($conn->connect_error));
  }

  if ($_POST["username"] != "" && $_POST["password"] != "") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = $conn->query("SELECT username, user_password FROM loginsign");

    if ($query->num_rows > 0) {
      while($row = $query->fetch_assoc()) {
        echo "username: " . $row["username"]. " - password: " . $row["user_password"] . "<br>";
      }
    }

  } else {
    echo "Login Failed. Please Try Again";
    echo "<p><a href='login.php'>Login Page</a></p>";
  }

  

}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UMBC Lost & Found Login Page</title>
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

    <!--Login Form-->
    <h4>Login</h4>
    <form id="login" method="POST">
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <div>
            <div>
                <input type="checkbox" id="rememberMe">
                <label for="rememberMe">Remember me</label>
            </div>
            <a href="#" class="text-decoration-none">Forgot Password?</a>
        </div>
        <button type="submit">Login</button>
    </form>

</body>
</html>
