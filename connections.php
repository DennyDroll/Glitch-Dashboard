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
    <div id="uploadForm">
    
        <h2>Trello API Connection:</h2>

        
        <form  action="./postData.php" method="post">
            <label for="apiKey">Insert your Trello API Key:</label>
            <input type="text" id="apiKey" name="apiKey"><br><br>
            <label for="apiToken">Insert your Trello API Token:</label>
            <input type="password" id="apiToken" name="apiToken"><br><br>
        <h1 >TODO: Change the ID input to board url input and get the id dynamiclally. easier to use in the end</h1>
            <label for="boardId">Insert your Trello-board ID:</label>
            <input type="text" id="boardURL" name="boardURL"><br><br>
            <input type="submit" id="submit" name="submit" value="Send it!">
        </form>
    </div>
    


    <?php include "./sidebar.php"; ?>
    <?php include "./footer.php"; ?>

    </body>

</html>
