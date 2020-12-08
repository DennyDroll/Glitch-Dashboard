<?php
    session_start();
    if(!isset($_SESSION["loggedin"])){
        header("location: login.php");
        exit;
    }
?>
<html>
    <head>
        <title>Committee Dashboard</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>
        <script src="./js/main.js"></script>
        <link rel="stylesheet" type="text/css" media="all" href="./sass/style.css" /> 
        <link rel="stylesheet" href="./style.css">
    </head>
    
    <body>

    <?php include "./navbar.php"; ?>

    <div class="content">
        <p class="greeting">Evening</p>
        <?php 
            session_start();
            include "connect.php";
            include "./ChromePhp.php";

            
            $sql_user = "SELECT F_NAME FROM users WHERE U_NAME='" . $_SESSION['username'] . "'";
            $user_data = mysqli_query($link,$sql_user);
            while($row = mysqli_fetch_assoc($user_data) ){
                $F_NAME = $row['F_NAME'];
                // Option
                echo "<p class='FName'>".$F_NAME."</p>";
            }
        ?>
        <p id="calendarStart">Calendar</p>
        <p id="tools">Tools</p>
        <p id="news">News</p>
        <br>
        <div class="Calendar">
            sssssssss
        </div>
        <div class="tools">
            sssssssss
        </div>
        <div class="news">
            sssssssss
        </div>

        <button id="getMysqlData" onclick="GetMysqlData()">Get MySQL Data</button>


    </div>
    <?php include "./sidebar.php"; ?>
    <?php include "./footer.php"; ?>

    </body>

</html>
