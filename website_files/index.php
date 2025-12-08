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
       <!-- The 4 Functions -->
        <div>
           <div>
               <table>
                   <thead>
                       <tr>
                           <!-- The Report of Lost Item -->
                           <th> <a href="forms/report_dashboard.html" class="color"> Report </a> <img src="report_icon.jpg" alt="report" width="150" height="150"> </th>
                           <!-- The Search function -->
                           <th class="color"> Search <img src="search_icon.png" alt="search" width="160" height="160"> </th>
                      
                           <!-- The Tickets -->
                           <th> <a href="forms/admin_dashboard.html" class="color"> Tickets </a> <img src="lost_item_icon.png" alt="lostitem" width="170" height="170"></th>
                           <!-- The SWEET Logout function -->
                           <th> <a href="logout.php" class="color">Logout</a></th>
                       </tr>
                   </thead>
               </table>
           </div>
        </div>
   </body>
</html>