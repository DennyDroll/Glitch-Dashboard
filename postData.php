<script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>
<script src="./js/main.js"></script>
<?php
    session_start();
    include "./connect.php";
    include "ChromePhp.php";

    // INsecure method (for quick and dirty testing purpuses only!)
    if(isset($_POST['submit'])){
        $boardJSONURL =  mysqli_real_escape_string($link, $_POST['boardId']) . ".json/";
        ?>
        <input type="hidden" id="phpVar" value="<?php echo $boardJSONURL; ?>">
        <?php

        // $UID = $_SESSION['UID'];
        // $apiKey = mysqli_real_escape_string($con, $_POST['apiKey']);
        // $apiToken =  mysqli_real_escape_string($con, $_POST['apiToken']);
        // $boardId =  mysqli_real_escape_string($con, $_POST['boardId']);

        


        // $sql_query = 
        // "INSERT INTO `API_links`(`UID`, `APIKEY`, `APITOKEN`, `BoardID`) 
        // VALUES ('$UID','$apiKey','$apiToken','$boardId');"; 

        // mysqli_query($sql_query);

        // if (mysqli_query($con, $sql_query)) {
        //     echo "New record created successfully";
        // } else {
        //     echo "Error: " . $sql_query . "<br>" . mysqli_error($con);
        // }

        // mysqli_close($con);
    }

?>