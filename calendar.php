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
        <script type="text/javascript" src="./js/main.js"></script>
        <script src="/js/moment.min.js"></script>
        <script src="/js/underscore-min.js"></script>
        <script type="module" src="./js/clndr.min.js"></script>
        <link rel="stylesheet" type="text/css" media="all" href="./sass/style.css" /> 
        <link rel="stylesheet" href="./style.css">
    </head>
    
    <body>

    <?php include "./navbar.php"; ?>
    <?php include "./sidebar.php"; ?>
    <div id="calendar">

    <div id="full-clndr" class="clearfix">
        <script type="text/template" id="full-clndr-template">
            <div class="clndr-controls">
                <div class="clndr-previous-button">&lt;</div>
                <div class="current-month"><%= month %> <%= year %></div>
                <div class="clndr-next-button">&gt;</div>
            </div>
            <div class="clndr-grid">
                <div class="days-of-the-week clearfix">
                    <% _.each(daysOfTheWeek, function(day) { %>
                    <div class="header-day"><%= day %></div>
                    <% }); %>
                </div>

                <div class="days">
                    <% _.each(days, function(day) { %>
                    <div class="<%= day.classes %>" id="<%= day.id %>"><span class="day-number"><%= day.day %></span></div>
                    <% }); %>
                </div>
            </div>

            <div class="event-listing">
                <div class="event-listing-title">EVENTS THIS MONTH</div>
                <% _.each(eventsThisMonth, function(event) { %>
                    <div class="event-item">
                        <div class="event-item-name">
                            <%= event.date %>
                        </div>
                        <div class="event-item-name"><%= event.title %></div>
                        <div class="event-item-location"><%= event.location %></div>
                    </div>
                    <% }); %>
            </div>

        </script>
    </div>

    

    </body>

</html>
