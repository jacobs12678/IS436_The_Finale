<?php
session_start();
if (!isset($_SESSION["logged"])) {
   header('Location: login.php');
   exit();
}
?>

<!doctype html>
<html lang="en">
   <head>
       <title> UMBC Lost & Found Home Page </title>
           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="https://umbc.edu/wp-content/uploads/2022/02/umbc-primary-logo-250x58.png"></a>
</nav>
       <!-- Style -->
       <style>
           h2 {
        	  font-size: 25px;
			  text-align: left;
			  color: orange;
			  font-weight: bold;
           }
           table, th, td{
        	 text-align: center;
             padding: 0 24px;
             margin: 0 24px;
             font-size: 20px;
           }
           .centered {
               text-align: center;
           }
           .color {
               text-weight: bold;
               color: orange;
           }
           .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
           }
           .barrier {
            height: 45px;
            background-color: black;
           }
           .pstyle {
            color: orange;
            font-size: 22px;
           }
       </style>
   </head>
  
   <div class="row" style="margin-top: 10px; text-align: center;">
    <body>
       <!-- The Homepage Title with Other Sections -->
       <h1> WELCOME TO THE WALL-E's LOST & FOUND! <br></h1>
       <h5 class="pstyle"> A place for UMBC members to report and find their missing belongings in a time of crisis. <img src="pngwing.com(3).png" alt="friends" width="190" height="160"></h5>

       <!-- barrier -->
       <p class="barrier"></p>

       <!-- Image -->
       <p class="centered"> <img src="pngwing.com(1).png" alt="main picture" width="500" height="300"> </p>
       <!-- The 4 Functions -->
        <div class="row" style="margin-top: 10px; text-align: center;">
           <div>
               <table>
                   <thead>
                       <tr>
                           <!-- The Report of Lost Item -->
                           <th> <a href="forms/report_submit_page.html" class="color"> Report <br></a> <img src="report_icon.jpg" alt="report" width="150" height="150"> </th>
                           <!-- The Search function -->
                           <th> <a href="forms/report_dashboard.html" class="color"> Search <br></a> <img src="search_icon.png" alt="search" width="160" height="160"> </th>
                      
                           <!-- The Tickets -->
                           <th> <a href="forms/admin_dashboard.html" class="color"> Tickets <br></a> <img src="lost_item_icon.png" alt="lostitem" width="170" height="170"></th>
                           <!-- The SWEET Logout function -->
                           <th> <a href="logout.php" class="color"> Logout <br></a> <img src="logout.png" alt="loggingout" width="146" height="146"></th>
                       </tr>
                   </thead>
               </table>
           </div>
        </div>

        <!-- barrier -->
        <p class="barrier"></p>

<!-- Subscription Plans -->
    <div class="auto-center" style="margin: 10px;">
        <h2>Subscription Plans: <br></h2>

    <div>
        <?php
        // Database connection
        $connect = mysqli_connect(
            'db',
            'UMBCstudent',
            'bongocat123',
            'main_project_db'
        );

        if (!$connect) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $query = 'SELECT * FROM subscription';
        $result = mysqli_query($connect, $query);

        if (!$result) {
            echo "Error running query: " . mysqli_error($connect);
        } elseif (mysqli_num_rows($result) > 0) {

            echo '<div>';
            echo '<table class="center-table">';
            echo '<thead>
                    <tr>
                        <th>Plan</th>
                        <th>Services</th>
                        <th>Price ($)</th>
                    </tr>
                </thead><tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['sub_id']) . "</td>
                        <td>" . htmlspecialchars($row['sub_service']) . "</td>
                        <td>" . htmlspecialchars($row['cost']) . "</td>
                    </tr>";
            }

            echo '</tbody></table></div>';
        } else {
            echo "No subscriptions are found!";
        }

        mysqli_close($connect);
        ?>
    </div>

<style>
    .auto-center {
    display: flex;
    flex-direction: column;
    align-items: center; /* ← Automatically centers everything */
    }
    
    .center-table {
        margin-left: auto;
        margin-right: auto;
        border-collapse: collapse;
        width: 100%;
    }

    .center-table th, .center-table td {
        border: 1px solid #ddd;
        padding: 10px;
    }

    .center-table th {
        background-color: #f2f2f2;
    }
</style>
        	  
   </body>
</html>