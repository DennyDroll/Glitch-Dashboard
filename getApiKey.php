<?php
session_start();
    include "connect.php";
    include "ChromePhp.php";

    
    if(isset($_POST['ApiKey'])){
        $ApiToken = $_POST['ApiToken'];
        $UID = $_SESSION["UID"];
    }else
    {
        exit();
    }
    
    
    
    $sql = "SELECT * FROM API_links WHERE UID='$UID';";
    ChromePhp::log($sql);
    $result = $link->query($sql);
    
    if($result->num_rows > 0)
    {
        while( $row = $result->fetch_assoc() )
        {
            $aid = $row['AID'];
            $uid = $_SESSION['UID'];
            $apiKey = $row['APIKEY'];
            $apiToken = $row['APITOKEN'];
            $boardId = $row['BoardID'];
            $user_data_arr[] = array("AID" => $aid, "UID" => $uid,"APIKEY" => $apiKey,"APITOKEN" => $apiToken,"BoardID" => $boardId);
        }
    } else
    {
        die();
    }

    
    echo json_encode($user_data_arr);
    
    
?>