<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('db', 'UMBCstudent', 'bongocat123', 'main_project_db');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_POST["name"] != "" && $_POST["email"] != "" && $_POST["username"] != "" && $_POST["password"] != "") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $insert = "INSERT INTO loginsign (ls_t_id, ls_sub_id, user_name, username, user_password, email) VALUES (1, 1, '$name', '$username', '$password', '$email')";
        $duplicate = $conn->query("SELECT user_name, username, user_password, email FROM loginsign");
        
        $exists = false;

       if ($duplicate->num_rows > 0) {
            while($row = $duplicate->fetch_assoc()) {
                if ($name == $row["user_name"] && $username == $row["username"] && $password == $row["user_password"] && $email == $row["email"]) {
                    $copy = "<br> Name/Username/Password/Email Already exists!";
                    $exists = true;
                    break;
                }
            }
            
            if (!$exists) {
                if ($conn->query($insert) === TRUE) {
                    $insert_success = "<br>Account created successfully!";
                } else {
                    echo "Error: " . $insert . "<br>" . $conn->error;
                }
            }
       }

    } else {
        $signup_failed = "Sign Up Failed. Please Try Again";
    }
        
    $conn->close();
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UMBC Lost & Found Sign Up</title>
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

  <!--Sign Up Form-->
  <div class="row signup-box">
  <h4>Create Your Account!</h4>
  <form id="signup" method="POST">
      <div class="mb-3">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" required>
      </div>

      <div class="mb-3">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" placeholder="Enter your email" required>
      </div>

      <div class="mb-3">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Enter your username" required>
      </div>

      <div class="mb-3">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>

      <button type="submit">Create</button>
  </form>

<style>

.signup-box {
    margin: 20px auto;
    width: 400px;
    text-align: center;
    border: 2px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    background-color: gold;
}


.signup-box input {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #aaa;
    border-radius: 5px;
}


.signup-box button {
    width: 100%;
    padding: 10px;
    border: none;
    background-color: gray;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

.signup-box button:hover {
    background-color: green;
}
</style>

</body>
</html>

<div style="text-align: center;">
<?php

if(!empty($signup_failed)) {
    echo $signup_failed;
    echo "<p><a href='login.php'>Login</a></p>";
}

if (!empty($insert_success)) {
    echo $insert_success;
    echo "<br>";
    echo "Please go back to the login page!";
    echo "<p><a href='login.php'>Login</a></p>";
}

if(!empty($copy)) {
    echo $copy;
}

?>
</div>