<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit();
}
?>

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

<!doctype html>
<html lang="en">
    <head>
        <title> UMBC Lost & Found Home Page </title>

        <!-- Style -->
        <style>
        	h2 {
        	  font-size: 35px;
        	}
        	table, th, td{
        	  text-align: center;
			  padding: 0 24px;
			  margin: 0 24px;
			  font-size: 20px;
        	}
        	.formathead {
        	  color: orange;
        	  font-weight: bold;
        	  text-align: left;
        	  display: flex;
        	  margin: 0 20px;
        	  padding: 0 20px;
        	  font-size: 25px;
        	}
			.centered {
				text-align: center;
			}
			.color {
				text-weight: bold;
				color: orange;
			}
    	</style>
    </head>
    
    <body>
        <!-- The Homepage Title with Other Sections -->
		<h1> WELCOME TO THE LOST & FOUND </h1>
		<p> A place for UMBC members to report and find their missing belongings in a time of crisis.</p>

		<!-- Image -->
		<p class="centered"> <img src="pngwing.com(1).png" alt="main picture" width="500" height="300"> </p>
		<!-- The 4 Links -->
		 <div>
			<div>
				<table>
					<thead>
						<tr>
							<th class="color"> Report <img src="report_icon.jpg" alt="report" width="150" height="150"> </th>
				            
							<th class="color"> Search <img src="search_icon.png" alt="search" width="160" height="160"> </th>
						
							<th class="color"> Find <img src="lost_item_icon.png" alt="lostitem" width="170" height="170"> </th>
							<!-- Ticket needs an image -->
							<th> <a href="forms/admin_dashboard.html" class="color"> Tickets </a></th>
						</tr>
					</thead>
				</table>
		    </div>
		 </div>
    </body>
</html>

