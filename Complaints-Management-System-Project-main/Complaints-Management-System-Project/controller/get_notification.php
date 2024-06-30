<?php
    require_once("../model/userModel.php"); 
    
    session_start();

    if (isset($_SESSION['userName'])) {
        $user = $_SESSION['userName'];
        $notifications = getNotification($user);

        header("Content-Type: application/json");
        echo json_encode($notifications);
    } else {
        header("HTTP/1.1 401 Unauthorized");
        echo json_encode(array("error" => "User not authenticated"));
    }
?>