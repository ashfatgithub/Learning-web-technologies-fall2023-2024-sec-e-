<?php 
    session_start();
    require_once('../model/userModel.php');
    if(readNotification($_SESSION['userName'])){
        echo json_encode(true);
        //header('location: ../view/userDashboad.php');
    }
    else{echo json_encode(false);}
?>