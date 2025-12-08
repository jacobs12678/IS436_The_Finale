<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $conn = new mysqli('db', 'UMBCstudent', 'bongocat123', 'main_project_db');

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if ($_POST["username"] != "" && $_POST["password"] != "") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = $conn->query("SELECT username, user_password FROM loginsign");

    if ($query->num_rows > 0) {
      while($row = $query->fetch_assoc()) {
        if ($username == $row["username"] && $password == $row["user_password"]) {
          $_SESSION["username"] = $username;
          $_SESSION["logged"] = true;
          header('Location: index.php');
          exit();
        }

      }
  
      $signup_page = "Username or password does not exist. Try again or please sign up.";

    } else {
      $just_nothing = "Nothing added to the table";
    }

  } else {
    $login_failed = "Login Failed. Please Try Again";
  }

  $conn->close();

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
</nav>

  <!--Login Form-->
<div class="row login-box">

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

        <button type="submit">Login</button>
    </form>

    <form id="signup" method="POST" action="signup.php">
        <h5><br><br>Don't have an account? Sign up below:</h5>
        <button type="submit">Sign Up</button>
    </form>

</div>

<style>

.login-box {
    margin: 20px auto;
    width: 400px;
    text-align: center;
    border: 2px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    background-color: gold;
}


.login-box input {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #aaa;
    border-radius: 5px;
}


.login-box button {
    width: 100%;
    padding: 10px;
    border: none;
    background-color: gray;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

.login-box button:hover {
    background-color: green;
}
</style>

</body>
</html>

<?php

if(!empty($signup_page)) {
  echo $signup_page;
  echo "<p><a href='signup.php'>Sign Up</a></p>";
}

if(!empty($just_nothing)) {
  echo $just_nothing;
  echo "<p><a href='login.php'>Login Page</a></p>";
}

if(!empty($login_failed)) {
  echo $login_failed;
  echo "<p><a href='login.php'>Login Page</a></p>";
}
?>


