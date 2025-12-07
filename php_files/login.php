/* 
<?php
session_start();
require 'db.php';
if($SERVER['REQUEST_METHOD'] == 'POST') {
  $username = trim($_POST['username']);
  $password = $_POST['password'];
  $stmt = $pdo->prepare("SELECT * FROM loginsign WHERE username = ?");
  $stmt->execute([$username]);
  $user = $stmt->fetch();
  if($user && password_verify($password, $user['password_hash'])) {
    $_SESSION['ls_id'] = $user['ls_id'];
    $_SESSION['username'] = $user['username'];
    header('Location: lf_homepage.php');
    exit();
  } elseif (!$user) {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO loginsign (ls_t_id, ls_sub_id, user_name, username, password, email) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([1, 1, 'TheChosenOne', $username, $password_hash, $username . '@example.com']);
    $_SESSION['ls_id'] = $pdo->lastInsertId();
    $_SESSION['username'] = $username;
    header('Location: lf_homepage.php');
    exit();
  } else {
    $error = "Invalid login. Please try again!";
  }
}
?>
*/

<html>
  <head>
    <!-- <link rel="stylesheet" href="gradecalc_styles.css"> -->
    <title> The Login Page </title>
  </head>
  <body>
    <h1> Login </h1>
    <form method="post">
      Chosen Ticket (# num): ......
      Chosen Subscription (# num): ......
      First Name: ......
      Username: <input type="text" name="username" pattern="[A-Za-z]{2}[0-9]{5}" required>
      Password: <input type="password" name="password" required><br><br>
      Email: ......
      <button type="submit">Login</button>
    </form>
  
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
  </body>
</html>
