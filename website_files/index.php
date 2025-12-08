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
			  text-align: center;
			  color: orange;
			  font-weight: bold;
           }
           table, th, td{
        	  text-align: center;
        	  margin: auto;
        	  border: 0.5px solid;
           }
            th {
        	 text-align: center;
             padding: 0 24px;
             margin: 0 24px;
             font-size: 20px;
        	}
        	td {
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
  
   <body>
       <!-- The Homepage Title with Other Sections -->
       <h1> WELCOME TO THE WALL-E's LOST & FOUND </h1>
       <p class="pstyle"> A place for UMBC members to report and find their missing belongings in a time of crisis. <img src="pngwing.com(3).png" alt="friends" width="190" height="160"></p>

       <!-- barrier -->
       <p class="barrier"></p>

       <!-- Image -->
       <p class="centered"> <img src="pngwing.com(1).png" alt="main picture" width="500" height="300"> </p>
       <!-- The 4 Functions -->
        <div>
           <div>
               <table>
                   <thead>
                       <tr>
                           <!-- The Report of Lost Item -->
                           <th> <a href="forms/report_submit_page.html" class="color"> Report </a> <img src="report_icon.jpg" alt="report" width="150" height="150"> </th>
                           <!-- The Search function -->
                           <th> <a href="forms/report_dashboard.html" class="color"> Search </a> <img src="search_icon.png" alt="search" width="160" height="160"> </th>
                      
                           <!-- The Tickets -->
                           <th> <a href="forms/admin_dashboard.html" class="color"> Tickets </a> <img src="lost_item_icon.png" alt="lostitem" width="170" height="170"></th>
                           <!-- The SWEET Logout function -->
                           <th> <a href="logout.php" class="color">Logout</a> <img src="logout.png" alt="loggingout" width="146" height="146"></th>
                       </tr>
                   </thead>
               </table>
           </div>
        </div>

        <!-- barrier -->
        <p class="barrier"></p>

   </body>
</html>