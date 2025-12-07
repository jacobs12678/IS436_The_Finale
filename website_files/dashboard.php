<?php
// Checks if user is logged in; otherwise, redirects user to login page
session_start();
require 'db.php'; 
if (!isset($SESSION['ls_id']))  { header('Location: loginsign.php'); exit(); }

$sql = $pdo->query('SELECT * FROM loginsign');
$users = $sql->fetchAll();
?>

<html>
    <head>
        <title> The Admin Dashboard </title>
        <script>
            // Validating form data
            function validate() {
                let valid1 = confirm("Are you sure you want to delete this user's ticket?");
                return valid1;
            }
            function validate() {
                let valid2 = confirm("Do you really want to LOGOUT!?");
                return valid2;
            }
        </script>
        <!-- Style -->
        <style>
        	h2 {
        	  font-size: 35px;
        	}
        	table, th td{
        	  text-align: center;
        	  margin: auto;
        	  border: 0.5px solid;
        	}
        	th {
        	  background-color: black;
        	  color: white;
        	  padding: 24px;
        	}
        	td {
        	  background-color: #777;
        	  color: white;
        	  padding: 16px;
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
    	</style>
    </head>
    
    <body>
        <h1> Admin Dashboard </h1>
        <!-- Upper Section -->
        <div class="formathead">
            <div> User Database </div>
            <div class="formathead"> Tickets </div>
            <!-- Image -->
            <div class="formathead"> 
                <img class="designborder" src="icons/pngwing.com(2).png" alt="border" width="100" height="100"> 
            </div>
        </div>
        <!-- The Dashboard -->
        <div>
            <div>
                <table>
                    <!-- Data Headers -->
                    <tr>
                        <th> Confirmations </th>
                        <th> Type </th>
                        <th> Date of Submitted </th>
                    </tr>
                    <!-- Data Body -->
                    <?php foreach ($users as $ticket): ?>
                    <tr>
                        <td> <?= htmlspecialchars($ticket['confirmation']) ?> </td>
                        <td> <?= htmlspecialchars($ticket['type']) ?> </td>
                        <td> <?= htmlspecialchars($ticket['submitted']) ?> </td>
                        <td> 
                            <!-- Form for deleting the tickets -->
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <!-- Maybe add a button/form to add new ticket info to Admin Dashboard? -->
    </body>
</html>
