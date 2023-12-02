<?php
    
    include_once("../model/userModel.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] =="POST")
    {

        $u1 = $_POST['emp_name'];
        $u2 = $_POST['cont_no'];
        $u3 = $_POST['emp_uname'];
        $userID = $_SESSION['eid'];
        
        $status = updateDB($userID, $u1, $u2, $u3);

        if ($status) 
        {
            header("location:../view/adminHome.php");
        }
        else
        {   
            header("location:../view/update.php");
        }
    }
?>