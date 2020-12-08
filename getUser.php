<?php 
    include "connect.php";
    // Fetch committees
    $sql_user = "SELECT * FROM users WHERE UID LIKE '1'";
    $user_data = mysqli_query($link,$sql_user);
    while($row = mysqli_fetch_assoc($user_data) ){
        $UID = $row['UID'];
        $F_NAME = $row['F_NAME'];
        $L_NAME = $row['L_NAME'];
    }
?>