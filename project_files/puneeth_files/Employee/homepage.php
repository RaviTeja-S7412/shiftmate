<?php
include "/xampp/htdocs/ShiftMate/config/config.php";
session_start();

if (!isset($_SESSION["fname"])) {
    header("location: Sign Up/employeesignup.php");
}
    ?>


<html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="banner" >
            <div class="navbar">
                <img src="logo.jpeg" class="logo">
                <ul>
                    <li><a href="profilepage.html">profile</a></li>&nbsp; &nbsp;
                    <li><a href="documents page/Documents.html">Documents</a></li>&nbsp; &nbsp;
                    
                        <li><a href="">View Schedule</a></li>
            
                
                    <li><a href="notifications/Notification.html">Notifications</a></li>
                    <li><a href="HelpPage.html">Help</a></li>
                    <li><a href="../logout.php">LogOut</a></li>
                </ul>
            </div>

            <div class="content">
                <h1>Employee Schedule Planner</h1>
                <p>Make your day, easy with shiftmate</p>

            </div>
        </div>
        
    </body>
</html>